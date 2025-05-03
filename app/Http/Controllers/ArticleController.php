<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where('published', true)
                        ->orderBy('published_at', 'desc')
                        ->paginate(9);

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:articles',
            'author' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'published' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('article-images', 'public');
            $validated['image'] = $imagePath;
        }

        if ($request->has('published') && $request->published) {
            $validated['published_at'] = now();
        }

        Article::create($validated);

        return redirect()->route('articles.index')
                        ->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)
                       ->where('published', true)
                       ->firstOrFail();

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:articles,slug,' . $article->id_article . ',id_article',
            'author' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'published' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('article-images', 'public');
            $validated['image'] = $imagePath;
        }

        // Set published_at if publishing for the first time
        if ($request->has('published') && $request->published && !$article->published) {
            $validated['published_at'] = now();
        }

        $article->update($validated);

        return redirect()->route('articles.index')
                        ->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
                        ->with('success', 'Article deleted successfully.');
    }

    /**
     * Display the home page with featured articles.
     */
    public function home()
    {
        $featured = Article::where('published', true)
                         ->orderBy('published_at', 'desc')
                         ->take(5)
                         ->get();

        return view('home', compact('featured'));
    }
}
