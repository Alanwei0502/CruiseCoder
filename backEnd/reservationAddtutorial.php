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

$Emailsql = "SELECT * FROM `tutorial`";

$Count = $pdo->prepare($Emailsql);
$Count->execute();
$all = $Count->rowCount() + 1;
$addNumber = str_pad($all, 4, 0, STR_PAD_LEFT);
$addNumber1 = str_pad($addNumber, 5, "T", STR_PAD_LEFT);

// echo $addNumber1;

$sql = "INSERT INTO `tutorial`(`tNumber`, `tCourse`, `tTeacher`, `tStatus`, `tDate`) VALUES (?,?,?, 1 ,?)";
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $addNumber1);
$statement->bindValue(2, $_POST["CourseName"]);
$statement->bindValue(3, $_POST["CourseTeacher"]);
$statement->bindValue(4, $_POST["date"]);
$statement->execute();

// echo $_POST["CourseName"];
// echo $_POST["CourseTeacher"];
// echo $_POST["date"];



?>