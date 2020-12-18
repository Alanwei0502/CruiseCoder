<?php

// 連資料庫
include("./layout/connect.php");

// 寫好SQL語法
$course = 'SELECT * FROM cruisecoder.course AS C JOIN (SELECT iCourse , mPhoto FROM cruisecoder.invoice AS I JOIN (SELECT * FROM cruisecoder.myorder AS O JOIN (SELECT mNumber, mPhoto FROM cruisecoder.member WHERE mAccount = ?) AS M ON O.oMember = M.mNumber) AS O ON I.iNumber = O.oNumber) AS O ON O.iCourse = C.cNumber';

// 預備SQL語法
$course = $pdo->prepare($course);




// // 綁定參數
if (isset($_POST["account"])) {
    $mAccount = $_POST["account"];

    $course->bindParam(1, $mAccount);

    $course->execute();

    $array = [];

    $array = $course->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($array);
    // echo $mAccount;
    //     $subject = $_POST["name"];

    //     $gStatement->bindParam(1, $subject);

    //     $gStatement->execute();

    //     $gData = $gStatement->fetchAll(PDO::FETCH_ASSOC);

    //     // print_r($gData);
    //     echo json_encode($gData);
}
