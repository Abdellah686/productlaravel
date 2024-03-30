<?php

use App\Http\Middleware\AdminAuthenticated;
use App\Http\Middleware\EditorAuthenticated;
use App\Http\Middleware\UserAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

$middleware->use([
    'admin'=>AdminAuthenticated::class,
    'Editor'=>EditorAuthenticated::class,
    'User'=>UserAuthenticated::class,
]);