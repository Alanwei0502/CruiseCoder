

<?php
session_start();
  ini_set('display_errors','1');
  error_reporting(E_ALL);
  include("./layout/connect.php");
  $conn = new mysqli($db_host, $db_user, $db_pass, $db_select); //連線資料庫

  $CourseID = $_GET["CourseID"];
  $a_page = $_GET["page"]??'';
  $_SESSION['mNumber'] = $_COOKIE['unumber']??'';
  $_SESSION['user'] = $_COOKIE['user']??null;

  $member = [];
  if(isset($_SESSION['mNumber'])){
    $sql = "SELECT * 
      FROM `member`  
      WHERE mNumber = '".$_SESSION['mNumber']."'";
      if ($result = $conn->query($sql)) {
        if($r = mysqli_fetch_assoc($result)){
          $member = $r;
        }
      }

  }
if(isset($_POST['submit_type'])){
  if($_POST['submit_type'] == 'a_score'){
    $rNumber = date('Ymdmis');
    $rMmeber = $_SESSION['mNumber']??'';
    $rFeedback = $_POST['review_content'];
    $rCourse = $CourseID;
    $rStar = $_POST['review_stars'];
    $sql = "INSERT INTO `review` (`rNumber`, `rCourse`, `rMmeber`, `rFeedback`, `rStar`, `rDate`) VALUES ('".$rNumber."', '".$rCourse."', '".$rMmeber."', '".$rFeedback."', '".$rStar."', now())";
    $r = mysqli_query($conn, $sql);
    // var_dump($conn->error);
  }

  
  // if($_POST['submit_type'] == 'a_lo'){

  //   $mPassword = $_POST['mPassword'];
  //   $mAccount = $_POST['mAccount'];
  //   $sql = "SELECT * FROM `member` WHERE mAccount = '".$mAccount."' AND mPassword = '".$mPassword."'";
  //   $reviewList = [];
  //   if ($result = $conn->query($sql)) {
  //     if($r = mysqli_fetch_assoc($result)){
  //         $_SESSION['mNumber'] = $r['mNumber'];
  //     }
  //   }
  // }

  if($_POST['submit_type'] == 'a_qa'){
    
    $sql = "SELECT count(*) as c
    FROM `discuss` d 
    Order by d.dDate";
    if ($result = $conn->query($sql)) {
      if($r = mysqli_fetch_assoc($result)){
        $dNumber = $r['c'];
      }
    }
    // var_dump($result);
    // var_dump($dNumber);

    $dNumber = 'D'.str_pad(($dNumber+1),4,'0',STR_PAD_LEFT);
    $dMember = $_SESSION['mNumber']??'';
    $dContent = $_POST['dContent'];
    $dCourse = $CourseID;
    $rStar = 5;
    $sql = "INSERT INTO `discuss` (`dNumber`, `dCourse`, `dMember`, `dContent`, `dDate`) VALUES ('".$dNumber."', '".$dCourse."', '".$dMember."', '".$dContent."', now())";
    $r = mysqli_query($conn, $sql);
    // var_dump($conn->error);
  }
}
// var_dump($_SESSION['mNumber']);



  //echo $CourseID;
  //建立SQL
  $sql = "SELECT * FROM `course` WHERE `cNumber` = '".$CourseID."'";
  
  //$sql = "SELECT Lastname, Age FROM Persons ORDER BY Lastname";
  // Perform query
if ($result = mysqli_query($conn, $sql)) {

  // Associative array
  $row = mysqli_fetch_assoc($result);
  //  printf ("%s (%s)\n", $row["cLecturer"],$row["cNumber"], $row["cInfo"]);

  $cLecturer = $row["cLecturer"];
  // echo  $cLecturer;

  $sqlLecturer = "SELECT * FROM `lecturer` WHERE `lNumber` = '".$cLecturer."'";

  // echo $sqlLecturer;
// printf ("%s (%s)\n", $cLecturer);
if ($result2 = mysqli_query($conn, $sqlLecturer)) {

  // Associative array
  $row2 = mysqli_fetch_assoc($result2);
  //  echo $row2["lNumber"];
} else {
  echo "none value";
}

} else {
  echo "none value";
}


$sql3="select * from DISCUSS order by dNumber desc";
$aa=mysqli_query($conn,$sql3);


$sql = "SELECT r.*, m.mName, m.mPhoto 
FROM `review` r 
LEFT JOIN `member` m ON(m.mNumber = r.rMmeber) 
WHERE r.rCourse = '".$CourseID."'";
$reviewList = [];
if ($result = $conn->query($sql)) {
  while($r = mysqli_fetch_assoc($result)){
    $reviewList[] = $r;
  }
}
// var_dump($conn->error);


$sql = "SELECT d.*, m.mName, m.mPhoto 
FROM `discuss` d 
LEFT JOIN `member` m ON(m.mNumber = d.dMember) 
WHERE d.dCourse = '".$CourseID."'";
$discussList = [];
if ($result = $conn->query($sql)) {
  while($r = mysqli_fetch_assoc($result)){
    $discussList[] = $r;
  }
}
// var_dump($sql);
// var_dump($conn->error);
// var_dump($reviewList);

?>



<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cruise Coders | 已開課</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/main.css">
    <!-- <link rel="stylesheet" href="../css/course.css"> -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
      <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
      <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
      <link rel="stylesheet" href="jqueryui/style.css">
<style>
.fa-star.n:not(:hover){
  color: #fff!important;
}
.stars{
  background-image: linear-gradient(to right, rgb(252, 201, 61) 0%, rgb(252, 201, 61) 100%, transparent 100%, rgb(204, 204, 204) 100%, rgb(204, 204, 204) 100%)!important;
}
header.unsetcss {
  display: flex;
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
        <h1><?php  print $row["cTitle"] ?>123 </h1>
        <div class="row-sell">
          <div class="video">
            <!-- <iframe src="<?php echo $row["cVideo"];?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
            <iframe width="560" height="315" src="<?php echo $row["cVideo"];?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <!-- 評分 -->
          <div class="score">
            <div class="nums"></div>
            <!-- data-score 計算好的分數滿分5 data-color 指定的顏色 -->
            <div class="stars" data-score="5" data-color="#fcc93d">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <span>(2)</span>
          </div>
          <div class="infos">
            <!-- 價格 -->
            <div class="price">
              <div class="formal-price">
                <span>售價</span>
                <span>NT$<?php echo $row["cPrice"];?></span>
              </div>
            </div>
            <!-- 按鈕 -->
            <div class="btns">
              <button class="btn submit">立即購買</button>
              <button class="btn fav"><img class="svg" src="../images/course/heart.svg" alt=""></button>
            </div>
          </div>
        </div>
      </section>
      <section id="class-detail">
        <ul class="tab">
          <li class="active"><a id="a_class" href="#class" style:display:flex;display: block;justify-content: center;align-items:center;>課程資訊</a></li>
          <li><a id="a_score" href="#score">課程評價</a></li>
          <li><a id="a_qa" href="#qa">留言發問</a></li>
        </ul>
        <!-- 課程資訊 -->
        <div class="tab-content active" id="class">
          <h2>&lt; 課程資訊 &#47;&gt;</h2>
          <div class="info">
            <h4>關於課程</h4>
            <div class="row">
              <div class="col">
                <img src="../images/course/1.png" alt="">
                <p>課程時長<br><?php echo $row["cTime"];?></p>
              </div>
              <div class="col">
                <img src="../images/course/2.png" alt="">
                <p>目標購買數<br>46為同學</p>
              </div>
              <div class="col">
                <img src="../images/course/3.png" alt="">
                <p>沒有期限<br>不限觀看次數</p>
              </div>
            </div>
          </div>
          <div class="info">
            <h4>課程簡介</h4>
            <p><?php echo $row["cInfo"];?></p>
          </div>
          <div class="info">
            <h4>關於老師 張老闆</h4>
            <div class="person">
              <div class="pic">
                <img src="../images/course/5.png" alt="">
              </div>
              <p><?php echo $row2["lInfo"];?>)</p>
            </div>
          </div>
        </div>
        <!-- 評價 -->
        <div class="tab-content" id="score">
          <h2>&lt; 課程評價 &#47;&gt;</h2>
          <!-- 評分 -->
          <div class="score">
            <div class="nums">5.0</div>
            <div class="col">
              <div class="stars" data-score="5" data-color="#fcc93d">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
              <span>2則評價</span>
            </div>
          </div>
          <!-- 評分內容 -->
          <div class="score-posts comments">
             <!-- 我想評價-->
             <div class="comment post">
              <div class="row">
                <div class="pic"><img src="../images/course/7.png" alt=""></div>
                <div class="content">
                <form id="form_score" method="post" action='?CourseID=<?PHP echo $CourseID?>&page=a_score'>
                  <div class="post-header">
                   <h5><?PHP echo  $member['mName']??'未登入'?></h5>
                  <input name="submit_type" type="hidden" value="a_score">
                  <br><br>
                  </div>
                  <input id="review_stars" name="review_stars" type="hidden" value="0">
                  <div class="stars" data-score="0" data-color="#fcc93d" id="a_stars">
                    <i class="fa fa-star" data-st="1" aria-hidden="true"></i>
                    <i class="fa fa-star" data-st="2" aria-hidden="true"></i>
                    <i class="fa fa-star" data-st="3" aria-hidden="true"></i>
                    <i class="fa fa-star" data-st="4" aria-hidden="true"></i>
                    <i class="fa fa-star" data-st="5" aria-hidden="true"></i>
                  </div>
                  <div class="text-box">
                    <textarea name="review_content" id="" placeholder="我想評價..."></textarea>
                    <button class="btn sent" onclick="$('#form_score').submit()">發表評價</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <?php 
              if($reviewList AND sizeof($reviewList)>0){
                foreach($reviewList as $k=>$v){
            ?>
            <!-- 評分 1 -->
            <div class="comment post">
              <div class="row">
                <div class="pic"><img src="<?PHP echo $v['mPhoto']??'../images/course/7.png'?>" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5><?PHP echo $v['mName']?></h5>
                    <span class="date"><?PHP echo $v['rDate']?></span>
                  </div>
                  <div class="stars" data-score="<?PHP echo $v['rStar']?>" data-color="#fcc93d">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="false"></i>
                  </div>
                  <div class="text-box">
                    <p><?PHP echo $v['rFeedback']?></p>
                  </div>
                </div>
              </div>
            </div>
            <?php
                }
              }
            ?>
            <!-- 查看更多 -->
            <!-- <button class="btn more hide">查看更多</button> -->
          </div>
        </div>
        <!-- 留言 -->
        <div class="tab-content" id="qa">
          <h2>&lt; 留言發問 &#47;&gt;</h2>
          <div class="comments">
            <!-- 發問表單 -->
            <div class="write-comment post">
              <div class="row">
                <div class="pic"><img src="../images/course/5.png" alt=""></div>
                <div class="content">

                
                <div class="post-header">
                <h5><?PHP echo  $member['mName']??'未登入'?></h5>
                </div>
                  <div class="text-box">
                <form id="form_qa" method="post" action='?CourseID=<?PHP echo $CourseID?>&page=a_qa'>
                  <input name="submit_type" type="hidden" value="a_qa">
                    <textarea name="dContent" id="dContent" placeholder="我想發問..."></textarea>
                    <button class="btn sent" onclick="$('#form_qa').submit()">發表留言</button>
                </form>
                  </div>
                </div>
              </div>
            </div>
            

            <?php 
            // var_dump($discussList);
              if($discussList AND sizeof($discussList)>0){
                foreach($discussList as $k=>$v){
            ?>

            <!-- 發問 1 -->
            <div class="comment post">
              <div class="row">
                <div class="pic"><img src="../images/course/5.png" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5><?PHP echo $v['mName']?></h5>
                    <span class="date"><?PHP echo $v['dDate']?></span>
                  </div>
                  <div class="text-box">
                    <p><?PHP echo $v['dContent']?></p>
                  </div>
                </div>
              </div>
              
              <!-- <div class="row reply">
                <div class="pic"><img src="../images/course/5.png" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5>tiffany0622</h5>
                    <span class="date">2020.10.26</span>
                  </div>
                  <div class="text-box">
                    <p>>您好，這堂課程老師也有準備豐富的講義教材，開課時也會提供給學員們下載使用哦，祝您學習愉快。</p>
                  </div>
                </div>
              </div> -->

              <!-- 底部按鈕 -->
            <!--   <div class="btns">
                <button class="btn reply">
                  <img src="../images/course/reply.svg" alt="">
                  <span>回覆</span>
                </button>
              </div> -->
            </div>
            <?php
                }
              }
            ?>
            <!-- 查看更多 -->
            <!-- <button class="btn more">查看更多</button> -->
          </div>
        </div>
      </section>
      <a href="#0" class="top"><img src="" alt=""></a>
    </main>
    <?php
    include('layout/footer.php');
    ?>
    <script src="../js/galaxy.js"></script>
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
        function cart_update(price){
          let pricenums = $('.shoppingTotal>p').data('price')
          let classnums = $('.shoppingTotal>p').data('total')
          let html = "總計 {{num}} 堂課"
          let html2 = "NT$ {{price}}"
          let html3 = ""
          pricenums = pricenums+price
          classnums++
          $('.shoppingTotal>p').attr('data-price',pricenums)
          $('.shoppingTotal>p').attr('data-total',classnums)
          
          html = html.replace(/{{num}}/g,classnums)
          html2 = html2.replace(/{{price}}/,price_style(pricenums.toString().split('')))

          html3 = html+"<br><span>"+html2+"</span>"
          $('.shoppingTotal>p').html(html3)
        }

        // 加入購物車
        $('#class-info .btns .submit').click(function(){
          if(!$(this).hasClass('added')){
            let price_array = class_ajax.price.toString().split('')
            let price = ""
            let total = 0
            price = price_style(price_array)
            // 加入
            let html = '<div class="shopping"><div class="itemImage"><img src="{{image}}" alt="無法顯示圖片"></div><div class="itemText"><p class="courseTitle">{{title}}</p><div class="itemTextButtom"><p class="status">{{status}}</p><p class="price">NT$ {{price}}</p></div></div></div>'
            html = html.replace(/{{image}}/g,class_ajax.image)
                      .replace(/{{title}}/g,class_ajax.name)
                      .replace(/{{status}}/g,class_ajax.status)
                      .replace(/{{price}}/g,price)
            $('header div.headerRight div.shoppingFancybox').prepend(html)
            cart_update(class_ajax.price)
            alert('已加入購物車')
            // 開啟購物車
            $('header div.headerRight div.shoppingFancybox').fadeToggle(300)
            // 其他關閉
            $('header div.headerRight div.memberNav').fadeOut(300)
            $('header div.headerMiddle').fadeOut(300)
            $(this).addClass('added')
            $('#cart-box').attr('data-count',$('#cart-box').data('count')+1)
          }else{
            alert('已加入購物車！')
          }
        })

        //測試用
        $('.fav').click(function(){
          $(this).toggleClass('active')
        })
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
          if($(this).prev('.nums').is($(this).prev('.nums'))){
            $(this).prev('.nums').text(score.toFixed(1))
            // $(this).prev('.nums').text(Math.floor(score/10).toFixed(1))
          }
          if($(this).parent().prev('.nums').is($(this).parent().prev('.nums'))){
            $(this).parent().prev('.nums').text(score.toFixed(1))
          }

        })
      })
    </script>
<!-- 倒數計時 -->
<script type="text/javascript">  
    window.onload=function(){
      var timer=null;
      var show=document.getElementById("show");
      function show_date_time(){   
        var target=new Date("2021/4/16");  
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
          // show.innerHTML=""+daysold+"天"+hrsold+"小時"+minsold+"分"+seconds+"秒";     
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
        let page = '<?PHP echo $a_page?>';
          if(page != '')
            $('#'+page).click();
            
    });
    </script>

    <!-- datepicker -->
      <script>
      $(function() {
        $( "#datepicker" ).datepicker();
      });
      </script>

  </div>
</body>

</html>