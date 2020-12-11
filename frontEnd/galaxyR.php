<?php

// 串聯資料庫
include("./layout/connect.php");


$gStatement = "SELECT * FROM badge WHERE bGalaxy = ?;";

// 使用prepare方法將這個字串進行一個預存產生一個物件
$gStatement = $pdo->prepare($gStatement);

// 綁定參數
if (isset($_POST["name"])) {

    $subject = $_POST["name"];

    $gStatement->bindParam(1, $subject);

    $gStatement->execute();

    $gData = $gStatement->fetchAll(PDO::FETCH_ASSOC);

    // print_r($gData);
    echo json_encode($gData);
}
