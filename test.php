<?php

require_once __DIR__ . '/vendor/autoload.php';

use Nusa\Core\Model;

if (class_exists('Nusa\Core\Model')) {
    echo "✅ Class Model ditemukan!";
} else {
    echo "❌ Class Model TIDAK ditemukan!";
}
