
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book | Online Book Store</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            background: #f4f6fa;
            color: #17243d;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
            min-height: 76px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            background: #17243d;
            box-shadow: 0 3px 15px rgba(23, 36, 61, 0.15);
        }

        .logo {
            color: #d9a943;
            font-size: 23px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
            flex-wrap: wrap;
        }

        .nav-links a,
        .logout-btn {
            border: 0;
            border-radius: 7px;
            color: white;
            background: transparent;
            padding: 10px 12px;
            font: 600 14px Arial, Helvetica, sans-serif;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .nav-links a:hover,
        .logout-btn:hover { background: #304e78; }

        .admin-bar {
            display: flex;
            justify-content: flex-end;
            max-width: 1050px;
            margin: 22px auto 0;
            padding: 0 20px;
        }

        .admin-dashboard,
        .back-btn,
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border-radius: 8px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .admin-dashboard {
            padding: 10px 16px;
            background: #17243d;
            color: white;
            font-size: 14px;
        }

        .admin-dashboard:hover { background: #304e78; }

        .page-container {
            width: min(100% - 40px, 760px);
            margin: 42px auto 70px;
        }

        .page-header { margin-bottom: 25px; text-align: center; }

        .page-icon {
            width: 64px;
            height: 64px;
            display: grid;
            place-items: center;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: #17243d;
            color: #d9a943;
            font-size: 28px;
        }

        h1 { margin-bottom: 8px; font-size: 32px; }
        .page-header p { color: #68758a; font-size: 15px; }

        .form-card {
            padding: 35px;
            border: 1px solid #e4e8ef;
            border-radius: 14px;
            background: white;
            box-shadow: 0 8px 25px rgba(23, 36, 61, 0.10);
        }

        .back-btn { margin-bottom: 25px; color: #304e78; font-size: 14px; }
        .back-btn:hover { color: #d9a943; }

        .error-box {
            margin-bottom: 24px;
            padding: 14px 18px;
            border: 1px solid #e4a5a5;
            border-radius: 8px;
            background: #fff1f1;
            color: #9b2c2c;
            font-size: 14px;
        }

        .error-box strong { display: block; margin-bottom: 7px; }
        .error-box ul { margin-left: 22px; }
        .form-group { margin-bottom: 21px; }

        label {
            display: block;
            margin-bottom: 8px;
            color: #17243d;
            font-size: 14px;
            font-weight: 700;
        }

        label i { margin-right: 6px; color: #d9a943; }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid #ccd3df;
            border-radius: 8px;
            padding: 13px 14px;
            outline: none;
            background: white;
            color: #17243d;
            font: 15px Arial, Helvetica, sans-serif;
            transition: 0.2s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #304e78;
            box-shadow: 0 0 0 3px rgba(48, 78, 120, 0.12);
        }

        textarea { min-height: 150px; resize: vertical; line-height: 1.6; }
        input[type="file"] { padding: 10px; background: #f8f9fb; cursor: pointer; }
        .field-error { margin-top: 6px; color: #b42318; font-size: 13px; }

        .current-cover {
            display: flex;
            align-items: flex-start;
            gap: 18px;
            padding: 16px;
            border: 1px solid #e1e6ee;
            border-radius: 10px;
            background: #f4f6fa;
        }

        .current-cover img {
            width: 130px;
            height: 170px;
            border: 2px solid #d9a943;
            border-radius: 8px;
            object-fit: cover;
        }

        .no-cover { padding-top: 10px; color: #7b8798; font-size: 14px; }
        .help-text { display: block; margin-top: 7px; color: #7b8798; font-size: 12px; }

        .form-actions { display: flex; gap: 12px; margin-top: 30px; }
        .btn { border: 0; padding: 13px 20px; font-size: 15px; cursor: pointer; }
        .btn-primary { flex: 1; background: #17243d; color: white; }
        .btn-primary:hover { background: #304e78; }
        .btn-secondary { background: #e9edf3; color: #17243d; }
        .btn-secondary:hover { background: #d9a943; }

        @media (max-width: 700px) {
            .navbar { padding: 18px 20px; flex-direction: column; }
            .nav-links { justify-content: center; }
            .page-container { width: min(100% - 30px, 760px); margin-top: 30px; }
            .form-card { padding: 24px 20px; }
            h1 { font-size: 28px; }
            .current-cover { flex-direction: column; }
            .form-actions { flex-direction: column; }
            .btn { width: 100%; }
        }
    </style>
</head>
<body>

    @include('partials.navbar')

    <nav class="navbar legacy-navbar">
        <a href="{{ route('home') }}" class="logo">
            <i class="bi bi-book-half"></i>
            Online Book Store
        </a>

        <div class="nav-links">
            <a href="{{ route('home') }}"><i class="bi bi-house"></i> Home</a>
            <a href="{{ route('books.index') }}"><i class="bi bi-book"></i> Books</a>
            <a href="{{ route('categories.index') }}"><i class="bi bi-grid"></i> Categories</a>
            <a href="{{ route('stories.index') }}"><i class="bi bi-journal-text"></i> Stories</a>

            @auth
                <a href="{{ route('profile') }}"><i class="bi bi-person"></i> Profile</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
            @endauth
        </div>
    </nav>

    @can('admin')
        <div class="admin-bar">
            <a href="{{ route('admin.dashboard') }}" class="admin-dashboard">
                <i class="bi bi-speedometer2"></i> Admin Dashboard
            </a>
        </div>
    @endcan

    <main class="page-container">
        <header class="page-header">
            <div class="page-icon"><i class="bi bi-pencil-square"></i></div>
            <h1>Edit Book</h1>
            <p>Update the book information and cover image.</p>
        </header>

        <div class="form-card">
            <a href="{{ route('books.index') }}" class="back-btn">
                <i class="bi bi-arrow-left"></i> Back to Books
            </a>

            @if($errors->any())
                <div class="error-box">
                    <strong><i class="bi bi-exclamation-circle"></i> Please fix the following errors:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title"><i class="bi bi-bookmark"></i> Book Title</label>
                    <input id="title" type="text" name="title" value="{{ old('title', $book->title) }}" placeholder="Enter book title" required>
                    @error('title') <div class="field-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="author"><i class="bi bi-person"></i> Author</label>
                    <input id="author" type="text" name="author" value="{{ old('author', $book->author) }}" placeholder="Enter author name" required>
                    @error('author') <div class="field-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="category_id"><i class="bi bi-tags"></i> Category</label>
                    <select id="category_id" name="category_id" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <div class="field-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="language"><i class="bi bi-translate"></i> Language</label>
                    <select id="language" name="language" required>
                        <option value="">Select Language</option>
                        <option value="English" {{ old('language', $book->language) === 'English' ? 'selected' : '' }}>English</option>
                        <option value="Urdu" {{ old('language', $book->language) === 'Urdu' ? 'selected' : '' }}>Urdu</option>
                    </select>
                    @error('language') <div class="field-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="price"><i class="bi bi-currency-dollar"></i> Price</label>
                    <input id="price" type="number" name="price" step="0.01" value="{{ old('price', $book->price) }}" placeholder="0.00" required>
                    @error('price') <div class="field-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="description"><i class="bi bi-card-text"></i> Description</label>
                    <textarea id="description" name="description" placeholder="Enter a short description">{{ old('description', $book->description) }}</textarea>
                    @error('description') <div class="field-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label><i class="bi bi-image"></i> Current Cover Image</label>
                    <div class="current-cover">
                        @if($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}">
                            <span class="help-text">Current cover for this book.</span>
                        @else
                            <span class="no-cover">No cover image uploaded.</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="cover_image"><i class="bi bi-upload"></i> New Cover Image</label>
                    <input id="cover_image" type="file" name="cover_image" accept="image/*">
                    <span class="help-text">Choose a new image to replace the current cover.</span>
                    @error('cover_image') <div class="field-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i> Update Book</button>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Cancel</a>
                </div>
            </form>
        </div>
    </main>

</body>
</html>

