<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<title>Wake UP</title>
<link rel="stylesheet" href="css/style.css">
</head>

<center>
<body>
 <div class="wrapper">
<p><font size="7">Wake UP</font></p>

<p><font size="6">理想的な体型へ～<br>
                  タニタヘルススプラネットのAPIを利用した<br>
                  筋トレ&食事提案システム</font></p><br><br>
   

   <A href="https://www.healthplanet.jp/oauth/auth?client_id=1181.2JMsccpUcR.apps.healthplanet.jp&redirect_uri=http://ogasawarac.pm-chiba.tech/&scope=innerscan,pedometer&response_type=code
"><font size="5">1:コードを取得</font></A><br><br><br>



     <form action='token.php' method='get'>
    

    <p><font size='5'>2:トークンを取得</font></p>
    <input type='text' name='code' size=60' ><br><br>
    <input type='submit' value='表示' style="width:120px; height:40px; "/>

    </form>




    <form action='jsondata.php' method='get'>
    

      <p><font size='5'>3:アクセストークンを入力</font></p>
      <input type='text' name='token' size=60' ><br><br>
      <input type='submit' value='表示' style="width:120px; height:40px; "/>


<center> 
    </form>
</body>

</html>


