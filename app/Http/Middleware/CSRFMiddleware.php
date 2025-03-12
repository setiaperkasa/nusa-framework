<?php

namespace App\Http\Middleware;

class CSRFMiddleware
{
    public function handle($next)
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['_csrf'] ?? '';

            if (!isset($_SESSION['_csrf']) || $_SESSION['_csrf'] !== $token) {
                http_response_code(403);
                die("❌ CSRF token invalid.");
            }
        }

        return $next();
    }
}
