<?php

// 連資料庫
include("./layout/connect.php");

// 抓到會員編號
$getMemberID = "SELECT mNumber FROM cruisecoder.`member` WHERE mAccount = ?";
$getMemberID = $pdo->prepare($getMemberID);

// 會員擁有的課程
$getMemberCourse = "SELECT C.*, mPhoto FROM cruisecoder.`member` AS M JOIN (SELECT C.* FROM cruisecoder.course AS C JOIN (SELECT * FROM cruisecoder.invoice AS I JOIN (SELECT * FROM cruisecoder.myorder WHERE oMember = ?) AS O ON I.iNumber = O.oNumber) AS MB ON C.cNumber = MB.iCourse) AS C ON M.mNumber = C.cLecturer";
$getMemberCourse = $pdo->prepare($getMemberCourse);

// 會員蒐藏的課程
$getMemberFC = "SELECT FC.*, M.mPhoto FROM cruisecoder.`member` AS M JOIN (SELECT C.* FROM cruisecoder.course AS C JOIN (SELECT * FROM cruisecoder.favorite_c WHERE fcMember = ?) AS FC ON FC.fcCourse = C.cNumber) AS FC ON M.mNumber = FC.cLecturer";
$getMemberFC = $pdo->prepare($getMemberFC);

// 會員蒐藏的文章
$getMemberFA = "SELECT A.* FROM cruisecoder.article AS A JOIN (SELECT * FROM cruisecoder.favorite_a WHERE faMember = ?) AS FA ON FA.faArticle = A.aNumber";
$getMemberFA = $pdo->prepare($getMemberFA);

// 會員獲得的徽章
$getMemberBadge = "SELECT uBadge FROM cruisecoder.unlock WHERE uMember = ?";
$getMemberBadge = $pdo->prepare($getMemberBadge);

// 所有徽章
$allBadge = "SELECT bGalaxy, bNumber, bName, bBadge, bLevel FROM cruisecoder.badge";
$allBadge = $pdo->prepare($allBadge);


// // 綁定參數
if (isset($_POST["account"])) {

    // 綁會員ID
    $getMemberID->bindValue(1, $_POST["account"]);
    $getMemberID->execute();
    $mID = $getMemberID->fetch(PDO::FETCH_ASSOC);
    // 此為會員編碼
    // echo $mID["mNumber"];

    // 抓會員購買課程
    $getMemberCourse->bindValue(1, $mID["mNumber"]);
    $getMemberCourse->execute();
    $mCourse = $getMemberCourse->fetchAll(PDO::FETCH_ASSOC);

    // 抓會員蒐藏課程
    $getMemberFC->bindValue(1, $mID["mNumber"]);
    $getMemberFC->execute();
    $mFavoriteC = $getMemberFC->fetchAll(PDO::FETCH_ASSOC);

    // 抓會員蒐藏文章
    $getMemberFA->bindValue(1, $mID["mNumber"]);
    $getMemberFA->execute();
    $mFavoriteA = $getMemberFA->fetchAll(PDO::FETCH_ASSOC);

    // 抓會員獲得徽章
    $getMemberBadge->bindValue(1, $mID["mNumber"]);
    $getMemberBadge->execute();
    $mBadge = $getMemberBadge->fetchAll(PDO::FETCH_ASSOC);

    // 抓出所有徽章
    $allBadge->execute();
    $allBadges = $allBadge->fetchAll(PDO::FETCH_ASSOC);

    // 傳回值
    $memberInfo = [];
    array_push($memberInfo, $mCourse, $mFavoriteC, $mFavoriteA, $mBadge, $allBadges, $mID);
    echo json_encode($memberInfo);
}
