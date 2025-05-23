<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: /admin/login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Transaction - Admin</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Basic styling - copy from admin-panel/admin-logs if needed */
        body { font-family: 'Arial', sans-serif; background-color: #f8f9fa; }
        .sidebar { position: fixed; top: 0; bottom: 0; left: 0; z-index: 100; padding: 20px 0; box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1); background-color: #fff; width: 220px; }
        .sidebar-sticky { position: relative; top: 0; height: calc(100vh - 40px); padding-top: .5rem; overflow-x: hidden; overflow-y: auto; }
        .logo-container { text-align: center; padding-bottom: 20px; margin-bottom: 20px; border-bottom: 1px solid #eee; }
        .sidebar .nav-link { font-weight: 500; color: #333; padding: 10px 15px; margin: 5px 0; border-radius: 5px; display: flex; align-items: center; }
        .sidebar .nav-link i { margin-right: 10px; width: 20px; text-align: center; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { color: #fff; background-color: #4743c9; }
        .main-content { margin-left: 220px; padding: 20px; }
        .page-header { display: flex; justify-content: space-between; align-items: center; padding-bottom: 10px; border-bottom: 1px solid #e3e6f0; margin-bottom: 30px; }
        .form-container { background-color: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 30px; margin-bottom: 30px; }
        .form-section { margin-bottom: 20px; }
        .form-section h5 { margin-bottom: 15px; color: #4743c9; }
        .flash-messages { margin-bottom: 20px; }
        .alert-success { color: #155724; background-color: #d4edda; border-color: #c3e6cb; }
        .alert-error { color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; }
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
                            <a class="nav-link active" href="/admin/create-transaction">
                                <i class="fas fa-plus-circle"></i> Create Transaction
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/logs">
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
                    <h2>Create New Transaction</h2>
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

                <div class="form-container">
                    <form action="/admin/create-transaction" method="POST" id="createTransactionForm" enctype="multipart/form-data">
                        <div class="form-section">
                            <h5>Transaction Details</h5>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                     <label for="amount" class="form-label">Amount</label>
                                     <input type="number" step="0.01" class="form-control" id="amount" name="amount" required placeholder="e.g., 100.00">
                                </div>
                                <div class="col-md-6">
                                     <label for="payment_method" class="form-label">Payment Method</label>
                                     <select class="form-select" id="payment_method" name="payment_method" required>
                                         <option value="" selected disabled>Select Method</option>
                                         <option value="Credit Card">Credit Card</option>
                                         <option value="Bank Transfer">Bank Transfer</option>
                                         <option value="Cryptocurrency">Cryptocurrency</option>
                                         <option value="Wallet">Wallet</option>
                                     </select>
                                </div>
                            </div>
                             <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="purpose" class="form-label">Purpose of Transaction</label>
                                    <input type="text" class="form-control" id="purpose" name="purpose" placeholder="e.g., Payment for goods">
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5>Receiver Details</h5>
                            <div class="mb-3">
                                <label for="profile_pic" class="form-label">Profile Picture (Optional)</label>
                                <input class="form-control" type="file" id="profile_pic" name="profile_pic" accept=".png, .jpg, .jpeg, .gif">
                                <small class="form-text text-muted">Upload an image for the transaction receipt.</small>
                            </div>

                             <!-- Profile Name -->
                             <div class="mb-3">
                                 <label for="profile_name" class="form-label">Profile Name (Optional)</label>
                                 <input type="text" class="form-control" id="profile_name" name="profile_name" placeholder="Enter profile name (e.g., Company Name)">
                             </div>

                             <!-- Profile Link -->
                             <div class="mb-3">
                                 <label for="profile_link" class="form-label">Profile Link (Optional)</label>
                                 <input type="url" class="form-control" id="profile_link" name="profile_link" placeholder="Enter profile link (e.g., https://example.com)">
                                 <small class="form-text text-muted">Link associated with the profile picture/name.</small>
                             </div>

                            <div class="mb-3">
                                <label for="custom_message" class="form-label">Custom Message (Optional)</label>
                                <textarea class="form-control" id="custom_message" name="custom_message" rows="3" placeholder="Add a personal note or details"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="receiver_mode" class="form-label">Receiver Mode</label>
                                <select class="form-select" id="receiver_mode" name="receiver_mode" required onchange="toggleReceiverFields()">
                                    <option value="" selected disabled>Select Mode</option>
                                    <option value="email">Email</option>
                                    <option value="account">Account</option>
                                    <option value="wallet">Wallet</option>
                                    <option value="bank">Bank</option>
                                </select>
                            </div>

                            <div id="emailFields" style="display: none;">
                                <div class="row mb-3">
                                    <div class="col-md-6"><label for="receiver_email" class="form-label">Receiver Email</label><input type="email" class="form-control" id="receiver_email" name="receiver_email"></div>
                                    <div class="col-md-6"><label for="receiver_name_email" class="form-label">Receiver Name</label><input type="text" class="form-control" id="receiver_name_email" name="receiver_name"></div>
                                </div>
                            </div>
                            <div id="accountFields" style="display: none;">
                                <div class="row mb-3">
                                     <div class="col-md-6"><label for="receiver_account" class="form-label">Receiver Account Info</label><input type="text" class="form-control" id="receiver_account" name="receiver_account" placeholder="e.g., Username, ID"></div>
                                     <div class="col-md-6"><label for="account_name_account" class="form-label">Account Holder Name</label><input type="text" class="form-control" id="account_name_account" name="account_name"></div>
                                </div>
                            </div>
                             <div id="walletFields" style="display: none;">
                                <div class="row mb-3">
                                    <div class="col-md-4"><label for="receiver_wallet" class="form-label">Receiver Wallet Address</label><input type="text" class="form-control" id="receiver_wallet" name="receiver_wallet"></div>
                                    <div class="col-md-4"><label for="wallet_name" class="form-label">Wallet Name/Type</label><input type="text" class="form-control" id="wallet_name" name="wallet_name"></div>
                                    <div class="col-md-4"><label for="receiver_network" class="form-label">Network</label><input type="text" class="form-control" id="receiver_network" name="receiver_network"></div>
                                </div>
                                <div class="mb-3"><label for="receiver_memo" class="form-label">Memo (Optional)</label><input type="text" class="form-control" id="receiver_memo" name="receiver_memo"></div>
                            </div>
                            <div id="bankFields" style="display: none;">
                                <div class="row mb-3">
                                    <div class="col-md-4"><label for="bank_name" class="form-label">Bank Name</label><input type="text" class="form-control" id="bank_name" name="bank_name"></div>
                                    <div class="col-md-4"><label for="account_name_bank" class="form-label">Account Holder Name</label><input type="text" class="form-control" id="account_name_bank" name="account_name"></div>
                                    <div class="col-md-4"><label for="account_number" class="form-label">Account Number</label><input type="text" class="form-control" id="account_number" name="account_number"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5>Custom Receipt Fields (Optional)</h5>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-5">
                                    <label for="custom_title_<?php echo $i; ?>" class="form-label visually-hidden">Custom Title <?php echo $i; ?></label>
                                    <input type="text" class="form-control" id="custom_title_<?php echo $i; ?>" name="custom_title_<?php echo $i; ?>" placeholder="Custom Title <?php echo $i; ?>">
                                </div>
                                <div class="col-md-1 text-center">:</div>
                                <div class="col-md-6">
                                     <label for="custom_value_<?php echo $i; ?>" class="form-label visually-hidden">Custom Value <?php echo $i; ?></label>
                                     <input type="text" class="form-control" id="custom_value_<?php echo $i; ?>" name="custom_value_<?php echo $i; ?>" placeholder="Custom Value <?php echo $i; ?>">
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Create Transaction</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleReceiverFields() {
            const mode = document.getElementById('receiver_mode').value;
            document.getElementById('emailFields').style.display = mode === 'email' ? 'block' : 'none';
            document.getElementById('accountFields').style.display = mode === 'account' ? 'block' : 'none';
            document.getElementById('walletFields').style.display = mode === 'wallet' ? 'block' : 'none';
            document.getElementById('bankFields').style.display = mode === 'bank' ? 'block' : 'none';
        }

        // Initial setup on page load
        document.addEventListener('DOMContentLoaded', toggleReceiverFields);
    </script>
</body>
</html> 