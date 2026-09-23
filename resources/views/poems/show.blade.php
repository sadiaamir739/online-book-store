<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $poem->title }} | Online Book Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * { box-sizing: border-box; } body { margin: 0; font-family: Arial, sans-serif; background: #f4f6fa; color: #17243d; }
        .container { width: 90%; max-width: 850px; margin: 42px auto; } .card { background: white; padding: 44px; border-radius: 12px; box-shadow: 0 5px 20px rgba(23,36,61,.08); }
        h1 { margin: 0 0 8px; text-align: center; } .poet { text-align: center; color: #8b671e; font-weight: bold; margin-bottom: 32px; }
        .content { white-space: pre-line; line-height: 2; font-size: 18px; color: #46536a; text-align: center; }
        .actions { display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; border-top: 1px solid #e2e5eb; padding-top: 24px; margin-top: 32px; }
        .button { display: inline-flex; align-items: center; gap: 7px; padding: 11px 16px; border-radius: 7px; border: 0; text-decoration: none; cursor: pointer; font-weight: bold; } .primary { background: #17243d; color: white; } .danger { background: #a83232; color: white; } .secondary { background: #e9edf3; color: #17243d; } form { margin: 0; }
    </style>
</head>
<body>
    @include('partials.navbar')
    <main class="container"><article class="card">
        <h1><i class="bi bi-feather"></i> {{ $poem->title }}</h1>
        <div class="poet">By {{ $poem->poet }}</div>
        <div class="content">{{ $poem->content }}</div>
        @auth
            @if(auth()->user()->is_admin || $poem->user_id === auth()->id())
                <div class="actions">
                    <a href="{{ route('poems.edit', $poem) }}" class="button primary"><i class="bi bi-pencil"></i> Edit</a>
                    <form action="{{ route('poems.destroy', $poem) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this poem?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="button danger"><i class="bi bi-trash3"></i> Delete</button>
                    </form>
                    <a href="{{ route('poems.index') }}" class="button secondary">Back to Poetry</a>
                </div>
            @endif
        @endauth
    </article></main>
</body>
</html>
