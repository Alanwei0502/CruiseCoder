<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 題庫管理</title>
  <link rel="stylesheet" href="./../css/main2.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <div class="backEndWrap quiz">
    <?php
    include('layout/sideBar.php');
    ?>

    <main id="main">
      <h2>題庫管理</h2>
      <section is="searchArea" :fields="fields" @choosed="chooseField"></section>

      <section is="tableArea" :fields="fields" :galaxys="galaxys" :pages="pages"></section>

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


    </main>
  </div>





  <script type="text/x-template" id="searchArea">
    <section class="searchbar">
          <div>
            <label>題庫領域 &nbsp;&nbsp;
              <select class="selectField">
                <option value="%星系%" selected>全部星系</option>
                <option v-for="field in fields" :value="field.gName">{{field.gName}}</option>
              </select>
            </label>
          </div>
          <button type="submit"  @click="searchField">搜尋</button>
    </section>
  </script>






  <script type="text/x-template" id="tableArea">
    <section class="table">
        <div class="btns">
          <button class="off">下架試題</button>
          <button class="add">新增試題</button>
        </div>

        <table>
          <thead>
            <tr>
              <th><label><input type="checkbox" class="checkAll"><span></span></label></th>
              <th>編號</th>
              <th>領域</th>
              <th>狀態</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody is="tableRow" :fields="fields" :galaxys="galaxys" :pages.sync="pages"></tbody>
        </table>

        <div class="changePage">
          <button class="lastPage" @click="minusPages">上一頁</button>
          <button class="nextPage" @click="plusPages">下一頁</button>
        </div>
      </section>
  </script>




  <script type="text/x-template" id="tableRow">
    <tbody>
      <template v-for="(galaxy,index) in galaxys.slice(pages[0],pages[1])">
      <tr>
        <td><label><input type="checkbox"><span></span></label></td>
        <td>{{galaxy.gNumber}}</td>
        <td>{{galaxy.gName}}</td>
        <td v-if="galaxy.gStatus === '上架'" style="color: green;">{{galaxy.gStatus}}</td>
        <td v-else style="color: red;">{{galaxy.gStatus}}</td>
        <td><button>編輯</button></td>
        <td>{{pages[0]}} {{pages[1]}}</td>
      </tr>
      </template>  
    </tbody> 
  </script>



  <script src="../js/vue.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="../js/quizB.js"></script>
</body>

</html>