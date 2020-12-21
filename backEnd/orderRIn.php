<?php
// 串聯資料庫
include("../frontEnd/layout/connect.php");

$oNumber = $_POST['oNumber'];
// $vInvoice = $_POST['vInvoice'];



$sqlorderIn = "SELECT oNumber,oDate,oMember,m.mName,(occ+oTotal) as rt,occ,oTotal FROM myorder JOIN member as m ON oMember=m.mNumber JOIN invoice as i on oNumber = i.iNumber where oNumber=?;";

$sqlorderIn = $pdo->prepare($sqlorderIn);
$sqlorderIn->bindValue(1, $oNumber); //訂單號碼
$sqlorderIn->execute();
$data = $sqlorderIn->fetchAll(PDO::FETCH_ASSOC);

// 撈各筆訂單資料
// if (isset($_POST["vInvoice"])) {
// echo 11;
echo json_encode($data);
// }
