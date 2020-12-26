<?php
// 連結資料庫
include("../frontEnd/layout/connect.php");

// 一載入時的渲染
$AllGalStatement = "SELECT gName FROM galaxy";
$AllGalStatement = $pdo->prepare($AllGalStatement);
$AllGalStatement->execute();

// 搜尋領域
$GalStatement = "SELECT * FROM galaxy WHERE gName like ?";
$GalStatement = $pdo->prepare($GalStatement);

// 計算quiz table的資料比數
$TotalNum = "SELECT COUNT(*) AS num FROM quiz";
$TotalNum = $pdo->prepare($TotalNum);
$TotalNum->execute();


if (isset($_POST["selectField"])) {

    $selectField = $_POST["selectField"];

    $GalStatement->bindValue(1, $selectField);

    $GalStatement->execute();

    $data = [];

    array_push($data, $AllGalStatement->fetchAll(PDO::FETCH_ASSOC), $GalStatement->fetchAll(PDO::FETCH_ASSOC), $TotalNum->fetch(PDO::FETCH_ASSOC));
    echo json_encode($data);
}
