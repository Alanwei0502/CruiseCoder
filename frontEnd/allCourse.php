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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
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
          <form class="search" action="" method="POST">
            <input type="search" placeholder="找課程名稱">
            <button type="submit">
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
              <option value="jquery" class="tab">jQuery</option>
              <option value="sass" class="tab">SASS</option>
              <option value="php" class="tab">PHP</option>
              <option value="mysql" class="tab">MySQL</option>
              <option value="Vue" data-target="vue" class="tab">Vue</option>
            </select>
          </div>
        </div>
      </div>
      <div class="content">
        <h3>熱門課程</h3>
        <!-- 課程開始 -->
        <div class="course">
          <!-- 一般課程 -->
          <template v-for="course in courses">
            <a class="course " :href=`course_start_class.php?CourseID=${course.cNumber}` :data-type="course.cType">

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
                  <div class="courseFundraising" v-if="course.cStatus == 3">
                    <div class="price">
                      <p class="fundraisingTag">募資中</p>
                      <div class="textFund">
                        <p class="preOrder">預購價</p>
                        <p class="price">NT.900</p>
                      </div>
                    </div>
                    <div class="progressbar">
                      <span class="progress" style="width: 50%;"></span>
                    </div>
                    <div class="funNum">已募資 5/10 人</div>
                  </div>
                  <div class="courseStart" v-else="course.cStatus == 1">
                    <div class="comment">
                      <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
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
      <div class="pagenum">
        <ul>
          <li><a href="#">
              <</a> </li> <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">></a></li>
        </ul>
      </div>
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