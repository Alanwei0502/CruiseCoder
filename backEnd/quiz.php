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
    include('layout/sideBar.php');
    ?>

    <main>
      <!-- 在這裡面codeing -->
      <h2>題庫管理</h2>
      <section class="searchbar">
        <div>
          <label id="field">領域
            <select>
              <option v-for="field in fields" :value="field.name">{{field.name}}</option>
            </select>
          </label>

          <label id="difficulty">難易度
            <select>
              <option v-for="difficulty in difficulties" :value="difficulty.value">{{difficulty.level}}</option>
            </select>
          </label>
        </div>

        <button id="filterSearch" type="button">搜尋</button>

      </section>

      <section class="table">
        <div class="btns">
          <button class="off">下架試題</button>
          <button class="add">新增試題</button>
        </div>

        <table>
          <thead>
            <tr>
              <th><label><input type="checkbox" class="checkAll"><span></span></label></th>
              <th>領域</th>
              <th>難易度</th>
              <th>狀態</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody id="bodyArea">
            <!-- <my-tr-component></my-tr-component> -->

            <tr>
              <td><label><input type="checkbox"><span></span></label></td>
              <td>html</td>
              <td>初級</td>
              <td>上架</td>
              <td><button>編輯</button></td>
            </tr>
            <tr>
              <td><label><input type="checkbox"><span></span></label></td>
              <td>html</td>
              <td>中級</td>
              <td>上架</td>
              <td><button>編輯</button></td>
            </tr>
            <tr>
              <td><label><input type="checkbox"><span></span></label></td>
              <td>html</td>
              <td>高級</td>
              <td>上架</td>
              <td><button>編輯</button></td>
            </tr>
            <tr>
              <td><label><input type="checkbox"><span></span></label></td>
              <td>css</td>
              <td>初級</td>
              <td>上架</td>
              <td><button>編輯</button></td>
            </tr>
            <tr>
              <td><label><input type="checkbox"><span></span></label></td>
              <td>css</td>
              <td>中級</td>
              <td>上架</td>
              <td><button>編輯</button></td>
            </tr>
          </tbody>
        </table>

        <div class="changePage">
          <button class="lastPage">上一頁</button>
          <button class="nextPage">下一頁</button>
        </div>
      </section>

      <section class="quizModalBg">
        <section class="quizModal">
          <h2>新增試題</h2>
          <img src="../images/backEnd/blackCancel.png" alt="" class="closeModal">
          <section class="overflowArea">
            <form action="quiz.php" method="get">
              <div>
                <span>領域</span>
                <select class="quizField">
                  <option value="" selected>請選擇領域</option>
                  <option value="html">html</option>
                  <option value="css">css</option>
                  <option value="javascript">javascript</option>
                  <option value="jquery">jquery</option>
                  <option value="sass">sass</option>
                  <option value="mysql">mysql</option>
                  <option value="php">php</option>
                  <option value="vue">vue</option>
                  <option value="create" class="createField">新增領域</option>
                </select>
                <input type="text" class="newField" placeholder="請輸入新增的領域名稱">
              </div>

              <div class="galaxyImg">
                <span>星系徽章</span>
                <input type="file" accept="image/*">
              </div>

              <div>
                <span>難易度</span>
                <select class="quizLevel">
                  <option value="1">初級</option>
                  <option value="2">中級</option>
                  <option value="3">高級</option>
                  <option value="0">星系</option>
                </select>
              </div>

              <div class="planetImg">
                <span>星球關卡徽章</span>
                <input type="file" accept="image/*">
              </div>

              <div class="mainEdit">
                <div class="topFunction">
                  <label>全選<input type="checkbox" class="selectAll"><span></span></label>
                  <div>
                    <button type="button" class="deleteQ">刪除題目</button>
                    <button type="button" class="createQ">新增題目</button>
                  </div>
                </div>
              </div>


              <button type="submit">確認新增</button>
            </form>
          </section>
        </section>
      </section>

      <section class="question"></section>


    </main><!-- 在這裡面codeing -->
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.common.dev.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="../js/quizB.js"></script>
</body>

</html>