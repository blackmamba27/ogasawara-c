<?php


$code = $_GET['code'];


$url = "https://www.healthplanet.jp/oauth/token?" .
  "client_id=" . "1181.2JMsccpUcR.apps.healthplanet.jp" . 
  "&client_secret=" . "1561822101327-eyhJD4KDFmLbeyr29PlnhlFriNiof24kTa7Xa652" .
  "&redirect_uri=" . "https://www.healthplanet.jp/success.html" . // 使わないので仮設定できる値にした
  "code=" .  $code .
  "&grant_type=" . "authorization_code";  // 固定値
$options = array(
  "http" => array(
    "method"     => "POST",
    "user_agent" => "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0; Tablet PC 2.0)",
  )  // User-AgentはInternet Explorer 9を偽装
);

$data = @file_get_contents( $url, false, stream_context_create( $options ) );
echo $data;
?>
<form action="index.php?" method="get">
<input type="submit" value="戻る" style="width:200px;height:50px; font size =1.8em; font-weight: bold">