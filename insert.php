<?php
//データベース接続設定
$dbServer = '127.0.0.1';
$dbName = 'mydb';
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";
$dbUser = 'test';
$dbPass = 'pass';

//データベースへの接続
$db = new PDO($dsn, $dbUser, $dbPass);
//送信データの取得
$v1 = $_GET['foo'];//手抜き
$v2 = $_GET['bar'];//手抜き

//検索実行（エラーチェックを省略している）
$sql = 'insert into mytable (foo, bar) values (:X, :Y)';
$prepare = $db->prepare($sql);
$prepare->bindValue(':X', $v1, PDO::PARAM_STR);
$prepare->bindValue(':Y', $v2, PDO::PARAM_INT);
$prepare->execute();
?>

<!---結果の確認-->
<a href="all.php">全件表示</a>
