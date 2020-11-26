<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cruise Coders | 語宙試煉</title>
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <!-- include('layout/login.php'); -->
    <div class="wrap galaxy">
        <?php
        include('layout/spacebackground.php');
        include('layout/header.php');
        ?>
        <main>
            <section class="introduction">
                <h2>&lt; 語宙試煉 &#47;&gt;</h2>
                <p>挑戰者你好，歡迎來到語宙試煉！每個星系都會有三個星球關卡，等級分別是初級、中級、高級，成功挑戰後，即可獲得星球徽章，快來展現你的實力吧！</p>
                <img src="../images/trial/monster/m_html.png" alt="外星人">
            </section>

            <section class="universe">
                <h2>&lt; 數碼銀河 &#47;&gt;</h2>
                <div class="outGalaxy">
                    <div class="scrolldown">
                        <p>點擊星系後，向下滑動以查看星球關卡。</p>
                        <img class="arrow1" src="../images/trial/arrow.png" alt="">
                        <img class="arrow2" src="../images/trial/arrow.png" alt="">
                    </div>
                    <div class="inGalaxy">
                        <ul>
                            <li>
                                <a href="#0">
                                    <div>HTML星系</div>
                                    <img src="../images/trial/galaxy/g1.png" alt="">
                                    <img src="../images/trial/rock/base.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <div>CSS星系</div>
                                    <img src="../images/trial/galaxy/g2.png" alt="">
                                    <img src="../images/trial/rock/base.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <div>Javascript星系</div>
                                    <img src="../images/trial/galaxy/g3.png" alt="">
                                    <img src="../images/trial/rock/base.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <div>jQuery星系</div>
                                    <img src="../images/trial/galaxy/g4.png" alt="">
                                    <img src="../images/trial/rock/base.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <div>SASS星系</div>
                                    <img src="../images/trial/galaxy/g5.png" alt="">
                                    <img src="../images/trial/rock/base.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <div>PHP星系</div>
                                    <img src="../images/trial/galaxy/g6.png" alt="">
                                    <img src="../images/trial/rock/base.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <div>MySQL星系</div>
                                    <img src="../images/trial/galaxy/g7.png" alt="">
                                    <img src="../images/trial/rock/base.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <div>Vue星系</div>
                                    <img src="../images/trial/galaxy/g8.png" alt="">
                                    <img src="../images/trial/rock/base.svg" alt="">
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </section>

            <section class="planetQuiz">
                <h2>&lt; 星球關卡 &#47;&gt;</h2>
                <div class="carousel">
                    <div class="planet  blue planetOne">
                        <img src="../images/trial/planets/html1.png" alt="初級html星球">
                        <div>HTML初級星球</div>
                    </div>
                    <div class="planet red planetTwo">
                        <img src="../images/trial/planets/html2.png" alt="中級html星球">
                        <div>HTML中級星球</div>
                    </div>
                    <div class="planet green planetThree">
                        <img src="../images/trial/planets/html3.png" alt="高級html星球">
                        <div>HTML高級星球</div>
                    </div>
                </div>
                <article>
                    <h3>HTML初級星球</h3>
                    <p>如果你是剛開始學習HTML，可是試試看先挑戰這顆HTML初級星球關卡，達到標準後，可以獲得此顆星球認證喔！</p>
                    <img src="../images/trial/badge/html1.png" alt="HTML初級星球徽章">
                    <a href="quiz.php" class="goToQuiz">進入試煉</a>
                </article>
            </section>

            <section class="badge">
                <h3>星系解鎖成就</h3>
                <p>當你成功挑戰完所有HTML的星球關卡，即可獲得HTML星系徽章！</p>
                <div class="galaxyBadge">
                    <img src="../images/trial/badge/html.png" alt="HTML星系徽章">
                </div>
            </section>
            <a href="#0" class="top"><img src="" alt=""></a>
        </main>
        <?php
        include('layout/footer.php');
        ?>
    </div>
    <script src="../js/galaxy.js"></script>
    <script src="../js/header.js"></script>
</body>

</html>