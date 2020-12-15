<?php
// 串聯資料庫
include("./layout/connect.php");

// $dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

// $pdo = new PDO($dsn, $db_user, $db_pass);

// 寫入收藏愛心
$sqlFavoriteI = "INSERT INTO favorite_c (fcNumber, fcCourse, fcMember, fcDate) VALUES (DATE_FORMAT(NOW(),'%Y%m%d%H%i%s'), ?, ?, NOW());";

$member = $_POST['theMember'];
$number = $_POST['thecNumber'];

$sqlFavoriteI = $pdo->prepare($sqlFavoriteI);
$sqlFavoriteI->bindValue(1, $number);
$sqlFavoriteI->bindValue(2, $member);
// $sqlFavoriteI->bindValue(1, $_POST['thecNumber']);
// $sqlFavoriteI->bindValue(2, $_POST['theMember']);
$sqlFavoriteI->execute();
// // $data = $sqlAllCourse->fetchAll();
// $data = $sqlFavoriteI->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["heart"])) {
    echo $_POST["thecNumber"];
    echo "/";
    echo $_POST["theMember"];
}

// =====================================

// 撈出收藏愛心
// $sqlFavoriteS="SELECT fcMember,fcCourse FROM favorite_c where fcMember=?;";

// $sqlFavoriteS = $pdo->prepare($sqlFavoriteI);
// $sqlFavoriteS->bindValue(1, $member);
// $sqlFavoriteS->bindValue(2, $number);
// $sqlFavoriteS->execute();

// 刪除
// $sqldel="DELETE from favorite_c where fcMember=? and fcCourse=?;";
// $sqldel = $pdo->prepare($sqldel);
// $sqldel->bindValue(1, $member);
// $sqldel->bindValue(2, $number);
// $sqldel->execute();