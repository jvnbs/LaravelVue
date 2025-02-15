<?php

use App\Console\Commands\DeleteUsersOneByOne;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
          'AuthAdmin' => \App\Http\Middleware\AuthAdmin::class,
          'AuthApi' => \App\Http\Middleware\AuthApi::class,
          'CheckPermission' => \App\Http\Middleware\CheckPermission::class,
          'PreventBackAndForward' => \App\Http\Middleware\PreventBackAndForward::class,
          'SetLocale' => \App\Http\Middleware\SetLocale::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withSchedule(function (Schedule $schedule) {
        
        $schedule->command('app:delete-users-one-by-one')->everyFiveSeconds();
        $schedule->command('app:delete-role-one-by-one')->everySecond();

        // $schedule->call(function () {
        //     info('Hello world!');
        // })->everyMinute();
       
    })->create();
