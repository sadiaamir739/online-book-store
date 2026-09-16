<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Online Book Store</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #333;
        }

        /* NAVBAR */
        .navbar {
            background: #222;
            color: white;
            padding: 18px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 6px;
            transition: 0.2s;
        }

        .nav-links a:hover {
            background: #444;
        }

        .login-btn {
            background: white;
            color: #222 !important;
            font-weight: bold;
        }

        .register-btn {
            background: #555;
            font-weight: bold;
        }

        .profile-btn {
            background: #555;
            font-weight: bold;
        }

        .logout-btn {
            background: #555;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: #444;
        }

        /* HERO */
        .hero {
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 60px 20px;
            background: white;
        }

        .hero-content {
            max-width: 800px;
        }

        .hero h1 {
            font-size: 52px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 13px 25px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-dark {
            background: #222;
            color: white;
        }

        .btn-light {
            background: #eee;
            color: #222;
        }

        .btn:hover {
            opacity: 0.85;
        }

        /* FEATURES */
        .section {
            width: 90%;
            max-width: 1100px;
            margin: 50px auto;
            text-align: center;
        }

        .section h2 {
            font-size: 32px;
            margin-bottom: 15px;
        }

        .section > p {
            color: #666;
            margin-bottom: 30px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .feature-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .feature-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .feature-card h3 {
            margin-bottom: 10px;
        }

        .feature-card p {
            color: #666;
            line-height: 1.5;
        }

        /* FOOTER */
        .footer {
            background: #222;
            color: white;
            text-align: center;
            padding: 25px;
            margin-top: 60px;
        }

        /* MOBILE */
        @media (max-width: 700px) {

            .navbar {
                flex-direction: column;
                gap: 15px;
                padding: 20px;
            }

            .nav-links {
                justify-content: center;
            }

            .hero h1 {
                font-size: 38px;
            }

            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="logo">
            📚 Online Book Store
        </div>

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

                <a href="{{ route('profile') }}" class="profile-btn">
                    👤 Profile
                </a>

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    style="display: inline;"
                >
                    @csrf

                    <button
                        type="submit"
                        class="logout-btn"
                    >
                        🚪 Logout
                    </button>
                </form>

            @else

                <a href="{{ route('login') }}" class="login-btn">
                    Login
                </a>

                <a href="{{ route('register') }}" class="register-btn">
                    Register
                </a>

            @endauth

        </div>

    </nav>


    <!-- HERO -->
    <section class="hero">

        <div class="hero-content">

            <h1>
                Welcome to Our Book Store 📖
            </h1>

            <p>
                Discover amazing books, explore different categories,
                and find your next favorite story.
            </p>

            <div class="hero-buttons">

                <a
                    href="{{ route('books.index') }}"
                    class="btn btn-dark"
                >
                    Explore Books
                </a>

                <a
                    href="{{ route('categories.index') }}"
                    class="btn btn-light"
                >
                    View Categories
                </a>

            </div>

        </div>

    </section>


    <!-- FEATURES -->
    <section class="section">

        <h2>
            Why Choose Our Book Store?
        </h2>

        <p>
            Everything you need to explore and manage your favorite books.
        </p>

        <div class="features">

            <div class="feature-card">

                <div class="feature-icon">
                    📚
                </div>

                <h3>
                    Large Collection
                </h3>

                <p>
                    Explore books from different categories and authors.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    📂
                </div>

                <h3>
                    Book Categories
                </h3>

                <p>
                    Find books easily through organized categories.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    ✍️
                </div>

                <h3>
                    Share Your Stories
                </h3>

                <p>
                    Write and share your own stories with the community.
                </p>

            </div>

        </div>

    </section>


    <!-- FOOTER -->
    <footer class="footer">

        <p>
            © {{ date('Y') }} Online Book Store. All Rights Reserved.
        </p>

    </footer>

</body>

</html>