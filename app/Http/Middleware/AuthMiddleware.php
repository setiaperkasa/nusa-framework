<?php

namespace App\Http\Middleware;

class AuthMiddleware
{
    public function handle($next)
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            die("❌ Akses ditolak! Anda harus login.");
        }

        return $next();
    }
}
