<?php


include("funcs.php");

$id = $_GET["id"];


//2. DB接続します
//*** function化する！  *****************

$pdo = db_conn();   //function内の$pdoを受け取る


// try {
//   $pdo = new PDO('mysql:dbname=ellyhosaka_unit1;charset=utf8;host=mysql57.ellyhosaka.sakura.ne.jp','ellyhosaka','Eri-93149314');
//   // $pdo = new PDO('mysql:dbname=emolog;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }


//３．データ登録SQL作成
$sql = "DELETE FROM gs_an_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);        
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("select.php");
}


?>


