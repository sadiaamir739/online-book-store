<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $story->title }} - Pages</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .header {
            background: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        h1 {
            margin: 0 0 10px;
        }

        .info {
            color: #666;
            line-height: 1.7;
        }

        .actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .add-btn {
            background: #2563eb;
            color: white;
        }

        .back-btn {
            background: #6b7280;
            color: white;
        }

        .page-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .page-number {
            color: #2563eb;
            font-weight: bold;
            font-size: 14px;
        }

        .page-title {
            margin: 8px 0 15px;
            font-size: 22px;
        }

        .content {
            line-height: 1.8;
            color: #333;
            white-space: pre-line;
        }

        .page-actions {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
            display: flex;
            gap: 10px;
        }

        .edit-btn {
            background: #f59e0b;
            color: white;
        }

        .delete-btn {
            background: #dc2626;
            color: white;
        }

        .empty {
            background: white;
            padding: 40px;
            text-align: center;
            border-radius: 15px;
            color: #666;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- Story Header -->
    <div class="header">

        <h1>📖 {{ $story->title }}</h1>

        <div class="info">
            <strong>Author:</strong> {{ $story->author }}
            <br>
            <strong>Language:</strong> {{ $story->language }}
            <br>
            <strong>Total Pages:</strong> {{ $story->pages->count() }}
        </div>

        <div class="actions">

            <a
                href="{{ route('stories.pages.create', $story->id) }}"
                class="btn add-btn"
            >
                + Add New Page
            </a>

            <a
                href="{{ route('stories.index') }}"
                class="btn back-btn"
            >
                ← Back to Stories
            </a>

        </div>

    </div>


    <!-- Success Message -->
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif


    <!-- Story Pages -->
    @forelse($story->pages as $page)

        <div class="page-card">

            <div class="page-number">
                PAGE {{ $page->page_number }}
            </div>

            @if($page->title)
                <h2 class="page-title">
                    {{ $page->title }}
                </h2>
            @endif

            <div class="content">
                {{ $page->content }}
            </div>


            <!-- Edit / Delete Buttons -->
            <div class="page-actions">

                <a
                    href="{{ route('stories.pages.edit', [$story->id, $page->id]) }}"
                    class="btn edit-btn"
                >
                    ✏️ Edit
                </a>


                <form
                    action="{{ route('stories.pages.delete', [$story->id, $page->id]) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this page?');"
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

            </div>

        </div>

    @empty

        <div class="empty">

            <h2>📄 No Pages Yet</h2>

            <p>
                This story does not have any pages yet.
            </p>

            <a
                href="{{ route('stories.pages.create', $story->id) }}"
                class="btn add-btn"
            >
                + Add First Page
            </a>

        </div>

    @endforelse

</div>

</body>
</html>