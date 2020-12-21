<?php
// 串聯資料庫
include("../frontEnd/layout/connect.php");

// date_format(oDate,'%Y/%m/%d');

$dateStart = $_POST['dateStart'];
$dateEnd = $_POST['dateEnd'];
$oMember = "%" . $_POST['oMember'] . "%"; //訂單號碼
$memberNum = $_POST['memberNum']; //會員編號

// 撈訂單資料
// $sqlorder="SELECT date_format(oDate,'%Y/%m/%d') as oDate,oNumber,oMember,oTotal FROM myorder WHERE oNumber=? AND oMember=? AND oDate BETWEEN '$dateStart' AND DATE_SUB('$dateEnd',INTERVAL -1 DAY);";

$sqlorder = "SELECT date_format(oDate,'%Y/%m/%d') as oDate,oNumber,oMember,oTotal FROM myorder WHERE oMember LIKE ? AND oNumber LIKE ? AND date_format(oDate,'%Y/%m/%d') BETWEEN '$dateStart' AND '$dateEnd';";




$sqlorder = $pdo->prepare($sqlorder);
$sqlorder->bindValue(1, $memberNum); //會員號碼
$sqlorder->bindValue(2, $oMember); //訂單編號
$sqlorder->execute();
// $data = $sqlAllCourse->fetchAll();
$data = $sqlorder->fetchAll(PDO::FETCH_ASSOC);


//這裡會接到allCourse.js用post方式傳過來star的值
//如果有接到star值，執行下列動作
if (isset($_POST["member"])) {
    echo json_encode($data);
}
// echo 11;



// 撈各筆訂單資料
if (isset($_POST["vInvoice"])) {

    $oDate = $_POST['oDate'];
    $oNumber = $_POST['oNumber'];
    $oMemberIn = $_POST['oMemberIn']; //訂單號碼
    $oTotal = $_POST['oTotal']; //會員編號

    $sqlorderIn = "";

    $sqlorderIn = $pdo->prepare($sqlorderIn);
    $sqlorderIn->bindValue(1, $oMember); //訂單號碼
    $sqlorderIn->bindValue(2, $memberNum); //會員編號
    $sqlorderIn->execute();
    $data = $sqlorderIn->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
}
