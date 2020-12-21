<?php
  include("../frontEnd/layout/connect.php");

  // 一開始近來table的資料
  if(isset($_POST["documentStart"])){
    if($_POST["dateStart"] == "" && $_POST["dateEnd"] == ""){
      $dateStart = "2000/01/01";
      $dateEnd = "3000/01/01";
    }else{
      $dateStart = $_POST["dateStart"];
      $dateEnd = $_POST["dateEnd"];
    }

    if($_POST["cStatus"] == 'all'){
      $cStatus = "%";
    }else{
      $cStatus = $_POST["cStatus"];
    }

    if($_POST["teacherName"] == 'all'){
      $teacherName = "%";
    }else{
      $teacherName = $_POST["teacherName"];
    }

    if($_POST["type"] == 'all'){
      $type = "%";
    }else{
      $type = $_POST["type"];
    }

    $title = "%".$_POST["title"]."%";


    $sql = "SELECT cNumber, cTitle, cStatus, cType, date_format(cDate,'%Y/%m/%d') AS cDate, mName FROM course AS c join member AS m on c.cLecturer = m.mNumber WHERE cDate BETWEEN ? AND DATE_SUB(?,INTERVAL -1 DAY) AND cStatus LIKE ? AND cLecturer LIKE ? AND cType LIKE ? AND cTitle LIKE ?";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $dateStart);
    $statement->bindValue(2, $dateEnd);
    $statement->bindValue(3, $cStatus);
    $statement->bindValue(4, $teacherName);
    $statement->bindValue(5, $type);
    $statement->bindValue(6, $title);
    $statement->execute();

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
  }

  // 抓全部老師的名字
  if(isset($_POST["startTeacherNames"])){
    $allTeacherNamesSql = "SELECT mNumber, mName FROM member WHERE mLevel = '2'";
    $allTeacherNamesStatement = $pdo->query($allTeacherNamesSql);
    $allTeacherNamesData = $allTeacherNamesStatement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($allTeacherNamesData);
  }

  // 抓全部課程類型
  if(isset($_POST["startCourseTypes"])){
    $allCourseTypeSql = "SELECT distinct cType FROM course";
    $allCourseTypeStatement = $pdo->query($allCourseTypeSql);
    $allCourseTypeData = $allCourseTypeStatement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($allCourseTypeData);
  }

  // 編輯的資料
  if(isset($_POST["cNumber"])){
    $cNumber = $_POST["cNumber"];
    $editSql = "SELECT cNumber, cDate, cTitle, cStatus, cType, cPrice, cImage, cVideo, cTime, cInfo, mName, mNumber FROM course AS c join member AS m on c.cLecturer = m.mNumber WHERE cNumber = '$cNumber'";
    $editStatement = $pdo->query($editSql);
    $editData = $editStatement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($editData);
  }

  // 確認有無募資過
  if(isset($_POST["check"])){
    $cNumber = $_POST["check"];
    $checkSql = "SELECT * FROM fundraising WHERE fCourse = '$cNumber'";
    $checkStatement = $pdo->query($checkSql);
    $checkNumber = $checkStatement->rowCount();
    echo $checkNumber;
  }

  // 有募資過
  if(isset($_POST["checkOk"])){
    $cNumber = $_POST["checkOk"];
    $checkOkSql = "SELECT fCourse, fPrice, date_format(fStartdate,'%Y/%m/%d') AS fStartdate FROM fundraising WHERE fCourse = '$cNumber'";
    $checkOkStatement = $pdo->query($checkOkSql);
    $checkOkData = $checkOkStatement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($checkOkData);
  }

  // 購買人數、收藏人數、評價分數
  if(isset($_POST["other"])){
    $cNumber = $_POST["other"];

    // 購買人數
    $buySql = "SELECT * FROM invoice WHERE iCourse = '$cNumber'";
    $buyStatement = $pdo->query($buySql);
    $buyCount = $buyStatement->rowCount();

    // 收藏人數
    $favoriteSql = "SELECT * FROM favorite_c WHERE fcCourse = '$cNumber'";
    $favoriteStatement = $pdo->query($favoriteSql);
    $favoriteCount = $favoriteStatement->rowCount();

    // 評價分數
    $reviewSql = "SELECT avg(rStar) AS rStar FROM review WHERE rCourse = '$cNumber'";
    $reviewStatement = $pdo->query($reviewSql);
    $reviewData = $reviewStatement->fetchAll();

    foreach ($reviewData as $index => $row) {
      $reviewScore = round($row["rStar"], 1);
    }

    $res[0] = $buyCount;
    $res[1] = $favoriteCount;
    $res[2] = $reviewScore;

    echo json_encode($res);
  }

  // 把圖片放到資料內
  if(isset($_FILES["file"])){
    $filePathTemp = $_FILES["file"]["tmp_name"];
    $filePath = $_SERVER["DOCUMENT_ROOT"]."/CruiseCoder/images/allCourse/".$_FILES["file"]["name"];
    copy($filePathTemp, $filePath);
  }

  // 新增課程
  if(isset($_POST["insert"])){
    $insertCourseName = $_POST["insertCourseName"];
    $insertStatus = $_POST["insertStatus"];
    $insertType = $_POST["insertType"];
    $insertPrice = $_POST["insertPrice"];
    $insertFundraising = $_POST["insertFundraising"];
    $insertOpenTime = $_POST["insertOpenTime"];
    $insertImage = $_POST["insertImage"];
    $insertVideo = $_POST["insertVideo"];
    $insertCourseTime = $_POST["insertCourseTime"];
    $insertCourseIntroduction = $_POST["insertCourseIntroduction"];
    $insertTeacher = $_POST["insertTeacher"];

    $allSql = "SELECT * FROM course";
    $allStatement = $pdo->query($allSql);
    $allCount = $allStatement->rowCount();
    
    $allCount += 1;
    // 補上0
    $insertCourseNumber = str_pad($allCount, 4, "0", STR_PAD_LEFT);
    // 補上C
    $insertcNumber = str_pad($insertCourseNumber, 5, "C", STR_PAD_LEFT);

    $insertSql = "INSERT INTO course (cNumber, cTitle, cInfo, cLecturer, cTime, cPrice, cStatus, cType, cImage, cVideo, cDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    $insertStatement = $pdo->prepare($insertSql);
    $insertStatement->bindValue(1, $insertcNumber);
    $insertStatement->bindValue(2, $insertCourseName);
    $insertStatement->bindValue(3, $insertCourseIntroduction);
    $insertStatement->bindValue(4, $insertTeacher);
    $insertStatement->bindValue(5, $insertCourseTime);
    $insertStatement->bindValue(6, $insertPrice);
    $insertStatement->bindValue(7, $insertStatus);
    $insertStatement->bindValue(8, $insertType);
    $insertStatement->bindValue(9, $insertImage);
    $insertStatement->bindValue(10, $insertVideo);
    $insertStatement->execute();

    // 如果是募資課程 才會寫入 順序要在課程建立後 因為有FK的關西
    if($insertFundraising != "" && $insertOpenTime != ""){

      $insertFundraisingSql = "INSERT INTO fundraising (fCourse, fPrice, fStartdate) VALUES (?, ?, ?)";
      $insertFundraisingStatement = $pdo->prepare($insertFundraisingSql);
      $insertFundraisingStatement->bindValue(1, $insertcNumber);
      $insertFundraisingStatement->bindValue(2, $insertFundraising);
      $insertFundraisingStatement->bindValue(3, $insertOpenTime);
      $insertFundraisingStatement->execute();
    }
  }

  // 編輯課程
  if(isset($_POST["update"])){
    $theCourseNumber = $_POST["theCourseNumber"];
    $updateTheCourseName = $_POST["updateTheCourseName"];
    $updateStatus = $_POST["updateStatus"];
    $updateType = $_POST["updateType"];
    $updatePrice = $_POST["updatePrice"];
    $updateFundraising = $_POST["updateFundraising"];
    $updateOpenTime = $_POST["updateOpenTime"];
    $updateImage = $_POST["updateImage"];
    $updateVideo = $_POST["updateVideo"];
    $updateCourseTime = $_POST["updateCourseTime"];
    $updateIntroduction = $_POST["updateIntroduction"];
    $updateTeacher = $_POST["updateTeacher"];

    $updateSql = "UPDATE course SET cTitle = ?, cInfo = ?, cLecturer = ?, cTime = ?, cPrice = ?, cStatus = ?, cType = ?, cImage = ?, cVideo = ? WHERE cNumber = ?";
    $updateStatement = $pdo->prepare($updateSql);
    $updateStatement->bindValue(1, $updateTheCourseName);
    $updateStatement->bindValue(2, $updateIntroduction);
    $updateStatement->bindValue(3, $updateTeacher);
    $updateStatement->bindValue(4, $updateCourseTime);
    $updateStatement->bindValue(5, $updatePrice);
    $updateStatement->bindValue(6, $updateStatus);
    $updateStatement->bindValue(7, $updateType);
    $updateStatement->bindValue(8, $updateImage);
    $updateStatement->bindValue(9, $updateVideo);
    $updateStatement->bindValue(10, $theCourseNumber);
    $updateStatement->execute();

    // 判斷是否有填募資欄位
    if($updateFundraising != "" && $updateOpenTime != ""){
      //判斷是否原本就是募資課程
      $checkSql = "SELECT * FROM fundraising WHERE fCourse = '$theCourseNumber'";
      $checkStatement = $pdo->query($checkSql);
      $checkOk = $checkStatement->rowCount();

      // 原本就有則update,原本沒有則insert
      if($checkOk == 0){
        $insertSql = "INSERT INTO fundraising (fCourse, fPrice, fStartdate) VALUES (?, ?, ?)";
        $insertStatement = $pdo->prepare($insertSql);
        $insertStatement->bindValue(1, $theCourseNumber);
        $insertStatement->bindValue(2, $updateFundraising);
        $insertStatement->bindValue(3, $updateOpenTime);
        $insertStatement->execute();
      }else{
        $updateFundraisingSql = "UPDATE fundraising SET fPrice = ?, fStartdate = ? WHERE fCourse = ?";
        $updateFundraisingStatement = $pdo->prepare($updateFundraisingSql);
        $updateFundraisingStatement->bindValue(1, $updateFundraising);
        $updateFundraisingStatement->bindValue(2, $updateOpenTime);
        $updateFundraisingStatement->bindValue(3, $theCourseNumber);
        $updateFundraisingStatement->execute();
      }
    }
  }

  // 一鍵上架功能
  if(isset($_POST["oncNumber"])){
    $oncNumber = $_POST["oncNumber"];
    $onSql = "UPDATE course SET cStatus = '1' WHERE cNumber = '$oncNumber'";
    $onStatement = $pdo->query($onSql);
  }

  // 一鍵下架功能
  if(isset($_POST["offcNumber"])){
    $offcNumber = $_POST["offcNumber"];
    $offSql = "UPDATE course SET cStatus = '0' WHERE cNumber = '$offcNumber'";
    $offStatement = $pdo->query($offSql);
  }



?>