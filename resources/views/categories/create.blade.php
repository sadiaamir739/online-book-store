<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Category | Online Book Store</title>

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

        body {
            font-family: Arial, sans-serif;
            background: #f4f6fa;
            color: #17243d;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background: #17243d;
            padding: 18px 7%;
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
            gap: 10px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 9px 14px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .nav-links a:hover {
            background: #304e78;
        }

        /* PAGE */
        .page-container {
            max-width: 850px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 34px;
            margin-bottom: 10px;
        }

        .page-header p {
            color: #667085;
            font-size: 16px;
        }

        /* FORM CARD */
        .form-card {
            background: white;
            border-radius: 14px;
            padding: 35px;
            box-shadow: 0 8px 25px rgba(23, 36, 61, 0.10);
            border: 1px solid #e5e7eb;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #17243d;
        }

        .form-group label i {
            color: #d9a943;
            margin-right: 6px;
        }

        .form-control {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #cfd5df;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
            font-family: Arial, sans-serif;
        }

        .form-control:focus {
            border-color: #304e78;
            box-shadow: 0 0 0 3px rgba(48, 78, 120, 0.12);
        }

        textarea.form-control {
            min-height: 140px;
            resize: vertical;
        }

        .error-message {
            margin-top: 6px;
            color: #b42318;
            font-size: 14px;
        }

        /* BUTTONS */
        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary {
            background: #304e78;
            color: white;
        }

        .btn-primary:hover {
            background: #17243d;
        }

        .btn-secondary {
            background: #e9edf3;
            color: #17243d;
        }

        .btn-secondary:hover {
            background: #dce2eb;
        }

        /* ADMIN BAR */
        .admin-bar {
            max-width: 1100px;
            margin: 25px auto 0;
            padding: 0 20px;
            display: flex;
            justify-content: flex-end;
        }

        .admin-dashboard {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #17243d;
            color: white;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 8px;
            font-weight: bold;
        }

        .admin-dashboard:hover {
            background: #304e78;
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {
            .navbar {
                padding: 15px 5%;
            }

            .nav-links {
                width: 100%;
            }

            .page-container {
                margin: 30px auto;
            }

            .form-card {
                padding: 25px 20px;
            }

            .page-header h1 {
                font-size: 28px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <a href="{{ route('home') }}" class="logo">
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
                    <i class="bi bi-person"></i>
                    Profile
                </a>

                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf

                    <button type="submit"
                        style="
                            background:none;
                            border:none;
                            color:white;
                            padding:9px 14px;
                            border-radius:6px;
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


    <!-- ADMIN DASHBOARD -->
    @auth
        @if(auth()->user()->is_admin)

            <div class="admin-bar">

                <a href="{{ route('admin.dashboard') }}" class="admin-dashboard">
                    <i class="bi bi-speedometer2"></i>
                    Admin Dashboard
                </a>

            </div>

        @endif
    @endauth


    <!-- MAIN CONTENT -->
    <main class="page-container">

        <div class="page-header">

            <h1>
                <i class="bi bi-folder-plus"></i>
                Add New Category
            </h1>

            <p>
                Create a new category for your books and stories.
            </p>

        </div>


        <!-- FORM -->
        <div class="form-card">

            @if ($errors->any())

                <div style="
                    background:#fef3f2;
                    border:1px solid #fecdca;
                    color:#b42318;
                    padding:15px;
                    border-radius:8px;
                    margin-bottom:22px;
                ">

                    <strong>Please fix the following errors:</strong>

                    <ul style="margin:8px 0 0 20px;">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            <form action="{{ route('categories.store') }}" method="POST">

                @csrf


                <!-- CATEGORY NAME -->
                <div class="form-group">

                    <label for="name">
                        <i class="bi bi-tag"></i>
                        Category Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="Enter category name"
                        required
                    >

                    @error('name')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- DESCRIPTION -->
                <div class="form-group">

                    <label for="description">
                        <i class="bi bi-card-text"></i>
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                        placeholder="Enter category description (optional)"
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- ACTIONS -->
                <div class="form-actions">

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i>
                        Add Category
                    </button>

                    <a
                        href="{{ route('categories.index') }}"
                        class="btn btn-secondary"
                    >
                        <i class="bi bi-arrow-left"></i>
                        Back to Categories
                    </a>

                </div>

            </form>

        </div>

    </main>

</body>
</html>