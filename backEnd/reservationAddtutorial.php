<?php
include("../frontEnd/layout/connect.php");

$Emailsql = "SELECT * FROM `tutorial`";

$Count = $pdo->prepare($Emailsql);
$Count->execute();
$all = $Count->rowCount() + 1;
$addNumber = str_pad($all, 4, 0, STR_PAD_LEFT);
$addNumber1 = str_pad($addNumber, 5, "T", STR_PAD_LEFT);



$sql1 = "SELECT * FROM `tutorial` WHERE `tDate` = ?";
$statement1 = $pdo->prepare($sql1);
$statement1->bindValue(1, $_POST["date"]);
$statement1->execute();
$checkDate = $statement1->rowCount();
if($checkDate == 1){
    echo 'hastutorial';
}else{
    $sql = "INSERT INTO `tutorial`(`tNumber`, `tCourse`, `tTeacher`, `tStatus`, `tDate`) VALUES (?,?,?, 1 ,?)";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $addNumber1);
    $statement->bindValue(2, $_POST["CourseName"]);
    $statement->bindValue(3, $_POST["CourseTeacher"]);
    $statement->bindValue(4, $_POST["date"]);
    $statement->execute();
}
?>