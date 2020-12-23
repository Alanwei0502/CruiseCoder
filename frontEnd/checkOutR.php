<?php
// 串聯資料庫
include("./layout/connect.php");

$sql = "SELECT * FROM course where cNumber = ";
// 用$sql變數去接SELECT子句

$qq = $_POST['Name'];
// 用$qq變數去接Name的值，Name是陣列，陣列list的值
// print_r($qq);

foreach ($qq as $index => $row) {
    if ($index == 0) {
        $sql = $sql . "'" . $row . "'" . " ";
    } else {
        $sql = $sql . "or `cNumber` =" . "'" . $row . "'" . " ";
    }
}
// echo $sql;


$result = $pdo->query($sql);
$result->execute();
// 在資料庫執行select語法

$data = $result->fetchAll(PDO::FETCH_ASSOC);
// 把資料封裝成2維陣列

echo json_encode($data);
// echo出json格式的
// echo的資料會傳回js檔的res