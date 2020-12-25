<?php
// connecting to database
include("../frontEnd/layout/connect.php");

// counting how many rows in galaxy table
$countGalaxy = "SELECT COUNT(*) AS count FROM galaxy";
$countGalaxy = $pdo->prepare($countGalaxy);
// inserting new data to galaxy table
$createGalaxy = "INSERT INTO `galaxy` (`gNumber`, `gName`, `gImage`, `gStatus`) VALUES (?, ?, ?, ?)";
$createGalaxy = $pdo->prepare($createGalaxy);


// counting how many rows in quiz table
$countQuiz = "SELECT COUNT(*) FROM quiz";
$countQuiz = $pdo->prepare($countQuiz);
// inserting new data to quiz table
$createQuiz = "INSERT INTO `quiz` (`qNumber`, `qSubject`, `qLevel`, `qContent`, `qAnswer`, `qState`, `qBackground`) VALUES (?, ?, ?, ?, ?, ?, ?)";
$createQuiz = $pdo->prepare($createQuiz);


// counting how many rows in selection table
$countSelection = "SELECT COUNT(*) FROM selection";
$countSelection = $pdo->prepare($countSelection);
// inserting new data to selection table
$createSelection = "INSERT INTO `selection` (`sNumber`, `sQuiz`, `sOption`, `sContent`) VALUES (?, ?, ?, ?)";
$createSelection = $pdo->prepare($createSelection);


// counting how many rows in badge table
$countBadge = "SELECT COUNT(*) FROM badge";
$countBadge = $pdo->prepare($countBadge);
// inserting new data to badge table
$createBadge = "INSERT INTO `badge` (`bNumber`, `bGalaxy`, `bName`, `bInfo`, `bLevel`, `bIcon`, `bBadge`, `bBackground`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$createBadge = $pdo->prepare($createBadge);



if (isset($_POST["newGalaxy"], $_POST["quiz"], $_POST["selections"], $_POST["badge"])) {

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


    // FOR QUIZ TABLE
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
    $bgImg = $_POST["badge"][5];



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
        $createBadge->bindValue(8, $bgImg[$b]);

        $createBadge->execute();
        // echo $idB . "/" . $bGalaxy[0] . "星系" . "/" . $bGalaxy[0] . $bName[$b] . "/" . $bInfo[$b] . "/" . $bLevel[$b] . "/" . $bIcon[$b] . "/" . $bBadge[$b] . "/" . $bgImg[$b] . "\n";
    }
    echo "success";
}


if (isset($_FILES["iconPic1"]["tmp_name"], $_FILES["iconPic2"]["tmp_name"], $_FILES["iconPic3"]["tmp_name"], $_FILES["badgePic1"]["tmp_name"], $_FILES["badgePic2"]["tmp_name"], $_FILES["badgePic3"]["tmp_name"], $_FILES["bgPic1"]["tmp_name"], $_FILES["bgPic2"]["tmp_name"], $_FILES["bgPic3"]["tmp_name"], $_FILES["galaxyPic"]["tmp_name"], $_FILES["badgePic0"]["tmp_name"])) {

    // 組合上傳圖片的資料夾路徑
    $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
    $phpPath = $_SERVER['PHP_SELF'];

    $fullPath1 = $ServerRoot . str_replace('/backEnd/quizRC.php', '/images/trial/planets/', $phpPath);
    $fullPath2 = $ServerRoot . str_replace('/backEnd/quizRC.php', '/images/trial/badge/', $phpPath);
    $fullPath3 = $ServerRoot . str_replace('/backEnd/quizRC.php', '/images/trial/galaxy/', $phpPath);

    // echo $_FILES["iconPic1"]["tmp_name"];
    $iconPic1_Temp = $_FILES["iconPic1"]["tmp_name"];
    $iconPic2_Temp = $_FILES["iconPic2"]["tmp_name"];
    $iconPic3_Temp = $_FILES["iconPic3"]["tmp_name"];
    $badgePic1_Temp = $_FILES["badgePic1"]["tmp_name"];
    $badgePic2_Temp = $_FILES["badgePic2"]["tmp_name"];
    $badgePic3_Temp = $_FILES["badgePic3"]["tmp_name"];
    $bgPic1_Temp = $_FILES["bgPic1"]["tmp_name"];
    $bgPic2_Temp = $_FILES["bgPic2"]["tmp_name"];
    $bgPic3_Temp = $_FILES["bgPic3"]["tmp_name"];
    $galaxyPic_Temp = $_FILES["galaxyPic"]["tmp_name"];
    $badgePic0 = $_FILES["badgePic0"]["tmp_name"];

    // echo $fullPath1 . $_FILES["iconPic1"]["name"];
    $iconPic1Path = $fullPath1 . $_FILES["iconPic1"]["name"];
    $iconPic2Path = $fullPath1 . $_FILES["iconPic2"]["name"];
    $iconPic3Path = $fullPath1 . $_FILES["iconPic3"]["name"];
    $badgePic1Path = $fullPath2 . $_FILES["badgePic1"]["name"];
    $badgePic2Path = $fullPath2 . $_FILES["badgePic2"]["name"];
    $badgePic3Path = $fullPath2 . $_FILES["badgePic3"]["name"];
    $bgPic1Path = $fullPath2 . $_FILES["bgPic1"]["name"];
    $bgPic2Path = $fullPath2 . $_FILES["bgPic2"]["name"];
    $bgPic3Path = $fullPath2 . $_FILES["bgPic3"]["name"];
    $galaxyPicPath = $fullPath3 . $_FILES["galaxyPic"]["name"];
    $badgePic0Path = $fullPath2 . $_FILES["badgePic0"]["name"];

    copy($iconPic1_Temp, $iconPic1Path);
    copy($iconPic2_Temp, $iconPic2Path);
    copy($iconPic3_Temp, $iconPic3Path);
    copy($badgePic1_Temp, $badgePic1Path);
    copy($badgePic2_Temp, $badgePic2Path);
    copy($badgePic3_Temp, $badgePic3Path);
    copy($bgPic1_Temp, $bgPic1Path);
    copy($bgPic2_Temp, $bgPic2Path);
    copy($bgPic3_Temp, $bgPic3Path);
    copy($galaxyPic_Temp, $galaxyPicPath);
    copy($badgePic0, $badgePic0Path);
}
