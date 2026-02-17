<?php

// Optimize for serverless - disable opcache validation
if (function_exists('opcache_reset')) {
    opcache_reset();
}

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Configure storage for Vercel (read-only filesystem)
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
    $app = require_once __DIR__.'/../bootstrap/app.php';
    
    // Override storage path for Vercel
    if (getenv('VERCEL') === '1') {
        $app->useStoragePath('/tmp/storage');
    }
    
    $response = $app->handleRequest(Request::capture());
    
    $response->send();
    
    $app->terminate(Request::capture(), $response);
    
} catch (\Throwable $e) {
    http_response_code(500);
    header('Content-Type: text/html; charset=utf-8');
    
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Error - Alba Autocare</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 600px;
            width: 100%;
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            padding: 40px;
            text-align: center;
            color: white;
        }
        .header h1 { font-size: 48px; margin-bottom: 10px; }
        .header p { font-size: 18px; opacity: 0.9; }
        .content { padding: 40px; }
        .error-box {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 20px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .error-box strong { color: #856404; display: block; margin-bottom: 5px; }
        .error-box code { 
            background: #fff; 
            padding: 2px 6px; 
            border-radius: 3px; 
            font-size: 13px;
            color: #e74c3c;
        }
        .info { color: #666; line-height: 1.6; margin: 20px 0; }
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
        .btn {
            flex: 1;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.2s;
        }
        .btn:hover { transform: translateY(-2px); }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .btn-secondary {
            background: #f8f9fa;
            color: #333;
            border: 2px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>⚠️</h1>
            <p>Application Error</p>
        </div>
        <div class="content">
            <div class="error-box">
                <strong>Error Message:</strong>
                <code>' . htmlspecialchars($e->getMessage()) . '</code>
            </div>
            
            <div class="info">
                <p><strong>What happened?</strong></p>
                <p>The application encountered an error while trying to start. This usually happens when the Laravel framework cannot properly initialize in the serverless environment.</p>
                
                <p style="margin-top: 15px;"><strong>Common causes:</strong></p>
                <ul style="margin-left: 20px; margin-top: 10px;">
                    <li>Missing environment variables</li>
                    <li>Database connection issues</li>
                    <li>Service provider registration problems</li>
                </ul>
            </div>
            
            <div class="actions">
                <a href="/" class="btn btn-primary">Try Again</a>
                <a href="mailto:support@alba-autocare.com" class="btn btn-secondary">Contact Support</a>
            </div>
        </div>
    </div>
</body>
</html>';
    
    error_log('[Laravel Error] ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine());
}
            file_put_contents($migrationFlag, date('Y-m-d H:i:s'));
            error_log('Migrations completed successfully');
        } catch (\Exception $e) {
            error_log('Migration failed: ' . $e->getMessage());
        }
    }
}

$app->handleRequest(Request::capture());