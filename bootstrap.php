<?php

// bootstrap.php

// Composer Autoload
require_once __DIR__ . '/vendor/autoload.php';

// Load environment variables (.env)
if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

// Set default timezone
date_default_timezone_set($_ENV['APP_TIMEZONE'] ?? 'Asia/Jakarta');

// Include core framework files
require_once __DIR__ . '/core/Router.php';

// Initialize Router (nanti akan kita kembangkan)
use Nusa\Core\Router;

// Load routes
require_once __DIR__ . '/routes/web.php';
