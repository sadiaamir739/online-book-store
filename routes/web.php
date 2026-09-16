<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\BookPageController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ProfileController;


// =====================================================
// AUTH
// =====================================================

Volt::route('/login', 'auth.login')
    ->name('login');

Volt::route('/register', 'auth.register')
    ->name('register');


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

Route::get('/books/{book}/read', [BookController::class, 'read'])
    ->name('books.read');

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

    Route::get('/books/{book}/pages', [BookPageController::class, 'index'])
        ->name('books.pages');

    Route::get('/books/{book}/pages/create', [BookPageController::class, 'create'])
        ->name('books.pages.create');

    Route::post('/books/{book}/pages', [BookPageController::class, 'store'])
        ->name('books.pages.store');

    Route::get('/books/{book}/pages/{page}/edit', [BookPageController::class, 'edit'])
        ->name('books.pages.edit');

    Route::put('/books/{book}/pages/{page}', [BookPageController::class, 'update'])
        ->name('books.pages.update');

    Route::delete('/books/{book}/pages/{page}', [BookPageController::class, 'destroy'])
        ->name('books.pages.destroy');
});


// =====================================================
// BOOK CHAPTERS
// =====================================================

Route::middleware(['auth', 'can:admin'])->group(function () {

    Route::get('/books/{book}/chapters', [ChapterController::class, 'index'])
        ->name('books.chapters');

    Route::get('/books/{book}/chapters/create', [ChapterController::class, 'create'])
        ->name('books.chapters.create');

    Route::post('/books/{book}/chapters', [ChapterController::class, 'store'])
        ->name('books.chapters.store');

    Route::get('/books/{book}/chapters/{chapter}/edit', [ChapterController::class, 'edit'])
        ->name('books.chapters.edit');

    Route::put('/books/{book}/chapters/{chapter}', [ChapterController::class, 'update'])
        ->name('books.chapters.update');

    Route::delete('/books/{book}/chapters/{chapter}', [ChapterController::class, 'destroy'])
        ->name('books.chapters.destroy');
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

// SHOW SINGLE STORY
Route::get('/stories/{story}',
    [StoryController::class, 'show']
)->name('stories.show');


Route::middleware('auth')->group(function () {

    // CREATE STORY
    Route::get('/stories/create',
        [StoryController::class, 'create']
    )->name('stories.create');

    // STORE STORY
    Route::post('/stories',
        [StoryController::class, 'store']
    )->name('stories.store');

    // EDIT STORY
    Route::get('/stories/{story}/edit',
        [StoryController::class, 'edit']
    )->name('stories.edit');

    // UPDATE STORY
    Route::put('/stories/{story}',
        [StoryController::class, 'update']
    )->name('stories.update');

    // DELETE STORY
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