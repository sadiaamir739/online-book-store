<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\BookPageController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PoemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\EmailVerificationController;


// =====================================================
// AUTH
// =====================================================

// LOGIN

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');

Route::get('/register', [RegisterController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.submit');

Route::get('/verify-otp', [EmailVerificationController::class, 'show'])
    ->name('otp.show');

Route::post('/verify-otp', [EmailVerificationController::class, 'verify'])
    ->name('otp.verify');

Route::post('/verify-otp/resend', [EmailVerificationController::class, 'resend'])
    ->name('otp.resend');

Route::get('/forgot-password', [PasswordResetController::class, 'request'])
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetController::class, 'email'])
    ->name('password.email');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'reset'])
    ->name('password.reset');

Route::post('/reset-password', [PasswordResetController::class, 'update'])
    ->name('password.update');


// =====================================================
// HOME
// =====================================================

Route::get('/', function () {
    if (Auth::check() && Auth::user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }

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

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

});


// =====================================================
// ADMIN DASHBOARD
// =====================================================

Route::middleware(['auth', 'can:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

});


// =====================================================
// CATEGORIES
// =====================================================

// PUBLIC - VIEW CATEGORIES

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');


// CATEGORY MANAGEMENT

Route::middleware('auth')->group(function () {

    // CREATE CATEGORY

    Route::get('/categories/create',
        [CategoryController::class, 'create']
    )->name('categories.create');


    // STORE CATEGORY
    Route::post('/categories',
        [CategoryController::class, 'store']
    )->name('categories.store');


    // EDIT CATEGORY

    Route::get('/categories/{category}/edit',
        [CategoryController::class, 'edit']
    )->name('categories.edit');


    // UPDATE CATEGORY

    Route::put('/categories/{category}',
        [CategoryController::class, 'update']
    )->name('categories.update');

    // DELETE CATEGORY

    Route::delete('/categories/{category}',
        [CategoryController::class, 'destroy']
    )->name('categories.destroy');

});


// =====================================================
// BOOKS
// =====================================================

// PUBLIC - VIEW BOOKS

Route::get('/books', [BookController::class, 'index'])
    ->name('books.index');


// PUBLIC - READ BOOK

Route::get('/books/{book}/read',
    [BookController::class, 'read']
)->name('books.read');


// ADMIN - BOOK CREATION

Route::middleware(['auth', 'can:admin'])->group(function () {

    Route::get('/books/create',
        [BookController::class, 'create']
    )->name('books.create');

    Route::post('/books',
        [BookController::class, 'store']
    )->name('books.store');

});


// ADMIN - BOOK MANAGEMENT

Route::middleware(['auth', 'can:admin'])->group(function () {


    // EDIT BOOK

    Route::get('/books/{book}/edit',
        [BookController::class, 'edit']
    )->name('books.edit');


    // UPDATE BOOK

    Route::put('/books/{book}',
        [BookController::class, 'update']
    )->name('books.update');


    // DELETE BOOK

    Route::delete('/books/{book}',
        [BookController::class, 'destroy']
    )->name('books.destroy');

    Route::post('/books/{book}/approve',
        [BookController::class, 'approve']
    )->name('books.approve');

});


// =====================================================
// BOOK PAGES
// =====================================================

Route::middleware(['auth', 'can:admin'])->group(function () {

    // VIEW / MANAGE BOOK PAGES

    Route::get('/books/{book}/pages',
        [BookPageController::class, 'index']
    )->name('books.pages');


    // CREATE BOOK PAGE

    Route::get('/books/{book}/pages/create',
        [BookPageController::class, 'create']
    )->name('books.pages.create');


    // STORE BOOK PAGE

    Route::post('/books/{book}/pages',
        [BookPageController::class, 'store']
    )->name('books.pages.store');


    // EDIT BOOK PAGE

    Route::get('/books/{book}/pages/{page}/edit',
        [BookPageController::class, 'edit']
    )->name('books.pages.edit');


    // UPDATE BOOK PAGE

    Route::put('/books/{book}/pages/{page}',
        [BookPageController::class, 'update']
    )->name('books.pages.update');


    // DELETE BOOK PAGE

    Route::delete('/books/{book}/pages/{page}',
        [BookPageController::class, 'destroy']
    )->name('books.pages.destroy');

});


// =====================================================
// BOOK CHAPTERS
// =====================================================

Route::middleware(['auth', 'can:admin'])->group(function () {

    // VIEW / MANAGE CHAPTERS

    Route::get('/books/{book}/chapters',
        [ChapterController::class, 'index']
    )->name('books.chapters');


    // CREATE CHAPTER

    Route::get('/books/{book}/chapters/create',
        [ChapterController::class, 'create']
    )->name('books.chapters.create');


    // STORE CHAPTER

    Route::post('/books/{book}/chapters',
        [ChapterController::class, 'store']
    )->name('books.chapters.store');


    // EDIT CHAPTER

    Route::get('/books/{book}/chapters/{chapter}/edit',
        [ChapterController::class, 'edit']
    )->name('books.chapters.edit');


    // UPDATE CHAPTER

    Route::put('/books/{book}/chapters/{chapter}',
        [ChapterController::class, 'update']
    )->name('books.chapters.update');


    // DELETE CHAPTER

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

// =====================================================
// POETRY
// =====================================================

Route::get('/poems', [PoemController::class, 'index'])
    ->name('poems.index');

Route::middleware('auth')->group(function () {
    Route::get('/poems/create', [PoemController::class, 'create'])
        ->name('poems.create');

    Route::post('/poems', [PoemController::class, 'store'])
        ->name('poems.store');

    Route::get('/poems/{poem}/edit', [PoemController::class, 'edit'])
        ->name('poems.edit');

    Route::put('/poems/{poem}', [PoemController::class, 'update'])
        ->name('poems.update');

    Route::delete('/poems/{poem}', [PoemController::class, 'destroy'])
        ->name('poems.destroy');
});

Route::get('/poems/{poem}', [PoemController::class, 'show'])
    ->name('poems.show');

Route::middleware(['auth', 'can:admin'])->post('/poems/{poem}/approve', [PoemController::class, 'approve'])
    ->name('poems.approve');

// =====================================================
// STORIES
// =====================================================

// PUBLIC - VIEW STORIES LIST

Route::get('/stories',
    [StoryController::class, 'index']
)->name('stories.index');


// =====================================================
// USER - UPLOAD STORIES
// =====================================================

Route::middleware('auth')->group(function () {

    Route::get('/stories/create',
        [StoryController::class, 'create']
    )->name('stories.create');

    Route::post('/stories',
        [StoryController::class, 'store']
    )->name('stories.store');

});


// =====================================================
// ADMIN - STORY MANAGEMENT
// =====================================================

Route::middleware('auth')->group(function () {


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

});

// ADMIN - STORY APPROVAL AND PAGE MANAGEMENT

Route::middleware(['auth', 'can:admin'])->group(function () {

    Route::post('/stories/{story}/approve',
        [StoryController::class, 'approve']
    )->name('stories.approve');


    // =================================================
    // STORY PAGES
    // =================================================

    // MANAGE STORY PAGES

    Route::get('/stories/{story}/pages',
        [StoryController::class, 'pages']
    )->name('stories.pages');


    // CREATE STORY PAGE

    Route::get('/stories/{story}/pages/create',
        [StoryController::class, 'createPage']
    )->name('stories.pages.create');


    // STORE STORY PAGE

    Route::post('/stories/{story}/pages',
        [StoryController::class, 'storePage']
    )->name('stories.pages.store');


    // EDIT STORY PAGE

    Route::get('/stories/{story}/pages/{page}/edit',
        [StoryController::class, 'editPage']
    )->name('stories.pages.edit');


    // UPDATE STORY PAGE

    Route::put('/stories/{story}/pages/{page}',
        [StoryController::class, 'updatePage']
    )->name('stories.pages.update');


    // DELETE STORY PAGE

    Route::delete('/stories/{story}/pages/{page}',
        [StoryController::class, 'deletePage']
    )->name('stories.pages.delete');

});


// =====================================================
// PUBLIC STORY DETAILS
// =====================================================
//
// IMPORTANT:
// This route is AFTER /stories/create so Laravel does
// not treat "create" as a story ID.
//

Route::get('/stories/{story}',
    [StoryController::class, 'show']
)->name('stories.show');