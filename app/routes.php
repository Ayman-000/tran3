<?php
require_once __DIR__ . '/bootstrap.php';

// Helper function to check if admin is logged in
function is_admin_logged_in() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

// Helper function to require admin login
function require_admin_login() {
    if (!is_admin_logged_in()) {
        header('Location: /admin/login.php');
        exit;
    }
}

// Helper function to set flash message
function set_flash_message($message, $type = 'success') {
    $_SESSION['flash_message'] = [
        'text' => $message,
        'type' => $type
    ];
}

// Helper function to get flash message
function get_flash_message() {
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
        return $message;
    }
    return null;
}

// Main routes
function route_index() {
    require __DIR__ . '/../templates/layouts/index.php';
}

function route_about_us() {
    require __DIR__ . '/../templates/about-us.php';
}

function route_our_team() {
    require __DIR__ . '/../templates/our-team.php';
}

function route_contact() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $message = $_POST['message'] ?? '';
        
        if (empty($name) || empty($email) || empty($message)) {
            set_flash_message('Please fill in all required fields', 'error');
        } else {
            set_flash_message('Thank you for your message! We will get back to you soon.');
            header('Location: /contact.php');
            exit;
        }
    }
    require __DIR__ . '/../templates/contact.php';
}

function route_login() {
    if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
        header('Location: /dashboard.php');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if ($email === 'admin@example.com' && $password === ADMIN_PASSWORD) {
            $_SESSION['user_logged_in'] = true;
            header('Location: /dashboard.php');
            exit;
        } else {
            set_flash_message('Invalid email or password', 'error');
        }
    }
    require __DIR__ . '/../templates/login-2.php';
}

function route_register() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';
        
        if (empty($email) || empty($password) || empty($confirm_password)) {
            set_flash_message('Please fill in all required fields', 'error');
        } elseif ($password !== $confirm_password) {
            set_flash_message('Passwords do not match', 'error');
        } else {
            set_flash_message('Registration successful! Please login.');
            header('Location: /login.php');
            exit;
        }
    }
    require __DIR__ . '/../templates/register-2.php';
}

function route_registered() {
    require __DIR__ . '/../templates/registred.php';
}

function route_privacy_policy() {
    require __DIR__ . '/../templates/privacy-policy.php';
}

function route_terms_conditions() {
    require __DIR__ . '/../templates/terms-conditions.php';
}

function route_dashboard() {
    if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
        header('Location: /login.php');
        exit;
    }
    require __DIR__ . '/../templates/dashboard.php';
}

// Admin routes
function route_admin_login() {
    if (is_admin_logged_in()) {
        header('Location: /admin/dashboard.php');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $password = $_POST['password'] ?? '';
        
        if ($password === ADMIN_PASSWORD) {
            $_SESSION['admin_logged_in'] = true;
            set_flash_message('Successfully logged in!');
            header('Location: /admin/dashboard.php');
            exit;
        } else {
            set_flash_message('Invalid password. Please try again.', 'error');
        }
    }
    require __DIR__ . '/../templates/admin/login.php';
}

function route_admin_logout() {
    unset($_SESSION['admin_logged_in']);
    set_flash_message('Successfully logged out!');
    header('Location: /admin/login.php');
    exit;
}

function route_admin_dashboard() {
    require_admin_login();
    
    // Read visitors data
    $visitors = [];
    if (file_exists(VISITORS_CSV)) {
        $fp = fopen(VISITORS_CSV, 'r');
        $header = fgetcsv($fp);
        while (($row = fgetcsv($fp)) !== false) {
            $visitors[] = array_combine($header, $row);
        }
        fclose($fp);
    }
    
    // Read total visits
    $total_visits = 0;
    if (file_exists(VISITS_TXT)) {
        $total_visits = (int)file_get_contents(VISITS_TXT);
    }
    
    // Read transactions data
    $transactions = [];
    if (file_exists(TRANSACTIONS_CSV)) {
        $fp = fopen(TRANSACTIONS_CSV, 'r');
        $header = fgetcsv($fp);
        while (($row = fgetcsv($fp)) !== false) {
            $transaction = array_combine($header, $row);
            foreach ($transaction as $key => $value) {
                if ($value === null || $value === '') {
                    $transaction[$key] = 'N/A';
                }
            }
            if (!isset($transaction['status']) || !$transaction['status']) {
                $transaction['status'] = 'Processing';
            }
            $transactions[] = $transaction;
        }
        fclose($fp);
    }
    
    require __DIR__ . '/../templates/admin/admin.php';
}

// Route handling
$route = $_SERVER['REQUEST_URI'];
$route = strtok($route, '?'); // Remove query string

// Remove .php extension if present
$route = str_replace('.php', '', $route);

switch ($route) {
    case '/':
    case '/index':
        route_index();
        break;
    case '/about-us':
        route_about_us();
        break;
    case '/our-team':
        route_our_team();
        break;
    case '/contact':
        route_contact();
        break;
    case '/login':
        route_login();
        break;
    case '/register':
        route_register();
        break;
    case '/registered':
        route_registered();
        break;
    case '/dashboard':
        route_dashboard();
        break;
    case '/privacy-policy':
        route_privacy_policy();
        break;
    case '/terms-conditions':
        route_terms_conditions();
        break;
    case '/admin/login':
        route_admin_login();
        break;
    case '/admin/logout':
        route_admin_logout();
        break;
    case '/admin':
    case '/admin/dashboard':
        route_admin_dashboard();
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/../templates/404.php';
        break;
} 