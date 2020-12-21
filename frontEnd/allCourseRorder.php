<?php
// 串聯資料庫
include("./layout/connect.php");





// 課程購買次數
$sqlOrder = "SELECT i.iCourse,count(i.iCourse) as count FROM invoice i JOIN course c ON i.iCourse = c.cNumber where c.cStatus = '2' group by i.iCourse;";
$sqlOrder = $pdo->prepare($sqlOrder);
$sqlOrder->execute();
$data2 = $sqlOrder->fetchAll(PDO::FETCH_ASSOC);





// print_r($data);
//這裡會接到allCourse.js用post方式傳過來star的值
//如果有接到star值，執行下列動作
if (isset($_POST["star"])) {
    echo json_encode($data2);
}
