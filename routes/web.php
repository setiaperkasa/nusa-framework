<?php

use Nusa\Core\Router;

// Routing dasar untuk halaman home
Router::get('/', function() {
    echo "Welcome to Nusa Framework!";
});
