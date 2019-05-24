<?php

namespace Hongyukeji\LaravelPackage;

use Illuminate\Support\ServiceProvider;
use Hongyukeji\LaravelPackage\Commands\BootpackCreatePackage;

class BootpackServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/bootpack.php' => config_path('bootpack.php'),
        ], 'bootpack-config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                BootpackCreatePackage::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/bootpack.php', 'bootpack'
        );
    }
}
