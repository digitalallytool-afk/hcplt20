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
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('web_settings')) {
                \Illuminate\Support\Facades\View::share('web_setting', \App\Models\WebSetting::first());
            }
        } catch (\Exception $e) {
            // Silence exceptions during migration/setup
        }
    }
}
