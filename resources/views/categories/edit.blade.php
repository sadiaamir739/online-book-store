<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Category</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .header {
            background: #222;
            color: white;
            padding: 25px;
            text-align: center;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 40px auto;
        }

        .form-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        .update-btn {
            background: #222;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
        }

        .update-btn:hover {
            background: #444;
        }

        .back-btn {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #222;
        }

        .errors {
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>✏️ Edit Category</h1>
    </div>

    <div class="container">

        <div class="form-box">

            @if($errors->any())
                <div class="errors">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('categories.update', $category->id) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <label>Category Name:</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $category->name) }}"
                >

                <br><br>

                <label>Description:</label>

                <textarea
                    name="description"
                >{{ old('description', $category->description) }}</textarea>

                <br><br>

                <button type="submit" class="update-btn">
                    Update Category
                </button>

            </form>

            <a
                href="{{ route('categories.index') }}"
                class="back-btn"
            >
                ← Back to Categories
            </a>

        </div>

    </div>

</body>
</html>