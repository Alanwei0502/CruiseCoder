<?php
// 查詢php版本
// phpinfo();

// 串聯資料庫
include("./layout/connect.php");

// 預備SQL敘述，要先將其字串化
$qStatement = "SELECT * FROM quiz WHERE qSubject = ? AND qLevel = ?";
$sStatement = "SELECT * FROM selection AS S JOIN (SELECT * FROM quiz WHERE qSubject = ? AND qLevel = ?) AS Q ON S.sQuiz = Q.qNumber";
// 計算總共幾題
$countStatement = "SELECT count(*) AS num FROM quiz WHERE qSubject = ? AND qLevel = ?";


// 使用prepare方法將這個字串進行一個預存產生一個物件
$qStatement = $pdo->prepare($qStatement);
$sStatement = $pdo->prepare($sStatement);
$countStatement = $pdo->prepare($countStatement);


$subject = $_GET["subject"];
$level = $_GET["level"];
$name = $_GET["name"];

$qStatement->bindParam(1, $subject);
$qStatement->bindParam(2, $level);

$sStatement->bindParam(1, $subject);
$sStatement->bindParam(2, $level);

$countStatement->bindParam(1, $subject);
$countStatement->bindParam(2, $level);

// 執行語法
$qStatement->execute();
$sStatement->execute();
$countStatement->execute();

//抓出全部且依照順序封裝成一個二維陣列
$qData = [];
$sData = [];
$cData = [];


$qData = $qStatement->fetchAll(PDO::FETCH_ASSOC);

$sData = $sStatement->fetchAll(PDO::FETCH_ASSOC);

$cData = $countStatement->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cruise Coders | 試煉開始</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="icon" href="../ico.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../ico.ico" type="image/x-icon" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div class="wrap quiz">
        <?php
        include('layout/spacebackground.php');
        include('layout/header.php');

        ?>
        <main>
            <h2 data-quizcount=<?= $cData['num'] ?>><?= "< " . $name . " />" ?></h2>
            <div class="countdown">
                <div id="countdown-number"></div>
                <svg>
                    <circle r="18" cx="20" cy="20"></circle>
                </svg>
            </div>
            <?= "<section class='beforeQuiz' style='background-image: url(../images/quiz/background/" . $qData[0]["qBackground"] . ");'>" ?>
            <div class="notice blueBg">
                <h3>測驗須知</h3>
                <div>
                    <p>測驗時間：<?= $cData['num'] * 10 ?>秒</p>
                    <p>總共題目：<?= $cData['num'] ?>題</p>
                    <p>確認選項後，請按下一題繼續作答</p>
                </div>
                <div>
                    <label class="note" for="checkOne"><input type="checkbox" id="checkOne">我不會諮詢任何外部來源（包括網站，書籍或人）或從中複製代碼來完成這些任務。</label>
                    <label class="note" for="checkTwo"><input type="checkbox" id="checkTwo">我不會複製、分發或公開顯示我在此測試過程中遇到的任何信息。</label>
                </div>
            </div>
            <button class="startQuiz">開始試煉</button>
            </section>

            <?php
            foreach ($qData as $qIndex => $qRow) {
                $qCurrent = $qData[$qIndex];
                echo "<section class='inQuiz' style='background-image: url(../images/quiz/background/" . $qCurrent["qBackground"] . ");'>" . "<div class='blueBg'>" . "<div class='question' data-answer='" . $qRow["qAnswer"] . "'>" . htmlspecialchars($qRow["qContent"]) . "</div>" . "<div class='answer'>";
                foreach ($sData as $sIndex => $sRow) {
                    $sCurrent = $sData[$sIndex];
                    if ($sCurrent["sQuiz"] === $qCurrent["qNumber"]) {
                        echo  "<label>" . "<input class='selection' value='" . $sRow["sOption"] . "' type='radio' name='selection'>" . $sRow["sOption"] . ". " . htmlspecialchars($sRow["sContent"]) . "</label>";
                    }
                }
                echo "</div>" . "</div>" . "<button class='nextQuestion'>下一題</button>" . "</section>";
            }
            ?>
            <?= "<section class='afterQuiz' style='background-image: url(../images/quiz/background/" . $qData[0]["qBackground"] . ");'>" ?>
            <div class="notice blueBg">
                <h3>恭喜您完成試煉!</h3>
                <div>
                    <p class="correctCount"></p>
                    <p>徽章解鎖標準：答對<?= $cData['num'] ?>題</p>
                    <p>請至會員中心查看您擁有的徽章</p>
                </div>
            </div>
            <a href="#0" class="complete">前往會員中心</a>
            </section>
        </main>
        <?php
        include('./layout/footer.php');
        ?>
        <script src="../js/vue.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="../js/header.js"></script>
        <script src="../js/quiz.js"></script>
    </div>
</body>

</html>