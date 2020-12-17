<?php
// connecting to database
include("../frontEnd/layout/connect.php");

// counting how many rows in galaxy table
$countGalaxy = "SELECT COUNT(*) AS count FROM cruisecoder.galaxy";
$countGalaxy = $pdo->prepare($countGalaxy);
// inserting new data to galaxy table
$createGalaxy = "INSERT INTO `cruisecoder`.`galaxy` (`gNumber`, `gName`, `gImage`, `gStatus`) VALUES (?, ?, ?, ?)";
$createGalaxy = $pdo->prepare($createGalaxy);


// counting how many rows in quiz table
$countQuiz = "SELECT COUNT(*) FROM cruisecoder.quiz";
$countQuiz = $pdo->prepare($countQuiz);
// inserting new data to quiz table
$createQuiz = "INSERT INTO `cruisecoder`.`quiz` (`qNumber`, `qSubject`, `qLevel`, `qContent`, `qAnswer`, `qState`, `qBackground`) VALUES (?, ?, ?, ?, ?, ?, ?)";
$createQuiz = $pdo->prepare($createQuiz);


// counting how many rows in selection table
$countSelection = "SELECT COUNT(*) FROM cruisecoder.selection";
$countSelection = $pdo->prepare($countSelection);
// inserting new data to selection table
$createSelection = "INSERT INTO `cruisecoder`.`selection` (`sNumber`, `sQuiz`, `sOption`, `sContent`) VALUES (?, ?, ?, ?)";
$createSelection = $pdo->prepare($createSelection);


// counting how many rows in badge table
$countBadge = "SELECT COUNT(*) FROM cruisecoder.badge";
$countBadge = $pdo->prepare($countBadge);
// inserting new data to badge table
$createBadge = "INSERT INTO `cruisecoder`.`badge` (`bNumber`, `bGalaxy`, `bName`, `bInfo`, `bLevel`, `bIcon`, `bBadge`) VALUES (?, ?, ?, ?, ?, ?, ?)";
$createBadge = $pdo->prepare($createBadge);


if (isset($_POST["newGalaxy"], $_POST["quiz"], $_POST["selections"])) {

    // FOR GALAXY TABLE
    // counting current number of rows
    $countGalaxy->execute();
    $dataCount = $countGalaxy->fetchColumn();
    $id = "G" . sprintf("%04d", $dataCount + 1);

    $createGalaxy->bindValue(1, $id);
    $createGalaxy->bindValue(2, $_POST["newGalaxy"][0]);
    $createGalaxy->bindValue(3, $_POST["newGalaxy"][1]);
    $createGalaxy->bindValue(4, $_POST["newGalaxy"][2]);

    $createGalaxy->execute();


    // // FOR QUIZ TABLE
    // counting how many questions will be inserted
    $arrayLength = count($_POST["quiz"][2]);
    $qSubject = $_POST["quiz"][0];
    $qLevel = $_POST["quiz"][1];
    $qContent = $_POST["quiz"][2];
    $qAnswer = $_POST["quiz"][3];
    $qState = $_POST["quiz"][4];
    $qBackground = $_POST["quiz"][5];

    for ($i = 0; $i < $arrayLength; $i++) {

        // counting current number of rows
        $countQuiz->execute();
        $dataCountQ = $countQuiz->fetchColumn();
        $idQ = "Q" . sprintf("%04d", $dataCountQ + 1);

        $createQuiz->bindValue(1, $idQ);
        $createQuiz->bindValue(2, $qSubject);
        $createQuiz->bindValue(3, $qLevel[$i]);
        $createQuiz->bindValue(4, $qContent[$i]);
        $createQuiz->bindValue(5, $qAnswer[$i]);
        $createQuiz->bindValue(6, $qState[$i]);
        if ($qLevel[$i] == 1) {
            $createQuiz->bindValue(7, $qBackground[0]);
        } elseif ($qLevel[$i] == 2) {
            $createQuiz->bindValue(7, $qBackground[1]);
        } else {
            $createQuiz->bindValue(7, $qBackground[2]);
        }
        $createQuiz->execute();
    }


    // FOR SELECTION TABLE
    // counting how many selections will be inserted
    $selectionLength = count($_POST["selections"][0]);
    $sOption = $_POST["selections"][0];
    $sContent = $_POST["selections"][1];

    for ($s = 0; $s < $selectionLength; $s += 4) {

        // counting current number of rows
        $countSelection->execute();
        $selectionCountForQ = $countSelection->fetchColumn();
        $idQ = "Q" . sprintf("%04d", ($selectionCountForQ / 4) + 1);

        for ($j = 0; $j < 4; $j++) {
            $countSelection->execute();
            $selectionCountForS = $countSelection->fetchColumn();
            $idS = "S" . sprintf("%04d", $selectionCountForS + 1);

            $createSelection->bindValue(1, $idS);
            $createSelection->bindValue(2, $idQ);
            $createSelection->bindValue(3, $sOption[$s + $j]);
            $createSelection->bindValue(4, $sContent[$s + $j]);

            $createSelection->execute();
        }
    }


    // FOR BADGE TABLE
    $bGalaxy = $_POST["badge"][0];
    $bName = $_POST["badge"][1];
    $bInfo = $_POST["badge"][2];
    $bLevel = [1, 2, 3, 0];
    $bIcon = $_POST["badge"][3];
    $bBadge = $_POST["badge"][4];

    for ($b = 0; $b < 4; $b++) {
        // counting current number of rows
        $countBadge->execute();
        $badgeCount = $countBadge->fetchColumn();
        $idB = "B" . sprintf("%04d", $badgeCount + 1);

        $createBadge->bindValue(1, $idB);
        $createBadge->bindValue(2, $bGalaxy[0] . "星系");
        $createBadge->bindValue(3, $bGalaxy[0] . $bName[$b]);
        $createBadge->bindValue(4, $bInfo[$b]);
        $createBadge->bindValue(5, $bLevel[$b]);
        $createBadge->bindValue(6, $bIcon[$b]);
        $createBadge->bindValue(7, $bBadge[$b]);

        $createBadge->execute();
    }


    echo "success";
} else {
    echo "failed";
}