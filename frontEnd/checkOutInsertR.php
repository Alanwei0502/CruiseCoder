<?php
// 串聯資料庫
include("./layout/connect.php");
// 寫入訂單資料
$sql = "INSERT INTO myorder (`oNumber`, `oMember`, `oCard`, `oTotal`, `oCC`, `oDate`) VALUES (DATE_FORMAT(NOW(),'%Y%m%d%H%i%s'), ?, ?, ?, ?, NOW());";
// 用$sql變數去接SELECT子句


// 可以取到當下的時間
$now = date_create('now', timezone_open('Asia/Taipei')); //取得當下的時間
$oNumber = date_format($now, 'YmdHis'); //將取得的時間字串格式化

$theMember = $_POST['theMember']; //會員編號
$oCard = $_POST['oCard']; //信用卡後四碼
$oTotal = $_POST['oTotal']; //訂單總金額
$oCC = $_POST['oCC']; //使用的ccpoint(新台幣)
$newCcp = $_POST['newCcp']; //新的CCPOINT
//新的ccpoint在checkOut.js檔先計算完了

// 準備進資料庫撈資料
$sql = $pdo->prepare($sql);
$sql->bindValue(1, $theMember);
$sql->bindValue(2, $oCard);
$sql->bindValue(3, $oTotal);
$sql->bindValue(4, $oCC);
$sql->execute();


// // ======= 原本做法，之後改用取得現在時間帶變數做法 =======
// //  原本做法，進資料庫用會員編號撈出最新一筆的訂單編號，再將訂單編號的值帶回變數
// $sqltime = "SELECT oNumber FROM myorder where oMember=? order by oNumber desc LIMIT 0 , 1;";

// $sqltime = $pdo->prepare($sqltime);
// $sqltime->bindValue(1, $theMember);
// $sqltime->execute();
// $data = $sqltime->fetchAll(PDO::FETCH_ASSOC);

// // // 撈出一筆資料，找某一欄資料
// // //  print_r($data) //印出一整筆陣列
// $oNumber = $data[0]['oNumber'];
// echo $oNumber."\n";
// echo $data[0]['oNumber'] ."\n";
// // // echo $data[第幾列(從資料開始算)]['欄位名稱'];

// // =====================================================


// 寫入訂單明細
// $cNumber 是陣列，是購買的課程編號
$cNumber = $_POST['cNumber'];
print_r($cNumber);

//接到的值必須用for迴圈去跑
//count($cNumber) 是指陣列的長度，在js寫法是變數.length

for ($i = 0; $i < count($cNumber); $i++) {

    $sqlinvoice = "INSERT INTO invoice (`iNumber`, `iCourse`) VALUES (?, ?);";

    $sqlinvoice = $pdo->prepare($sqlinvoice);
    $sqlinvoice->bindValue(1, $oNumber);
    $sqlinvoice->bindValue(2, $cNumber[$i]);
    $sqlinvoice->execute();
}

// 更新會員表單的CCPOINT
$sql = "update member set mCC = ? where mNumber = ?;";

$sql = $pdo->prepare($sql);
$sql->bindValue(1, $newCcp);
$sql->bindValue(2, $theMember);
$sql->execute();



