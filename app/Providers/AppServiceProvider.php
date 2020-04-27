<?php

namespace App\Providers;

use App\Configuration;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config([
            'global' => Configuration::all([
                'key', 'value'
            ])->keyBy('key')
            ->transform(function ($setting) {
                return $setting->value;
            })->toArray()
        ]);
    }
}
