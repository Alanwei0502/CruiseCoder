<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 文章管理</title>
  <link rel="stylesheet" href="./../css/main2.css">
</head>

<body>
  <div class="backEndWrap article">
    <?php
    include('layout/sideBar.php'); //aside
    ?>

    <main>
      <!-- 在這裡面codeing -->
      <h2>專欄管理</h2>
      <div class="searchContent">
        <div class="upLoadTime">
          <label>上架日期</label>
          <input type="text" placeholder="2020/11/27">
        </div>
        <div class="status">
          <label>狀態</label>
          <select name="country">
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
          <div class="td"><input type="checkbox"></div>
          <div class="td">上架日期</div>
          <div class="td">狀態</div>
          <div class="td">專欄名稱</div>
          <div class="td">操作</div>
        </div>
        <div class="tr">
          <div class="td"><input type="checkbox"></div>
          <div class="td">2020/11/20</div>
          <div class="td">上架</div>
          <div class="td">十大好書推薦</div>
          <div class="td"><button>編輯</button></div>
        </div>
        <div class="tr">
          <div class="td"><input type="checkbox"></div>
          <div class="td">2020/11/25</div>
          <div class="td">上架</div>
          <div class="td">自學力網站資源</div>
          <div class="td"><button>編輯</button></div>
        </div>
        <div class="tr">
          <div class="td"><input type="checkbox"></div>
          <div class="td">2020/11/27</div>
          <div class="td">上架</div>
          <div class="td">推薦編譯器</div>
          <div class="td"><button>編輯</button></div>
        </div>
        <div class="tr">
          <div class="td"><input type="checkbox"></div>
          <div class="td">2020/12/02</div>
          <div class="td">下架</div>
          <div class="td">軟體推薦資料</div>
          <div class="td"><button>編輯</button></div>
        </div>
        <div class="tr">
          <div class="td"><input type="checkbox"></div>
          <div class="td">2020/12/03</div>
          <div class="td">上架</div>
          <div class="td">好用套件推薦</div>
          <div class="td"><button>編輯</button></div>
        </div>
      </div>

      <ul>
        <li><img src="./../images/pagearrow.png" alt="無法顯示圖片"></li>
        <li>1</li>
        <li>2</li>
        <li>3</li>
        <li class="lastLi"><img src="./../images/pagearrow.png" alt="無法顯示圖片"></li>
      </ul>
    </main><!-- 在這裡面codeing -->
  </div>
</body>

</html>