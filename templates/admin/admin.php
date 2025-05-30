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
    <title>Admin Panel - Visitor Tracking</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .stats {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .stat-card {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 6px;
            text-align: center;
        }

        .visitor-list {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .visitor-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .visitor-item:last-child {
            border-bottom: none;
        }

        .visitor-info {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .visitor-info strong {
            color: #666;
            margin-right: 5px;
        }

        h1 {
            color: #333;
            margin: 0 0 20px 0;
        }

        h2 {
            color: #666;
            margin: 0 0 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Admin Panel</h1>
            <div class="stats">
                <div class="stat-card">
                    <h3>Active Visitors</h3>
                    <div id="visitor-count">0</div>
                </div>
            </div>
        </div>

        <div class="visitor-list">
            <h2>Active Visitors</h2>
            <div id="visitor-list"></div>
        </div>
    </div>

    <script src="/assets/js/admin.js"></script>
</body>
</html> 