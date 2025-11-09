<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            // include routes/API.php dengan prefix /app
            Route::prefix('app')->group(base_path('routes/API.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

    $app = require __DIR__.'/../vendor/autoload.php';

    // register Sanctum provider
    $app->register(\Laravel\Sanctum\SanctumServiceProvider::class);

    // register Telescope only in local
    if ($app->environment('local')) {
        $app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
        $app->register(\App\Providers\TelescopeServiceProvider::class);
    }