<?php
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
$TotalNum->execute();


if (isset($_POST["selectField"])) {

    $selectField = $_POST["selectField"];

    $GalStatement->bindValue(1, $selectField);

    $GalStatement->execute();

    $data = [];

    array_push($data, $AllGalStatement->fetchAll(PDO::FETCH_ASSOC), $GalStatement->fetchAll(PDO::FETCH_ASSOC), $TotalNum->fetch(PDO::FETCH_ASSOC));
    echo json_encode($data);
}
