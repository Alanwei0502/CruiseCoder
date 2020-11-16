<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>語宙試煉</title>
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

            <section class="universe">
                <h2>&lt;數碼銀河&#47;&gt;</h2>
                <div class="outGalaxy">
                    <div class="inGalaxy"></div>
                </div>
                <article>
                    <h3>HTML星系簡介</h3>
                    <p>HTML是一種網頁使用的語言，主要用來管理網頁的架構，基本上現行的瀏覽器都可以讀取HTML，使用HTML可以編輯設計出網頁，也可以在網頁中加入所有HTML語言可支援的方式，例如表格、表單、圖片、文字、連結、程式等等。<br>一個好的網頁其 HTML 可以說是相當單純且具有易讀性，這種網頁不但方便前端工程師進行後續的維護外，也比較容易讓你的網頁增加曝光率讓搜尋引擎能把你的網頁擺在最前面，此種行為稱為 SEO，而目前 HTML 已經發布到第五版同時也是目前最廣為使用的版本，因此大家常聽到的 HTML5 其實就是指第五版的 HTML 喔！</p>
                    <img src="../images/trial/monster/m_html.png" alt="外星人">
                </article>
            </section>

            <section class="planetQuiz">
                <h2>&lt;星球關卡&#47;&gt;</h2>
                <div class="carousel">
                    <div id="planet1" class="planet">
                        <img src="../images/trial/planets/html1.png" alt="初級html星球">
                        <div>HTML初級星球</div>
                    </div>
                    <div id="planet2" class="planet">
                        <img src="../images/trial/planets/html2.png" alt="中級html星球">
                        <div>HTML中級星球</div>
                    </div>
                    <div id="planet3" class="planet">
                        <img src="../images/trial/planets/html3.png" alt="高級html星球">
                        <div>HTML高級星球</div>
                    </div>
                </div>
                <article>
                    <h3>HTML初級星球</h3>
                    <p>如果你是剛開始學習HTML，可是試試看先挑戰這顆HTML初級星球關卡，達到標準後，可以獲得此顆星球認證喔！</p>
                    <a href="quiz.php" class="goToQuiz">進入試煉</a>
                </article>
            </section>

            <section class="badge">
                <h2>&lt;星系解鎖成就&#47;&gt;</h2>
                <p>當你成功挑戰完所有HTML的星球關卡，即可獲得HTML星系徽章！</p>
                <div class="planetBadge">
                    <img src="" alt="HTML初級星球徽章">
                    <img src="" alt="HTML中級星球徽章">
                    <img src="" alt="HTML高級星球徽章">
                </div>
                <div class="galaxyBadge">
                    <img src="" alt="HTML星系徽章">
                </div>
            </section>

        </main>
        <?php
        include('layout/footer.php');
        ?>
        <script src="../js/galaxy.js"></script>
    </div>
</body>

</html>