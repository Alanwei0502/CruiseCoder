<?php
// 連接資料庫
include("../frontEnd/layout/connect.php");

// 搜尋領域
$searchGalaxy = "SELECT * FROM galaxy WHERE gName = ?";
$searchGalaxy = $pdo->prepare($searchGalaxy);

$searchQuiz = "SELECT * FROM quiz WHERE qSubject = ?";
$searchQuiz = $pdo->prepare($searchQuiz);

$searchBadge = "SELECT * FROM badge WHERE bGalaxy = ?";
$searchBadge = $pdo->prepare($searchBadge);

$searchSelection = "SELECT qSubject, sNumber, sQuiz, sOption, sContent FROM quiz AS Q JOIN selection AS S ON Q.qNumber = S.sQuiz WHERE qSubject = ?";
$searchSelection = $pdo->prepare($searchSelection);


// 上傳領域
$editGalaxy = "UPDATE `galaxy` SET `gNumber` = ?, `gName` = ?, `gImage` = ?, `gStatus` = ? WHERE (`gNumber` = ?)";
$editGalaxy = $pdo->prepare($editGalaxy);

$editQuiz = "UPDATE `quiz` SET `qNumber` = ?, `qSubject` = ?, `qLevel` = ?, `qContent` = ?, `qAnswer` = ?, `qState` = ?, `qBackground` = ? WHERE (`qNumber` = ?)";
$editQuiz = $pdo->prepare($editQuiz);

$editBadge = "UPDATE `badge` SET `bNumber` = ?, `bGalaxy` = ?, `bName` = ?, `bInfo` = ?, `bLevel` = ?, `bIcon` = ?, `bBadge` = ? WHERE (`bNumber` = ?)";
$editBadge = $pdo->prepare($editBadge);

$editSelection = "UPDATE `selection` SET `sNumber` = ?, `sQuiz` = ?, `sOption` = ?, `sContent` = ? WHERE (`sNumber` = ?)";
$editSelection = $pdo->prepare($editSelection);



// 點擊編輯按鈕
if (isset($_POST["gNumber"])) {
    $gName = $_POST["gNumber"];
    $searchGalaxy->bindValue(1, $gName);
    $searchGalaxy->execute();

    $searchQuiz->bindValue(1, $gName);
    $searchQuiz->execute();

    $searchBadge->bindValue(1, $gName);
    $searchBadge->execute();

    $searchSelection->bindValue(1, $gName);
    $searchSelection->execute();

    $data = [];

    array_push($data, $searchGalaxy->fetchAll(PDO::FETCH_ASSOC), $searchQuiz->fetchAll(PDO::FETCH_ASSOC), $searchBadge->fetchAll(PDO::FETCH_ASSOC), $searchSelection->fetchAll(PDO::FETCH_ASSOC));
    echo json_encode($data);
}


// 點擊確認編輯按鈕