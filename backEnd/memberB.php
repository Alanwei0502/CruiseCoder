<?php
// connecting to database
include("../frontEnd/layout/connect.php");

//載入時先抓全部會員
$allMember = "SELECT * FROM cruisecoder.`member` WHERE mName LIKE ? AND mLevel LIKE ? AND mAccount LIKE ?";
$allMember = $pdo->prepare($allMember);



if (isset($_POST["allMember"])) {

    $allMember->bindValue(1, $_POST["allMember"]);
    $allMember->bindValue(2, $_POST["allMember"]);
    $allMember->bindValue(3, $_POST["allMember"]);

    $allMember->execute();

    $memberData = $allMember->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($memberData);
}

if (isset($_POST["name"]) || isset($_POST["account"]) || isset($_POST["level"])){

    
}
