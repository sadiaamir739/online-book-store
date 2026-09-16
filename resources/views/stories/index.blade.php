<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Stories - Online Book Store</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
            color: #222;
        }

        .container {
            max-width: 1150px;
            margin: auto;
        }

        .header {
            background: white;
            padding: 28px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .header h1 {
            margin: 0 0 10px;
            font-size: 32px;
        }

        .header p {
            color: #666;
            margin: 0;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 22px;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .add-btn {
            background: #2563eb;
            color: white;
        }

        .back-btn {
            background: #6b7280;
            color: white;
        }

        .btn:hover {
            opacity: 0.85;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .stories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 22px;
        }

        .story-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: 0.2s;
        }

        .story-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }

        .cover {
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: #e5e7eb;
        }

        .no-cover {
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e5e7eb;
            color: #777;
            font-size: 18px;
        }

        .story-content {
            padding: 20px;
        }

        .story-title {
            margin: 0 0 12px;
            font-size: 22px;
        }

        .story-info {
            color: #666;
            line-height: 1.7;
            font-size: 14px;
        }

        .description {
            margin-top: 12px;
            color: #444;
            line-height: 1.6;
        }

        .story-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-top: 18px;
        }

        .read-btn {
            background: #16a34a;
            color: white;
        }

        .edit-btn {
            background: #f59e0b;
            color: white;
        }

        .delete-btn {
            background: #dc2626;
            color: white;
        }

        .delete-form {
            margin: 0;
        }

        .empty {
            background: white;
            padding: 50px 30px;
            text-align: center;
            border-radius: 15px;
            color: #666;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .empty h2 {
            color: #222;
        }

        @media (max-width: 700px) {

            body {
                padding: 15px;
            }

            .header h1 {
                font-size: 26px;
            }

            .stories-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- Header -->
    <div class="header">

        <h1>📖 Stories</h1>

        <p>
            Read, create and manage stories in our online book store.
        </p>

        <div class="actions">

            @auth
                <a href="{{ route('stories.create') }}" class="btn add-btn">
                    ✍️ Write a Story
                </a>
            @endauth

            <a href="{{ route('books.index') }}" class="btn back-btn">
                📚 Books
            </a>

            <a href="{{ route('categories.index') }}" class="btn back-btn">
                📂 Categories
            </a>

            <a href="{{ url('/') }}" class="btn back-btn">
                🏠 Home
            </a>

        </div>

    </div>


    <!-- Success Message -->
    @if(session('success'))
        <div class="success">
            ✅ {{ session('success') }}
        </div>
    @endif


    <!-- Stories -->
    @if($stories->count() > 0)

        <div class="stories-grid">

            @foreach($stories as $story)

                <div class="story-card">

                    <!-- Cover -->
                    @if($story->cover_image)

                        <img
                            src="{{ asset('storage/' . $story->cover_image) }}"
                            alt="{{ $story->title }}"
                            class="cover"
                        >

                    @else

                        <div class="no-cover">
                            📖 No Cover Image
                        </div>

                    @endif


                    <!-- Content -->
                    <div class="story-content">

                        <h2 class="story-title">
                            {{ $story->title }}
                        </h2>

                        <div class="story-info">

                            <strong>Author:</strong>
                            {{ $story->author }}

                            <br>

                            <strong>Language:</strong>
                            {{ $story->language }}

                            <br>

                            <strong>Category:</strong>
                            {{ $story->category->name ?? 'No Category' }}

                        </div>


                        @if($story->description)

                            <div class="description">
                                {{ $story->description }}
                            </div>

                        @endif


                        <!-- Actions -->
                        <div class="story-actions">

                            <!-- Everyone can read -->
                            <a
                                href="{{ route('stories.pages', $story->id) }}"
                                class="btn read-btn"
                            >
                                📖 Read
                            </a>


                            @auth

                                @if(auth()->user()->is_admin || $story->user_id === auth()->id())

                                    <!-- Owner/Admin can edit -->
                                    <a
                                        href="{{ route('stories.edit', $story->id) }}"
                                        class="btn edit-btn"
                                    >
                                        ✏️ Edit
                                    </a>


                                    <!-- Owner/Admin can delete -->
                                    <form
                                        action="{{ route('stories.destroy', $story->id) }}"
                                        method="POST"
                                        class="delete-form"
                                        onsubmit="return confirm('Are you sure you want to delete this story?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn delete-btn"
                                        >
                                            🗑️ Delete
                                        </button>

                                    </form>

                                @endif

                            @endauth

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty">

            <h2>📚 No Stories Yet</h2>

            <p>
                There are no stories available yet.
            </p>

            @auth
                <a
                    href="{{ route('stories.create') }}"
                    class="btn add-btn"
                >
                    ✍️ Write First Story
                </a>
            @endauth

        </div>

    @endif

</div>

</body>
</html>