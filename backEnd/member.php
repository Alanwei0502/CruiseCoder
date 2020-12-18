<?php
  include("../frontEnd/layout/connect.php");
  //建立SQL
  $sql = "SELECT * FROM member";
  // $mNumber = "M0002";
  $statement = $pdo->prepare($sql);
  // $statement->bindValue(1 , "$mNumber");
  $statement->execute();
  $infoMember = $statement->fetchAll();
?>

<?php
$Q = "SELECT * FROM member WHERE mNumber = ?";
$statement = $pdo->prepare($Q);
$statement->execute();
$infoInside = $statement->fetch();

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 會員管理</title>
  <link rel="stylesheet" href="./../css/mainB.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
</head>

<body>
  <div class="backEndWrap member">
    <?php
    include('layout/sideBar.php'); //aside
    ?>

    <main>
      <!-- 在這裡面codeing -->
      <h2>會員管理</h2>
      <section class="searchbar">
          <div class="account_select">
            <label>帳號</label>
            <input type="text" placeholder="請輸入帳號">
          </div>
          
          <div class="memberPower">
            <label>權限</label>
              <select>
                <option value="1">管理員</option>
                <option value="2">老師</option>
                <option value="3">會員</option>
                <option value="4">停權</option>
              </select>
          </div>  
          <div class="poDate">
            <label>註冊日期</label>
            <input type="text" id="datepicker1" readonly="true">
            <i class="fas fa-arrow-right"></i>
            <input type="text" id="datepicker2">
          </div>
          <button>搜尋</button>

      </section>

      <section class="table">

          <table>
            <thead>
              <tr>
                <th>編號</th>
                <th>帳號</th>
                <th>姓名</th>
                <th>權限</th>
                <th>註冊日期</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($infoMember as $index => $row){
              ?>
              <tr>
                <td name=""><?=$row["mNumber"] ?></td>
                <td name=""><?=$row["mAccount"] ?></td>
                <td name="mName" ><?=$row["mName"] ?></td>
                <td name="mLevel"><?=$row["mLevel"] ?></td>
                <td name=""><?=$row["mJoindate"] ?></td>
                <td><button class="btn_modal">編輯</button></td>
              </tr>
              <?php }?>
            </tbody>
          </table>

          <div class="changePage">
            <button class="lastPage">上一頁</button>
            <button class="nextPage">下一頁</button>
          </div>
      </section>

      <div class="overlay">
        <div class="outColor">
          <div class="closeBtn_"><img src="./../images/backEnd/blackCancel.png" alt=""></div>
          <h2>會員資料</h2>

          <div class="weAreInside">
           

            <section class="accountArea">

              <div class="accountImg"><img src="../images/info/street_girl.jpeg" alt=""></div>
              <?php
              foreach($infoInside as $index => $row){
              ?>
              <div class="rightInputArea">
                <div>
                  <label for="">編號</label>
                  <input type="text" value="<?=$row["mNumber"] ?>">
                </div>

                <div>
                  <label for="">權限</label>
                  <select name="ganName" id="gansss">
                    <option value="1" >管理員</option>
                    <option value="2" >老師</option>
                    <option value="3" >會員</option>
                    <option value="4" >停權</option>
                  </select>
                </div>

                <div>
                  <label for="">帳號</label>
                  <input type="text" value="<?=$row["mAccount"] ?>" disabled>
                </div>

                <div>
                  <label for="">姓名 </label>
                  <input type="text" value="<?=$row["mName"] ?>">
                </div>

                <div>
                  <label for="">密碼 </label>
                  <input type="password" value="<?=$row["mPassword"] ?>">
                </div>

                <!-- <div>
                  <label for="">生日  </label>
                  <input type="text" value="">
                </div> -->

                <!-- <div>
                  <label for="">性別 </label>
                  <input type="text" value="男">
                </div> -->

                <div>
                  <label for="">手機號碼 </label>
                  <input type="text" value="<?=$row["mPhone"] ?>">
                </div>
                
                <div>
                  <label for="">E-mail </label>
                  <input type="text" value="<?=$row["mEmail"] ?>" disabled>
                </div>

                <div>
                  <label for="">註冊日期 </label>
                  <input type="text" value="<?=$row["mJoindate"] ?>" disabled>
                </div>

                <div>
                  <label for="">CC.Point </label>
                  <input type="text" value="<?=$row["mCC"] ?>">
                </div>

              </div>
              <?php }?>
            </section>
            <!-------- input end -------->


            <div class="teacherTextarea">
              <label id='forTextarea'>介紹</label>
              <textarea name="" id="" cols="50" rows="20"></textarea>
            </div>

          
            <section class="badge_table">
              <h2>徽章成就</h2>
              <table>
                <thead>
                  <tr>
                    <th>獲得日期</th>
                    <th>徽章類別</th>
                    <th>徽章編號</th>
                  </tr>
                </thead>
                <tbody>
                  <div>
                    <tr>
                      <td>2020/09/26 09:11</td>
                      <td>Java Script</td>
                      <td>Java Script Easy</td>
                    </tr>
                    <tr>
                      <td>2020/09/26 09:11</td>
                      <td>Java Script</td>
                      <td>Java Script Medium</td>
                    </tr>
                    <tr>
                      <td>2020/09/26 09:11</td>
                      <td>Java Script</td>
                      <td>Java Script All</td>
                    </tr>
                    <tr>
                      <td>2020/09/26 09:11</td>
                      <td>Html</td>
                      <td>Html Medium</td>
                    </tr>
                    <tr>
                      <td>2020/09/26 09:11</td>
                      <td>Html</td>
                      <td>Html Medium</td>
                    </tr>
                    <tr>
                      <td>2020/09/26 09:11</td>
                      <td>Html</td>
                      <td>Html Medium</td>
                    </tr>
                    <tr>
                      <td>2020/09/26 09:11</td>
                      <td>Html</td>
                      <td>Html Medium</td>
                    </tr>
                  </div>
                
              </tbody>
            </table>
                
              
            </section>

            <section class="orderDetail_table">
              <h2>近3筆訂單資訊</h2>
              <table>
                <thead>
                  <tr>
                    <th>訂單日期</th>
                    <th>編號</th>
                    <th>總金額</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>2020/10/26 22:35</td>
                    <td>202010260001</td>
                    <td>3,600</td>
                  </tr>
                  <tr>
                    <td>2020/10/26 22:35</td>
                    <td>202010260001</td>
                    <td>3,600</td>
                  </tr>
                  <tr>
                    <td>2020/10/26 22:35</td>
                    <td>202010260001</td>
                    <td>3,600</td>
                  </tr>
                </tbody>
              </table>
            
            </section>

            <section class="courseDetail_table">
              <h2>近3筆課後輔導預約紀錄</h2>
              <table>
                <thead>
                  <tr>
                    <th>預約日期</th>
                    <th>輔導日期</th>
                    <th>輔導課程名稱</th>
                    <th>老師</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>2020/10/07 02:35</td>
                    <td>2020/10/07 </td>
                    <td>HTML</td>
                    <td>張互賓</td>
                  </tr>
                  <tr>
                    <td>2020/10/07 02:35</td>
                    <td>2020/10/07 </td>
                    <td>HTML</td>
                    <td>張互賓</td>
                  </tr>
                  <tr>
                    <td>2020/10/07 02:35</td>
                    <td>2020/10/07 </td>
                    <td>JQuery</td>
                    <td>黃語昕</td>
                  </tr>
                </tbody>
              </table>
            </section>
            <div class="saveBtn">儲存</div>


          </div>

        </div>
        
      </div>

    </main><!-- 在這裡面codeing -->
  </div>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="./../js/datepicker.js"></script>

  <script>
  $(function(){
  
    // 開啟 Modal 彈跳視窗
    $(".btn_modal").on("click", function(){
      $("div.overlay").addClass("-on");
    });
    
    // 關閉 Modal
    $("div.closeBtn_").on("click", function(){
      $("div.overlay").removeClass("-on");
      
    });
    
  });

  $("#gansss").change(function(){
    let checkValue=$("#gansss").val(); 
    if(checkValue == 2){
      $('.teacherTextarea').css("display","block");
      $('.badge_table').css("display","none");
      $('.orderDetail_table').css("display","none");
      $('.courseDetail_table').css("display","none");

    }else{
      $('.teacherTextarea').css("display","none");
      $('.badge_table').css("display","block");
      $('.orderDetail_table').css("display","block");
      $('.courseDetail_table').css("display","block");
    }

  });
  </script>
</body>

</html>