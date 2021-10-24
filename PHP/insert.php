<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

$kimochi = $_POST["kimochi"];
$naiyou = $_POST["naiyou"];

//2. DB接続します
try {
  // $pdo = new PDO('mysql:dbname=ellyhosaka_unit1;charset=utf8;host=mysql57.ellyhosaka.sakura.ne.jp','ellyhosaka','Eri-93149314');
  $pdo = new PDO('mysql:dbname=emolog;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}



//３．データ登録SQL作成
$sql = "INSERT INTO gs_an_table(kimochi,naiyou,indate)VALUES(:kimochi,:naiyou,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':kimochi', $kimochi, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //sqlと変数が合体した後なので、ココ実行

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);//配列[2]だけが解るエラーの文字
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");//半角スペースは必須
  exit();
}
?>
