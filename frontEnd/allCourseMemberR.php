<?php
// 串聯資料庫
include("./layout/connect.php");

$dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

$pdo = new PDO($dsn, $db_user, $db_pass);


// 撈出會員資料和收藏什麼課程
// $sql="SELECT mNumber,mAccount FROM member;";
// $sql="SELECT M.mNumber, M.mAccount,F.fcMember,F.fcCourse FROM cruisecoder.member AS M RIGHT JOIN (SELECT fcMember,fcCourse FROM favorite_c where fcMember='?') AS F on M.mNumber = F.fcMember;
// ";


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

