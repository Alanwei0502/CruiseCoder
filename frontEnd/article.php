<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>宇宙漫遊</title>
  <link rel="stylesheet" href="./../css/article.css">
</head>

<body>
  <div class="wrap">
    <?php
    include('layout/spacebackground.php');
    include('layout/header.php');
    ?>
    <main>
      <img src="./../images/article/spaceshipinterior.png" class="spaceshipinterior" alt="圖片無法顯示">
      <div class="penal">
        
        <div class="blur">
          <img src="./../images/article/spaceshipinterior.png" class="spaceshipinteriorBlur" alt="圖片無法顯示">
        </div>
        <img src="./../images/article/panel.png" class="panel" alt="圖片無法顯示">
        <?xml version="1.0" standalone="no"?>
        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
          <polyline points="230,240 160,240 120,290 120,360" class="outLine"/>
          <polyline points="120,500 120,570 160,620 230,620" class="outLine"/>
          <polyline points="1180,500 1180,570 1140,620 1070,620" class="outLine"/>
          <polyline points="1180,360 1180,290 1140,240 1070,240" class="outLine"/>

          <polyline points="100,640 100,740 450,740" class="outLine"/>
          <polyline points="415,690 335,690 325,680 320,710 300,650 270,690 265,680 255,730 250,630 240,710 230,675 227,710 220,680 215,700 210,670 200,690 120,690" class="ecg"/>

        </svg>
        <div class="radar">
          <div class="radarLine"></div>
          <div class="radarShadow"></div>
        </div>
      </div>
      <div class="bluelight">
        
      </div>
    </main>
    <?php
    include('layout/footer.php');
    ?>
  </div>
</body>

</html>