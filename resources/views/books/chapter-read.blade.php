
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $chapter->title }} - {{ $book->title }}</title>

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
            max-width: 850px;
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

        .chapter-box {
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .book-title {
            color: #777;
            font-size: 16px;
            margin-bottom: 8px;
        }

        h1 {
            font-size: 30px;
            margin-bottom: 25px;
            color: #222;
        }

        .page {
            border-top: 1px solid #ddd;
            padding: 25px 0;
        }

        .page-number {
            font-size: 14px;
            color: #888;
            margin-bottom: 15px;
        }

        .page-content {
            font-size: 18px;
            line-height: 1.9;
            white-space: pre-line;
        }

        .no-pages {
            color: #777;
            padding: 20px 0;
        }
    </style>

</head>

<body>

<div class="container">

    <a href="{{ route('books.read', $book->id) }}" class="back-btn">
        ← Back to Chapters
    </a>

    <div class="chapter-box">

        <div class="book-title">
            {{ $book->title }}
        </div>

        <h1>
            Chapter {{ $chapter->chapter_number }} — {{ $chapter->title }}
        </h1>

        @if($chapter->pages->count() > 0)

            @foreach($chapter->pages->sortBy('page_number') as $page)

                <div class="page">

                    <div class="page-number">
                        Page {{ $page->page_number }}
                    </div>

                    <div class="page-content">
                        {{ $page->content }}
                    </div>

                </div>

            @endforeach

        @else

            <p class="no-pages">
                No pages have been added to this chapter yet.
            </p>

        @endif

    </div>

</div>

</body>

</html>

