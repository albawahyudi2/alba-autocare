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
    
    // Check if migrations need to be run
    $migrationFlag = '/tmp/.migrations_run';
    if (!file_exists($migrationFlag)) {
        $runMigrations = true;
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
    
    // Run migrations on first request
    if (isset($runMigrations) && $runMigrations) {
        try {
            \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
            file_put_contents($migrationFlag, date('Y-m-d H:i:s'));
            error_log('Migrations completed successfully');
        } catch (\Exception $e) {
            error_log('Migration failed: ' . $e->getMessage());
        }
    }
}

$app->handleRequest(Request::capture());