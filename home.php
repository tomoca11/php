<?php



// bitflyer で取得
$json_str = @file_get_contents("https://api.bitflyer.jp/v1/ticker?product_code=BTC_JPY");
$json = json_decode($json_str);
// var_dump($json);

$bf_ask = number_format($json->best_ask);
$bf_bid = number_format($json->best_bid);


// echo "bitFlyer(ASK)  = ¥" . number_format($json->best_ask) . "\n";
// $json_str = @file_get_contents("https://api.bitflyer.jp/v1/ticker?product_code=BTC_JPY");
// // var_dump($json_str);
// $json = json_decode($json_str);
// echo "bitFlyer(BID)  = ¥" . number_format($json->best_bid) . "\n";



// Zaif で取得
$json_str = @file_get_contents("https://api.zaif.jp/api/1/ticker/btc_jpy");
$json = json_decode($json_str);

$zaif_ask = number_format($json->ask);
$zaif_bid = number_format($json->bid);

// echo "Zaif(ASK)   = ¥" . number_format($json->ask) . "\n";
// echo "Zaif(BID)   = ¥" . number_format($json->bid) . "\n";


// coincheck で取得

// CC_ask
$json_str = @file_get_contents("https://coincheck.com/api/ticker");
$json = json_decode($json_str);

$cc_ask = number_format($json->ask);
$cc_bid = number_format($json->bid);

// echo "coincheck(ASK) = ¥" . number_format($json->ask) . "\n";

// CC_bid
// $json_str = @file_get_contents("https://coincheck.com/api/ticker");
// $json = json_decode($json_str);
// echo "coincheck(BID) = ¥" . number_format($json->bid) . "\n";


// $json_str = @file_get_contents("https://api.bitflyer.jp/v1/getticker");
// $json = json_decode($json_str);
// echo "bf kehai = ¥" . number_format($json->last) . "\n";


//GMO
// $endPoint = 'https://api.coin.z.com/public';
// $path = '/v1/ticker?symbol=BTC';

// $curl = curl_init($endPoint . $path);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($curl);
// curl_close($curl);

// $json_res = json_decode($response);
// echo json_encode($json_res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

// $gmo_ask = ($json_res ->ask);
// $gmo_bid = ($json_res ->data[0]);

// var_dump($gmo_ask);
// var_dump($gmo_bid);

// phpinfo();


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<h1 class="m-5">各取引所の価格</h1>

    <table class="table m-5">
    <thead>
        <tr>
            <td>　　　</td>
            <td>bitFlyer</td>
            <td>CoinCheck</td>
            <td>Zaif</td>
 



        </tr>
    </thead>
    <tbody>
        <tr>
            <td>買価格</td>
            <td><?=$bf_ask ?></td>
            <td><?=$cc_ask ?></td>
            <td><?=$zaif_ask ?></td>


        </tr>
        <tr>
            <td>売価格</td>
            <td><?=$bf_bid ?></td>
            <td><?=$cc_bid ?></td>
            <td><?=$zaif_bid ?></td>


        </tr>
    </tbody>
    </table>

        


    <!-- <a href="">資産の追加・引き出し</a> -->

    
</body>
</html>