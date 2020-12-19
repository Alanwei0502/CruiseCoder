<?php
//MySQL相關資訊
$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "";
$db_select = "cruisecoder";

//建立資料庫連線物件
$dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

//建立PDO物件，並放入指定的相關資料
$pdo = new PDO($dsn, $db_user, $db_pass);

// tNumber, tStatus, cNumber ,cTitle, cLecturer, mName, tDate,
// $sql = "select tDate, cTitle, mName, tStatus, reTutorial from ((course c inner join member m ON cLecturer = mNumber) join tutorial t on c.cLecturer = t.tTeacher) join reservation r on  t.tNumber = r.reTutorial GROUP BY reTutorial";
// $sql = "SELECT tDate, cTitle, mName, tStatus, tNumber , tCourse FROM tutorial AS t join course AS c on t.tCourse = c.cNumber join member AS m on c.cLecturer = m.mNumber;";
$sql = "SELECT tDate, cTitle, mName, tStatus, tNumber, cLecturer, cNumber , countPeople FROM cruisecoder.member AS M JOIN (SELECT cNumber ,cTitle, cLecturer, tNumber, tStatus, tDate, countPeople  FROM cruisecoder.course AS C JOIN (SELECT * FROM cruisecoder.tutorial AS T LEFT JOIN countpeople AS C ON T.tNumber = C.reTutorial) AS T ON C.cNumber = T.tCourse) AS T ON T.cLecturer = M.mNumber";
$result = $pdo->query($sql);
$data = $result->fetchAll(PDO::FETCH_ASSOC);


// echo json_encode($data);
$datacount =  count($data);
$numberArr =[];
$peopelArr = [];
$resArr=[];
for($i = 0; $i < $datacount; $i++){
    array_push($numberArr,$data[$i]['tNumber']);
};


array_push($resArr,$data);

$sql1 = "SELECT * FROM reservation WHERE  reTutorial = ? ";
for($i = 0; $i < $datacount;$i++){
    $result1 = $pdo->prepare($sql1);
    $result1->bindValue(1, $numberArr[$i]);
    $result1->execute();
    $countPeopel = $result1->rowCount();
    array_push($peopelArr,$countPeopel);
};
array_push($resArr,$peopelArr);


$sql2 = "SELECT cTitle FROM `course`";
$result2 = $pdo->query($sql2);
$data1 = $result2->fetchAll(PDO::FETCH_ASSOC);
array_push($resArr,$data1);
$sql3 = "SELECT cNumber FROM `course` ORDER BY `course`.`cNumber` ASC";
// $sql3 = "SELECT cNumber FROM `course`";
$result3 = $pdo->query($sql3);
$data2 = $result3->fetchAll(PDO::FETCH_ASSOC);
array_push($resArr,$data2);


echo json_encode($resArr);



// print_r($peopelArr);

// SELECT * FROM `tutorial` WHERE tDate between '2020-10-10' and '2020-12-31';
// echo json_encode($resArr);

//先取得每一筆資料的[reTutorial] => T0002


// $sql = "select tDate, cInfo, mName, cStatus, reTutorial from ((course c inner join member m ON cLecturer = mNumber) join tutorial t on c.cLecturer = t.tTeacher) join reservation r on  t.tNumber = r.reTutorial";

// $result = $pdo->query($sql);
// $data = $result->fetchAll(PDO::FETCH_ASSOC);

// // print_r($data);
// json_encode($data);


//課輔日期  課程  老師  狀態  預約人數
//狀態改開課、刪除
//課輔日期  `reservation`.`reDate`
//課程 `tutorial`.`tNumber`<-- 課程編號  、 `tStatus`<-- 狀態   course.cTitle<--課程名稱
//老師 `member`.`mNumber`<--老師編號    `mName`<--老師名稱  
// 預約人數 

// select tDate as 課輔日期, cInfo as 課程, mName as 老師, cStatus as 狀態, reTutorial as 預約編號
// from ((
// course c
// inner join member m
// ON cLecturer = mNumber
// )
// join tutorial t
// on c.cLecturer = t.tTeacher)
// join reservation r
// on  t.tNumber = r.reTutorial




// CREATE VIEW countpeople as SELECT reTutorial,count(*) FROM `reservation` GROUP by reTutorial

?>

