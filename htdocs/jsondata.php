<!DOCTYPE html>
   <html>
     <head>
     <meta charset='utf-8' />
     <title>Wake UP</title>
     <link rel="stylesheet" href="css/styling.css">
     <center>
<head>
<p><font size="7">あなたの体重データは...</font></p><br>
  </html>

<?php

$access_token = $_GET['token'];

$url = "https://www.healthplanet.jp/status/innerscan.json?" .
  "access_token=" . $access_token .
  "&tag=" . "6021,6023,6024" .    // 6021＝体重（kg）、6022＝体脂肪率（%）、6023＝筋肉量（kg）
  "&date=" . "0" ;                // 0＝登録日付、1＝測定日付
  //"&from=" . "20010101000000" . // 取得開始期間（未指定時は3カ月前＝90日前）
  //"&to=" . date('YmdHis');      // 取得終了期間（未指定時は現時刻）

$options = array(
  "http" => array(
    "method"     => "GET",
    "user_agent" => "PHP Access",
  )
);

$data = @file_get_contents( $url, false, stream_context_create( $options ) );

// https://qiita.com/fantm21/items/603cbabf2e78cb08133e を参照
$json = json_decode($data,true); //JSONデータを連想配列に入れる
 $val1= $json['birth_date'];//
 $val2= $json['height'];//
 $val3= $json['sex'];
 $val4= $json['data'][0]['keydata'];
 $val5= $json['data'][1]['keydata'];
 $val6= $json['data'][2]['keydata'];
 $val7= $json['data'][3]['keydata'];
 $val8= $json['data'][4]['keydata'];
 $val9= $json['data'][5]['keydata'];
 $val10= $json['data'][6]['keydata'];
 $val11= $json['data'][7]['keydata'];
 $val12= $json['data'][8]['keydata'];


//生年月日、身長、性別を表示
 echo "<p><font size=6>生年月日:".$val1."</br>";
 echo "身長:".$val2."</br>";
 echo "性別:".$val3."</font></p></br><br>";
?>


<?php

  echo "<table border=\"1\" width='800' height='300' >";
  echo "<tr align=center>";
  echo "<td><font size='7'>データ名</font></td>";
  echo "<td><font size='7'>データ値 </font></td>";
  echo "</tr>";
  echo "<tr align=center>";
  echo "<td><font size='7'>筋肉量</front></td>";
  echo "<th><font size='7'>".$val5."</font></th>";
  echo "</tr>";
  echo "<tr align=center>";
  echo "<td><font size='7'>筋肉スコア</font></td>";
  echo "<th><font size='7'>".$val6."</font></th>";
  echo "</tr>";
  echo "<tr align=center>";
  echo "</table>";
  echo "<br/>"; 
?>


<form action="menu.php?" method="get">
<button type="submit" name="muscle_mass" value="<?php echo $val5 ?>"><h2>筋トレと食事メニューの表示</h2></button>
<!--<h3><input type="submit" value="筋トレと食事メニューの表示" style="width:400px; height:12000x"></h3>-->
</form>     
</br>
<form action="index.php?" method="get">
<input type="submit" value="戻る" style="width:200px;height:50px; font size =1.8em; font-weight: bold">

<p><font size="5">補足：筋肉量はMAX100,筋肉スコアは-4から+4で表示される</font><p>

</center>
  