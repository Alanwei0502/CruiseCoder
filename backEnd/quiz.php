<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 題庫管理</title>
  <link rel="stylesheet" href="./../css/mainB.css">
  <link rel="icon" href="../ico.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <div class="backEndWrap quiz">
    <?php
    include('layout/sideBar.php');
    ?>

    <!-- -------------------------vue instance------------------------------------- -->
    <main id="main">
      <h2>題庫管理</h2>
      <!-- 搜尋區域 -->
      <section is="searchArea" :fields="fields" @choosed="chooseField"></section>

      <!-- 表格欄位區域 -->
      <section is="tableArea" :fields="fields" :galaxys="galaxys"></section>

      <!-- 編輯新增區域 -->
      <section is="createAndEdit"></section>


      <section class="question"></section>
    </main>
  </div>
  <!-- ----------------------------下方是元件部分------------------------------------ -->




  <!-- 搜尋區域 -->
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





  <!-- 表格區域 -->
  <script type="text/x-template" id="tableArea">
    <section class="table">
        <div class="btns">
          <button id="on" class="on" @click="mutipleOn">上架試題</button>
          <button class="off" @click="mutipleOff">下架試題</button>
          <button class="add" @click="createQuiz">新增試題</button>
        </div>

        <table>
          <thead>
            <tr>
              <th><label><input type="checkbox" id="checkAll" @click="checkAll"><span></span></label></th>
              <th>編號</th>
              <th>領域</th>
              <th>狀態</th>
              <th>操作</th>
            </tr>
          </thead>
          <!-- 欄位區域 -->
          <tbody is="tableRow" :fields="fields" :galaxys="galaxys" :pages="pages"></tbody>

        </table>

        <div class="changePage">
          <button class="lastPage" @click="minusPages">上一頁</button>
          <button class="nextPage" @click="plusPages">下一頁</button>
        </div>
      </section>
  </script>



  <!-- 欄位區域 -->
  <script type="text/x-template" id="tableRow">
    <tbody>
      <template v-for="(galaxy,index) in galaxys.slice(pages.start,pages.end)">
      <tr>
        <td><label><input type="checkbox" class="checkRow" @click="checkOne"><span></span></label></td>
        <td class="gNum">{{galaxy.gNumber}}</td>
        <td class="gNumber">{{galaxy.gName}}</td>
        <td v-if="galaxy.gStatus === '上架'" style="color: green;">{{galaxy.gStatus}}</td>
        <td v-else style="color: red;">{{galaxy.gStatus}}</td>
        <td><button @click="editQuiz">查看</button></td>
      </tr>
      </template>
    </tbody> 
  </script>


  <!-- 新增和編輯的彈跳視窗 -->
  <script type="text/x-template" id="createAndEdit">
    <section class="quizModalBg">
      <section class="quizModal">
        <div class="editArea">
          <!-- 頁籤切換和離開彈跳視窗按鈕 -->
          <div class="navPage">
            <div>
              <h2 @click="openQuiz" class="openQuiz"></h2>
              <h2 @click="openBadge" class="openBadge"></h2>
            </div>
            <img src="../images/backEnd/blackCancel.png" alt="" class="closeModal" @click="closeModal">
          </div>
          <section class="form">
            <!-- 新增試題 -->
            <div id="forQuiz">
              <!-- 輸入領域的input -->
              <div>
                <label for="fieldName">領域</label>
                <input type="text" class="fieldName" placeholder="請輸入新增的領域名稱" v-model.trim="newFeildName">
                <span>星系</span>

                <select class="onOrOff">
                  <option value="1">上架</option>
                  <option value="0">下架</option>
                </select> 
                <button class="quickForDemo" @click="quicktext"></button>
              </div>

              <!-- 輸入題目的input -->
              <template v-for="level in levels.slice(0,3)">
                  <div class="mainEdit" :data-level="level.qLevel">
                    <label>{{level.diff}}星球</label>
              
                    <div class="topFunction">
                      <label>全選<input type="checkbox" class="selectAll" @change="selectAll"><span></span></label>
                      <div>
                        <button type="button" class="deleteQ" @click="deleteQ">刪除題目</button>
                        <button type="button" class="createQ" @click="createQ">新增題目</button>
                      </div>
                    </div>
                    <!-- 要insert的component -->
                  </div>
              </template>
            </div>

            <!-- 新增徽章 -->
            <div id="forBadge">
              <div>
                <label for="fieldName">領域</label>
                <input type="text" class="fieldName" placeholder="請輸入新增的領域名稱" v-model.trim="newFeildName">
                <span>星系</span>
              </div>

              <template v-for="level in levels">
                <section class="planetPic">
                  <p v-if="level.diff == '星系'">{{level.diff}}徽章</p>
                  <p v-else>{{level.diff}}星球</p>
                  
                  <div class="iconImg" v-if="level.diff == '星系'">
                    <label>星系圖</label>
                    <span class="forImage"><img src="../images/backEnd/camera.png" alt=""><input type="file" name="iconImgGal" accept="image/*"></span>
                    <span class="default iconImgGal"></span>
                  </div>

                  <div class="iconImg" v-else>
                    <label>星球圖</label>
                    <span class="forImage"><img src="../images/backEnd/camera.png" alt=""><input type="file" name="iconImg" accept="image/*"></span>
                    <span class="default iconImg"></span>
                  </div>

                  <div class="badgeImg">
                    <label>徽章圖</label>
                    <span class="forImage"><img src="../images/backEnd/camera.png" alt=""><input type="file" name="badgeImg" accept="image/*"></span>
                    <span class="default badgeImg"></span>
                  </div>

                  <div class="bgImg" v-if="level.diff !== '星系'">
                    <label>試題背景圖</label>
                    <span class="forImage"><img src="../images/backEnd/camera.png" alt=""><input type="file" name="bgImg" accept="image/*"></span>
                    <span class="default bgImg"></span>
                  </div>

                  <div v-if="level.diff == '星系'"><label>星系描述</label><textarea name="describe"></textarea></div>
                  <div v-else><label>星球描述</label><textarea name="describe"></textarea></div>
                  
                </section>
              </template>
              <button class="update" @click="update">確認新增</button>
            </div>
          </section>
        </div>
      </section>
    </section>
  </script>


  <script src="../js/vue.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="../js/quizB.js"></script>

</body>

</html>