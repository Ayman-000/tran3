<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Test basic PHP functionality
echo "PHP Version: " . phpversion() . "<br>";
echo "Server Software: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

// Test file system access
$basePath = __DIR__;
echo "Base Path: " . $basePath . "<br>";

// Test required files
$requiredFiles = [
    'templates/Antibot/anti-v2.php',
    'templates/Antibot/CrawlerDetect.php',
    'templates/Antibot/Fixtures/Crawlers.php',
    'templates/Antibot/Fixtures/Exclusions.php',
    'templates/Antibot/Fixtures/Headers.php',
    'templates/Antibot/Fixtures/AbstractProvider.php'
];

foreach ($requiredFiles as $file) {
    $fullPath = $basePath . '/' . $file;
    echo "Checking $file: " . (file_exists($fullPath) ? "Exists" : "Missing") . "<br>";
    if (file_exists($fullPath)) {
        echo "File permissions: " . substr(sprintf('%o', fileperms($fullPath)), -4) . "<br>";
        echo "File readable: " . (is_readable($fullPath) ? "Yes" : "No") . "<br>";
    }
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

// Test session
session_start();
echo "Session ID: " . session_id() . "<br>";

// Test file contents
echo "<hr>File Contents Test:<br>";
foreach ($requiredFiles as $file) {
    $fullPath = $basePath . '/' . $file;
    if (file_exists($fullPath)) {
        echo "<h3>$file</h3>";
        echo "<pre>";
        echo htmlspecialchars(file_get_contents($fullPath));
        echo "</pre>";
    }
}
?> 