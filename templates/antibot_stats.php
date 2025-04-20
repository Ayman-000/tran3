<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: /admin/login');
    exit();
}

// Get stats from session or database
$stats = $_SESSION['antibot_stats'] ?? [
    'blocked_requests' => 0,
    'cached_ips' => 0,
    'recent_logs' => []
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anti-Bot Statistics</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .log-container {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            max-height: 500px;
            overflow-y: auto;
            font-family: monospace;
            font-size: 0.9em;
        }
        .log-entry {
            margin-bottom: 5px;
            padding: 5px;
            border-bottom: 1px solid #dee2e6;
        }
        .log-entry.warning {
            background-color: #fff3cd;
        }
        .log-entry.error {
            background-color: #f8d7da;
        }
        .stats-card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Anti-Bot Statistics</h1>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card stats-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Blocked Requests</h5>
                        <h2 class="card-text text-danger"><?php echo $stats['blocked_requests']; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card stats-card">
                    <div class="card-body">
                        <h5 class="card-title">Cached IPs</h5>
                        <h2 class="card-text text-primary"><?php echo $stats['cached_ips']; ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Recent Activity Log</h5>
                <div class="log-container">
                    <?php foreach ($stats['recent_logs'] as $log): ?>
                        <?php if (strpos($log, 'WARNING') !== false): ?>
                            <div class="log-entry warning"><?php echo htmlspecialchars($log); ?></div>
                        <?php elseif (strpos($log, 'ERROR') !== false): ?>
                            <div class="log-entry error"><?php echo htmlspecialchars($log); ?></div>
                        <?php else: ?>
                            <div class="log-entry"><?php echo htmlspecialchars($log); ?></div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="/admin/dashboard" class="btn btn-secondary">Back to Admin Panel</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Auto-refresh the page every 30 seconds
        setTimeout(function() {
            location.reload();
        }, 30000);

        // Auto-scroll to bottom of log container
        document.addEventListener('DOMContentLoaded', function() {
            var logContainer = document.querySelector('.log-container');
            logContainer.scrollTop = logContainer.scrollHeight;
        });
    </script>
</body>
</html> 