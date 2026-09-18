<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Page | {{ $book->title }}</title>

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
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

        /* =========================
           HEADER
        ========================== */

        .header {
            background: #17243d;
            color: white;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            box-shadow: 0 3px 12px rgba(23, 36, 61, 0.18);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 24px;
            font-weight: bold;
        }

        .logo i {
            color: #d9a943;
            font-size: 25px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #304e78;
            color: white;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 7px;
            font-weight: bold;
            transition: 0.2s ease;
        }

        .back-btn:hover {
            background: #d9a943;
            color: #17243d;
        }

        /* =========================
           MAIN CONTAINER
        ========================== */

        .container {
            width: 90%;
            max-width: 850px;
            margin: 45px auto;
        }

        /* =========================
           PAGE HEADING
        ========================== */

        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h1 {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 32px;
            margin-bottom: 8px;
            color: #17243d;
        }

        .page-heading h1 i {
            color: #d9a943;
        }

        .page-heading p {
            color: #667085;
            font-size: 15px;
        }

        /* =========================
           BOOK INFO
        ========================== */

        .book-info {
            background: white;
            border-radius: 10px;
            padding: 20px 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(23, 36, 61, 0.08);
            border-left: 5px solid #d9a943;
        }

        .book-info span {
            color: #667085;
            font-size: 14px;
        }

        .book-info strong {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 20px;
            margin-top: 7px;
            color: #17243d;
        }

        .book-info strong i {
            color: #d9a943;
        }

        /* =========================
           FORM CARD
        ========================== */

        .form-card {
            background: white;
            border-radius: 12px;
            padding: 35px;
            box-shadow: 0 5px 20px rgba(23, 36, 61, 0.08);
            border: 1px solid #e5e9f0;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 9px;
            color: #17243d;
        }

        .required {
            color: #c62828;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #ccd3df;
            border-radius: 7px;
            font-size: 15px;
            outline: none;
            font-family: Arial, Helvetica, sans-serif;
            color: #17243d;
            background: white;
            transition: 0.2s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #304e78;
            box-shadow: 0 0 0 3px rgba(48, 78, 120, 0.12);
        }

        input::placeholder,
        textarea::placeholder {
            color: #9aa3b2;
        }

        textarea {
            min-height: 350px;
            resize: vertical;
            line-height: 1.7;
        }

        select {
            cursor: pointer;
        }

        .help-text {
            color: #7b8494;
            font-size: 13px;
            margin-top: 7px;
        }

        /* =========================
           ERRORS
        ========================== */

        .errors {
            background: #fff5f5;
            border: 1px solid #efb5b5;
            color: #a51f1f;
            padding: 15px 18px;
            border-radius: 7px;
            margin-bottom: 25px;
        }

        .errors strong {
            display: flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 8px;
        }

        .errors ul {
            padding-left: 20px;
        }

        .errors li {
            margin-bottom: 4px;
        }

        /* =========================
           FORM ACTIONS
        ========================== */

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            padding-top: 20px;
            border-top: 1px solid #e7eaf0;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 22px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .cancel-btn {
            background: #eef1f5;
            color: #17243d;
            border: 1px solid #dce1e8;
        }

        .cancel-btn:hover {
            background: #dfe4eb;
        }

        .save-btn {
            background: #304e78;
            color: white;
        }

        .save-btn:hover {
            background: #17243d;
        }

        .save-btn i {
            color: #d9a943;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 700px) {

            .header {
                padding: 18px 20px;
                flex-direction: column;
                align-items: stretch;
            }

            .logo {
                font-size: 20px;
            }

            .back-btn {
                justify-content: center;
            }

            .container {
                width: 92%;
                margin: 30px auto;
            }

            .page-heading h1 {
                font-size: 27px;
            }

            .form-card {
                padding: 25px 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<header class="header">

    <div class="logo">
        <i class="bi bi-book-half"></i>
        <span>Online Book Store</span>
    </div>

    <a
        href="{{ route('books.chapters', $book->id) }}"
        class="back-btn"
    >
        <i class="bi bi-arrow-left"></i>
        Back to Chapters
    </a>

</header>


<main class="container">

    <!-- PAGE HEADING -->

    <div class="page-heading">

        <h1>
            <i class="bi bi-file-earmark-plus"></i>
            Add New Page
        </h1>

        <p>
            Add a new page to a chapter of your book.
        </p>

    </div>


    <!-- BOOK INFORMATION -->

    <div class="book-info">

        <span>Adding page to:</span>

        <strong>
            <i class="bi bi-book"></i>
            {{ $book->title }}
        </strong>

    </div>


    <!-- FORM CARD -->

    <div class="form-card">

        @if ($errors->any())

            <div class="errors">

                <strong>
                    <i class="bi bi-exclamation-triangle"></i>
                    Please fix the following errors:
                </strong>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('books.pages.store', $book->id) }}"
            method="POST"
        >

            @csrf


            <!-- CHAPTER -->

            <div class="form-group">

                <label for="chapter_id">
                    Select Chapter
                    <span class="required">*</span>
                </label>

                <select
                    name="chapter_id"
                    id="chapter_id"
                    required
                >

                    <option value="">
                        -- Select Chapter --
                    </option>

                    @forelse($book->chapters as $chapter)

                        <option
                            value="{{ $chapter->id }}"
                            {{ old('chapter_id') == $chapter->id ? 'selected' : '' }}
                        >
                            Chapter {{ $chapter->chapter_number }}
                            - {{ $chapter->title }}
                        </option>

                    @empty

                        <option value="" disabled>
                            No chapters available
                        </option>

                    @endforelse

                </select>

                <p class="help-text">
                    Select the chapter where this page should be added.
                </p>

            </div>


            <!-- PAGE TITLE -->

            <div class="form-group">

                <label for="title">
                    Page Title
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="e.g. The Journey Begins"
                >

                <p class="help-text">
                    Page title is optional.
                </p>

            </div>


            <!-- PAGE CONTENT -->

            <div class="form-group">

                <label for="content">
                    Page Content
                    <span class="required">*</span>
                </label>

                <textarea
                    id="content"
                    name="content"
                    placeholder="Write your story or book content here..."
                    required
                >{{ old('content') }}</textarea>

                <p class="help-text">
                    Write the content of this page.
                </p>

            </div>


            <!-- BUTTONS -->

            <div class="form-actions">

                <a
                    href="{{ route('books.chapters', $book->id) }}"
                    class="btn cancel-btn"
                >
                    <i class="bi bi-x-circle"></i>
                    Cancel
                </a>

                <button
                    type="submit"
                    class="btn save-btn"
                >
                    <i class="bi bi-check-circle"></i>
                    Save Page
                </button>

            </div>

        </form>

    </div>

</main>

</body>

</html>