<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Basic PHP test
echo "PHP is working<br>";

// Test session
session_start();
echo "Session started<br>";

// Test file system
$basePath = __DIR__;
echo "Base path: " . $basePath . "<br>";

// Test file existence
$testFile = $basePath . '/templates/Antibot/anti-v2.php';
echo "Checking anti-v2.php: " . (file_exists($testFile) ? "Exists" : "Missing") . "<br>";

// Test file permissions
if (file_exists($testFile)) {
    echo "File permissions: " . substr(sprintf('%o', fileperms($testFile)), -4) . "<br>";
    echo "File readable: " . (is_readable($testFile) ? "Yes" : "No") . "<br>";
}

// Test PHP extensions
echo "Required extensions:<br>";
$requiredExtensions = ['pdo', 'pdo_mysql', 'session', 'json'];
foreach ($requiredExtensions as $ext) {
    echo "$ext: " . (extension_loaded($ext) ? "Loaded" : "Missing") . "<br>";
}

// Test PHP configuration
echo "PHP Configuration:<br>";
echo "memory_limit: " . ini_get('memory_limit') . "<br>";
echo "max_execution_time: " . ini_get('max_execution_time') . "<br>";
echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "<br>";
echo "post_max_size: " . ini_get('post_max_size') . "<br>";

// Test server software
echo "Server Software: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

// Test required files
$requiredFiles = [
    'templates/Antibot/anti-v2.php',
    'templates/layouts/index.php',
    'app/routes.php'
];

foreach ($requiredFiles as $file) {
    $fullPath = $basePath . '/' . $file;
    echo "Checking $file: " . (file_exists($fullPath) ? "Exists" : "Missing") . "<br>";
}

// Test database connection if configured
if (file_exists($basePath . '/app/config/database.php')) {
    require_once $basePath . '/app/config/database.php';
    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
            DB_USER,
            DB_PASS
        );
        echo "Database Connection: Success<br>";
    } catch (PDOException $e) {
        echo "Database Connection: Failed - " . $e->getMessage() . "<br>";
    }
}
?> 