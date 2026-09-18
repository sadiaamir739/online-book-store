<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Write Story Page | Online Book Store</title>

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        /* =========================
           GLOBAL
        ========================== */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6fa;
            color: #17243d;
            min-height: 100vh;
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
            flex-wrap: wrap;
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
            padding: 15px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
        }

        .admin-title {
            font-size: 14px;
            font-weight: 700;
            color: #17243d;
        }

        .admin-title i {
            color: #d9a943;
            margin-right: 6px;
        }

        .admin-dashboard {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #17243d;
            color: white;
            padding: 10px 16px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: bold;
            transition: 0.25s ease;
        }

        .admin-dashboard:hover {
            background: #304e78;
        }


        /* =========================
           PAGE CONTAINER
        ========================== */

        .container {
            width: 90%;
            max-width: 950px;
            margin: 45px auto;
            padding-bottom: 60px;
        }


        /* =========================
           PAGE HEADER
        ========================== */

        .page-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 34px;
            color: #17243d;
            margin-bottom: 10px;
        }

        .page-header h1 i {
            color: #d9a943;
            margin-right: 7px;
        }

        .page-header p {
            color: #667085;
            font-size: 15px;
        }


        /* =========================
           STORY INFO
        ========================== */

        .story-info {
            background: white;
            padding: 25px;
            border-radius: 14px;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(23, 36, 61, 0.09);
            border-left: 5px solid #d9a943;
        }

        .story-info h2 {
            color: #17243d;
            font-size: 25px;
            margin-bottom: 15px;
        }

        .story-info p {
            color: #667085;
            font-size: 14px;
            margin-top: 8px;
        }

        .story-info strong {
            color: #17243d;
        }

        .story-info i {
            color: #d9a943;
            margin-right: 5px;
        }


        /* =========================
           WRITING BOX
        ========================== */

        .writing-box {
            background: white;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(23, 36, 61, 0.09);
        }


        /* =========================
           ERRORS
        ========================== */

        .errors {
            background: #fef3f2;
            border: 1px solid #fecdca;
            color: #b42318;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .errors strong {
            display: block;
            margin-bottom: 8px;
        }

        .errors ul {
            margin-left: 20px;
        }


        /* =========================
           FORM
        ========================== */

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 9px;
            color: #17243d;
        }

        label i {
            color: #d9a943;
            margin-right: 6px;
        }

        input,
        textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid #cfd5df;
            border-radius: 8px;
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
            color: #17243d;
            outline: none;
            transition: 0.25s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #304e78;
            box-shadow: 0 0 0 3px rgba(48, 78, 120, 0.12);
        }

        textarea {
            min-height: 400px;
            resize: vertical;
            line-height: 1.8;
        }

        .field-error {
            color: #b42318;
            font-size: 13px;
            margin-top: 6px;
        }


        /* =========================
           BUTTONS
        ========================== */

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .submit-btn,
        .back-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .submit-btn {
            background: #304e78;
            color: white;
            border: none;
        }

        .submit-btn:hover {
            background: #17243d;
        }

        .back-btn {
            background: #e9edf3;
            color: #17243d;
        }

        .back-btn:hover {
            background: #dce2eb;
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

        @media(max-width: 750px) {

            .navbar {
                height: auto;
                padding: 20px;
                flex-direction: column;
                gap: 20px;
            }

            .nav-links {
                justify-content: center;
            }

            .admin-bar {
                justify-content: center;
                text-align: center;
            }

            .container {
                width: 92%;
                margin: 30px auto;
            }

            .writing-box {
                padding: 25px 20px;
            }

            .page-header h1 {
                font-size: 29px;
            }
        }


        @media(max-width: 500px) {

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

            .story-info {
                padding: 20px;
            }

            .story-info h2 {
                font-size: 21px;
            }

            .writing-box {
                padding: 22px 17px;
            }

            .form-actions {
                flex-direction: column;
            }

            .submit-btn,
            .back-btn {
                width: 100%;
            }

            textarea {
                min-height: 320px;
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


    <!-- =========================
         ADMIN BAR
    ========================== -->

    @auth

        @if(auth()->user()->is_admin)

            <div class="admin-bar">

                <div class="admin-title">

                    <i class="bi bi-shield-lock"></i>

                    Story Page Management

                </div>


                <a
                    href="{{ route('admin.dashboard') }}"
                    class="admin-dashboard"
                >

                    <i class="bi bi-speedometer2"></i>

                    Admin Dashboard

                </a>

            </div>

        @endif

    @endauth



    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <div class="container">


        <div class="page-header">

            <h1>

                <i class="bi bi-pencil-square"></i>

                Write Your Story

            </h1>

            <p>
                Add a new page to this story.
            </p>

        </div>



        <!-- =========================
             STORY INFORMATION
        ========================== -->

        <div class="story-info">

            <h2>

                <i class="bi bi-journal-text"></i>

                {{ $story->title }}

            </h2>


            <p>

                <i class="bi bi-person"></i>

                <strong>Author:</strong>

                {{ $story->author ?? 'Story Author' }}

            </p>


            <p>

                <i class="bi bi-translate"></i>

                <strong>Language:</strong>

                {{ $story->language ?? 'Not specified' }}

            </p>

        </div>



        <!-- =========================
             WRITING BOX
        ========================== -->

        <div class="writing-box">


            <!-- VALIDATION ERRORS -->

            @if($errors->any())

                <div class="errors">

                    <strong>

                        <i class="bi bi-exclamation-triangle"></i>

                        Please fix the following errors:

                    </strong>

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif



            <!-- FORM -->

            <form
                action="{{ route('stories.pages.store', $story->id) }}"
                method="POST"
            >

                @csrf


                <!-- PAGE TITLE -->

                <div class="form-group">

                    <label for="title">

                        <i class="bi bi-card-heading"></i>

                        Page Title

                    </label>


                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Example: Chapter 1"
                    >


                    @error('title')

                        <div class="field-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                <!-- STORY CONTENT -->

                <div class="form-group">

                    <label for="content">

                        <i class="bi bi-file-text"></i>

                        Write Your Story

                    </label>


                    <textarea
                        id="content"
                        name="content"
                        placeholder="Start writing your story here..."
                        required
                    >{{ old('content') }}</textarea>


                    @error('content')

                        <div class="field-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                <!-- ACTION BUTTONS -->

                <div class="form-actions">

                    <button
                        type="submit"
                        class="submit-btn"
                    >

                        <i class="bi bi-check-circle"></i>

                        Save Page

                    </button>


                    <a
                        href="{{ route('stories.pages', $story->id) }}"
                        class="back-btn"
                    >

                        <i class="bi bi-arrow-left"></i>

                        Back to Story Pages

                    </a>

                </div>

            </form>

        </div>

    </div>



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