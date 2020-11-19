<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>宇宙漫遊</title>
  <link rel="stylesheet" href="../css/main.css">
</head>

<body>
  <?php
  include('layout/login.php');
  ?>
  <div class="wrap index">
    <?php
    include('layout/spacebackground.php');
    include('layout/header.php');
    ?>
    <main>
      <div class="banner">
        <div class="container">
          <h1>外星課程</h1>
          <p>
            Cruise Coders 擁有多元的課程<br>
            給需要學習程式語言的人、打造一個友善的學習環境<br>
            透過您的手機、電腦就可以隨時隨地學習！<br>
          </p>
          <a href="#">前往試煉</a>
        </div>

        <img src="../images/Planet1.png" class="Planet1">
        <img src="../images/Planet2.png" class="Planet2">
        <img src="../images/Planet3.png" class="Planet3">
        <img src="../images/Planet4.png" class="Planet4">
      </div>
    </main>
    <?php
    include('layout/footer.php');
    ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="../js/login.js"></script>
</body>

</html>