<?php

namespace App\Providers;

use App\Services\NeshanService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(NeshanService::class, function () {
            return new NeshanService(
                config('services.neshan.api_url'),
                config('services.neshan.api_key')
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
