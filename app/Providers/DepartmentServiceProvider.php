<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DepartmentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register the DepartmentRepository class
        $this->app->bind(
            \App\Services\DepartmentDataService::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
