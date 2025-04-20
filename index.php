<?php
// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define base path
define('BASE_PATH', __DIR__);

// Start session
session_start();

// Debug information
$debug = [
    'ip' => $_SERVER['REMOTE_ADDR'],
    'user_agent' => $_SERVER['HTTP_USER_AGENT'],
    'request_uri' => $_SERVER['REQUEST_URI'],
    'request_method' => $_SERVER['REQUEST_METHOD']
];

// Log debug information
error_log("Debug Info: " . print_r($debug, true));

try {
    // Check if required files exist
    $required_files = [
        BASE_PATH . '/templates/Antibot/anti-v2.php',
        BASE_PATH . '/templates/layouts/index.php'
    ];

    foreach ($required_files as $file) {
        if (!file_exists($file)) {
            throw new Exception("Required file missing: " . $file);
        }
    }

    // Include antibot system
    require_once BASE_PATH . '/templates/Antibot/anti-v2.php';

    // Initialize services
    require_once BASE_PATH . '/app/bootstrap.php';
    use App\Services\BotProtectionService;
    use App\Models\Visitor;

    // Initialize services
    $botProtection = new BotProtectionService();
    $visitorModel = new Visitor();

    // Get client IP
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];
    $ip = explode(',', $ip)[0];

    // Track visitor
    $visitorModel->track($ip, $_SERVER['REQUEST_URI']);

    // Check if route needs protection
    if ($botProtection->shouldProtectRoute($_SERVER['REQUEST_URI'])) {
        if ($botProtection->isBot($ip)) {
            error_log("Bot detected: IP=" . $ip . " UA=" . $_SERVER['HTTP_USER_AGENT']);
            http_response_code(403);
            die('Access denied - Bot or suspicious activity detected');
        }
    }

    // Simple router
    $route = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];

    // Remove query string and trailing slash
    $route = rtrim(strtok($route, '?'), '/');

    // Route handling
    switch ($route) {
        case '':
        case '/':
            require BASE_PATH . '/templates/layouts/index.php';
            break;
            
        case '/admin/login':
            if ($method === 'POST') {
                require BASE_PATH . '/app/Controllers/AdminController.php';
                $controller = new AdminController();
                $controller->login();
            } else {
                require BASE_PATH . '/templates/admin/login.php';
            }
            break;
            
        case '/admin/panel':
            require BASE_PATH . '/app/Controllers/AdminController.php';
            $controller = new AdminController();
            $controller->panel();
            break;
            
        case '/track':
            require BASE_PATH . '/app/Controllers/TransactionController.php';
            $controller = new TransactionController();
            $controller->track();
            break;
            
        default:
            http_response_code(404);
            require BASE_PATH . '/templates/404.php';
            break;
    }
} catch (Exception $e) {
    // Log the error
    error_log("Error: " . $e->getMessage());
    error_log("Stack trace: " . $e->getTraceAsString());
    
    // Show error details for debugging
    echo "<h1>Error Details</h1>";
    echo "<pre>";
    echo "Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString();
    echo "</pre>";
} 