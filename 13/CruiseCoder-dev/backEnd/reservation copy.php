<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 預約管理</title>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="./../css/main2.css">
</head>

<body>
  <div class="backEndWrap reservation">
    <?php
    include('layout/sideBar.php'); 
    ?>  

<main>
      <h2>預約管理</h2>
      <div class="reservationContent">
        <div class="reservationTime">
          <label>課輔時間</label>
          <input type="text" id="datepicker1" readonly="true">
        </div>
        <div class="course">
          <label>課程</label>
          <select name="courseType">
            <option value="1" selected>JavaScript</option>
            <option value="2">HTML</option>
            <option value="3">CSS</option>
          </select>
        </div>
        <div class="teacher">
          <label>老師</label>
          <select name="teacherName">
            <option value="1" selected>黃語昕</option>
            <option value="2">黃瀚霆</option>
            <option value="3">許尚媛</option>
          </select>
        </div>
        <button>搜尋</button>
      </div>
      <div class="addOrCancle">
        <button class="cancelButton">下架課輔</button>
        <button class="add">新增課輔</button>
      </div>
      <div class="table">
        <div class="tr">
          <div class="td"><label><input type="checkbox"><span></span></label></div>
          <div class="td">課輔日期</div>
          <div class="td">課程</div>
          <div class="td">老師</div>
          <div class="td">狀態</div>
          <div class="td">預約人數</div>
          <div class="td">操作</div>
        </div>
        <div class="tr">
          <div class="td"><label><input type="checkbox"><span></span></label></div>
          <div class="td">2020/11/07</div>
          <div class="td">語昕教你重新認識JavaScript</div>
          <div class="td">黃語昕</div>
          <div class="td">上架</div>
          <div class="td">20</div>
          <div class="td"><button class="editBtn">編輯</button></div>
        </div>
        <div class="tr">
          <div class="td"><label><input type="checkbox"><span></span></label></div>
          <div class="td">2020/11/09</div>
          <div class="td">HTML</div>
          <div class="td">張老闆</div>
          <div class="td">下架</div>
          <div class="td">05</div>
          <div class="td"><button class="editBtn">編輯</button></div>
        </div>
        <div class="tr">
          <div class="td"><label><input type="checkbox"><span></span></label></div>
          <div class="td">2020/11/20</div>
          <div class="td">SASS</div>
          <div class="td">黃瀚霆</div>
          <div class="td">上架</div>
          <div class="td">20</div>
          <div class="td"><button class="editBtn">編輯</button></div>
        </div>
        <div class="tr">
          <div class="td"><label><input type="checkbox"><span></span></label></div>
          <div class="td">2020/11/27</div>
          <div class="td">PHP</div>
          <div class="td">曾景宏</div>
          <div class="td">上架</div>
          <div class="td">10</div>
          <div class="td"><button class="editBtn">編輯</button></div>
        </div>
        <div class="tr">
          <div class="td"><label><input type="checkbox"><span></span></label></div>
          <div class="td">2020/11/29</div>
          <div class="td">家偉哥哥帶你飛</div>
          <div class="td">黃家偉</div>
          <div class="td">上架</div>
          <div class="td">20</div>
          <div class="td"><button class="editBtn">編輯</button></div>
        </div>
      </div>


      <!-- 新增課程 -->


      <div class="addBlock addBlockhidden">
          <div class="grayBlock"></div>
          <form class="addContent">
            <h2>新增課程</h2>
            <img src="../images/backEnd/blackCancel.png" alt="" class="closeModal">
            <div>
              <label for="">課程名稱</label>
              <input type="text" value="CSS大補帖—金魚也不太能懂的上拉式選單">
            </div>
            <div>
              <label for="">課程狀態</label>
              <select name="cars" id="cars">
                <option value="volvo">已開課</option>
                <option value="saab">未開課</option>
            </select>
            </div>
            <div>
              <label for="">課程類型</label>
              <input type="text" value="CSS">
            </div>
            <div>
              <label for="">課程價格</label>
              <input type="text">
            </div>
            <div>
              <label for="">募資價格</label>
              <input type="text" value="募資課程才需填寫" disabled="disabled" >
            </div>
            <div>
              <label for="">開課時間</label>
              <input type="text" value="募資課程才需填寫" disabled="disabled" >
            </div>
            <div>
              <label for="">課程時長</label><input type="text" style="width: 80px;"><label for="">小時</label><input type="text" style="width: 80px;"><label for="">分鐘</label>
            </div>
              <div>
              <label for="">課程簡介</label>
              <input type="text">
            </div>
            <div>
              <label>老師姓名</label>
              <select name="courseType">
                <option value="0" selected disabled>張老闆</option>
                <option value="1">張老闆</option>
                <option value="2">張老闆</option>
                <option value="3">張老闆</option>
              </select>
            </div>
            <button type="submit">新增課程</button>
          </form>
        </div>


      <!-- 新增課程 -->

      <div class="addReservationBackAll">
        <div class="addReservationBack"></div>
        <div class="addReservation">
          <img src="./../images/backEnd/blackCancel.png" alt="圖片未顯示" class="cancelBack">
          <h2>新增課輔</h2>
          <form action="" class="addReservationContent">
            <div>
              <label>課輔日期</label>
              <input type="text" id="deadline" value="23:59:59">
              <input type="text" id="datepicker2" readonly="true">
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


       <!-- 課輔資訊 -->

      <div class="editBackAll">
        <div class="editBack"></div>
        <div class="edit">
          <img src="./../images/backEnd/blackCancel.png" alt="無法顯示圖片" class="cancelBack">
          <h2>課輔資訊</h2>
          <form action="" class="editForm">
            <div class="data">
              <label>課輔日期</label>
              <input type="text" id="datepicker3" readonly="true">
              <label>課程</label>
              <select name="courseType">
                <option value="1">JavaScript</option>
                <option value="2">HTML</option>
                <option value="3">CSS</option>
              </select>
              <label>老師</label>
              <select name="teacherName">
                <option value="1" selected>黃語昕</option>
                <option value="2">黃瀚霆</option>
                <option value="3">許尚媛</option>
              </select>
              <label>狀態</label>
              <select name="stauts">
                <option value="1" selected>上架</option>
                <option value="2">下架</option>
              </select>
            </div>
            <div class="people">
              <p>已預約人數 20 人</p>
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
        <button class="lastPage">上一頁</button>
        <button class="nextPage">下一頁</button>
      </div>
    </main> 
  <div>
  <script src="./../js/datepicker.js"></script>
  <script src="./../js/course.js"></script>
</body>

</html>