<?php
//MySQL相關資訊
$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "";
$db_select = "CruiseCoder";

//建立資料庫連線物件
$dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

//建立PDO物件，並放入指定的相關資料
$pdo = new PDO($dsn, $db_user, $db_pass);


//課輔日期  課程  老師  狀態  預約人數
//狀態改開課、刪除
//課輔日期  `reservation`.`reDate`
//課程 `tutorial`.`tNumber`<-- 課程編號  、 `tStatus`<-- 狀態   course.cTitle<--課程名稱
//老師 `member`.`mNumber`<--老師編號    `mName`<--老師名稱  
// 預約人數 

// select tDate , cInfo , mName , cStatus
// from ((
// course c
// inner join member m
// ON cLecturer = mNumber
// )
// join tutorial t
// on c.cLecturer = t.tTeacher)
// join reservation r
// on  t.tNumber = r.reTutorial


?>

