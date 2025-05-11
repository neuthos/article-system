<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Article;

class CheckArticleOwnership
{
    public function handle(Request $request, Closure $next)
    {
        $article = $request->route('article');

        if ($article && $request->user()->name !== $article->author && !$request->user()->is_admin) {
            return redirect()->route('articles.index')
                ->with('error', 'You are not authorized to perform this action.');
        }

        return $next($request);
    }
}
