<?php
// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define base path
define('BASE_PATH', dirname(__DIR__));

// Include antibot system
require_once BASE_PATH . '/templates/Antibot/anti-v2.php';

// Start session
session_start();

// Include the main layout
require_once BASE_PATH . '/templates/layouts/index.php';

require_once BASE_PATH . '/../app/bootstrap.php';

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