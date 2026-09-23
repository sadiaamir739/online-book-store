<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Story | Online Book Store</title>

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
            align-items: center;
            gap: 12px;
        }

        .nav-btn {
            text-decoration: none;
            color: white;
            background: #304e78;
            padding: 10px 16px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 7px;
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
            align-items: center;
        }

        .admin-dashboard {
            background: #d9a943;
            color: #17243d;
            text-decoration: none;
            padding: 10px 17px;
            border-radius: 7px;
            font-weight: 700;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: 0.2s ease;
        }

        .admin-dashboard:hover {
            background: white;
            color: #17243d;
        }

        /* ================================
           PAGE
        ================================= */

        .page-wrapper {
            padding: 40px 20px 60px;
        }

        .container {
            max-width: 760px;
            margin: 0 auto;
        }

        /* ================================
           HEADER
        ================================= */

        .page-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .page-header .icon {
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
            font-size: 32px;
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
            box-shadow: 0 5px 22px rgba(23, 36, 61, 0.10);
            border: 1px solid #e4e8ef;
        }

        /* ================================
           BACK BUTTON
        ================================= */

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #304e78;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 25px;
            transition: 0.2s ease;
        }

        .back-btn:hover {
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

        .required {
            color: #c0392b;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #ccd3df;
            border-radius: 8px;
            background: white;
            color: #17243d;
            font-size: 15px;
            font-family: inherit;
            outline: none;
            transition: 0.2s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #304e78;
            box-shadow: 0 0 0 3px rgba(48, 78, 120, 0.10);
        }

        textarea {
            min-height: 160px;
            resize: vertical;
            line-height: 1.6;
        }

        input[type="file"] {
            padding: 10px;
            cursor: pointer;
            background: #f8f9fb;
        }

        .help-text {
            display: block;
            margin-top: 7px;
            color: #7b8798;
            font-size: 12px;
        }

        /* ================================
           VALIDATION ERRORS
        ================================= */

        .error-box {
            background: #fff1f1;
            border: 1px solid #e4a5a5;
            color: #9b2c2c;
            border-radius: 8px;
            padding: 14px 18px;
            margin-bottom: 25px;
        }

        .error-box-title {
            font-weight: 700;
            margin-bottom: 7px;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .error-box ul {
            margin-left: 25px;
        }

        .error-box li {
            margin-bottom: 4px;
            font-size: 14px;
        }

        .field-error {
            color: #c0392b;
            font-size: 13px;
            margin-top: 6px;
        }

        /* ================================
           SUBMIT
        ================================= */

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
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

        .btn-primary {
            flex: 1;
            background: #17243d;
            color: white;
        }

        .btn-primary:hover {
            background: #304e78;
        }

        .btn-secondary {
            background: #e9edf3;
            color: #17243d;
        }

        .btn-secondary:hover {
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
                font-size: 27px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-primary {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    @include('partials.navbar')

    <!-- ================================
         NAVBAR
    ================================= -->

    <nav class="navbar legacy-navbar">

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

            <a href="{{ route('admin.dashboard') }}" class="admin-dashboard">
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

            <!-- Page Header -->

            <div class="page-header">

                <div class="icon">
                    <i class="bi bi-journal-plus"></i>
                </div>

                <h1>Create New Story</h1>

                <p>Add a new story to your online book store.</p>

            </div>


            <!-- Form Card -->

            <div class="form-card">

                <!-- Back -->

                <a href="{{ route('stories.index') }}" class="back-btn">
                    <i class="bi bi-arrow-left"></i>
                    Back to Stories
                </a>


                <!-- Validation Errors -->

                @if ($errors->any())

                    <div class="error-box">

                        <div class="error-box-title">
                            <i class="bi bi-exclamation-circle"></i>
                            Please fix the following errors:
                        </div>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                @endif


                <!-- Create Story Form -->

                <form
                    action="{{ route('stories.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf


                    <!-- Story Title -->

                    <div class="form-group">

                        <label for="title">
                            Story Title
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="Enter story title"
                            required
                        >

                        @error('title')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- Author -->

                    <div class="form-group">

                        <label for="author">
                            Author
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="author"
                            name="author"
                            value="{{ old('author') }}"
                            placeholder="Enter author name"
                            required
                        >

                        @error('author')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- Category -->

                    <div class="form-group">

                        <label for="category_id">
                            Category
                            <span class="required">*</span>
                        </label>

                        <select
                            name="category_id"
                            id="category_id"
                            required
                        >

                            <option value="">
                                -- Select Category --
                            </option>

                            @foreach ($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('category_id')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- Language -->

                    <div class="form-group">

                        <label for="language">
                            Language
                            <span class="required">*</span>
                        </label>

                        <select
                            name="language"
                            id="language"
                            required
                        >

                            <option value="">
                                -- Select Language --
                            </option>

                            <option
                                value="Urdu"
                                {{ old('language') == 'Urdu' ? 'selected' : '' }}
                            >
                                Urdu
                            </option>

                            <option
                                value="English"
                                {{ old('language') == 'English' ? 'selected' : '' }}
                            >
                                English
                            </option>

                        </select>

                        @error('language')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- Cover Image -->

                    <div class="form-group">

                        <label for="cover_image">
                            Cover Image
                        </label>

                        <input
                            type="file"
                            id="cover_image"
                            name="cover_image"
                            accept="image/*"
                        >

                        <span class="help-text">
                            Upload an image for the story cover.
                        </span>

                        @error('cover_image')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- Description -->

                    <div class="form-group">

                        <label for="description">
                            Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            placeholder="Write a short description about the story..."
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- Form Buttons -->

                    <div class="form-actions">

                        <a
                            href="{{ route('stories.index') }}"
                            class="btn btn-secondary"
                        >
                            <i class="bi bi-x-circle"></i>
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            <i class="bi bi-check-circle"></i>
                            Create Story
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>
</html>