<?php

$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "";
$db_select = "cruisecoder";

$dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

$pdo = new PDO($dsn, $db_user, $db_pass);


if(isset($_POST["courseNumber"])){
    $sql = "SELECT mName FROM reservation AS r join member AS m on r.reMember = m.mNumber WHERE reTutorial = ?";
    $result = $pdo->prepare($sql);
    $result->bindValue(1,$_POST["courseNumber"]);
    $result->execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
}


else if($_POST["teacherName"] == 'all' && $_POST["courseName"] == 'all'){ //若搜尋所有老師、課程時
    // $sql = "SELECT tDate, cTitle, mName, tStatus, tNumber  FROM tutorial AS t join course AS c on t.tCourse = c.cNumber join member AS m on c.cLecturer = m.mNumber;";
    // $result = $pdo->query($sql);
    // $data = $result->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode($data);
    $sql = "SELECT tDate, cTitle, mName, tStatus, tNumber  FROM tutorial AS t join course AS c on t.tCourse = c.cNumber join member AS m on c.cLecturer = m.mNumber WHERE tDate between ? and ? ";
    $result = $pdo->prepare($sql);
    $result->bindValue(1,$_POST["beforeTime"]);
    $result->bindValue(2,$_POST["afterTime"]);
    $result->execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
}else if($_POST["teacherName"] == 'all' && $_POST["courseName"] != 'all'){ //若搜尋所有老師、指定課程時
    $sql = "SELECT tDate, cTitle, mName, tStatus, tNumber  FROM tutorial AS t join course AS c on t.tCourse = c.cNumber join member AS m on c.cLecturer = m.mNumber WHERE  cTitle = ? and tDate between ? and ? ";
    $result = $pdo->prepare($sql);
    $result->bindValue(1,$_POST["courseName"]);
    $result->bindValue(2,$_POST["beforeTime"]);
    $result->bindValue(3,$_POST["afterTime"]);
    $result->execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
}else if($_POST["teacherName"] != 'all' && $_POST["courseName"] == 'all'){ //若指定老師、所有課程時
    $sql = "SELECT tDate, cTitle, mName, tStatus, tNumber  FROM tutorial AS t join course AS c on t.tCourse = c.cNumber join member AS m on c.cLecturer = m.mNumber WHERE  mName = ? and tDate between ? and ? ";
    $result = $pdo->prepare($sql);
    $result->bindValue(1,$_POST["teacherName"]);
    $result->bindValue(2,$_POST["beforeTime"]);
    $result->bindValue(3,$_POST["afterTime"]);
    $result->execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
}else if($_POST["teacherName"] != 'all' && $_POST["courseName"] != 'all'){ //若指定老師、課程時
    $sql = "SELECT tDate, cTitle, mName, tStatus, tNumber  FROM tutorial AS t join course AS c on t.tCourse = c.cNumber join member AS m on c.cLecturer = m.mNumber WHERE mName = ? and cTitle = ? and tDate between ? and ? ";
    $result = $pdo->prepare($sql);
    $result->bindValue(1,$_POST["teacherName"]);
    $result->bindValue(2,$_POST["courseName"]);
    $result->bindValue(3,$_POST["beforeTime"]);
    $result->bindValue(4,$_POST["afterTime"]);
    $result->execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
}
// print_r($data[0]);





// 取得預約學生名字

// SELECT mName FROM reservation AS r join member AS m on r.reMember = m.mNumber WHERE reTutorial = 't0008'
?>