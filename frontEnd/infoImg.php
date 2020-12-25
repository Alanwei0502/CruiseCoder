<?php

include("./layout/connect.php");

//建立SQL
$sql = "SELECT mPhoto FROM member WHERE mAccount = ?";
$mNumber = $_COOKIE["user"];
//  $mNumber = $_POST['member'];
$statement = $pdo->prepare($sql);
$statement->bindValue(1, "$mNumber");
$statement->execute();
$infoMember = $statement->fetchAll();


echo '<img src="../images/info/'.$infoMember[0]["mPhoto"].'">'

?>