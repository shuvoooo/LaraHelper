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
        $this->app->make('Illuminate\Contracts\Http\Kernel')->pushMiddleware(Check::class);
    }

    public function register()
    {
        parent::register();

        /** @var Router $router */
        $router = $this->app['router'];

        // or
        $router->pushMiddlewareToGroup('web', Check::class);
    }
}
