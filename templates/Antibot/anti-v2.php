<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define the base path for autoloading
define('ANTIBOT_BASE_PATH', __DIR__);

// Simple autoloader for the CrawlerDetect classes
spl_autoload_register(function ($class) {
    $prefix = 'Jaybizzle\\CrawlerDetect\\';
    $base_dir = ANTIBOT_BASE_PATH . '/';
    
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    if (file_exists($file)) {
        require $file;
    }
});

// Check if the required files exist
$required_files = [
    __DIR__ . '/CrawlerDetect.php',
    __DIR__ . '/Fixtures/Crawlers.php',
    __DIR__ . '/Fixtures/Exclusions.php',
    __DIR__ . '/Fixtures/Headers.php',
    __DIR__ . '/Fixtures/AbstractProvider.php'
];

foreach ($required_files as $file) {
    if (!file_exists($file)) {
        die("Required file missing: " . $file);
    }
}

require_once __DIR__ . '/CrawlerDetect.php';
require_once __DIR__ . '/Fixtures/Crawlers.php';
require_once __DIR__ . '/Fixtures/Exclusions.php';
require_once __DIR__ . '/Fixtures/Headers.php';
require_once __DIR__ . '/Fixtures/AbstractProvider.php';

use Jaybizzle\CrawlerDetect\CrawlerDetect;

class AntiBot {
    private $crawlerDetect;
    private $blockedIPs = [];
    private $logFile;
    private $maxAttempts = 3;
    private $blockDuration = 3600; // 1 hour
    private $trustedProxies = []; // Add your trusted proxy IPs here

    public function __construct() {
        try {
            $this->crawlerDetect = new CrawlerDetect();
            $this->logFile = __DIR__ . '/antibot.log';
            $this->loadBlockedIPs();
        } catch (Exception $e) {
            error_log("AntiBot initialization error: " . $e->getMessage());
            return;
        }
    }

    public function check() {
        try {
            $ip = $this->getClientIP();
            if ($ip === 'UNKNOWN') {
                // If we can't get IP, allow access but log it
                $this->logAccess('UNKNOWN', 'IP_UNKNOWN', $_SERVER['HTTP_USER_AGENT'] ?? '');
                return;
            }

            $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

            // Check if IP is blocked
            if ($this->isIPBlocked($ip)) {
                $this->logAccess($ip, 'BLOCKED_IP', $userAgent);
                $this->blockAccess();
                return;
            }

            // Check for crawler/bot
            if ($this->crawlerDetect->isCrawler($userAgent)) {
                $this->logAccess($ip, 'BOT_DETECTED', $userAgent);
                $this->incrementAttempts($ip);
                $this->blockAccess();
                return;
            }

            // Check for suspicious headers
            if ($this->hasSuspiciousHeaders()) {
                $this->logAccess($ip, 'SUSPICIOUS_HEADERS', $userAgent);
                $this->incrementAttempts($ip);
                $this->blockAccess();
                return;
            }

            // Check for rapid requests
            if ($this->isRapidRequest($ip)) {
                $this->logAccess($ip, 'RAPID_REQUESTS', $userAgent);
                $this->incrementAttempts($ip);
                $this->blockAccess();
                return;
            }
        } catch (Exception $e) {
            // Silently fail if any check fails
            return;
        }
    }

    private function getClientIP() {
        try {
            // Check for Cloudflare
            if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
                return $_SERVER['HTTP_CF_CONNECTING_IP'];
            }

            // Check for other proxy headers
            $headers = [
                'HTTP_CLIENT_IP',
                'HTTP_X_FORWARDED_FOR',
                'HTTP_X_FORWARDED',
                'HTTP_FORWARDED_FOR',
                'HTTP_FORWARDED',
                'REMOTE_ADDR'
            ];

            foreach ($headers as $header) {
                if (isset($_SERVER[$header])) {
                    $ip = $_SERVER[$header];
                    
                    // Handle multiple IPs in X-Forwarded-For
                    if (strpos($ip, ',') !== false) {
                        $ips = explode(',', $ip);
                        $ip = trim($ips[0]);
                    }
                    
                    // Validate IP
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                        return $ip;
                    }
                }
            }

            // Fallback to REMOTE_ADDR
            return $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
        } catch (Exception $e) {
            return 'UNKNOWN';
        }
    }

    private function isIPBlocked($ip) {
        try {
            if (isset($this->blockedIPs[$ip])) {
                if (time() - $this->blockedIPs[$ip]['timestamp'] < $this->blockDuration) {
                    return true;
                } else {
                    unset($this->blockedIPs[$ip]);
                    $this->saveBlockedIPs();
                }
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    private function incrementAttempts($ip) {
        try {
            if (!isset($this->blockedIPs[$ip])) {
                $this->blockedIPs[$ip] = [
                    'attempts' => 1,
                    'timestamp' => time()
                ];
            } else {
                $this->blockedIPs[$ip]['attempts']++;
                $this->blockedIPs[$ip]['timestamp'] = time();
            }

            if ($this->blockedIPs[$ip]['attempts'] >= $this->maxAttempts) {
                $this->blockedIPs[$ip]['blocked'] = true;
            }

            $this->saveBlockedIPs();
        } catch (Exception $e) {
            // Silently fail if saving fails
        }
    }

    private function hasSuspiciousHeaders() {
        try {
            $suspiciousHeaders = [
                'HTTP_X_SCANNER',
                'HTTP_X_BOT',
                'HTTP_X_CRAWLER',
                'HTTP_X_SPIDER'
            ];

            foreach ($suspiciousHeaders as $header) {
                if (isset($_SERVER[$header])) {
                    return true;
                }
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    private function isRapidRequest($ip) {
        try {
            static $requests = [];
            $now = time();
            
            if (!isset($requests[$ip])) {
                $requests[$ip] = [
                    'count' => 1,
                    'timestamp' => $now
                ];
                return false;
            }

            // Reset if more than 1 minute has passed
            if ($now - $requests[$ip]['timestamp'] > 60) {
                $requests[$ip] = [
                    'count' => 1,
                    'timestamp' => $now
                ];
                return false;
            }

            $requests[$ip]['count']++;
            return $requests[$ip]['count'] > 30; // More than 30 requests per minute
        } catch (Exception $e) {
            return false;
        }
    }

    private function blockAccess() {
        try {
            header('HTTP/1.1 403 Forbidden');
            header('Content-Type: text/html');
            echo '<!DOCTYPE html>
            <html>
            <head>
                <title>Access Denied</title>
                <style>
                    body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
                    h1 { color: #ff0000; }
                </style>
            </head>
            <body>
                <h1>Access Denied</h1>
                <p>Your access to this website has been restricted.</p>
            </body>
            </html>';
            exit;
        } catch (Exception $e) {
            // Silently fail if blocking fails
            exit;
        }
    }

    private function logAccess($ip, $reason, $userAgent) {
        try {
            $logEntry = sprintf(
                "[%s] IP: %s | Reason: %s | User Agent: %s\n",
                date('Y-m-d H:i:s'),
                $ip,
                $reason,
                $userAgent
            );
            @file_put_contents($this->logFile, $logEntry, FILE_APPEND);
        } catch (Exception $e) {
            // Silently fail if logging fails
        }
    }

    private function loadBlockedIPs() {
        try {
            $file = __DIR__ . '/blocked_ips.json';
            if (file_exists($file)) {
                $this->blockedIPs = json_decode(@file_get_contents($file), true) ?? [];
            }
        } catch (Exception $e) {
            $this->blockedIPs = [];
        }
    }

    private function saveBlockedIPs() {
        try {
            $file = __DIR__ . '/blocked_ips.json';
            @file_put_contents($file, json_encode($this->blockedIPs));
        } catch (Exception $e) {
            // Silently fail if saving fails
        }
    }
}

// Initialize and run the antibot check
try {
    $antibot = new AntiBot();
    $antibot->check();
} catch (Exception $e) {
    // Silently fail if initialization fails
} 