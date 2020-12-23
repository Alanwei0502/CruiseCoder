<?php

// 串聯資料庫
include("./layout/connect.php");

// 找會員ID
$memberID = "SELECT mNumber FROM `member` WHERE mAccount = ?";
$memberID = $pdo->prepare($memberID);

// 找徽章ID
$badgeID = "SELECT bNumber FROM badge WHERE bName = ?";
$badgeID = $pdo->prepare($badgeID);

// 塞入UNLOCK TABLE
$unlockBadge = "INSERT INTO `unlock` (`uNumber`, `uMember`, `uBadge`, `uDate`) VALUES (DATE_FORMAT(NOW(),'%Y%m%d%H%i%s'), ?, ?, NOW());";
$unlockBadge = $pdo->prepare($unlockBadge);

if (isset($_POST["userAccount"], $_POST["badgeField"])) {



    $memberID->bindValue('1', $_POST["userAccount"]);
    $memberID->execute();
    $mID = $memberID->fetch(PDO::FETCH_ASSOC);

    $badgeID->bindValue('1', $_POST["badgeField"]);
    $badgeID->execute();
    $bID = $badgeID->fetch(PDO::FETCH_ASSOC);


    $unlockBadge->bindValue('1', $mID["mNumber"]);
    $unlockBadge->bindValue('2', $bID["bNumber"]);

    $unlockBadge->execute();

    echo  $mID["mNumber"] . "/" . $bID["bNumber"];
}
