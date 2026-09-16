<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $book->title }} - Chapters</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            color: #222;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: #222;
            color: white;
            padding: 22px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
        }

        .header-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .header-btn {
            background: white;
            color: #222;
            text-decoration: none;
            padding: 10px 17px;
            border-radius: 6px;
            font-weight: bold;
        }

        .header-btn.dark {
            background: #444;
            color: white;
        }

        /* Container */
        .container {
            width: 90%;
            max-width: 1100px;
            margin: 45px auto;
        }

        /* Heading */
        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h1 {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .page-heading p {
            color: #777;
            font-size: 15px;
        }

        /* Success */
        .success {
            background: #d4edda;
            color: #155724;
            padding: 13px 17px;
            border-radius: 7px;
            margin-bottom: 25px;
            border: 1px solid #b7dfc0;
        }

        /* Chapter Card */
        .chapter-card {
            background: white;
            border-radius: 12px;
            margin-bottom: 22px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .chapter-header {
            padding: 22px 25px;
            background: #fafafa;
            border-bottom: 1px solid #eee;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .chapter-info {
            flex: 1;
        }

        .chapter-number {
            display: inline-block;
            background: #222;
            color: white;
            padding: 6px 11px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 9px;
        }

        .chapter-info h2 {
            font-size: 22px;
            margin-bottom: 5px;
        }

        .chapter-info p {
            color: #777;
            font-size: 14px;
        }

        /* Chapter Actions */
        .chapter-actions {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 9px 14px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .add-page {
            background: #222;
            color: white;
        }

        .edit {
            background: #eee;
            color: #222;
        }

        .delete {
            background: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.85;
        }

        /* Pages */
        .pages-section {
            padding: 20px 25px 25px;
        }

        .pages-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #444;
        }

        .page-card {
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            padding: 15px 17px;
            margin-bottom: 10px;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .page-card:last-child {
            margin-bottom: 0;
        }

        .page-info {
            flex: 1;
        }

        .page-number {
            color: #777;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .page-info h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .page-preview {
            color: #777;
            font-size: 13px;

            max-width: 700px;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .page-actions {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
        }

        .no-pages {
            background: #f8f8f8;
            border: 1px dashed #ccc;
            padding: 20px;
            border-radius: 7px;
            text-align: center;
            color: #777;
        }

        .no-chapters {
            background: white;
            padding: 50px 30px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .no-chapters h2 {
            margin-bottom: 10px;
        }

        .no-chapters p {
            color: #777;
            margin-bottom: 20px;
        }

        /* Bottom Button */
        .bottom-action {
            margin-top: 25px;
        }

        .bottom-action a {
            display: inline-block;
            background: #222;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 7px;
            font-weight: bold;
        }

        /* Mobile */
        @media (max-width: 750px) {

            .header {
                padding: 20px;
                flex-direction: column;
                align-items: flex-start;
            }

            .logo {
                font-size: 21px;
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

            .page-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-actions {
                width: 100%;
            }

            .page-actions .btn {
                flex: 1;
                text-align: center;
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
        📚 Online Book Store
    </div>

    <div class="header-buttons">

        <a href="{{ route('books.index') }}" class="header-btn">
            ← Books
        </a>

        <a href="{{ route('books.pages', $book->id) }}" class="header-btn dark">
            📖 All Pages
        </a>

        <a href="{{ route('books.chapters.create', $book->id) }}" class="header-btn">
            + Add Chapter
        </a>

    </div>

</header>


<main class="container">

    <div class="page-heading">

        <h1>
            📚 {{ $book->title }}
        </h1>

        <p>
            Manage chapters and pages of this book.
        </p>

    </div>


    @if(session('success'))

        <div class="success">
            ✅ {{ session('success') }}
        </div>

    @endif


    @forelse($book->chapters as $chapter)

        <div class="chapter-card">

            <!-- Chapter Header -->
            <div class="chapter-header">

                <div class="chapter-info">

                    <span class="chapter-number">
                        Chapter {{ $chapter->chapter_number }}
                    </span>

                    <h2>
                        {{ $chapter->title }}
                    </h2>

                    <p>
                        {{ $chapter->pages->count() }}
                        {{ $chapter->pages->count() == 1 ? 'Page' : 'Pages' }}
                    </p>

                </div>


                <div class="chapter-actions">

                    <a
                        href="{{ route('books.pages.create', $book->id) }}"
                        class="btn add-page"
                    >
                        + Add Page
                    </a>


                    <a
                        href="{{ route('books.chapters.edit', [$book->id, $chapter->id]) }}"
                        class="btn edit"
                    >
                        ✏️ Edit
                    </a>


                    <form
                        action="{{ route('books.chapters.destroy', [$book->id, $chapter->id]) }}"
                        method="POST"
                        style="display:inline;"
                        onsubmit="return confirm('Are you sure you want to delete this chapter? All pages inside this chapter will also be deleted.')"
                    >

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn delete">
                            🗑 Delete
                        </button>

                    </form>

                </div>

            </div>


            <!-- Pages -->
            <div class="pages-section">

                <div class="pages-title">
                    📄 Pages in this chapter
                </div>


                @forelse($chapter->pages as $page)

                    <div class="page-card">

                        <div class="page-info">

                            <div class="page-number">
                                Page {{ $page->page_number }}
                            </div>


                            <h3>
                                {{ $page->title ?: 'Untitled Page' }}
                            </h3>


                            <div class="page-preview">
                                {{ \Illuminate\Support\Str::limit($page->content, 120) }}
                            </div>

                        </div>


                        <div class="page-actions">

                            <a
                                href="{{ route('books.pages.edit', [$book->id, $page->id]) }}"
                                class="btn edit"
                            >
                                ✏️ Edit
                            </a>


                            <form
                                action="{{ route('books.pages.destroy', [$book->id, $page->id]) }}"
                                method="POST"
                                style="display:inline;"
                                onsubmit="return confirm('Are you sure you want to delete this page?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn delete">
                                    🗑 Delete
                                </button>

                            </form>

                        </div>

                    </div>

                @empty

                    <div class="no-pages">

                        📄 No pages in this chapter yet.

                        <br><br>

                        <a
                            href="{{ route('books.pages.create', $book->id) }}"
                            class="btn add-page"
                        >
                            + Add First Page
                        </a>

                    </div>

                @endforelse

            </div>

        </div>

    @empty

        <div class="no-chapters">

            <h2>
                📚 No Chapters Yet
            </h2>

            <p>
                This book doesn't have any chapters yet.
            </p>

            <a
                href="{{ route('books.chapters.create', $book->id) }}"
                class="bottom-action"
            >
                + Create First Chapter
            </a>

        </div>

    @endforelse


    @if($book->chapters->count() > 0)

        <div class="bottom-action">

            <a href="{{ route('books.chapters.create', $book->id) }}">
                + Add Another Chapter
            </a>

        </div>

    @endif

</main>

</body>
</html>
