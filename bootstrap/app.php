<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\ProfilMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Ajoute ici tes middlewares
        $middleware->alias([
            'profil' => ProfilMiddleware::class, // Alias pour utiliser 'role' dans les routes
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

        //
    })->create();
