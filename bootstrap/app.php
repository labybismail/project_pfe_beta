<?php

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

        $middleware->alias([
            'isLogged' => \App\Http\Middleware\isLogged::class,
            'isAdmin' => \App\Http\Middleware\isAdmin::class,
            'isNotAdmin' => \App\Http\Middleware\isNotAdmin::class,
            'isGuest' => \App\Http\Middleware\isGuest::class,
            'isPatient' => \App\Http\Middleware\isPatient::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
