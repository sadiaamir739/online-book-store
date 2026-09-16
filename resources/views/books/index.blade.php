
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

        .header {
            background: #222;
            color: white;
            padding: 25px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 28px;
        }

        .header-buttons {
            display: flex;
            gap: 10px;
        }

        .add-btn,
        .category-btn,
        .home-btn {
            background: white;
            color: #222;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        .add-btn:hover,
        .category-btn:hover,
        .home-btn:hover {
            background: #ddd;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 25px;
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .book-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .book-card:hover {
            transform: translateY(-5px);
        }

        .book-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
        }

        .no-image {
            height: 280px;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
        }

        .book-content {
            padding: 20px;
        }

        .book-content h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .book-content p {
            margin: 8px 0;
            line-height: 1.5;
        }

        .price {
            font-size: 20px;
            font-weight: bold;
            margin-top: 12px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 18px;
            flex-wrap: wrap;
        }

        .read-btn,
        .edit-btn,
        .pages-btn,
        .add-page-btn {
            color: white;
            padding: 9px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }

        .read-btn {
            background: #2e7d32;
        }

        .read-btn:hover {
            background: #1b5e20;
        }

        .edit-btn {
            background: #222;
        }

        .pages-btn {
            background: #444;
        }

        .add-page-btn {
            background: #555;
        }

        .delete-btn {
            background: #c62828;
            color: white;
            border: none;
            padding: 9px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-btn:hover {
            background: #333;
        }

        .pages-btn:hover {
            background: #666;
        }

        .add-page-btn:hover {
            background: #777;
        }

        .delete-btn:hover {
            background: #a51f1f;
        }

        .empty {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 10px;
        }

        @media (max-width: 700px) {

            .header {
                flex-direction: column;
                gap: 20px;
                padding: 25px;
            }

            .header-buttons {
                flex-direction: column;
                width: 100%;
            }

            .add-btn,
            .category-btn,
            .home-btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->

    <header class="header">

        <h1>📚 Online Book Store</h1>

        <div class="header-buttons">

            <a href="{{ route('home') }}" class="home-btn">
                🏠 Home
            </a>

            <a href="{{ route('categories.index') }}" class="category-btn">
                📂 Categories
            </a>

            @auth
                @if(auth()->user()->is_admin)

                    <a
                        href="{{ route('books.create') }}"
                        class="add-btn"
                    >
                        + Add New Book
                    </a>

                @endif
            @endauth

        </div>

    </header>


    <!-- Main Content -->

    <main class="container">

        @if(session('success'))

            <div class="success">
                {{ session('success') }}
            </div>

        @endif


        @if($books->count() > 0)

            <div class="books-grid">

                @foreach($books as $book)

                    <div class="book-card">

                        <!-- Book Image -->

                        @if($book->cover_image)

                            <img
                                src="{{ asset('storage/' . $book->cover_image) }}"
                                alt="{{ $book->title }}"
                                class="book-image"
                            >

                        @else

                            <div class="no-image">
                                No Cover Image
                            </div>

                        @endif


                        <!-- Book Information -->

                        <div class="book-content">

                            <h2>
                                {{ $book->title }}
                            </h2>

                            <p>
                                <strong>Author:</strong>
                                {{ $book->author }}
                            </p>

                            <p>
                                <strong>Category:</strong>

                                {{ $book->category ? $book->category->name : 'No Category' }}

                            </p>

                            <p class="price">
                                Rs. {{ $book->price }}
                            </p>


                            @if($book->description)

                                <p>
                                    <strong>Description:</strong>
                                    {{ $book->description }}
                                </p>

                            @endif


                            <!-- READ BOOK -->

                            <div class="actions">

                                <a
                                    href="{{ route('books.read', $book->id) }}"
                                    class="read-btn"
                                >
                                    📖 Read
                                </a>

                            </div>


                            <!-- ADMIN ACTIONS -->

                            @auth

                                @if(auth()->user()->is_admin)

                                    <div class="actions">

                                        <!-- View Chapters -->

                                        <a
                                            href="{{ route('books.chapters', $book->id) }}"
                                            class="pages-btn"
                                        >
                                            📚 Chapters
                                        </a>


                                        <!-- Add Chapter -->

                                        <a
                                            href="{{ route('books.chapters.create', $book->id) }}"
                                            class="add-page-btn"
                                        >
                                            ➕ Add Chapter
                                        </a>


                                        <!-- View Pages -->

                                        <a
                                            href="{{ route('books.pages', $book->id) }}"
                                            class="pages-btn"
                                        >
                                            📖 Pages
                                        </a>


                                        <!-- Add Page -->

                                        <a
                                            href="{{ route('books.pages.create', $book->id) }}"
                                            class="add-page-btn"
                                        >
                                            ➕ Add Page
                                        </a>


                                        <!-- Edit Book -->

                                        <a
                                            href="{{ route('books.edit', $book->id) }}"
                                            class="edit-btn"
                                        >
                                            ✏️ Edit
                                        </a>


                                        <!-- Delete Book -->

                                        <form
                                            action="{{ route('books.destroy', $book->id) }}"
                                            method="POST"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="delete-btn"
                                                onclick="return confirm('Are you sure you want to delete this book?')"
                                            >
                                                🗑️ Delete
                                            </button>

                                        </form>

                                    </div>

                                @endif

                            @endauth

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">

                <h2>No Books Available</h2>

                <p>No books have been added yet.</p>

                @auth

                    @if(auth()->user()->is_admin)

                        <a
                            href="{{ route('books.create') }}"
                            class="edit-btn"
                            style="margin-top: 20px;"
                        >
                            + Add Book
                        </a>

                    @endif

                @endauth

            </div>

        @endif

    </main>

</body>

</html>

