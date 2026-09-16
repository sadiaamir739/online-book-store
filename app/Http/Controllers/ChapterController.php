<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index($bookId)
    {
        $book = Book::with('chapters.pages')
            ->findOrFail($bookId);

        return view('books.chapters', compact('book'));
    }

    public function create($bookId)
    {
        $book = Book::findOrFail($bookId);

        return view('books.create-chapter', compact('book'));
    }

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

    public function edit($bookId, $chapterId)
    {
        $book = Book::findOrFail($bookId);

        $chapter = Chapter::where('book_id', $bookId)
            ->findOrFail($chapterId);

        return view('books.chapters-edit', compact('book', 'chapter'));
    }

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

    public function read($bookId, $chapterId)
    {
        $book = Book::findOrFail($bookId);

        $chapter = Chapter::with('pages')
            ->where('book_id', $bookId)
            ->findOrFail($chapterId);

        return view('books.chapter-read', compact('book', 'chapter'));
    }
}


