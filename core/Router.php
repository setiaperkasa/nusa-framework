<?php

namespace Nusa\Core;

class Router
{
    protected static $routes = [];

    public static function get($path, $callback)
    {
        self::$routes['GET'][$path] = $callback;
    }

    public static function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset(self::$routes[$method][$path])) {
            call_user_func(self::$routes[$method][$path]);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
