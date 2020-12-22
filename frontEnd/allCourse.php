<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cruise Coders | 外星課程</title>
  <link rel="stylesheet" href="./../css/main.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
  <link rel="icon" href="../ico.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <div class="wrap allCourse">
    <?php
    include 'layout/spacebackground.php';
    include 'layout/header.php';
    ?>
    <main id="feedBack">
      <div class="top">
        <!-- 搜尋列 -->
        <div class="filter">
          <h2>
            < 外星課程 />
          </h2>
          <form class="search" action="#" method="POST" onkeypress="if (event.keyCode == 13) {return false;}">
            <input type="" placeholder="找課程名稱" id="search" @keyup.13="searchTitle">
            <button type="button" @click="searchTitle">
              <i class="fas fa-search"></i>
            </button>
          </form>
          <div class="category">
            <!-- <button id="hot" data-target="tab1" class="tab -on">熱門課程</button> -->
            <button id="all" data-target="tab3" class="tab -on" @click="allOpen">所有課程</button>
            <button id="fundraising" data-target="tab2" class="tab" @click="fundingOpen">募資課程</button>
            <select class="tab" @change="type" id="SelectId">
              <option value="Cate" class='tab' selected="selected">課程類型</option>
              <option value="html" class="tab">HTML</option>
              <option value="css" class="tab">CSS</option>
              <option value="js" class="tab">JavaScript</option>
              <option value="jquery" class="tab">jQuery</option>
              <option value="sass" class="tab">SASS</option>
              <option value="php" class="tab">PHP</option>
              <option value="mysql" class="tab">MySQL</option>
              <option value="vue" class="tab">Vue</option>
              <option value="github" class="tab">Github</option>
              <option value="gulp" class="tab">Gulp</option>
              <option value="ajax" class="tab">AJAX</option>
              <!-- <option value="ui/ux" class="tab">UI / UX</option> -->
              <option value="xd" class="tab">Adobe XD</option>
              <option value="photoshop" class="tab">PhotoShop</option>



            </select>
          </div>
        </div>
      </div>
      <div class="content">
        <h3>{{courseTitle}}</h3>
        <!-- 課程開始 -->
        <div class="course">
          <!-- 一般課程 -->
          <template v-for="course in courses" v-if="courses">
            <a class="course " :href=`course_Fundraising.php?CourseID=${course.cNumber}` :data-type="course.cType" v-if="course.cStatus == 2">
              <div class="teacherPic">
                <img class="tImg" :src="course.mPhoto" alt="">
              </div>
              <div class="coursePic">
                <img :src="course.cImage" alt="">
              </div>
              <div>
                <div class="favorites">
                  <i class="fas fa-heart" @click.prevent="favorites"></i>
                  <!-- .prevent  解決冒泡事件-->
                </div>
                <div class="c_Main">
                  <p class="title" href="">{{course.cTitle}}</p>
                  <div class="time">課程總長：{{course.cTime}}</div>
                  <div class="courseFundraising">
                    <div class="price">
                      <p class="fundraisingTag">募資中</p>
                      <div class="textFund">
                        <p class="preOrder">預購價</p>
                        <p class="price">NT.{{course.cPrice}}</p>
                      </div>
                    </div>
                    <div class="progressbar">
                      <span class="progress" style="width: 50%;" :data-id="course.cNumber"></span>
                    </div>
                    <div class="funNum">已募資<span class="counts"></span> /10 人</div>
                  </div>
                </div>
              </div>
            </a>
            <a class="course " :href=`course_start_class.php?CourseID=${course.cNumber}` :data-type="course.cType" v-else="course.cStatus == 1">
              <div class="teacherPic">
                <img class="tImg" :src="course.mPhoto" alt="">
              </div>
              <div class="coursePic">
                <img :src="course.cImage" alt="">
              </div>
              <div>
                <div class="favorites">
                  <i class="fas fa-heart" @click.prevent="favorites"></i>
                  <!-- .prevent  解決冒泡事件-->
                </div>
                <div class="c_Main">
                  <p class="title" href="">{{course.cTitle}}</p>
                  <div class="time">課程總長：{{course.cTime}}</div>
                  <div class="courseStart">
                    <div class="comment">
                      <div class="star" :data-star="course.rRate">
                        <i class="far fa-star "></i>
                        <i class="far fa-star "></i>
                        <i class="far fa-star "></i>
                        <i class="far fa-star "></i>
                        <i class="far fa-star "></i>
                      </div>
                      <p class="text">{{course.rCount}}則評價</p>
                    </div>
                    <div class="price">NT.{{course.cPrice}}</div>
                  </div>
                </div>
              </div>
            </a>
          </template>
        </div>
      </div>
      <!--頁碼開始-->
      <!-- <div class="pagenum">
        <ul>
          <li><a href="#">
              <</a> </li> <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">></a></li>
        </ul>
      </div> -->
      <!--頁碼結束-->
    </main>



    <?php
    include 'layout/footer.php';
    ?>
    <script src="../js/vue.js"></script>
    <script src="../js/header.js"></script>
    <script src="../js/allCourse.js"></script>

  </div>
</body>

</html>