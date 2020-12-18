<?php
// 串聯資料庫
include("./layout/connect.php");


// 找是哪個會員
$sqlmember="SELECT mNumber FROM member where mAccount=?;";

$member = $_POST['userAccount'];


$sqlmember = $pdo->prepare($sqlmember);
$sqlmember->bindValue(1, $member);
$sqlmember->execute();
// $data = $sqlAllCourse->fetchAll();
$data = $sqlmember->fetchAll(PDO::FETCH_ASSOC);



// print_r($data);
//這裡會接到allCourse.js用post方式傳過來star的值
//如果有接到star值，執行下列動作
if (isset($_POST["member"])) {
    echo json_encode($data);
}

