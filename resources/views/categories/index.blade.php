<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Categories | Online Book Store</title>

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
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.12);
        }

        .logo {
            color: white;
            font-size: 25px;
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

        .logo .gold {
            color: #d9a943;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-links a {
            color: white;
            font-size: 15px;
            font-weight: 600;
            padding: 10px 13px;
            border-radius: 7px;
            transition: 0.3s;
        }

        .nav-links a:hover {
            background: #304e78;
            color: white;
        }

        .nav-links a i {
            margin-right: 5px;
        }

        .login-btn {
            background: white;
            color: #17243d !important;
        }

        .login-btn:hover {
            background: #f0f0f0 !important;
            color: #17243d !important;
        }

        .register-btn {
            background: #d9a943;
            color: #17243d !important;
        }

        .register-btn:hover {
            background: #e4b95a !important;
            color: #17243d !important;
        }

        /* =========================
           ADMIN ACTION BAR
        ========================== */

        .admin-bar {
            width: 88%;
            max-width: 1200px;
            margin: 25px auto 0;
            background: white;
            border-radius: 10px;
            padding: 16px 20px;
            box-shadow: 0 5px 18px rgba(23, 36, 61, 0.08);
            border-left: 5px solid #d9a943;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #17243d;
            font-weight: bold;
        }

        .admin-info i {
            color: #d9a943;
            font-size: 20px;
        }

        .admin-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 15px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s ease;
        }

        .dashboard-btn {
            background: #304e78;
            color: white;
        }

        .dashboard-btn:hover {
            background: #17243d;
            color: white;
        }

        .add-btn {
            background: #d9a943;
            color: #17243d;
        }

        .add-btn:hover {
            background: #e4b95a;
            color: #17243d;
        }

        /* =========================
           HERO
        ========================== */

        .hero {
            background: linear-gradient(
                135deg,
                #203758,
                #304e78
            );

            margin-top: 25px;
            padding: 70px 8%;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "\F4F4";
            font-family: "bootstrap-icons";
            position: absolute;
            right: 7%;
            top: 15px;
            font-size: 180px;
            color: white;
            opacity: 0.035;
            transform: rotate(-10deg);
        }

        .hero-small {
            color: #d9a943;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            color: white;
            font-size: 48px;
            margin-bottom: 15px;
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
           CATEGORY CONTAINER
        ========================== */

        .container {
            width: 88%;
            max-width: 1200px;
            margin: auto;
            padding: 70px 0 80px;
        }

        /* =========================
           HEADING
        ========================== */

        .heading {
            text-align: center;
            margin-bottom: 40px;
        }

        .heading h2 {
            font-size: 30px;
            color: #17243d;
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
           SUCCESS MESSAGE
        ========================== */

        .success-message {
            background: #edf8f1;
            border: 1px solid #b9dfc5;
            color: #24613a;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 30px;

            display: flex;
            align-items: center;
            gap: 9px;
        }

        .success-message i {
            font-size: 18px;
        }

        /* =========================
           CATEGORY GRID
        ========================== */

        .category-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        /* =========================
           CATEGORY CARD
        ========================== */

        .category-card {
            background: white;
            padding: 35px 25px 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(23, 36, 61, 0.09);
            transition: 0.3s ease;
            border: 1px solid #e7eaf0;
        }

        .category-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(23, 36, 61, 0.18);
        }

        /* =========================
           CATEGORY ICON
        ========================== */

        .category-icon {
            width: 75px;
            height: 75px;
            margin: auto auto 20px;

            border-radius: 50%;

            background: #f6e8c6;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #8b671e;

            font-size: 31px;

            transition: 0.3s ease;
        }

        .category-card:hover .category-icon {
            background: #d9a943;
            color: #17243d;
            transform: scale(1.08);
        }

        /* =========================
           CATEGORY TITLE
        ========================== */

        .category-card h3 {
            margin-bottom: 10px;
            font-size: 20px;
            color: #17243d;
        }

        /* =========================
           CATEGORY DESCRIPTION
        ========================== */

        .category-card p {
            color: #777;
            line-height: 1.6;
            font-size: 14px;
            min-height: 67px;
        }

        /* =========================
           CATEGORY ACTIONS
        ========================== */

        .category-actions {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid #edf0f4;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;

            padding: 9px 13px;

            border-radius: 6px;

            font-size: 13px;
            font-weight: bold;

            border: none;
            cursor: pointer;

            transition: 0.2s ease;
        }

        .edit-btn {
            background: #e8eef7;
            color: #304e78;
        }

        .edit-btn:hover {
            background: #304e78;
            color: white;
        }

        .delete-btn {
            background: #fbeaea;
            color: #b42318;
        }

        .delete-btn:hover {
            background: #b42318;
            color: white;
        }

        .delete-form {
            display: inline;
        }

        /* =========================
           EMPTY STATE
        ========================== */

        .empty-state {
            background: white;
            border-radius: 12px;
            padding: 55px 25px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(23, 36, 61, 0.08);
            border: 1px solid #e7eaf0;
        }

        .empty-state i {
            font-size: 55px;
            color: #d9a943;
            display: block;
            margin-bottom: 18px;
        }

        .empty-state h3 {
            color: #17243d;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #777;
            margin-bottom: 20px;
        }

        /* =========================
           FOOTER
        ========================== */

        footer {
            background: #17243d;
            color: white;
            text-align: center;
            padding: 25px;
            font-size: 14px;
        }

        footer span {
            color: #d9a943;
        }

        footer i {
            color: #d9a943;
            margin-right: 5px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media(max-width: 950px) {

            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .nav-links {
                gap: 3px;
            }

            .nav-links a {
                padding: 9px 9px;
                font-size: 14px;
            }

            .admin-bar {
                width: 90%;
            }
        }

        @media(max-width: 700px) {

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
                width: 90%;
                flex-direction: column;
                align-items: stretch;
            }

            .admin-info {
                justify-content: center;
            }

            .admin-actions {
                flex-direction: column;
            }

            .admin-btn {
                width: 100%;
            }

            .hero {
                padding: 60px 20px;
            }

            .hero h1 {
                font-size: 38px;
            }

            .hero p {
                font-size: 16px;
            }

            .category-grid {
                grid-template-columns: 1fr;
            }

            .container {
                width: 90%;
                padding: 55px 0 65px;
            }

        }

        @media(max-width: 450px) {

            .logo {
                font-size: 21px;
            }

            .logo i {
                font-size: 23px;
            }

            .nav-links {
                gap: 5px;
            }

            .nav-links a {
                font-size: 13px;
                padding: 8px 9px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .heading h2 {
                font-size: 26px;
            }

            .category-actions {
                flex-direction: column;
            }

            .action-btn {
                width: 100%;
            }

        }

    </style>

</head>


<body>


    <!-- =========================
         NAVBAR
    ========================== -->

    <nav class="navbar">

        <a href="{{ url('/') }}" class="logo">

            <i class="bi bi-bookshelf"></i>

            <span>
                Online
            </span>

            <span class="gold">
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
                    action="{{ route('logout') }}"
                    method="POST"
                    style="display:inline;"
                >
                    @csrf

                    <button
                        type="submit"
                        style="
                            border:none;
                            cursor:pointer;
                            background:white;
                            color:#17243d;
                            padding:10px 13px;
                            border-radius:7px;
                            font-size:15px;
                            font-weight:600;
                        "
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
         ADMIN ACTIONS
    ========================== -->

    @auth

        @if(auth()->user()->is_admin)

            <div class="admin-bar">

                <div class="admin-info">

                    <i class="bi bi-shield-lock"></i>

                    <span>
                        Category Management
                    </span>

                </div>


                <div class="admin-actions">

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="admin-btn dashboard-btn"
                    >
                        <i class="bi bi-speedometer2"></i>
                        Admin Dashboard
                    </a>

                    <a
                        href="{{ route('categories.create') }}"
                        class="admin-btn add-btn"
                    >
                        <i class="bi bi-plus-circle"></i>
                        Add Category
                    </a>

                </div>

            </div>

        @endif

    @endauth


    <!-- =========================
         HERO
    ========================== -->

    <section class="hero">

        <div class="hero-small">
            FIND YOUR INTEREST
        </div>

        <h1>
            Explore Book <span>Categories</span>
        </h1>

        <p>
            Choose a category and discover books that match
            your interests and reading mood.
        </p>

    </section>


    <!-- =========================
         CATEGORY CONTENT
    ========================== -->

    <main class="container">


        @if(session('success'))

            <div class="success-message">

                <i class="bi bi-check-circle-fill"></i>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        <div class="heading">

            <h2>
                Browse By <span>Category</span>
            </h2>

            <p>
                Explore our collection through different genres.
            </p>

        </div>


        @if($categories->count())


            <div class="category-grid">


                @foreach($categories as $category)


                    <div class="category-card">


                        <div class="category-icon">

                            <i class="bi bi-bookmark-star"></i>

                        </div>


                        <h3>
                            {{ $category->name }}
                        </h3>


                        <p>

                            {{ $category->description
                                ?: 'Explore books available in this category.' }}

                        </p>


                        @auth

                            @if(auth()->user()->is_admin)

                                <div class="category-actions">


                                    <!-- EDIT -->

                                    <a
                                        href="{{ route('categories.edit', $category->id) }}"
                                        class="action-btn edit-btn"
                                    >

                                        <i class="bi bi-pencil-square"></i>

                                        Edit

                                    </a>


                                    <!-- DELETE -->

                                    <form
                                        action="{{ route('categories.destroy', $category->id) }}"
                                        method="POST"
                                        class="delete-form"
                                        onsubmit="return confirm('Are you sure you want to delete this category?');"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn delete-btn"
                                        >

                                            <i class="bi bi-trash3"></i>

                                            Delete

                                        </button>

                                    </form>


                                </div>

                            @endif

                        @endauth


                    </div>


                @endforeach


            </div>


        @else


            <div class="empty-state">

                <i class="bi bi-folder-x"></i>

                <h3>
                    No Categories Available
                </h3>

                <p>
                    There are currently no categories in the store.
                </p>


                @auth

                    @if(auth()->user()->is_admin)

                        <a
                            href="{{ route('categories.create') }}"
                            class="admin-btn add-btn"
                        >
                            <i class="bi bi-plus-circle"></i>
                            Add First Category
                        </a>

                    @endif

                @endauth

            </div>


        @endif


    </main>


    <!-- =========================
         FOOTER
    ========================== -->

    <footer>

        <i class="bi bi-book-half"></i>

        © {{ date('Y') }}

        <span>
            Online Book Store
        </span>.

        Read. Discover. Enjoy.

    </footer>


</body>

</html>