<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 預約管理</title>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="./../css/main2.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.2/vue.js"></script>
</head>

<body>
  <div class="backEndWrap reservation">
    <?php
    include('layout/sideBar.php'); 
    ?>

    <main id="main">
      <h2 id="app">預約管理</h2>
      <div class="reservationContent">
        <div class="reservationTime">
          <label>課輔時間</label>
          <div class="dateRange">
            <input type="text" id="datepicker1" readonly="true">
            <p>至</p>
            <input type="text" id="datepicker2">
          </div>
        </div>
        <div class="course">
          <label>課程</label>
          <select name="courseType" id="courseName">
            <option value="all">全部</option>
            <option v-for="courseTitle in courseTitles">{{courseTitle}}</option>
          </select>
        </div>
        <div class="teacher">
          <label>老師</label>
          <select name="teacherName" id="teacherName">
            <option value="all">全部</option>
            <option value="黃語昕">黃語昕</option>
            <option value="SexFat">SexFat</option>
            <option value="許尚媛">許尚媛</option>
            <option value="張互賓">張互賓</option>
            <option value="李偉銘">李偉銘</option>
            <option value="曾景鴻">曾景鴻</option>
          </select>
        </div>
        <button id="search" @click="search">搜尋</button>
      </div>
      <div class="addOrCancle">
        <button class="cancelButton">下架課輔</button>
        <button class="addButton">新增課輔</button>
      </div>
      <div class="table" id="table">
        <div class="tr">
          <div class="td"><label><input @click="allCheck" id="checkAll" type="checkbox" ><span></span></label></div>
          <div class="td">課輔日期</div>
          <div class="td">課程</div>
          <div class="td">老師</div>
          <div class="td">狀態</div>
          <div class="td">預約人數</div>
          <div class="td">操作</div>
        </div>

        <div v-for="(member,index) in dataArr.slice(pages.start,pages.end)"  class="tr">
          <div class="td"><label><input type="checkbox" class="checkbox" ><span></span></label></div>
          <div class="td">{{member.tDate}}</div>
          <div class="td">{{member.cTitle}}</div>
          <div class="td">{{member.mName}}</div>
          <div v-if="member.tStatus == '上架'" style="color: green;" class="td">{{member.tStatus}}</div>
          <div v-else style="color: red;" class="td">{{member.tStatus}}</div>
          <div class="td">{{countPeopel.slice(pages.start,pages.end)[index]}}</div>
          <div class="td"><button class="editBtn" ref="ss" @click="callEditBackAll">編輯</button></div>
          <input type="hidden" v-model="member.tNumber">
        </div>
        <!-- <div class="tr">
          <div class="td"><label><input type="checkbox"><span></span></label></div>
          <div class="td">2020/11/07</div>
          <div class="td">語昕教你重新認識JavaScript</div>
          <div class="td">黃語昕</div>
          <div class="td">上架</div>
          <div class="td">20</div>
          <div class="td"><button class="editBtn">編輯</button></div>
        </div>-->
      </div>

      <div class="addReservationBackAll">
        <div class="addReservationBack"></div>
        <div class="addReservation">
          <img @click="cloceEditBackAll" src="./../images/backEnd/blackCancel.png" alt="圖片未顯示" class="cancelBack" >
          <h2>新增課輔</h2>
          <form action="" class="addReservationContent">
            <div>
              <label>課輔日期</label>
              <input type="text" id="deadline" value="23:59:59">
              <input type="text" id="datepicker3" readonly="true">
            </div>
            <div>
              <label>課程</label>
              <select name="courseType">
                <option value="0" selected disabled>選擇課程</option>
                <option value="1">JavaScript</option>
                <option value="2">HTML</option>
                <option value="3">CSS</option>
              </select>
            </div>
            <div>
              <label>老師</label>
              <select name="teacherName">
                <option value="0" selected disabled>選擇老師</option>
                <option value="1">黃語昕</option>
                <option value="2">黃瀚霆</option>
                <option value="3">許尚媛</option>
              </select>
            </div>
            <button>新增課輔</button>
          </form>
        </div>
      </div>

      <div class="editBackAll">
        <div class="editBack" @click="cloceEditBackAll"></div>
        <div class="edit">
          <img src="./../images/backEnd/blackCancel.png" alt="無法顯示圖片" class="cancelBack" @click="cloceEditBackAll">
          <h2>課輔資訊</h2>
          <input type="hidden" value="" id="courseNumber">
          <form action="" class="editForm">
            <div class="data">
              <label>課輔日期</label>
              <input type="text" id="datepicker4" readonly="true">
              <label>課程</label>
              <select name="courseType" >
                
                <option value="1" selected id="courseType">JavaScript</option>
              </select>
              <label>老師</label>
              <select name="teacherName" >
                <option value="1" selected id="editteacherName">黃語昕</option>
              </select>
              <label>狀態</label>
              <select name="stauts" >
                <option value="1" selected class="stauts">上架</option>
                <option value="1" selected class="stauts">下架</option>
              </select>
            </div>
            <div class="people">
              <p>已預約人數 <span id="people">20</span> 人</p>
              <p class="nameList">預約名單</p>
              <div class="reservationName">
                <div class="nameTable">
                  <div>黃家偉</div>
                  <div>黃家偉</div>
                  <div>黃家偉</div>
                  <div>黃家偉</div>
                  <div>黃家偉</div>
                </div>
                <div class="nameTable">
                  <div>黃家偉</div>
                  <div>黃家偉</div>
                  <div>黃家偉</div>
                  <div>黃家偉</div>
                  <div>黃家偉</div>
                </div>
              </div>
            </div>
            <button>儲存</button>
          </form>
        </div> 
      </div>

      <div class="changePage">
        <button class="lastPage" @click="minusPages">上一頁</button>
        <button class="nextPage" @click="plusPages">下一頁</button>
      </div>
    </main> 
  <div>
  <script src="./../js/datepicker.js"></script>
  <script src="./../js/reservation.js"></script>
</body>

</html>