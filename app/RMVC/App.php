<?php

namespace App\RMVC;
use App\RMVC\Route\Route;
use App\RMVC\Route\RouteDispatcher;
use Resources\Database\Connection;

class App
{
    public static function run()
    {
        $requestMethod = ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
        $methodName = 'getRoutes'.$requestMethod;

        foreach (Route::$methodName() as $routeConfiguration)
        {
            $routeConfiguration = new RouteDispatcher($routeConfiguration);
            $routeConfiguration->process();
        }
    }
}