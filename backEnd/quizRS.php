<?php
<<<<<<< HEAD
include("../frontEnd/layout/connect.php");

$AllGalStatement = "SELECT gName FROM cruisecoder.galaxy";
$GalStatement = "SELECT * FROM cruisecoder.galaxy WHERE gName like ?";
$TotalNum = "SELECT COUNT(*) AS num FROM cruisecoder.quiz";


$AllGalStatement = $pdo->prepare($AllGalStatement);
$GalStatement = $pdo->prepare($GalStatement);
$TotalNum = $pdo->prepare($TotalNum);

$AllGalStatement->execute();
=======
// connecting to database
include("../frontEnd/layout/connect.php");

// loading in the beginning
$AllGalStatement = "SELECT gName FROM cruisecoder.galaxy";
$AllGalStatement = $pdo->prepare($AllGalStatement);
$AllGalStatement->execute();

// searching the field
$GalStatement = "SELECT * FROM cruisecoder.galaxy WHERE gName like ?";
$GalStatement = $pdo->prepare($GalStatement);

// counting how many rows in quiz table
$TotalNum = "SELECT COUNT(*) AS num FROM cruisecoder.quiz";
$TotalNum = $pdo->prepare($TotalNum);
>>>>>>> 1b31b660688f3f49ef769b0297f7bd13ceb75f05
$TotalNum->execute();


if (isset($_POST["selectField"])) {

    $selectField = $_POST["selectField"];

    $GalStatement->bindValue(1, $selectField);

    $GalStatement->execute();

    $data = [];

    array_push($data, $AllGalStatement->fetchAll(PDO::FETCH_ASSOC), $GalStatement->fetchAll(PDO::FETCH_ASSOC), $TotalNum->fetch(PDO::FETCH_ASSOC));
    echo json_encode($data);
}
<<<<<<< HEAD

$OffGalStatement = "UPDATE `cruisecoder`.`galaxy` SET `gStatus` = '0' WHERE (`gNumber` = 'G0001');";
$OffQuizStatement = "UPDATE `cruisecoder`.`quiz` SET `qState` = '0' WHERE (`qNumber` = 'Q0001');";

$OffGalStatement = $pdo->prepare($OffGalStatement);
$OffQuizStatement = $pdo->prepare($OffQuizStatement);
=======
>>>>>>> 1b31b660688f3f49ef769b0297f7bd13ceb75f05
