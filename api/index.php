<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Configure storage for Vercel (read-only filesystem)
if (getenv('VERCEL') === '1') {
    // Create necessary directories in /tmp
    $tmpDirs = [
        '/tmp/storage/framework/cache',
        '/tmp/storage/framework/sessions',
        '/tmp/storage/framework/views',
        '/tmp/storage/logs',
    ];
    
    foreach ($tmpDirs as $dir) {
        if (!file_exists($dir)) {
            @mkdir($dir, 0755, true);
        }
    }
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

// Override storage path for Vercel
if (getenv('VERCEL') === '1') {
    $app->useStoragePath('/tmp/storage');
}

$app->handleRequest(Request::capture());