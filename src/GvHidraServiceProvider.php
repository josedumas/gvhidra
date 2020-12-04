<?php

namespace Gva\GvHidra;

use Illuminate\Support\ServiceProvider;

class GvHidraServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'gva');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'gva');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/gvhidra.php', 'gvhidra');

        // Register the service the package provides.
        $this->app->singleton('gvhidra', function ($app) {
            return new GvHidra;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['gvhidra'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/gvhidra.php' => config_path('gvhidra.php'),
        ], 'gvhidra.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/gva'),
        ], 'gvhidra.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/gva'),
        ], 'gvhidra.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/gva'),
        ], 'gvhidra.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
