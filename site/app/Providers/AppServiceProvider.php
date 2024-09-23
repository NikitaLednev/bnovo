<?php

namespace App\Providers;

use App\Exceptions\JsonErrorHandler;
use App\Http\Middlewares\ResponseDebugHeadersMiddleware;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ResponseDebugHeadersMiddleware::class);
        $this->app->singleton(Handler::class, JsonErrorHandler::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
