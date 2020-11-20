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
    <div class="backEndWrap reservation">
        <?php
        include('layout/sideBar.php');//aside
        ?>
        <div class="addReservationBack">
          <div class="addReservation">
            <img src="./../images/blackCancel.png" alt="圖片未顯示" class="cancelBack">
            <h2>新增課輔</h2>
            <label>課輔日期</label>
            <input type="text" id="deadline" value="23:59:59">
            <input type="text" id="datepicker2" readonly="true">
            <label>課程</label>
            <select name="courseType">
              <option value="0" selected disabled>選擇課程</option>
              <option value="1">JavaScript</option>
              <option value="2">HTML</option>
              <option value="3">CSS</option>
            </select>
            <label>老師</label>
            <select name="teacherName">
              <option value="0" selected disabled>選擇老師</option>
              <option value="1">黃語昕</option>
              <option value="2">黃瀚霆</option>
              <option value="3">許尚媛</option>
            </select>
            <button>新增課輔</button>
          </div>
        </div>

        <div class="editBack">
          <div class="edit">
            <img src="./../images/blackCancel.png" alt="無法顯示圖片" class="cancelBack">
            <h2>課輔資訊</h2>
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
            <button>儲存</button>
          </div> 
        </div>
    
        <main><!-- 在這裡面codeing -->
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
            <button class="canleButton">下架課輔</button>
            <button class="addButton">新增課輔</button>
          </div>
          <div class="table">
            <div class="tr">
              <div class="td"><input type="checkbox"></div>
              <div class="td">課輔日期</div>
              <div class="td">課程</div>
              <div class="td">老師</div>
              <div class="td">狀態</div>
              <div class="td">預約人數</div>
              <div class="td">操作</div>
            </div>
            <div class="tr">
              <div class="td"><input type="checkbox"></div>
              <div class="td">2020/11/07</div>
              <div class="td">語昕教你重新認識JavaScript</div>
              <div class="td">黃語昕</div>
              <div class="td">上架</div>
              <div class="td">20</div>
              <div class="td"><button class="editBtn">編輯</button></div>
            </div>
            <div class="tr">
              <div class="td"><input type="checkbox"></div>
              <div class="td">2020/11/09</div>
              <div class="td">HTML</div>
              <div class="td">張老闆</div>
              <div class="td">下架</div>
              <div class="td">05</div>
              <div class="td"><button class="editBtn">編輯</button></div>
            </div>
            <div class="tr">
              <div class="td"><input type="checkbox"></div>
              <div class="td">2020/11/20</div>
              <div class="td">SASS</div>
              <div class="td">黃瀚霆</div>
              <div class="td">上架</div>
              <div class="td">20</div>
              <div class="td"><button class="editBtn">編輯</button></div>
            </div>
            <div class="tr">
              <div class="td"><input type="checkbox"></div>
              <div class="td">2020/11/27</div>
              <div class="td">PHP</div>
              <div class="td">曾景宏</div>
              <div class="td">上架</div>
              <div class="td">10</div>
              <div class="td"><button class="editBtn">編輯</button></div>
            </div>
            <div class="tr">
              <div class="td"><input type="checkbox"></div>
              <div class="td">2020/11/29</div>
              <div class="td">家偉哥哥帶你飛</div>
              <div class="td">黃家偉</div>
              <div class="td">上架</div>
              <div class="td">20</div>
              <div class="td"><button class="editBtn">編輯</button></div>
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
    <script src="./../js/datepicker.js"></script>
    <script src="./../js/reservation.js"></script>
  </body>
</html>