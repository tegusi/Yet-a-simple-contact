<?php

$appkey="51a179f1e579592f28000027";
$appsecret="03826ccf0a53e0eabd981f2387d8d6b93023f5455510ea8c4c72f0ee0cd86ddb";
$my_url="http://tegusi.f3322.org/vijos.php";

session_start();

$code =$_REQUEST["code"];
if(empty($code))
{
$getcode="https://vijos.org/api/oauth/authorize?"."client_id=".$appkey."&redirect_uri=".$my_url."&response_type=code";
echo("<script> top.location.href='" . $getcode . "'</script>");
}

$token_url="grant_type=authorization_code&code=" . $code . "&client_id=" .$appkey ."&client_secret=" .$appsecret."&redirect_uri=".$my_url;
$url = 'https://vijos.org/api/oauth/grant';

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $token_url);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec( $ch );
//$response = file_get_contents($token_url);
$params = array();
parse_str($response, $params);
echo($response);
?>
