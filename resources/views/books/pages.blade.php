<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $book->title }} - Pages</title>

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

        .header {
            background: #222;
            color: white;
            padding: 25px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 26px;
        }

        .buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            background: white;
            color: #222;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 25px;
        }

        .page-card {
            background: white;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,.08);
        }

        .page-card h2 {
            margin-bottom: 12px;
        }

        .content {
            line-height: 1.8;
            white-space: pre-line;
            color: #555;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .edit {
            background: #222;
            color: white;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 5px;
        }

        .delete {
            background: #c62828;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        .empty {
            background: white;
            text-align: center;
            padding: 50px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<header class="header">

    <h1>📖 {{ $book->title }}</h1>

    <div class="buttons">
        <a href="{{ route('books.index') }}" class="btn">
            ← Books
        </a>

        <a href="{{ route('books.pages.create', $book->id) }}" class="btn">
            + Add Page
        </a>
    </div>

</header>


<main class="container">

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif


    @if($book->pages->count() > 0)

        @foreach($book->pages as $page)

            <div class="page-card">

                <h2>
                    Page {{ $page->page_number }}

                    @if($page->title)
                        — {{ $page->title }}
                    @endif
                </h2>

                <div class="content">
                    {{ $page->content }}
                </div>


                <div class="actions">

                    <a
                        href="{{ route('books.pages.edit', [$book->id, $page->id]) }}"
                        class="edit"
                    >
                        ✏️ Edit
                    </a>

                    <form
                        action="{{ route('books.pages.destroy', [$book->id, $page->id]) }}"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="delete"
                            onclick="return confirm('Are you sure you want to delete this page?')"
                        >
                            🗑️ Delete
                        </button>
                    </form>

                </div>

            </div>

        @endforeach

    @else

        <div class="empty">

            <h2>No Pages Yet</h2>

            <p>Start writing this book by adding the first page.</p>

            <a
                href="{{ route('books.pages.create', $book->id) }}"
                class="edit"
                style="display:inline-block; margin-top:20px;"
            >
                + Add First Page
            </a>

        </div>

    @endif

</main>

</body>
</html>