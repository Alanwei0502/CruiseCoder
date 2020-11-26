<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 老師管理</title>
  <link rel="stylesheet" href="./../css/main2.css">
</head>

  <body>
    <div class="backEndWrap teacher">
      <?php
      include('layout/sideBar.php'); //aside
      ?>

      <main>
        <!-- 在這裡面codeing -->
        <h2>老師管理</h2>
        <section class="searchbar">
          <div>
            <label>編號
              <input type="text">
            </label>

            <label>名字
              <input type="text">
            </label>
            
          </div>

          <button type="button">搜尋</button>
        </section>

        <section class="table">
          <div class="btns">
            <button class="add">新增老師</button>
          </div>

          <table>
            <thead>
              <tr>
                <th>編號</th>
                <th>姓名</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>M0001</td>
                <td>張老闆</td>
                <td><button>編輯</button></td>
              </tr>
              <tr>
                <td>M0002</td>
                <td>SexFat</td>
                <td><button>編輯</button></td>
              </tr>
              <tr>
                <td>M0003</td>
                <td>黃語昕</td>
                <td><button>編輯</button></td>
              </tr>
              <tr>
                <td>M0004</td>
                <td>李偉銘</td>
                <td><button>編輯</button></td>
              </tr>
              <tr>
                <td>M0005</td>
                <td>曾景鴻</td>
                <td><button>編輯</button></td>
              </tr>
            </tbody>
          </table>

          <div class="changePage">
            <button class="lastPage">上一頁</button>
            <button class="nextPage">下一頁</button>
          </div>
        </section>

        <div class="addBlock">
          <div class="grayBlock"></div>
          <div class="addContent">
            
          </div>
        </div>
        <!-- 在這裡面codeing -->
      </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="../js/teacher.js"></script>
  </body>

</html>