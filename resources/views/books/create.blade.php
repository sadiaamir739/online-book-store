
<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
</head>
<body>

    <h1>Add New Book</h1>

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

    <form action="{{ route('books.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div>
            <label>Book Title:</label><br>
            <input type="text"
                   name="title"
                   value="{{ old('title') }}">
        </div>

        <br>

        <div>
            <label>Author:</label><br>
            <input type="text"
                   name="author"
                   value="{{ old('author') }}">
        </div>

        <br>

        <div>
            <label>Category:</label><br>

            <select name="category_id">
                <option value="">Select Category</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                   value="{{ old('price') }}">
        </div>

        <br>

        <div>
            <label>Description:</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <br>

        <div>
            <label>Cover Image:</label><br>
            <input type="file"
                   name="cover_image"
                   accept="image/*">
        </div>

        <br>

        <button type="submit">Add Book</button>

    </form>

    <br>

    <a href="{{ route('books.index') }}">
        Back to Books
    </a>

</body>
</html>

