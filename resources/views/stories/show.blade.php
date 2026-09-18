<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $story->title }} - Read Story</title>

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

        .profile {
            color: #d9a943 !important;
        }

        /* MAIN */
        .container {
            width: 90%;
            max-width: 900px;
            margin: 40px auto;
        }

        /* BACK */
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

        /* STORY HEADER */
        .story-header {
            background: white;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(23, 36, 61, 0.08);
            margin-bottom: 25px;
        }

        .story-top {
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

        .story-details h1 {
            font-size: 36px;
            color: #17243d;
            margin-bottom: 12px;
        }

        .author {
            color: #666;
            font-size: 17px;
            margin-bottom: 12px;
        }

        .language {
            color: #666;
            font-size: 15px;
            margin-bottom: 15px;
        }

        .category {
            display: inline-block;
            background: #f6e8c6;
            color: #8b671e;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .description {
            color: #555;
            line-height: 1.8;
            font-size: 15px;
        }

        /* READING */
        .reading-area {
            background: white;
            padding: 45px 55px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(23, 36, 61, 0.08);
        }

        .reading-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .reading-heading h2 {
            font-size: 28px;
            color: #17243d;
            margin-bottom: 10px;
        }

        .divider {
            width: 80px;
            height: 3px;
            background: #d9a943;
            margin: 0 auto;
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
            font-size: 22px;
            color: #17243d;
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
            color: #777;
            padding: 40px 20px;
        }

        .no-pages i {
            display: block;
            color: #d9a943;
            font-size: 45px;
            margin-bottom: 15px;
        }

        /* ADMIN / OWNER BUTTONS */
        .manage-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #e2e5eb;
        }

        .manage-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 16px;
            border-radius: 7px;
            text-decoration: none;
            background: #17243d;
            color: white;
            font-size: 14px;
        }

        .manage-btn:hover {
            background: #203758;
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

            .story-header,
            .reading-area {
                padding: 25px 22px;
            }

            .story-top {
                flex-direction: column;
            }

            .cover,
            .no-cover {
                width: 160px;
                height: 230px;
            }

            .story-details h1 {
                font-size: 28px;
            }

            .page-content {
                font-size: 16px;
                line-height: 1.9;
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

        <a href="{{ route('stories.index') }}" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Stories
        </a>


        <!-- STORY INFORMATION -->
        <div class="story-header">

            <div class="story-top">

                @if($story->cover_image)

                    <img
                        src="{{ asset('storage/' . $story->cover_image) }}"
                        alt="{{ $story->title }}"
                        class="cover"
                    >

                @else

                    <div class="no-cover">
                        <i class="bi bi-journal-text"></i>
                    </div>

                @endif


                <div class="story-details">

                    <h1>{{ $story->title }}</h1>

                    <p class="author">
                        <i class="bi bi-person"></i>
                        By {{ $story->author }}
                    </p>

                    <p class="language">
                        <i class="bi bi-translate"></i>
                        {{ $story->language }}
                    </p>

                    @if($story->category)

                        <span class="category">
                            <i class="bi bi-tag"></i>
                            {{ $story->category->name }}
                        </span>

                    @endif


                    @if($story->description)

                        <div class="description">
                            {{ $story->description }}
                        </div>

                    @endif

                </div>

            </div>

        </div>


        <!-- STORY READING -->
        <div class="reading-area">

            <div class="reading-heading">

                <h2>
                    <i class="bi bi-book"></i>
                    Read Story
                </h2>

                <div class="divider"></div>

            </div>


            @if($story->pages->count() > 0)

                @foreach($story->pages as $page)

                    <div class="page">

                        <div class="page-number">
                            Page {{ $page->page_number }}
                        </div>


                        @if($page->title)

                            <h3 class="page-title">
                                {{ $page->title }}
                            </h3>

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
                        No pages have been added to this story yet.
                    </p>

                </div>

            @endif


            <!-- MANAGEMENT BUTTONS -->
            @auth

                @if(Auth::id() === $story->user_id || Auth::user()->is_admin)

                    <div class="manage-buttons">

                        <a
                            href="{{ route('stories.pages', $story->id) }}"
                            class="manage-btn"
                        >
                            <i class="bi bi-files"></i>
                            Manage Pages
                        </a>

                        <a
                            href="{{ route('stories.pages.create', $story->id) }}"
                            class="manage-btn"
                        >
                            <i class="bi bi-plus-circle"></i>
                            Add Page
                        </a>

                        <a
                            href="{{ route('stories.edit', $story->id) }}"
                            class="manage-btn"
                        >
                            <i class="bi bi-pencil"></i>
                            Edit Story
                        </a>

                    </div>

                @endif

            @endauth

        </div>

    </div>

</body>

</html>