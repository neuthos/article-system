<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $featured = Article::with(['category', 'level'])
                         ->where('published', true)
                         ->orderBy('published_at', 'desc')
                         ->take(5)
                         ->get();

        return view('home', compact('featured'));
    }
}
