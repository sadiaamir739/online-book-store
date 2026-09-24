<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | Online Book Store</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6fa;
            color: #17243d;
        }

        .admin-wrapper {
            min-height: 100vh;
            display: flex;
        }

        /* SIDEBAR */

        .sidebar {
            width: 250px;
            background: #17243d;
            color: white;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            overflow-y: auto;
        }

        .sidebar-logo {
            min-height: 76px;
            display: flex;
            align-items: center;
            padding: 15px 25px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 20px;
            font-weight: 700;
        }

        .sidebar-logo i {
            color: #d9a943;
            font-size: 27px;
            margin-right: 10px;
        }

        .sidebar-logo span {
            color: #d9a943;
        }

        .menu-title {
            color: #9da9bb;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 25px 25px 10px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0 12px;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a,
        .logout-btn {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 14px;
            color: #e8edf5;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            transition: 0.3s;
            border: none;
            background: transparent;
            cursor: pointer;
            text-align: left;
        }

        .sidebar-menu a i,
        .logout-btn i {
            font-size: 17px;
            width: 20px;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active,
        .logout-btn:hover {
            background: #d9a943;
            color: #17243d;
        }

        /* MAIN */

        .main-content {
            margin-left: 250px;
            width: calc(100% - 250px);
            min-height: 100vh;
        }

        /* TOPBAR */

        .topbar {
            height: 76px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            border-bottom: 1px solid #e5e8ee;
        }

        .topbar-left h1 {
            font-size: 24px;
            margin-bottom: 4px;
        }

        .topbar-left p {
            color: #777;
            font-size: 13px;
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #d9a943;
            color: #17243d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .admin-user strong {
            display: block;
            font-size: 14px;
        }

        .admin-user small {
            color: #777;
            font-size: 12px;
        }

        /* CONTENT */

        .content {
            padding: 35px;
        }

        /* STATS */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 23px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 6px 20px rgba(23, 36, 61, 0.07);
            border: 1px solid #edf0f5;
        }

        .stat-info p {
            color: #777;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .stat-info h2 {
            font-size: 28px;
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 10px;
            background: #f6e8c6;
            color: #8b671e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        /* PANELS */

        .section-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .panel {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 6px 20px rgba(23, 36, 61, 0.07);
            border: 1px solid #edf0f5;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .panel-header h3 {
            font-size: 19px;
        }

        .view-all {
            color: #8b671e;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
        }

        .view-all:hover {
            color: #17243d;
        }

        /* QUICK ACTIONS */

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .action-btn {
            text-decoration: none;
            border: 1px solid #e5e8ee;
            border-radius: 9px;
            padding: 17px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #17243d;
            font-size: 14px;
            font-weight: 600;
            transition: 0.3s;
        }

        .action-btn i {
            font-size: 21px;
            color: #d9a943;
        }

        .action-btn:hover {
            background: #17243d;
            color: white;
            border-color: #17243d;
            transform: translateY(-2px);
        }

        /* MANAGEMENT */

        .management-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .management-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px;
            border-radius: 9px;
            text-decoration: none;
            border: 1px solid #e5e8ee;
            color: #17243d;
            font-size: 14px;
            font-weight: 600;
            transition: 0.3s;
        }

        .management-btn i {
            color: #d9a943;
            font-size: 20px;
        }

        .management-btn:hover {
            background: #17243d;
            color: white;
        }

        /* RECENT */

        .recent-item {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 0;
            border-bottom: 1px solid #edf0f5;
        }

        .recent-item:last-child {
            border-bottom: none;
        }

        .recent-icon {
            width: 40px;
            height: 40px;
            background: #f6e8c6;
            color: #8b671e;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .recent-info {
            flex: 1;
        }

        .recent-info strong {
            display: block;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .recent-info small {
            color: #888;
            font-size: 12px;
        }

        /* FOOTER */

        .admin-footer {
            padding: 25px 35px;
            color: #777;
            font-size: 13px;
            text-align: center;
        }

        .admin-footer span {
            color: #d9a943;
            font-weight: bold;
        }

        /* MOBILE */

        @media(max-width: 1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .section-grid {
                grid-template-columns: 1fr;
            }

            .management-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 750px) {
            .sidebar {
                width: 70px;
            }

            .sidebar-logo {
                justify-content: center;
                padding: 0;
            }

            .sidebar-logo span,
            .sidebar-logo strong,
            .menu-title,
            .sidebar-menu a span,
            .logout-btn span {
                display: none;
            }

            .sidebar-logo i {
                margin: 0;
            }

            .sidebar-menu {
                padding: 0 10px;
            }

            .sidebar-menu a,
            .logout-btn {
                justify-content: center;
                padding: 13px 8px;
            }

            .main-content {
                margin-left: 70px;
                width: calc(100% - 70px);
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 20px;
            }
        }

        @media(max-width: 550px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .quick-actions,
            .management-grid {
                grid-template-columns: 1fr;
            }

            .topbar-left h1 {
                font-size: 20px;
            }

            .admin-user div:last-child {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="admin-wrapper">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="sidebar-logo">
            <i class="bi bi-book-half"></i>
            <strong>
                Online <span>Book Store</span>
            </strong>
        </div>

        <div class="menu-title">
            Main Menu
        </div>

        <ul class="sidebar-menu">

            <li>
                <a href="{{ route('admin.dashboard') }}" class="active">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('books.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Books</span>
                </a>
            </li>

            <li>
                <a href="{{ route('books.create') }}">
                    <i class="bi bi-plus-circle"></i>
                    <span>Add Book</span>
                </a>
            </li>

            <li>
                <a href="{{ route('stories.index') }}">
                    <i class="bi bi-journal-text"></i>
                    <span>Stories</span>
                </a>
            </li>

            <li>
                <a href="{{ route('stories.create') }}">
                    <i class="bi bi-plus-circle"></i>
                    <span>Add Story</span>
                </a>
            </li>

            <li>
                <a href="{{ route('categories.index') }}">
                    <i class="bi bi-tags"></i>
                    <span>Categories</span>
                </a>
            </li>

            <li>
                <a href="{{ route('categories.create') }}">
                    <i class="bi bi-plus-circle"></i>
                    <span>Add Category</span>
                </a>
            </li>

        </ul>

        <div class="menu-title">
            Content Management
        </div>

        <ul class="sidebar-menu">

            <li>
                <a href="{{ route('books.index') }}">
                    <i class="bi bi-collection"></i>
                    <span>Chapters</span>
                </a>
            </li>

            <li>
                <a href="{{ route('books.index') }}">
                    <i class="bi bi-file-text"></i>
                    <span>Book Pages</span>
                </a>
            </li>

            <li>
                <a href="{{ route('stories.index') }}">
                    <i class="bi bi-files"></i>
                    <span>Story Pages</span>
                </a>
            </li>

        </ul>

        <div class="menu-title">
            Account
        </div>

        <ul class="sidebar-menu">

            <li>
                <a href="{{ route('profile') }}">
                    <i class="bi bi-person-circle"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>

        </ul>

    </aside>


    <!-- MAIN -->

    <div class="main-content">

        <header class="topbar">

            <div class="topbar-left">

                <h1>Dashboard</h1>

                <p>
                    Manage your Online Book Store
                </p>

            </div>

            <div class="admin-user">

                <div class="admin-avatar">
                    <i class="bi bi-person"></i>
                </div>

                <div>

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <small>
                        Administrator
                    </small>

                </div>

            </div>

        </header>


        <main class="content">

            <!-- STATISTICS -->

            <div class="stats-grid">

                <div class="stat-card">
                    <div class="stat-info">
                        <p>Total Books</p>
                        <h2>{{ \App\Models\Book::count() }}</h2>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-book"></i>
                    </div>
                </div>


                <div class="stat-card">
                    <div class="stat-info">
                        <p>Total Stories</p>
                        <h2>{{ \App\Models\Story::count() }}</h2>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-journal-text"></i>
                    </div>
                </div>


                <div class="stat-card">
                    <div class="stat-info">
                        <p>Total Categories</p>
                        <h2>{{ \App\Models\Category::count() }}</h2>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-tags"></i>
                    </div>
                </div>


                <div class="stat-card">
                    <div class="stat-info">
                        <p>Total Languages</p>
                        <h2>0</h2>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-translate"></i>
                    </div>
                </div>

            </div>


            <div class="section-grid">

                <!-- QUICK ACTIONS -->

                <section class="panel">

                    <div class="panel-header">
                        <h3>Quick Actions</h3>
                    </div>

                    <div class="quick-actions">

                        <a href="{{ route('books.create') }}"
                           class="action-btn">

                            <i class="bi bi-plus-circle"></i>

                            <span>
                                Add New Book
                            </span>

                        </a>


                        <a href="{{ route('stories.create') }}"
                           class="action-btn">

                            <i class="bi bi-journal-plus"></i>

                            <span>
                                Add New Story
                            </span>

                        </a>


                        <a href="{{ route('categories.create') }}"
                           class="action-btn">

                            <i class="bi bi-tag"></i>

                            <span>
                                Add Category
                            </span>

                        </a>


                        <a href="{{ route('poems.create') }}"
                           class="action-btn">

                            <i class="bi bi-feather"></i>

                            <span>
                                Add New Poem
                            </span>

                        </a>


                        <a href="{{ route('books.index') }}"
                           class="action-btn">

                            <i class="bi bi-book"></i>

                            <span>
                                Manage Books
                            </span>

                        </a>

                    </div>

                </section>


                <!-- RECENT BOOKS -->

                <section class="panel">

                    <div class="panel-header">

                        <h3>
                            Recent Books
                        </h3>

                        <a href="{{ route('books.index') }}"
                           class="view-all">

                            View All

                        </a>

                    </div>

                    @php
                        $recentBooks = \App\Models\Book::latest()
                            ->take(5)
                            ->get();
                    @endphp

                    @forelse($recentBooks as $book)

                        <div class="recent-item">

                            <div class="recent-icon">
                                <i class="bi bi-book"></i>
                            </div>

                            <div class="recent-info">

                                <strong>
                                    {{ $book->title }}
                                </strong>

                                <small>
                                    Added {{ $book->created_at?->diffForHumans() }}
                                </small>

                            </div>

                        </div>

                    @empty

                        <div class="recent-item">

                            <div class="recent-icon">
                                <i class="bi bi-info-circle"></i>
                            </div>

                            <div class="recent-info">

                                <strong>
                                    No books yet
                                </strong>

                                <small>
                                    Add your first book.
                                </small>

                            </div>

                        </div>

                    @endforelse

                </section>

            </div>


            <!-- MANAGEMENT -->

            <section class="panel" style="margin-top:25px;">

                <div class="panel-header">

                    <h3>
                        Content Management
                    </h3>

                </div>

                <div class="management-grid">

                    <a href="{{ route('books.index') }}"
                       class="management-btn">

                        <i class="bi bi-book"></i>

                        <span>
                            Manage Books
                        </span>

                    </a>


                    <a href="{{ route('categories.index') }}"
                       class="management-btn">

                        <i class="bi bi-tags"></i>

                        <span>
                            Manage Categories
                        </span>

                    </a>


                    <a href="{{ route('stories.index') }}"
                       class="management-btn">

                        <i class="bi bi-journal-text"></i>

                        <span>
                            Manage Stories
                        </span>

                    </a>


                    <a href="{{ route('books.index') }}"
                       class="management-btn">

                        <i class="bi bi-file-text"></i>

                        <span>
                            Book Pages
                        </span>

                    </a>


                    <a href="{{ route('books.index') }}"
                       class="management-btn">

                        <i class="bi bi-collection"></i>

                        <span>
                            Chapters
                        </span>

                    </a>


                    <a href="{{ route('stories.index') }}"
                       class="management-btn">

                        <i class="bi bi-files"></i>

                        <span>
                            Story Pages
                        </span>

                    </a>

                </div>

            </section>


            <!-- RECENT STORIES -->

            <section class="panel" style="margin-top:25px;">

                <div class="panel-header">

                    <h3>
                        Recent Stories
                    </h3>

                    <a href="{{ route('stories.index') }}"
                       class="view-all">

                        View All

                    </a>

                </div>

                @php
                    $recentStories = \App\Models\Story::latest()
                        ->take(5)
                        ->get();
                @endphp

                @forelse($recentStories as $story)

                    <div class="recent-item">

                        <div class="recent-icon">
                            <i class="bi bi-journal-text"></i>
                        </div>

                        <div class="recent-info">

                            <strong>
                                {{ $story->title }}
                            </strong>

                            <small>
                                Added {{ $story->created_at?->diffForHumans() }}
                            </small>

                        </div>

                    </div>

                @empty

                    <div class="recent-item">

                        <div class="recent-icon">
                            <i class="bi bi-info-circle"></i>
                        </div>

                        <div class="recent-info">

                            <strong>
                                No stories yet
                            </strong>

                            <small>
                                Add your first story.
                            </small>

                        </div>

                    </div>

                @endforelse

            </section>

        </main>


        <footer class="admin-footer">

            © {{ date('Y') }}

            <span>Online Book Store</span>.

            Admin Panel

        </footer>

    </div>

</div>

</body>
</html>