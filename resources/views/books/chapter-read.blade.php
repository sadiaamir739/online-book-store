<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $chapter->title }} - {{ $book->title }}</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6fa;
            color: #17243d;
        }

        .navbar {
            background: #17243d;
            padding: 18px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .logo {
            color: #d9a943;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #e8edf5;
            text-decoration: none;
            font-size: 15px;
        }

        .nav-links a:hover {
            color: #d9a943;
        }

        .profile {
            color: #d9a943 !important;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 40px auto;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #17243d;
            color: white;
            padding: 11px 18px;
            border-radius: 7px;
            text-decoration: none;
            margin-bottom: 25px;
        }

        .back-btn:hover {
            background: #203758;
        }

        .reader {
            background: white;
            border-radius: 14px;
            padding: 50px 60px;
            box-shadow: 0 5px 20px rgba(23, 36, 61, 0.08);
        }

        .book-name {
            text-align: center;
            color: #8b671e;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .chapter-number {
            text-align: center;
            color: #777;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .chapter-title {
            text-align: center;
            color: #17243d;
            font-size: 34px;
            margin-bottom: 25px;
        }

        .divider {
            width: 80px;
            height: 3px;
            background: #d9a943;
            margin: 0 auto 35px;
            border-radius: 5px;
        }

        .page {
            border-bottom: 1px solid #e2e5eb;
            padding-bottom: 35px;
            margin-bottom: 35px;
        }

        .page:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .page-number {
            color: #8b671e;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .page-title {
            color: #17243d;
            font-size: 22px;
            margin-bottom: 18px;
        }

        .page-content {
            font-size: 18px;
            line-height: 2;
            color: #444;
            white-space: pre-line;
        }

        .no-pages {
            text-align: center;
            padding: 40px 20px;
            color: #777;
        }

        .no-pages i {
            display: block;
            font-size: 45px;
            color: #d9a943;
            margin-bottom: 15px;
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid #e2e5eb;
        }

        .nav-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 18px;
            background: #17243d;
            color: white;
            text-decoration: none;
            border-radius: 7px;
        }

        .nav-btn:hover {
            background: #203758;
        }

        .nav-btn.disabled {
            background: #dfe3e9;
            color: #888;
            pointer-events: none;
        }

        @media (max-width: 700px) {

            .navbar {
                padding: 16px 5%;
            }

            .nav-links {
                gap: 12px;
            }

            .container {
                width: 92%;
                margin: 25px auto;
            }

            .reader {
                padding: 30px 22px;
            }

            .chapter-title {
                font-size: 27px;
            }

            .page-content {
                font-size: 16px;
                line-height: 1.9;
            }

            .navigation {
                flex-direction: column;
            }

            .nav-btn {
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <a href="{{ route('home') }}" class="logo">
            <i class="bi bi-book-half"></i>
            Online Book Store
        </a>

        <div class="nav-links">

            <a href="{{ route('home') }}">
                <i class="bi bi-house"></i>
                Home
            </a>

            <a href="{{ route('books.index') }}">
                <i class="bi bi-book"></i>
                Books
            </a>

            <a href="{{ route('stories.index') }}">
                <i class="bi bi-journal-text"></i>
                Stories
            </a>

            @auth

                <a href="{{ route('profile') }}" class="profile">
                    <i class="bi bi-person-circle"></i>
                    Profile
                </a>

                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf

                    <button type="submit"
                        style="
                            background:none;
                            border:none;
                            color:#e8edf5;
                            cursor:pointer;
                            font-size:15px;
                        ">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </form>

            @else

                <a href="{{ route('login') }}">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Login
                </a>

                <a href="{{ route('register') }}">
                    <i class="bi bi-person-plus"></i>
                    Register
                </a>

            @endauth

        </div>

    </nav>


    <!-- MAIN -->
    <div class="container">

        <a href="{{ route('books.read', $book->id) }}" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Chapters
        </a>


        <!-- READER -->
        <div class="reader">

            <div class="book-name">
                <i class="bi bi-book"></i>
                {{ $book->title }}
            </div>

            <div class="chapter-number">
                Chapter {{ $chapter->chapter_number }}
            </div>

            <h1 class="chapter-title">
                {{ $chapter->title }}
            </h1>

            <div class="divider"></div>


            <!-- PAGES -->
            @if($chapter->pages->count() > 0)

                @foreach($chapter->pages as $page)

                    <div class="page">

                        <div class="page-number">
                            Page {{ $page->page_number }}
                        </div>

                        @if($page->title)

                            <h2 class="page-title">
                                {{ $page->title }}
                            </h2>

                        @endif

                        <div class="page-content">
                            {{ $page->content }}
                        </div>

                    </div>

                @endforeach

            @else

                <div class="no-pages">

                    <i class="bi bi-file-earmark-text"></i>

                    <p>
                        No pages have been added to this chapter yet.
                    </p>

                </div>

            @endif


            <!-- PREVIOUS / NEXT CHAPTER -->
            <div class="navigation">

                @if($previousChapter)

                    <a href="{{ route('books.chapters.read', [$book->id, $previousChapter->id]) }}"
                        class="nav-btn">

                        <i class="bi bi-arrow-left"></i>
                        Previous Chapter

                    </a>

                @else

                    <span class="nav-btn disabled">

                        <i class="bi bi-arrow-left"></i>
                        Previous Chapter

                    </span>

                @endif


                @if($nextChapter)

                    <a href="{{ route('books.chapters.read', [$book->id, $nextChapter->id]) }}"
                        class="nav-btn">

                        Next Chapter
                        <i class="bi bi-arrow-right"></i>

                    </a>

                @else

                    <span class="nav-btn disabled">

                        Next Chapter
                        <i class="bi bi-arrow-right"></i>

                    </span>

                @endif

            </div>

        </div>

    </div>

</body>

</html>