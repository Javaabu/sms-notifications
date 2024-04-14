<?php

namespace Javaabu\{YourPackage};

use Illuminate\Support\ServiceProvider;

class {YourPackage}ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // declare publishes
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('{your-package}.php'),
            ], '{your-package}-config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // merge package config with user defined config
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', '{your-package}');
    }
}
