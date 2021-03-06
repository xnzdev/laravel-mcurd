<?php

namespace XnzDev\MCurd\Providers;

use Illuminate\Support\ServiceProvider;

class GiiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');
        // extend views path
        $this->loadViewsFrom(__DIR__.'/../views/', 'xnz_views');
        $this->loadViewsFrom(__DIR__.'/../views/layouts/', 'xnz_render');

        $this->publishes([
            __DIR__.'/../assets' => public_path('/xnz_assets'),
        ], 'xnz-api');
    }
}
