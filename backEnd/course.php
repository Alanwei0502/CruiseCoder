<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>宇宙漫遊</title>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="./../css/main2.css">
</head>

<body>
  <div class="backEndWrap course">
    <?php
    include('layout/sideBar.php'); //aside
    ?>

    <main>
      <!-- 在這裡面codeing -->
      <h2>課程管理</h2>
      <div class="filter">
        <div class="date">
          <label for="">上架日期</label>
          <input type="text" id="datepicker1" readonly="true">
        </div>
        <div class="status">
          <label for="">狀態</label>
          <select name="" id="">
            <option value="">已開課</option>
            <option value="">募資中</option>
          </select>

        </div>
        <div class="teachers">
          <label for="">老師</label>
          <select name="" id="">
            <option value="">黃語昕</option>
            <option value="">黃瀚霆</option>
            <option value="">張老闆</option>
            <option value="">李偉銘</option>
          </select>

        </div>
        <div class="courseType">
          <label for="">類型</label>
          <select name="" id="">
            <option value="">HTML</option>
            <option value="">CSS</option>
            <option value="">Javascript</option>
            <option value="">jQuery</option>
            <option value="">SASS</option>
            <option value="">PHP</option>
          </select>

        </div>
        <div class="courseName">
          <label for="">課程名稱</label>
          <input type="text">
        </div>
        <button>
          搜尋
        </button>
      </div>
    </main><!-- 在這裡面codeing -->
  </div>
</body>

</html>