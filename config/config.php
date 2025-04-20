<?php

return [
    // Application settings
    'app' => [
        'name' => 'Transfer System',
        'debug' => true,
        'secret_key' => getenv('SECRET_KEY', 'your-secret-key-here'),
    ],

    // Admin settings
    'admin' => [
        'password' => getenv('ADMIN_PASSWORD', 'admin123'),
    ],

    // File paths
    'paths' => [
        'data' => __DIR__ . '/../data',
        'uploads' => __DIR__ . '/../public/uploads',
        'logs' => __DIR__ . '/../logs',
    ],

    // CSV files
    'files' => [
        'transactions' => 'transactions.csv',
        'visitors' => 'visitors.csv',
        'visits' => 'visits.txt',
    ],

    // IP Quality Score API
    'ipqs' => [
        'api_key' => getenv('IPQS_API_KEY', ''),
    ],

    // Upload settings
    'upload' => [
        'allowed_extensions' => ['png', 'jpg', 'jpeg', 'gif'],
        'max_size' => 5 * 1024 * 1024, // 5MB
    ],
]; 