<?php

namespace JonathanTorres\LaravelMediumSdk;

use Illuminate\Support\ServiceProvider;
use JonathanTorres\MediumSdk\Medium;

class LaravelMediumSdkServiceProvider extends ServiceProvider
{
    /**
     * Publish configuration file.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/laravel-medium-sdk.php' => config_path('laravel-medium-sdk.php'),
        ]);
    }

    /**
     * Register Medium class instance in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('JonathanTorres\LaravelMediumSdk\LaravelMediumSdk', function ($app) {
            return new Medium([
                'client-id' => config('laravel-medium-sdk.client-id'),
                'client-secret' => config('laravel-medium-sdk.client-secret'),
                'redirect-url' => config('laravel-medium-sdk.redirect-url'),
                'state' => config('laravel-medium-sdk.state'),
                'scopes' => config('laravel-medium-sdk.scopes'),
            ]);
        });
    }
}
