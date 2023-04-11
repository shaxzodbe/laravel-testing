<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('create_article', fn($user) => $user->type == 'admin');
        Gate::define('edit_article', fn($user) => $user->type == 'admin');
        Gate::define('update_article', fn($user) => $user->type == 'admin');
        Gate::define('delete_article', fn($user) => $user->type == 'admin');
    }
}
