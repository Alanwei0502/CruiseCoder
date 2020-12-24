<?php

  include("./layout/connect.php");

  $sql = "SELECT t.tNumber, t.tStatus, t.tCourse,DATE_FORMAT(tDate, '%Y%m%d') as tDate, c.cType, c.cTitle, m.mName FROM tutorial t join course c on t.tCourse = c.cNumber join member m on t.tTeacher = m.mNumber WHERE tStatus = 1";
  // 把全部的課輔時間塞進萬年曆
  if(isset($_POST["firstPost"])){
    $statement = $pdo->query($sql);
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
  }


  //
  if(isset($_POST["reservationDate"])){
    $reservationDate = $_POST["reservationDate"];
    $reservationSql = $sql . " AND DATE_FORMAT(tDate, '%Y%m%d') = $reservationDate";
    $statement = $pdo->query($reservationSql);
    $data = $statement->fetchAll();
    
    foreach ($data as $index => $row) {
      // 計算總預約人數
      $people = $row["tNumber"];
      $peopleNumberSql = "SELECT * FROM reservation where reTutorial = '$people'";
      $peopleStatement = $pdo->query($peopleNumberSql);
      
      $peopleNumber = $peopleStatement->rowCount();

      // 確認使用者是否已預約
      if(isset($_POST["userAccount"])){
        $userAccount = $_POST["userAccount"];
        $chcekBookingSql = "SELECT * FROM tutorial AS t join reservation AS r on t.tNumber = r.reTutorial join member AS m on r.reMember = m.mNumber WHERE DATE_FORMAT(tDate, '%Y%m%d') = $reservationDate AND m.mAccount = '$userAccount'";
        $checkStatement = $pdo->query($chcekBookingSql);
        $checkNumber = $checkStatement->rowCount();
      }

      echo '
      <p data-tdate="'. $row["tDate"] .'">'. $row["cTitle"] .'</p>
      <p>'. $row["mName"] .'<span>'. $row["cType"] .'</span></p>
      <p>18:00~22:00</p>
      <p>目前人數 '.$peopleNumber.' / 10</p>
      ';
      if(isset($_POST["userAccount"])){
        if($checkNumber > 0){
          echo '<button class="bookAlready" disabled>已預約</button>';
        }else if($peopleNumber < 10){
          echo '<button class="booking" data-tnumber="'. $row["tNumber"] .'">我要預約</button>';
        }else if($peopleNumber == 10){
          echo '<button class="bookFullBtn" disabled>預約已滿</button>';
        }
      }else{
        if($peopleNumber < 10){
          echo '<button class="booking" data-tnumber="'. $row["tNumber"] .'">我要預約</button>';
        }else if($peopleNumber == 10){
          echo '<button class="bookFullBtn" disabled>預約已滿</button>';
        }
      }
    }
  }

  // 如果有登入 要區分有無購買
  if(isset($_POST["tCourse"])){
    $tCourse = $_POST["tCourse"];
    $userAccount = $_POST["userAccount"];
    // 之後要多接一個變數 如果使用者有登入 mAccount = '要改變數'
    $buySql = "SELECT i.iCourse FROM (SELECT * FROM myorder as o JOIN (SELECT mNumber FROM member WHERE mAccount = '$userAccount') as m ON o.oMember = m.mNumber) as o JOIN invoice AS i ON o.oNumber = i.iNumber WHERE i.iCourse = '$tCourse'";
    
    $buyStatement = $pdo->query($buySql);
    
    $buyStatementCheck = $buyStatement->rowCount();

    echo $buyStatementCheck;
  }

  // 如果人數已滿 顯示紅色
  if(isset($_POST["tNumber"])){
    $tNumber = $_POST["tNumber"];

    $fullSql = "SELECT * FROM reservation WHERE reTutorial = '$tNumber'";
    $fullStatement = $pdo->query($fullSql);
    $fullStatementCheck = $fullStatement->rowCount();

    echo $fullStatementCheck;
  }


  // 條件篩選下拉選單
  if(isset($_POST["documentStart"])){
    $conditionChoiceSql = "SELECT c.cType, m.mName FROM tutorial as t join course as c on t.tCourse = c.cNumber join member as m on c.cLecturer = m.mNumber group by tCourse";
  
    $conditionChoiceStatement = $pdo->query($conditionChoiceSql);
    
    $conditionChoiceData = $conditionChoiceStatement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($conditionChoiceData);
  
  }

  // 篩選條件 老師不重複
  if(isset($_POST["teacherNameOne"])){
    $conditionTeacherNameSql = "SELECT distinct mName FROM tutorial AS t join member AS m on t.tTeacher = m.mNumber";

    $conditionTeacherNameStatement = $pdo->query($conditionTeacherNameSql);

    $conditionTeacherNameData = $conditionTeacherNameStatement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($conditionTeacherNameData);
  }

  // 篩選條件 課程類型不重複
  if(isset($_POST["courseTypeOne"])){
    $conditionCourseTypeSql = "SELECT distinct cType FROM tutorial AS t join course AS c on t.tCourse = c.cNumber";
    
    $conditionCourseTypeStyatement = $pdo->query($conditionCourseTypeSql);

    $conditionCourseTypeData = $conditionCourseTypeStyatement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($conditionCourseTypeData);
  }

  // 手機版的橫列式課輔
  if(isset($_POST["yearMonth"])){
    $yearMonth = $_POST["yearMonth"];
    $phoneTutorialSql = "SELECT t.tNumber, t.tStatus, t.tCourse,t.tDate, c.cType, c.cTitle, m.mName FROM tutorial t join course c on t.tCourse = c.cNumber join member m on t.tTeacher = m.mNumber WHERE DATE_FORMAT(tDate,'%Y%m') = $yearMonth AND tStatus = 1 order by tDate";
    $phoneTutorialStatement = $pdo->query($phoneTutorialSql);
    $phoneTutorialData = $phoneTutorialStatement->fetchAll();

    foreach ($phoneTutorialData as $index => $row) {

      $theCourse = $row["tCourse"];
      // 確定使用者有無購買過課程
      if(isset($_POST["userAccount"])){
        
        $checkBuySql = "SELECT * FROM member AS m join myorder AS o on m.mNumber = o.oMember join invoice AS i on o.oNumber = i.iNumber join course AS c on i.iCourse = c.cNumber WHERE mAccount = 'ccc' AND icourse = '$theCourse'";
        
        $checkBuyStatement = $pdo->query($checkBuySql);
        $checkBuyStatementNumber = $checkBuyStatement->rowCount();
      }
      

      $dataDate = $row["tDate"];
      // 轉換成時間格式
      $dateFormat = date($dataDate);
      // 取得天
      $theDay = date("d",strtotime($dateFormat));
      // 天數小於10去除0
      $theDay = intval($theDay);
      // 取得星期幾
      $theWeek = date("D",strtotime($dateFormat));


      $filterDate = date("Ymd",strtotime($dateFormat));
      $peopleCheckSql = "SELECT * FROM tutorial AS t join reservation AS r on t.tNumber = r.reTutorial WHERE DATE_FORMAT(tDate,'%Y%m%d') = $filterDate";
      $peopleCheckStatement = $pdo->query($peopleCheckSql);
      $peopleCheckStatementNumber = $peopleCheckStatement->rowCount();


      echo'
        <div class="phoneDay" data-teachername="'. $row["mName"] .'" data-coursetype="'. $row["cType"] .'">
          <div class="phoneDayLeft">
            <p>'. $theWeek .'</p>
            <p>'. $theDay .'</p>
          </div>
          ';
      if(isset($_POST["userAccount"])){
        if($checkBuyStatementNumber > 0){
          if($peopleCheckStatementNumber == 10){
            echo '<div class="phoneDayRight buy full" data-date="'. $filterDate .'">';
          }else{
            echo '<div class="phoneDayRight buy" data-date="'. $filterDate .'">';
          }
        }else{
          if($peopleCheckStatementNumber == 10){
            echo '<div class="phoneDayRight full" data-date="'. $filterDate .'">';
          }else{
            echo '<div class="phoneDayRight" data-date="'. $filterDate .'">';
          }
        }
      }else{
        if($peopleCheckStatementNumber == 10){
          echo '<div class="phoneDayRight full" data-date="'. $filterDate .'">';
        }else{
          echo '<div class="phoneDayRight" data-date="'. $filterDate .'">';
        }
      }
      echo'
            <p class="courseTitle">'. $row["cTitle"] .'</p>
          </div>
        </div>
        ';
    }
  }

  // 確認使用者有無購買課程才能執行預約
  if(isset($_POST["courseName"], $_POST["userAccount"])){
    $courseName = $_POST["courseName"];
    $userAccount = $_POST["userAccount"];
    
    $checkBuySql = "SELECT * FROM member AS m join myorder AS o on m.mNumber = o.oMember join invoice AS i on o.oNumber = i.iNumber join course AS c on i.iCourse = c.cNumber WHERE mAccount = '$userAccount' AND cTitle = '$courseName'";
    
    $checkBuyStatement = $pdo->query($checkBuySql);

    $checkNumber = $checkBuyStatement->rowCount();

    echo $checkNumber;
  
  }

  // 預約功能 寫進資料庫
  if(isset($_POST["courseNumber"], $_POST["userAccount"])){
    //使用者登入帳號取得會員編號
    $userAccount = $_POST["userAccount"];
    $memberSql = "SELECT mNumber, mEmail FROM member WHERE mAccount = '$userAccount'";
    $memberStatement = $pdo->query($memberSql);
    $memberData = $memberStatement->fetchAll();

    foreach ($memberData as $index => $row) {
    $memberNumber = $row["mNumber"];
    // 預約寫進資料庫
    $courseNumber = $_POST["courseNumber"];
    $bookSql = "INSERT INTO reservation (reNumber, reTutorial, reMember, reDate) VALUES (NOW(), '$courseNumber', '$memberNumber', NOW())";
    $bookStatement = $pdo->query($bookSql);
    $bookStatement->execute();

    $mEmail = $row["mEmail"];
    echo $mEmail;
    }
  }
