<?php

namespace App\Http\Controllers;

use App\Models\Poem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PoemController extends Controller
{
    public function index()
    {
        $query = Poem::with('user')->latest();

        if (!Auth::user()?->is_admin) {
            $query->where('published', true);
        }

        $poems = $query->get();

        return view('poems.index', compact('poems'));
    }

    public function create()
    {
        return view('poems.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'poet' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $validated['user_id'] = Auth::id();
        $validated['published'] = Auth::user()->is_admin;
        Poem::create($validated);

        return redirect()->route('poems.index')->with('success', 'Poem created successfully!');
    }

    public function show(Poem $poem)
    {
        $this->authorizeView($poem);

        return view('poems.show', compact('poem'));
    }

    public function edit(Poem $poem)
    {
        $this->authorizePoem($poem);

        return view('poems.edit', compact('poem'));
    }

    public function update(Request $request, Poem $poem)
    {
        $this->authorizePoem($poem);

        $poem->update($request->validate([
            'title' => ['required', 'string', 'max:255'],
            'poet' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]));

        return redirect()->route('poems.show', $poem)->with('success', 'Poem updated successfully!');
    }

    public function destroy(Poem $poem)
    {
        $this->authorizePoem($poem);
        $poem->delete();

        return redirect()->route('poems.index')->with('success', 'Poem deleted successfully!');
    }

    public function approve(Poem $poem)
    {
        abort_unless(Auth::user()?->is_admin, 403);
        $poem->update(['published' => true]);

        return redirect()->route('poems.index')->with('success', 'Poem approved successfully!');
    }

    private function authorizeView(Poem $poem): void
    {
        if (!$poem->published && (!Auth::check() || (!Auth::user()->is_admin && $poem->user_id !== Auth::id()))) {
            abort(404);
        }
    }

    private function authorizePoem(Poem $poem): void
    {
        $user = Auth::user();

        if (!$user || (!$user->is_admin && $poem->user_id !== $user->id)) {
            abort(403, 'You are not allowed to modify this poem.');
        }
    }
}
