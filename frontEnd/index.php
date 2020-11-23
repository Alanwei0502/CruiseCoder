<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>宇宙漫遊</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

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
                <div class="container">
<<<<<<< HEAD
                <h1>外星課程</h1>
                <p>
                    Cruise Coders 擁有多元的課程<br>
                    給需要學習程式語言的人、打造一個友善的學習環境<br>
                    透過您的手機、電腦就可以隨時隨地學習！<br>
                </p>
                <a href="#">前往試煉</a>
=======
                    <h1>外星課程</h1>
                    <p>
                        Cruise Coders 擁有多元的課程<br>
                        給需要學習程式語言的人、打造一個友善的學習環境<br>
                        透過您的手機、電腦就可以隨時隨地學習！<br>
                    </p>
                    <a href="#">前往試煉</a>
>>>>>>> c2456783697d0fe2d7919a9aa589e610d28f2396
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
                                <h2 class="skw-page__heading">Skewed One Page Scroll</h2>
                                <p class="skw-page__description">Just scroll down</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="skw-page skw-page-2">
                    <div class="skw-page__half skw-page__half--left">
                        <div class="skw-page__skewed">
                            <div class="skw-page__content">
                                <h2 class="skw-page__heading">Page 2</h2>
                                <p class="skw-page__description">Nothing to do here, continue scrolling.</p>
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
                                <h2 class="skw-page__heading">Page 3</h2>
                                <p class="skw-page__description">The end is near, I promise!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="skw-page skw-page-4">
                    <div class="skw-page__half skw-page__half--left">
                        <div class="skw-page__skewed">
                            <div class="skw-page__content">
                                <h2 class="skw-page__heading">Page 4</h2>
                                <p class="skw-page__description">Ok, ok, just one more scroll!</p>
                            </div>
                        </div>
                    </div>
                    <div class="skw-page__half skw-page__half--right">
                        <div class="skw-page__skewed">
                            <div class="skw-page__content"></div>
                        </div>
                    </div>
                </div>
                <div class="skw-page skw-page-5">
                    <div class="skw-page__half skw-page__half--left">
                        <div class="skw-page__skewed">
                            <div class="skw-page__content"></div>
                        </div>
                    </div>
                    <div class="skw-page__half skw-page__half--right">
                        <div class="skw-page__skewed">
                            <div class="skw-page__content">
                                <h2 class="skw-page__heading">Epic finale</h2>
                                <p class="skw-page__description">
<<<<<<< HEAD
                                    Feel free to check 
                                    <a class="skw-page__link" href="https://codepen.io/suez/pens/public/" target="_blank">my other pens</a> and follow me on 
=======
                                    Feel free to check
                                    <a class="skw-page__link" href="https://codepen.io/suez/pens/public/" target="_blank">my other pens</a> and follow me on
>>>>>>> c2456783697d0fe2d7919a9aa589e610d28f2396
                                    <a class="skw-page__link" href="https://twitter.com/NikolayTalanov" target="_blank">Twitter</a>
                                </p>
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
                < 外星課程 / >
            </h2>
            <div class="Course">
                <div class="slide" id="slide">
                    <div class="wrapGeneral">
                        <img class="tImg" src="../images/allCourse/tImg01.jpg" alt="">
                        <div class="favorites">
                            <i class="fas fa-heart"></i>
                        </div>
                        <a class="img" href="">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
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
                        <a class="img" href="">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
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
                        <a class="img" href="">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
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
                        <a class="img" href="">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
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
                        <a class="img" href="">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
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
                        <a class="img" href="">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
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
                        <a class="img" href="">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
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
                        <a class="img" href="">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
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
                        <a class="img" href="">
                            <img src="../images/allCourse/course01.png" alt="">
                        </a>
                        <div class="c_Main">
                            <a class="title" href="">HTML快速入門-張老闆帶你飛</a>
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
            </div>
            <!-- 課程輪撥結束 -->


        </main>
        <?php
        include('layout/footer.php');
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="../js/login.js"></script>
    <script src="../js/index.js"></script>
</body>

</html>