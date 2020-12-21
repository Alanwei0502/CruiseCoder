<?php

// 串聯資料庫
include("./layout/connect.php");

$unlockBadge = "INSERT INTO `cruisecoder`.`unlock` (`uNumber`, `uMember`, `uBadge`, `uDate`) VALUES (DATE_FORMAT(NOW(),'%Y%m%d%H%i%s'), ?, ?, NOW());";
$unlockBadge = $pdo->prepare($unlockBadge);

if (isset($_POST["userAccount"], $_POST["url"])) {

    echo  $_POST["url"];
}


// if (isset($_POST["allGalaxy"])) {

//     $allStatement->execute();

//     $allData = $allStatement->fetchAll(PDO::FETCH_ASSOC);

//     // print_r($gData);
//     echo json_encode($allData);
// }
