<?php
// 串聯資料庫
include("./layout/connect.php");

// $dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select;

// $pdo = new PDO($dsn, $db_user, $db_pass);


// 撈出會員資料和收藏什麼課程
// $sql="SELECT mNumber,mAccount FROM member;";
// $sql="SELECT M.mNumber,F.fcCourse FROM member AS M RIGHT JOIN (SELECT fcMember,fcCourse FROM favorite_c where fcMember=?) AS F on M.mNumber = F.fcMember;
// ";
// 
$sql = " SELECT m.mNumber, m.mName, t1.fcCourse, t1.cTitle from (select * from course c join favorite_c fc on c.cNumber = fc.fcCourse where fcMember=? ) as t1 join member m on t1.fcMember = m.mNumber; ";


$member = $_POST['member2'];


$sql = $pdo->prepare($sql);
$sql->bindValue(1, $member);
$sql->execute();
// $data = $sqlAllCourse->fetchAll();
$data = $sql->fetchAll(PDO::FETCH_ASSOC);



// print_r($data);
//這裡會接到allCourse.js用post方式傳過來star的值
//如果有接到star值，執行下列動作
if (isset($_POST["member"])) {
    echo json_encode($data);
    // print_r($data);
    // echo  $_POST['member2'];
}
