<?php
include("../frontEnd/layout/connect.php");

$sql = "SELECT tDate, cTitle, mName, tStatus, tNumber, cLecturer, cNumber , countPeople FROM member AS M JOIN (SELECT cNumber ,cTitle, cLecturer, tNumber, tStatus, tDate, countPeople  FROM course AS C JOIN (SELECT * FROM tutorial AS T LEFT JOIN countpeople AS C ON T.tNumber = C.reTutorial) AS T ON C.cNumber = T.tCourse) AS T ON T.cLecturer = M.mNumber";
$result = $pdo->query($sql);
$data = $result->fetchAll(PDO::FETCH_ASSOC);


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
$result3 = $pdo->query($sql3);
$data2 = $result3->fetchAll(PDO::FETCH_ASSOC);
array_push($resArr,$data2);


echo json_encode($resArr);


?>