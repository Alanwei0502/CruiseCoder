<?php
include("../frontEnd/layout/connect.php");

$sql = "UPDATE `tutorial`  SET tDate = ? , tStatus = ? WHERE tNumber = ? ";
$result = $pdo->prepare($sql);
$result->bindValue(1,$_POST["tDate"]);
$result->bindValue(2,$_POST["tStatus"]);
$result->bindValue(3,$_POST["tNumber"]);
$result->execute();
?>