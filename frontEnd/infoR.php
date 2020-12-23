<?php

// 連資料庫
include("./layout/connect.php");

// 抓到會員編號
$getMemberID = "SELECT mNumber FROM member WHERE mAccount = ?";
$getMemberID = $pdo->prepare($getMemberID);

// 會員擁有的課程
$getMemberCourse = "SELECT MC.*, ALLC.rCount, ALLC.rRate FROM (SELECT C.*, mPhoto FROM member AS M JOIN (SELECT C.* FROM course AS C JOIN (SELECT * FROM invoice AS I JOIN (SELECT * FROM myorder WHERE oMember = ?) AS O ON I.iNumber = O.oNumber) AS MB ON C.cNumber = MB.iCourse) AS C ON M.mNumber = C.cLecturer) AS MC JOIN (SELECT C.cNumber, C.cTitle, C.cLecturer, C.cTime, C.cPrice, C.cStatus, C.cType, C.cImage, C.mPhoto, count(R.rNumber) AS rCount, (sum(R.rStar)/count(R.rCourse)) as rRate FROM review AS R RIGHT JOIN (SELECT cNumber, cTitle, cLecturer, cTime, cPrice, cStatus, cType, cImage, M.mPhoto FROM course AS C JOIN `member` AS M ON M.mNumber = C.cLecturer) AS C ON C.cNumber = R.rCourse group by C.cNumber) AS ALLC ON MC.cNumber = ALLC.cNumber";
$getMemberCourse = $pdo->prepare($getMemberCourse);

// 會員蒐藏的課程
$getMemberFC = "SELECT MFC.*, ALLC.rCount, ALLC.rRate FROM (SELECT FC.*, M.mPhoto FROM member AS M JOIN (SELECT C.* FROM course AS C JOIN (SELECT * FROM favorite_c WHERE fcMember = ?) AS FC ON FC.fcCourse = C.cNumber) AS FC ON M.mNumber = FC.cLecturer) AS MFC JOIN (SELECT C.cNumber, C.cTitle, C.cLecturer, C.cTime, C.cPrice, C.cStatus, C.cType, C.cImage, C.mPhoto, count(R.rNumber) AS rCount, (sum(R.rStar)/count(R.rCourse)) as rRate FROM review AS R RIGHT JOIN (SELECT cNumber, cTitle, cLecturer, cTime, cPrice, cStatus, cType, cImage, M.mPhoto FROM course AS C JOIN `member` AS M ON M.mNumber = C.cLecturer) AS C ON C.cNumber = R.rCourse group by C.cNumber) AS ALLC ON MFC.cNumber = ALLC.cNumber";
$getMemberFC = $pdo->prepare($getMemberFC);

// 會員蒐藏的文章
$getMemberFA = "SELECT A.* FROM article AS A JOIN (SELECT * FROM favorite_a WHERE faMember = ?) AS FA ON FA.faArticle = A.aNumber";
$getMemberFA = $pdo->prepare($getMemberFA);

// 會員獲得的徽章
$getMemberBadge = "SELECT uBadge FROM `unlock` WHERE uMember = ?";
$getMemberBadge = $pdo->prepare($getMemberBadge);

// 所有徽章
$allBadge = "SELECT bGalaxy, bNumber, bName, bBadge, bLevel FROM badge";
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
