<?php
// 串聯資料庫
include("./layout/connect.php");

$CourseID = $_GET["CourseID"];

$sql = "SELECT * FROM course WHERE CourseID = $CourseID ";
// 用$sql變數去接SELECT子句


$result = $pdo->query($sql);
$result->execute();
// 在資料庫執行select語法

$data = $result->fetchAll(PDO::FETCH_ASSOC);
// 把資料封裝成2維陣列

echo json_encode($data);
// echo出json格式的
// echo的資料會傳回js檔的res