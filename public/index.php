<?php

// public/index.php

// Memuat bootstrap framework Nusa
require_once __DIR__ . '/../bootstrap.php';

// Menjalankan router
Nusa\Core\Router::dispatch();
