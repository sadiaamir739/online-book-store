<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $story->title }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .back {
            text-decoration: none;
            color: #333;
        }

        h1 {
            margin-top: 25px;
            font-size: 32px;
        }

        .info {
            color: #666;
            margin: 10px 0;
        }

        .cover {
            width: 250px;
            max-width: 100%;
            border-radius: 8px;
            margin: 20px 0;
        }

        .description {
            line-height: 1.7;
            margin-top: 20px;
        }

        .buttons {
            margin-top: 30px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            background: #222;
        }

        .btn:hover {
            background: #444;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('stories.index') }}" class="back">
        ← Back to Stories
    </a>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <h1>{{ $story->title }}</h1>

    <div class="info">
        <strong>Author:</strong> {{ $story->author }}
    </div>

    <div class="info">
        <strong>Language:</strong> {{ $story->language }}
    </div>

    @if($story->category)
        <div class="info">
            <strong>Category:</strong> {{ $story->category->name }}
        </div>
    @endif

    @if($story->cover_image)
        <img
            src="{{ asset('storage/' . $story->cover_image) }}"
            alt="{{ $story->title }}"
            class="cover"
        >
    @endif

    @if($story->description)
        <div class="description">
            <h2>About this Story</h2>

            <p>
                {{ $story->description }}
            </p>
        </div>
    @endif

    <div class="buttons">

        <a
            href="{{ route('stories.pages', $story->id) }}"
            class="btn"
        >
            📖 Read / Manage Pages
        </a>

        <a
            href="{{ route('stories.pages.create', $story->id) }}"
            class="btn"
        >
            ➕ Add Page
        </a>

        <a
            href="{{ route('stories.edit', $story->id) }}"
            class="btn"
        >
            ✏️ Edit Story
        </a>

    </div>

</div>

</body>
</html>