<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Page - {{ $story->title }}</title>

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

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6fa;
            color: #17243d;
            min-height: 100vh;
        }

        /* ================================
           NAVBAR
        ================================= */

        .navbar {
            background: #17243d;
            color: white;
            padding: 18px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 3px 12px rgba(23, 36, 61, 0.15);
        }

        .brand {
            color: white;
            text-decoration: none;
            font-size: 22px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand i {
            color: #d9a943;
        }

        .nav-actions {
            display: flex;
            gap: 10px;
        }

        .nav-btn {
            color: white;
            background: #304e78;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: 0.2s ease;
        }

        .nav-btn:hover {
            background: #d9a943;
            color: #17243d;
        }

        /* ================================
           ADMIN BAR
        ================================= */

        .admin-bar {
            background: #304e78;
            padding: 12px 40px;
            display: flex;
            justify-content: flex-end;
        }

        .admin-btn {
            background: #d9a943;
            color: #17243d;
            text-decoration: none;
            padding: 10px 17px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: 0.2s ease;
        }

        .admin-btn:hover {
            background: white;
        }

        /* ================================
           PAGE WRAPPER
        ================================= */

        .page-wrapper {
            padding: 40px 20px 60px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        /* ================================
           HEADER
        ================================= */

        .page-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .page-icon {
            width: 62px;
            height: 62px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: #17243d;
            color: #d9a943;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
        }

        .page-header h1 {
            font-size: 30px;
            margin-bottom: 8px;
            color: #17243d;
        }

        .page-header p {
            color: #68758a;
            font-size: 15px;
        }

        /* ================================
           FORM CARD
        ================================= */

        .form-card {
            background: white;
            padding: 35px;
            border-radius: 14px;
            border: 1px solid #e1e6ee;
            box-shadow: 0 5px 22px rgba(23, 36, 61, 0.10);
        }

        /* ================================
           STORY INFO
        ================================= */

        .story-info {
            background: #f4f6fa;
            border-left: 4px solid #d9a943;
            padding: 15px 18px;
            border-radius: 8px;
            margin-bottom: 25px;
            color: #5d697b;
            line-height: 1.7;
        }

        .story-info strong {
            color: #17243d;
        }

        .page-number {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 3px;
            color: #304e78;
            font-weight: 600;
        }

        /* ================================
           BACK BUTTON
        ================================= */

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #304e78;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 22px;
            transition: 0.2s ease;
        }

        .back-link:hover {
            color: #d9a943;
        }

        /* ================================
           FORM
        ================================= */

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #17243d;
            font-size: 14px;
            font-weight: 700;
        }

        input,
        textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #ccd3df;
            border-radius: 8px;
            background: white;
            color: #17243d;
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
            outline: none;
            transition: 0.2s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #304e78;
            box-shadow: 0 0 0 3px rgba(48, 78, 120, 0.10);
        }

        textarea {
            min-height: 400px;
            resize: vertical;
            line-height: 1.7;
        }

        /* ================================
           VALIDATION
        ================================= */

        .errors {
            background: #fff1f1;
            border: 1px solid #e3aaaa;
            color: #9b2c2c;
            padding: 15px 18px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .errors-title {
            display: flex;
            align-items: center;
            gap: 7px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .errors ul {
            margin-left: 25px;
        }

        .errors li {
            margin-bottom: 4px;
            font-size: 14px;
        }

        /* ================================
           BUTTONS
        ================================= */

        .buttons {
            margin-top: 28px;
            display: flex;
            gap: 12px;
        }

        .btn {
            border: none;
            border-radius: 8px;
            padding: 13px 20px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: 0.2s ease;
        }

        .update-btn {
            flex: 1;
            background: #17243d;
            color: white;
        }

        .update-btn:hover {
            background: #304e78;
        }

        .back-btn {
            background: #e9edf3;
            color: #17243d;
        }

        .back-btn:hover {
            background: #d9a943;
            color: #17243d;
        }

        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 700px) {

            .navbar {
                padding: 15px 20px;
                flex-direction: column;
                gap: 12px;
            }

            .nav-actions {
                width: 100%;
                justify-content: center;
            }

            .admin-bar {
                padding: 12px 20px;
            }

            .page-wrapper {
                padding: 25px 15px 40px;
            }

            .form-card {
                padding: 22px;
            }

            .page-header h1 {
                font-size: 26px;
            }

            .buttons {
                flex-direction: column;
            }

            .update-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- ================================
         NAVBAR
    ================================= -->

    <nav class="navbar">

        <a href="{{ route('home') }}" class="brand">
            <i class="bi bi-book-half"></i>
            Online Book Store
        </a>

        <div class="nav-actions">

            <a href="{{ route('stories.index') }}" class="nav-btn">
                <i class="bi bi-journal-text"></i>
                Stories
            </a>

            <a href="{{ route('books.index') }}" class="nav-btn">
                <i class="bi bi-book"></i>
                Books
            </a>

        </div>

    </nav>


    <!-- ================================
         ADMIN BAR
    ================================= -->

    @can('admin')

        <div class="admin-bar">

            <a
                href="{{ route('admin.dashboard') }}"
                class="admin-btn"
            >
                <i class="bi bi-speedometer2"></i>
                Admin Dashboard
            </a>

        </div>

    @endcan


    <!-- ================================
         PAGE
    ================================= -->

    <main class="page-wrapper">

        <div class="container">

            <!-- Header -->

            <div class="page-header">

                <div class="page-icon">
                    <i class="bi bi-pencil-square"></i>
                </div>

                <h1>Edit Story Page</h1>

                <p>Update the title or content of this story page.</p>

            </div>


            <!-- Form Card -->

            <div class="form-card">

                <!-- Back -->

                <a
                    href="{{ route('stories.pages', $story->id) }}"
                    class="back-link"
                >
                    <i class="bi bi-arrow-left"></i>
                    Back to Story Pages
                </a>


                <!-- Story Information -->

                <div class="story-info">

                    <div>
                        Story:
                        <strong>{{ $story->title }}</strong>
                    </div>

                    <div class="page-number">
                        <i class="bi bi-file-text"></i>
                        Page {{ $page->page_number }}
                    </div>

                </div>


                <!-- Validation Errors -->

                @if ($errors->any())

                    <div class="errors">

                        <div class="errors-title">
                            <i class="bi bi-exclamation-circle"></i>
                            Please fix these errors:
                        </div>

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <!-- Edit Form -->

                <form
                    action="{{ route('stories.pages.update', [$story->id, $page->id]) }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')


                    <!-- Page Title -->

                    <div class="form-group">

                        <label for="title">
                            Page Title
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title', $page->title) }}"
                            placeholder="Example: Chapter 1"
                        >

                        @error('title')

                            <div style="color:#c0392b; font-size:13px; margin-top:6px;">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- Story Content -->

                    <div class="form-group">

                        <label for="content">
                            Story Content
                        </label>

                        <textarea
                            id="content"
                            name="content"
                            placeholder="Write your story here..."
                        >{{ old('content', $page->content) }}</textarea>

                        @error('content')

                            <div style="color:#c0392b; font-size:13px; margin-top:6px;">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- Buttons -->

                    <div class="buttons">

                        <a
                            href="{{ route('stories.pages', $story->id) }}"
                            class="btn back-btn"
                        >
                            <i class="bi bi-arrow-left"></i>
                            Back to Pages
                        </a>

                        <button
                            type="submit"
                            class="btn update-btn"
                        >
                            <i class="bi bi-check-circle"></i>
                            Update Page
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>
</html>