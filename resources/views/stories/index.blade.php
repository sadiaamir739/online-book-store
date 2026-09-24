<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Stories | Online Book Store</title>

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

        .logo .store-name {
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

        .login-btn:hover {
            background: #f1f1f1 !important;
        }

        .register-btn {
            background: #d9a943 !important;
            color: #17243d !important;
        }

        .register-btn:hover {
            background: #e4b858 !important;
        }

        /* =========================
           LOGOUT
        ========================== */

        .logout-btn {
            border: none;
            background: white;
            color: #17243d;
            padding: 10px 13px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
            transition: 0.25s ease;
        }

        .logout-btn:hover {
            background: #f1f1f1;
        }

        /* =========================
           ADMIN BAR
        ========================== */

        .admin-bar {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 16px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
        }

        .admin-title {
            color: #17243d;
            font-size: 15px;
            font-weight: 700;
        }

        .admin-title i {
            color: #d9a943;
            margin-right: 6px;
        }

        .admin-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .admin-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 16px;
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

        .add-btn {
            background: #d9a943;
            color: #17243d;
        }

        .add-btn:hover {
            background: #c69732;
        }

        /* =========================
           HERO
        ========================== */

        .hero {
            background:
                linear-gradient(
                    135deg,
                    #203758 0%,
                    #304e78 100%
                );

            padding: 75px 8%;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "\F4F5";
            font-family: "bootstrap-icons";
            position: absolute;
            right: 7%;
            top: 10px;
            font-size: 190px;
            color: white;
            opacity: 0.035;
            transform: rotate(-10deg);
        }

        .hero-small {
            color: #d9a943;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            color: white;
            font-size: 48px;
            line-height: 1.2;
            margin-bottom: 17px;
            position: relative;
            z-index: 2;
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
            position: relative;
            z-index: 2;
        }

        /* =========================
           CONTAINER
        ========================== */

        .container {
            width: 88%;
            max-width: 1200px;
            margin: auto;
            padding: 60px 0 80px;
        }

        /* =========================
           HEADING
        ========================== */

        .heading {
            margin-bottom: 35px;
        }

        .heading-action {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 18px;
            background: #d9a943;
            color: #17243d;
            padding: 11px 18px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: bold;
        }

        .heading-action:hover {
            background: #17243d;
            color: white;
        }

        .heading h2 {
            font-size: 30px;
            color: #17243d;
        }

        .heading h2 i {
            color: #d9a943;
            margin-right: 8px;
        }

        .heading h2 span {
            color: #d9a943;
        }

        .heading p {
            color: #777;
            margin-top: 10px;
            font-size: 15px;
        }

        /* =========================
           STORY GRID
        ========================== */

        .story-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        /* =========================
           STORY CARD
        ========================== */

        .story-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(23, 36, 61, 0.09);
            transition: 0.3s ease;
            border: 1px solid #edf0f5;
        }

        .story-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 30px rgba(23, 36, 61, 0.15);
        }

        /* =========================
           STORY IMAGE
        ========================== */

        .story-image {
            height: 220px;

            background:
                linear-gradient(
                    135deg,
                    #243b60,
                    #38577f
                );

            display: flex;
            align-items: center;
            justify-content: center;

            color: #d9a943;
            font-size: 65px;

            position: relative;
            overflow: hidden;
        }

        .story-image::after {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            border: 1px solid rgba(217, 169, 67, 0.15);
            border-radius: 50%;
        }

        .story-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: relative;
            z-index: 3;
        }

        .story-image i {
            position: relative;
            z-index: 2;
        }

        /* =========================
           STORY CONTENT
        ========================== */

        .story-content {
            padding: 24px;
        }

        .story-tag {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #f6e8c6;
            color: #8b671e;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 13px;
        }

        .story-tag i {
            font-size: 11px;
        }

        .story-content h3 {
            font-size: 21px;
            color: #17243d;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .story-description {
            color: #777;
            line-height: 1.7;
            font-size: 14px;

            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;

            min-height: 71px;
        }

        /* =========================
           AUTHOR
        ========================== */

        .author {
            font-size: 13px;
            color: #777;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .author i {
            color: #d9a943;
            font-size: 14px;
        }

        /* =========================
           STORY FOOTER
        ========================== */

        .story-footer {
            margin-top: 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            flex-wrap: wrap;
        }

        .read-story {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            color: #17243d;
            background: #d9a943;
            padding: 9px 15px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: bold;
            transition: 0.3s ease;
            white-space: nowrap;
        }

        .read-story:hover {
            background: #17243d;
            color: white;
        }

        .read-story i {
            font-size: 13px;
            transition: 0.3s ease;
        }

        .read-story:hover i {
            transform: translateX(3px);
        }

        /* =========================
           ADMIN STORY ACTIONS
        ========================== */

        .admin-actions-card {
            border-top: 1px solid #e5e7eb;
            margin-top: 20px;
            padding-top: 18px;
        }

        .admin-actions-label {
            font-size: 12px;
            font-weight: bold;
            color: #667085;
            margin-bottom: 10px;
        }

        .story-admin-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .story-admin-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 9px 8px;
            border-radius: 7px;
            border: none;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.25s ease;
            font-family: inherit;
        }

        .manage-btn {
            background: #e8edf5;
            color: #17243d;
        }

        .manage-btn:hover {
            background: #304e78;
            color: white;
        }

        .edit-btn {
            background: #f6e8c6;
            color: #7a5b16;
        }

        .edit-btn:hover {
            background: #d9a943;
            color: #17243d;
        }

        .delete-btn {
            background: #fce8e6;
            color: #b42318;
        }

        .delete-btn:hover {
            background: #b42318;
            color: white;
        }

        .delete-form {
            margin: 0;
        }

        /* =========================
           SUCCESS MESSAGE
        ========================== */

        .success-message {
            background: #ecfdf3;
            border: 1px solid #abefc6;
            color: #067647;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 14px;
            font-weight: 600;
        }

        /* =========================
           EMPTY STATE
        ========================== */

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            background: white;
            padding: 70px 20px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(23, 36, 61, 0.08);
        }

        .empty-state i {
            display: block;
            color: #d9a943;
            font-size: 60px;
            margin-bottom: 18px;
        }

        .empty-state h3 {
            color: #17243d;
            font-size: 22px;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: #777;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .empty-add-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #d9a943;
            color: #17243d;
            padding: 11px 18px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: bold;
        }

        .empty-add-btn:hover {
            background: #17243d;
            color: white;
        }

        /* =========================
           FOOTER
        ========================== */

        footer {
            background: #17243d;
            color: white;
            text-align: center;
            padding: 28px 20px;
            font-size: 14px;
        }

        footer .footer-icon {
            color: #d9a943;
            margin-right: 6px;
        }

        footer span {
            color: #d9a943;
            font-weight: 700;
        }

        footer p {
            color: #aeb8c8;
            font-size: 13px;
            margin-top: 6px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media(max-width: 1050px) {

            .story-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .nav-links {
                gap: 3px;
            }

            .nav-links a,
            .logout-btn {
                padding: 9px 10px;
            }
        }

        @media(max-width: 750px) {

            .navbar {
                height: auto;
                padding: 20px;
                flex-direction: column;
                gap: 20px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .admin-bar {
                justify-content: center;
                text-align: center;
            }

            .admin-actions {
                justify-content: center;
            }

            .hero {
                padding: 60px 20px 70px;
            }

            .hero h1 {
                font-size: 40px;
            }

            .hero p {
                font-size: 15px;
            }

            .container {
                width: 90%;
                padding: 55px 0 65px;
            }
        }

        @media(max-width: 600px) {

            .story-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 35px;
            }

            .heading h2 {
                font-size: 27px;
            }

            .admin-bar {
                flex-direction: column;
            }

            .admin-actions {
                width: 100%;
            }

            .admin-btn {
                flex: 1;
            }
        }

        @media(max-width: 450px) {

            .logo {
                font-size: 20px;
            }

            .logo i {
                font-size: 23px;
            }

            .nav-links {
                gap: 5px;
            }

            .nav-links a,
            .logout-btn {
                font-size: 13px;
                padding: 8px 9px;
            }

            .hero h1 {
                font-size: 31px;
            }

            .story-footer {
                align-items: flex-start;
                flex-direction: column;
            }

            .read-story {
                width: 100%;
            }

            .story-admin-buttons {
                grid-template-columns: 1fr;
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

            <i class="bi bi-bookshelf"></i>

            <span>
                Online
            </span>

            <span class="store-name">
                Book Store
            </span>

        </a>


        <div class="nav-links">

            <a href="{{ url('/') }}">
                <i class="bi bi-house-door"></i>
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


    <!-- =========================
         HERO
    ========================== -->

    <section class="hero">

        <div class="hero-small">

            <i class="bi bi-stars"></i>

            &nbsp; READ. IMAGINE. EXPERIENCE.

        </div>

        <h1>
            Discover Amazing <span>Stories</span>
        </h1>

        <p>
            Read inspiring stories, exciting adventures,
            and creative writing from our growing community.
        </p>

    </section>


    <!-- =========================
         STORIES
    ========================== -->

    <main class="container">

        @if(session('success'))

            <div class="success-message">

                <i class="bi bi-check-circle"></i>

                {{ session('success') }}

            </div>

        @endif


        <div class="heading">

            <h2>

                <i class="bi bi-journal-richtext"></i>

                Latest <span>Stories</span>

            </h2>

            <p>
                Explore stories created for readers who love
                imagination and great storytelling.
            </p>

            @auth
                <a href="{{ route('stories.create') }}" class="heading-action">
                    <i class="bi bi-plus-circle"></i>
                    Add Story
                </a>
            @endauth

        </div>


        <div class="story-grid">


            @forelse($stories as $story)


                <!-- STORY CARD -->

                <article class="story-card">


                    <!-- STORY IMAGE -->

                    <div class="story-image">

                        @if($story->cover_image)

                            <img
                                src="{{ asset('storage/' . $story->cover_image) }}"
                                alt="{{ $story->title }}"
                            >

                        @else

                            <i class="bi bi-journal-text"></i>

                        @endif

                    </div>


                    <!-- STORY CONTENT -->

                    <div class="story-content">


                        @if($story->category)

                            <span class="story-tag">

                                <i class="bi bi-bookmark"></i>

                                {{ $story->category->name }}

                            </span>

                        @else

                            <span class="story-tag">

                                <i class="bi bi-bookmark"></i>

                                General

                            </span>

                        @endif


                        <h3>
                            {{ $story->title }}
                        </h3>


                        @if($story->description)

                            <p class="story-description">
                                {{ $story->description }}
                            </p>

                        @else

                            <p class="story-description">
                                Discover this interesting story
                                and start reading today.
                            </p>

                        @endif


                        <div class="story-footer">

                            <span class="author">

                                <i class="bi bi-person-circle"></i>

                                By {{ $story->author ?? 'Story Author' }}

                            </span>


                            <a
                                href="{{ route('stories.show', $story->id) }}"
                                class="read-story"
                            >

                                Read

                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </div>


                        <!-- =========================
                             ADMIN STORY ACTIONS
                        ========================== -->

                        @auth

                            @if(auth()->user()->is_admin || $story->user_id === auth()->id())

                                <div class="admin-actions-card">

                                    <div class="admin-actions-label">

                                        <i class="bi bi-gear"></i>

                                        Story Management

                                    </div>


                                    <div class="story-admin-buttons">

                                        @if(auth()->user()->is_admin && !$story->published)

                                            <form
                                                action="{{ route('stories.approve', $story->id) }}"
                                                method="POST"
                                            >
                                                @csrf
                                                <button type="submit" class="story-admin-btn edit-btn" style="width:100%;">
                                                    <i class="bi bi-check-circle"></i>
                                                    Approve
                                                </button>
                                            </form>

                                        @endif


                                        <!-- MANAGE PAGES -->

                                        @if(auth()->user()->is_admin)
                                            <a
                                                href="{{ route('stories.pages', $story->id) }}"
                                                class="story-admin-btn manage-btn"
                                            >

                                                <i class="bi bi-files"></i>

                                                Manage Pages

                                            </a>
                                        @endif


                                        <!-- EDIT -->

                                        <a
                                            href="{{ route('stories.edit', $story->id) }}"
                                            class="story-admin-btn edit-btn"
                                        >

                                            <i class="bi bi-pencil-square"></i>

                                            Edit

                                        </a>


                                        <!-- DELETE -->

                                        <form
                                            action="{{ route('stories.destroy', $story->id) }}"
                                            method="POST"
                                            class="delete-form"
                                            onsubmit="return confirm('Are you sure you want to delete this story?');"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="story-admin-btn delete-btn"
                                                style="width: 100%;"
                                            >

                                                <i class="bi bi-trash3"></i>

                                                Delete

                                            </button>

                                        </form>


                                    </div>

                                </div>

                            @endif

                        @endauth

                    </div>

                </article>


            @empty


                <!-- EMPTY STATE -->

                <div class="empty-state">

                    <i class="bi bi-journal-x"></i>

                    <h3>
                        No Stories Available
                    </h3>

                    <p>
                        There are no published stories available
                        at the moment.
                    </p>


                    @auth
                        <a
                            href="{{ route('stories.create') }}"
                            class="empty-add-btn"
                        >

                            <i class="bi bi-plus-circle"></i>

                            Add First Story

                        </a>
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