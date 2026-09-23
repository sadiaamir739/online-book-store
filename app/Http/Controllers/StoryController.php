<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\StoryPage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    // Show all stories
    public function index()
    {
        $query = Story::with('category', 'user')->latest();

        if (!Auth::user()?->is_admin) {
            $query->where('published', true);
        }

        $stories = $query->get();

        return view('stories.index', compact('stories'));
    }

    // Show single story
    public function show(Request $request, Story $story)
    {
        if (
            !$story->published &&
            (!Auth::check() || (!Auth::user()->is_admin && $story->user_id !== Auth::id()))
        ) {
            abort(404);
        }

        $story->load('category', 'user');

        $pages = $story->pages()
            ->orderBy('page_number')
            ->get();

        $pageNumber = max(1, $request->integer('page', 1));
        $page = $pages->firstWhere('page_number', $pageNumber) ?? $pages->first();
        $previousPage = $page
            ? $pages->where('page_number', '<', $page->page_number)->sortByDesc('page_number')->first()
            : null;
        $nextPage = $page
            ? $pages->where('page_number', '>', $page->page_number)->sortBy('page_number')->first()
            : null;

        return view('stories.show', compact('story', 'pages', 'page', 'previousPage', 'nextPage'));
    }

    // Show create story form
    public function create()
    {
        $categories = Category::all();

        return view('stories.create', compact('categories'));
    }

    // Store new story
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'language' => 'required|string|max:50',
            'cover_image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        $coverImage = null;

        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image')
                ->store('stories', 'public');
        }

        $story = Story::create([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'language' => $request->language,
            'cover_image' => $coverImage,
            'description' => $request->description,
            'published' => Auth::user()?->is_admin ?? false,
            'user_id' => Auth::id(),
        ]);

        return redirect()
            ->route('stories.show', $story->id)
            ->with('success', 'Story created successfully!');
    }

    // Edit story
    public function edit(Story $story)
    {
        $this->authorizeStory($story);

        $categories = Category::all();

        return view('stories.edit', compact('story', 'categories'));
    }

    // Update story
    public function update(Request $request, Story $story)
    {
        $this->authorizeStory($story);

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'language' => 'required|string|max:50',
            'cover_image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'language' => $request->language,
            'description' => $request->description,
        ];

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')
                ->store('stories', 'public');
        }

        $story->update($data);

        return redirect()
            ->route('stories.show', $story->id)
            ->with('success', 'Story updated successfully!');
    }

    // Delete story
    public function destroy(Story $story)
    {
        $this->authorizeStory($story);

        $story->delete();

        return redirect()
            ->route('stories.index')
            ->with('success', 'Story deleted successfully!');
    }

    // Show story pages
    public function pages(Story $story)
    {
        $story->load('pages');

        return view('stories.pages', compact('story'));
    }

    // Create story page
    public function createPage(Story $story)
    {
        $this->authorizeStory($story);

        return view('stories.create-page', compact('story'));
    }

    // Store story page
    public function storePage(Request $request, Story $story)
    {
        $this->authorizeStory($story);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $nextPage = ($story->pages()->max('page_number') ?? 0) + 1;

        $story->pages()->create([
            'page_number' => $nextPage,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()
            ->route('stories.pages', $story->id)
            ->with('success', 'Story page added successfully!');
    }

    // Edit story page
    public function editPage(Story $story, $pageId)
    {
        $this->authorizeStory($story);

        $page = $story->pages()->findOrFail($pageId);

        return view('stories.edit-page', compact('story', 'page'));
    }

    // Update story page
    public function updatePage(Request $request, Story $story, $pageId)
    {
        $this->authorizeStory($story);

        $page = $story->pages()->findOrFail($pageId);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $page->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()
            ->route('stories.pages', $story->id)
            ->with('success', 'Story page updated successfully!');
    }

    // Delete story page
    public function deletePage(Story $story, $pageId)
    {
        $this->authorizeStory($story);

        $page = $story->pages()->findOrFail($pageId);

        $page->delete();

        // Renumber remaining pages
        $pages = $story->pages()
            ->orderBy('page_number')
            ->get();

        foreach ($pages as $index => $page) {
            $page->update([
                'page_number' => $index + 1,
            ]);
        }

        return redirect()
            ->route('stories.pages', $story->id)
            ->with('success', 'Story page deleted and pages renumbered successfully!');
    }

    // Check story ownership
    private function authorizeStory(Story $story)
    {
        $user = Auth::user();

        if (
            !$user ||
            (!$user->is_admin && $story->user_id !== $user->id)
        ) {
            abort(403, 'You are not allowed to modify this story.');
        }
    }

    public function approve(Story $story)
    {
        $story->update(['published' => true]);

        return redirect()
            ->route('stories.index')
            ->with('success', 'Story approved successfully!');
    }
}