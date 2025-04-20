
<?php
/*

 ██▒   █▓ ██▓  ██████   ██████ ▓█████  ██▀███  
▓██░   █▒▓██▒▒██    ▒ ▒██    ▒ ▓█   ▀ ▓██ ▒ ██▒
 ▓██  █▒░▒██▒░ ▓██▄   ░ ▓██▄   ▒███   ▓██ ░▄█ ▒
  ▒██ █░░░██░  ▒   ██▒  ▒   ██▒▒▓█  ▄ ▒██▀▀█▄  
   ▒▀█░  ░██░▒██████▒▒▒██████▒▒░▒████▒░██▓ ▒██▒
   ░ ▐░  ░▓  ▒ ▒▓▒ ▒ ░▒ ▒▓▒ ▒ ░░░ ▒░ ░░ ▒▓ ░▒▓░
   ░ ░░   ▒ ░░ ░▒  ░ ░░ ░▒  ░ ░ ░ ░  ░  ░▒ ░ ▒░
     ░░   ▒ ░░  ░  ░  ░  ░  ░     ░     ░░   ░ 
      ░   ░        ░        ░     ░  ░   ░     
     ░                                         
             https/t.me/Vssrtje/

*/

#Put your Apikey here.
$Apikey = "---482a7e527ad25453386b8de246ca1309";

# 0. Turn off
# 1. Turn on
$BotControl = 1;

# RedirectURL 
# Leave it blank for http_code 404 response
$RedirectURL = "https://www.google.nl";

/* END CONFIGURATION */

if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}
$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = $_SERVER['REMOTE_ADDR'];
        
switch(true){
    case (filter_var($client, FILTER_VALIDATE_IP)):
        $Ip = $client;
        break;
    case(filter_var($forward, FILTER_VALIDATE_IP)):
        $Ip = $forward;
        break;
    default:
        $Ip = $remote;
        break;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://stopbot.net/api/blocker?apikey=".$Apikey."&ip=".$Ip."&ua=".urlencode($_SERVER['HTTP_USER_AGENT'])."&url=".urlencode($_SERVER['REQUEST_URI'])."&".rand(1,1000000));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$response = curl_exec($ch);
switch(true){
    case !$response:
        file_put_contents("stopbot.txt", "[".date("D/m/y H:i:s")."] -> Request Timeout\r\n", FILE_APPEND);
        break;
    default:
        $resp = json_decode($response, true);
        switch($resp['status']){
            case "error":
                file_put_contents("stopbot.txt", "[".date("D/m/y H:i:s")."] -> ".$resp['message']."\r\n", FILE_APPEND);
                break;
            case "success":
                switch(true){
                    case $resp['IPStatus']['BlockAccess'] == 1 && !empty($RedirectURL):
                        header("Location: ".$RedirectURL);
                        die();
                        break;
                    case $resp['IPStatus']['BlockAccess'] == 1 && empty($RedirectURL):
                        http_response_code(404);
                        die();
                        break;
                }
                break;
            default:
                file_put_contents("stopbot.txt", "[".date("D/m/y H:i:s")."] -> Unknown error\r\n", FILE_APPEND);
                break;

        }
        break;
}