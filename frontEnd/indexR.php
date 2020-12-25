<?php

// 串聯資料庫
include("./layout/connect.php");



// 撈出所有課程
$sqlAllCourse = "SELECT C.cNumber, C.cTitle, C.cLecturer, C.cTime, C.cPrice, C.cStatus, C.cType, C.cImage, C.mPhoto, count(R.rNumber) AS rCount, (sum(R.rStar)/count(R.rCourse)) as rRate FROM review AS R RIGHT JOIN (SELECT cNumber, cTitle, cLecturer, cTime, cPrice, cStatus, cType, cImage, M.mPhoto FROM course AS C JOIN `member` AS M ON M.mNumber = C.cLecturer) AS C ON C.cNumber = R.rCourse group by C.cNumber;";

$sqlAllCourse = $pdo->prepare($sqlAllCourse);
$sqlAllCourse->execute();
$data = $sqlAllCourse->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);


?>