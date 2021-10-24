<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

//最初に読み込む
include("funcs.php");

//1. POSTデータ取得
// $kimochi = $_POST["kimochi"];
$naiyou = $_POST["naiyou"];
$id     = $_POST["id"];  //detail.php POSTされてくるので受信します。


//2. DB接続します

$pdo = db_conn();   //function内の$pdoを受け取る

// try {
//   $pdo = new PDO('mysql:dbname=ellyhosaka_unit1;charset=utf8;host=mysql57.ellyhosaka.sakura.ne.jp','ellyhosaka','Eri-93149314');
//   // $pdo = new PDO('mysql:dbname=emolog;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }

//３．データ登録SQL作成
$sql = "UPDATE gs_an_table SET naiyou=:naiyou WHERE id=:id";
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':kimochi', $kimochi, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);        
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    //*** function化する！*****************
    redirect("select.php");
}


?>


