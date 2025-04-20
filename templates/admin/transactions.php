<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: /admin/login');
    exit();
}

// Get transactions data from session or database
$transactions = $_SESSION['transactions'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions - Admin Panel - Tarnfer</title>
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
                <li>
                    <a href="/admin/dashboard">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li class="active">
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
                        <a href="/admin/create-transaction" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> New Transaction
                        </a>
                    </div>
                </div>
            </nav>

            <main class="container-fluid py-4">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Transactions</h5>
                                <h2 class="text-primary"><?php echo count($transactions); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Completed</h5>
                                <h2 class="text-success">
                                    <?php 
                                    $completed = array_filter($transactions, function($t) { 
                                        return $t['status'] === 'Completed'; 
                                    });
                                    echo count($completed);
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pending</h5>
                                <h2 class="text-warning">
                                    <?php 
                                    $pending = array_filter($transactions, function($t) { 
                                        return $t['status'] === 'Waiting for Receiver Confirmation'; 
                                    });
                                    echo count($pending);
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Declined</h5>
                                <h2 class="text-danger">
                                    <?php 
                                    $declined = array_filter($transactions, function($t) { 
                                        return $t['status'] === 'Declined'; 
                                    });
                                    echo count($declined);
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">All Transactions</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Tracking Number</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (array_reverse($transactions) as $transaction): ?>
                                    <tr>
                                        <td>
                                            <strong><?php echo $transaction['transaction_id']; ?></strong>
                                        </td>
                                        <td><?php echo $transaction['tracking_number']; ?></td>
                                        <td>$<?php echo number_format($transaction['amount'], 2); ?></td>
                                        <td><?php echo $transaction['payment_method']; ?></td>
                                        <td><?php echo date('Y-m-d H:i:s', strtotime($transaction['operation_date'])); ?></td>
                                        <td>
                                            <?php if ($transaction['status'] === 'Completed'): ?>
                                                <span class="badge bg-success"><i class="fas fa-check-circle"></i> Completed</span>
                                            <?php elseif ($transaction['status'] === 'Declined'): ?>
                                                <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Declined</span>
                                            <?php elseif ($transaction['status'] === 'Waiting for Receiver Confirmation'): ?>
                                                <span class="badge bg-warning text-dark"><i class="fas fa-hourglass-half"></i> Pending</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary"><i class="fas fa-spinner"></i> <?php echo $transaction['status']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-info" 
                                                        onclick="viewTransaction('<?php echo $transaction['transaction_id']; ?>')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <?php if ($transaction['status'] === 'Waiting for Receiver Confirmation'): ?>
                                                <button type="button" class="btn btn-sm btn-success" 
                                                        onclick="approveTransaction('<?php echo $transaction['transaction_id']; ?>')">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                        onclick="declineTransaction('<?php echo $transaction['transaction_id']; ?>')">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($transactions)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No transactions found.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script>
        function viewTransaction(transactionId) {
            window.location.href = `/admin/transaction/${transactionId}`;
        }

        function approveTransaction(transactionId) {
            if (confirm('Are you sure you want to approve this transaction?')) {
                fetch(`/admin/transaction/${transactionId}/approve`, {
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
                        alert('Failed to approve transaction: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while approving the transaction');
                });
            }
        }

        function declineTransaction(transactionId) {
            if (confirm('Are you sure you want to decline this transaction?')) {
                fetch(`/admin/transaction/${transactionId}/decline`, {
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
                        alert('Failed to decline transaction: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while declining the transaction');
                });
            }
        }
    </script>
</body>
</html> 