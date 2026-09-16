<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Story</title>

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
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
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

        button {
            width: 100%;
            margin-top: 25px;
            padding: 13px;
            border: none;
            border-radius: 6px;
            background: #222;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #444;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('stories.index') }}" class="back">
        ← Back to Stories
    </a>

    <h1>Create New Story</h1>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        {{-- Title --}}
        <label for="title">Story Title</label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title') }}"
            placeholder="Enter story title"
            required
        >

        {{-- Author --}}
        <label for="author">Author</label>

        <input
            type="text"
            id="author"
            name="author"
            value="{{ old('author') }}"
            placeholder="Enter author name"
            required
        >

        {{-- Category --}}
        <label for="category_id">Category</label>

        <select name="category_id" id="category_id" required>

            <option value="">-- Select Category --</option>

            @foreach ($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>

            @endforeach

        </select>

        {{-- Language --}}
        <label for="language">Language</label>

        <select name="language" id="language" required>

            <option value="">-- Select Language --</option>

            <option value="Urdu" {{ old('language') == 'Urdu' ? 'selected' : '' }}>
                Urdu
            </option>

            <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>
                English
            </option>

        </select>

        {{-- Cover Image --}}
        <label for="cover_image">Cover Image</label>

        <input
            type="file"
            id="cover_image"
            name="cover_image"
            accept="image/*"
        >

        {{-- Description --}}
        <label for="description">Description</label>

        <textarea
            id="description"
            name="description"
            placeholder="Write a short description..."
        >{{ old('description') }}</textarea>

        {{-- Submit --}}
        <button type="submit">
            Create Story
        </button>

    </form>

</div>

</body>
</html>