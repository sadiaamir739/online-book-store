<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Show All Chapters
    |--------------------------------------------------------------------------
    */
    public function index($bookId)
    {
        $book = Book::with('chapters.pages')
            ->findOrFail($bookId);

        return view('books.chapters', compact('book'));
    }


    /*
    |--------------------------------------------------------------------------
    | Create Chapter Form
    |--------------------------------------------------------------------------
    */
    public function create($bookId)
    {
        $book = Book::findOrFail($bookId);

        return view('books.create-chapter', compact('book'));
    }


    /*
    |--------------------------------------------------------------------------
    | Store Chapter
    |--------------------------------------------------------------------------
    */
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


    /*
    |--------------------------------------------------------------------------
    | Edit Chapter Form
    |--------------------------------------------------------------------------
    */
    public function edit($bookId, $chapterId)
    {
        $book = Book::findOrFail($bookId);

        $chapter = Chapter::where('book_id', $bookId)
            ->findOrFail($chapterId);

        return view('books.edit-chapter', compact('book', 'chapter'));
    }


    /*
    |--------------------------------------------------------------------------
    | Update Chapter
    |--------------------------------------------------------------------------
    */
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


    /*
    |--------------------------------------------------------------------------
    | Delete Chapter
    |--------------------------------------------------------------------------
    */
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


    /*
    |--------------------------------------------------------------------------
    | Read Chapter
    |--------------------------------------------------------------------------
    */
    public function read(Request $request, $bookId, $chapterId)
    {
        $book = Book::findOrFail($bookId);

        $chapter = Chapter::with('pages')
            ->where('book_id', $bookId)
            ->findOrFail($chapterId);

        $pages = $chapter->pages;
        $pageNumber = max(1, $request->integer('page', 1));
        $page = $pages->firstWhere('page_number', $pageNumber) ?? $pages->first();
        $previousPage = $page
            ? $pages->where('page_number', '<', $page->page_number)->sortByDesc('page_number')->first()
            : null;
        $nextPage = $page
            ? $pages->where('page_number', '>', $page->page_number)->sortBy('page_number')->first()
            : null;

        /*
        |--------------------------------------------------------------------------
        | Previous Chapter
        |--------------------------------------------------------------------------
        */
        $previousChapter = Chapter::where('book_id', $bookId)
            ->where('chapter_number', '<', $chapter->chapter_number)
            ->orderBy('chapter_number', 'desc')
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Next Chapter
        |--------------------------------------------------------------------------
        */
        $nextChapter = Chapter::where('book_id', $bookId)
            ->where('chapter_number', '>', $chapter->chapter_number)
            ->orderBy('chapter_number', 'asc')
            ->first();

        return view(
            'books.chapter-read',
            compact(
                'book',
                'chapter',
                'page',
                'previousPage',
                'nextPage',
                'previousChapter',
                'nextChapter'
            )
        );
    }
}