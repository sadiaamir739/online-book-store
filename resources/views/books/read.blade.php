<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $book->title }} - Read Book</title>

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

        /* NAVBAR */
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

        .nav-links .profile {
            color: #d9a943;
        }

        /* MAIN */
        .container {
            width: 90%;
            max-width: 1000px;
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

        /* BOOK INFO */
        .book-info {
            background: white;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(23, 36, 61, 0.08);
            margin-bottom: 25px;
        }

        .book-header {
            display: flex;
            gap: 30px;
            align-items: flex-start;
        }

        .cover {
            width: 190px;
            height: 270px;
            object-fit: cover;
            border-radius: 10px;
            flex-shrink: 0;
        }

        .no-cover {
            width: 190px;
            height: 270px;
            border-radius: 10px;
            background: linear-gradient(135deg, #203758, #304e78);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #d9a943;
            font-size: 60px;
            flex-shrink: 0;
        }

        .book-details h1 {
            font-size: 36px;
            margin-bottom: 12px;
            color: #17243d;
        }

        .author {
            font-size: 17px;
            color: #666;
            margin-bottom: 18px;
        }

        .category {
            display: inline-block;
            background: #f6e8c6;
            color: #8b671e;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .description {
            color: #555;
            line-height: 1.8;
            font-size: 15px;
        }

        /* CHAPTERS */
        .chapters {
            background: white;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(23, 36, 61, 0.08);
        }

        .chapters-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 15px;
        }

        .chapters-header h2 {
            color: #17243d;
            font-size: 26px;
        }

        .chapter-count {
            background: #f6e8c6;
            color: #8b671e;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .chapter {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 18px 20px;
            margin-bottom: 12px;
            border: 1px solid #e2e5eb;
            border-radius: 9px;
            text-decoration: none;
            color: #17243d;
            transition: 0.2s;
        }

        .chapter:hover {
            background: #f8f9fb;
            border-color: #d9a943;
            transform: translateY(-2px);
        }

        .chapter-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .chapter-icon {
            width: 42px;
            height: 42px;
            border-radius: 8px;
            background: #17243d;
            color: #d9a943;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .chapter-number {
            font-size: 13px;
            color: #777;
            margin-bottom: 5px;
        }

        .chapter-title {
            font-size: 17px;
            font-weight: bold;
        }

        .chapter-arrow {
            color: #d9a943;
            font-size: 20px;
        }

        .no-chapters {
            text-align: center;
            padding: 40px 20px;
            color: #777;
        }

        .no-chapters i {
            font-size: 40px;
            color: #d9a943;
            display: block;
            margin-bottom: 12px;
        }

        /* MOBILE */
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

            .book-info,
            .chapters {
                padding: 22px;
            }

            .book-header {
                flex-direction: column;
            }

            .cover,
            .no-cover {
                width: 160px;
                height: 230px;
            }

            .book-details h1 {
                font-size: 28px;
            }

            .chapters-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .chapter {
                padding: 15px;
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
                <i class="bi bi-house"></i> Home
            </a>

            <a href="{{ route('books.index') }}">
                <i class="bi bi-book"></i> Books
            </a>

            <a href="{{ route('stories.index') }}">
                <i class="bi bi-journal-text"></i> Stories
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


    <!-- MAIN CONTENT -->
    <div class="container">

        <!-- BACK -->
        <a href="{{ route('books.index') }}" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Books
        </a>


        <!-- BOOK INFORMATION -->
        <div class="book-info">

            <div class="book-header">

                @if($book->cover_image)

                    <img
                        src="{{ asset('storage/' . $book->cover_image) }}"
                        alt="{{ $book->title }}"
                        class="cover"
                    >

                @else

                    <div class="no-cover">
                        <i class="bi bi-book"></i>
                    </div>

                @endif


                <div class="book-details">

                    <h1>{{ $book->title }}</h1>

                    <p class="author">
                        <i class="bi bi-person"></i>
                        By {{ $book->author }}
                    </p>

                    @if($book->category)

                        <span class="category">
                            <i class="bi bi-tag"></i>
                            {{ $book->category->name }}
                        </span>

                    @endif


                    @if($book->description)

                        <div class="description">
                            {{ $book->description }}
                        </div>

                    @endif

                </div>

            </div>

        </div>


        <!-- CHAPTERS -->
        <div class="chapters">

            <div class="chapters-header">

                <h2>
                    <i class="bi bi-list-ul"></i>
                    Book Chapters
                </h2>

                <span class="chapter-count">
                    {{ $book->chapters->count() }}
                    {{ $book->chapters->count() == 1 ? 'Chapter' : 'Chapters' }}
                </span>

            </div>


            @if($book->chapters->count() > 0)

                @foreach($book->chapters as $chapter)

                    <a
                        href="{{ route('books.chapters.read', [$book->id, $chapter->id]) }}"
                        class="chapter"
                    >

                        <div class="chapter-left">

                            <div class="chapter-icon">
                                <i class="bi bi-book"></i>
                            </div>

                            <div>

                                <div class="chapter-number">
                                    Chapter {{ $chapter->chapter_number }}
                                </div>

                                <div class="chapter-title">
                                    {{ $chapter->title }}
                                </div>

                            </div>

                        </div>

                        <div class="chapter-arrow">
                            <i class="bi bi-arrow-right"></i>
                        </div>

                    </a>

                @endforeach

            @else

                <div class="no-chapters">

                    <i class="bi bi-book"></i>

                    <p>
                        No chapters have been added to this book yet.
                    </p>

                </div>

            @endif

        </div>

    </div>

</body>

</html>