<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::withCount('articles')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Display the specified category.
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $articles = $category->articles()
                    ->where('published', true)
                    ->with(['category', 'level'])
                    ->orderBy('published_at', 'desc')
                    ->paginate(9);

        return view('categories.show', compact('category', 'articles'));
    }
}
