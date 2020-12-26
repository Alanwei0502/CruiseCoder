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
    <link rel="icon" href="../ico.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />
</head>

<body onselectstart="return false">
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
                                <h2 class="skw-page__heading">
                                    <關於我們 />
                                </h2>
                                <p class="skw-page__description">由一群愛好程式的學生，在學習的路上，協助其他也想學習程式的人</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="skw-page skw-page-2">
                    <div class="skw-page__half skw-page__half--left">
                        <div class="skw-page__skewed">
                            <div class="skw-page__content">
                                <h2 class="skw-page__heading">
                                    <空間預約 />
                                </h2>
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
                                <h2 class="skw-page__heading">
                                    <師資輔導 />
                                </h2>
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
                    <div v-for="allCourse in allCourses" class="wrapGeneral">
                        <!-- <img class="tImg" src="../images/allCourse/tImg01.jpg" alt=""> -->
                        <div class="favorites">
                            <!-- <i class="fas fa-heart"></i> -->
                        </div>
                        <a class="img" :href=`course_start_class.php?CourseID=${allCourse.cNumber}`>
                            <img :src="allCourse.cImage" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" :href=`course_start_class.php?CourseID=${allCourse.cNumber}`>{{allCourse.cTitle}}</a>
                            <div class="time">課程總長：{{allCourse.cTime}}</div>
                            <div class="comment">
                                <div class="star">

                                </div>
                                <a class="text" >{{allCourse.rCount}}則評價</a>
                            </div>
                            <div class="price">NT.{{allCourse.cPrice}}</div>
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
            <div class="galaxyBlock" id="galaxyBlock">
                <div class="swiper-container">
                    <div class="planetWarp swiper-wrapper">
                        <div class="swiper-slide">
                            <input type="hidden" value="CSS星系">
                            <img src="../images/trial/badge/css.png" @click="changePlanet" class="CSS">
                        </div>
                        <div class="swiper-slide">
                            <input type="hidden" value="HTML星系">
                            <img src="../images/trial/badge/html.png" @click="changePlanet" class="HTML">
                        </div>
                        <div class="swiper-slide">
                            <input type="hidden" value="Javascript星系">
                            <img src="../images/trial/badge/js.png" @click="changePlanet" class="JS">
                        </div>
                        <div class="swiper-slide">
                            <input type="hidden" value="SASS星系">
                            <img src="../images/trial/badge/sass.png" @click="changePlanet" class="SQL">
                        </div>
                        <div class="swiper-slide">
                            <input type="hidden" value="PHP星系">
                            <img src="../images/trial/badge/php.png" @click="changePlanet" class="PHP">
                        </div>
                        <div class="swiper-slide" id="Planethidden">
                            <input type="hidden" value="PHP星系">
                        </div>
                    </div>
                </div>



                <div class="galaxyWarp">
                    <div class="leftBlock">

                        <div class="changeBlock">
                            <div>
                                <img :src="allPlanet[0]">
                                <p>初級</p>
                            </div>
                            <div>
                                <img :src="allPlanet[1]">
                                <p>中級</p>
                            </div>
                            <div>
                                <img :src="allPlanet[2]">
                                <p>高級</p>
                            </div>
                        </div>

                        <span class="line1"></span>
                        <span class="line2"></span>
                        <span class="line3"></span>
                        <span class="line4"></span>

                        <img :src="allPlanet[0]" class="planet1">
                        <img :src="allPlanet[1]" class="planet2">
                        <img :src="allPlanet[2]" class="planet3">

                    </div>
                    <div class="rightBlock">
                        <h3 class="titlePlanet">CSS星系</h3>
                        <p class="textContent">CSS（Cascading Style Sheets）串接樣式表：一種用來為結構化文件（如HTML文件或XML應用）添加樣式（字型、間距和顏色等）的電腦語言，由W3C定義和維護，意指在文件中CSS不會單獨存在，只是輔助結構化文件的樣式呈現。</p>
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
                        <a href="article.php?aTitle=十大好書推薦">
                            <img src="./../images/article/topBook.jpg" height="500" width="500">
                        </a>
                        <p>學網站製作、做網站、網站切版、網站架設、前端編程⋯⋯等很多不同的名稱。總之一切的一切都要從最基本的 HTML、CSS學習開始，基本上網站前端切版是用：HTML + CSS + Javascript，而他們其實各自都是不同的「語言」。</p>
                    </div>
                    <p>十大好書推薦</p>
                </div>
                <div class="rightBlock">
                    <div>
                        <a href="article.php?aTitle=編輯器推薦" class="imgWarp"><img src="./../images/article/editor.jpg"></a>
                        <p>編輯器推薦</p>
                    </div>
                    <div>
                        <a href="article.php?aTitle=自學力網站" class="imgWarp"><img src="./../images/article/study.jpg"></a>
                        <p>自學力網站資源</p>
                    </div>
                    <div>
                        <a href="article.php?aTitle=軟體推薦" class="imgWarp"><img src="./../images/article/software.jpg"></a>
                        <p>軟體推薦</p>
                    </div>
                    <div>
                        <a href="article.php?aTitle=好用套件推薦" class="imgWarp"><img src="./../images/article/tools.jpg"></a>
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
                < 蟲洞練功坊 />
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
    <script src="../js/vue.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/header.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script>document.oncontextmenu = new Function("return false");</script> <!-- 右鍵封鎖  -->
    <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
</body>

</html>