<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }
    public function boot(): void
    {
        Paginator::useBootstrapFour();
        Gate::define('destroy-service', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('update-service', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('create-service', function (User $user) {
            return $user->is_admin;
        });
    }
}
