<?php


namespace Shuvo\LaraHelper;

use Illuminate\Support\ServiceProvider;
use Shuvo\LaraHelper\middleware\Check;

class LaraHelperServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/route.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'dev');
        $this->middlewareGroup('web', [
            Check::class,
        ]);
    }

    public function register()
    {
        self::register();
    }
}
