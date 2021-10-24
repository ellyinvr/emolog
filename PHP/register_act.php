<?php
//1. POSTデータ取得

//POST値
$name = $_POST['name'];
$lid = $_POST["lid"];  //login id
$lpw = $_POST["lpw"];  //login Password

//2. DB接続します
try {
  // $pdo = new PDO('mysql:dbname=ellyhosaka_unit1;charset=utf8;host=mysql57.ellyhosaka.sakura.ne.jp','ellyhosaka','Eri-93149314');
  $pdo = new PDO('mysql:dbname=emolog;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$sql = "INSERT INTO gs_user_table(name,lid,lpw,kanri_flg,life_flg)VALUES(:name,:lid,:lpw,0,0)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //sqlと変数が合体した後なので、ココ実行

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);//配列[2]だけが解るエラーの文字
}else{
  //５．index.phpへリダイレクト
  header("Location: login.php");//半角スペースは必須
  exit();
}
?>
