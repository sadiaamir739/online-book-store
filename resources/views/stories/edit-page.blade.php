<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Page - {{ $story->title }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        h1 {
            margin-bottom: 5px;
        }

        .story-info {
            color: #666;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 20px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        textarea {
            min-height: 400px;
            resize: vertical;
            line-height: 1.6;
        }

        .buttons {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        button,
        .back-btn {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-size: 15px;
        }

        button {
            background: #2563eb;
            color: white;
        }

        .back-btn {
            background: #6b7280;
            color: white;
        }

        .errors {
            background: #fee2e2;
            color: #b91c1c;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .errors ul {
            margin: 0;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>✏️ Edit Page</h1>

    <div class="story-info">
        Story: <strong>{{ $story->title }}</strong>
        <br>
        Page {{ $page->page_number }}
    </div>

    @if ($errors->any())
        <div class="errors">
            <strong>Please fix these errors:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stories.pages.update', [$story->id, $page->id]) }}" method="POST">

        @csrf
        @method('PUT')

        <label for="title">Page Title</label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title', $page->title) }}"
            placeholder="Example: Chapter 1"
        >

        <label for="content">Story Content</label>

        <textarea
            id="content"
            name="content"
            placeholder="Write your story here..."
        >{{ old('content', $page->content) }}</textarea>

        <div class="buttons">

            <button type="submit">
                💾 Update Page
            </button>

            <a
                href="{{ route('stories.pages', $story->id) }}"
                class="back-btn"
            >
                ← Back to Pages
            </a>

        </div>

    </form>

</div>

</body>
</html>