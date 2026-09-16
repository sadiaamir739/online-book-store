<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\BookPageController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ProfileController;


// =====================================================
// HOME
// =====================================================

Route::get('/', function () {
    return view('welcome');
})->name('home');


// =====================================================
// LOGOUT
// =====================================================

Route::post('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/');

})->middleware('auth')->name('logout');


// =====================================================
// PROFILE
// =====================================================

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile');

});


// =====================================================
// CATEGORIES
// =====================================================

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::middleware(['auth', 'can:admin'])->group(function () {

    Route::get('/categories/create', [CategoryController::class, 'create'])
        ->name('categories.create');

    Route::post('/categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
        ->name('categories.edit');

    Route::put('/categories/{category}', [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');
});


// =====================================================
// BOOKS
// =====================================================

Route::get('/books', [BookController::class, 'index'])
    ->name('books.index');

Route::get('/books/{book}/read',
    [BookController::class, 'read']
)->name('books.read');

Route::middleware(['auth', 'can:admin'])->group(function () {

    Route::get('/books/create', [BookController::class, 'create'])
        ->name('books.create');

    Route::post('/books', [BookController::class, 'store'])
        ->name('books.store');

    Route::get('/books/{book}/edit', [BookController::class, 'edit'])
        ->name('books.edit');

    Route::put('/books/{book}', [BookController::class, 'update'])
        ->name('books.update');

    Route::delete('/books/{book}', [BookController::class, 'destroy'])
        ->name('books.destroy');
});


// =====================================================
// BOOK PAGES
// =====================================================

Route::middleware(['auth', 'can:admin'])->group(function () {

    // All pages of a book
    Route::get('/books/{book}/pages',
        [BookPageController::class, 'index']
    )->name('books.pages');

    // Create page
    Route::get('/books/{book}/pages/create',
        [BookPageController::class, 'create']
    )->name('books.pages.create');

    // Store page
    Route::post('/books/{book}/pages',
        [BookPageController::class, 'store']
    )->name('books.pages.store');

    // Edit page
    Route::get('/books/{book}/pages/{page}/edit',
        [BookPageController::class, 'edit']
    )->name('books.pages.edit');

    // Update page
    Route::put('/books/{book}/pages/{page}',
        [BookPageController::class, 'update']
    )->name('books.pages.update');

    // Delete page
    Route::delete('/books/{book}/pages/{page}',
        [BookPageController::class, 'destroy']
    )->name('books.pages.destroy');
});


// =====================================================
// BOOK CHAPTERS
// =====================================================

Route::middleware(['auth', 'can:admin'])->group(function () {

    // Show all chapters of a book
    Route::get('/books/{book}/chapters',
        [ChapterController::class, 'index']
    )->name('books.chapters');

    // Create chapter
    Route::get('/books/{book}/chapters/create',
        [ChapterController::class, 'create']
    )->name('books.chapters.create');

    // Store chapter
    Route::post('/books/{book}/chapters',
        [ChapterController::class, 'store']
    )->name('books.chapters.store');

    // Edit chapter
    Route::get('/books/{book}/chapters/{chapter}/edit',
        [ChapterController::class, 'edit']
    )->name('books.chapters.edit');

    // Update chapter
    Route::put('/books/{book}/chapters/{chapter}',
        [ChapterController::class, 'update']
    )->name('books.chapters.update');

    // Delete chapter
    Route::delete('/books/{book}/chapters/{chapter}',
        [ChapterController::class, 'destroy']
    )->name('books.chapters.destroy');
});


// =====================================================
// READ CHAPTER
// =====================================================

Route::get('/books/{book}/chapters/{chapter}/read',
    [ChapterController::class, 'read']
)->name('books.chapters.read');


// =====================================================
// STORIES
// =====================================================

Route::get('/stories', [StoryController::class, 'index'])
    ->name('stories.index');

Route::middleware('auth')->group(function () {

    // Create story
    Route::get('/stories/create',
        [StoryController::class, 'create']
    )->name('stories.create');

    // Store story
    Route::post('/stories',
        [StoryController::class, 'store']
    )->name('stories.store');

    // Edit story
    Route::get('/stories/{story}/edit',
        [StoryController::class, 'edit']
    )->name('stories.edit');

    // Update story
    Route::put('/stories/{story}',
        [StoryController::class, 'update']
    )->name('stories.update');

    // Delete story
    Route::delete('/stories/{story}',
        [StoryController::class, 'destroy']
    )->name('stories.destroy');


    // =================================================
    // STORY PAGES
    // =================================================

    Route::get('/stories/{story}/pages',
        [StoryController::class, 'pages']
    )->name('stories.pages');

    Route::get('/stories/{story}/pages/create',
        [StoryController::class, 'createPage']
    )->name('stories.pages.create');

    Route::post('/stories/{story}/pages',
        [StoryController::class, 'storePage']
    )->name('stories.pages.store');

    Route::get('/stories/{story}/pages/{page}/edit',
        [StoryController::class, 'editPage']
    )->name('stories.pages.edit');

    Route::put('/stories/{story}/pages/{page}',
        [StoryController::class, 'updatePage']
    )->name('stories.pages.update');

    Route::delete('/stories/{story}/pages/{page}',
        [StoryController::class, 'deletePage']
    )->name('stories.pages.delete');
});