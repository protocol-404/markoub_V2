<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
    public const HOME = '/dashboard';

protected function redirectTo($request)
{
    if (!$request->expectsJson()) {
        if (auth()->user()->hasRole('admin')) {
            return '/admin/dashboard';
        } elseif (auth()->user()->hasRole('societe')) {
            return '/navettes';
        } else {
            return '/dashboard';
        }
    }
}

}
