<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $book->title }} - Read Book</title>

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

        .container {
            width: 90%;
            max-width: 900px;
            margin: 40px auto;
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-btn:hover {
            background: #111;
        }

        .book-info {
            background: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .cover {
            width: 180px;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .book-info h1 {
            font-size: 32px;
            color: #222;
            margin-bottom: 10px;
        }

        .author {
            color: #777;
            font-size: 17px;
            margin-bottom: 15px;
        }

        .description {
            line-height: 1.7;
            color: #555;
        }

        .chapters {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .chapters h2 {
            margin-bottom: 20px;
            color: #222;
        }

        .chapter {
            display: block;
            text-decoration: none;
            color: #333;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 12px;
            border-radius: 7px;
        }

        .chapter:hover {
            background: #f5f5f5;
        }

        .chapter-number {
            color: #777;
            margin-bottom: 5px;
        }

        .chapter-title {
            font-size: 18px;
            font-weight: bold;
        }

        .no-chapters {
            color: #777;
            padding: 20px 0;
        }
    </style>

</head>

<body>

<div class="container">

    <a href="{{ route('books.index') }}" class="back-btn">
        ← Back to Books
    </a>

    <div class="book-info">

        @if($book->cover_image)
            <img
                src="{{ asset('storage/' . $book->cover_image) }}"
                alt="{{ $book->title }}"
                class="cover"
            >
        @endif

        <h1>
            {{ $book->title }}
        </h1>

        <p class="author">
            By {{ $book->author }}
        </p>

        @if($book->description)
            <div class="description">
                {{ $book->description }}
            </div>
        @endif

    </div>

    <div class="chapters">

        <h2>📖 Chapters</h2>

        @if($book->chapters->count() > 0)

            @foreach($book->chapters as $chapter)

                <a
                    href="{{ route('books.chapters.read', [$book->id, $chapter->id]) }}"
                    class="chapter"
                >

                    <div class="chapter-number">
                        Chapter {{ $chapter->chapter_number }}
                    </div>

                    <div class="chapter-title">
                        {{ $chapter->title }}
                    </div>

                </a>

            @endforeach

        @else

            <p class="no-chapters">
                No chapters have been added yet.
            </p>

        @endif

    </div>

</div>

</body>

</html>