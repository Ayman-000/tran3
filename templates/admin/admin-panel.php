<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: /admin/login');
    exit();
}

// Get data from PHP session or database
$live_visitors = $_SESSION['live_visitors'] ?? 0;
$banned_bots = $_SESSION['banned_bots'] ?? 0;
$recent_visitors = $_SESSION['recent_visitors'] ?? [];
$transactions = $_SESSION['transactions'] ?? [];
$users = $_SESSION['users'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Tarnfer</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/admin.css">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
</head>
<body>
    <div class="wrapper">
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="/assets/images/logo.png" alt="Tarnfer Logo" class="img-fluid">
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="/admin/dashboard">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/admin/transactions">
                        <i class="fas fa-exchange-alt"></i>
                        Transactions
                    </a>
                </li>
                <li>
                    <a href="/admin/users">
                        <i class="fas fa-users"></i>
                        Users
                    </a>
                </li>
                <li>
                    <a href="/admin/settings">
                        <i class="fas fa-cog"></i>
                        Settings
                    </a>
                </li>
            </ul>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="ms-auto">
                        <span class="navbar-text">
                            <i class="fas fa-circle text-success" id="liveVisitorStatus"></i>
                            <span id="liveVisitorCount"><?php echo $live_visitors; ?></span> Live Visitors
                        </span>
                    </div>
                </div>
            </nav>

            <main class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <h2 class="text-primary"><?php echo count($users); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Total Transactions</h5>
                                <h2 class="text-success"><?php echo count($transactions); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Total Revenue</h5>
                                <h2 class="text-info">$<?php 
                                    $total = 0;
                                    foreach ($transactions as $transaction) {
                                        if ($transaction['status'] === 'Completed') {
                                            $total += floatval($transaction['amount']);
                                        }
                                    }
                                    echo number_format($total, 2);
                                ?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Live Visitors Table -->
                <div class="dashboard-table">
                    <h4>Live Visitors</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>Time</th>
                                    <th>Country</th>
                                    <th>IP Address</th>
                                    <th>Page</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="liveVisitorsTable">
                                <?php foreach ($recent_visitors as $visitor): ?>
                                <tr id="visitor-<?php echo str_replace('.', '-', $visitor['ip_address']); ?>">
                                    <td class="visitor-time"><?php echo date('H:i:s', strtotime($visitor['timestamp'])); ?></td>
                                    <td>
                                        <?php if ($visitor['country_code'] !== 'Unknown' && $visitor['country_code'] !== 'XX'): ?>
                                            <img src="https://flagcdn.com/24x18/<?php echo strtolower($visitor['country_code']); ?>.png" 
                                                 alt="<?php echo $visitor['country_code']; ?>"
                                                 style="margin-right: 5px; vertical-align: middle; border: 1px solid #ddd; border-radius: 2px;">
                                            <?php echo $visitor['country_code']; ?>
                                        <?php else: ?>
                                            <span class="text-muted">Unknown</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><code><?php echo $visitor['ip_address']; ?></code></td>
                                    <td><small class="text-muted"><?php echo $visitor['page']; ?></small></td>
                                    <td>
                                        <?php if (intval($visitor['fraud_score']) >= 75): ?>
                                            <span class="badge bg-danger"><i class="fas fa-ban"></i> Blocked</span>
                                        <?php else: ?>
                                            <span class="badge bg-success"><i class="fas fa-check"></i> Allowed</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Transactions Table -->
                <div class="dashboard-table">
                    <h4>Transactions Overview</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>TX ID</th>
                                    <th>Transaction Info</th>
                                    <th>Transaction Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (array_reverse($transactions) as $transaction): ?>
                                <tr>
                                    <td>
                                        <strong><?php echo $transaction['transaction_id']; ?></strong><br>
                                        <small class="text-muted"><?php echo $transaction['tracking_number']; ?></small>
                                    </td>
                                    <td>
                                        Amount: <strong><?php echo $transaction['amount']; ?></strong><br>
                                        Method: <?php echo $transaction['payment_method']; ?><br>
                                        <small>Date: <?php echo $transaction['operation_date']; ?></small>
                                    </td>
                                    <td>
                                        <?php if ($transaction['status'] === 'Completed'): ?>
                                            <span class="badge bg-success"><i class="fas fa-check-circle"></i> <?php echo $transaction['status']; ?></span>
                                        <?php elseif ($transaction['status'] === 'Declined'): ?>
                                            <span class="badge bg-danger"><i class="fas fa-times-circle"></i> <?php echo $transaction['status']; ?></span>
                                        <?php elseif ($transaction['status'] === 'Waiting for Receiver Confirmation'): ?>
                                            <span class="badge bg-warning text-dark"><i class="fas fa-hourglass-half"></i> Waiting</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary"><i class="fas fa-spinner"></i> <?php echo $transaction['status']; ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php if (empty($transactions)): ?>
                                <tr>
                                    <td colspan="3" class="text-center">No transactions found.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">IP Protection Stats</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <h6 class="mb-0">Suspicious IPs Blocked</h6>
                                        <h2 class="text-danger"><?php echo $banned_bots; ?></h2>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Live Visitors</h6>
                                        <h2 class="text-success"><?php echo $live_visitors; ?></h2>
                                    </div>
                                </div>
                                <a href="/admin/antibot-stats" class="btn btn-info btn-block">
                                    <i class="fas fa-shield-alt"></i> View Detailed IP Stats
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Recent IP Activity</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>IP Address</th>
                                                <th>Country</th>
                                                <th>Risk Score</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($recent_visitors as $visitor): ?>
                                            <tr>
                                                <td><?php echo $visitor['ip_address']; ?></td>
                                                <td>
                                                    <?php if ($visitor['country_code'] !== 'Unknown'): ?>
                                                        <img src="https://flagcdn.com/16x12/<?php echo strtolower($visitor['country_code']); ?>.png" 
                                                             alt="<?php echo $visitor['country_code']; ?>"
                                                             class="me-1">
                                                    <?php endif; ?>
                                                    <?php echo $visitor['country_code']; ?>
                                                </td>
                                                <td>
                                                    <?php if (intval($visitor['fraud_score']) >= 75): ?>
                                                        <span class="badge bg-danger"><?php echo $visitor['fraud_score']; ?></span>
                                                    <?php elseif (intval($visitor['fraud_score']) >= 50): ?>
                                                        <span class="badge bg-warning"><?php echo $visitor['fraud_score']; ?></span>
                                                    <?php else: ?>
                                                        <span class="badge bg-success"><?php echo $visitor['fraud_score']; ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if (intval($visitor['fraud_score']) >= 75): ?>
                                                        <span class="badge bg-danger">Blocked</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-success">Allowed</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Admin Actions</h5>
                    <div class="btn-group-vertical w-100">
                        <a href="/admin/create-transaction" class="btn btn-primary mb-2">
                            <i class="fas fa-plus-circle"></i> Create New Transaction
                        </a>
                        <a href="/admin/antibot-stats" class="btn btn-info mb-2">
                            <i class="fas fa-shield-alt"></i> Anti-Bot Statistics
                        </a>
                        <a href="/admin/change-password" class="btn btn-warning mb-2">
                            <i class="fas fa-key"></i> Change Password
                        </a>
                        <a href="/admin/logout" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/socket.io/socket.io.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Connect to WebSocket
            var socket = io();
            var visitorTimeout = {};

            // Handle connection status
            socket.on('connect', function() {
                console.log('Connected to server');
                document.getElementById('liveVisitorStatus').classList.remove('text-danger');
                document.getElementById('liveVisitorStatus').classList.add('text-success');
            });

            socket.on('disconnect', function() {
                document.getElementById('liveVisitorStatus').classList.remove('text-success');
                document.getElementById('liveVisitorStatus').classList.add('text-danger');
                document.getElementById('liveVisitorStatus').innerHTML = '<i class="fas fa-circle"></i> Connection Lost';
            });

            // Handle visitor updates
            socket.on('visitor_update', function(data) {
                // Update visitor count
                document.getElementById('liveVisitorCount').textContent = data.live_visitors;
                
                // Clear existing timeout for this visitor
                if (visitorTimeout[data.visitor.ip_address]) {
                    clearTimeout(visitorTimeout[data.visitor.ip_address]);
                }

                // Set new timeout
                visitorTimeout[data.visitor.ip_address] = setTimeout(function() {
                    removeVisitor(data.visitor.ip_address);
                }, 300000); // 5 minutes

                // Update or add visitor to table
                updateVisitorTable(data.visitor);
            });

            socket.on('visitor_left', function(data) {
                removeVisitor(data.ip_address);
            });

            function removeVisitor(ip) {
                const visitorRow = document.getElementById(`visitor-${ip.replace(/\./g, '-')}`);
                if (visitorRow) {
                    visitorRow.remove();
                    
                    // Update count
                    const currentCount = parseInt(document.getElementById('liveVisitorCount').textContent);
                    document.getElementById('liveVisitorCount').textContent = Math.max(0, currentCount - 1);
                }
                delete visitorTimeout[ip];
            }

            function updateVisitorTable(visitor) {
                const tableBody = document.getElementById('liveVisitorsTable');
                const visitorId = `visitor-${visitor.ip_address.replace(/\./g, '-')}`;
                let row = document.getElementById(visitorId);
                
                const timestamp = new Date(visitor.timestamp).toTimeString().split(' ')[0];
                const rowHtml = `
                    <td class="visitor-time">${timestamp}</td>
                    <td>
                        ${visitor.country_code !== 'Unknown' && visitor.country_code !== 'XX' 
                            ? `<img src="https://flagcdn.com/24x18/${visitor.country_code.toLowerCase()}.png" 
                                 alt="${visitor.country_code}"
                                 style="margin-right: 5px; vertical-align: middle; border: 1px solid #ddd; border-radius: 2px;"> 
                               ${visitor.country_code}`
                            : '<span class="text-muted">Unknown</span>'}
                    </td>
                    <td><code>${visitor.ip_address}</code></td>
                    <td><small class="text-muted">${visitor.page}</small></td>
                    <td>
                        ${parseInt(visitor.fraud_score) >= 75 
                            ? '<span class="badge bg-danger"><i class="fas fa-ban"></i> Blocked</span>'
                            : '<span class="badge bg-success"><i class="fas fa-check"></i> Allowed</span>'}
                    </td>
                `;

                if (row) {
                    row.innerHTML = rowHtml;
                } else {
                    row = document.createElement('tr');
                    row.id = visitorId;
                    row.innerHTML = rowHtml;
                    tableBody.insertBefore(row, tableBody.firstChild);
                }
            }
        });
    </script>
</body>
</html> 