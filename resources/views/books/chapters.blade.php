<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $book->title }} - Chapters</title>

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6fa;
            color: #17243d;
            min-height: 100vh;
        }

        /* ================================
           HEADER
        ================================= */

        .header {
            background: #17243d;
            color: white;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            box-shadow: 0 3px 12px rgba(23, 36, 61, 0.18);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 24px;
            font-weight: bold;
        }

        .logo i {
            color: #d9a943;
            font-size: 27px;
        }

        .header-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .header-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: white;
            color: #17243d;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s ease;
        }

        .header-btn:hover {
            background: #d9a943;
            color: #17243d;
        }

        .header-btn.dark {
            background: #304e78;
            color: white;
        }

        .header-btn.dark:hover {
            background: #d9a943;
            color: #17243d;
        }

        /* ================================
           CONTAINER
        ================================= */

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 45px auto;
        }

        /* ================================
           HEADING
        ================================= */

        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h1 {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 32px;
            color: #17243d;
            margin-bottom: 8px;
        }

        .page-heading h1 i {
            color: #d9a943;
        }

        .page-heading p {
            color: #667085;
            font-size: 15px;
            line-height: 1.6;
        }

        /* ================================
           SUCCESS MESSAGE
        ================================= */

        .success {
            display: flex;
            align-items: center;
            gap: 9px;
            background: #edf7f0;
            color: #216e39;
            padding: 13px 17px;
            border-radius: 8px;
            margin-bottom: 25px;
            border: 1px solid #b9dfc2;
        }

        .success i {
            font-size: 18px;
        }

        /* ================================
           CHAPTER CARD
        ================================= */

        .chapter-card {
            background: white;
            border-radius: 12px;
            margin-bottom: 22px;
            box-shadow: 0 4px 15px rgba(23, 36, 61, 0.08);
            overflow: hidden;
        }

        .chapter-header {
            padding: 22px 25px;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .chapter-info {
            flex: 1;
        }

        .chapter-number {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #17243d;
            color: white;
            padding: 7px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .chapter-number i {
            color: #d9a943;
        }

        .chapter-info h2 {
            font-size: 22px;
            color: #17243d;
            margin-bottom: 6px;
        }

        .chapter-info p {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #667085;
            font-size: 14px;
        }

        .chapter-info p i {
            color: #304e78;
        }

        /* ================================
           CHAPTER ACTIONS
        ================================= */

        .chapter-actions {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 9px 14px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s ease;
        }

        .add-page {
            background: #304e78;
            color: white;
        }

        .add-page:hover {
            background: #17243d;
        }

        .edit {
            background: #e9edf3;
            color: #17243d;
        }

        .edit:hover {
            background: #d9a943;
            color: #17243d;
        }

        .delete {
            background: #c0392b;
            color: white;
        }

        .delete:hover {
            background: #a93226;
        }

        /* ================================
           PAGES SECTION
        ================================= */

        .pages-section {
            padding: 22px 25px 25px;
            background: #fafbfd;
        }

        .pages-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #17243d;
        }

        .pages-title i {
            color: #d9a943;
            font-size: 18px;
        }

        /* ================================
           PAGE CARD
        ================================= */

        .page-card {
            background: white;
            border: 1px solid #e1e6ee;
            border-radius: 9px;
            padding: 15px 17px;
            margin-bottom: 10px;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;

            transition: 0.2s ease;
        }

        .page-card:hover {
            border-color: #304e78;
            box-shadow: 0 3px 10px rgba(48, 78, 120, 0.08);
        }

        .page-card:last-child {
            margin-bottom: 0;
        }

        .page-info {
            flex: 1;
            min-width: 0;
        }

        .page-number {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #304e78;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .page-number i {
            color: #d9a943;
        }

        .page-info h3 {
            font-size: 16px;
            color: #17243d;
            margin-bottom: 5px;
        }

        .page-preview {
            color: #667085;
            font-size: 13px;
            max-width: 700px;
            line-height: 1.5;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ================================
           PAGE ACTIONS
        ================================= */

        .page-actions {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
        }

        /* ================================
           NO PAGES
        ================================= */

        .no-pages {
            background: white;
            border: 1px dashed #c8d0dc;
            padding: 25px 20px;
            border-radius: 8px;
            text-align: center;
            color: #667085;
        }

        .no-pages i {
            display: block;
            font-size: 28px;
            color: #d9a943;
            margin-bottom: 10px;
        }

        .no-pages-text {
            margin-bottom: 15px;
        }

        /* ================================
           NO CHAPTERS
        ================================= */

        .no-chapters {
            background: white;
            padding: 55px 30px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(23, 36, 61, 0.08);
        }

        .no-chapters > i {
            display: block;
            font-size: 48px;
            color: #d9a943;
            margin-bottom: 15px;
        }

        .no-chapters h2 {
            color: #17243d;
            margin-bottom: 10px;
        }

        .no-chapters p {
            color: #667085;
            margin-bottom: 20px;
        }

        /* ================================
           BOTTOM BUTTON
        ================================= */

        .bottom-action {
            margin-top: 25px;
        }

        .bottom-action a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #304e78;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 7px;
            font-weight: bold;
            transition: 0.2s ease;
        }

        .bottom-action a:hover {
            background: #17243d;
        }

        /* ================================
           MOBILE
        ================================= */

        @media (max-width: 750px) {

            .header {
                padding: 20px;
                flex-direction: column;
                align-items: flex-start;
            }

            .logo {
                font-size: 21px;
            }

            .header-buttons {
                width: 100%;
            }

            .header-btn {
                flex: 1;
                justify-content: center;
            }

            .container {
                width: 92%;
                margin: 30px auto;
            }

            .page-heading h1 {
                font-size: 27px;
            }

            .chapter-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .chapter-actions {
                width: 100%;
            }

            .chapter-actions .btn {
                flex: 1;
            }

            .page-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-actions {
                width: 100%;
            }

            .page-actions .btn {
                flex: 1;
            }

            .page-preview {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

<header class="header">

    <div class="logo">
        <i class="bi bi-book-half"></i>
        <span>Online Book Store</span>
    </div>

    <div class="header-buttons">

        <a
            href="{{ route('books.index') }}"
            class="header-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Books
        </a>

        <a
            href="{{ route('books.pages', $book->id) }}"
            class="header-btn dark"
        >
            <i class="bi bi-file-earmark-text"></i>
            All Pages
        </a>

        <a
            href="{{ route('books.chapters.create', $book->id) }}"
            class="header-btn"
        >
            <i class="bi bi-plus-circle"></i>
            Add Chapter
        </a>

    </div>

</header>


<main class="container">

    <!-- PAGE HEADING -->

    <div class="page-heading">

        <h1>
            <i class="bi bi-journal-bookmark"></i>
            {{ $book->title }}
        </h1>

        <p>
            Manage chapters and pages of this book.
        </p>

    </div>


    <!-- SUCCESS MESSAGE -->

    @if(session('success'))

        <div class="success">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
        </div>

    @endif


    <!-- CHAPTERS -->

    @forelse($book->chapters as $chapter)

        <div class="chapter-card">

            <!-- CHAPTER HEADER -->

            <div class="chapter-header">

                <div class="chapter-info">

                    <span class="chapter-number">
                        <i class="bi bi-bookmark-fill"></i>
                        Chapter {{ $chapter->chapter_number }}
                    </span>

                    <h2>
                        {{ $chapter->title }}
                    </h2>

                    <p>
                        <i class="bi bi-file-earmark-text"></i>

                        {{ $chapter->pages->count() }}

                        {{ $chapter->pages->count() == 1 ? 'Page' : 'Pages' }}
                    </p>

                </div>


                <!-- CHAPTER ACTIONS -->

                <div class="chapter-actions">

                    <a
                        href="{{ route('books.pages.create', $book->id) }}"
                        class="btn add-page"
                    >
                        <i class="bi bi-file-earmark-plus"></i>
                        Add Page
                    </a>


                    <a
                        href="{{ route('books.chapters.edit', [$book->id, $chapter->id]) }}"
                        class="btn edit"
                    >
                        <i class="bi bi-pencil-square"></i>
                        Edit
                    </a>


                    <form
                        action="{{ route('books.chapters.destroy', [$book->id, $chapter->id]) }}"
                        method="POST"
                        style="display:inline;"
                        onsubmit="return confirm('Are you sure you want to delete this chapter? All pages inside this chapter will also be deleted.')"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn delete"
                        >
                            <i class="bi bi-trash3"></i>
                            Delete
                        </button>

                    </form>

                </div>

            </div>


            <!-- PAGES -->

            <div class="pages-section">

                <div class="pages-title">
                    <i class="bi bi-files"></i>
                    Pages in this chapter
                </div>


                @forelse($chapter->pages as $page)

                    <div class="page-card">

                        <div class="page-info">

                            <div class="page-number">
                                <i class="bi bi-file-earmark"></i>
                                Page {{ $page->page_number }}
                            </div>


                            <h3>
                                {{ $page->title ?: 'Untitled Page' }}
                            </h3>


                            <div class="page-preview">
                                {{ \Illuminate\Support\Str::limit($page->content, 120) }}
                            </div>

                        </div>


                        <!-- PAGE ACTIONS -->

                        <div class="page-actions">

                            <a
                                href="{{ route('books.pages.edit', [$book->id, $page->id]) }}"
                                class="btn edit"
                            >
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>


                            <form
                                action="{{ route('books.pages.destroy', [$book->id, $page->id]) }}"
                                method="POST"
                                style="display:inline;"
                                onsubmit="return confirm('Are you sure you want to delete this page?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn delete"
                                >
                                    <i class="bi bi-trash3"></i>
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                @empty

                    <div class="no-pages">

                        <i class="bi bi-file-earmark-plus"></i>

                        <div class="no-pages-text">
                            No pages in this chapter yet.
                        </div>

                        <a
                            href="{{ route('books.pages.create', $book->id) }}"
                            class="btn add-page"
                        >
                            <i class="bi bi-plus-circle"></i>
                            Add First Page
                        </a>

                    </div>

                @endforelse

            </div>

        </div>

    @empty

        <!-- NO CHAPTERS -->

        <div class="no-chapters">

            <i class="bi bi-journal-x"></i>

            <h2>
                No Chapters Yet
            </h2>

            <p>
                This book doesn't have any chapters yet.
            </p>

            <div class="bottom-action">

                <a
                    href="{{ route('books.chapters.create', $book->id) }}"
                >
                    <i class="bi bi-plus-circle"></i>
                    Create First Chapter
                </a>

            </div>

        </div>

    @endforelse


    <!-- ADD ANOTHER CHAPTER -->

    @if($book->chapters->count() > 0)

        <div class="bottom-action">

            <a
                href="{{ route('books.chapters.create', $book->id) }}"
            >
                <i class="bi bi-plus-circle"></i>
                Add Another Chapter
            </a>

        </div>

    @endif

</main>

</body>

</html>