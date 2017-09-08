<!DOCTYPE html>
<?php
function Currency($from_Currency,$to_Currency,$quantity)
{
    $quantity = urlencode($quantity);
    $from_Currency = urlencode($from_Currency);
    $to_Currency = urlencode($to_Currency);
//    $accessKey = "ec7bf7144999493b311c6be41a2e6649";
//    $endpoint = "convert";
    $url = "https://www.google.com/finance/converter?a=" . $quantity . "&from=" . $from_Currency . "&to=" . $to_Currency;
//    $url = "http://apilayer.net/api/".$endpoint."?access_key=".$accessKey."&from=" . $from_Currency ."&to=". $to_Currency."&amount=". $quantity;
    $ch = curl_init();
    $timeout = 0;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $rawdata = curl_exec($ch);
    curl_close($ch);
    $data = explode('bld>', $rawdata);
     $data = explode($to_Currency , $data[1]);
    return round($data[0], 2);

}


//   echo Currency('CNY','EUR',100);

echo $_POST['quantity']." ".$_POST['from']." "."="." ".Currency($_POST['from'],$_POST['to'],$_POST['quantity'])." ".$_POST['to'];




