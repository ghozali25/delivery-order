<?php

namespace App\Providers;

use App\Http\Middleware\RequireAuthenticated;
use App\Http\Middleware\RequireUnauthenticated;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

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
        Livewire::addPersistentMiddleware([
            RequireAuthenticated::class,
            RequireUnauthenticated::class,
        ]);
    }
}
