<?php
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cruise Coders</title>
  <link rel="stylesheet" href="../css/main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">


</head>
<body>
<?php
  include('layout/login.php');
  ?>
  <div class="wrap info">

  
  <?php
    include('layout/spacebackground.php');
    include('layout/header.php');
    ?>

      <main>
          <div class="info_title"><p>個人檔案</p></div>

          <div class="info_area">
              <div class="op_circle right_cc">

                <div class="account_pic">
                  <img  src="../images/info/street_girl.jpeg" alt="no pic">

                  <div class="camera"><i class="fas fa-camera "></i></div>
                </div>

              </div>
                
              
                <div class="left_cc">
                    <div class="notice_bar">
                        <div><p>目前擁有  19,850 CC Point   = NT$ 198&ensp;  </p></div>
                        <div><img src="../images/info/cc_coin.png" alt="">  </div>
                    </div>    




                    
                    <div class="info_card">
                        <form action="">
                            <div>編輯檔案&ensp;<i class="fas fa-edit"></i></div>
                            <label for="name">姓名&ensp;:&ensp;

                                <input type="text" id="name" />
                            </label>
                            <label for="account">帳號&ensp;:&ensp;

                                <input type="text" id="account"/>
                            </label>
                            <label for="pwd">密碼&ensp;:&ensp;

                                <input type="password" id="pwd" />
                            </label>
                            <label for="birthday">生日&ensp;:&ensp;

                                <input type="date" id="birthday" />
                            </label>
                            <label for="mobile">手機號碼&ensp;:&ensp;

                                <input name="mobile" id="mobile" pattern=’\d{4}[-]\d{6}’ required/>
                            </label>
                            <label for="mail">電子信箱&ensp;:&ensp;

                                <input type="email" id="email" name="email" required/>
                            </label> 

                        </form>
                                           
                    </div>

                </div>

                
              
            </div>

        <div class="info_second">
            <div class="course_area">
                <p class="course_title">< 我的課程 /></p>
            </div>
            <div class="loveCourse_area">
                <p class="loveCourse_title">< 收藏課程 /></p>
            </div>
            <div class="love_title_area">
                <p class="love_title">< 收藏文章 /></p>
            </div>

            
            

            

            
          


          <div class="info_article">
            <div class="aic_1">
                <div class="aic_circle"><i class="fas fa-heart fa-2x"></i></div>
                <img src="../images/info/w_c.jpeg" alt="">  
                <div><p>2020最佳的十個套件推薦</p></div> 
            </div>

            <div class="aic_2">
                <div class="aic_circle"><i class="fas fa-heart fa-2x"></i></div>
                <img src="../images/info/w_c.jpeg" alt=""> 
                <div><p>2020最佳的十個套件推薦</p></div> 

             
            </div>

            <div class="aic_3">
                <div class="aic_circle"><i class="fas fa-heart fa-2x"></i></div>
                <img src="../images/info/w_c.jpeg" alt="">  
                <div><p>2020最佳的十個套件推薦</p></div> 

            </div>


          </div>

          <p class="achievement_title">< 徽章成就 /></p>
          <div class="info_achievement">
              <div class="big_a">
                  <div><img src="../images/big_badge/html5徽章.png" alt=""></div>
                  <div><img src="../images/big_badge/jQ勳章.png" alt=""></div>
                  <div><img src="../images/big_badge/sass.png" alt=""></div>
                  <div><img src="../images/big_badge/css3徽章.png" alt=""></div>
                  <div><img src="../images/big_badge/php徽章.png" alt=""></div>
                  <div><img src="../images/big_badge/js徽章.png" alt=""></div>
                  <div><img src="../images/big_badge/mysql徽章.png" alt=""></div>

                    
              </div>

              <div class="little_a">
                  <div><img src="../images/little_badge/資產 153.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 154.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 155.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 156.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 157.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 158.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 159.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 160.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 160.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 161.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 162.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 163.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 164.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 165.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 166.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 167.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 168.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 169.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 170.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 171.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 172.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 173.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 174.svg" alt=""></div>
                  <div><img src="../images/little_badge/資產 175.svg" alt=""></div>














              </div>
          </div>
        </div>

      </main>
   

    <?php
    include('layout/footer.php');
    ?>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script>

     

  </script>
</body>
</html>