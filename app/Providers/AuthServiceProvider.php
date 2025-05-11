<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // Definisi policies
    ];

    public function boot()
    {
        $this->registerPolicies();

        // Admin bisa melakukan semua tindakan
        Gate::define('manage-articles', function (User $user) {
            return $user->is_admin === true;
        });

        // User hanya bisa mengedit artikel miliknya
        Gate::define('edit-article', function (User $user, Article $article) {
            return $user->name === $article->author || $user->is_admin === true;
        });
    }
}
