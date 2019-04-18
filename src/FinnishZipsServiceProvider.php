<?php

namespace Spacha\FinnishZips;

use Illuminate\Support\ServiceProvider;

class FinnishZipsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'spacha');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'spacha');
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
    public function register()
    {
        // $this->mergeConfigFrom(__DIR__.'/../config/finnish-zips.php', 'finnish-zips');

        // Register the service the package provides.
        $this->app->singleton('finnish-zips', function ($app) {
            return new FinnishZips;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['finnish-zips'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        // $this->publishes([
        //     __DIR__.'/../config/finnish-zips.php' => config_path('finnish-zips.php'),
        // ], 'finnish-zips.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/spacha'),
        ], 'finnish-zips.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/spacha'),
        ], 'finnish-zips.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/spacha'),
        ], 'finnish-zips.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
