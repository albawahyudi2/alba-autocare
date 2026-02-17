<?php
// Simple test endpoint
header('Content-Type: application/json');

$response = [
    'status' => 'ok',
    'php_version' => phpversion(),
    'pdo_drivers' => PDO::getAvailableDrivers(),
    'extensions' => get_loaded_extensions(),
    'env' => [
        'DB_CONNECTION' => getenv('DB_CONNECTION'),
        'DB_HOST' => getenv('DB_HOST'),
        'DB_PORT' => getenv('DB_PORT'),
        'DB_DATABASE' => getenv('DB_DATABASE'),
        'DB_USERNAME' => substr(getenv('DB_USERNAME'), 0, 20) . '...',
        'APP_ENV' => getenv('APP_ENV'),
    ]
];

// Test database connection
try {
    $dsn = sprintf(
        'pgsql:host=%s;port=%s;dbname=%s;sslmode=%s',
        getenv('DB_HOST'),
        getenv('DB_PORT'),
        getenv('DB_DATABASE'),
        getenv('DB_SSLMODE') ?: 'require'
    );
    
    $pdo = new PDO($dsn, getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
    $response['database'] = 'Connected successfully';
    $response['db_version'] = $pdo->query('SELECT version()')->fetchColumn();
} catch (Exception $e) {
    $response['database'] = 'Connection failed';
    $response['error'] = $e->getMessage();
}

echo json_encode($response, JSON_PRETTY_PRINT);
