<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // =====================================================
    // SHOW ALL BOOKS
    // =====================================================

    public function index()
    {
        $books = Book::with('category')->get();

        return view('books.index', compact('books'));
    }


    // =====================================================
    // READ BOOK
    // =====================================================

    public function read($id)
    {
        $book = Book::with('chapters.pages')
            ->findOrFail($id);

        return view('books.read', compact('book'));
    }


    // =====================================================
    // CREATE BOOK
    // =====================================================

    public function create()
    {
        $categories = Category::all();

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
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'cover_image' => $coverImage,
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
        $categories = Category::all();

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
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $book = Book::findOrFail($id);

        $coverImage = $book->cover_image;

        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image')
                ->store('book-covers', 'public');
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'cover_image' => $coverImage,
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

        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully');
    }
}

