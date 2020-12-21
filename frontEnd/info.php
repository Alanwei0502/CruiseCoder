<?php

include("./layout/connect.php");

//建立SQL
$sql = "SELECT * FROM member WHERE mAccount = ?";
$mNumber = $_COOKIE["user"];
//  $mNumber = $_POST['member'];
$statement = $pdo->prepare($sql);
$statement->bindValue(1, "$mNumber");
$statement->execute();
$infoMember = $statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cruise Coders | 個人檔案</title>
  <link rel="stylesheet" href="../css/main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <link rel="icon" href="../ico.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />


</head>

<body>
  <div class="wrap info">


    <?php
    include('layout/spacebackground.php');
    include('layout/header.php');
    ?>

    <main class="info_main">
      <div class="info_title">
        <p>個人檔案</p>
      </div>

      <div class="info_area">
        <div class="op_circle right_cc">
          <!-- 個人檔案照片 -->
          <div class="account_pic">
            <?php
            foreach ($infoMember as $index => $row) {
            ?>
              <img src=<?= $row["mPhoto"] ?> alt="" id="show_image">
            <?php } ?>
          </div>
          <label for="upload_img" class="plusCamera">
            <!-- ＋按鈕圖示 -->
            <img src="../images/info/plusCamera.png" alt="">
            <!-- <input type="submit" value="送出" /> -->
          </label>
        </div>
        <!-- ccPoint 1:100-->
        <div class="left_cc">
          <div class="info_card">

            <form method="post" action="info_Upload.php" enctype="multipart/form-data">
              <div class="editFile">編輯檔案&ensp;<i class="fas fa-edit"></i></div>
              <input type="text" name="account_test" style="display: none;" value="<?= $row["mAccount"] ?>">
              <label>姓名&ensp;:&ensp;
                <input type="text" class="input name_test" value="<?= $row["mName"] ?>" name="mName" readonly unselectable="on" /><span class='error4'></span>
              </label>

              <!-- 帳號設定成無法編輯 -->
              <label>帳號&ensp;:&ensp;
                <input type="text" class="input" value="<?= $row["mAccount"] ?>" name="mAccount" readonly unselectable="on" />
              </label>
              <label class="pwd_test">密碼&ensp;:&ensp;
                <input type="password" class="input pwd_test_1" value="<?= $row["mPassword"] ?>" name="mPassword" readonly unselectable="on" />
                <i class="fas fa-eye"></i><span class='error5'></span>
              </label>

              <!-- 電子信箱設定成無法編輯 -->
              <label>電子信箱&ensp;:&ensp;
                <input type="email" class="input" value="<?= $row["mEmail"] ?>" name="mEmail" readonly unselectable="on" />
              </label>
              <label>手機號碼&ensp;:&ensp;
                <input class="input fone" value="<?= $row["mPhone"] ?>" name="mPhone" readonly unselectable="on" /><span class='error3'></span>
              </label>

              <!-- 選擇檔案按鈕 -->
              <input id="upload_img" type="file" accept="image/jpeg,image/gif,image/png" style="display: none;" name="myFile">
              <button class="sendBtn" type="submit">確認修改</button>
            </form>

          </div>
        </div>
      </div>


      <!-- 第二部分 --- 收藏課程 / 文章 --- 開始 -->
      <div class="info_second" id="infoData">
        <div class="course_area">
          <p class="course_title">
            < 我的課程 />
          </p>
          <div class="course" id="infoCourse">

            <template v-for="course in courses">
              <div class="wrapGeneral">
                <img class="tImg" :src="course.mPhoto" alt="">
                <div class="favorites">
                  <i class="fas fa-heart"></i>
                </div>
                <a class="img" href="course_start_class.php">
                  <img :src="course.cImage" alt="">
                </a>
                <!-- <a href="" class="Main"> -->
                <div class="c_Main">
                  <p class="title">{{course.cTitle}}</p>
                  <div class="time">課程總長：{{course.cTime}}</div>
                  <div class="comment">
                    <div class="star">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <a class="text" href="">24則評價</a>
                  </div>
                  <div class="price">NT.{{course.cPrice}}</div>
                </div>
                <!-- </a> -->
              </div>
            </template>
          </div>


        </div>
        <div class="loveCourse_area">
          <p class="loveCourse_title">
            < 收藏課程 />
          </p>
          <div class="course">

            <!-- 一般課程 -->
            <template v-for="FavCourse in FavCourses" v-if="FavCourse.cStatus">
              <div class="wrapGeneral" v-if="FavCourse.cStatus == '1'">
                <img class="tImg" :src="FavCourse.mPhoto" alt="">
                <div class="favorites">
                  <i class="fas fa-heart"></i>
                </div>
                <a class="img" href="course_start_class.php">
                  <img :src="FavCourse.cImage" :alt="FavCourse.cTitle">
                </a>
                <!-- <a href="" class="Main"> -->
                <div class="c_Main">
                  <p class="title">{{FavCourse.cTitle}}</p>
                  <div class="time">課程總長：{{FavCourse.cTime}}</div>
                  <div class="comment">
                    <div class="star">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <a class="text" href="">24則評價</a>
                  </div>
                  <div class="price">NT.{{FavCourse.cPrice}}</div>
                </div>
                <!-- </a> -->
              </div>

              <!-- 募資課程 -->
              <div class="wrapFundraising" v-else="FavCourse.cStatus == '2'">
                <img class="tImg" :src="FavCourse.mPhoto" alt="">
                <div class="favorites">
                  <i class="fas fa-heart"></i>
                </div>
                <a class="img" href="course_Fundraising.php">
                  <img :src="FavCourse.cImage" :alt="FavCourse.cTitle">
                </a>
                <div class="c_Main">
                  <p class="title">{{FavCourse.cTitle}}</p>
                  <div class="time">課程總長：{{FavCourse.cTime}}</div>
                  <div class="price">
                    <p class="fundraising">募資中</p>
                    <div class="text">
                      <p class="preOrder">預購價</p>
                      <p class="price">NT.{{FavCourse.cPrice}}</p>
                    </div>
                  </div>
                  <div class="progressbar">
                    <span class="progress" style="width: 35%;"></span>
                  </div>
                  <div class="funNum">已募資 1/50 人</div>
                </div>
              </div>
            </template>

          </div>
        </div>

        <!-- ------ 收藏文章 ------ -->

        <p class="love_title">
          < 收藏文章 />
        </p>
        <div class="info_article">
          <template v-for="FavArticle in FavArticles">
            <div class="aic">
              <div class="love_arc"><img src="../images/info/Group 1008@2x.png" alt="love"></div>
              <img :src="'../images/article/' + FavArticle.aImage" :alt="FavArticle.aTitle">
              <div>
                <p>{{FavArticle.aTitle}}</p>
              </div>
            </div>
          </template>
        </div>


        <!-- ------ 徽章成就 ------ -->
        <p class="achievement_title">
          < 徽章成就 />
        </p>
        <div class="info_achievement">
          <p>趕快去語宙試煉挑戰，才可以蒐集徽章喔！</p>
          <div class="big_a">
            <template v-for="allBadge in allBadges">
              <div v-if="allBadge.bLevel == '0'"><img class="badges" :src="'../images/trial/badge/' + allBadge.bBadge" :alt="allBadge.bName" :data-id="allBadge.bNumber"></div>
            </template>

          </div>

          <div class="little_a">
            <template v-for="allBadge in allBadges">
              <div v-if="allBadge.bLevel != '0'"><img class="badges" :src="'../images/trial/badge/' + allBadge.bBadge" :alt="allBadge.bName" :data-id="allBadge.bNumber"></div>
            </template>
          </div>
        </div>
      </div>

    </main>


    <?php
    include('layout/footer.php');
    ?>

  </div>
  <script src="../js/vue.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="../js/header.js"> </script>
  <script src="../js/info.js"></script>
</body>

</html>