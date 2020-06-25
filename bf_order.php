<?php
$key = '4LxjJK4M8QAuPnRZSQr1VG'; $secret = 'M1Um9PlyAzi8b6TiV0s9GomlvKQfRbINxECe8P7eP9o=';

// 買い注文

$base_url = 'https://api.bitflyer.jp';
$version = '/v1/';
$order_buy = 'me/sendchildorder';
$url = $base_url . $version . $order_buy;

// 注文内容

$body = json_encode(array( 'product_code' => 'BTC_JPY',
        'child_order_type' => 'MARKET',
        'side' => 'BUY',
        // 'price' => 300000,
        'size' => 0.01,
));

$timestamp = time() . substr(microtime(), 2, 3);
$method = 'POST';
$text = $timestamp . $method . $version . $order_buy . $body;
$sign = hash_hmac('sha256', $text, $secret);

$header = array(
        'ACCESS-KEY:' . $key,
        'ACCESS-TIMESTAMP:' . $timestamp,
        'ACCESS-SIGN:' . $sign,
        'Content-Type:application/json',
        'Content-Length:'. strlen($body),
);

$context = stream_context_create(array(
        'http' => array(
                'method' => $method,
                'header' => implode(PHP_EOL, $header),
                'content' => $body,
        )
));

// var_dump($text);

// API呼び出し

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
$json = curl_exec($ch);
curl_close($ch);

// $response = file_get_contents($url, false, $context);

//ここでエラーが出る

$result = json_decode($json, true);
var_dump($json);
print_r($result);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>実行完了？</h2>
    
</body>
</html>