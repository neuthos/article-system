<?php

namespace App\View\Components;

use App\Models\Article;
use Illuminate\View\Component;

class ArticleDetail extends Component
{
    /**
     * The article instance.
     *
     * @var \App\Models\Article
     */
    public $article;

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.article-detail');
    }
}
