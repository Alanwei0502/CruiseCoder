<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>語宙試煉</title>
    <link rel="stylesheet" href="../css/galaxy.css">
</head>

<body>
    <div class="wrap">
        <?php
        include('layout/spacebackground.php');
        include('layout/header.php');
        ?>
        <main>

            <section class="galaxy">
                <h2>&lt;數碼銀河&#47;&gt;</h2>
                <div></div>
                <article>
                    <h3>HTML星系簡介</h3>
                    <P></P>
                    <img src="" alt="外星人">
                </article>
            </section>

            <section class="planet">
                <h2>星球關卡</h2>
                <div class="carousel"></div>
                <article>
                    <h3>HTML初級星球</h3>
                    <p></p>
                    <a href="quiz.php" class="goToQuiz">進入試煉</a>
                </article>
            </section>

            <section class="badge">
                <h2>星系解鎖成就</h2>
                <p></p>
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
    </div>
</body>

</html>