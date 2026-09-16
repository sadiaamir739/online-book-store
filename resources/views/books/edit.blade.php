
<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>

    <h1>Edit Book</h1>

    <!-- Validation Errors -->
    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div>
            <label>Book Title:</label><br>
            <input type="text"
                   name="title"
                   value="{{ old('title', $book->title) }}">
        </div>

        <br>

        <div>
            <label>Author:</label><br>
            <input type="text"
                   name="author"
                   value="{{ old('author', $book->author) }}">
        </div>

        <br>

        <div>
            <label>Category:</label><br>

            <select name="category_id">

                <option value="">Select Category</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <br>

        <div>
            <label>Price:</label><br>
            <input type="number"
                   name="price"
                   step="0.01"
                   value="{{ old('price', $book->price) }}">
        </div>

        <br>

        <div>
            <label>Description:</label><br>
            <textarea name="description">{{ old('description', $book->description) }}</textarea>
        </div>

        <br>

        <div>
            <label>Current Cover Image:</label><br>

            @if($book->cover_image)

                <img src="{{ asset('storage/' . $book->cover_image) }}"
                     alt="{{ $book->title }}"
                     width="150">

            @else

                <p>No cover image.</p>

            @endif

        </div>

        <br>

        <div>
            <label>New Cover Image:</label><br>
            <input type="file"
                   name="cover_image"
                   accept="image/*">
        </div>

        <br>

        <button type="submit">Update Book</button>

    </form>

    <br>

    <a href="{{ route('books.index') }}">
        Back to Books
    </a>

</body>
</html>

