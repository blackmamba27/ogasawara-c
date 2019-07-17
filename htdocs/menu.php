<!DOCTYPE html>
   <html>

  <meta charset='utf-8' />
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Wake UP</title>

<?php
// データベース接続設定
$dbServer = '127.0.0.1';

$dbName = $_SERVER['MYSQL_DB'];

$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";

$dbUser = $_SERVER['MYSQL_USER'];

$dbPass = $_SERVER['MYSQL_PASSWORD'];
// データベースへの接続
$db = new PDO($dsn, $dbUser, $dbPass);

$sql = 'select * from trainings';
$prepare = $db->prepare($sql);
$prepare->execute();
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

// 筋肉量を取得
$muscle_mass = $_GET['muscle_mass'];

// トレーニングのメニューを作成する
$i = 0;
foreach ($result as $r) {
    $training[$i][0] = $r['トレーニング名'];
    $training[$i][1] = $r['説明'];
    $training[$i][2] = $r['部位'];
    $training[$i][3] = round(((int)$r['上限'] * (1 - ($muscle_mass / 100))));
    ++$i;
}
$counter = $i;
?>

<div style="margin-left:225px;">
<table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
    <tr>
    <th bgcolor="#FFFFFF" font color="#000000">メニュー</font></th>
    <th bgcolor="#FFFFFF" width="150"><font color="#000000">説明</font></th>
    <th bgcolor="#FFFFFF" width="200"><font color="#000000">部位</font></th>
    <th bgcolor="#FFFFFF" width="210"><font color="#000000">回数</font></th>
    </tr>

    <?php
    for ($i = 0 ; $i < $counter ; ++$i) {
        echo "<tr>";
        echo "<td align=\"center\"bgcolor=\"#FFFFFF\" align=\"right\" nowrap>".$training[$i][0]."</td>";
        echo "<td bgcolor=\"#FFFFFF\" valign=\"top\" width=\"300\">".$training[$i][1]."</td>";
        echo "<td align=\"center\" bgcolor=\"#FFFFFF\" valign=\"top\" width=\"200\">".$training[$i][2]."</td>";
        echo "<td align=\"center\" bgcolor=\"#FFFFFF\" valign=\"top\" width=\"200\">".$training[$i][3]."</td>";
        echo "</tr>";
    }
    ?>
    </table>
</div>

<div style="margin-left:150px;">
  <h2>食事メニュー</h2>

    <h4>１食目　卵かけご飯１杯、わかめと豆腐の味噌汁、<a href="https://cookpad.com/recipe/5740946">鳥胸肉のから揚げ</a>、<a href="https://cookpad.com/recipe/5745527">ポテトサラダ</a><h4>

    <h4>２食目　<a href="https://shop.dnszone.jp/item-%E3%83%97%E3%83%AD%E3%83%86%E3%82%A4%E3%83%B3%E3%83%9B%E3%82%A8%E3%82%A4100/4573290283546.html?utm_source=dnszone&utm_medium=dnsz&utm_campaign=lineup_whey100">プロテイン１杯(おすすめ）</a>、バナナ１本</h4>

    <h4>３食目　ご飯1.5杯、豚ロースの生姜焼き、<a href="https://cookpad.com/recipe/5348472">ササミと大葉のはさみ揚げ</a>、<a href="https://cookpad.com/recipe/5472061">ゴボウとレンコンのサラダ</a></h4>

    <h4>４食目　ヨーグルト、リンゴ</h4>

    <h4>５食目　玄米ご飯1.5杯、<a href="https://cookpad.com/recipe/5707897">サバの塩焼き</a>、野菜ジュース、<a href="https://cookpad.com/recipe/3536135">水餃子の中華スープ</a>、卵焼き</h4>

    <h4>６食目　プロテイン１杯、<a href="https://cookpad.com/recipe/4730261">ほぐしチキンと卵のお粥</a></h4><br>

</html>


