<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    // Show all chapters of a book
    public function index($bookId)
    {
        $book = Book::with('chapters.pages')
            ->findOrFail($bookId);

        return view('books.chapters', compact('book'));
    }

    // Create chapter form
    public function create($bookId)
    {
        $book = Book::findOrFail($bookId);

        return view('books.create-chapter', compact('book'));
    }

    // Store chapter
    public function store(Request $request, $bookId)
    {
        $book = Book::findOrFail($bookId);

        $request->validate([
            'chapter_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
        ]);

        Chapter::create([
            'book_id' => $book->id,
            'chapter_number' => $request->chapter_number,
            'title' => $request->title,
        ]);

        return redirect()
            ->route('books.chapters', $book->id)
            ->with('success', 'Chapter created successfully!');
    }

    // Edit chapter
    public function edit($bookId, $chapterId)
    {
        $book = Book::findOrFail($bookId);

        $chapter = Chapter::where('book_id', $bookId)
            ->findOrFail($chapterId);

        return view('books.chapters-edit', compact('book', 'chapter'));
    }

    // Update chapter
    public function update(Request $request, $bookId, $chapterId)
    {
        $book = Book::findOrFail($bookId);

        $chapter = Chapter::where('book_id', $bookId)
            ->findOrFail($chapterId);

        $request->validate([
            'chapter_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
        ]);

        $chapter->update([
            'chapter_number' => $request->chapter_number,
            'title' => $request->title,
        ]);

        return redirect()
            ->route('books.chapters', $book->id)
            ->with('success', 'Chapter updated successfully!');
    }

    // Delete chapter
    public function destroy($bookId, $chapterId)
    {
        $book = Book::findOrFail($bookId);

        $chapter = Chapter::where('book_id', $bookId)
            ->findOrFail($chapterId);

        $chapter->delete();

        return redirect()
            ->route('books.chapters', $book->id)
            ->with('success', 'Chapter deleted successfully!');
    }

    // Read chapter
    public function read($bookId, $chapterId)
    {
        $book = Book::findOrFail($bookId);

        $chapter = Chapter::with('pages')
            ->where('book_id', $bookId)
            ->findOrFail($chapterId);

        return view('books.read', compact('book', 'chapter'));
    }
}