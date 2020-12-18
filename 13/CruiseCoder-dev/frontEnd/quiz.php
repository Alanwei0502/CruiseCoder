<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cruise Coders | HTML初級星球</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<body>
    <?php
    // include('layout/login.php');
    ?>
    <div class="wrap quiz">
        <?php
        include('layout/spacebackground.php');
        include('layout/header.php');

        ?>
        <main>
            <h2>&lt; HTML初級星球 &#47;&gt;</h2>
            <section class="beforeQuiz">
                <div class="notice blueBg">
                    <h3>測驗須知</h3>
                    <div>
                        <p>測驗時間：2分鐘</p>
                        <p>總共題目：3題</p>
                        <p>確認選項後，請按下一題繼續作答</p>
                    </div>
                    <label for="checkOne"><input type="checkbox" id="checkOne">我不會諮詢任何外部來源（包括網站，書籍或人）或從中複製代碼來完成這些任務。</label>
                    <label for="checkTwo"><input type="checkbox" id="checkTwo">我不會複製、分發或公開顯示我在此測試過程中遇到的任何信息。</label>

                </div>
                <button class="startQuiz">開始試煉</button>
            </section>

            <section class="inQuiz">
                <div class="blueBg">
                    <div class="question">1.請問下列敘述何者正確？</div>
                    <div class="answer">
                        <label for="a1"><input type="radio" id="a1" name="selection">(A) 在HTML結構中，根本不需要語意化標籤，div和span就是萬能的啦！</label>
                        <label for="b1"><input type="radio" id="b1" name="selection">(B) 為了增加SEO優化，建議h1標籤可以用很多個。</label>
                        <label for="c1"><input type="radio" id="c1" name="selection">(C) a標籤是區塊元素，可以直接利用padding改變寬高</label>
                        <label for="d1"><input type="radio" id="d1" name="selection">(D) 呈現在網頁上的結構，我們應該要寫在HTML檔案中的body標籤裡面。</label>
                    </div>
                </div>
                <button class="nextQuestion">下一題</button>
            </section>

            <section class="inQuiz">
                <div class="blueBg">
                    <div class="question">2.請問下列敘述何者錯誤？</div>
                    <div class="answer">
                        <label for="a2"><input type="radio" id="a2" name="selection">(A) h標籤是區塊元素</label>
                        <label for="b2"><input type="radio" id="b2" name="selection">(B) a標籤是行內元素</label>
                        <label for="c2"><input type="radio" id="c2" name="selection">(C) li標籤是區塊元素</label>
                        <label for="d2"><input type="radio" id="d2" name="selection">(D) span標籤是區塊元素</label>
                    </div>
                </div>
                <button class="nextQuestion">下一題</button>

            </section>

            <section class="inQuiz">
                <div class="blueBg">
                    <div class="question">3.下列何者敘述正確？</div>
                    <div class="answer">
                        <label for="a3"><input type="radio" id="a3" name="selection">(A) 表格標籤中，tr代表的是欄位</label>
                        <label for="b3"><input type="radio" id="b3" name="selection">(B) 表格標籤中，td代表的是欄位</label>
                        <label for="c3"><input type="radio" id="c3" name="selection">(C) 表格標籤中，tr代表的是列</label>
                        <label for="d3"><input type="radio" id="d3" name="selection">(D) 建立表格，要先用form包在最外面</label>
                    </div>
                </div>
                <button class="nextQuestion">完成試煉</button>

            </section>

            <section class="afterQuiz">
                <div class="notice blueBg">
                    <h3>恭喜您完成試煉!</h3>
                    <div>
                        <p>答對題數：</p>
                        <p>徽章解鎖標準：答對3題</p>
                        <p>請至您的會員中心查看您擁有的徽章</p>
                    </div>
                </div>
                <button class="complete">前往會員中心</button>
            </section>
        </main>
        <?php
        include('layout/footer.php');
        ?>
        <!-- <script src="../js/login.js"></script> -->
        <script src="../js/header.js"></script>
        <script src="../js/quiz.js"></script>

    </div>
</body>

</html>