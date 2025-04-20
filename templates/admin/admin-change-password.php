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
    <title>Change Password - Admin</title>
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
        .form-container { background-color: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 30px; margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto; }
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
                            <a class="nav-link active" href="/admin/change-password">
                                <i class="fas fa-key"></i> Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/create-transaction">
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
                    <h2>Change Admin Password</h2>
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
                     <form action="/admin/change-password" method="POST">
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required minlength="8">
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required minlength="8">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update Password</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html> 