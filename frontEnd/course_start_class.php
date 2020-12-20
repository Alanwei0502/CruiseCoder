

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
  
  if(isset($_POST['ac']) AND $_POST['ac']=='add_to_cart'){
    $data = [];
    $status = 1;
    $mNumber = $_POST['mNumber'];
    $CourseID = $_POST['CourseID'];

    if(!isset($_SESSION['cart'][$mNumber])){
      $_SESSION['cart'][$mNumber] = [$CourseID];
    }else{
      if(!in_array($CourseID, $_SESSION['cart'][$mNumber]))
          $_SESSION['cart'][$mNumber][] = $CourseID;
    }
    $allCourseID = implode("','",$_SESSION['cart'][$mNumber]);
    $shoppingFancybox = "";
    $count = 0;
    $total = 0;
    
    $cStatus = ['已刪除','已開課','已下架','募資中'];
    $sql = "SELECT *  
    FROM `course`  
    WHERE cNumber IN ('".$allCourseID."') ";
    // var_dump($sql);
    if ($result = $conn->query($sql)) {
      while($r = mysqli_fetch_assoc($result)){
        $shoppingFancybox .= '<li class="shopping"><div class="image"><img src="'.$r['cImage'].'" /></div><div class="info"><p class="courseTitle">'.$r['cTitle'].'</p><div class="itemTextButtom"><p class="status">'.$cStatus[$r['cStatus']].'</p><p class="price">NT$ '.$r['cPrice'].'</p></div></div></li>';
        $count++;
        $total+=$r['cPrice'];
      }
    }
    
    $shoppingTotal = '<p>總計 '.$count.' 堂課<br><span>NT$ '.$total.'</span></p><a href="./checkOut.php">前往購物車</a>';
    $data = [
      'shoppingFancybox' => $shoppingFancybox,
      'shoppingTotal' => $shoppingTotal,
    ];

    echo json_encode(['status'=> $status,'data'=> $data]);
    exit;
  }
  
  if(isset($_POST['ac']) AND $_POST['ac']=='del_to_cart'){
    $data = [];
    $status = 1;
    $mNumber = $_POST['mNumber'];
    $CourseID = $_POST['CourseID'];

    if(!isset($_SESSION['cart'][$mNumber])){
      $_SESSION['cart'][$mNumber] = [];
    }else{
      if(in_array($CourseID, $_SESSION['cart'][$mNumber])){
        foreach($_SESSION['cart'][$mNumber] as $kk=>$vv){
          if($CourseID == $vv)
            unset($_SESSION['cart'][$mNumber][$kk]);
        }
      }
    }
    $allCourseID = implode("','",$_SESSION['cart'][$mNumber]);
    $shoppingFancybox = "";
    $count = 0;
    $total = 0;
    
    $cStatus = ['已刪除','已開課','已下架','募資中'];
    $sql = "SELECT *  
    FROM `course`  
    WHERE cNumber IN ('".$allCourseID."') ";
    // var_dump($sql);
    if ($result = $conn->query($sql)) {
      while($r = mysqli_fetch_assoc($result)){
        $shoppingFancybox .= '<li class="shopping"><div class="image"><img src"'.$r['cImage'].'" /></div><div class="info"><p class="courseTitle">'.$r['cTitle'].'</p><div class="itemTextButtom"><p class="status">'.$cStatus[$r['cStatus']].'</p><p class="price">NT$ '.$r['cPrice'].'</p></div></div></li>';
        $count++;
        $total+=$r['cPrice'];
      }
    }
    
    $shoppingTotal = '<p>總計 '.$count.' 堂課<br><span>NT$ '.$total.'</span></p><a href="./checkOut.php">前往購物車</a>';

    if(!$count>0){
      $shoppingFancybox = '<li class="shopping" style="width: 270px">尚未加入課程</li>';
      $shoppingTotal = '';
    }
    $data = [
      'shoppingFancybox' => $shoppingFancybox,
      'shoppingTotal' => $shoppingTotal,
    ];

    echo json_encode(['status'=> $status,'data'=> $data]);
    exit;
  }




  $CourseID = $_GET["CourseID"];
  $a_page = $_GET["page"]??'';
  $_SESSION['mNumber'] = $_COOKIE['unumber']??'';
  $_SESSION['user'] = $_COOKIE['user']??null;
  if(!isset($_SESSION['token'])){
    $_SESSION['token'] = '';
  }
  $token = date('Ymdhis');

  $member = [];
  if(isset($_SESSION['mNumber'])){
    $sql = "SELECT * 
      FROM `member`  
      WHERE mNumber = '".$_SESSION['mNumber']."'";
      if ($result = $conn->query($sql)) {
        if($r = mysqli_fetch_assoc($result)){
          $member = $r;
          if(!isset($_SESSION['cart'][$member['mNumber']]))
            $_SESSION['cart'][$member['mNumber']] = [];
        }
      }
  }

if(isset($_POST['submit_type']) AND $_POST['token'] != $_SESSION['token']){
  $_SESSION['token'] = $_POST['token'];
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

    $dNumber = 'D'.str_pad(($dNumber+1),4,'0',STR_PAD_LEFT);
    $dMember = $_SESSION['mNumber']??'';
    $dContent = $_POST['dContent'];
    $p_dNumber = $_POST['a_qa_p']??'0';
    $dCourse = $CourseID;
    $sql = "INSERT INTO `discuss` (`dNumber`, `p_dNumber`, `dCourse`, `dMember`, `dContent`, `dDate`) VALUES ('".$dNumber."', '".$p_dNumber."', '".$dCourse."', '".$dMember."', '".$dContent."', now())";
    $r = mysqli_query($conn, $sql);
    // var_dump($conn->error);
  }

}
// var_dump($_SESSION['mNumber']);


$course = [];

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
         echo $row4["mPhoto"];
      } else {
      echo "mPhoto none value";
      }

      

} else {
  echo "none value";
}

} else {
  echo "none value";
}



$sql3="select * from DISCUSS order by dNumber desc";
$aa=mysqli_query($conn,$sql3);

$review_count = 0;
$star = 0;
$rstar = 0;
$is_review = $member?true:false;
$sql = "SELECT r.*, m.mName, m.mPhoto 
FROM `review` r 
LEFT JOIN `member` m ON(m.mNumber = r.rMmeber) 
WHERE r.rCourse = '".$CourseID."' ORDER BY r.rDate desc ";
$reviewList = [];
if ($result = $conn->query($sql)) {
  while($r = mysqli_fetch_assoc($result)){
    if(isset($member['mNumber']) AND $r['rMmeber'] == $member['mNumber']){
      $is_review = false;
    }

    
    $review_count++;
    $rstar += $r['rStar'];

    $reviewList[] = $r;
  }
}


if($rstar > 0){
  $star = $rstar/$review_count;
  $star = number_format($star,1);
}

// var_dump($conn->error);


$is_discuss = $member?true:false;
$sql = "SELECT d.*, m.mName, m.mPhoto 
FROM `discuss` d 
LEFT JOIN `member` m ON(m.mNumber = d.dMember) 
WHERE d.dCourse = '".$CourseID."' AND d.p_dNumber = '0' ORDER BY d.dDate desc ";
$discussList = [];
if ($result = $conn->query($sql)) {
  while($r = mysqli_fetch_assoc($result)){
    
    $sql2 = "SELECT d.*, m.mName, m.mPhoto 
    FROM `discuss` d 
    LEFT JOIN `member` m ON(m.mNumber = d.dMember) 
    WHERE d.p_dNumber = '".$r['dNumber']."' ";
    $discussList2 = [];
    if ($result2 = $conn->query($sql2)) {
      while($r2 = mysqli_fetch_assoc($result2)){
          $discussList2[] = $r2;
      }
    }
    $r['p_discuss'] = $discussList2;
    $discussList[] = $r;
  }
}

$is_favorite = false;
if($member){
  $sql = "SELECT * 
  FROM `favorite_c`  
  WHERE fcCourse = '".$CourseID."' AND fcMember = '".$member['mNumber']."'";
  if ($result = $conn->query($sql)) {
    if($r = mysqli_fetch_assoc($result)){
      $is_favorite = true;
    }
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
    <title>Cruise Coders | <?PHP echo $course['cTitle']?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/main.css">
    <!-- <link rel="stylesheet" href="../css/course.css"> -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../css/style.css">

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
        <div class="row-sell">
          <div class="video">
            <!-- <iframe src="<?php echo $row["cVideo"];?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
            <iframe width="560" height="315" src="<?php echo $row["cVideo"];?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <!-- 評分 -->
          <div class="score ms-r12">
            <div class="nums"><?PHP echo $star?></div>
            <!-- data-score 計算好的分數滿分5 data-color 指定的顏色 -->
            <div class="stars" data-score="<?PHP echo $star?>" data-color="#fcc93d">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <span>(<?PHP echo $review_count?>)</span>
          </div>
          <div class="infos ms-r12">
            <!-- 價格 -->
            <div class="price">
              <div class="formal-price rprice">
                <span>售價</span>
                <span>NT$<?php echo $row["cPrice"];?></span>
              </div>
            </div>
            <!-- 按鈕 -->
            <div class="btns rprice">
              <button class="btn_style" id="add_cart">立即購買</button>
              <button class="btn fav dofa"><i class="fas fa-heart <?PHP echo $is_favorite?'active':''?>"></i></button>
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
                <p>課程類別<br><?php echo $row["cType"];?></p>
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
            <h4>關於老師</h4>
            <div class="person">
              <div class="pic">
                <!-- <img src="../images/course/5.png" alt=""> -->
                <img src="<?php echo $row4["mPhoto"];?>" alt="">
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
            <div class="nums"><?PHP echo $star?></div>
            <div class="col">
              <div class="stars" data-score="<?PHP echo $star?>" data-color="#fcc93d">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
            <span><?PHP echo $review_count?>則評價</span>
            </div>
          </div>
          <!-- 評分內容 -->
          <div class="score-posts comments">
             <!-- 我想評價-->
             <?PHP if($is_review){?>
             <div class="comment post">
              <div class="row">
                <div class="pic"><img src="<?PHP echo $member['mPhoto']??'../images/course/5.png'?>" alt=""></div>
                <div class="content">
                <form id="form_score" method="post" action='?CourseID=<?PHP echo $CourseID?>&page=a_score'>
                  <div class="post-header">
                   <h5><?PHP echo  $member['mName']??'未登入'?></h5>
                  <input name="submit_type" type="hidden" value="a_score">
                  <input name="token" type="hidden" value="<?PHP echo $token?>">
                  <br><br>
                  </div>
                  <input id="review_stars" name="review_stars" type="hidden" value="0">
                  <div class="stars hover_stars" data-score="0" data-color="#fcc93d" id="a_stars">
                    <i class="fa fa-star" data-st="1" aria-hidden="true"></i>
                    <i class="fa fa-star" data-st="2" aria-hidden="true"></i>
                    <i class="fa fa-star" data-st="3" aria-hidden="true"></i>
                    <i class="fa fa-star" data-st="4" aria-hidden="true"></i>
                    <i class="fa fa-star" data-st="5" aria-hidden="true"></i>
                  </div>
                  <div class="text-box">
                    <textarea name="review_content" id="" placeholder="我想評價..."></textarea>
                    <button class="btn_style btn_submit" onclick="$('#form_score').submit()">發表評價</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <?php 
             }
              if($reviewList AND sizeof($reviewList)>0){
                foreach($reviewList as $k=>$v){
            ?>
            <!-- 評分 1 -->
            <div class="comment post">
              <div class="row">
                <div class="pic"><img src="<?PHP echo $v['mPhoto']??'../images/course/5.png'?>" alt=""></div>
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
            <button class="more btn_style">查看更多</button>
          </div>
        </div>
        <!-- 留言 -->
        <div class="tab-content" id="qa">
          <h2>&lt; 留言發問 &#47;&gt;</h2>
          <div class="comments">
          <?PHP if($is_discuss){?>
            <!-- 發問表單 -->
            <div class="write-comment post">
              <div class="row">
                <div class="pic"><img src="<?PHP echo $member['mPhoto']??'../images/course/5.png'?>" alt=""></div>
                <div class="content">

                
                <div class="post-header">
                <h5><?PHP echo  $member['mName']??'未登入'?></h5>
                </div>
                  <div class="text-box">
                <form id="form_qa" method="post" action='?CourseID=<?PHP echo $CourseID?>&page=a_qa'>
                  <input name="submit_type" type="hidden" value="a_qa">
                  <input name="token" type="hidden" value="<?PHP echo $token?>">
                    <textarea name="dContent" id="dContent" placeholder="我想發問..."></textarea>
                    <button class="btn_style btn_submit" onclick="$('#form_qa').submit()">發表留言</button>
                </form>
                  </div>
                </div>
              </div>
            </div>
            

            <?php 
          }
            // var_dump($discussList);
              if($discussList AND sizeof($discussList)>0){
                foreach($discussList as $k=>$v){
            ?>

            <!-- 發問 1 -->
            <div class="comment post">
              <div class="row">
                <div class="pic"><img src="<?PHP echo $v['mPhoto']??'../images/course/5.png'?>" alt=""></div>
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
              
              <?PHP 
                if(sizeof($v['p_discuss'])>0){
                  foreach($v['p_discuss'] as $k2=>$v2){
              ?>
              <div class="row reply">
                <div class="pic"><img src="<?PHP echo $v2['mPhoto']??'../images/course/5.png'?>" alt=""></div>
                <div class="content">
                  <div class="post-header">
                    <h5><?PHP echo $v2['mName']?></h5>
                    <span class="date"><?PHP echo $v2['dDate']?></span>
                  </div>
                  <div class="text-box">
                    <p><?PHP echo $v2['dContent']?></p>
                  </div>
                </div>
              </div>
            <?php
                }
              }
            ?>
              <?PHP if(isset($member) AND $member['mLevel'] == 2){?>
              <!-- 底部按鈕 -->
              <div class="btns">
                <button class="btn reply ddbox_btn_op">
                  <img src="../images/course/reply.svg" alt="">
                  <span>回覆</span>
                </button>
                <div class="text-box ddbox re_box">
                  <form id="form_qa_re_<?PHP  echo $v['dNumber']?>" method="post" action='?CourseID=<?PHP echo $CourseID?>&page=a_qa'>
                    <input name="submit_type" type="hidden" value="a_qa">
                  <input name="token" type="hidden" value="<?PHP echo $token?>">
                    <input name="a_qa_p" type="hidden" value="<?PHP  echo $v['dNumber']?>">
                      <textarea name="dContent" id="dContent" placeholder="我想回覆..."></textarea>
                      <button class="btn_style btn_submit2" onclick="$('#form_qa_re_<?PHP  echo $v['dNumber']?>').submit()">回覆</button>
                      <button class="btn_style btn_submit2 ddbox_btn_cl">取消</button>
                  </form>
                </div>
              </div>
              <?PHP }?>
            </div>
            <?php
                }
              }
            ?>
            <!-- 查看更多 -->
            <button class="more btn_style">查看更多</button>
          </div>
        </div>
      </section>
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

        // 加入購物車
        
      $(document).on("click", "#add_cart", function () {
        <?php if($member){?>
        $.ajax({
            type: 'POST',
            url: "course_start_class.php",
            data: {
                ac: 'add_to_cart',
                CourseID: '<?PHP echo $CourseID?>',
                mNumber: '<?PHP echo $member['mNumber']?>'
            },
            dataType: "json",
            success: function (data) {
              console.log(data);
                if (data.status == 1) {
                    // $('header div.headerRight div.shoppingFancybox').prepend(html)
                    $('.shoppingFancybox').html(data.data.shoppingFancybox);
                    $('.shoppingTotal').html(data.data.shoppingTotal);
                    $('.shoppingCar>label').addClass('on');
                    
                    swal("提示","已加入購物車", "success");
                }else{
                    swal("提示","加入購物車失敗", "error");
                }
            },error: function (data) {
                    swal("提示","加入購物車失敗", "error");
            }
        });
        <?php }else{?>
                swal("請先登入會員!", "登入會員才能使用購物車!", "error");
          <?php }?>
      });

        // $('#class-info .btns .submit').click(function(){
        //   if(!$(this).hasClass('added')){
        //     let price_array = class_ajax.price.toString().split('')
        //     let price = ""
        //     let total = 0
        //     price = price_style(price_array)
        //     // 加入
        //     let html = '<div class="shopping"><div class="itemImage"><img src="{{image}}" alt="無法顯示圖片"></div><div class="itemText"><p class="courseTitle">{{title}}</p><div class="itemTextButtom"><p class="status">{{status}}</p><p class="price">NT$ {{price}}</p></div></div></div>'
        //     html = html.replace(/{{image}}/g,class_ajax.image)
        //               .replace(/{{title}}/g,class_ajax.name)
        //               .replace(/{{status}}/g,class_ajax.status)
        //               .replace(/{{price}}/g,price)
        //     $('header div.headerRight div.shoppingFancybox').prepend(html)
        //     cart_update(class_ajax.price)
        //     alert('已加入購物車')
        //     // 開啟購物車
        //     $('header div.headerRight div.shoppingFancybox').fadeToggle(300)
        //     // 其他關閉
        //     $('header div.headerRight div.memberNav').fadeOut(300)
        //     $('header div.headerMiddle').fadeOut(300)
        //     $(this).addClass('added')
        //     $('#cart-box').attr('data-count',$('#cart-box').data('count')+1)
        //   }else{
        //     alert('已加入購物車！')
        //   }
        // })

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