<?php
include("../frontEnd/layout/connect.php");

$AllGalStatement = "SELECT gName FROM cruisecoder.galaxy;";
$GalStatement = "SELECT * FROM cruisecoder.galaxy WHERE gName like ?;";


$AllGalStatement = $pdo->prepare($AllGalStatement);
$GalStatement = $pdo->prepare($GalStatement);

$AllGalStatement->execute();


if (isset($_POST["selectField"])) {

    $selectField = $_POST["selectField"];

    $GalStatement->bindValue(1, $selectField);

    $GalStatement->execute();

    $data = [];

    array_push($data, $AllGalStatement->fetchAll(PDO::FETCH_ASSOC), $GalStatement->fetchAll(PDO::FETCH_ASSOC));

    echo json_encode($data);
    // print_r($data);
}
