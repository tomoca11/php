<?php
// API doc : https://coincheck.com/ja/documents/exchange/api#account-balance
// API url : https://coincheck.com/api/accounts/balance

// Please set ACCESS_KEY and SECRET_ACCESS_KEY
$ACCESS_KEY = "";
$SECRET_ACCESS_KEY = "";

// proxy settings
$proxy      = ""; 
$proxy_port = ""; 

// coincheck balance api url
$url = "https://coincheck.com/api/accounts/balance";

// create signature
$timestamp = time();
$message = $timestamp . $url;
$signature = hash_hmac("sha256", $message, $SECRET_ACCESS_KEY);
// header
$headers = array(
    "ACCESS-KEY: {$ACCESS_KEY}",
    "ACCESS-SIGNATURE: {$signature}",
    "ACCESS-NONCE: {$timestamp}",
    );

$curl = curl_init();
if ($curl == FALSE) {
    fputs(STDERR, "[ERR] curl_init(): " . curl_error($curl) . PHP_EOL);
    die(1);
}
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
// set proxy server settings
// if (!empty($proxy) && !empty($proxy_port)) {
//     curl_setopt($curl, CURLOPT_HTTPPROXYTUNNEL, 1); 
//     curl_setopt($curl, CURLOPT_PROXY, $proxy . ":" . $proxy_port);
//     curl_setopt($curl, CURLOPT_PROXYPORT, $proxy_port);
// }

$response = curl_exec($curl);
if ($response == FALSE) {
    fputs(STDERR, "[ERR] curl_exec(): " . curl_error($curl) . PHP_EOL);
    die(1);
}
curl_close($curl);

// json decode
$json_decode = json_decode($response, true);
if ($json_decode == NULL) {
    fputs(STDERR, "[ERR] json_decode(): " . json_last_error_msg() . PHP_EOL);
    die(1);
}
// output json_decode
//print_r($json_decode);
// if (!$json_decode["success"]) {
//     fputs(STDERR,"[ERROR] : " . $json_decode["error"] . PHP_EOL);
//     die(1);
// }
printf("JPY: %f" . PHP_EOL, $json_decode["jpy"]);
printf("BTC: %f" . PHP_EOL, $json_decode["btc"]);

exit(0);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>残高一覧</title>

    
</head>
<body>
    
</body>
</html>