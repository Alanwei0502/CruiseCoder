<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cruise Coders | 宇宙漫遊</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
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
            <!-- banner開始 -->
            <div class="banner">
                <img src="../images/index/bannerLeft.svg" class="bannerLeft">
                <img src="../images/index/bannerRight.svg" class="bannerRight">
                <div class="container">
                    <h1>外星課程</h1>
                    <p>
                        Cruise Coders 擁有多元的課程<br>
                        給需要學習程式語言的人、打造一個友善的學習環境<br>
                        透過您的手機、電腦就可以隨時隨地學習！<br>
                    </p>
                    <a href="./galaxy.php">前往試煉</a>
                </div>

                <img src="../images/index/Planet1.png" class="Planet1">
                <img src="../images/index/Planet2.png" class="Planet2">
                <img src="../images/index/Planet3.png" class="Planet3">
                <img src="../images/index/Planet4.png" class="Planet4">
            </div>
            <!-- banner結束 -->


            <!-- 輪撥開始 -->
            <div class="skw-pages">
                <div class="skw-page skw-page-1 active">
                    <div class="skw-page__half skw-page__half--left">
                        <div class="skw-page__skewed">
                            <div class="skw-page__content"></div>
                        </div>
                    </div>
                    <div class="skw-page__half skw-page__half--right">
                        <div class="skw-page__skewed">
                            <div class="skw-page__content">
                                <h2 class="skw-page__heading"><關於我們/></h2>
                                <p class="skw-page__description">由一群愛好程式的學生，在學習的路上，協助其他也想學習程式的人</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="skw-page skw-page-2">
                    <div class="skw-page__half skw-page__half--left">
                        <div class="skw-page__skewed">
                            <div class="skw-page__content">
                                <h2 class="skw-page__heading"><空間預約/></h2>
                                <p class="skw-page__description">擁有良好的學習環境，讓每個學員能夠有一個可以互相討論、學習的空間。</p>
                            </div>
                        </div>
                    </div>
                    <div class="skw-page__half skw-page__half--right">
                        <div class="skw-page__skewed">
                            <div class="skw-page__content"></div>
                        </div>
                    </div>
                </div>
                <div class="skw-page skw-page-3">
                    <div class="skw-page__half skw-page__half--left">
                        <div class="skw-page__skewed">
                            <div class="skw-page__content"></div>
                        </div>
                    </div>
                    <div class="skw-page__half skw-page__half--right">
                        <div class="skw-page__skewed">
                            <div class="skw-page__content">
                                <h2 class="skw-page__heading"><師資輔導/></h2>
                                <p class="skw-page__description">擁有優良師資協助輔導各位的學習問題。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 輪撥結束 -->



            <!-- 圓餅圖開始 -->
            <h2 class="H2title">
                < 我們的三大優勢 />
            </h2>
            <div class="PieChart">
                <div class="position">
                    <div id="container"></div>
                </div>
                <div class="containerText">
                    <div class="textBox">
                        <p id="text1">
                            提供專業線上課程，學習門檻低，可隨時隨地上課，有效提升你的專業技能，讓你紮實了解每種知識。
                        </p>
                        <p id="text2">
                            擁有課後輔導機制，豐富的專業師資能夠解決您在課業上所有的疑難雜症。
                        </p>
                        <p id="text3">
                            標準化考題查看自己的表現，讓您能夠了解自己學習近況，並能夠針對自己的弱點加強。
                        </p>
                    </div>
                </div>
            </div>
            <!-- 圓餅圖結束 -->



            <!-- 課程輪撥開始 -->
            <h2 class="H2title">
                < 外星課程 />
            </h2>
            <div class="Course">
                <div class="slide" id="slide">
                    <div class="wrapGeneral">
                        <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
                        <div class="favorites">
                            <i class="fas fa-heart"></i>
                        </div>
                        <a class="img" href="./allCourse.php">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="./allCourse.php">HTML快速入門-張老闆帶你飛</a>
                            <div class="time">課程總長：120分鐘</div>
                            <div class="comment">
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <a class="text" href="">24則評價</a>
                            </div>
                            <div class="price">NT.1,200</div>
                        </div>
                    </div>   

                    <div class="wrapGeneral">
                        <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
                        <div class="favorites">
                            <i class="fas fa-heart"></i>
                        </div>
                        <a class="img" href="./allCourse.php">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="./allCourse.php">HTML快速入門-張老闆帶你飛</a>
                            <div class="time">課程總長：120分鐘</div>
                            <div class="comment">
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <a class="text" href="">24則評價</a>
                            </div>
                            <div class="price">NT.1,200</div>
                        </div>
                    </div>

                    <div class="wrapGeneral">
                        <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
                        <div class="favorites">
                            <i class="fas fa-heart"></i>
                        </div>
                        <a class="img" href="./allCourse.php">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="./allCourse.php">HTML快速入門-張老闆帶你飛</a>
                            <div class="time">課程總長：120分鐘</div>
                            <div class="comment">
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <a class="text" href="">24則評價</a>
                            </div>
                            <div class="price">NT.1,200</div>
                        </div>
                    </div>

                    <div class="wrapGeneral">
                        <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
                        <div class="favorites">
                            <i class="fas fa-heart"></i>
                        </div>
                        <a class="img" href="./allCourse.php">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="./allCourse.php">HTML快速入門-張老闆帶你飛</a>
                            <div class="time">課程總長：120分鐘</div>
                            <div class="comment">
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <a class="text" href="">24則評價</a>
                            </div>
                            <div class="price">NT.1,200</div>
                        </div>
                    </div>

                    <div class="wrapGeneral">
                        <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
                        <div class="favorites">
                            <i class="fas fa-heart"></i>
                        </div>
                        <a class="img" href="./allCourse.php">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="./allCourse.php">HTML快速入門-張老闆帶你飛</a>
                            <div class="time">課程總長：120分鐘</div>
                            <div class="comment">
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <a class="text" href="">24則評價</a>
                            </div>
                            <div class="price">NT.1,200</div>
                        </div>
                    </div>

                    <div class="wrapGeneral">
                        <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
                        <div class="favorites">
                            <i class="fas fa-heart"></i>
                        </div>
                        <a class="img" href="./allCourse.php">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="./allCourse.php">HTML快速入門-張老闆帶你飛</a>
                            <div class="time">課程總長：120分鐘</div>
                            <div class="comment">
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <a class="text" href="">24則評價</a>
                            </div>
                            <div class="price">NT.1,200</div>
                        </div>
                    </div>

                    <div class="wrapGeneral">
                        <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
                        <div class="favorites">
                            <i class="fas fa-heart"></i>
                        </div>
                        <a class="img" href="./allCourse.php">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="./allCourse.php">HTML快速入門-張老闆帶你飛</a>
                            <div class="time">課程總長：120分鐘</div>
                            <div class="comment">
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <a class="text" href="">24則評價</a>
                            </div>
                            <div class="price">NT.1,200</div>
                        </div>
                    </div>

                    <div class="wrapGeneral">
                        <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
                        <div class="favorites">
                            <i class="fas fa-heart"></i>
                        </div>
                        <a class="img" href="./allCourse.php">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="./allCourse.php">HTML快速入門-張老闆帶你飛</a>
                            <div class="time">課程總長：120分鐘</div>
                            <div class="comment">
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <a class="text" href="">24則評價</a>
                            </div>
                            <div class="price">NT.1,200</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="controlCircle">
                <span id="Circle" class="Circle bgcBlack"></span>
                <span class="Circle"></span>
                <span class="Circle"></span>
                <span class="Circle"></span>
                <span class="Circle"></span>
                <span class="Circle"></span>
            </div>
            <!-- 課程輪撥結束 -->


            <!-- 宇宙試煉開始 -->
            <h2 class="H2title">
                < 語宙試煉 />
            </h2>
            <div class="galaxyBlock">
                <div class="planetWarp">
                    <div>
                        <img src="../images/trial/badge/css.png">
                    </div>
                    <div>
                        <img src="../images/trial/badge/html.png">
                    </div>
                    <div>
                        <img src="../images/trial/badge/javascript.png">
                    </div>
                    <div>
                        <img src="../images/trial/badge/mysql.png">
                    </div>
                    <div>
                        <img src="../images/trial/badge/php.png">
                    </div>
                </div>



                <div class="galaxyWarp">
                    <div class="leftBlock">

                        <div class="changeBlock">
                            <div>
                                <img src="../images/trial/planets/html1.png">
                                <p>初級</p>
                            </div>
                            <div>
                                <img src="../images/trial/planets/html2.png">
                                <p>中級</p>
                            </div>
                            <div>
                                <img src="../images/trial/planets/html3.png">
                                <p>高級</p>
                            </div>
                        </div>

                        <span class="line1"></span>
                        <span class="line2"></span>
                        <span class="line3"></span>
                        <span class="line4"></span>

                        <img src="../images/trial/planets/html1.png" class="planet1">
                        <img src="../images/trial/planets/html2.png" class="planet2">
                        <img src="../images/trial/planets/html3.png" class="planet3">

                    </div>
                    <div class="rightBlock">
                        <h3>HTML 星系</h3>
                        <p>HTML是一種網頁使用的語言，是一種描述超文件的註記語言SGML(Standard Generalized Markup Language)所制訂出的一種網頁語言，基本上現行的瀏覽器都可以讀取HTML，使用HTML可以編輯設計出網頁，也可以在網頁中加入所有HTML語言可支援的方式，例如表格、表單、圖片、文字、連結、程式等等。</p>
                        <a href="./galaxy.php">查看更多</a>
                        
                    </div>

                </div>

            </div>
            <!-- 宇宙試煉結束 -->

            <!-- 太空補給站開始 -->
            <h2 class="H2title">
                < 太空補給站 />
            </h2>
            <div class="articleBlock">
                <div class="leftBlock">
                    <div class="bigBlock">
                        <a href="">
                            <img src="./../images/article/topBook.jpg" height="500" width="500">
                        </a>
                        <p>學網站製作、做網站、網站切版、網站架設、前端編程⋯⋯等很多不同的名稱。總之一切的一切都要從最基本的 HTML、CSS學習開始，基本上網站前端切版是用：HTML + CSS + Javascript，而他們其實各自都是不同的「語言」。</p>
                    </div>
                    <p>十大好書推薦</p>
                </div>
                <div class="rightBlock">
                    <div>
                        <a href="" class="imgWarp"><img src="./../images/article/editor.jpg" ></a>
                        <p>編輯器推薦</p>
                    </div>
                    <div>
                        <a href="" class="imgWarp"><img src="./../images/article/study.jpg" ></a>
                        <p>自學力網站資源</p>
                    </div>
                    <div>
                        <a href="" class="imgWarp"><img src="./../images/article/software.jpg" ></a>
                        <p>軟體推薦</p>
                    </div>
                    <div>
                        <a href="" class="imgWarp"><img src="./../images/article/tools.jpg"></a>
                        <p>好用套件推薦</p>
                    </div>
                </div>
                <div class="buttonWarp">
                    <a href="./article.php">查看更多</a>
                </div>
            </div>
            <!-- 太空補給站結束 -->

            <!-- 蟲動練功坊開始 -->
            <h2 class="H2title">
                < 蟲洞練功坊/>
            </h2>
            <div class="tutorialBlock">
                <div class="upBlock">
                    <div class="leftBlock">
                        <div class="imgWarp"><img src="./../images/tutorial/room2.jpg" width="100%"></div>
                    </div>
                    <div class="rightBlock">
                        <p>
                            我們有專屬於學員的學習空間，只要您有購買我們的課程，即可在該課的輔導時間，申請預約。<br><br>
                            我們的老師，有的曾是業界裡頭的翹楚，程式端的權威，資歷超過十年，有的則是授課經驗豐富，深受同學們的喜愛。<br><br>
                            該門課的老師都會在現場，如果您有任何程式語言上的困難、或是對於課程中有問題，都可以利用預約我們學習空間，在現場直接向老師詢問，幫您解決問題。
                        </p>
                    </div>
                    <a href="./tutorial.php">查看更多</a>
                </div>
                <div class="roomCenter">
                    <div class="cardBack">
                        <div class="cardLine">
                            <img src="./../images/tutorial/openbook.png" alt="無法顯示圖片">
                            <p>提供優質的師資<br>幫助您解開任何問題</p>
                        </div>
                    </div>
                    <div class="cardBack">
                        <div class="cardLine">
                            <img src="./../images/tutorial/pencil.png" alt="無法顯示圖片" class="pencil">
                            <p>提供強大的設備<br>令您打破傳統的限制</p>
                        </div>
                    </div>
                    <div class="cardBack">
                        <div class="cardLine">
                            <img src="./../images/tutorial/house.png" alt="無法顯示圖片" class="house">
                            <p>提供舒適的環境<br>讓您心無旁騖的學習</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 蟲動練功坊結束 -->


        </main>
        <?php
        include('layout/footer.php');
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/header.js"></script>
</body>

</html>