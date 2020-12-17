<?php
// connecting to database
include("../frontEnd/layout/connect.php");

// searching field
$searchGalaxy = "SELECT * FROM cruisecoder.galaxy WHERE gName = ?";
$searchGalaxy = $pdo->prepare($searchGalaxy);

$searchQuiz = "SELECT * FROM cruisecoder.quiz WHERE qSubject = ?";
$searchQuiz = $pdo->prepare($searchQuiz);

$searchBadge = "SELECT * FROM cruisecoder.badge WHERE bGalaxy = ?";
$searchBadge = $pdo->prepare($searchBadge);

$searchSelection = "SELECT * FROM cruisecoder.selection WHERE sQuiz in ('...')";
$searchSelection = $pdo->prepare($searchSelection);


// update field
$editGalaxy = "UPDATE `cruisecoder`.`galaxy` SET `gNumber` = ?, `gName` = ?, `gImage` = ?, `gStatus` = ? WHERE (`gNumber` = ?)";
$editGalaxy = $pdo->prepare($editGalaxy);

$editQuiz = "UPDATE `cruisecoder`.`quiz` SET `qNumber` = ?, `qSubject` = ?, `qLevel` = ?, `qContent` = ?, `qAnswer` = ?, `qState` = ?, `qBackground` = ? WHERE (`qNumber` = ?)";
$editQuiz = $pdo->prepare($editQuiz);

$editBadge = "UPDATE `cruisecoder`.`badge` SET `bNumber` = ?, `bGalaxy` = ?, `bName` = ?, `bInfo` = ?, `bLevel` = ?, `bIcon` = ?, `bBadge` = ? WHERE (`bNumber` = ?)";
$editBadge = $pdo->prepare($editBadge);

$editSelection = "UPDATE `cruisecoder`.`selection` SET `sNumber` = ?, `sQuiz` = ?, `sOption` = ?, `sContent` = ? WHERE (`sNumber` = ?)";
$editSelection = $pdo->prepare($editSelection);



// 點擊編輯按鈕
if (isset($_POST["gNumber"])) {
    $gName = $_POST["gNumber"];
    $searchGalaxy->bindValue(1, $gName);
}


// 點擊確認編輯按鈕