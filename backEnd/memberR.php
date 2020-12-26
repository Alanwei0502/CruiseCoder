<?php
// connecting to database
include("../frontEnd/layout/connect.php");

//載入時先抓全部會員
$allMember = "SELECT * FROM `member` WHERE mName LIKE ? AND mLevel LIKE ? AND mAccount LIKE ? AND (date_format(mJoindate, '%Y%m%d') <= ? AND date_format(mJoindate, '%Y%m%d') >= ?) AND mNumber LIKE ?";
$allMember = $pdo->prepare($allMember);


// 會員資料
$memberInfo = "SELECT M.*, L.lInfo FROM `member` AS M LEFT JOIN lecturer AS L ON M.mNumber = L.lNumber WHERE mNumber = ?";
$memberInfo = $pdo->prepare($memberInfo);

// 會員獲得徽章
$getBadge = "SELECT uDate, bName, bNumber FROM badge AS B JOIN (SELECT * FROM `unlock` WHERE uMember = ?) AS U ON B.bNumber = U.uBadge";
$getBadge = $pdo->prepare($getBadge);

// 會員訂單紀錄
$order = "SELECT oDate, oNumber, oTotal FROM myorder WHERE oMember = ?";
$order = $pdo->prepare($order);

// 會員課輔紀錄
$tutorial = "SELECT reDate, tDate, cTitle, mName FROM course AS C JOIN (SELECT * FROM `member` AS M JOIN (SELECT * FROM tutorial AS T JOIN (SELECT * FROM reservation WHERE reMember = ?) AS R ON T.tNumber = R.reTutorial) AS R ON M.mNumber = R.tTeacher) AS R ON C.cNumber = R.tCourse";
$tutorial = $pdo->prepare($tutorial);

// 會員上傳資訊
$memberUpload = "UPDATE `member` SET `mLevel` = ?, `mName` = ?, `mPhone` = ?, `mPassword` = ?, `mCC` = ? WHERE (`mNumber` = ?)";
$memberUpload = $pdo->prepare($memberUpload);

// 老師上傳資訊
$lecturerUpload = "UPDATE `lecturer` SET `lInfo` = ? WHERE (`lNumber` = ?)";
$lecturerUpload = $pdo->prepare($lecturerUpload);

// 一載入時的資料掛載
if (isset($_POST["allMember"])) {

    $allMember->bindValue(1, $_POST["allMember"]);
    $allMember->bindValue(2, $_POST["allMember"]);
    $allMember->bindValue(3, $_POST["allMember"]);
    $allMember->bindValue(4, "30000000");
    $allMember->bindValue(5, "10000000");
    $allMember->bindValue(6, $_POST["allMember"]);

    $allMember->execute();

    $memberData = $allMember->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($memberData);
}

// 搜尋功能
if (isset($_POST["name"], $_POST["account"], $_POST["level"], $_POST["dateEnd"], $_POST["dateStart"])) {

    $allMember->bindValue(1, "%" . $_POST["name"] . "%");
    $allMember->bindValue(2, "%" . $_POST["level"] . "%");
    $allMember->bindValue(3, "%" . $_POST["account"] . "%");
    $allMember->bindValue(4, $_POST["dateEnd"]);
    $allMember->bindValue(5, $_POST["dateStart"]);
    $allMember->bindValue(6, "%%");

    $allMember->execute();

    $searchMember = $allMember->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($searchMember);
}

// 按下編輯按鈕的會員資料
if (isset($_POST["mNumber"])) {

    $memberInfo->bindValue(1, $_POST["mNumber"]);
    $getBadge->bindValue(1, $_POST["mNumber"]);
    $order->bindValue(1, $_POST["mNumber"]);
    $tutorial->bindValue(1, $_POST["mNumber"]);

    $memberInfo->execute();
    $getBadge->execute();
    $order->execute();
    $tutorial->execute();

    $editMemberData = [];

    array_push($editMemberData, $memberInfo->fetchAll(PDO::FETCH_ASSOC), $getBadge->fetchAll(PDO::FETCH_ASSOC), $order->fetchAll(PDO::FETCH_ASSOC), $tutorial->fetchAll(PDO::FETCH_ASSOC));

    echo json_encode($editMemberData);
}


if (isset($_POST["editLevel"], $_POST["editName"], $_POST["editPhone"], $_POST["editPassword"], $_POST["editCC"], $_POST["memberID"])) {

    $memberUpload->bindValue(1, $_POST["editLevel"]);
    $memberUpload->bindValue(2, $_POST["editName"]);
    $memberUpload->bindValue(3, $_POST["editPhone"]);
    $memberUpload->bindValue(4, $_POST["editPassword"]);
    $memberUpload->bindValue(5, $_POST["editCC"]);
    $memberUpload->bindValue(6, $_POST["memberID"]);

    $memberUpload->execute();

    if (isset($_POST["teacherInfo"])) {
        $lecturerUpload->bindValue(1, $_POST["teacherInfo"]);
        $lecturerUpload->bindValue(2, $_POST["memberID"]);

        $lecturerUpload->execute();
    }

    echo "success";
}

