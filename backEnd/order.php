<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 訂單管理</title>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
  <link rel="icon" href="../ico.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="./../css/mainB.css">
</head>

<body>
  <div class="backEndWrap orderMain" id="app">
    <?php
    include('layout/sideBar.php'); //aside
    ?>

    <main>
      <!-- 在這裡面coding -->
      <h2>訂單管理</h2>
      <form class="filter">
        <div class="date">
          <label for="">購買日期</label>
          <div class="date_input">
            <input type="text" id="datepicker1" readonly="true" placeholder="請輸入日期">
            <p>至</p>
            <input type="text" id="datepicker2" readonly="true" placeholder="請輸入日期">
          </div>
        </div>
        <div class="orderNum">
          <label for="">訂單編號</label>
          <input type="text" oninput="value=value.replace(/[\W]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" id="orderNum" placeholder="請輸入訂單編號14碼">
        </div>
        <div class="memberNum">
          <label for="">會員編號</label>
          <input type="text" oninput="value=value.replace(/[\W]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" id="memberNum" placeholder="請輸入會員編號">
        </div>
        <button type="button" @click="search">
          搜尋
        </button>
      </form>
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
            <template v-for="(or,index) in order.slice(items.start, items.end)">
              <tr class="row">
                <td class="oDate">{{or.oDate}}</td>
                <td class="oNumber">{{or.oNumber}}</td>
                <td class="oMember">{{or.oMember}}</td>
                <td class="oTotal">{{or.oTotal}}</td>
                <td><button class="view" @click="viewInvoice">查看</button></td>
                <!-- <td v-for="or in order">{{or.oDate}}</td>
              <td v-for="or in order">{{or.oNumber}}</td>
              <td v-for="or in order">{{or.oMember}}</td>
              <td v-for="or in order">{{or.oTotal}}</td> 
              <td><button class="view">查看</button></td> -->
              </tr>
            </template>
            <!-- <tr>
              <td>2020/10/26</td>
              <td>ON2020103000001</td>
              <td>CCM0000001</td>
              <td>3,600</td>
              <td><button class="view">查看</button></td>
            </tr> -->
            <!-- <tr>
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
            </tr> -->
          </tbody>
        </table>
      </div>
      <div class="changePage">
        <button class="lastPage" @click="lastPage">上一頁</button>
        <button class="nextPage" @click="nextPage">下一頁</button>
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
                <td class="oNumberIn">5749920697</td>
              </tr>
              <tr>
                <td class="listTitle">購買日期</td>
                <td class="oDateIn">2020/10/30 12：00</td>
              </tr>
              <tr>
                <td class="listTitle">會員編號</td>
                <td class="oMemberIn">M0001</td>
              </tr>
              <tr>
                <td class="listTitle">會員姓名</td>
                <td class="mNameIn">黃家偉</td>
              </tr>
              <tr>
                <td class="listTitle">購買課程</td>
                <td>
                  <template v-for="inv in invlist">
                    <p>{{inv.cTitle}}<span>{{inv.cPrice}}</span> </p>
                  </template>
                </td>

              </tr>
              <tr>
                <td class="listTitle">原始金額</td>
                <td class="rtIn">4,400</td>
              </tr>
              <tr>
                <td class="listTitle">CC.Point折抵</td>
                <td class="occIn">111</td>
              </tr>
              <tr>
                <td class="listTitle">實付金額</td>
                <td class="oTotalIn">4,289</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- <button class="close">關閉</button> -->
      </section>
    </div>
  </div>
  <script src="./../js/vue.js"></script>
  <script src="./../js/order.js"></script>
  <script src="./../js/datepicker.js"></script>


</body>

</html>