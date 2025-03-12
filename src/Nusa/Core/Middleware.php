<?php

namespace Nusa\Core;

class Middleware
{
    public static function run($middleware, $next)
    {
        $middlewareClass = "App\\Http\\Middleware\\{$middleware}";

        if (!class_exists($middlewareClass)) {
            throw new \Exception("Middleware {$middleware} tidak ditemukan.");
        }

        $middlewareInstance = new $middlewareClass();
        return $middlewareInstance->handle($next);
    }
}
