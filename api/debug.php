<?php

// Debug endpoint - check PHP and environment
header('Content-Type: application/json');

$debug = [
    'status' => 'Debug Info',
    'php_version' => phpversion(),
    'vercel' => getenv('VERCEL'),
    'extensions' => get_loaded_extensions(),
    'writable_tmp' => is_writable('/tmp'),
    'storage_created' => file_exists('/tmp/storage'),
    'env_vars' => [
        'APP_ENV' => getenv('APP_ENV'),
        'APP_KEY' => substr(getenv('APP_KEY'), 0, 20) . '...',
        'DB_CONNECTION' => getenv('DB_CONNECTION'),
        'DB_HOST' => getenv('DB_HOST'),
    ],
    'paths' => [
        'base' => __DIR__ . '/..',
        'vendor_exists' => file_exists(__DIR__ . '/../vendor/autoload.php'),
        'bootstrap_exists' => file_exists(__DIR__ . '/../bootstrap/app.php'),
    ]
];

// Try to load Laravel
try {
    require __DIR__.'/../vendor/autoload.php';
    $debug['autoload'] = 'OK';
    
    $app = require_once __DIR__.'/../bootstrap/app.php';
    $debug['bootstrap'] = 'OK';
    
    if (getenv('VERCEL') === '1') {
        $app->useStoragePath('/tmp/storage');
    }
    
    $debug['laravel_loaded'] = true;
    $debug['app_env'] = $app->environment();
    
} catch (\Throwable $e) {
    $debug['error'] = [
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
    ];
}

echo json_encode($debug, JSON_PRETTY_PRINT);
