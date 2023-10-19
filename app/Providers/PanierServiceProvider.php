<?php

namespace App\Providers;

use App\Http\Repositories\PanierInterfaceRepository;
use App\Http\Repositories\PanierSessionRepository;
use Illuminate\Support\ServiceProvider;

class PanierServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PanierInterfaceRepository::class, PanierSessionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
