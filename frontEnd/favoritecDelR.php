<?php
// 串聯資料庫
include("./layout/connect.php");

// $dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

// $pdo = new PDO($dsn, $db_user, $db_pass);


// 刪除
$sqldel = "DELETE from favorite_c where fcMember=? and fcCourse=?;";

$member = $_POST['theMember'];
$number = $_POST['thecNumber'];

$sqldel = $pdo->prepare($sqldel);
$sqldel->bindValue(1, $member);
$sqldel->bindValue(2, $number);
$sqldel->execute();


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

