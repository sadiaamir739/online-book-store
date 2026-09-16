<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
</head>
<body>

    <h1>Add New Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">

        @csrf

        <label>Category Name:</label>
        <br>

        <input type="text" name="name" required>

        <br><br>

        <label>Description:</label>
        <br>

        <textarea name="description"></textarea>

        <br><br>

        <button type="submit">
            Add Category
        </button>

    </form>

    <br>

    <a href="{{ route('categories.index') }}">
        Back to Categories
    </a>

</body>
</html>