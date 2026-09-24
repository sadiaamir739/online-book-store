<style>
    .legacy-navbar {
        display: none !important;
    }

    .site-navbar {
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

    .site-navbar .site-logo {
        color: white;
        font-size: 23px;
        font-weight: 700;
        white-space: nowrap;
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .site-navbar .site-logo i {
        color: #d4a84f;
        font-size: 25px;
    }

    .site-navbar .site-logo span:last-child {
        color: #d4a84f;
    }

    .site-navbar .site-links {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .site-navbar .site-links a,
    .site-navbar .site-logout {
        color: #ffffff;
        padding: 10px 14px;
        border-radius: 7px;
        font-size: 14px;
        text-decoration: none;
        transition: 0.25s ease;
    }

    .site-navbar .site-links a:hover,
    .site-navbar .site-logout:hover {
        background: #344e72;
    }

    .site-navbar .site-logout {
        background: #344e72;
        border: 0;
        cursor: pointer;
        font-family: inherit;
        font-weight: 700;
    }

    .site-navbar .site-login {
        background: #ffffff;
        color: #17233c !important;
        font-weight: 700;
    }

    .site-navbar .site-register {
        background: #d4a84f;
        color: #17233c !important;
        font-weight: 700;
    }

    .admin-sidebar-nav {
        width: 250px;
        background: #17243d;
        color: white;
        min-height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        z-index: 1100;
        overflow-y: auto;
    }

    .admin-sidebar-nav .sidebar-logo {
        min-height: 76px;
        display: flex;
        align-items: center;
        padding: 15px 25px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        font-size: 20px;
        font-weight: 700;
    }

    .admin-sidebar-nav .sidebar-logo i {
        color: #d9a943;
        font-size: 27px;
        margin-right: 10px;
    }

    .admin-sidebar-nav .sidebar-logo span,
    .admin-sidebar-nav .menu-title {
        color: #d9a943;
    }

    .admin-sidebar-nav .menu-title {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        padding: 25px 25px 10px;
    }

    .admin-sidebar-nav .sidebar-menu {
        list-style: none;
        padding: 0 12px;
        margin: 0;
    }

    .admin-sidebar-nav .sidebar-menu li {
        margin-bottom: 5px;
    }

    .admin-sidebar-nav .sidebar-menu a,
    .admin-sidebar-nav .logout-btn {
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

    .admin-sidebar-nav .sidebar-menu a i,
    .admin-sidebar-nav .logout-btn i {
        font-size: 17px;
        width: 20px;
    }

    .admin-sidebar-nav .sidebar-menu a:hover,
    .admin-sidebar-nav .sidebar-menu a.active,
    .admin-sidebar-nav .logout-btn:hover {
        background: #d9a943;
        color: #17243d;
    }

    body:has(.admin-sidebar-nav) {
        margin-left: 250px !important;
    }

    @media (max-width: 700px) {
        .admin-sidebar-nav {
            width: 72px;
        }

        .admin-sidebar-nav .sidebar-logo {
            justify-content: center;
            padding: 15px 10px;
        }

        .admin-sidebar-nav .sidebar-logo strong,
        .admin-sidebar-nav .sidebar-menu a span,
        .admin-sidebar-nav .menu-title {
            display: none;
        }

        .admin-sidebar-nav .sidebar-logo i {
            margin-right: 0;
        }

        .admin-sidebar-nav .sidebar-menu a,
        .admin-sidebar-nav .logout-btn {
            justify-content: center;
            padding: 12px 8px;
        }

        body:has(.admin-sidebar-nav) {
            margin-left: 72px !important;
        }
    }

    @media (max-width: 700px) {
        .site-navbar {
            padding: 14px 5%;
            flex-wrap: wrap;
            gap: 12px;
        }

        .site-navbar .site-links {
            gap: 2px;
            flex-wrap: wrap;
        }

        .site-navbar .site-links a,
        .site-navbar .site-logout {
            padding: 8px 9px;
            font-size: 13px;
        }
    }
</style>

@auth
    @if (auth()->user()->is_admin)
        <aside class="admin-sidebar-nav">
            <div class="sidebar-logo">
                <i class="bi bi-book-half"></i>
                <strong>Online <span>Book Store</span></strong>
            </div>

            <div class="menu-title">Main Menu</div>
            <ul class="sidebar-menu">
                <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2"></i><span>Dashboard</span></a></li>
                <li><a href="{{ route('books.index') }}" class="{{ request()->routeIs('books.*') ? 'active' : '' }}"><i class="bi bi-book"></i><span>Books</span></a></li>
                <li><a href="{{ route('books.create') }}"><i class="bi bi-plus-circle"></i><span>Add Book</span></a></li>
                <li><a href="{{ route('stories.index') }}" class="{{ request()->routeIs('stories.*') ? 'active' : '' }}"><i class="bi bi-journal-text"></i><span>Stories</span></a></li>
                <li><a href="{{ route('stories.create') }}"><i class="bi bi-plus-circle"></i><span>Add Story</span></a></li>
                <li><a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}"><i class="bi bi-tags"></i><span>Categories</span></a></li>
                <li><a href="{{ route('categories.create') }}"><i class="bi bi-plus-circle"></i><span>Add Category</span></a></li>
                <li><a href="{{ route('poems.index') }}" class="{{ request()->routeIs('poems.*') ? 'active' : '' }}"><i class="bi bi-feather"></i><span>Poetry</span></a></li>
                <li><a href="{{ route('poems.create') }}"><i class="bi bi-plus-circle"></i><span>Add Poem</span></a></li>
            </ul>

            <div class="menu-title">Content Management</div>
            <ul class="sidebar-menu">
                <li><a href="{{ route('books.index') }}"><i class="bi bi-collection"></i><span>Chapters</span></a></li>
                <li><a href="{{ route('books.index') }}"><i class="bi bi-file-text"></i><span>Book Pages</span></a></li>
                <li><a href="{{ route('stories.index') }}"><i class="bi bi-files"></i><span>Story Pages</span></a></li>
            </ul>

            <div class="menu-title">Account</div>
            <ul class="sidebar-menu">
                <li><a href="{{ route('profile') }}"><i class="bi bi-person-circle"></i><span>Profile</span></a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn"><i class="bi bi-box-arrow-right"></i><span>Logout</span></button>
                    </form>
                </li>
            </ul>
        </aside>
    @else
        <nav class="site-navbar">
    <a href="{{ route('home') }}" class="site-logo">
        <i class="bi bi-book-half"></i>
        <span>Online</span>
        <span>Book Store</span>
    </a>

    <div class="site-links">
        <a href="{{ route('home') }}">
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
        <a href="{{ route('poems.index') }}">
            <i class="bi bi-feather"></i>
            Poetry
        </a>

        @auth
            @if (auth()->user()->is_admin)
                <a href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2"></i>
                    Admin Dashboard
                </a>
            @endif
            <a href="{{ route('profile') }}">
                <i class="bi bi-person-circle"></i>
                Profile
            </a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="site-logout">
                    <i class="bi bi-box-arrow-right"></i>
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="site-login">
                <i class="bi bi-box-arrow-in-right"></i>
                Login
            </a>
            <a href="{{ route('register') }}" class="site-register">
                <i class="bi bi-person-plus"></i>
                Register
            </a>
        @endauth
    </div>
        </nav>
    @endif
@else
    <nav class="site-navbar">
        <a href="{{ route('home') }}" class="site-logo">
            <i class="bi bi-book-half"></i>
            <span>Online</span>
            <span>Book Store</span>
        </a>

        <div class="site-links">
            <a href="{{ route('home') }}"><i class="bi bi-house"></i> Home</a>
            <a href="{{ route('books.index') }}"><i class="bi bi-book"></i> Books</a>
            <a href="{{ route('categories.index') }}"><i class="bi bi-grid"></i> Categories</a>
            <a href="{{ route('stories.index') }}"><i class="bi bi-journal-text"></i> Stories</a>
            <a href="{{ route('poems.index') }}"><i class="bi bi-feather"></i> Poetry</a>
            <a href="{{ route('login') }}" class="site-login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            <a href="{{ route('register') }}" class="site-register"><i class="bi bi-person-plus"></i> Register</a>
        </div>
    </nav>
@endauth
