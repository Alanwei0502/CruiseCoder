<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 訂單管理</title>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="./../css/main2.css">
</head>

<body>
  <div class="backEndWrap order">
    <?php
    include('layout/sideBar.php'); //aside
    ?>

    <main>
      <!-- 在這裡面coding -->
      <h2>訂單管理</h2>
      <div class="filter">
        <div class="date">
          <label for="">購買日期</label>
          <input type="text" id="datepicker1" readonly="true">
        </div>
        <div class="orderNum">
          <label for="">訂單編號</label>
          <input type="text" oninput="value=value.replace(/[\W]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))">
        </div>
        <div class="memberNum">
          <label for="">會員編號</label>
          <input type="text" oninput="value=value.replace(/[\W]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))">
        </div>
        <button>
          搜尋
        </button>
      </div>
      <div class="searchResult">
        <table>
          <thead>
            <tr>
              <th>訂單日期</th>
              <th>訂單編號</th>
              <th>會員編號</th>
              <th>實付金額</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>2020/10/26</td>
              <td>ON2020103000001</td>
              <td>CCM0000001</td>
              <td>3,600</td>
              <td><button class="view">查看</button></td>
            </tr>
            <tr>
              <td>2020/10/26</td>
              <td>ON2020103000001</td>
              <td>CCM0000001</td>
              <td>3,600</td>
              <td><button class="view">查看</button></td>
            </tr>
            <tr>
              <td>2020/10/26</td>
              <td>ON2020103000001</td>
              <td>CCM0000001</td>
              <td>3,600</td>
              <td><button class="view">查看</button></td>
            </tr>
            <tr>
              <td>2020/10/26</td>
              <td>ON2020103000001</td>
              <td>CCM0000001</td>
              <td>3,600</td>
              <td><button class="view">查看</button></td>
            </tr>
            <tr>
              <td>2020/10/26</td>
              <td>ON2020103000001</td>
              <td>CCM0000001</td>
              <td>3,600</td>
              <td><button class="view">查看</button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="changePage">
        <button class="lastPage">上一頁</button>
        <button class="nextPage">下一頁</button>
      </div>
    </main><!-- 在這裡面coding -->
    <!-- 訂單資訊 -->
    <div class="orderInfo">
      <section>
        <h2>訂單資訊</h2>
        <img src="../images/backEnd/blackCancel.png" alt="" class="close">

        <div class="orderList">
          <table>
            <tbody>
              <tr>
                <td class="listTitle">訂單編號</td>
                <td>2020103012000001</td>
              </tr>
              <tr>
                <td class="listTitle">購買日期</td>
                <td>2020/10/30 12：00</td>
              </tr>
              <tr>
                <td class="listTitle">會員編號</td>
                <td>M0001</td>
              </tr>
              <tr>
                <td class="listTitle">會員姓名</td>
                <td>黃家偉</td>
              </tr>
              <tr>
                <td class="listTitle">購買課程</td>
                <td>
                  <p>CSS大補帖—金魚也不太能懂的上拉式選單 1,100</p>
                  <p>CSS大補帖—金魚也不太能懂的上拉式選單 1,100</p>
                  <p>CSS大補帖—金魚也不太能懂的上拉式選單 1,100</p>
                  <p>CSS大補帖—金魚也不太能懂的上拉式選單 1,100</p>
                </td>
              </tr>
              <tr>
                <td class="listTitle">原始金額</td>
                <td>4,400</td>
              </tr>
              <tr>
                <td class="listTitle">CC.Point折抵</td>
                <td>111</td>
              </tr>
              <tr>
                <td class="listTitle">實付金額</td>
                <td>4,289</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- <button class="close">關閉</button> -->
      </section>
    </div>
  </div>
  <script src="./../js/datepicker.js"></script>
  <script src="./../js/order.js"></script>


</body>

</html>