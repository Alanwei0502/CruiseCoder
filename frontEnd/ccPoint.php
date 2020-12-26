<?php
  include("./layout/connect.php");

  if(!isset($_COOKIE["user"])){
    echo '<script>window.location.href = "index.php";</script>';
  }
  //建立SQL
  $sql = "SELECT * FROM member WHERE mAccount = ?";
  // $mNumber = "M0001";
  $mNumber = isset($_COOKIE["user"])?$_COOKIE["user"] : '';
  $statement = $pdo->prepare($sql);
  $statement->bindValue(1 , "$mNumber");
  $statement->execute();
  $infoMember = $statement->fetchAll(PDO::FETCH_ASSOC);
  // echo $infoMember[0]["mSignIn"];
?>

<?php
  // $sql = "SELECT * FROM member WHERE mSignIn = ?";
  // $mSignIn = $_POST["day_img"];
  // $statement = $pdo->prepare($sql);
  // $statement->bindValue(1 , "$mSignIn");
  // $statement->execute();

?> 

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cruise Coders ｜ CC點數</title>
  <link rel="stylesheet" href="../css/main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <link rel="icon" href="../ico.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />


</head>
<body>
<?php
  ?>
  <div class="wrap ccPoint">
  
  <?php
    include('layout/spacebackground.php');
    include('layout/header.php');
    ?>
    <?php
        foreach($infoMember as $index => $row){
    ?>
    <main class="cc_main">
    <input id="abc"type="hidden" value='<?=$row["mSignIn"]?>' name="loginD">
      <div class="noticeGroup">
        <div class="ccNotice">
          
          <p>目前擁有<br>
             <span><?=$row["mCC"] ?></span>CC Point<br>
            = NT$ <?=round($row["mCC"]/100) ?> </p> 
            <?php } ?>
        </div>
      
        <div class="getNotice">
          <p>保持簽到，拿到手軟！</p>
        </div>
      </div>
      <div class="ccPointDay">

        <div class="day_1">
          <p>Day 1</p>
          <img class="day_img" name="day_img" src=".././images/trial/planets/php1.png" alt="">
          <p class="countCoin">40 CC幣</p>
        </div>

        

        <div>
          <p>Day 2</p>
          <img class="day_img" name="day_img" src=".././images/trial/planets/css1.png" alt="">
          <p class="countCoin">50 CC幣</p>
        </div>

        <div>
          <p>Day 3</p>
          <img class="day_img" name="day_img" src=".././images/trial/planets/css3.png" alt="">
          <p class="countCoin">60 CC幣</p>
        </div>

        <div>
          <p>Day 4</p>
          <img class="day_img" name="day_img" src=".././images/trial/planets/jq1.png" alt="">
          <p class="countCoin">70 CC幣</p>
        </div>

        <div>
          <p>Day 5</p>
          <img class="day_img" name="day_img" src=".././images/trial/planets/jq2.png" alt="">
          <p class="countCoin">80 CC幣</p>
        </div>

        <div>
          <p>Day 6</p>
          <img class="day_img" name="day_img" src=".././images/trial/planets/js1.png" alt="">
          <p class="countCoin">90 CC幣</p>
        </div>

        <div>
          <p>Day 7</p>
          <img class="day_img" name="day_img" src=".././images/trial/planets/js3.png" alt="">
          <p class="countCoin">100 CC幣</p>
        </div>
        

      </div>


      






      <!-- cc幣第一屏結束 -->

    
    

    <div class="second_area">
      <p class="ccHow">< 關於 CC Point /></p>
      <div class="tab_container">
  
        <div class="tab_list_block">
          <ul class="tab_list">
            <li class="gg -on"><a href="#" data-target="tab1" class="tab -on">什麼是 CC Point？
            </a></li>
            <li class="gg"><a href="#" data-target="tab2" class="tab">如何兌換</a></li>
            <li class="gg"><a href="#" data-target="tab3" class="tab">如何收集
            </a></li>
            
          </ul>
        </div>
        
        <div class="tab_contents">
          
          <div class="tab tab1 -on">
            <p>為什麼要有 CC Point？</p>
            <div class="cc_coin_out"><img src="../images/ccPoint/cc_coin.png" alt=""></div>
            <div class="tabWords_1">
            <span>無</span>論是培養興趣、學職涯所需還是挑戰自我 <br>
            我們堅信，學習知識技能都可以是生活中的千萬個美好時刻! <br>
            只要在站內完成相關任務，就可以累積 CC Point，並在購買課程時折抵相對應的金額。歡迎你加入 Curise Coders，擁抱愛學愛玩的生活風格，並得到繼續成長的動力。
            </div>
            <img  class="pig" src="../images/ccPoint/pig.png" alt="">
          </div>
          
          <div class="tab tab2">
            <div class="tab2_title">我們相信這些都是學習的重要里程碑 !</div>

            <div class="save_jan">
              <ul>
                <li> Step1. 在結帳頁面勾選「使用 CC」</li>
                <li> Step2. 登登！完成！
                系統將會自動顯示該筆訂單可折抵金額。</li>
              </ul>
            </div>

            <div class="square_words"><img src="../images/ccPoint/2x/資產 6@2x.png" alt=""></div>

            <div class="save_janDiv"><img  class="save_jan_img" src="../images/ccPoint/資產 4.svg" alt=""></div>
          </div>
          
          <div class="tab tab3">
            <div class="tab3_fw">
            每日登入簽到即可獲得CC Point， 持續登入能獲得的CC Point更多唷！
            </div>
          
            <p>「 讓學習變成你的習慣！<br>
              Cruise Coders助你一臂之力！」
            </p>

            <div class="circle_group">
             <ul>
              <li>累積 100 CC Point，可以折抵 NT$1</li>
              <br>
              <li>累積的 CC Point 可在下一次結帳時折抵站內所有課程</li>
             </ul>
            
            </div>
           
            <div class="cc_people">
              <div><img  class="cc_boy" src="../images/ccPoint/cc_boy.svg" alt=""></div>
              <div class="scale_100"><p>100:1</p></div>
              <div><img class="cc_girl" src="../images/ccPoint/cc_girl.svg" alt=""></div>
            </div>



          </div>


        </div>
      </div>
        
      </div>
    
    </main>

    <?php
    include('layout/footer.php');
    ?>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="../js/ccPoint.js"></script>
  <script src="../js/header.js"> </script>
  <script>
    $.ajax({
      type: "POST",
      url: "./ccPoint.php",
      // data: "data",
      // dataType: "",
      success: function (response) {
        
        let check = parseInt($('#abc').val());
        if(check){
          for(k=0;k<check;k++){
            console.log(k+'我是check'+check);
            $('img[name = "day_img"]').eq(k).removeClass();
          }
        }else if(check==0){
          for(let l = 0;l<7;l++){
            $('img[name = "day_img"]').eq(l).removeClass();
             
          }
        }
      }
    });
    
    console.log($('#abc'));



    console.log($('#abc').val());
  </script>




</body>
</html>