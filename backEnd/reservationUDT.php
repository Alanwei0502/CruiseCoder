<?php
//MySQL相關資訊
$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "";
$db_select = "cruisecoder";

//建立資料庫連線物件
$dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

//建立PDO物件，並放入指定的相關資料
$pdo = new PDO($dsn, $db_user, $db_pass);

$sql = "UPDATE `tutorial`  SET tDate = ? , tStatus = ? WHERE tNumber = ? ";
$result = $pdo->prepare($sql);
$result->bindValue(1,$_POST["tDate"]);
$result->bindValue(2,$_POST["tStatus"]);
$result->bindValue(3,$_POST["tNumber"]);
$result->execute();
?>