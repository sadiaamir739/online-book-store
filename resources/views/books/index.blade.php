<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Books | Online Book Store</title>

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6fa;
            color: #17243d;
        }

        a {
            text-decoration: none;
        }

        button,
        input {
            font-family: inherit;
        }

        /* =========================
           NAVBAR
        ========================== */

        .navbar {
            min-height: 76px;
            background: #17243d;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 5%;
            box-shadow: 0 3px 15px rgba(23, 36, 61, 0.15);
        }

        .logo {
            color: white;
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 9px;
            white-space: nowrap;
        }

        .logo i {
            color: #d9a943;
            font-size: 27px;
        }

        .logo span:last-child {
            color: #d9a943;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-links a {
            color: white;
            font-size: 14px;
            font-weight: 600;
            padding: 10px 13px;
            border-radius: 7px;
            transition: 0.25s ease;
        }

        .nav-links a:hover {
            background: #304e78;
        }

        .nav-links a i {
            margin-right: 5px;
        }

        .login-btn {
            background: white !important;
            color: #17243d !important;
        }

        .register-btn {
            background: #d9a943 !important;
            color: #17243d !important;
        }

        .logout-btn {
            border: none;
            background: white;
            color: #17243d;
            padding: 10px 13px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        /* =========================
           HERO
        ========================== */

        .hero {
            background: linear-gradient(
                135deg,
                #203758 0%,
                #304e78 100%
            );

            padding: 65px 8%;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-small {
            color: #d9a943;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 15px;
        }

        .hero h1 {
            color: white;
            font-size: 48px;
            line-height: 1.2;
            margin-bottom: 17px;
        }

        .hero h1 span {
            color: #d9a943;
        }

        .hero p {
            color: #e8edf5;
            font-size: 17px;
            max-width: 700px;
            margin: auto;
            line-height: 1.7;
        }

        /* =========================
           ADMIN BAR
        ========================== */

        .admin-bar {
            width: 88%;
            max-width: 1200px;
            margin: 30px auto 0;
            background: white;
            border: 1px solid #e5e8ee;
            border-radius: 12px;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            box-shadow: 0 6px 20px rgba(23, 36, 61, 0.08);
        }

        .admin-bar-left {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #17243d;
            font-weight: 700;
        }

        .admin-bar-left i {
            color: #d9a943;
            font-size: 20px;
        }

        .admin-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .dashboard-btn,
        .add-book-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 15px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .dashboard-btn {
            background: #17243d;
            color: white;
        }

        .dashboard-btn:hover {
            background: #304e78;
        }

        .add-book-btn {
            background: #d9a943;
            color: #17243d;
        }

        .add-book-btn:hover {
            background: #e4b858;
        }

        /* =========================
           SEARCH
        ========================== */

        .search-box {
            width: 80%;
            max-width: 850px;
            margin: 25px auto 50px;
            background: white;
            padding: 10px;
            border-radius: 14px;
            display: flex;
            box-shadow: 0 12px 30px rgba(23, 36, 61, 0.15);
        }

        .search-box input {
            flex: 1;
            border: none;
            outline: none;
            padding: 16px;
            font-size: 15px;
            color: #17243d;
        }

        .search-box button {
            border: none;
            background: #304e78;
            color: white;
            padding: 0 27px;
            border-radius: 9px;
            font-weight: 700;
            cursor: pointer;
        }

        .search-box button:hover {
            background: #d9a943;
            color: #17243d;
        }

        /* =========================
           CONTAINER
        ========================== */

        .container {
            width: 88%;
            max-width: 1200px;
            margin: auto;
            padding-bottom: 80px;
        }

        /* =========================
           SECTION HEADING
        ========================== */

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .section-heading h2 {
            font-size: 30px;
            color: #17243d;
        }

        .section-heading h2 i {
            color: #d9a943;
            margin-right: 8px;
        }

        .section-heading span {
            color: #d9a943;
        }

        /* =========================
           BOOK GRID
        ========================== */

        .book-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        /* =========================
           BOOK CARD
        ========================== */

        .book-card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 8px 22px rgba(23, 36, 61, 0.09);
            transition: 0.3s ease;
            border: 1px solid #edf0f5;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(23, 36, 61, 0.15);
        }

        /* =========================
           COVER
        ========================== */

        .book-cover {
            height: 230px;
            background: linear-gradient(
                135deg,
                #243b60,
                #38577f
            );
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
        }

        .book-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .book-cover-icon {
            font-size: 65px;
            color: #d9a943;
        }

        /* =========================
           INFO
        ========================== */

        .book-info {
            padding: 20px;
        }

        .book-info h3 {
            font-size: 18px;
            color: #17243d;
            margin-bottom: 8px;
            line-height: 1.4;
            min-height: 50px;
        }

        .author {
            color: #777;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .author i {
            color: #304e78;
            margin-right: 5px;
        }

        .category {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #f6e8c6;
            color: #8b671e;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .price {
            margin-top: 12px;
            font-size: 15px;
            font-weight: 700;
            color: #304e78;
        }

        .price i {
            color: #d9a943;
            margin-right: 4px;
        }

        /* =========================
           READ BUTTON
        ========================== */

        .read-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            margin-top: 16px;
            padding: 11px;
            background: #d9a943;
            color: #17243d;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 700;
        }

        .read-btn:hover {
            background: #17243d;
            color: white;
        }

        /* =========================
           ADMIN BOOK BUTTONS
        ========================== */

        .admin-book-actions {
            margin-top: 12px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .admin-book-actions a,
        .delete-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 9px 6px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            border: none;
        }

        .pages-btn {
            background: #e8edf5;
            color: #17243d;
        }

        .pages-btn:hover {
            background: #304e78;
            color: white;
        }

        .edit-btn {
            background: #f6e8c6;
            color: #8b671e;
        }

        .edit-btn:hover {
            background: #d9a943;
            color: #17243d;
        }

        .delete-btn {
            background: #f3dddd;
            color: #9a2f2f;
        }

        .delete-btn:hover {
            background: #9a2f2f;
            color: white;
        }

        .manage-pages-btn {
            grid-column: 1 / -1;
            background: #17243d;
            color: white;
        }

        .manage-pages-btn:hover {
            background: #304e78;
        }

        /* =========================
           EMPTY
        ========================== */

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            background: white;
            padding: 60px 20px;
            border-radius: 14px;
            box-shadow: 0 8px 22px rgba(23, 36, 61, 0.07);
        }

        .empty-state i {
            font-size: 55px;
            color: #d9a943;
            display: block;
            margin-bottom: 15px;
        }

        .empty-state h3 {
            color: #17243d;
            margin-bottom: 7px;
        }

        .empty-state p {
            color: #777;
        }

        /* =========================
           FOOTER
        ========================== */

        footer {
            background: #17243d;
            color: white;
            text-align: center;
            padding: 28px 20px;
        }

        footer .footer-icon {
            color: #d9a943;
            font-size: 20px;
            margin-right: 6px;
        }

        footer span {
            color: #d9a943;
            font-weight: 700;
        }

        footer p {
            color: #aeb8c8;
            font-size: 13px;
            margin-top: 5px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media(max-width: 1050px) {
            .book-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media(max-width: 850px) {
            .book-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .navbar {
                padding: 15px 4%;
            }

            .logo {
                font-size: 21px;
            }

            .hero h1 {
                font-size: 40px;
            }

            .admin-bar {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media(max-width: 650px) {
            .navbar {
                padding: 20px;
                flex-direction: column;
                gap: 18px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero {
                padding: 60px 20px 70px;
            }

            .hero h1 {
                font-size: 35px;
            }

            .search-box {
                width: 90%;
                flex-direction: column;
                gap: 8px;
            }

            .search-box button {
                padding: 14px;
            }

            .container {
                width: 90%;
            }
        }

        @media(max-width: 500px) {
            .book-grid {
                grid-template-columns: 1fr;
            }

            .book-cover {
                height: 250px;
            }

            .logo {
                font-size: 20px;
            }
        }

    </style>

</head>

<body>

    @include('partials.navbar')

    <!-- =========================
         NAVBAR
    ========================== -->

    <nav class="navbar legacy-navbar">

        <a href="{{ url('/') }}" class="logo">

            <i class="bi bi-book-half"></i>

            <span style="color:white;">
                Online
            </span>

            <span>
                Book Store
            </span>

        </a>

        <div class="nav-links">

            <a href="{{ url('/') }}">
                <i class="bi bi-house"></i>
                Home
            </a>

            <a href="{{ route('books.index') }}">
                <i class="bi bi-book"></i>
                Books
            </a>

            <a href="{{ route('categories.index') }}">
                <i class="bi bi-grid"></i>
                Categories
            </a>

            <a href="{{ route('stories.index') }}">
                <i class="bi bi-journal-text"></i>
                Stories
            </a>

            @auth

                <a href="{{ route('profile') }}">
                    <i class="bi bi-person-circle"></i>
                    Profile
                </a>

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                    style="display:inline;"
                >
                    @csrf

                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>

                </form>

            @else

                <a href="{{ route('login') }}" class="login-btn">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Login
                </a>

                <a href="{{ route('register') }}" class="register-btn">
                    <i class="bi bi-person-plus"></i>
                    Register
                </a>

            @endauth

        </div>

    </nav>


    <!-- =========================
         HERO
    ========================== -->

    <section class="hero">

        <div class="hero-small">
            <i class="bi bi-bookmark-star"></i>
            &nbsp; YOUR DIGITAL READING SPACE
        </div>

        <h1>
            Explore Our <span>Books</span>
        </h1>

        <p>
            Discover interesting books, explore different genres,
            and find your next favorite story.
        </p>

    </section>


    <!-- =========================
         SEARCH
    ========================== -->

    <form
        class="search-box"
        method="GET"
        action="{{ route('books.index') }}"
    >

        <input
            type="text"
            name="search"
            placeholder="Search for a book, author, or category..."
            value="{{ request('search') }}"
        >

        <button type="submit">
            <i class="bi bi-search"></i>
            Search
        </button>

    </form>


    <!-- =========================
         BOOKS
    ========================== -->

    <main class="container">

        <div class="section-heading">

            <h2>
                <i class="bi bi-stars"></i>
                Featured <span>Books</span>
            </h2>

        </div>


        <div class="book-grid">

            @forelse($books as $book)

                <div class="book-card">

                    <!-- COVER -->

                    <div class="book-cover">

                        @if($book->cover_image)

                            <img
                                src="{{ asset('storage/' . $book->cover_image) }}"
                                alt="{{ $book->title }}"
                            >

                        @else

                            <i class="bi bi-book book-cover-icon"></i>

                        @endif

                    </div>


                    <!-- INFO -->

                    <div class="book-info">

                        <h3>
                            {{ $book->title }}
                        </h3>


                        <div class="author">

                            <i class="bi bi-person"></i>

                            By {{ $book->author ?? 'Unknown Author' }}

                        </div>

                        @if($book->language)
                            <span class="category">
                                <i class="bi bi-translate"></i>
                                {{ $book->language }}
                            </span>
                        @endif


                        @if($book->category)

                            <span class="category">

                                <i class="bi bi-bookmark"></i>

                                {{ $book->category->name }}

                            </span>

                        @else

                            <span class="category">

                                <i class="bi bi-bookmark"></i>

                                General

                            </span>

                        @endif


                        @if(isset($book->price))

                            <div class="price">

                                <i class="bi bi-tag"></i>

                                {{ $book->price }}

                            </div>

                        @endif


                        <!-- READ -->

                        <a
                            href="{{ route('books.read', $book->id) }}"
                            class="read-btn"
                        >

                            <i class="bi bi-book-open"></i>

                            Read Book

                        </a>


                        <!-- ADMIN MANAGEMENT -->

                        @auth

                            @if(auth()->user()->is_admin)

                                <div class="admin-book-actions">

                                    @unless($book->published)

                                        <form
                                            action="{{ route('books.approve', $book->id) }}"
                                            method="POST"
                                        >
                                            @csrf
                                            <button type="submit" class="edit-btn" style="width:100%;">
                                                <i class="bi bi-check-circle"></i>
                                                Approve
                                            </button>
                                        </form>

                                    @endunless

                                    <!-- PAGES -->

                                    <a
                                        href="{{ route('books.pages', $book->id) }}"
                                        class="pages-btn"
                                    >
                                        <i class="bi bi-file-text"></i>
                                        Pages
                                    </a>


                                    <!-- EDIT -->

                                    <a
                                        href="{{ route('books.edit', $book->id) }}"
                                        class="edit-btn"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                        Edit
                                    </a>


                                    <!-- CHAPTERS -->

                                    <a
                                        href="{{ route('books.chapters', $book->id) }}"
                                        class="manage-pages-btn"
                                    >
                                        <i class="bi bi-collection"></i>
                                        Manage Chapters
                                    </a>


                                    <!-- DELETE -->

                                    <form
                                        action="{{ route('books.destroy', $book->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this book?');"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="delete-btn"
                                            style="width:100%;"
                                        >
                                            <i class="bi bi-trash3"></i>
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            @endif

                        @endauth

                    </div>

                </div>

            @empty

                <div class="empty-state">

                    <i class="bi bi-book"></i>

                    <h3>
                        No Books Available
                    </h3>

                    <p>
                        There are no books available at the moment.
                    </p>

                    @auth

                        @if(auth()->user()->is_admin)

                            <a
                                href="{{ route('books.create') }}"
                                class="add-book-btn"
                                style="display:inline-flex; margin-top:20px;"
                            >
                                <i class="bi bi-plus-circle"></i>
                                Add Your First Book
                            </a>

                        @endif

                    @endauth

                </div>

            @endforelse

        </div>

    </main>


    <!-- =========================
         FOOTER
    ========================== -->

    <footer>

        <div>

            <i class="bi bi-book-half footer-icon"></i>

            © {{ date('Y') }}

            <span>
                Online Book Store
            </span>

        </div>

        <p>
            Read. Discover. Enjoy.
        </p>

    </footer>

</body>

</html>