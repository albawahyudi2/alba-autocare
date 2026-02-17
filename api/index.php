<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Configure for Vercel serverless environment
if (getenv('VERCEL') === '1') {
    // Create necessary directories in /tmp
    $tmpDirs = [
        '/tmp/storage/framework/cache/data',
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
try {
    /** @var Application $app */
    $app = require_once __DIR__.'/../bootstrap/app.php';
    
    // Override storage path for Vercel
    if (getenv('VERCEL') === '1') {
        $app->useStoragePath('/tmp/storage');
    }
    
    $app->handleRequest(Request::capture());
} catch (\Throwable $e) {
    // Fallback error page
    http_response_code(500);
    
    // If it's a view error, show simple HTML error page
    if (strpos($e->getMessage(), 'view') !== false || strpos($e->getMessage(), 'Target class') !== false) {
        echo '<!DOCTYPE html>
<html>
<head>
    <title>Application Error</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 50px; background: #f5f5f5; }
        .error { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #e74c3c; }
        pre { background: #f8f9fa; padding: 15px; border-radius: 4px; overflow-x: auto; }
    </style>
</head>
<body>
    <div class="error">
        <h1>⚠️ Application Bootstrap Error</h1>
        <p><strong>Error:</strong> ' . htmlspecialchars($e->getMessage()) . '</p>
        <p><strong>Type:</strong> ' . htmlspecialchars(get_class($e)) . '</p>
        <p><strong>File:</strong> ' . htmlspecialchars($e->getFile()) . ':' . $e->getLine() . '</p>
        <hr>
        <p>This error typically occurs when Laravel cannot load its service providers.</p>
        <p><strong>Troubleshooting:</strong></p>
        <ul>
            <li>Check if all environment variables are set correctly in Vercel</li>
            <li>Verify database connection: <a href="/test">/test</a></li>
            <li>Check Vercel deployment logs for build errors</li>
        </ul>
    </div>
</body>
</html>';
    } else {
        header('Content-Type: application/json');
        echo json_encode([
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'type' => get_class($e),
        ], JSON_PRETTY_PRINT);
    }
    
    error_log('Laravel Bootstrap Error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine());
}