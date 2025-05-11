<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [

    ];

    public function boot()
    {
        $this->registerPolicies();


        Gate::define('manage-articles', function (User $user) {
            return $user->is_admin === true;
        });


        Gate::define('edit-article', function (User $user, Article $article) {
            return $user->name === $article->author || $user->is_admin === true;
        });
    }
}
