<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Write Story Page</title>

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
            padding: 25px;
            text-align: center;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 40px auto;
        }

        .story-info {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .story-info h2 {
            margin-bottom: 8px;
        }

        .writing-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        textarea {
            min-height: 400px;
            resize: vertical;
            line-height: 1.7;
        }

        .submit-btn {
            margin-top: 20px;
            background: #222;
            color: white;
            border: none;
            padding: 13px 22px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
        }

        .submit-btn:hover {
            background: #444;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            color: #222;
            text-decoration: none;
        }

        .errors {
            background: #ffe5e5;
            color: #c62828;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="header">
    <h1>✍️ Write Your Story</h1>
</div>

<div class="container">

    <div class="story-info">
        <h2>{{ $story->title }}</h2>
        <p>
            <strong>Author:</strong> {{ $story->author }}
        </p>
        <p>
            <strong>Language:</strong> {{ $story->language }}
        </p>
    </div>

    <div class="writing-box">

        @if($errors->any())
            <div class="errors">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('stories.pages.store', $story->id) }}"
              method="POST">

            @csrf

            <label>Page Title:</label>

            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                placeholder="Example: Chapter 1"
            >

            <br><br>

            <label>Write Your Story:</label>

            <textarea
                name="content"
                placeholder="Start writing your story here..."
            >{{ old('content') }}</textarea>

            <button type="submit" class="submit-btn">
                💾 Save Page
            </button>

        </form>

        <a href="{{ route('stories.pages', $story->id) }}"
           class="back-btn">
            ← Back to Story Pages
        </a>

    </div>

</div>

</body>
</html>