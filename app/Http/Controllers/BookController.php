<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    // =====================================================
    // SHOW ALL BOOKS
    // =====================================================

    public function index()
    {
        $query = Book::with('category', 'user');

        if (!Auth::user()?->is_admin) {
            $query->where(function ($query) {
                $query->where('published', true)
                    ->orWhere('user_id', Auth::id());
            });
        }

        $books = $query->get();

        return view('books.index', compact('books'));
    }


    // =====================================================
    // READ BOOK
    // =====================================================

    public function read($id)
    {
        $book = Book::with('chapters.pages')
            ->findOrFail($id);

        if (!$book->published && (!Auth::check() || (!Auth::user()->is_admin && $book->user_id !== Auth::id()))) {
            abort(404);
        }

        return view('books.read', compact('book'));
    }


    // =====================================================
    // CREATE BOOK
    // =====================================================

    public function create()
    {
        $categories = Auth::user()?->is_admin
            ? Category::all()
            : Category::where('published', true)->get();

        return view('books.create', compact('categories'));
    }


    // =====================================================
    // STORE BOOK
    // =====================================================

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'language' => 'required|in:English,Urdu',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $coverImage = null;

        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image')
                ->store('book-covers', 'public');
        }

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'language' => $request->language,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'cover_image' => $coverImage,
            'published' => Auth::user()?->is_admin ?? false,
            'user_id' => Auth::id(),
        ]);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book added successfully');
    }


    // =====================================================
    // EDIT BOOK
    // =====================================================

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $this->authorizeBook($book);
        $categories = Auth::user()?->is_admin
            ? Category::all()
            : Category::where('published', true)->get();

        return view('books.edit', compact('book', 'categories'));
    }


    // =====================================================
    // UPDATE BOOK
    // =====================================================

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'language' => 'required|in:English,Urdu',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $book = Book::findOrFail($id);
        $this->authorizeBook($book);

        $coverImage = $book->cover_image;

        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image')
                ->store('book-covers', 'public');
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'language' => $request->language,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'cover_image' => $coverImage,
            'published' => Auth::user()->is_admin ? $book->published : false,
        ]);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book updated successfully');
    }


    // =====================================================
    // DELETE BOOK
    // =====================================================

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $this->authorizeBook($book);

        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully');
    }

    public function approve($id)
    {
        abort_unless(Auth::user()?->is_admin, 403);
        $book = Book::findOrFail($id);
        $book->update(['published' => true]);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book approved successfully');
    }

    private function authorizeBook(Book $book): void
    {
        $user = Auth::user();

        if (!$user || (!$user->is_admin && $book->user_id !== $user->id)) {
            abort(403, 'You are not allowed to modify this book.');
        }
    }
}

