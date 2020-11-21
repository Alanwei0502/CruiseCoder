<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 題庫管理</title>
  <link rel="stylesheet" href="./../css/main2.css">
</head>

<body>
  <div class="backEndWrap quiz">
    <?php
    include('layout/sideBar.php'); //aside
    ?>

    <main>
      <!-- 在這裡面codeing -->
      <h2>題庫管理</h2>
      <section class="searchbar">
        <div>
          <label>領域<br>
            <select>
              <option value="1">html</option>
              <option value="2">css</option>
              <option value="3">Javascript</option>
            </select>
          </label>

          <label>難易度<br>
            <select>
              <option value="0">初級</option>
              <option value="1">中級</option>
              <option value="2">高級</option>
            </select>
          </label>
        </div>

        <button>搜尋</button>

      </section>

      <section class="table">
        <div class="btns">
          <button class="off">下架試題</button>
          <button class="add">新增試題</button>
        </div>

        <table>
          <thead>
            <tr>
              <th><label for="checkAll">全選<input type="checkbox" id="checkAll"><span></span></label></th>
              <th>領域</th>
              <th>難易度</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="checkbox"><span></span></label></td>
              <td>html</td>
              <td>初級</td>
              <td><button>編輯</button></td>
            </tr>
            <tr>
              <td><input type="checkbox"><span></span></td>
              <td>html</td>
              <td>中級</td>
              <td><button>編輯</button></td>
            </tr>
            <tr>
              <td><input type="checkbox"><span></span></td>
              <td>html</td>
              <td>高級</td>
              <td><button>編輯</button></td>
            </tr>
            <tr>
              <td><input type="checkbox"><span></span></td>
              <td>css</td>
              <td>初級</td>
              <td><button>編輯</button></td>
            </tr>
            <tr>
              <td><input type="checkbox"><span></span></td>
              <td>css</td>
              <td>中級</td>
              <td><button>編輯</button></td>
            </tr>
          </tbody>
        </table>
      </section>
    </main><!-- 在這裡面codeing -->
  </div>
  <script src="../js/quizB.js"></script>
</body>

</html>