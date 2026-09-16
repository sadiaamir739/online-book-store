
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Chapter | {{ $book->title }}</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            color: #222;
            min-height: 100vh;
        }

        .header {
            background: #222;
            color: white;
            padding: 22px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
        }

        .back-btn {
            background: white;
            color: #222;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 850px;
            margin: 45px auto;
        }

        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h1 {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .page-heading p {
            color: #777;
            font-size: 15px;
        }

        .book-info {
            background: white;
            border-radius: 10px;
            padding: 20px 25px;
            margin-bottom: 25px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
            border-left: 5px solid #222;
        }

        .book-info span {
            color: #777;
            font-size: 14px;
        }

        .book-info strong {
            display: block;
            font-size: 20px;
            margin-top: 5px;
        }

        .form-card {
            background: white;
            border-radius: 12px;
            padding: 35px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 9px;
        }

        .required {
            color: #c62828;
        }

        input {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #d0d0d0;
            border-radius: 7px;
            font-size: 15px;
            outline: none;
        }

        input:focus {
            border-color: #222;
            box-shadow: 0 0 0 2px rgba(34, 34, 34, 0.08);
        }

        .help-text {
            color: #888;
            font-size: 13px;
            margin-top: 7px;
        }

        .errors {
            background: #fff0f0;
            border: 1px solid #f0b5b5;
            color: #a51f1f;
            padding: 15px 18px;
            border-radius: 7px;
            margin-bottom: 25px;
        }

        .errors strong {
            display: block;
            margin-bottom: 7px;
        }

        .errors ul {
            padding-left: 20px;
        }

        .errors li {
            margin-bottom: 4px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            padding-top: 10px;
            border-top: 1px solid #eee;
        }

        .btn {
            padding: 12px 22px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .cancel-btn {
            background: #eee;
            color: #333;
        }

        .save-btn {
            background: #222;
            color: white;
        }

        @media (max-width: 700px) {

            .header {
                padding: 20px;
                gap: 15px;
            }

            .logo {
                font-size: 20px;
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
                text-align: center;
            }
        }
    </style>
</head>

<body>

<header class="header">

    <div class="logo">
        📚 Online Book Store
    </div>

    <a href="{{ route('books.chapters', $book->id) }}" class="back-btn">
        ← Back to Chapters
    </a>

</header>

<main class="container">

    <div class="page-heading">

        <h1>➕ Add New Chapter</h1>

        <p>
            Create a new chapter for your book.
        </p>

    </div>

    <div class="book-info">

        <span>Adding chapter to:</span>

        <strong>
            📖 {{ $book->title }}
        </strong>

    </div>

    <div class="form-card">

        @if ($errors->any())

            <div class="errors">

                <strong>
                    Please fix the following errors:
                </strong>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form
            action="{{ route('books.chapters.store', $book->id) }}"
            method="POST"
        >

            @csrf

            <!-- Chapter Number -->

            <div class="form-group">

                <label for="chapter_number">
                    Chapter Number
                    <span class="required">*</span>
                </label>

                <input
                    type="number"
                    id="chapter_number"
                    name="chapter_number"
                    value="{{ old('chapter_number') }}"
                    min="1"
                    placeholder="e.g. 1"
                    required
                >

                <p class="help-text">
                    Enter the chapter number, for example 1, 2, 3...
                </p>

            </div>


            <!-- Chapter Title -->

            <div class="form-group">

                <label for="title">
                    Chapter Title
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="e.g. The Beginning of the Journey"
                    required
                >

                <p class="help-text">
                    Enter a meaningful title for this chapter.
                </p>

            </div>


            <div class="form-actions">

                <a
                    href="{{ route('books.chapters', $book->id) }}"
                    class="btn cancel-btn"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="btn save-btn"
                >
                    💾 Create Chapter
                </button>

            </div>

        </form>

    </div>

</main>

</body>

</html>


