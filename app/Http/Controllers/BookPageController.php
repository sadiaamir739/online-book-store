<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class BookPageController extends Controller
{
    // Show all pages of a book
    public function index($bookId)
    {
        $book = Book::with(['pages', 'chapters.pages'])
            ->findOrFail($bookId);

        return view('books.pages', compact('book'));
    }

    // Show create page form
    public function create($bookId)
    {
        $book = Book::with('chapters')
            ->findOrFail($bookId);

        return view('books.create-page', compact('book'));
    }

    // Add new page
    public function store(Request $request, $bookId)
    {
        $book = Book::findOrFail($bookId);

        $request->validate([
            'chapter_id' => 'required|exists:chapters,id',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        // Make sure selected chapter belongs to this book
        $chapter = $book->chapters()
            ->findOrFail($request->chapter_id);

        // Next page number inside this chapter
        $nextPage = ($chapter->pages()->max('page_number') ?? 0) + 1;

        $chapter->pages()->create([
            'book_id' => $book->id,
            'page_number' => $nextPage,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()
            ->route('books.chapters', $book->id)
            ->with('success', 'Book page added successfully!');
    }

    // Show edit page form
    public function edit($bookId, $pageId)
    {
        $book = Book::with('chapters')
            ->findOrFail($bookId);

        $page = $book->pages()
            ->findOrFail($pageId);

        return view('books.edit-page', compact('book', 'page'));
    }

    // Update page
    public function update(Request $request, $bookId, $pageId)
    {
        $book = Book::findOrFail($bookId);

        $page = $book->pages()
            ->findOrFail($pageId);

        $request->validate([
            'chapter_id' => 'required|exists:chapters,id',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        // Make sure selected chapter belongs to this book
        $chapter = $book->chapters()
            ->findOrFail($request->chapter_id);

        // If page is moved to another chapter
        if ($page->chapter_id != $chapter->id) {

            $nextPage = ($chapter->pages()->max('page_number') ?? 0) + 1;

            $page->update([
                'chapter_id' => $chapter->id,
                'page_number' => $nextPage,
                'title' => $request->title,
                'content' => $request->content,
            ]);

        } else {

            $page->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }

        return redirect()
            ->route('books.chapters', $book->id)
            ->with('success', 'Book page updated successfully!');
    }

    // Delete page
    public function destroy($bookId, $pageId)
    {
        $book = Book::findOrFail($bookId);

        $page = $book->pages()
            ->findOrFail($pageId);

        $chapterId = $page->chapter_id;

        // Delete selected page
        $page->delete();

        // Renumber remaining pages of the same chapter
        if ($chapterId) {

            $chapter = Chapter::find($chapterId);

            if ($chapter) {

                $pages = $chapter->pages()
                    ->orderBy('page_number')
                    ->get();

                foreach ($pages as $index => $page) {
                    $page->update([
                        'page_number' => $index + 1,
                    ]);
                }
            }
        }

        return redirect()
            ->route('books.chapters', $book->id)
            ->with(
                'success',
                'Book page deleted and pages renumbered successfully!'
            );
    }
}