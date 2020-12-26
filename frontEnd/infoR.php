<?php

// 連資料庫
include("./layout/connect.php");

// 抓到會員編號
$getMemberID = "SELECT mNumber FROM member WHERE mAccount = ?";
$getMemberID = $pdo->prepare($getMemberID);

// 抓會員資料
$getMemberInfo = "SELECT * FROM member WHERE mAccount = ?";
$getMemberInfo = $pdo->prepare($getMemberInfo);

// 會員擁有的課程
$getMemberCourse = "SELECT MC.*, IC.people FROM (SELECT MC.*, ALLC.rCount, ALLC.rRate FROM (SELECT C.*, mPhoto FROM member AS M JOIN (SELECT C.* FROM course AS C JOIN (SELECT * FROM invoice AS I JOIN (SELECT * FROM myorder WHERE oMember = ?) AS O ON I.iNumber = O.oNumber) AS MB ON C.cNumber = MB.iCourse) AS C ON M.mNumber = C.cLecturer) AS MC JOIN (SELECT C.cNumber, C.cTitle, C.cLecturer, C.cTime, C.cPrice, C.cStatus, C.cType, C.cImage, C.mPhoto, count(R.rNumber) AS rCount, (sum(R.rStar)/count(R.rCourse)) as rRate FROM review AS R RIGHT JOIN (SELECT cNumber, cTitle, cLecturer, cTime, cPrice, cStatus, cType, cImage, M.mPhoto FROM course AS C JOIN `member` AS M ON M.mNumber = C.cLecturer) AS C ON C.cNumber = R.rCourse group by C.cNumber) AS ALLC ON MC.cNumber = ALLC.cNumber) AS MC JOIN (SELECT iCourse, count(iCourse) AS people FROM invoice GROUP BY iCourse) AS IC ON MC.cNumber = IC.iCourse";
$getMemberCourse = $pdo->prepare($getMemberCourse);

// 會員蒐藏的課程
$getMemberFC2 = "SELECT * FROM (SELECT * FROM (SELECT 	* FROM (SELECT FC.*, M.mPhoto FROM member AS M JOIN (SELECT C.* FROM course AS C JOIN (SELECT * FROM favorite_c WHERE fcMember = ?) AS FC ON FC.fcCourse = C.cNumber) AS FC ON M.mNumber = FC.cLecturer) AS C LEFT JOIN (SELECT rCourse, COUNT(rCourse) AS reviewNum, AVG(rStar) AS reviewScore FROM cruisecoder.review GROUP BY rCourse) AS R ON C.cNumber = R.rCourse) AS C LEFT JOIN (SELECT iCourse, count(iCourse) AS buyNum FROM invoice GROUP BY iCourse) AS I ON  C.cNumber = I.iCourse) AS C LEFT JOIN (SELECT * FROM cruisecoder.fundraising) AS F ON  C.cNumber = fCourse;";
$getMemberFC2 = $pdo->prepare($getMemberFC2);

// 會員蒐藏的文章
$getMemberFA = "SELECT A.* FROM article AS A JOIN (SELECT * FROM favorite_a WHERE faMember = ?) AS FA ON FA.faArticle = A.aNumber";
$getMemberFA = $pdo->prepare($getMemberFA);

// 會員獲得的徽章
$getMemberBadge = "SELECT uBadge FROM `unlock` WHERE uMember = ?";
$getMemberBadge = $pdo->prepare($getMemberBadge);

// 所有徽章
$allBadge = "SELECT bGalaxy, bNumber, bName, bBadge, bLevel FROM badge";
$allBadge = $pdo->prepare($allBadge);

// 所有星系
$allGalaxy = "SELECT gName FROM cruisecoder.galaxy";
$allGalaxy = $pdo->prepare($allGalaxy);
$allGalaxy->execute();
$allG = $allGalaxy->fetchAll(PDO::FETCH_ASSOC);


// // 綁定參數
if (isset($_POST["account"])) {

    // 綁會員ID
    $getMemberID->bindValue(1, $_POST["account"]);
    $getMemberID->execute();
    $mID = $getMemberID->fetch(PDO::FETCH_ASSOC);
    // 此為會員編碼
    // echo $mID["mNumber"];

    // 抓會員資料
    $getMemberInfo->bindValue(1, $_POST["account"]);
    $getMemberInfo->execute();
    $mInfo = $getMemberInfo->fetch(PDO::FETCH_ASSOC);

    // 抓會員購買課程
    $getMemberCourse->bindValue(1, $mID["mNumber"]);
    $getMemberCourse->execute();
    $mCourse = $getMemberCourse->fetchAll(PDO::FETCH_ASSOC);

    // 抓會員蒐藏課程
    $getMemberFC2->bindValue(1, $mID["mNumber"]);
    $getMemberFC2->execute();
    $mFavoriteC2 = $getMemberFC2->fetchAll(PDO::FETCH_ASSOC);

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
    array_push($memberInfo, $mCourse, $mFavoriteA, $mBadge, $allBadges, $mID, $allG, $mInfo, $mFavoriteC2);
    echo json_encode($memberInfo);
}
