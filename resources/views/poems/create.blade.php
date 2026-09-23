<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Poem | Online Book Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background: #f4f6fa; color: #17243d; }
        .container { width: 90%; max-width: 760px; margin: 42px auto; }
        .card { background: white; padding: 34px; border-radius: 12px; box-shadow: 0 5px 20px rgba(23,36,61,.08); }
        h1 { margin-top: 0; }
        .field { margin-bottom: 18px; }
        label { display: block; margin-bottom: 7px; font-weight: bold; }
        input, textarea { width: 100%; padding: 12px 14px; border: 1px solid #d5dce7; border-radius: 8px; font: inherit; }
        textarea { min-height: 260px; resize: vertical; }
        .actions { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 22px; }
        .button { display: inline-flex; align-items: center; gap: 7px; padding: 11px 16px; border: 0; border-radius: 7px; text-decoration: none; cursor: pointer; font-weight: bold; }
        .primary { background: #17243d; color: white; } .secondary { background: #e9edf3; color: #17243d; }
        .error { color: #b42318; font-size: 13px; margin-top: 5px; }
    </style>
</head>
<body>
    @include('partials.navbar')
    <main class="container"><div class="card">
        <h1><i class="bi bi-feather"></i> Add Poem</h1>
        <form action="{{ route('poems.store') }}" method="POST">
            @csrf
            <div class="field"><label for="title">Title</label><input id="title" name="title" value="{{ old('title') }}" required>@error('title')<div class="error">{{ $message }}</div>@enderror</div>
            <div class="field"><label for="poet">Poet</label><input id="poet" name="poet" value="{{ old('poet', auth()->user()->name) }}" required>@error('poet')<div class="error">{{ $message }}</div>@enderror</div>
            <div class="field"><label for="content">Poem</label><textarea id="content" name="content" required>{{ old('content') }}</textarea>@error('content')<div class="error">{{ $message }}</div>@enderror</div>
            <div class="actions"><button class="button primary" type="submit"><i class="bi bi-plus-circle"></i> Add Poem</button><a class="button secondary" href="{{ route('poems.index') }}">Cancel</a></div>
        </form>
    </div></main>
</body>
</html>
