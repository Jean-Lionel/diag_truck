<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
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
        //
    ];

    /**
    * Register any authentication / authorization services.
    */
    public function boot(): void
    {
        Gate::define('is-admin', function (User $user) {
            return $user->isAdmin();
        });
        Gate::define('is-infirmier', function (User $user) {
            return $user->isInfirmier();
        });
        Gate::define('is-docteur', function (User $user) {
            return $user->isDocteur();
        });
        //
    }
}
