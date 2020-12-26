<?php

// 串聯資料庫
include("./layout/connect.php");

// 一載入時的渲染
$allStatement = "SELECT * FROM galaxy";

// 選到特定的星系時
$gStatement = "SELECT * FROM badge WHERE bGalaxy = ?;";

// 使用prepare方法將這個字串進行一個預存產生一個物件
$allStatement = $pdo->prepare($allStatement);
$gStatement = $pdo->prepare($gStatement);

// 綁定參數
if (isset($_POST["name"])) {

    $subject = $_POST["name"];

    $gStatement->bindParam(1, $subject);

    $gStatement->execute();

    $gData = $gStatement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($gData);
}


if (isset($_POST["allGalaxy"])) {

    $allStatement->execute();

    $allData = $allStatement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($allData);
}
