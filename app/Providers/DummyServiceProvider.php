<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DummyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //exit('just to verify laravel loads this file');
        echo('Boot');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //exit('just to verify laravel loads this file');
        echo('Register');
    }
}
