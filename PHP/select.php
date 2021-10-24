<?php
//1.  DB接続します(insertからコピー)
try {
  $pdo = new PDO('mysql:dbname=ellyhosaka_unit1;charset=utf8;host=mysql57.ellyhosaka.sakura.ne.jp','ellyhosaka','Eri-93149314');
  // $pdo = new PDO('mysql:dbname=emolog;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
$status = $stmt->execute();

//３．データ表示
$view="";//HTML文字作成を入れる変数
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    if($res["kimochi"] == "いらいら") {
    // $view .=  "<table class='kekka'><tr><td><img src='img/iraira.png'></td><td style='border-bottom: solid 2px #ffa07a;'>".$res["kimochi"]."</td><td>".$res["naiyou"]."</td><td style='font-size:15px;padding-top:8px;'>".substr($res["indate"],5,5)."</td></tr></table>";
    $view .=  "<table class='kekka'><tr><td><img src='img/iraira.png'></td><td style='border-bottom: solid 2px #f08080;'>".$res["kimochi"]."</td><td>".$res["naiyou"]."</td><td style='font-size:15px;padding-top:8px;'>".substr($res["indate"],5,5)."</td><td><a href='detail.php?id=".$res["id"]."'><i class='fas fa-pencil-alt'></i></a></td><td><a href='delete.php?id=".$res["id"]."'><i class='far fa-trash-alt'></i></td></tr></table>";
    }else if($res["kimochi"] == "かなしい"){
    $view .=  "<table class='kekka'><tr><td><img src='img/kanasii.png'></td><td style='border-bottom: solid 2px #ffa07a;'>".$res["kimochi"]."</td><td>".$res["naiyou"]."</td><td style='font-size:15px;padding-top:8px;'>".substr($res["indate"],5,5)."</td><td><a href='detail.php?id=".$res["id"]."'><i class='fas fa-pencil-alt'></i></a></td><td><a href='delete.php?id=".$res["id"]."'><i class='far fa-trash-alt'></i></td></tr></table>";
    }else if($res["kimochi"] == "まあまあ"){
    $view .=  "<table class='kekka'><tr><td><img src='img/mama.png'></td><td style='border-bottom: solid 2px #ffa500;'>".$res["kimochi"]."</td><td>".$res["naiyou"]."</td><td style='font-size:15px;padding-top:8px;'>".substr($res["indate"],5,5)."</td><td><a href='detail.php?id=".$res["id"]."'><i class='fas fa-pencil-alt'></i></a></td><td><a href='delete.php?id=".$res["id"]."'><i class='far fa-trash-alt'></i></td></tr></table>";
    }else if($res["kimochi"] == "おだやか"){
    $view .=  "<table class='kekka'><tr><td><img src='img/odayaka.png'></td><td style='border-bottom: solid 2px #adff2f;'>".$res["kimochi"]."</td><td>".$res["naiyou"]."</td><td style='font-size:15px;padding-top:8px;'>".substr($res["indate"],5,5)."</td><td><a href='detail.php?id=".$res["id"]."'><i class='fas fa-pencil-alt'></i></a></td><td><a href='delete.php?id=".$res["id"]."'><i class='far fa-trash-alt'></i></td></tr></table>";
    }else if($res["kimochi"] == "うれしい"){
    $view .=  "<table class='kekka'><tr><td><img src='img/uresii.png'></td><td style='border-bottom: solid 2px #00fa9a;'>".$res["kimochi"]."</td><td>".$res["naiyou"]."</td><td style='font-size:15px;padding-top:8px;'>".substr($res["indate"],5,5)."</td><td><a href='detail.php?id=".$res["id"]."'><i class='fas fa-pencil-alt'></i></a></td><td><a href='delete.php?id=".$res["id"]."'><i class='far fa-trash-alt'></i></td></tr></table>";    
    }else if($res["kimochi"] == "わくわく"){
    $view .=  "<table class='kekka'><tr><td><img src='img/wakuwaku.png'></td><td style='border-bottom: solid 2px #00ffff;'>".$res["kimochi"]."</td><td>".$res["naiyou"]."</td><td style='font-size:15px;padding-top:8px;'>".substr($res["indate"],5,5)."</td><td><a href='detail.php?id=".$res["id"]."'><i class='fas fa-pencil-alt'></i></a></td><td><a href='delete.php?id=".$res["id"]."'><i class='far fa-trash-alt'></i></td></tr></table>";    
    }
  }
}

?>

<?php 
$sql = "SELECT * FROM gs_an_table WHERE kimochi = 'いらいら'";
$sth = $pdo -> query($sql);
$count_iraira = $sth -> rowCount();

$sql = "SELECT * FROM gs_an_table WHERE kimochi = 'かなしい'";
$sth = $pdo -> query($sql);
$count_kanasii = $sth -> rowCount();

$sql = "SELECT * FROM gs_an_table WHERE kimochi = 'まあまあ'";
$sth = $pdo -> query($sql);
$count_mama = $sth -> rowCount();

$sql = "SELECT * FROM gs_an_table WHERE kimochi = 'おだやか'";
$sth = $pdo -> query($sql);
$count_odayaka = $sth -> rowCount();

$sql = "SELECT * FROM gs_an_table WHERE kimochi = 'うれしい'";
$sth = $pdo -> query($sql);
$count_uresii = $sth -> rowCount();

$sql = "SELECT * FROM gs_an_table WHERE kimochi = 'わくわく'";
$sth = $pdo -> query($sql);
$count_wakuwaku = $sth -> rowCount();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>キロク</title>
<link href="css/style.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
<!-- <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
  <style>
  body {background-color:gold; margin:auto; text-align:center;}
  .upper_content {display:flex; justify-content:space-around;}
   h1 {margin:1px;}
  .kiroku {padding-left:2rem; flex:1;}
  .kiroku p {margin-top:3px;margin-bottom:15px;}
  .kekka img{width:2rem; }
  .kekka {font-size:20px; align-items: center;}
  .lower_content{padding-top:4rem;}
  .lower_content h1{padding-bottom:2rem;}
  .icon {display:flex; justify-content:space-around;}
  .icon img{width: 5rem; padding-right: 10px;}
  </style>
</head>
<body id="main">
<div class="upper_content">
  
 <div class="kiroku">
   <h1>キモチのキロク</h1>
   <p>-どんなキモチも受け入れよう-</p>
   <?=$view?>
  </div>
 <div style="flex:1;"> 
  <h1>キモチのグラフ</h1>
  
  <div>
</div>　


<div id="chart"></div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.16.0/d3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js"></script>

<script>
var chart = c3.generate({
    data: {
        // iris data from R
        columns: [
            ['いらいら', <?=$count_iraira?>],
            ['かなしい', <?=$count_kanasii?>],
            ['まあまあ', <?=$count_mama?>],
            ['おだやか', <?=$count_odayaka?>],
            ['うれしい', <?=$count_uresii?>],
            ['わくわく', <?=$count_wakuwaku?>],
        ],
        type: 'pie',

        colors: {
            いらいら: '#f08080',
            かなしい: '#ffa07a',
            まあまあ: '#ffa500',
            おだやか: '#adff2f',
            うれしい: '#00fa9a',
            わくわく: '#00ffff',
        },
    }
});
</script>


<div class="lower_content">
  <h1>今日のキモチをクリックしよう</h1>
  <div class="icon">
    <p><a href="http://ellyhosaka.sakura.ne.jp/WebGLbird/"><img src="img/iraira.png" alt=""><br>いらいら</a></p>
    <p><a href="iraira.html"><img src="img/kanasii.png" alt=""><br>かなしい</a></p>
    <p><a href="mama.html"><img src="img/mama.png" alt=""><br>まあまあ</a></p>
    <p><a href="http://ellyhosaka.sakura.ne.jp/WebGL_icemagic/"><img src="img/odayaka.png" alt=""><br>おだやか</a></p>
    <p><a href="http://ellyhosaka.sakura.ne.jp/WebGL_RunGame/"><img src="img/uresii.png" alt=""><br>うれしい</a></p>
    <p><a href="http://ellyhosaka.sakura.ne.jp/webgl_nezumiswim/"><img src="img/wakuwaku.png" alt=""><br>わくわく</a></p>
  </div>
</div>
</body>
</html>
