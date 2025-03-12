<?php

use Nusa\Core\Router;
use App\Http\Controllers\AuthController;

Router::get('/register', 'AuthController@showRegister');
Router::post('/register', 'AuthController@register');

Router::get('/login', 'AuthController@showLogin');
Router::post('/login', 'AuthController@login');

Router::get('/logout', 'AuthController@logout');

Router::middleware('AuthMiddleware')->get('/dashboard', function() {
    session_start();
    echo "✅ Selamat datang di Dashboard, " . $_SESSION['user_name'];
});