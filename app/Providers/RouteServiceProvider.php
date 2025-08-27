<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->routes(function () {
            // Web routes
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // API routes
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // ✅ Admin routes
            Route::middleware('admin')
                ->prefix('admin')
                ->group(base_path('routes/adminAuth.php'));
        });
    }
}