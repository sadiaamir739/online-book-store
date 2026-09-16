<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Story</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        h1 {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 7px;
            box-sizing: border-box;
            font-size: 15px;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .success {
            background: #e8f7e8;
            color: green;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        button,
        .back {
            padding: 12px 20px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
            font-size: 15px;
        }

        button {
            background: #111;
            color: white;
        }

        .back {
            background: #ddd;
            color: #111;
        }

        .current-image {
            margin-top: 10px;
            max-width: 150px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>✏️ Edit Story</h1>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('stories.update', $story->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <!-- Title -->
        <label>Story Title</label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $story->title) }}"
            required
        >

        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror


        <!-- Author -->
        <label>Author</label>

        <input
            type="text"
            name="author"
            value="{{ old('author', $story->author) }}"
            required
        >

        @error('author')
            <div class="error">{{ $message }}</div>
        @enderror


        <!-- Category -->
        <label>Category</label>

        <select name="category_id" required>

            <option value="">Select Category</option>

            @foreach ($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ old('category_id', $story->category_id) == $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>

            @endforeach

        </select>

        @error('category_id')
            <div class="error">{{ $message }}</div>
        @enderror


        <!-- Language -->
        <label>Language</label>

        <select name="language" required>

            <option value="Urdu"
                {{ old('language', $story->language) == 'Urdu' ? 'selected' : '' }}>
                Urdu
            </option>

            <option value="English"
                {{ old('language', $story->language) == 'English' ? 'selected' : '' }}>
                English
            </option>

        </select>

        @error('language')
            <div class="error">{{ $message }}</div>
        @enderror


        <!-- Description -->
        <label>Description</label>

        <textarea name="description">{{ old('description', $story->description) }}</textarea>

        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror


        <!-- Current Image -->
        @if ($story->cover_image)

            <label>Current Cover Image</label>

            <img
                src="{{ asset('storage/' . $story->cover_image) }}"
                class="current-image"
                alt="Story Cover"
            >

        @endif


        <!-- New Image -->
        <label>Change Cover Image</label>

        <input
            type="file"
            name="cover_image"
            accept="image/*"
        >

        @error('cover_image')
            <div class="error">{{ $message }}</div>
        @enderror


        <!-- Buttons -->
        <div class="buttons">

            <button type="submit">
                💾 Update Story
            </button>

            <a href="{{ route('stories.index') }}" class="back">
                ← Back
            </a>

        </div>

    </form>

</div>

</body>
</html>