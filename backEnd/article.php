<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 文章管理</title>
  <link rel="icon" href="../ico.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />
  <!-- datepicker -->
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <!-- summernote -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  <link rel="stylesheet" href="./../css/mainB.css">
</head>

<body>
  <div class="backEndWrap article">
    <?php
    include('layout/sideBar.php'); //aside
    ?>

    <main>
      <h2>專欄管理</h2>
      <div class="searchContent">
        <div class="upLoadTime">
          <label>上架日期</label>
          <div class="dateRange">
            <input type="text" id="datepicker1" readonly="true">
            <p>至</p>
            <input type="text" id="datepicker2" >
          </div>
        </div>
        <div class="status">
          <label>狀態</label>
          <select name="status" class="searchStatus">
            <option value="0">下架</option>
            <option value="1" selected>上架</option>
          </select>
        </div>
        <div class="searchContentBottom">
          <div class="articleName">
            <label>專欄名稱</label>
            <input type="text" class="searchName">
          </div>
          <button id="searchBtn">搜尋</button>
        </div>
      </div>
      <div class="addOrCancle">
        <button class="putOnButton">上架專欄</button>
        <button class="cancleButton">下架專欄</button>
        <button class="addButton">新增專欄</button>
      </div>
      <div class="table" id="table">
        <div class="tr title">
          <div class="td"><label><input type="checkbox" class="allCheckBox"><span></span></label></div>
          <div class="td">上架日期</div>
          <div class="td">狀態</div>
          <div class="td">專欄名稱</div>
          <div class="td">操作</div>
        </div>
        <div id="feedBack">
          <!-- AJAX非同步回傳值位置 -->
        </div>
      </div>

      <div class="addArticleBackAll">
        <div class="addArticleBack"></div>
        <div class="addArticle">
          <img src="./../images/backEnd/blackCancel.png" alt="無法顯示圖片" class="cancelBack">
          <h2>新增專欄</h2>
          <form action="articleR.php" method="post" id="addForm" class="addArticleForm" enctype="multipart/form-data">
            <div class="articleTop">
              <div class="articleName">
                <label>專欄名稱</label>
                <input type="text" name="addArticleName" id="addArticleName">
                <label>專欄預覽圖</label>
                <div class="fileStyle">
                  <input type="file" class="inputFile" name="addArticleFileName" id="addArticleFileName" accept=".jpg,.jpeg,.png,.gif">
                  <p class="pFileName"></p>
                  <button type="button"></button>
                </div>
                <p class="imagesPrompt">圖片比例建議為: <span>4:3</span><br>圖片檔案格式應為: <span>JPEG、PNG、GIF</span></p>
              </div>
              <div class="articleImageOutline">
                <div class="articleImage"></div>
              </div>
            </div>
            <div class="articleBottom">
              <label>專欄內容</label>
              <textarea name="addSummernote" id="addSummernote"></textarea>
            </div>
            <button class="addBtn" id="addArticleBtn" type="button">新增專欄</button>
          </form>
        </div>
      </div>

      <div class="editArticleBackAll">
        <div class="editArticleBack"></div>
        <div class="editArticle">
          <img src="./../images/backEnd/blackCancel.png" alt="無法顯示圖片" class="cancelBack">
          <h2>專欄資訊</h2>
          <form action="articleR.php"  method="post" class="editArticleForm" enctype="multipart/form-data">
            <div id="editArticle">
              <!-- AJAX非同步回傳值位置 -->
            </div>
          </form>
        </div>
      </div>

      

      <div class="changePage">
        <button class="lastPage">上一頁</button>
        <button class="nextPage">下一頁</button>
      </div>
    </main>
  </div>
  <script src="./../js/datepicker.js"></script>
  <script src="./../js/articleB.js"></script>
</body>

</html>