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
            $callback = self::$routes[$method][$path];

            // Jika callback adalah controller (misal "HomeController@index")
            if (is_string($callback) && strpos($callback, '@')) {
                [$controllerName, $methodName] = explode('@', $callback);

                // **Tambahkan namespace App\Http\Controllers**
                $controllerClass = "App\\Http\\Controllers\\{$controllerName}";

                // Cek apakah class controller benar-benar ada
                if (!class_exists($controllerClass)) {
                    die("❌ ERROR: Controller <b>{$controllerClass}</b> tidak ditemukan.");
                }

                // Buat instance controller
                $controller = new $controllerClass();

                // Cek apakah method dalam controller ada
                if (!method_exists($controller, $methodName)) {
                    die("❌ ERROR: Method <b>{$methodName}</b> tidak ditemukan di <b>{$controllerClass}</b>.");
                }

                // Jalankan controller dan method
                return call_user_func([$controller, $methodName]);
            } 
            
            // Jika callback adalah anonymous function
            elseif (is_callable($callback)) {
                return call_user_func($callback);
            } 
            
            else {
                die("❌ ERROR: Callback tidak valid.");
            }
        }

        http_response_code(404);
        echo "❌ 404 Not Found";
    }
}
