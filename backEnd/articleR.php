<?php

include("../frontEnd/layout/connect.php");

//每頁筆數
$pageRow_count = 5;

//預設頁數
$num_page = 1;


//建立SQL
//抓資料庫全部
$sql = "SELECT * FROM article";
//抓到全部的資料
$allCount = $pdo->query($sql);
//計算總筆數
$totalCount = $allCount->rowCount();
//總頁數 = 總筆數除每頁筆數 
$totalPage = ceil($totalCount / $pageRow_count);

// 回傳總頁數給判斷
if (isset($_POST["lastPageNumber"])) {
  echo $totalPage;
}

// 搜尋條件
if (isset($_POST["searchPage"])) {
  // 全部搜尋條件都有
  if (isset($_POST["searchStatus"], $_POST["searchName"], $_POST["dateStart"], $_POST["dateEnd"])) {
    $searchStatus = $_POST["searchStatus"];
    $searchName = $_POST["searchName"];
    $dateStart = $_POST["dateStart"];
    $dateEnd = $_POST["dateEnd"];
    $sql = "SELECT * FROM article WHERE aStatus = $searchStatus AND aTitle LIKE '%$searchName%' AND aDate BETWEEN '$dateStart' AND DATE_SUB('$dateEnd',INTERVAL -1 DAY)";
    $statement = $pdo->query($sql);
  } else {
    // 只有搜尋專欄名字和狀態
    if (isset($_POST["searchStatus"], $_POST["searchName"])) {
      $searchStatus = $_POST["searchStatus"];
      $searchName = $_POST["searchName"];
      $sql = "SELECT * FROM article WHERE aStatus = $searchStatus AND aTitle LIKE '%$searchName%'";
      $statement = $pdo->query($sql);
    }
    //只搜尋專欄時間和狀態
    if (isset($_POST["searchStatus"], $_POST["dateStart"], $_POST["dateEnd"])) {
      $searchStatus = $_POST["searchStatus"];
      $dateStart = $_POST["dateStart"];
      $dateEnd = $_POST["dateEnd"];
      $sql = "SELECT * FROM article WHERE aStatus = $searchStatus AND aDate BETWEEN '$dateStart' AND DATE_SUB('$dateEnd',INTERVAL -1 DAY)";
      $statement = $pdo->query($sql);
    }
  }
  // 接到目前是第幾頁
  $num_page = $_POST["searchPage"];


  // 計算總筆數
  $searchTotalCount = $statement->rowCount();
  // 總頁數
  $searchTotalPage = ceil($searchTotalCount / $pageRow_count);

  if (isset($_POST["lastSearchPageNumber"])) {
    echo $searchTotalPage;
    return;
  }

  // 第幾頁
  $searchRows =  ($num_page - 1) * $pageRow_count;
  // 一頁顯示五筆
  $sql_limit = $sql . " LIMIT {$searchRows}, {$pageRow_count}";
  $searchStatement = $pdo->query($sql_limit);

  $data = $searchStatement->fetchAll();

  foreach ($data as $index => $row) {
    echo '
        <div class="tr">
          <div class="td"><label class="labelCheck"><input type="checkbox" class="checkBox"><span class="spanCheck"></span></label></div>
          <div class="td">' . date("Y/m/d", strtotime($row["aDate"])) . '</div>
          <div class="td">';
    switch ($row["aStatus"]) {
      case 0:
        echo "<font color='red'>下架</font>";
        break;
      case 1:
        echo "<font color='green'>上架</font>";
        break;
    }
    echo '</div>
          <div class="td aTitle">' . $row["aTitle"] . '</div>
          <div class="td"><button class="editBtn">編輯</button></div>
        </div>
      ';
  }
}

//若有翻頁(上、下一頁)，將頁數更新
if (isset($_POST["page"])) {

  $num_page = $_POST["page"];

  //本頁開始記錄筆數 = (頁數 -1) * 每頁呈現筆數
  $startRow = ($num_page - 1) * $pageRow_count;

  //加上限制顯示筆數的sql語法 本頁開始，每頁顯示筆數
  $sql_limit = $sql . " LIMIT {$startRow}, {$pageRow_count}";


  $statement = $pdo->query($sql_limit);

  $data = $statement->fetchAll();

  foreach ($data as $index => $row) {
    echo '
        <div class="tr">
          <div class="td"><label class="labelCheck"><input type="checkbox" class="checkBox"><span class="spanCheck"></span></label></div>
          <div class="td">' . date("Y/m/d", strtotime($row["aDate"])) . '</div>
          <div class="td">';
    switch ($row["aStatus"]) {
      case 0:
        echo "<font color='red'>下架</font>";
        break;
      case 1:
        echo "<font color='green'>上架</font>";
        break;
    }
    echo '</div>
          <div class="td aTitle">' . $row["aTitle"] . '</div>
          <div class="td"><button class="editBtn">編輯</button></div>
         </div>
      ';
  }
}


// 新增專欄寫進資料庫
// 如果要傳檔案(圖檔之類的) form 要加上enctype="multipart/form-data" 但是這樣$_POST是接不到 要用$_FILES 
if (isset($_FILES["addArticleFileName"])) {

  //Server上的暫存檔路徑含檔名
  $filePathTemp = $_FILES["addArticleFileName"]["tmp_name"];
  //Web根目錄真實路徑
  $serverRoot = $_SERVER["DOCUMENT_ROOT"];
  //欲放置的檔案路徑  要記得路徑要換
  $filePath = $serverRoot . "/CruiseCoder/images/article/" . $_FILES["addArticleFileName"]["name"];
  //將暫存檔搬移到正確位置
  copy($filePathTemp, $filePath);



  $addArticleName = $_POST["addArticleName"];
  // 檔案名稱 這裡很重要post接不到
  $addArticleFileName = $_FILES["addArticleFileName"]["name"];
  $addSummernote = $_POST["addSummernote"];

  // 取得總比數+1
  $totalCount += 1;
  // 補上0
  $addArticleNumber = str_pad($totalCount, 4, "0", STR_PAD_LEFT);
  // 補上A
  $addArticleNumberAll = str_pad($addArticleNumber, 5, "A", STR_PAD_LEFT);

  $sqlAdd = "INSERT INTO article (aNumber, aTitle, aContent, aStatus, aDate, aImage) VALUES (?, ?, ?, 1, NOW(), ?);";

  $addArticle = $pdo->prepare($sqlAdd);
  $addArticle->bindValue(1, $addArticleNumberAll);
  $addArticle->bindValue(2, $addArticleName);
  $addArticle->bindValue(3, $addSummernote);
  $addArticle->bindValue(4, $addArticleFileName);

  $addArticle->execute();

  header("Location: article.php");
}



// 點開編輯
if (isset($_POST["editATitle"])) {
  $editTitleName = $_POST["editATitle"];
  $editArticle = "SELECT * FROM article WHERE aTitle = ?";

  $articleContent = $pdo->prepare($editArticle);
  $articleContent->bindValue(1, $editTitleName);
  $articleContent->execute();

  $data = $articleContent->fetchAll();

  foreach ($data as $index => $row) {

    echo '<div class="articleTop">
      <div class="articleName">
        <p class="articleNumber">專欄編號: ' . $row["aNumber"] . '</p>
        <label>專欄名稱</label>
        <input type="text" class="editArticleTitleName" value="' . $row["aTitle"] . '">
        <label>專欄預覽圖</label>
        <div class="editFileStyle">
          <input type="file" class="editInputFile" name="editInputFile" accept=".jpg,.jpeg,.png,.gif">
          <p class="editPFileName">' . $row["aImage"] . '</p>
          <button type="button"></button>
        </div>
        <p class="imagesPrompt">圖片比例建議為: <span>4:3</span><br>圖片檔案格式應為: <span>JPEG、PNG、GIF</span></p>
        <label>狀態</label>
        <select>';
    switch ($row["aStatus"]) {
      case 0:
        echo '<option value="0" selected>下架</option>
          <option value="1">上架</option>';
        break;
      case 1:
        echo '<option value="0">下架</option>
          <option value="1" selected>上架</option>';
        break;
    }
    echo  '</select>
      </div>
      <div class="articleImageOutline">
        <div class="articleImage"><img src="./../images/article/' . $row["aImage"] . '"></div>
      </div>
    </div>
    <div class="articleBottom">
      <label>專欄內容</label>
      <textarea name="editSummernote" id="editSummernote">' . $row["aContent"] . '</textarea>
    </div>
    <button class="saveBtn">儲存</button>';
  }
}


// 編輯儲存改寫資料庫 
if (isset($_POST["editATitleNumber"], $_POST["editArticleName"], $_POST["editArticleImage"], $_POST["editArticleStatus"], $_POST["editSummernote"])) {

  $editATitleNumber = $_POST["editATitleNumber"];
  $editArticleName = $_POST["editArticleName"];
  $editArticleImage = $_POST["editArticleImage"];
  $editArticleStatus = $_POST["editArticleStatus"];
  $editArticleSummernote = $_POST["editSummernote"];

  $sqlUpdate = "UPDATE article SET aTitle = ?, aImage = ?, aStatus = ?, aContent = ? WHERE aNumber = ?";

  $articleUpdate = $pdo->prepare($sqlUpdate);
  $articleUpdate->bindValue(1, $editArticleName);
  $articleUpdate->bindValue(2, $editArticleImage);
  $articleUpdate->bindValue(3, $editArticleStatus);
  $articleUpdate->bindValue(4, $editArticleSummernote);
  $articleUpdate->bindValue(5, $editATitleNumber);

  $articleUpdate->execute();
}

// 編輯的上傳圖片放到images/article裡
if (isset($_FILES["editInputFile"])) {
  //Server上的暫存檔路徑含檔名
  $filePathTemp = $_FILES["editInputFile"]["tmp_name"];
  //Web根目錄真實路徑
  $serverRoot = $_SERVER["DOCUMENT_ROOT"];
  //欲放置的檔案路徑  要記得路徑要換
  $filePath = $serverRoot . "/CruiseCoderDev/images/article/" . $_FILES["editInputFile"]["name"];
  //將暫存檔搬移到正確位置
  copy($filePathTemp, $filePath);
  header("Location: article.php");
}


// 勾選到的全部更改為下架
if(isset($_POST["checkEditArticlName"])){
  $checkEditArticlName = $_POST["checkEditArticlName"];
  
  $sqlCheckEdit = "UPDATE article SET aStatus = 0 WHERE aTitle = '$checkEditArticlName'";
  $statement = $pdo->query($sqlCheckEdit);
}

// 勾選到的全部更改為上架
if(isset($_POST["putOnArticlName"])){
  $putOnArticlName = $_POST["putOnArticlName"];
  
  $sqlCheckEdit = "UPDATE article SET aStatus = 1 WHERE aTitle = '$putOnArticlName'";
  $statement = $pdo->query($sqlCheckEdit);
}

