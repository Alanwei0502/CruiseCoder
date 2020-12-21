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



// 撈各筆訂單資料
if (isset($_POST["vInvoice"])) {
    
    
    $oNumber = $_POST['oNumber'];
    
    
    $sqlorderIn = "SELECT oNumber,oDate,oMember,m.mName,(occ+oTotal) as rt,occ,oTotal FROM myorder JOIN member as m ON oMember=m.mNumber JOIN invoice as i on oNumber = i.iNumber where oNumber=?;";
    
    $sqlorderIn = $pdo->prepare($sqlorderIn);
    $sqlorderIn->bindValue(1, $oNumber); //訂單號碼
    $sqlorderIn->execute();
    $data = $sqlorderIn->fetchAll(PDO::FETCH_ASSOC);
    
    echo 11;
    echo json_encode($data);
}
