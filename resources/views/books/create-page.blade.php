<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Page | {{ $book->title }}</title>

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

        input,
        select,
        textarea {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #d0d0d0;
            border-radius: 7px;
            font-size: 15px;
            outline: none;
            font-family: Arial, Helvetica, sans-serif;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #222;
            box-shadow: 0 0 0 2px rgba(34, 34, 34, 0.08);
        }

        textarea {
            min-height: 350px;
            resize: vertical;
            line-height: 1.7;
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
            padding-top: 15px;
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

        .save-btn:hover {
            background: #444;
        }

        @media (max-width: 700px) {

            .header {
                padding: 20px;
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

    <a
        href="{{ route('books.chapters', $book->id) }}"
        class="back-btn"
    >
        ← Back to Chapters
    </a>

</header>


<main class="container">

    <div class="page-heading">

        <h1>➕ Add New Page</h1>

        <p>
            Add a new page to a chapter of your book.
        </p>

    </div>


    <div class="book-info">

        <span>Adding page to:</span>

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


            {{-- Chapter --}}

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


            {{-- Page Title --}}

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


            {{-- Content --}}

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


            {{-- Buttons --}}

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
                    💾 Save Page
                </button>

            </div>

        </form>

    </div>

</main>

</body>

</html>