<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poetry | Online Book Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background: #f4f6fa; color: #17243d; }
        .container { width: 90%; max-width: 1000px; margin: 42px auto; }
        .hero { padding: 42px 5%; background: linear-gradient(135deg, #17233c, #344e72); color: white; }
        .hero h1 { margin: 8px 0; font-size: 38px; }
        .hero p { margin: 0; color: #e8edf5; }
        .toolbar { display: flex; justify-content: space-between; align-items: center; gap: 15px; margin-bottom: 25px; }
        .toolbar h2 { margin: 0; }
        .button { display: inline-flex; align-items: center; gap: 7px; padding: 11px 16px; border-radius: 7px; text-decoration: none; border: 0; cursor: pointer; font-weight: bold; }
        .primary { background: #17243d; color: white; }
        .gold { background: #d9a943; color: #17243d; }
        .danger { background: #a83232; color: white; }
        .poem-card { background: white; border-radius: 12px; padding: 26px; margin-bottom: 18px; box-shadow: 0 5px 20px rgba(23,36,61,.08); }
        .poem-card h2 { margin: 0 0 7px; color: #17243d; }
        .poet { color: #8b671e; font-weight: bold; margin-bottom: 18px; }
        .content { white-space: pre-line; line-height: 1.9; color: #46536a; }
        .actions { display: flex; gap: 9px; flex-wrap: wrap; margin-top: 20px; padding-top: 18px; border-top: 1px solid #e2e5eb; }
        .empty { background: white; padding: 45px 25px; text-align: center; border-radius: 12px; }
        .empty i { font-size: 42px; color: #d9a943; }
        .success { padding: 13px 16px; background: #edf8f1; color: #247343; border: 1px solid #a9d8b8; border-radius: 8px; margin-bottom: 20px; }
        form { margin: 0; }
        @media (max-width: 650px) { .toolbar { align-items: flex-start; flex-direction: column; } .hero h1 { font-size: 30px; } }
    </style>
</head>
<body>
    @include('partials.navbar')
    <section class="hero">
        <h1><i class="bi bi-feather"></i> Poetry</h1>
        <p>Read and share poems from our community.</p>
    </section>
    <main class="container">
        @if(session('success'))
            <div class="success"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
        @endif
        <div class="toolbar">
            <h2>Latest Poems</h2>
            @auth
                <div>
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="button primary"><i class="bi bi-speedometer2"></i> Admin Dashboard</a>
                    @endif
                    <a href="{{ route('poems.create') }}" class="button gold"><i class="bi bi-plus-circle"></i> Add Poem</a>
                </div>
            @endauth
        </div>
        @forelse($poems as $poem)
            <article class="poem-card">
                <h2><a href="{{ route('poems.show', $poem) }}" style="color:inherit;text-decoration:none;">{{ $poem->title }}</a></h2>
                <div class="poet"><i class="bi bi-person"></i> By {{ $poem->poet }}</div>
                <div class="content">{{ $poem->content }}</div>
                @auth
                    @if(auth()->user()->is_admin || $poem->user_id === auth()->id())
                        <div class="actions">
                            @if(auth()->user()->is_admin && !$poem->published)
                                <form action="{{ route('poems.approve', $poem) }}" method="POST">
                                    @csrf
                                    <button class="button gold" type="submit"><i class="bi bi-check-circle"></i> Approve</button>
                                </form>
                            @endif
                            <a href="{{ route('poems.edit', $poem) }}" class="button primary"><i class="bi bi-pencil"></i> Edit</a>
                            <form action="{{ route('poems.destroy', $poem) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this poem?');">
                                @csrf
                                @method('DELETE')
                                <button class="button danger" type="submit"><i class="bi bi-trash3"></i> Delete</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </article>
        @empty
            <div class="empty"><i class="bi bi-feather"></i><h2>No poems yet</h2><p>Be the first to share a poem.</p></div>
        @endforelse
    </main>
</body>
</html>
