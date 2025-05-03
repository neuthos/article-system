<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleList extends Component
{
   /**
    * The articles collection.
    *
    * @var \Illuminate\Pagination\LengthAwarePaginator
    */
   public $articles;

   /**
    * The title for the list.
    *
    * @var string
    */
   public $title;

   /**
    * Create a new component instance.
    *
    * @param  \Illuminate\Pagination\LengthAwarePaginator  $articles
    * @param  string  $title
    * @return void
    */
   public function __construct(LengthAwarePaginator $articles, $title = 'Latest Articles')
   {
       $this->articles = $articles;
       $this->title = $title;
   }

   /**
    * Get the view / contents that represent the component.
    *
    * @return \Illuminate\Contracts\View\View|\Closure|string
    */
   public function render()
   {
       return view('components.article-list');
   }
}
