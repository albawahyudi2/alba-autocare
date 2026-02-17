<?php

/*
|--------------------------------------------------------------------------
| Laravel Entry Point for Vercel Serverless
|--------------------------------------------------------------------------
*/

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Vercel serverless configuration
$isVercel = (getenv('VERCEL') === '1');

if ($isVercel) {
    // Create storage directories in /tmp (writable in Vercel)
    $storageDirs = [
        '/tmp/storage/framework/cache/data',
        '/tmp/storage/framework/sessions',  
        '/tmp/storage/framework/views',
        '/tmp/storage/logs',
    ];
    
    foreach ($storageDirs as $dir) {
        @mkdir($dir, 0755, true);
    }
    
    // Set environment variables for storage path
    putenv('APP_STORAGE_PATH=/tmp/storage');
}

// Check maintenance mode
$maintenance = __DIR__.'/../storage/framework/maintenance.php';
if (file_exists($maintenance)) {
    require $maintenance;
}

// Load Composer autoloader
$autoload = __DIR__.'/../vendor/autoload.php';
if (!file_exists($autoload)) {
    die('Composer autoloader not found. Please run: composer install');
}
require $autoload;

// Bootstrap Laravel
try {
    $app = require_once __DIR__.'/../bootstrap/app.php';
    
    // Override storage path for Vercel
    if ($isVercel) {
        $app->useStoragePath('/tmp/storage');
        $app->instance('path.storage', '/tmp/storage');
    }
    
    // Handle the request
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $request = Request::capture();
    $response = $kernel->handle($request);
    
    // Send response
    $response->send();
    
    // Terminate
    $kernel->terminate($request, $response);
    
} catch (\Throwable $e) {
    // Log error
    error_log('[Laravel Fatal Error] ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine());
    
    // User-friendly error page
    http_response_code(500);
    header('Content-Type: text/html; charset=utf-8');
    
    $errorMsg = htmlspecialchars($e->getMessage());
    $errorFile = htmlspecialchars($e->getFile());
    $errorLine = $e->getLine();
    
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Error - Alba Autocare</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .error-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 600px;
            width: 100%;
            overflow: hidden;
        }
        .error-header {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            padding: 40px;
            text-align: center;
            color: white;
        }
        .error-header h1 { font-size: 48px; margin-bottom: 10px; }
        .error-content { padding: 30px; }
        .error-message {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
            font-size: 14px;
            color: #856404;
        }
        .error-details { 
            background: #f8f9fa; 
            padding: 15px; 
            border-radius: 4px;
            font-size: 13px;
            color: #666;
            margin: 15px 0;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-header">
            <h1>⚠️</h1>
            <p>Application Error</p>
        </div>
        <div class="error-content">
            <div class="error-message">
                <strong>Error:</strong> {$errorMsg}
            </div>
            <div class="error-details">
                <strong>File:</strong> {$errorFile}<br>
                <strong>Line:</strong> {$errorLine}
            </div>
            <p style="color: #666; line-height: 1.6;">
                The application encountered an error. Please try refreshing the page or contact support if the problem persists.
            </p>
            <a href="/debug" class="btn">View Debug Info</a>
        </div>
    </div>
</body>
</html>
HTML;
}


$app->handleRequest(Request::capture());