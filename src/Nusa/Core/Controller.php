<?php

namespace Nusa\Core;

require_once __DIR__ . "/../vendor/autoload.php";

class Controller
{
    protected function view($view, $data = [])
    {
        extract($data);
        require_once __DIR__ . "/../app/Views/{$view}.php";
    }

    protected function json($data, $status = 200)
    {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
    }

    protected function redirect($path)
    {
        header("Location: {$path}");
        exit;
    }
}
