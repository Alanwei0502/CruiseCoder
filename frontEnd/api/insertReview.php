<?php
require("../frontEnd/layout/connect.php");
$conn = new mysqli($db_host, $db_user, $db_pass, $db_select); //連線資料庫

$rNumber = strtotime("now");
$rCourse = $_POST['rCourse'];
$rMember = $_POST['rMember'];
$rFeedback = $_POST['rFeedback'];
$rStar = $_POST['rStar'];
$rDate = $_POST['rDate'];

$sql="INSERT INTO review (rNumber, rCourse, rMmeber, rFeedback, rStar, rDate) VALUES ('{$rNumber}', '{$rCourse}', '{$rMember}', '{$rFeedback}', '{$rStar}', '{$rDate}');";
$query=mysqli_query($conn, $sql);

header('Content-type: application/json;charset=utf-8');
echo json_encode($sql);
?>