<?php

// 串聯資料庫
include("./layout/connect.php");

$gStatement = "";
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
    <div class="wrap galaxy">
        <?php
        include('layout/spacebackground.php');
        include('layout/header.php');
        ?>
        <main>
            <section class="introduction">
                <h2>
                    < 語宙試煉 />
                </h2>
                <p>挑戰者你好，歡迎來到語宙試煉！每個星系都會有三個星球關卡，等級分別是初級、中級、高級，成功挑戰後，即可獲得星球徽章，快來展現你的實力吧！</p>
                <img src="../images/trial/monster/m_html.png" alt="外星人">
            </section>

            <section class="universe">
                <h2>
                    < 數碼銀河 />
                </h2>
                <div class="outGalaxy">
                    <div class="scrolldown">
                        <p>點擊星系後，向下滑動以查看星球關卡。</p>
                        <img class="arrow1" src="../images/trial/arrow.png" alt="">
                        <img class="arrow2" src="../images/trial/arrow.png" alt="">
                    </div>
                    <div class="inGalaxy" id="inGalaxy">
                        <ul>
                            <template v-for="(galaxyName, value) in galaxyNames">
                                <li>
                                    <a href="#0" class="galaxyIcon">
                                        <div>{{galaxyName.name}}</div>
                                        <img :src="galaxyName.pic">
                                        <img src="../images/trial/rock/base.svg" alt="">
                                    </a>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="planetQuiz">
                <h2>
                    < 星球關卡 />
                </h2>
                <div class="carousel" id="carousel">
                    <template v-for="(planetsName, value) in planetsNames">
                        <div :class="planetsName.className">
                            <img :src="planetsName.imageSrc">
                            <div>{{planetsName.divName}}</div>
                        </div>
                    </template>
                </div>
                <div id="article">
                    <template v-for="(planetsInfo, value) in planetsInfos">
                        <article class="insideArticle">
                            <h3>{{planetsInfo.planetName}}</h3>
                            <p>{{planetsInfo.description}}</p>
                            <img :src="planetsInfo.badgeSrc">
                            <a :href="planetsInfo.href" class="goToQuiz">進入試煉</a>
                        </article>
                    </template>
                </div>
            </section>

            <section class="badge">
                <h3>星系解鎖成就</h3>
                <p>當你成功挑戰完所有<span>HTML星系</span>的星球關卡，即可獲得<span>HTML星系</span>徽章喔！</p>
                <div class="galaxyBadge">
                    <img src="../images/trial/badge/html.png">
                </div>
            </section>
            <a href="#0" class="top"><img src="" alt=""></a>
        </main>
        <?php
        include('layout/footer.php');
        ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.common.dev.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="../js/header.js"></script>
    <script src="../js/galaxy.js"></script>
</body>

</html>