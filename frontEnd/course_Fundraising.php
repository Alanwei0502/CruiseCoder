

<?php
  // ini_set('display_errors','1');
  // error_reporting(E_ALL);
  include_once("./layout/connect.php");

  // var_dump($_SESSION);

  
  if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
  }

  if(isset($_POST['ac']) AND $_POST['ac']=='addfa_c'){
    $fcNumber = date('Ymdmis');
    $fcCourse = $_POST['fcCourse'];
    $fcMember = $_POST['fcMember'];
    $sql = "SELECT * 
    FROM `favorite_c`  
    WHERE fcCourse = '".$fcCourse."' AND fcMember = '".$fcMember."'";
    if ($result = $conn->query($sql)) {
      if($r = mysqli_fetch_assoc($result)){
          $sql2 = "DELETE FROM `favorite_c` WHERE fcCourse = '".$fcCourse."' AND fcMember = '".$fcMember."'";
          $rdd = mysqli_query($conn, $sql2);
          echo 'error';
      }else{
          $sql2 = "INSERT INTO `favorite_c` (`fcNumber`, `fcCourse`, `fcMember`, `fcDate`) VALUES ('".$fcNumber."', '".$fcCourse."', '".$fcMember."', now())";
          $raa = mysqli_query($conn, $sql2);
          echo 'success';
      }
    }
    exit;
  }
  



  $CourseID = $_GET["CourseID"];
  $a_page = $_GET["page"]??'';
  // $_SESSION['mNumber'] = $_COOKIE['unumber']??'';
  $_SESSION['user'] = $_COOKIE['user']??null;
  if(!isset($_SESSION['token'])){
    $_SESSION['token'] = '';
  }
  $token = date('Ymdhis');

  $member = [];
  if(isset($_SESSION['user'])){
    $sql = "SELECT * 
      FROM `member`  
      WHERE mAccount = '".$_SESSION['user']."'";
      if ($result = $conn->query($sql)) {
        if($r = mysqli_fetch_assoc($result)){
          $member = $r;
        }
      }
  }

// var_dump($_SESSION['mNumber']);


$course = [];



  //  printf ("%s (%s)\n", $row["cLecturer"],$row["cNumber"], $row["cInfo"]);

  //echo $CourseID;
  //建立SQL
  $sql = "SELECT * FROM `course` WHERE `cNumber` = '".$CourseID."'";
  
  //$sql = "SELECT Lastname, Age FROM Persons ORDER BY Lastname";
  // Perform query
if ($result = mysqli_query($conn, $sql)) {

  // Associative array
  $row = mysqli_fetch_assoc($result);
  //  printf ("%s (%s)\n", $row["cLecturer"],$row["cNumber"], $row["cInfo"]);
  $course = $row;
  $cLecturer = $row["cLecturer"];
  // echo  $cLecturer;

  $sqlLecturer = "SELECT * FROM `lecturer` WHERE `lNumber` = '".$cLecturer."'";

  // echo $sqlLecturer;
// printf ("%s (%s)\n", $cLecturer);
if ($result2 = mysqli_query($conn, $sqlLecturer)) {

  // Associative array
  $row2 = mysqli_fetch_assoc($result2);
  //  echo $row2["lNumber"];


      //老師照片
      $mPhoto = "SELECT `mPhoto` FROM `member` WHERE `mNumber` = '".$cLecturer."'";

      //echo $mPhoto;
      // printf ("%s (%s)\n", $cLecturer);
      if ($result4 = mysqli_query($conn, $mPhoto)) {
  
      // Associative array
      $row4 = mysqli_fetch_assoc($result4);
        //  echo $row4["mPhoto"];
      } else {
      // echo "mPhoto none value";
      }


} else {
  // echo "none value";
}


$sqlfStartdate = "SELECT * FROM `fundraising` WHERE `fCourse` = '".$CourseID."'";

// echo $CourseID;

// echo $sqlLecturer;
// printf ("%s (%s)\n", $cLecturer);
if ($result3 = mysqli_query($conn, $sqlfStartdate)) {

// Associative array
$row3 = mysqli_fetch_assoc($result3);
//  echo $row2["lNumber"];

// echo $row3["fStartdate"];
} else {
// echo " fStartdate none value";
}



} else {
  // echo "none value";
}



$sql3="select * from DISCUSS order by dNumber desc";
$aa=mysqli_query($conn,$sql3);


include('layout/course_class_base_phpcode.php');
?>

<?php
$target_nums = 10;
$target_percent = 10;
$price_1 = "3,000";
$price_2 = "2,400";
?>



<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cruise Coders | <?PHP echo $course['cTitle']?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/main.css">
    <!-- <link rel="stylesheet" href="../css/course.css"> -->
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <style>
      .fa-star.n{
  color: #fff!important;
}
.stars{
  background-image: linear-gradient(to right, rgb(252, 201, 61) 0%, rgb(252, 201, 61) 100%, transparent 100%, rgb(204, 204, 204) 100%, rgb(204, 204, 204) 100%)!important;
}
/* header.unsetcss {
  display: flex; 
} */
.course main #class-detail .tab li a{
  display: block;
}
.course main #class-detail .post .text-box.re_box{
    padding: 0;
    margin-top: 20px;
    margin-bottom: 50px;
}
.course main #class-detail .post .btns .re_box .btn{
    padding: 7px 35px;
    background-color: #fcc93b;
    border: none;
    font-size: 16px;
    border-radius: 7px;
    color: black;
    float: right;
    margin-left: 10px;
    margin-top: 10px;
}
.ddbox{
  display:none;
}
.course main #class-detail .tab li:hover{
  background-color: #fcc93b;
}
.fa-heart{
    color: #d4d4d4!important;
    font-size: 28px;
  }
.fa-heart.active{
  color:red!important;
}
h2 {
    color: white;
    font-size: 48px;
    font-weight: bold;
    font-size: 48px;
    font-weight: bold;
    position: relative;
    margin: 50px 0;
    flex-basis: 100%;
}
h2:before {
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    display: block;
    max-width: 1200px;
    width: 100%;
    border-bottom: 1px solid #fbf7eb;
}
h2:after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    display: block;
    width: 300px;
    width: 25%;
    border-bottom: 10px solid #fcc93b;
}
.rprice,
.rprice span{
    display: inline-block!important;
    text-align: right!important;
}
.btn_style{
    font-size: 32px;
    outline: none;
    transform-style: preserve-3d;
    text-decoration: none;
    color: #182749;
    border-radius: 10.66667px;
    padding: 10.66667px 32px;
    font-weight: bold;
    position: relative;
    overflow: hidden;
    transition: width .3s;
    z-index: 1;
    border-bottom: 5.33333px solid #b47f02;
    border-left: 5.33333px solid #b47f02;
    cursor: pointer;
}
.btn_style:hover {
    color: black;
    transform: translateX(3.2px) translateY(3.2px);
}
.btn_style:active {
    color: black;
    transform: translateX(6.4px) translateY(6.4px);
    padding: 10.66667px 32px;
}
.btn_style:before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #ffb102;
    z-index: -2;
}
.btn_style:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0%;
    height: 100%;
    background-color: #5bc4e3;
    transition: width .3s;
    z-index: -1;
}
.btn_style:hover:after,
.btn_style:active:after {
    width: 100%;
}
.more.btn_style{
    margin: 0 auto;
    display: block;
    margin-top: 35px;
}
.btn_submit.btn_style{
    font-size: 20px;
    float: right;
    margin-top: 10px;
}
.btn_submit2.btn_style{
    font-size: 20px;
    float: right;
    margin-top: 10px;
    margin-left: 10px;
}
.course main #class-info .btns .btn {
  padding: 20px 30px!important;

}
@media screen and (max-width: 768px){
  .btn_style{
      font-size: 20px;
      outline: none;
      transform-style: preserve-3d;
      text-decoration: none;
      color: #182749;
      border-radius: 6.66667px;
      padding: 6.66667px 20px;
      font-weight: bold;
      position: relative;
      overflow: hidden;
      transition: width .3s;
      z-index: 1;
      border-bottom: 3.33333px solid #b47f02;
      border-left: 3.33333px solid #b47f02;
      cursor: pointer;
      margin-top: 20px;
  }
  .btn_style:active {
    color: black;
    transform: translateX(4px) translateY(4px);
    padding: 6.66667px 20px;
}
.btn_style:hover {
    color: black;
    transform: translateX(2px) translateY(2px);
}
  .btn_style:active:before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #ffb102;
      z-index: -2;
  }
.btn_submit.btn_style{
    font-size: 14px;
}
.btn_submit2.btn_style{
    font-size: 14px;
}
}

.course main #class-detail .post .btns .btn{
  outline: none;
}

.course main #class-info .row-sell .infos, .course main #class-info .row-payed .infos{
  width: 50%!important;
  text-align: right;
}
.course main #class-info .row-sell .score, .course main #class-info .row-payed .score{
  width: 50%!important;
}
.course main #class-info .row-sell .formal-price span, .course main #class-info .row-payed .formal-price span{
  font-size: 45px!important;
}
.course main #class-info{
  margin-bottom: 50px;
}
.course main #class-detail .tab{
  margin-bottom: 80px;
}

@media screen and (max-width: 1200px){

}
@media screen and (max-width: 900px){
  .course main #class-info .row-sell .infos, .course main #class-info .row-payed .infos{
    width: 100%!important;
    text-align: right;
  }
  .course main #class-info .row-sell .score, .course main #class-info .row-payed .score{
    width: 100%!important;
    margin-bottom: 18px;
    margin-top: 13px;
  }
  .rprice{
      text-align: left!important;
      width: 50%;
      display: block;
      float: left;
  }
  .course main #class-info .price{
    width: 50%;
    display: block;
    float: left;
  }
  .course main #class-info .row-sell .btns, .course main #class-info .row-payed .btns{
    padding-top: 0;
  }
  .fa-heart{
    font-size: 18px;
  }
  .course main #class-info .row-sell .btns, .course main #class-info .row-payed .btns{
    text-align: right!important;
  }
  .course main #class-info .row-sell .formal-price span, .course main #class-info .row-payed .formal-price span{
    font-size: 24px!important;
  }
  .course main #class-info .row-sell .btns .btn_style, .course main #class-info .row-payed .btns .btn_style{
    font-size: 20px;
    padding: 1.66667px 16px;
    margin-top: 0!important;
  }
  .course main #class-info .row-sell .btns .fav, .course main #class-info .row-payed .btns .fav{
    padding: 7px 12px!important;
    margin-left: 16px;
  }
  .course main #class-info .row-sell .score .nums, .course main #class-info .row-payed .score .nums{
    font-size: 42px;
  }
}

@media screen and (max-width: 768px){
  h2 {
      font-size: 40px;
  }
  .course main #class-detail .tab{
    margin-bottom: 40px;
  }
}
@media screen and (max-width: 576px){
  .course main #class-info .row-sell .video, .course main #class-info .row-payed .video{
    margin-bottom: 0px;
  }
  .course main #class-info .row-sell .score .nums, .course main #class-info .row-payed .score .nums{
    font-size: 28px;
    margin-bottom: 0;
  }
  .course main #class-info .row-sell .score span, .course main #class-info .row-sell .score .stars i, .course main #class-info .row-payed .score span, .course main #class-info .row-payed .score .stars i{
    font-size: 19px;
  }
  h2 {
    font-size: 32px;
    margin: 24px 0;
}
.course main #class-detail .tab{
  margin-bottom: 20px;
}
}
@media screen and (max-width: 500px){
  .course main #class-info .price,.rprice{
    width:100%!important;
    text-align: center!important;
    margin-bottom: 10px;
  }
  .course main #class-info .row-sell .formal-price span, .course main #class-info .row-payed .formal-price span{
    display: inline-block;
    margin: 0 10px;
  }
  .course main #class-info .row-sell .btns, .course main #class-info .row-payed .btns{
    text-align: center!important;
  }
  .course main #class-info{
    margin-bottom: 15px;
  }
}

    </style>

</head>

<body>

  <!-- include('layout/login.php'); -->
  <div class="wrap course">
    <?php
    include('layout/spacebackground.php');
    include('layout/header.php');
    ?>
    <main id="sell-page">
    <section id="class-info">
        <h1><?php  print $row["cTitle"] ?></h1>
        <div class="row">
          <div class="video">
          <iframe width="560" height="315" src="<?php echo $row["cVideo"];?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="infos">
            <h3>募資進行中</h3>
            <!-- bar -->
            <div class="target-bar">
              <div class="nums">目標<?php echo $target_nums; ?>人</div>
              <div class="percent"><?php echo $target_percent; ?>%</div>
              <div class="bar" data-nums="<?php echo $target_nums; ?>" data-percent="<?php echo $target_percent; ?>"></div>
            </div>
            <!-- 倒數時間 -->
            <p>募資倒數</p>
            <div id="show"></div>
            <div class="times">
            <div id="show"  style="     font-weight: 400;    margin: 10px 0;"></div>
              <h4 id="times">27天6小時0分51秒</h4>
             
            </div>
            <!-- 價格 -->
            <div class="price">
              <div class="formal-price">
                <span>正式售價</span>
                <span>NT$<?php echo $row["cPrice"]; ?></span>
              </div>
              <div class="fundraising-price">
                <span>募資售價</span>
                <span>NT$<?php echo $row3["fPrice"]; ?></span>
              </div>
            </div>
            <!-- 按鈕 -->
            <div class="btns">
              <button class="btn_style" id="add_cart">馬上預購</button>
              <button class="btn fav dofa"><i class="fas fa-heart <?PHP echo $is_favorite?'active':''?>"></i></button>
            </div>
            <p class="close">預計結束時間：<?php echo $row3["fStartdate"] ?></p>
          </div>
        </div>
      </section>
      
      <?PHP include('layout/course_class_detail.php');?>
      <a href="#0" class="top"><img src="" alt=""></a>
    </main>
    <?php
    include('layout/footer.php');
    ?>
    <!-- <script src="../js/galaxy.js"></script> -->
    <script src="../js/header.js"></script>
    <!-- <script src="../js/app.min.js"></script> -->
    <script>
      var class_ajax = {
        name: "這樣做設計思考更有用！UX有感提案",
        price: 1200,
        image: "../images/article/panel.png",
        status: "已開課",
      }
    </script>
    </script>
    <!-- <script src="../js/app.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script>
      //svg
      function enable_svg(){
        $('img.svg').each(function(){
          var $img = $(this);
          var imgID = $img.attr('id');
          var imgClass = $img.attr('class');
          var imgURL = $img.attr('src');
          $.get(imgURL, function(data) {
              // Get the SVG tag, ignore the rest   
              var $svg = $(data).find('svg');
        
              // Add replaced image's ID to the new SVG   
              if(typeof imgID !== 'undefined') {
                  $svg = $svg.attr('id', imgID);
              }
              // Add replaced image's classes to the new SVG   
              if(typeof imgClass !== 'undefined') {
                  $svg = $svg.attr('class', imgClass+' replaced-svg');
              }
              // Remove any invalid XML tags as per http://validator.w3.org   
              $svg = $svg.removeAttr('xmlns:a');
              // Check if the viewport is set, if the viewport is not set the SVG wont't scale.   
              if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                  $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
              }
              // Replace image with new SVG   
              $img.replaceWith($svg);
          },'xml');
        });
      }
      enable_svg()

      $(function(){
        // 頭部
        // 會員資訊展開
        $('header div.headerRight img#member').click(function(){
          $('header div.headerRight div.memberNav').fadeToggle(300)
          // 其他關閉
          $('header div.headerRight div.shoppingFancybox').fadeOut(300)
          $('header div.headerMiddle').fadeOut(300)
        })
        $('header div.headerRight img#cart').click(function(){
          $('header div.headerRight div.shoppingFancybox').fadeToggle(300)
          // 其他關閉
          $('header div.headerRight div.memberNav').fadeOut(300)
          $('header div.headerMiddle').fadeOut(300)
        })
        $('header .menu-toggle').click(function(){
          $('header div.headerMiddle').fadeToggle(300)
          // 其他關閉
          $('header div.headerRight div.shoppingFancybox').fadeOut(300)
          $('header div.headerRight div.memberNav').fadeOut(300)
        })

        // 數字更新
        function price_style(array){
          let count = 0
          let price = ""
          for(var i=array.length-1; i>=0;i--){
            count++
            if(count%3==0){
              price = ','+array[i]+price
            }else{
              price = array[i]+price
            }
            // console.log(price)
          }
          return price
        }

        // 購物車更新
        // function cart_update(price){
        //   let pricenums = $('.shoppingTotal>p').data('price')
        //   let classnums = $('.shoppingTotal>p').data('total')
        //   let html = "總計 {{num}} 堂課"
        //   let html2 = "NT$ {{price}}"
        //   let html3 = ""
        //   pricenums = pricenums+price
        //   classnums++
        //   $('.shoppingTotal>p').attr('data-price',pricenums)
        //   $('.shoppingTotal>p').attr('data-total',classnums)
          
        //   html = html.replace(/{{num}}/g,classnums)
        //   html2 = html2.replace(/{{price}}/,price_style(pricenums.toString().split('')))

        //   html3 = html+"<br><span>"+html2+"</span>"
        //   $('.shoppingTotal>p').html(html3)
        // }
  
        $(document).on("click", "#add_cart", function () {
        <?php if($member){?>
              let add_course = '<?PHP echo $CourseID?>'; 
              let list = JSON.parse(localStorage.getItem("lists"));
              if(!list){
                list = [add_course];
              }else{
                list.push(add_course);
              }
              localStorage.setItem("lists", JSON.stringify(list));
              // swal("提示","已加入購物車", "success");
              // window.location.reload();
              swal({
                        title: '提示',
                        text: '已加入購物車',
                        type: 'success'
                    }).then(
                        function () {
                    location.reload()
                    }
                    )
                    
        <?php }else{?>
                swal("請先登入會員!", "登入會員才能使用購物車!", "error");
          <?php }?>
      });
        $('#class-detail .tab li a').click(function(e){
          e.preventDefault()
          $(this).parent().addClass('active')
            .siblings('li').removeClass('active')

          let $content = $($(this).attr('href'))
          $content
            .fadeIn()
            .siblings('.tab-content').fadeOut()
        })

        // 評分星星
        $('.stars[data-score]').each(function(){
          let score = parseInt($(this).data('score'))
          let color = $(this).data('color')
          let ii = 1;
          $(this).find('i').each(function(){
              if(ii>score){
                $(this).addClass('n');
              }
              ii++;
          });
          // console.log(score,color)
          // $(this).css({
          //   backgroundImage: "linear-gradient(to right,"+color+" 0%,"+color+" "+(score/5*100)+"%,transparent "+(score/5*100)+"%,#ccc "+(score/5*100)+"% ,#ccc 100%)"
          // })
          // 分數
          // if($(this).prev('.nums').is($(this).prev('.nums'))){
          //   $(this).prev('.nums').text(score.toFixed(1))
          //   // $(this).prev('.nums').text(Math.floor(score/10).toFixed(1))
          // }
          // if($(this).parent().prev('.nums').is($(this).parent().prev('.nums'))){
          //   $(this).parent().prev('.nums').text(score.toFixed(1))
          // }

        })
      })
    </script>
<!-- 倒數計時 -->
<script type="text/javascript">  
  window.onload=function(){
    var timer=null;
    var show=document.getElementById("times");
    function show_date_time(){   
      var fStartdate = '<?php echo $row3["fStartdate"] ?>';
      var target=new Date(fStartdate);  
      var today=new Date(); 
      var timeold=(target.getTime()-today.getTime());   
      var sectimeold=timeold/1000   
      var secondsold=Math.floor(sectimeold);   
      var msPerDay=24*60*60*1000   
      var e_daysold=timeold/msPerDay   
      var daysold=Math.floor(e_daysold);   
      var e_hrsold=(e_daysold-daysold)*24;   
      var hrsold=Math.floor(e_hrsold);   
      var e_minsold=(e_hrsold-hrsold)*60;   
      var minsold=Math.floor((e_hrsold-hrsold)*60);   
      var seconds=Math.floor((e_minsold-minsold)*60);
      if(daysold<0){   
        document.getElementById("time").innerHTML="逾期,倒數計時已經失效";  
        clearInterval(timer);
      }   
      else{   
        if (daysold<10) {daysold="0"+daysold}   
        if (hrsold<10) {hrsold="0"+hrsold}   
        if (minsold<10) {minsold="0"+minsold}   
        if (seconds<10) {seconds="0"+seconds}     
        // show.innerHTML="距離結束時間還有:"+daysold+"天"+hrsold+"小時"+minsold+"分"+seconds+"秒";     
        show.innerHTML=""+daysold+"天"+hrsold+"小時"+minsold+"分"+seconds+"秒";    
      }   
    }   
    timer=setInterval(show_date_time,1000);
  }  



    $(document).ready(function() {
      $(document).on("click", "#a_stars i", function () {
            $('#review_stars').val($(this).data('st'));
            let score = parseInt($(this).data('st'));
            let ii = 1;
            $('#a_stars i').each(function(){
              if(ii<=score){
                $(this).removeClass('n');
              }
              ii++;
          });
      });

      $(document).on("click", ".ddbox_btn_op", function () {
          $(this).siblings('.ddbox').slideDown();
          return false;
      });
      $(document).on("click", ".ddbox_btn_cl", function () {
          $(this).closest('.ddbox').slideUp();
          return false;
      });

      $(document).on("click", ".dofa", function () {
        <?php if($member){?>
        $.ajax({
            type: 'POST',
            url: "course_start_class.php",
            data: {
                ac: 'addfa_c',
                fcCourse: '<?PHP echo $CourseID?>',
                fcMember: '<?PHP echo $member['mNumber']?>'
            },
            dataType: "text",
            success: function (data) {
                $('.dofa .fas').toggleClass('active');
                if (data.trim() == "success") {
                    swal("提示", "已收藏成功", "success");
                }else if (data.trim() == "error") {
                    swal("提示", "已取消收藏", "success");
                }else{
                    swal("提示", "發生錯誤", "error");
                }
            },error: function (data) {
                    swal("提示", "發生錯誤", "error");
            }
        });
        <?php }else{?>
                swal("請先登入會員!", "登入會員才能使用收藏功能!", "error");
          <?php }?>
      });
      $(".stars.hover_stars .fa-star").hover(function(){
        // console.log($(this).data('st'));
        let st = $(this).data('st');
        let ii = 0;
        $(this).closest('.stars.hover_stars').find('.fa-star').each(function(){
            $('#review_stars').val(st);
            if(ii<st){
              $(this).removeClass('n');
            }else{
              $(this).addClass('n');
            }
            ii++;
        });
      });

        let page = '<?PHP echo $a_page?>';
          if(page != '')
            $('#'+page).click();
            
    });
    </script>
  </div>
</body>

</html>