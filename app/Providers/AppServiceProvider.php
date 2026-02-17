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
        // Ensure critical service providers are registered for serverless environment
        if (getenv('VERCEL') === '1') {
            // Make sure View service is available
            if (!$this->app->bound('view')) {
                $this->app->register(\Illuminate\View\ViewServiceProvider::class);
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

