<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Fuzzy\Fzpkg\Classes\Utils\Middlewares\{SetLocale, SetTheme};
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up'
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append:[
            SetLocale::class,
            SetTheme::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (HttpException $e, Request $request) {
            return SetTheme::elaborateHttpExceptions($e, $request);
        });

        if (!config('app.debug')) {
            $exceptions->render(function (\Throwable $e, Request $request) {
                return SetTheme::elaborateAllExceptions($e, $request);
            });
        }
    })->create();
