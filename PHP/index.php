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
  width: 130px;
  height: 40px;
  font-size: 20px;
  font-family: 'M PLUS Rounded 1c', sans-serif;
  background-color: deeppink;
  border:2px solid white;
  color:white;
}

span {color:deeppink;}
  </style>
</head>
<body>

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="conteiner">
    <p>キモチをログする</p>
    <h2>emolog</h2>
    <div class="smile"><img src="img/smile.png" alt=""></div>

<?php
session_start();
$username = $_SESSION['lid'];
$msg = 'こんにちは、<span>' .htmlspecialchars($username, \ENT_QUOTES, 'UTF-8'). '</span>さん';
?>
<h1><?php echo $msg; ?></h1>

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
     <textArea name="naiyou" rows="3" cols="50"></textArea><br>
     <input type="submit" value="キロクする">
    <a href="select.php"><h3>キロクしたページにいく</h3></a>
  </div>
</form>
<!-- Main[End] -->

</body>
</html>
