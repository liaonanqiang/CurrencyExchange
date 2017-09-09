<!DOCTYPE html>
<?php
function Currency($from_Currency,$to_Currency,$quantity)
{
    $quantity = urlencode($quantity);
    $from_Currency = urlencode($from_Currency);
    $to_Currency = urlencode($to_Currency);
    $url = "https://www.google.com/finance/converter?a=" . $quantity . "&from=" . $from_Currency . "&to=" . $to_Currency;
    $ch = curl_init();
    $timeout = 0;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $rawdata = curl_exec($ch);
    curl_close($ch);
    $data = explode('bld>', $rawdata);
    $data = explode($to_Currency, $data[1]);
    return round($data[0], 2);

}
     $redis = new Redis();
     $redis->connect('127.0.0.1', 6379);
     $redis->set("fromCurrency", $_POST['from']);
     $redis->set("toCurrency", $_POST['to']);
     $redis->set("sQuantity", $_POST['quantity']);

     $first = $redis->get('fromCurrency');
     $second = $redis->get('toCurrency');
     $amount = $redis->get('sQuantity');

     echo $amount." ".$first." "."="." ".Currency($first,$second,$amount)." ".$second;





