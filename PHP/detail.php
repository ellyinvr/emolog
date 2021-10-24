<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
include("funcs.php");
$pdo = db_conn();

// try {
//   $pdo = new PDO('mysql:dbname=ellyhosaka_unit1;charset=utf8;host=mysql57.ellyhosaka.sakura.ne.jp','ellyhosaka','Eri-93149314');
//   // $pdo = new PDO('mysql:dbname=emolog;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }

//GET受信
$id = $_GET["id"]; //id=**
// $id = 1; //TEST用。これを描かないとエラーになる

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //数値
$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false) {
  sql_error($stmt);
}else{
    $res = $stmt->fetch();  //頭の１行を取得する
//idは一つなので、重複することはない
//   while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){
//     $view .= $r["id"]."|".$r["name"]."|".$r["email"]."<br>";
//   }
}

?>

<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>emolog</title>
  <link href="css/style.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
　<link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
  <style>
  body {background-color:gold; margin:auto; text-align:center;}
  .conteiner h2{margin:5px;font-size:4rem;color:deeppink;}
  .conteiner p {margin:0;font-size:1.2rem;}
  .smile img{width:20%;}
   h1{margin:1rem;}
  .selectbox {
    width:20%;
    margin:1em auto;
  position:relative;
}
select{
  -webkit-appearance:none;
    appearance:none;
  width:100%;
  padding:1em 1em;
  box-sizing:border-box;
  font-size:1em;
  border:#ccc 1px solid;
  border-radius:0;
  background:#fff;
}
.selectbox::after{
  content:"";
  display:block;
  width:10px;
  height:10px;
  position:absolute;
  right:5%;
  top:35%;
  border-bottom:#333 2px solid;
  border-right:#333 2px solid;
  transform:rotate(45deg)translateY(-30%);
}
.color.selectbox select{
  background:blue;
  color:#fff;
  border-radius:2em;
}
.color.selectbox::after{
  border-bottom:#fff 5px solid;
  border-right:#fff 5px solid;
}
input{
  margin-top:10px;
  width: 140px;
  height: 40px;
  font-size: 20px;
  font-family: 'M PLUS Rounded 1c', sans-serif;
  background-color: deeppink;
  border:2px solid white;
  color:white;
}
  </style>
</head>
<body>

<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="conteiner">
    <p>キモチをログする</p>
    <h2>emolog</h2>
    <div class="smile"><img src="img/smile.png" alt=""></div>
    <h1>今日はどんなキモチ？</h1>
    <div class="selectbox">
      <select name= "kimochi">
        <option value = "いらいら">いらいら</option>
        <option value = "かなしい">かなしい</option>
        <option value = "まあまあ">まあまあ</option>
        <option value = "おだやか">おだやか</option>
        <option value = "うれしい">うれしい</option>
        <option value = "わくわく">わくわく</option>
      </select><br>
    </div>
    <h1>今日何をした？</h1>
     <textArea name="naiyou" rows="3" cols="50"><?=$res["naiyou"]?></textArea><br>
     <input type="hidden" name="id" value="<?=$res["id"]?>"> 
     <input type="submit" value="編集をキロク">
    <!-- <a href="select.php"><h3>キロクしたページにいく</h3></a> -->
  </div>
</form>
<!-- Main[End] -->

</body>
</html>
