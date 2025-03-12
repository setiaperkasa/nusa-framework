<?php

namespace Nusa\Core;

require_once __DIR__ . '/Middleware.php';

use Nusa\Core\Middleware;

class Router
{
    protected static $routes = [];
    protected static $middlewares = [];

    public static function get($path, $callback)
    {
        self::addRoute('GET', $path, $callback);
    }

    public static function post($path, $callback)
    {
        self::addRoute('POST', $path, $callback);
    }

    public static function middleware($middleware)
    {
        self::$middlewares[] = $middleware;
        return new static;
    }

    protected static function addRoute($method, $path, $callback)
    {
        self::$routes[$method][$path] = [
            'callback' => $callback,
            'middlewares' => self::$middlewares
        ];
        self::$middlewares = []; // Reset setelah route didaftarkan
    }

    public static function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset(self::$routes[$method][$path])) {
            $route = self::$routes[$method][$path];

            // ✅ Jalankan Middleware sebelum controller dipanggil
            foreach ($route['middlewares'] as $middleware) {
                Middleware::run($middleware, function () {});
            }

            // ✅ Jalankan Controller
            $callback = $route['callback'];
            if (is_string($callback) && strpos($callback, '@')) {
                [$controllerName, $methodName] = explode('@', $callback);
                $controllerClass = "App\\Http\\Controllers\\{$controllerName}";

                if (!class_exists($controllerClass)) {
                    throw new \Exception("Controller {$controllerClass} tidak ditemukan.");
                }

                $controller = new $controllerClass();
                return call_user_func([$controller, $methodName]);
            } elseif (is_callable($callback)) {
                return call_user_func($callback);
            } else {
                throw new \Exception("Callback tidak valid.");
            }
        }

        http_response_code(404);
        echo "❌ 404 Not Found";
    }
}
