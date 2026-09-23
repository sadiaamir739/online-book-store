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
