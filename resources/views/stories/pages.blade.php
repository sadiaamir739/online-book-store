<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $story->title }} - Pages | Online Book Store</title>

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
            background: #304e78;
            color: white;
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
            max-width: 1000px;
            margin: auto;
        }

        /* ================================
           STORY HEADER
        ================================= */

        .story-header {
            background: white;
            padding: 30px;
            border-radius: 14px;
            margin-bottom: 25px;
            border: 1px solid #e1e6ee;
            box-shadow: 0 5px 22px rgba(23, 36, 61, 0.10);
        }

        .story-heading {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 15px;
        }

        .story-icon {
            width: 55px;
            height: 55px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #17243d;
            color: #d9a943;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .story-heading h1 {
            color: #17243d;
            font-size: 29px;
            line-height: 1.3;
        }

        .info {
            color: #68758a;
            line-height: 1.8;
            font-size: 14px;
            padding-left: 69px;
        }

        .info strong {
            color: #17243d;
        }

        /* ================================
           ACTIONS
        ================================= */

        .actions {
            margin-top: 22px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .add-btn {
            background: #17243d;
            color: white;
        }

        .add-btn:hover {
            background: #304e78;
        }

        .back-btn {
            background: #e9edf3;
            color: #17243d;
        }

        .back-btn:hover {
            background: #d9a943;
        }

        /* ================================
           SUCCESS
        ================================= */

        .success {
            background: #edf8f1;
            border: 1px solid #a9d8b8;
            color: #247343;
            padding: 14px 17px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        /* ================================
           PAGE CARD
        ================================= */

        .page-card {
            background: white;
            padding: 28px;
            border-radius: 14px;
            margin-bottom: 20px;
            border: 1px solid #e1e6ee;
            box-shadow: 0 5px 20px rgba(23, 36, 61, 0.08);
        }

        .page-number {
            color: #304e78;
            font-weight: 800;
            font-size: 13px;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .page-title {
            margin: 10px 0 17px;
            font-size: 22px;
            color: #17243d;
        }

        .content {
            line-height: 1.8;
            color: #424d5e;
            white-space: pre-line;
            font-size: 15px;
        }

        /* ================================
           PAGE ACTIONS
        ================================= */

        .page-actions {
            margin-top: 22px;
            padding-top: 17px;
            border-top: 1px solid #e8ebf0;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .edit-btn {
            background: #d9a943;
            color: #17243d;
        }

        .edit-btn:hover {
            background: #304e78;
            color: white;
        }

        .delete-btn {
            background: #b83232;
            color: white;
        }

        .delete-btn:hover {
            background: #8f2525;
        }

        /* ================================
           EMPTY
        ================================= */

        .empty {
            background: white;
            padding: 50px 30px;
            text-align: center;
            border-radius: 14px;
            border: 1px solid #e1e6ee;
            box-shadow: 0 5px 20px rgba(23, 36, 61, 0.08);
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: #f0f2f6;
            color: #304e78;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .empty h2 {
            color: #17243d;
            margin-bottom: 8px;
        }

        .empty p {
            color: #68758a;
            margin-bottom: 22px;
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

            .story-header {
                padding: 22px;
            }

            .story-heading h1 {
                font-size: 24px;
            }

            .info {
                padding-left: 0;
            }

            .page-card {
                padding: 22px;
            }

            .actions,
            .page-actions {
                flex-direction: column;
            }

            .actions .btn,
            .page-actions .btn,
            .page-actions form {
                width: 100%;
            }

            .page-actions form button {
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

            <a
                href="{{ route('stories.index') }}"
                class="nav-btn"
            >
                <i class="bi bi-journal-text"></i>
                Stories
            </a>

            <a
                href="{{ route('books.index') }}"
                class="nav-btn"
            >
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
         MAIN CONTENT
    ================================= -->

    <main class="page-wrapper">

        <div class="container">

            <!-- Story Header -->

            <div class="story-header">

                <div class="story-heading">

                    <div class="story-icon">
                        <i class="bi bi-journal-bookmark-fill"></i>
                    </div>

                    <h1>{{ $story->title }}</h1>

                </div>


                <div class="info">

                    <div>
                        <strong>Author:</strong>
                        {{ $story->author }}
                    </div>

                    <div>
                        <strong>Language:</strong>
                        {{ $story->language }}
                    </div>

                    <div>
                        <strong>Total Pages:</strong>
                        {{ $story->pages->count() }}
                    </div>

                </div>


                <!-- Story Actions -->

                <div class="actions">

                    <a
                        href="{{ route('stories.pages.create', $story->id) }}"
                        class="btn add-btn"
                    >
                        <i class="bi bi-plus-circle"></i>
                        Add New Page
                    </a>

                    <a
                        href="{{ route('stories.index') }}"
                        class="btn back-btn"
                    >
                        <i class="bi bi-arrow-left"></i>
                        Back to Stories
                    </a>

                </div>

            </div>


            <!-- Success Message -->

            @if (session('success'))

                <div class="success">

                    <i class="bi bi-check-circle"></i>

                    {{ session('success') }}

                </div>

            @endif


            <!-- Story Pages -->

            @forelse ($story->pages as $page)

                <div class="page-card">

                    <!-- Page Number -->

                    <div class="page-number">

                        <i class="bi bi-file-earmark-text"></i>

                        PAGE {{ $page->page_number }}

                    </div>


                    <!-- Page Title -->

                    @if ($page->title)

                        <h2 class="page-title">
                            {{ $page->title }}
                        </h2>

                    @endif


                    <!-- Page Content -->

                    <div class="content">
                        {{ $page->content }}
                    </div>


                    <!-- Edit / Delete -->

                    <div class="page-actions">

                        <a
                            href="{{ route('stories.pages.edit', [$story->id, $page->id]) }}"
                            class="btn edit-btn"
                        >
                            <i class="bi bi-pencil-square"></i>
                            Edit
                        </a>


                        <form
                            action="{{ route('stories.pages.delete', [$story->id, $page->id]) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this page?');"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn delete-btn"
                            >
                                <i class="bi bi-trash3"></i>
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <!-- No Pages -->

                <div class="empty">

                    <div class="empty-icon">
                        <i class="bi bi-file-earmark-plus"></i>
                    </div>

                    <h2>No Pages Yet</h2>

                    <p>
                        This story does not have any pages yet.
                    </p>

                    <a
                        href="{{ route('stories.pages.create', $story->id) }}"
                        class="btn add-btn"
                    >
                        <i class="bi bi-plus-circle"></i>
                        Add First Page
                    </a>

                </div>

            @endforelse

        </div>

    </main>

</body>
</html>