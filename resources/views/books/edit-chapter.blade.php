<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Chapter | {{ $book->title }}</title>

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

        /* ================================
           HEADER
        ================================= */

        .header {
            background: #17243d;
            color: white;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            font-size: 27px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #304e78;
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s ease;
        }

        .back-btn:hover {
            background: #d9a943;
            color: #17243d;
        }

        /* ================================
           MAIN CONTAINER
        ================================= */

        .container {
            width: 90%;
            max-width: 850px;
            margin: 45px auto;
        }

        /* ================================
           PAGE HEADING
        ================================= */

        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h1 {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 32px;
            color: #17243d;
            margin-bottom: 8px;
        }

        .page-heading h1 i {
            color: #d9a943;
        }

        .page-heading p {
            color: #667085;
            font-size: 15px;
            line-height: 1.6;
        }

        /* ================================
           BOOK INFO
        ================================= */

        .book-info {
            background: white;
            border-radius: 12px;
            padding: 22px 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 16px rgba(23, 36, 61, 0.08);
            border-left: 5px solid #d9a943;
        }

        .book-info span {
            color: #667085;
            font-size: 14px;
        }

        .book-title {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 20px;
            margin-top: 6px;
            color: #17243d;
        }

        .book-title i {
            color: #304e78;
        }

        .chapter-number {
            margin-top: 10px;
            color: #304e78;
            font-size: 14px;
            font-weight: 600;
        }

        /* ================================
           FORM CARD
        ================================= */

        .form-card {
            background: white;
            border-radius: 12px;
            padding: 35px;
            box-shadow: 0 4px 18px rgba(23, 36, 61, 0.08);
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

        input {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #d5dbe5;
            border-radius: 7px;
            font-size: 15px;
            color: #17243d;
            background: #fff;
            outline: none;
            transition: 0.2s ease;
        }

        input:focus {
            border-color: #304e78;
            box-shadow: 0 0 0 3px rgba(48, 78, 120, 0.12);
        }

        input::placeholder {
            color: #98a2b3;
        }

        .help-text {
            color: #667085;
            font-size: 13px;
            margin-top: 7px;
            line-height: 1.5;
        }

        /* ================================
           VALIDATION ERRORS
        ================================= */

        .errors {
            background: #fff4f4;
            border: 1px solid #efb4b4;
            color: #a51f1f;
            padding: 15px 18px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .errors strong {
            display: flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 7px;
        }

        .errors ul {
            padding-left: 20px;
        }

        .errors li {
            margin-bottom: 4px;
        }

        /* ================================
           FORM ACTIONS
        ================================= */

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
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
            background: #e9edf3;
            color: #17243d;
        }

        .cancel-btn:hover {
            background: #dce2ea;
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

        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 700px) {

            .header {
                padding: 18px 20px;
                gap: 15px;
            }

            .logo {
                font-size: 19px;
            }

            .logo i {
                font-size: 22px;
            }

            .back-btn {
                padding: 9px 12px;
                font-size: 13px;
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
            <i class="bi bi-pencil-square"></i>
            Edit Chapter
        </h1>

        <p>
            Update the chapter number or title and save your changes.
        </p>

    </div>


    <!-- BOOK INFORMATION -->
    <div class="book-info">

        <span>Book:</span>

        <strong class="book-title">
            <i class="bi bi-book"></i>
            {{ $book->title }}
        </strong>

        <div class="chapter-number">
            Chapter {{ $chapter->chapter_number }}
        </div>

    </div>


    <!-- FORM -->
    <div class="form-card">

        @if ($errors->any())

            <div class="errors">

                <strong>
                    <i class="bi bi-exclamation-circle"></i>
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
            action="{{ route('books.chapters.update', [$book->id, $chapter->id]) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <!-- CHAPTER NUMBER -->
            <div class="form-group">

                <label for="chapter_number">
                    Chapter Number
                    <span class="required">*</span>
                </label>

                <input
                    type="number"
                    id="chapter_number"
                    name="chapter_number"
                    value="{{ old('chapter_number', $chapter->chapter_number) }}"
                    min="1"
                    placeholder="Enter chapter number"
                    required
                >

                <p class="help-text">
                    Enter the number for this chapter.
                </p>

            </div>


            <!-- CHAPTER TITLE -->
            <div class="form-group">

                <label for="title">
                    Chapter Title
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $chapter->title) }}"
                    placeholder="Enter chapter title"
                    required
                    autofocus
                >

                <p class="help-text">
                    Enter the title that will be displayed to readers.
                </p>

            </div>


            <!-- ACTION BUTTONS -->
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
                    Update Chapter
                </button>

            </div>

        </form>

    </div>

</main>

</body>

</html>