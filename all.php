<?php
//データベース接続設定
$dbServer = '127.0.0.1';
$dbName = 'mydb';
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";
$dbUser = 'test';
$dbPass = 'pass';

//データベースへの接続
$db = new PDO($dsn, $dbUser, $dbPass);
//検索実行
$sql = 'select * from mytable';
$prepare = $db->prepare($sql);
$prepare->execute();
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

//結果の出力
foreach ($result as $r) {
  echo $r['id'].' '.$r['foo'].' ',$r['bar'];//手抜き
  echo "<br/>";
}
?>