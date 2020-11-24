<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 文章管理</title>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="./../css/main2.css">
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
          <input type="text" id="datepicker1" readonly="true">
        </div>
        <div class="status">
          <label>狀態</label>
          <select name="status">
            <option value="1" selected>上架</option>
            <option value="2">下架</option>
          </select>
        </div>
        <div class="searchContentBottm">
          <div class="articleName">
            <label>專欄名稱</label>
            <input type="text">
          </div>
          <button>搜尋</button>
        </div>
      </div>
      <div class="addOrCancle">
        <button class="canleButton">下架專欄</button>
        <button class="addButton">新增專欄</button>
      </div>
      <div class="table">
        <div class="tr">
          <div class="td"><label><input type="checkbox"><span></span></label></div>
          <div class="td">上架日期</div>
          <div class="td">狀態</div>
          <div class="td">專欄名稱</div>
          <div class="td">操作</div>
        </div>
        <div class="tr">
          <div class="td"><label><input type="checkbox"><span></span></label></div>
          <div class="td">2020/11/20</div>
          <div class="td">上架</div>
          <div class="td">十大好書推薦</div>
          <div class="td"><button class="editBtn">編輯</button></div>
        </div>
        <div class="tr">
          <div class="td"><label><input type="checkbox"><span></span></label></div>
          <div class="td">2020/11/25</div>
          <div class="td">上架</div>
          <div class="td">自學力網站資源</div>
          <div class="td"><button class="editBtn">編輯</button></div>
        </div>
        <div  class="tr">
          <div class="td"><label><input type="checkbox"><span></span></label></div>
          <div class="td">2020/11/27</div>
          <div class="td">上架</div>
          <div class="td">推薦編譯器</div>
          <div class="td"><button class="editBtn">編輯</button></div>
        </div>
        <div class="tr">
          <div class="td"><label><input type="checkbox"><span></span></label></div>
          <div class="td">2020/12/02</div>
          <div class="td">下架</div>
          <div class="td">軟體推薦資料</div>
          <div class="td"><button class="editBtn">編輯</button></div>
        </div>
        <div class="tr">
          <div class="td"><label><input type="checkbox"><span></span></label></div>
          <div class="td">2020/12/03</div>
          <div class="td">上架</div>
          <div class="td">好用套件推薦</div>
          <div class="td"><button class="editBtn">編輯</button></div>
        </div>
      </div>

      <div class="addArticleBackAll">
        <div class="addArticleBack"></div>
        <div class="addArticle">
          <img src="./../images/backEnd/blackCancel.png" alt="無法顯示圖片" class="cancelBack">
          <h2>新增專欄</h2>
          <form action="" class="addArticleForm">
            <div class="articleTop">
              <div class="articleName">
                <label>專欄名稱</label>
                <input type="text">
                <label>專欄預覽圖</label>
                <div class="fileStyle">
                  <input type="file" class="inputFile">
                  <p class="pFileName"></p>
                  <button></button>
                </div>
              </div>
              <div class="articleImageOutline">
                <div class="articleImage"></div>
              </div>
            </div>
            <div class="articleBottom">
              <label>專欄內容</label>
              <textarea name="" id=""></textarea>
            </div>
          </form>
        </div>
      </div>

      <div class="editArticleBackAll">
        <div class="editArticleBack"></div>
        <div class="editArticle">
          <img src="./../images/backEnd/blackCancel.png" alt="無法顯示圖片" class="cancelBack">
          <h2>專欄資訊</h2>
          <form action="" class="editArticleForm">
            <div class="articleTop">
              <div class="articleName">
                <p class="articleNumber">專欄編號: A0003</p>
                <label>專欄名稱</label>
                <input type="text">
                <label>專欄預覽圖</label>
                <div class="fileStyle">
                  <input type="file" class="inputFile">
                  <p class="pFileName"></p>
                  <button></button>
                </div>
                <label>狀態</label>
                <select>
                  <option value="1" selected>上架</option>
                  <option value="2">下架</option>
                </select>
              </div>
              <div class="articleImageOutline">
                <div class="articleImage"></div>
              </div>
            </div>
            <div class="articleBottom">
              <label>專欄內容</label>
              <textarea name="" id=""></textarea>
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
  <script src="./../js/article.js"></script>
</body>

</html>