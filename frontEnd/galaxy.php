<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cruise Coders | 語宙試煉</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" href="../ico.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />
</head>

<body>
    <div class="wrap galaxy">
        <?php
        include('layout/spacebackground.php');
        include('layout/header.php');
        ?>
        <main id="galaxyVue">
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
                    <div class="inGalaxy">
                        <ul>
                            <template v-for="(galaxyName, value) in galaxyNames">
                                <li>
                                    <a href="#0" class="galaxyIcon">
                                        <div>{{galaxyName.gName}}</div>
                                        <img :src="'../images/trial/galaxy/' + galaxyName.gImage" @click="changePlanet">
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
                <div class="carousel">
                    <template v-for="(planetsAndBadge, index) in planetsAndBadges">
                        <div :class="planetsAndBadge.className">
                            <img :src='"../images/trial/planets/" + planetsAndBadge.bIcon' @click="rotatePlanet">
                            <div>{{planetsAndBadge.bName}}</div>
                        </div>
                    </template>
                </div>
                <div>
                    <template v-for="(planetsAndBadge, index) in planetsAndBadges">
                        <article class="insideArticle">
                            <h3>{{planetsAndBadge.bName}}</h3>
                            <p>{{planetsAndBadge.bInfo}}</p>
                            <img :src="'../images/trial/badge/'+planetsAndBadge.bBadge">
                            <a :href="planetsAndBadge.href" class="goToQuiz">進入試煉</a>
                        </article>
                    </template>
                </div>
            </section>

            <section class="badge">
                <h3>星系解鎖成就</h3>
                <p>當你成功挑戰完所有<span :name="name">{{name}}</span>的星球關卡，即可獲得<span :name="name">{{name}}</span>徽章喔！</p>
                <div class="galaxyBadge">
                    <img :galaxyBadge="galaxyBadge" :src="'../images/trial/badge/' + galaxyBadge">
                </div>
            </section>
        </main>
        <?php
        include('layout/footer.php');
        ?>
    </div>
    <script src="../js/vue.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="../js/header.js"></script>
    <script src="../js/galaxy.js"></script>
</body>

</html>