<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\checkAdmin;
use App\Http\Middleware\CheckOrder;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        api: __DIR__ . '/../routes/api.php',
        apiPrefix: 'api',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // $middleware->use([
        //     checkAdmin::class,
        //     CheckOrder::class
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
