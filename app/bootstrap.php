<?php

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Autoloader
spl_autoload_register(function ($class) {
    // Convert namespace to full file path
    $class = str_replace('\\', '/', $class);
    $file = __DIR__ . '/' . $class . '.php';
    
    if (file_exists($file)) {
        require_once $file;
    }
});

// Session start
session_start();

// Load environment variables
$env = parse_ini_file(__DIR__ . '/../.env');
foreach ($env as $key => $value) {
    define($key, $value);
}

// Define file paths
define('VISITORS_CSV', __DIR__ . '/../data/visitors.csv');
define('TRANSACTIONS_CSV', __DIR__ . '/../data/transactions.csv');
define('VISITS_TXT', __DIR__ . '/../data/visits.txt');

// Create data directory if it doesn't exist
if (!file_exists(__DIR__ . '/../data')) {
    mkdir(__DIR__ . '/../data', 0777, true);
}

// Initialize CSV files if they don't exist
function init_csv_files() {
    if (!file_exists(VISITORS_CSV)) {
        $fp = fopen(VISITORS_CSV, 'w');
        fputcsv($fp, ['id', 'ip', 'country', 'fraud_score', 'timestamp']);
        fclose($fp);
    }
    
    if (!file_exists(TRANSACTIONS_CSV)) {
        $fp = fopen(TRANSACTIONS_CSV, 'w');
        fputcsv($fp, ['id', 'tracking_number', 'amount', 'currency', 'status', 'timestamp']);
        fclose($fp);
    }
    
    if (!file_exists(VISITS_TXT)) {
        file_put_contents(VISITS_TXT, '0');
    }
}

// Helper functions
function getenv($key, $default = null)
{
    return $_ENV[$key] ?? $default;
}

function redirect($url)
{
    header("Location: $url");
    exit;
}

function flash($message, $type = 'info')
{
    $_SESSION['flash'] = [
        'message' => $message,
        'type' => $type
    ];
}

function getFlash()
{
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $flash;
}

// Helper function to get visitor's country
function get_visitor_country($ip) {
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/{$ip}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200 && $response) {
            $data = json_decode($response, true);
            return $data['country'] ?? 'Unknown';
        }
    } catch (Exception $e) {
        error_log("Error getting country for IP {$ip}: " . $e->getMessage());
    }
    return 'Unknown';
}

// Helper function to get fraud score
function get_fraud_score($ip) {
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://ipqualityscore.com/api/json/ip/" . IP_QUALITY_SCORE_API_KEY . "/{$ip}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200 && $response) {
            $data = json_decode($response, true);
            return $data['fraud_score'] ?? 0;
        }
    } catch (Exception $e) {
        error_log("Error getting fraud score for IP {$ip}: " . $e->getMessage());
    }
    return 0;
}

// Helper function to generate tracking number
function generate_tracking_number() {
    return 'TR' . strtoupper(uniqid()) . rand(1000, 9999);
}

// Helper function to get next ID
function get_next_id($file) {
    if (!file_exists($file)) {
        return 1;
    }
    
    $fp = fopen($file, 'r');
    $max_id = 0;
    fgetcsv($fp); // Skip header
    while (($row = fgetcsv($fp)) !== false) {
        $max_id = max($max_id, (int)$row[0]);
    }
    fclose($fp);
    
    return $max_id + 1;
}

// Track visitor
function track_visitor() {
    $ip = $_SERVER['REMOTE_ADDR'];
    $timestamp = date('Y-m-d H:i:s');
    
    // Get country and fraud score
    $country = get_visitor_country($ip);
    $fraud_score = get_fraud_score($ip);
    
    // Read existing visitors
    $visitors = [];
    if (file_exists(VISITORS_CSV)) {
        $fp = fopen(VISITORS_CSV, 'r');
        $header = fgetcsv($fp);
        while (($row = fgetcsv($fp)) !== false) {
            $visitors[] = array_combine($header, $row);
        }
        fclose($fp);
    }
    
    // Add new visitor
    $visitors[] = [
        'id' => get_next_id(VISITORS_CSV),
        'ip' => $ip,
        'country' => $country,
        'fraud_score' => $fraud_score,
        'timestamp' => $timestamp
    ];
    
    // Keep only last 1000 visitors
    if (count($visitors) > 1000) {
        $visitors = array_slice($visitors, -1000);
    }
    
    // Write back to CSV
    $fp = fopen(VISITORS_CSV, 'w');
    fputcsv($fp, ['id', 'ip', 'country', 'fraud_score', 'timestamp']);
    foreach ($visitors as $visitor) {
        fputcsv($fp, $visitor);
    }
    fclose($fp);
    
    // Update total visits
    $total_visits = (int)file_get_contents(VISITS_TXT);
    file_put_contents(VISITS_TXT, $total_visits + 1);
}

// Initialize files
init_csv_files();

// Track visitor on each request
track_visitor(); 