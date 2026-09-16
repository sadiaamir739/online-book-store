<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Categories</title>

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

        .btn {
            background: white;
            color: #222;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        .btn:hover {
            background: #ddd;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 25px;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .category-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .category-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .category-card h2 {
            margin-bottom: 10px;
        }

        .category-card p {
            color: #666;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .edit-btn {
            background: #222;
            color: white;
            padding: 9px 15px;
            text-decoration: none;
            border-radius: 5px;
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
            background: #444;
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

        .back-btn {
            display: inline-block;
            margin-top: 25px;
            background: #222;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
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

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<header class="header">

    <h1>📚 Book Categories</h1>

    <div class="header-buttons">

        <a href="{{ route('home') }}" class="btn">
            🏠 Home
        </a>

        <a href="{{ route('books.index') }}" class="btn">
            📖 Books
        </a>

        {{-- Admin Only --}}
        @auth
            @if(auth()->user()->is_admin)
                <a href="{{ route('categories.create') }}" class="btn">
                    + Add Category
                </a>
            @endif
        @endauth

    </div>

</header>


<main class="container">

    @if(session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    @if($categories->count() > 0)

        <div class="categories-grid">

            @foreach($categories as $category)

                <div class="category-card">

                    <div class="category-icon">
                        📖
                    </div>

                    <h2>
                        {{ $category->name }}
                    </h2>

                    @if($category->description)

                        <p>
                            {{ $category->description }}
                        </p>

                    @else

                        <p>
                            No description available.
                        </p>

                    @endif


                    {{-- Admin Only --}}
                    @auth
                        @if(auth()->user()->is_admin)

                            <div class="actions">

                                <a
                                    href="{{ route('categories.edit', $category->id) }}"
                                    class="edit-btn"
                                >
                                    ✏️ Edit
                                </a>

                                <form
                                    action="{{ route('categories.destroy', $category->id) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete-btn"
                                        onclick="return confirm('Are you sure you want to delete this category?')"
                                    >
                                        🗑️ Delete
                                    </button>

                                </form>

                            </div>

                        @endif
                    @endauth

                </div>

            @endforeach

        </div>

    @else

        <div class="empty">

            <h2>No Categories Found</h2>

            <p>No book categories have been added yet.</p>

            {{-- Admin Only --}}
            @auth
                @if(auth()->user()->is_admin)

                    <a
                        href="{{ route('categories.create') }}"
                        class="back-btn"
                    >
                        + Add Category
                    </a>

                @endif
            @endauth

        </div>

    @endif


    <a
        href="{{ route('books.index') }}"
        class="back-btn"
    >
        ← Back to Books
    </a>

</main>

</body>
</html>