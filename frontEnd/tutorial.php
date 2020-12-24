<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cruise Coder | 蟲洞練功坊</title>
  <link rel="icon" href="../ico.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />
  <link rel="stylesheet" href="./../css/main.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://smtpjs.com/v3/smtp.js">
</script>
</head>

<body>
  <div class="wrap tutorial">
    <?php
    include('layout/spacebackground.php');
    include('layout/header.php');
    ?>
    <main>
      <h2 class="firstH2">&lt;蟲洞練功坊&#47;&gt;</h2>
      <div class="ask">
        <p class="askTitle">親愛的宇宙漫遊者, 您好!</p>
        <div class="askBody">
          <div class="askBodyLeft">
            <div class="top">
              <span>1</span><p>點選月曆中的已購買課程</p>
            </div>
            <div class="bottom">
              <span>2</span><p>確認師資與課程無誤,點選「 我要預約 」</p>
            </div>
          </div>
          <div class="askBodyRight">
            <div class="blue1"></div><p>已購買課程</p>
            <div class="red"></div><p>預約額滿</p>
          </div>
        </div>
      </div>
      <div class="calendar">
        <div class="calendarHead">
          <div class="nowMonth">
            <p id="year"></p>
            <p id="month"></p>
            <img src="./../images/tutorial/arrow.png" id="arrowLeft" class="arrowLeft" alt="圖片無法顯示">
            <img src="./../images/tutorial/arrow.png" id="arrowRight" class="arrowRight" alt="圖片無法顯示">
            <img src="./../images/tutorial/upDownArrow.png" id="upArrow" class="upArrow" alt="圖片無法顯示">
            <img src="./../images/tutorial/upDownArrow.png" id="downArrow" class="downArrow none" alt="圖片無法顯示">
          </div>
          <div class="filterAll" id="conditionChoice">
            <select name="courses" class="filterCourses" @change="condition">
              <option class="textColor" value="all" selected>全部課程</option>
              <option v-for="courseTypes in courseType" :value="courseTypes">{{courseTypes}}</option>
            </select>
            <select name="teachers" class="filterTeachers" @change="condition">
              <option class="textColor" value="all" selected>全部老師</option>
              <option v-for="teacherNames in teacherName" :value="teacherNames">{{teacherNames}}</option>
            </select>
          </div>
          <div class="allOrBuy">
            <button id="alreadyBuy">顯示已購買</button>
            <button id="showAll" class="-on">顯示全部</button>
          </div>
          <div class="smlPhone"></div>
        </div>
        <div class="calendarBody">
          <div class="calendarTitle">
            <p>日</p>
            <p>一</p>
            <p>二</p>
            <p>三</p>
            <p>四</p>
            <p>五</p>
            <p>六</p>
          </div>
          <div id="calendarDate" class="calendarDate"></div>
        </div>
      </div>
      <div class="phoneCourseTime" id="phoneFeedBack">
        <!-- 資料庫feedBack 手機條列式課輔時間 -->
      </div>
      <h2>&lt;如何預約&#47;&gt;</h2>
      <div class="booking">
        <div class="book">
          <div class="bookImages">
            <div class="bookNumber">1</div>
            <img src="./../images/tutorial/book1.jpg" alt="圖片無法顯示">
          </div>
          <p>登入會員</p>
        </div>
        <div class="book">
          <div class="bookImages">
            <div class="bookNumber">2</div>
            <img src="./../images/tutorial/book2.jpg" alt="圖片無法顯示">
          </div>
          <p>購買課程</p>
        </div>
        <div class="book">
          <div class="bookImages">
            <div class="bookNumber">3</div>
            <img src="./../images/tutorial/book3.jpg" alt="圖片無法顯示">
          </div>
          <p>線上預約</p>
        </div>
      </div>
      <h2>&lt;我們的學習空間&#47;&gt;</h2>
      <div class="roomTop">
        <img src="./../images/tutorial/room1.jpg" alt="無法顯示圖片">
        <div>
          <p>我們有專屬於學員的學習空間，只要您有購買我們的課程，即可在該課的輔導時間，申請預約。</p>
          <p>我們的老師，有的曾是業界裡頭的翹楚，程式端的權威，資歷超過十年，有的則是授課經驗豐富，深受同學們的喜愛。</p>
          <p>該門課的老師都會在現場，如果您有任何程式語言上的困難、或是對於課程中有問題，都可以利用預約我們學習空間，在現場直接向老師詢問，幫您解決問題。</p>
        </div>
      </div>
      <div class="roomCenter">
        <div class="cardBack">
          <div class="cardLine">
            <img src="./../images/tutorial/openbook.png" alt="無法顯示圖片">
            <p>提供優質的師資<br>幫助您解開任何問題</p>
          </div>
        </div>
        <div class="cardBack">
          <div class="cardLine">
            <img src="./../images/tutorial/pencil.png" alt="無法顯示圖片" class="pencil">
            <p>提供強大的設備<br>令您打破傳統的限制</p>
          </div>
        </div>
        <div class="cardBack">
          <div class="cardLine">
            <img src="./../images/tutorial/house.png" alt="無法顯示圖片" class="house">
            <p>提供舒適的環境<br>讓您心無旁騖的學習</p>
          </div>
        </div>
      </div>
      <div class="roomBottom">
        <img src="./../images/tutorial/room2.jpg" alt="無法顯示圖片">
        <div>
          <p>我們將學習空間的環境，配置的非常舒適，椅子都是非常符合人體工學的，久坐也不會不舒服，座位有一定的間格，一點都不會擁擠，每次人數上限控制在二十人，令大家都能有詢問老師問題的時間。現場每個人都能有專屬的桌上型電腦可以使用，當然，也可以使用自己的筆電。</p>
          <p>提供這個學習環境，營造一個同儕共同學習的氣氛，同學們間可以互相討論，在這種氛圍上一起學習進步也比自己一個人獨自努力，更加地有效果。</p>
        </div>
      </div>

      <div class="bookLightBoxAll">
        <div class="bookLightBoxBack"></div>
        <div class="bookLightBox">
          <img src="./../images/article/whiteCancel.png" class="cancelBtn" alt="圖片無法顯示">
          <div id="feedBack">
            <!-- 點擊課程會打開的預約燈箱 -->
          </div>
        </div>
      </div>
    </main>
    <?php
    include('layout/footer.php');
    ?>
  </div>
  <script src="../js/vue.js"></script>
  <script src="./../js/header.js"></script>
  <script src="./../js/tutorial.js"></script>
</body>

</html>