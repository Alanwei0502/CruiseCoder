<?php
// 串聯資料庫
include("../frontEnd/layout/connect.php");

$oNumber = $_POST['oNumber'];
// $vInvoice = $_POST['vInvoice'];



$sqlorderInList = "SELECT cTitle, cPrice FROM myorder AS o join invoice AS i on o.oNumber = i.iNumber join course AS c on i.iCourse = c.cNumber WHERE oNumber = ?;";

$sqlorderInList = $pdo->prepare($sqlorderInList);
$sqlorderInList->bindValue(1, $oNumber); //訂單號碼
$sqlorderInList->execute();
$data = $sqlorderInList->fetchAll(PDO::FETCH_ASSOC);

// 撈各筆訂單資料
// if (isset($_POST["vInvoice"])) {
// echo 11;
echo json_encode($data);
// }
