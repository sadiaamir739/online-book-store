<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Book Pages | {{ $book->title }}</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* =========================================
           GLOBAL
        ========================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6fa;
            color: #17243d;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        button {
            font-family: inherit;
        }

        /* =========================================
           HEADER
        ========================================= */

        .header {
            background: #17243d;
            color: white;
            padding: 18px 50px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            box-shadow: 0 3px 12px rgba(23, 36, 61, 0.20);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;

            font-size: 24px;
            font-weight: 700;

            white-space: nowrap;
        }

        .logo i {
            color: #d9a943;
            font-size: 27px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .header-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            padding: 10px 17px;

            border-radius: 7px;

            font-size: 14px;
            font-weight: 700;

            transition: 0.2s ease;
        }

        .dashboard-btn {
            color: white;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.35);
        }

        .dashboard-btn:hover {
            background: rgba(255, 255, 255, 0.10);
            color: white;
        }

        .books-btn {
            color: white;
            background: #304e78;
            border: 1px solid #304e78;
        }

        .books-btn:hover {
            background: #263f63;
            color: white;
        }

        .add-btn {
            color: #17243d;
            background: #d9a943;
            border: 1px solid #d9a943;
        }

        .add-btn:hover {
            background: #c99a35;
            border-color: #c99a35;
            color: #17243d;
        }

        /* =========================================
           MAIN
        ========================================= */

        .container {
            width: 90%;
            max-width: 1100px;

            margin: 42px auto;

            padding-bottom: 50px;
        }

        /* =========================================
           PAGE HEADING
        ========================================= */

        .page-heading {
            margin-bottom: 25px;
        }

        .heading-wrapper {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .heading-icon {
            width: 56px;
            height: 56px;

            background: rgba(217, 169, 67, 0.15);
            color: #d9a943;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 27px;

            flex-shrink: 0;
        }

        .page-heading h1 {
            color: #17243d;
            font-size: 32px;

            margin-bottom: 6px;
        }

        .page-heading p {
            color: #667085;
            font-size: 15px;
            line-height: 1.6;
        }

        /* =========================================
           BOOK INFO
        ========================================= */

        .book-info {
            background: white;

            border-radius: 12px;

            padding: 20px 25px;

            margin-bottom: 25px;

            border-left: 5px solid #d9a943;

            box-shadow: 0 4px 16px rgba(23, 36, 61, 0.08);

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }

        .book-details {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .book-icon {
            width: 48px;
            height: 48px;

            background: #17243d;
            color: #d9a943;

            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;

            flex-shrink: 0;
        }

        .book-text span {
            display: block;

            color: #7a8496;
            font-size: 13px;

            margin-bottom: 4px;
        }

        .book-text strong {
            display: block;

            color: #17243d;
            font-size: 19px;
        }

        .page-count {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            background: #eef2f7;
            color: #304e78;

            padding: 9px 14px;

            border-radius: 7px;

            font-size: 14px;
            font-weight: 700;
        }

        /* =========================================
           MESSAGES
        ========================================= */

        .success-message {
            background: #eef8f1;
            border: 1px solid #b8dfc4;

            color: #216b38;

            border-radius: 8px;

            padding: 13px 16px;

            margin-bottom: 20px;

            display: flex;
            align-items: center;
            gap: 9px;

            font-size: 14px;
            font-weight: 600;
        }

        .success-message i {
            font-size: 18px;
        }

        .error-message {
            background: #fff5f5;
            border: 1px solid #f0b5b5;

            color: #a51f1f;

            border-radius: 8px;

            padding: 13px 16px;

            margin-bottom: 20px;

            display: flex;
            align-items: center;
            gap: 9px;

            font-size: 14px;
            font-weight: 600;
        }

        .error-message i {
            font-size: 18px;
        }

        /* =========================================
           PAGES CARD
        ========================================= */

        .pages-card {
            background: white;

            border-radius: 14px;

            box-shadow: 0 5px 20px rgba(23, 36, 61, 0.08);

            overflow: hidden;
        }

        .card-header {
            padding: 20px 25px;

            border-bottom: 1px solid #e8ebf0;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 10px;

            color: #17243d;

            font-size: 19px;
            font-weight: 700;
        }

        .card-title i {
            color: #304e78;
            font-size: 21px;
        }

        /* =========================================
           PAGE LIST
        ========================================= */

        .pages-list {
            padding: 10px 0;
        }

        .page-item {
            padding: 22px 25px;

            border-bottom: 1px solid #edf0f4;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            transition: 0.2s ease;
        }

        .page-item:last-child {
            border-bottom: none;
        }

        .page-item:hover {
            background: #fafbfc;
        }

        .page-left {
            display: flex;
            align-items: flex-start;

            gap: 15px;

            min-width: 0;
        }

        .page-number {
            width: 44px;
            height: 44px;

            background: #17243d;
            color: #d9a943;

            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 15px;
            font-weight: 700;

            flex-shrink: 0;
        }

        .page-content {
            min-width: 0;
        }

        .page-content h3 {
            color: #17243d;

            font-size: 17px;

            margin-bottom: 7px;
        }

        .page-meta {
            display: flex;
            align-items: center;

            gap: 10px;

            flex-wrap: wrap;
        }

        .chapter-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            color: #304e78;
            background: #eef2f7;

            padding: 5px 9px;

            border-radius: 5px;

            font-size: 12px;
            font-weight: 600;
        }

        .page-preview {
            color: #7a8496;

            font-size: 13px;

            line-height: 1.6;

            margin-top: 8px;

            max-width: 720px;
        }

        /* =========================================
           ACTIONS
        ========================================= */

        .page-actions {
            display: flex;
            align-items: center;

            gap: 8px;

            flex-shrink: 0;
        }

        .action-btn {
            width: 40px;
            height: 40px;

            border-radius: 7px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            font-size: 16px;

            border: none;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .edit-btn {
            background: #fff7e5;
            color: #9a741d;
        }

        .edit-btn:hover {
            background: #d9a943;
            color: #17243d;
        }

        .delete-btn {
            background: #fff1f1;
            color: #b42318;
        }

        .delete-btn:hover {
            background: #b42318;
            color: white;
        }

        .delete-form {
            display: inline;
        }

        /* =========================================
           EMPTY STATE
        ========================================= */

        .empty-state {
            text-align: center;

            padding: 70px 25px;
        }

        .empty-icon {
            width: 70px;
            height: 70px;

            margin: 0 auto 18px;

            background: #eef2f7;
            color: #304e78;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;
        }

        .empty-state h3 {
            color: #17243d;

            font-size: 20px;

            margin-bottom: 8px;
        }

        .empty-state p {
            color: #7a8496;

            font-size: 14px;
            line-height: 1.6;

            max-width: 550px;

            margin: 0 auto 20px;
        }

        .empty-add-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: #304e78;
            color: white;

            padding: 11px 18px;

            border-radius: 7px;

            font-size: 14px;
            font-weight: 700;
        }

        .empty-add-btn:hover {
            background: #263f63;
            color: white;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 800px) {

            .header {
                padding: 18px 20px;

                flex-direction: column;
                align-items: stretch;
            }

            .logo {
                justify-content: center;
            }

            .header-actions {
                justify-content: center;
            }

            .container {
                width: 92%;

                margin: 30px auto;
            }

            .book-info {
                align-items: flex-start;

                flex-direction: column;
            }

            .page-item {
                align-items: flex-start;

                flex-direction: column;
            }

            .page-actions {
                width: 100%;

                justify-content: flex-end;
            }
        }

        @media (max-width: 550px) {

            .heading-wrapper {
                align-items: flex-start;
            }

            .page-heading h1 {
                font-size: 27px;
            }

            .heading-icon {
                width: 48px;
                height: 48px;

                font-size: 23px;
            }

            .card-header {
                padding: 18px;
            }

            .page-item {
                padding: 20px 18px;
            }

            .page-left {
                gap: 10px;
            }

            .page-preview {
                max-width: 100%;
            }

            .header-actions {
                width: 100%;
            }

            .header-btn {
                flex: 1;
            }
        }
    </style>
</head>

<body>

    <!-- =========================================
         HEADER
    ========================================= -->

    <header class="header">

        <div class="logo">
            <i class="bi bi-book-half"></i>
            <span>Online Book Store</span>
        </div>


        <div class="header-actions">

            <!-- Admin Dashboard -->
            <a
                href="{{ route('admin.dashboard') }}"
                class="header-btn dashboard-btn"
            >
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>


            <!-- Books -->
            <a
                href="{{ route('books.index') }}"
                class="header-btn books-btn"
            >
                <i class="bi bi-book"></i>
                Books
            </a>


            <!-- Add Page -->
            <a
                href="{{ route('books.pages.create', $book->id) }}"
                class="header-btn add-btn"
            >
                <i class="bi bi-plus-lg"></i>
                Add Page
            </a>

        </div>

    </header>


    <!-- =========================================
         MAIN
    ========================================= -->

    <main class="container">


        <!-- PAGE HEADING -->

        <div class="page-heading">

            <div class="heading-wrapper">

                <div class="heading-icon">
                    <i class="bi bi-file-earmark-text"></i>
                </div>

                <div>

                    <h1>Book Pages</h1>

                    <p>
                        Manage and organize the pages of this book.
                    </p>

                </div>

            </div>

        </div>


        <!-- BOOK INFORMATION -->

        <div class="book-info">

            <div class="book-details">

                <div class="book-icon">
                    <i class="bi bi-book"></i>
                </div>


                <div class="book-text">

                    <span>Book</span>

                    <strong>
                        {{ $book->title }}
                    </strong>

                </div>

            </div>


            <div class="page-count">

                <i class="bi bi-files"></i>

                {{ $book->pages->count() }} Pages

            </div>

        </div>


        <!-- SUCCESS MESSAGE -->

        @if (session('success'))

            <div class="success-message">

                <i class="bi bi-check-circle-fill"></i>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        <!-- ERROR MESSAGE -->

        @if (session('error'))

            <div class="error-message">

                <i class="bi bi-exclamation-circle-fill"></i>

                <span>
                    {{ session('error') }}
                </span>

            </div>

        @endif


        <!-- PAGES CARD -->

        <div class="pages-card">


            <div class="card-header">

                <div class="card-title">

                    <i class="bi bi-list-ul"></i>

                    <span>All Pages</span>

                </div>

            </div>


            <div class="pages-list">


                @forelse ($book->pages as $index => $page)

                    <div class="page-item">


                        <!-- PAGE INFORMATION -->

                        <div class="page-left">


                            <div class="page-number">

                                {{ $index + 1 }}

                            </div>


                            <div class="page-content">


                                <h3>

                                    {{ $page->title ?: 'Page ' . ($index + 1) }}

                                </h3>


                                <div class="page-meta">

                                    @if ($page->chapter)

                                        <span class="chapter-badge">

                                            <i class="bi bi-journal-bookmark"></i>

                                            Chapter
                                            {{ $page->chapter->chapter_number }}

                                            @if ($page->chapter->title)

                                                - {{ $page->chapter->title }}

                                            @endif

                                        </span>

                                    @endif

                                </div>


                                @if ($page->content)

                                    <p class="page-preview">

                                        {{ \Illuminate\Support\Str::limit(strip_tags($page->content), 150) }}

                                    </p>

                                @endif


                            </div>

                        </div>


                        <!-- ACTION BUTTONS -->

                        <div class="page-actions">


                            <!-- EDIT -->

                            <a
                                href="{{ route('books.pages.edit', [$book->id, $page->id]) }}"
                                class="action-btn edit-btn"
                                title="Edit Page"
                            >

                                <i class="bi bi-pencil-square"></i>

                            </a>


                            <!-- DELETE -->

                            <form
                                action="{{ route('books.pages.destroy', [$book->id, $page->id]) }}"
                                method="POST"
                                class="delete-form"
                                onsubmit="return confirm('Are you sure you want to delete this page?');"
                            >

                                @csrf

                                @method('DELETE')


                                <button
                                    type="submit"
                                    class="action-btn delete-btn"
                                    title="Delete Page"
                                >

                                    <i class="bi bi-trash3"></i>

                                </button>

                            </form>


                        </div>


                    </div>


                @empty


                    <!-- EMPTY STATE -->

                    <div class="empty-state">


                        <div class="empty-icon">

                            <i class="bi bi-file-earmark-plus"></i>

                        </div>


                        <h3>
                            No Pages Yet
                        </h3>


                        <p>
                            This book does not have any pages yet.
                            Add the first page to start building the book.
                        </p>


                        <a
                            href="{{ route('books.pages.create', $book->id) }}"
                            class="empty-add-btn"
                        >

                            <i class="bi bi-plus-lg"></i>

                            Add First Page

                        </a>


                    </div>


                @endforelse


            </div>

        </div>


    </main>

</body>

</html>