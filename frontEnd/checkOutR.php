<?php
include('./layout/connectTest.php');
// 持卡人姓名
$careName = $_POST["cardName"];
echo $careName . '<br>';
// 手機號碼
$phoneNumber = $_POST["number"];
echo $phoneNumber . '<br>';
// 信用卡號
// $creditCardNum =$_POST["creditCardNum"];
// echo $creditCardNum;
// 有效日期



// 背面末三碼
// $creditCardCsc = $_POST["creditCardCsc"];
// echo $creditCardCsc;


//建立SQL
$sql = "INSERT INTO myorder (oNumber, oMember, oCard, oTotal, oCC, oDate) VALUES (DATE_FORMAT(NOW(),'%Y%m%d%H%i'), ?, ?, ?, ?, NOW())";

//執行
    // $statement = $Util->getPDO()->prepare($sql);
    //執行
    $statement = $pdo->prepare($sql);

    //給值
    $statement->bindValue(1, $_POST["oMember"]);
    $statement->bindValue(2, $_POST["oCard"]);
    $statement->bindValue(3, $_POST["oTotal"]);
    $statement->bindValue(4, $_POST["oCc"]);

    $statement->execute();