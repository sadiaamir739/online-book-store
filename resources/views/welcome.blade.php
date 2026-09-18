<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Online Book Store | Read. Discover. Enjoy.</title>

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        /* ================================
           GLOBAL
        ================================= */

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
            color: #202634;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        button,
        input {
            font-family: inherit;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }


        /* ================================
           NAVBAR
        ================================= */

        .navbar {
            background: #17233c;
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 5%;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.12);
        }

        .logo {
            color: white;
            font-size: 23px;
            font-weight: 700;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo i {
            color: #d4a84f;
            font-size: 25px;
        }

        .logo span {
            color: #d4a84f;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .nav-links a {
            color: #ffffff;
            padding: 10px 14px;
            border-radius: 7px;
            font-size: 14px;
            transition: 0.25s ease;
        }

        .nav-links a:hover {
            background: #344e72;
        }

        .login-btn {
            background: #ffffff !important;
            color: #17233c !important;
            font-weight: 700;
        }

        .login-btn:hover {
            background: #f0f2f5 !important;
        }

        .register-btn {
            background: #d4a84f !important;
            color: #17233c !important;
            font-weight: 700;
        }

        .register-btn:hover {
            background: #e0b965 !important;
        }

        .profile-btn {
            background: #344e72;
            font-weight: 700;
        }

        .profile-btn i {
            margin-right: 4px;
        }

        .logout-form {
            display: inline;
        }

        .logout-btn {
            background: #344e72;
            color: white;
            border: none;
            padding: 10px 14px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .logout-btn:hover {
            background: #466489;
        }

        .logout-btn i {
            margin-right: 4px;
        }


        /* ================================
           HERO
        ================================= */

        .hero {
            background:
                linear-gradient(
                    135deg,
                    #17233c 0%,
                    #243a5c 55%,
                    #344e72 100%
                );

            color: white;
            padding: 90px 20px 100px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            font-family: "bootstrap-icons";
            content: "\f1c6";
            font-size: 260px;
            right: 5%;
            top: 20px;
            opacity: 0.05;
            transform: rotate(-10deg);
        }

        .hero-content {
            max-width: 850px;
            position: relative;
            z-index: 2;
        }

        .hero-label {
            display: inline-block;
            color: #d4a84f;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .hero h1 {
            font-size: 58px;
            line-height: 1.1;
            margin-bottom: 22px;
        }

        .hero h1 span {
            color: #d4a84f;
        }

        .hero p {
            color: #dce4ef;
            font-size: 18px;
            max-width: 680px;
            margin-bottom: 32px;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .hero-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 25px;
            border-radius: 8px;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .hero-btn-primary {
            background: #d4a84f;
            color: #17233c;
        }

        .hero-btn-primary:hover {
            transform: translateY(-2px);
            background: #e0b965;
        }

        .hero-btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.25);
        }

        .hero-btn-secondary:hover {
            background: rgba(255, 255, 255, 0.18);
        }


        /* ================================
           SEARCH
        ================================= */

        .search-wrapper {
            margin-top: -35px;
            position: relative;
            z-index: 10;
        }

        .search-box {
            background: white;
            padding: 10px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(23, 35, 60, 0.15);
            display: flex;
            max-width: 850px;
            margin: auto;
        }

        .search-box input {
            flex: 1;
            border: none;
            outline: none;
            padding: 14px 18px;
            font-size: 15px;
            color: #202634;
        }

        .search-box button {
            border: none;
            background: #344e72;
            color: white;
            padding: 0 25px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .search-box button:hover {
            background: #17233c;
        }

        .search-box button i {
            margin-right: 5px;
        }


        /* ================================
           SECTION
        ================================= */

        .section {
            padding: 80px 0;
        }

        .section-header {
            display: flex;
            align-items: end;
            justify-content: space-between;
            margin-bottom: 35px;
            gap: 20px;
        }

        .section-title {
            font-size: 34px;
            color: #17233c;
            margin-bottom: 7px;
        }

        .section-subtitle {
            color: #667085;
            font-size: 15px;
        }

        .view-all {
            color: #344e72;
            font-weight: 700;
            font-size: 14px;
            transition: 0.25s ease;
        }

        .view-all:hover {
            color: #d4a84f;
        }


        /* ================================
           BOOK CARDS
        ================================= */

        .books-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .book-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(23, 35, 60, 0.08);
            transition: 0.3s ease;
        }

        .book-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(23, 35, 60, 0.15);
        }

        .book-cover {
            height: 260px;
            background: linear-gradient(
                145deg,
                #344e72,
                #17233c
            );
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
        }

        .book-cover .book-icon {
            font-size: 65px;
            color: #d4a84f;
        }

        .book-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: #d4a84f;
            color: #17233c;
            padding: 5px 9px;
            border-radius: 5px;
            font-size: 11px;
            font-weight: 700;
        }

        .book-info {
            padding: 20px;
        }

        .book-category {
            color: #d4a84f;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .book-title {
            color: #17233c;
            font-size: 18px;
            margin: 7px 0;
        }

        .book-author {
            color: #667085;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .read-btn {
            display: block;
            text-align: center;
            background: #17233c;
            color: white;
            padding: 10px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 700;
            transition: 0.2s;
        }

        .read-btn:hover {
            background: #344e72;
        }

        .read-btn i {
            margin-right: 5px;
        }


        /* ================================
           CATEGORIES
        ================================= */

        .categories-section {
            background: #ffffff;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .category-card {
            background: #f4f6fa;
            border: 1px solid #e3e7ee;
            padding: 28px 20px;
            border-radius: 12px;
            text-align: center;
            color: #17233c;
            transition: 0.25s ease;
        }

        .category-card:hover {
            background: #17233c;
            color: white;
            transform: translateY(-4px);
        }

        .category-icon {
            font-size: 40px;
            color: #344e72;
            margin-bottom: 12px;
            transition: 0.25s ease;
        }

        .category-card:hover .category-icon {
            color: #d4a84f;
        }

        .category-card h3 {
            font-size: 17px;
            margin-bottom: 5px;
        }

        .category-card p {
            color: #667085;
            font-size: 13px;
        }

        .category-card:hover p {
            color: #dce4ef;
        }


        /* ================================
           READING CTA
        ================================= */

        .reading-section {
            padding: 80px 0;
        }

        .reading-box {
            background: #17233c;
            border-radius: 18px;
            padding: 60px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            overflow: hidden;
            position: relative;
        }

        .reading-box::after {
            font-family: "bootstrap-icons";
            content: "\f2e7";
            position: absolute;
            right: 40px;
            bottom: -35px;
            font-size: 190px;
            opacity: 0.06;
        }

        .reading-content {
            position: relative;
            z-index: 2;
            max-width: 700px;
        }

        .reading-content h2 {
            font-size: 36px;
            margin-bottom: 12px;
        }

        .reading-content p {
            color: #dce4ef;
            margin-bottom: 25px;
        }

        .gold-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #d4a84f;
            color: #17233c;
            padding: 13px 24px;
            border-radius: 7px;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .gold-btn:hover {
            background: #e0b965;
        }


        /* ================================
           STORIES
        ================================= */

        .stories-section {
            background: #ffffff;
        }

        .story-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .story-card {
            border: 1px solid #e3e7ee;
            border-radius: 12px;
            padding: 25px;
            background: white;
            transition: 0.25s ease;
        }

        .story-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(23, 35, 60, 0.09);
        }

        .story-icon {
            font-size: 35px;
            color: #d4a84f;
            margin-bottom: 15px;
        }

        .story-card h3 {
            color: #17233c;
            margin-bottom: 9px;
        }

        .story-card p {
            color: #667085;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .story-link {
            color: #344e72;
            font-weight: 700;
            font-size: 13px;
        }

        .story-link:hover {
            color: #d4a84f;
        }


        /* ================================
           FEATURES
        ================================= */

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .feature-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(23, 35, 60, 0.07);
        }

        .feature-icon {
            font-size: 42px;
            color: #d4a84f;
            margin-bottom: 15px;
        }

        .feature-card h3 {
            color: #17233c;
            margin-bottom: 10px;
        }

        .feature-card p {
            color: #667085;
            font-size: 14px;
        }


        /* ================================
           FOOTER
        ================================= */

        .footer {
            background: #111a2d;
            color: white;
            padding: 50px 0 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            padding-bottom: 35px;
        }

        .footer-brand h2 {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-brand h2 i {
            color: #d4a84f;
        }

        .footer-brand h2 span {
            color: #d4a84f;
        }

        .footer-brand p {
            color: #aeb8c8;
            font-size: 14px;
            max-width: 350px;
        }

        .footer-column h3 {
            margin-bottom: 15px;
            font-size: 15px;
        }

        .footer-column a {
            display: block;
            color: #aeb8c8;
            margin-bottom: 9px;
            font-size: 13px;
            transition: 0.2s ease;
        }

        .footer-column a:hover {
            color: #d4a84f;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            text-align: center;
            color: #8f9bad;
            font-size: 13px;
        }


        /* ================================
           MOBILE
        ================================= */

        @media (max-width: 1000px) {

            .books-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero h1 {
                font-size: 48px;
            }
        }


        @media (max-width: 750px) {

            .navbar {
                flex-direction: column;
                padding: 18px 15px;
                gap: 15px;
            }

            .nav-links {
                justify-content: center;
                flex-wrap: wrap;
            }

            .hero {
                padding: 65px 20px 80px;
            }

            .hero h1 {
                font-size: 38px;
            }

            .hero p {
                font-size: 16px;
            }

            .section {
                padding: 60px 0;
            }

            .section-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .reading-box {
                padding: 40px 25px;
            }

            .reading-content h2 {
                font-size: 28px;
            }

            .story-grid,
            .features {
                grid-template-columns: 1fr;
            }
        }


        @media (max-width: 500px) {

            .books-grid,
            .categories-grid {
                grid-template-columns: 1fr;
            }

            .search-box {
                flex-direction: column;
                gap: 8px;
            }

            .search-box button {
                padding: 13px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .hero-btn {
                justify-content: center;
                text-align: center;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .book-cover {
                height: 230px;
            }

        }

    </style>

</head>


<body>


<!-- =========================================
     NAVBAR
========================================== -->

<nav class="navbar">

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
            Home
        </a>

        <a href="{{ route('books.index') }}">
            Books
        </a>

        <a href="{{ route('categories.index') }}">
            Categories
        </a>

        <a href="{{ route('stories.index') }}">
            Stories
        </a>


        @auth

            <a
                href="{{ route('profile') }}"
                class="profile-btn"
            >
                <i class="bi bi-person-circle"></i>
                Profile
            </a>


            <form
                action="{{ route('logout') }}"
                method="POST"
                class="logout-form"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                >
                    <i class="bi bi-box-arrow-right"></i>
                    Logout
                </button>

            </form>


        @else


            <a
                href="{{ route('login') }}"
                class="login-btn"
            >
                <i class="bi bi-box-arrow-in-right"></i>
                Login
            </a>


            <a
                href="{{ route('register') }}"
                class="register-btn"
            >
                <i class="bi bi-person-plus"></i>
                Register
            </a>


        @endauth

    </div>

</nav>



<!-- =========================================
     HERO
========================================== -->

<section class="hero">

    <div class="container">

        <div class="hero-content">

            <div class="hero-label">
                YOUR DIGITAL READING SPACE
            </div>

            <h1>

                Discover Your Next

                <span>
                    Great Read.
                </span>

            </h1>


            <p>

                Explore a growing collection of books,
                discover interesting stories, and enjoy
                reading anytime, anywhere.

            </p>


            <div class="hero-buttons">


                <a
                    href="{{ route('books.index') }}"
                    class="hero-btn hero-btn-primary"
                >

                    <i class="bi bi-book"></i>

                    Explore Books

                </a>


                <a
                    href="{{ route('categories.index') }}"
                    class="hero-btn hero-btn-secondary"
                >

                    <i class="bi bi-grid"></i>

                    Browse Categories

                </a>


            </div>

        </div>

    </div>

</section>



<!-- =========================================
     SEARCH
========================================== -->

<div class="search-wrapper">

    <div class="container">

        <form
            action="{{ route('books.index') }}"
            method="GET"
            class="search-box"
        >

            <input
                type="text"
                name="search"
                placeholder="Search for a book, author, or category..."
            >


            <button type="submit">

                <i class="bi bi-search"></i>

                Search

            </button>

        </form>

    </div>

</div>



<!-- =========================================
     FEATURED BOOKS
========================================== -->

<section class="section">

    <div class="container">


        <div class="section-header">

            <div>

                <h2 class="section-title">
                    Featured Books
                </h2>

                <p class="section-subtitle">
                    Discover books you might enjoy reading.
                </p>

            </div>


            <a
                href="{{ route('books.index') }}"
                class="view-all"
            >
                View All Books
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>



        <div class="books-grid">


            <!-- BOOK 1 -->

            <div class="book-card">

                <div class="book-cover">

                    <span class="book-badge">
                        FEATURED
                    </span>

                    <span class="book-icon">
                        <i class="bi bi-book"></i>
                    </span>

                </div>


                <div class="book-info">

                    <div class="book-category">
                        Fiction
                    </div>

                    <h3 class="book-title">
                        The Silent Chapter
                    </h3>

                    <p class="book-author">
                        By Featured Author
                    </p>


                    <a
                        href="{{ route('books.index') }}"
                        class="read-btn"
                    >

                        <i class="bi bi-book-open"></i>

                        Read Book

                    </a>

                </div>

            </div>



            <!-- BOOK 2 -->

            <div class="book-card">

                <div class="book-cover">

                    <span class="book-badge">
                        POPULAR
                    </span>

                    <span class="book-icon">
                        <i class="bi bi-journal-bookmark"></i>
                    </span>

                </div>


                <div class="book-info">

                    <div class="book-category">
                        Adventure
                    </div>

                    <h3 class="book-title">
                        Journey Beyond
                    </h3>

                    <p class="book-author">
                        By Featured Author
                    </p>


                    <a
                        href="{{ route('books.index') }}"
                        class="read-btn"
                    >

                        <i class="bi bi-book-open"></i>

                        Read Book

                    </a>

                </div>

            </div>



            <!-- BOOK 3 -->

            <div class="book-card">

                <div class="book-cover">

                    <span class="book-badge">
                        NEW
                    </span>

                    <span class="book-icon">
                        <i class="bi bi-journal-text"></i>
                    </span>

                </div>


                <div class="book-info">

                    <div class="book-category">
                        Mystery
                    </div>

                    <h3 class="book-title">
                        Hidden Secrets
                    </h3>

                    <p class="book-author">
                        By Featured Author
                    </p>


                    <a
                        href="{{ route('books.index') }}"
                        class="read-btn"
                    >

                        <i class="bi bi-book-open"></i>

                        Read Book

                    </a>

                </div>

            </div>



            <!-- BOOK 4 -->

            <div class="book-card">

                <div class="book-cover">

                    <span class="book-badge">
                        RECOMMENDED
                    </span>

                    <span class="book-icon">
                        <i class="bi bi-book-half"></i>
                    </span>

                </div>


                <div class="book-info">

                    <div class="book-category">
                        Romance
                    </div>

                    <h3 class="book-title">
                        A Beautiful Story
                    </h3>

                    <p class="book-author">
                        By Featured Author
                    </p>


                    <a
                        href="{{ route('books.index') }}"
                        class="read-btn"
                    >

                        <i class="bi bi-book-open"></i>

                        Read Book

                    </a>

                </div>

            </div>


        </div>

    </div>

</section>



<!-- =========================================
     CATEGORIES
========================================== -->

<section class="section categories-section">

    <div class="container">


        <div class="section-header">

            <div>

                <h2 class="section-title">
                    Explore Categories
                </h2>

                <p class="section-subtitle">
                    Find something interesting based on your mood.
                </p>

            </div>


            <a
                href="{{ route('categories.index') }}"
                class="view-all"
            >

                All Categories

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>



        <div class="categories-grid">


            <!-- ROMANCE -->

            <a
                href="{{ route('categories.index') }}"
                class="category-card"
            >

                <div class="category-icon">
                    <i class="bi bi-heart"></i>
                </div>

                <h3>
                    Romance
                </h3>

                <p>
                    Love & relationships
                </p>

            </a>



            <!-- MYSTERY -->

            <a
                href="{{ route('categories.index') }}"
                class="category-card"
            >

                <div class="category-icon">
                    <i class="bi bi-search"></i>
                </div>

                <h3>
                    Mystery
                </h3>

                <p>
                    Secrets & suspense
                </p>

            </a>



            <!-- FANTASY -->

            <a
                href="{{ route('categories.index') }}"
                class="category-card"
            >

                <div class="category-icon">
                    <i class="bi bi-stars"></i>
                </div>

                <h3>
                    Fantasy
                </h3>

                <p>
                    Magical worlds
                </p>

            </a>



            <!-- ADVENTURE -->

            <a
                href="{{ route('categories.index') }}"
                class="category-card"
            >

                <div class="category-icon">
                    <i class="bi bi-compass"></i>
                </div>

                <h3>
                    Adventure
                </h3>

                <p>
                    Explore new worlds
                </p>

            </a>


        </div>

    </div>

</section>



<!-- =========================================
     POPULAR BOOKS
========================================== -->

<section class="section">

    <div class="container">


        <div class="section-header">

            <div>

                <h2 class="section-title">
                    Popular Reads
                </h2>

                <p class="section-subtitle">
                    Books readers are discovering right now.
                </p>

            </div>


            <a
                href="{{ route('books.index') }}"
                class="view-all"
            >

                Explore More

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>



        <div class="books-grid">


            <!-- BOOK 1 -->

            <div class="book-card">

                <div class="book-cover">

                    <span class="book-icon">
                        <i class="bi bi-book"></i>
                    </span>

                </div>


                <div class="book-info">

                    <div class="book-category">
                        Drama
                    </div>

                    <h3 class="book-title">
                        The Last Letter
                    </h3>

                    <p class="book-author">
                        By Author
                    </p>


                    <a
                        href="{{ route('books.index') }}"
                        class="read-btn"
                    >

                        <i class="bi bi-book-open"></i>

                        Start Reading

                    </a>

                </div>

            </div>



            <!-- BOOK 2 -->

            <div class="book-card">

                <div class="book-cover">

                    <span class="book-icon">
                        <i class="bi bi-journal-bookmark"></i>
                    </span>

                </div>


                <div class="book-info">

                    <div class="book-category">
                        Fiction
                    </div>

                    <h3 class="book-title">
                        Another World
                    </h3>

                    <p class="book-author">
                        By Author
                    </p>


                    <a
                        href="{{ route('books.index') }}"
                        class="read-btn"
                    >

                        <i class="bi bi-book-open"></i>

                        Start Reading

                    </a>

                </div>

            </div>



            <!-- BOOK 3 -->

            <div class="book-card">

                <div class="book-cover">

                    <span class="book-icon">
                        <i class="bi bi-journal-text"></i>
                    </span>

                </div>


                <div class="book-info">

                    <div class="book-category">
                        History
                    </div>

                    <h3 class="book-title">
                        Stories of Time
                    </h3>

                    <p class="book-author">
                        By Author
                    </p>


                    <a
                        href="{{ route('books.index') }}"
                        class="read-btn"
                    >

                        <i class="bi bi-book-open"></i>

                        Start Reading

                    </a>

                </div>

            </div>



            <!-- BOOK 4 -->

            <div class="book-card">

                <div class="book-cover">

                    <span class="book-icon">
                        <i class="bi bi-bookshelf"></i>
                    </span>

                </div>


                <div class="book-info">

                    <div class="book-category">
                        Education
                    </div>

                    <h3 class="book-title">
                        Learn Something New
                    </h3>

                    <p class="book-author">
                        By Author
                    </p>


                    <a
                        href="{{ route('books.index') }}"
                        class="read-btn"
                    >

                        <i class="bi bi-book-open"></i>

                        Start Reading

                    </a>

                </div>

            </div>


        </div>

    </div>

</section>



<!-- =========================================
     READING CTA
========================================== -->

<section class="reading-section">

    <div class="container">

        <div class="reading-box">

            <div class="reading-content">

                <h2>
                    Your Next Story Is Waiting.
                </h2>

                <p>
                    Browse our collection, choose a book,
                    and start reading whenever you want.
                </p>


                <a
                    href="{{ route('books.index') }}"
                    class="gold-btn"
                >

                    <i class="bi bi-book-open"></i>

                    Start Reading

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>

    </div>

</section>



<!-- =========================================
     STORIES
========================================== -->

<section class="section stories-section">

    <div class="container">


        <div class="section-header">

            <div>

                <h2 class="section-title">
                    Community Stories
                </h2>

                <p class="section-subtitle">
                    Explore stories shared by our readers and writers.
                </p>

            </div>


            <a
                href="{{ route('stories.index') }}"
                class="view-all"
            >

                Explore Stories

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>



        <div class="story-grid">


            <!-- STORY 1 -->

            <div class="story-card">

                <div class="story-icon">
                    <i class="bi bi-pencil"></i>
                </div>

                <h3>
                    Discover New Stories
                </h3>

                <p>
                    Explore creative stories and interesting
                    writing from the community.
                </p>

                <a
                    href="{{ route('stories.index') }}"
                    class="story-link"
                >

                    Read Stories

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>



            <!-- STORY 2 -->

            <div class="story-card">

                <div class="story-icon">
                    <i class="bi bi-book"></i>
                </div>

                <h3>
                    Read Chapter by Chapter
                </h3>

                <p>
                    Follow stories and continue reading
                    from where you left off.
                </p>

                <a
                    href="{{ route('stories.index') }}"
                    class="story-link"
                >

                    Browse Stories

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>



            <!-- STORY 3 -->

            <div class="story-card">

                <div class="story-icon">
                    <i class="bi bi-stars"></i>
                </div>

                <h3>
                    Share Your Creativity
                </h3>

                <p>
                    Have a story to tell? Share your writing
                    with the reading community.
                </p>

                <a
                    href="{{ route('stories.index') }}"
                    class="story-link"
                >

                    View Stories

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>


        </div>

    </div>

</section>



<!-- =========================================
     FEATURES
========================================== -->

<section class="section">

    <div class="container">


        <div class="section-header">

            <div>

                <h2 class="section-title">
                    Everything for Readers
                </h2>

                <p class="section-subtitle">
                    A simple place to discover and enjoy books.
                </p>

            </div>

        </div>



        <div class="features">


            <!-- FEATURE 1 -->

            <div class="feature-card">

                <div class="feature-icon">
                    <i class="bi bi-bookshelf"></i>
                </div>

                <h3>
                    Growing Collection
                </h3>

                <p>
                    Discover books across different genres
                    and categories.
                </p>

            </div>



            <!-- FEATURE 2 -->

            <div class="feature-card">

                <div class="feature-icon">
                    <i class="bi bi-search"></i>
                </div>

                <h3>
                    Easy Discovery
                </h3>

                <p>
                    Search and browse books easily to find
                    something you want to read.
                </p>

            </div>



            <!-- FEATURE 3 -->

            <div class="feature-card">

                <div class="feature-icon">
                    <i class="bi bi-phone"></i>
                </div>

                <h3>
                    Read Anywhere
                </h3>

                <p>
                    Enjoy your reading experience across
                    desktop, tablet, and mobile devices.
                </p>

            </div>


        </div>

    </div>

</section>



<!-- =========================================
     FOOTER
========================================== -->

<footer class="footer">

    <div class="container">


        <div class="footer-grid">


            <!-- BRAND -->

            <div class="footer-brand">

                <h2>

                    <i class="bi bi-book-half"></i>

                    Online

                    <span>
                        Book Store
                    </span>

                </h2>

                <p>
                    Discover books, explore stories,
                    and find your next favorite read.
                </p>

            </div>



            <!-- EXPLORE -->

            <div class="footer-column">

                <h3>
                    Explore
                </h3>

                <a href="{{ url('/') }}">
                    Home
                </a>

                <a href="{{ route('books.index') }}">
                    Books
                </a>

                <a href="{{ route('categories.index') }}">
                    Categories
                </a>

                <a href="{{ route('stories.index') }}">
                    Stories
                </a>

            </div>



            <!-- ACCOUNT -->

            <div class="footer-column">

                <h3>
                    Account
                </h3>


                @auth

                    <a href="{{ route('profile') }}">
                        <i class="bi bi-person-circle"></i>
                        Profile
                    </a>

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



            <!-- READING -->

            <div class="footer-column">

                <h3>
                    Reading
                </h3>

                <a href="{{ route('books.index') }}">
                    <i class="bi bi-book"></i>
                    Browse Books
                </a>

                <a href="{{ route('categories.index') }}">
                    <i class="bi bi-grid"></i>
                    Browse Categories
                </a>

                <a href="{{ route('stories.index') }}">
                    <i class="bi bi-book-half"></i>
                    Read Stories
                </a>

            </div>


        </div>



        <div class="footer-bottom">

            © {{ date('Y') }} Online Book Store.
            All Rights Reserved.

        </div>

    </div>

</footer>


</body>

</html>