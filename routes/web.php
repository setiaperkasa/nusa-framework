<?php

use Nusa\Core\Router;

Router::get('/', 'HomeController@index');

// ✅ Halaman Dashboard hanya bisa diakses setelah login
Router::middleware('AuthMiddleware')->get('/dashboard', function() {
    echo "✅ Selamat datang di Dashboard!";
});
