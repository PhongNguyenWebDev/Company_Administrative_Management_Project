<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Maatwebsite\Excel\Facades\Excel as ExcelFacade;
use App\Models\Location;
use App\Policies\LocationPolicy;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Đăng ký Maatwebsite ExcelServiceProvider
        $this->app->register(\Maatwebsite\Excel\ExcelServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Location::class, LocationPolicy::class);
    }
}
