// 檢查某 cookie 是否存在
function checkCookie(cname) {
    var cookie_value = getCookie(cname);
    if (cookie_value != "") {
        return true;
    } else {
        return false;
    }
}

// 取得 cookie 的值
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

// 未登入通知
if (checkCookie('user')) {
} else {
    swal("提醒您先登入會員才可以獲得徽章喔!", "", "info");
}



//測驗須知，checkbox勾選，頁籤切換===================================
var startQuiz = document.getElementsByClassName('startQuiz');
var checkOne = document.getElementById('checkOne');
var checkTwo = document.getElementById('checkTwo');
var section = document.getElementsByTagName('section');
var nextQuestion = document.getElementsByClassName('nextQuestion');
var answerCount = 0;
var correctCount = document.getElementsByClassName('correctCount')[0];


startQuiz[0].addEventListener('click', function () {
    if (checkOne.checked && checkTwo.checked) {
        this.closest("section").classList.add('-hide');
        this.closest("section").nextElementSibling.classList.add('-show');

        // 倒數計時器
        $('.countdown').css('display', 'block');
        $('.countdown svg circle').addClass('animation');
        let countdown = $('h2').data('quizcount') * 10;

        add = setInterval(function () {

            countdown = --countdown <= 0 ? 0 : countdown;
            $('#countdown-number').text(countdown);

            if (countdown == 0) {
                swal({
                    title: "測驗時間結束，是否重新測驗？",
                    icon: "info",
                    buttons: true,
                    dangerMode: true
                }).then((value) => {
                    if (value) {
                        window.location.reload();
                    } else {
                        window.location.href = 'galaxy.php';
                    }
                });
            }
        }, 1000);
    } else {
        swal("請先閱讀完並勾選所有測驗規則", "", "info");
    }
});


// 綁定下一題的按鈕
for (let j = 0; j < nextQuestion.length; j++) {
    nextQuestion[j].addEventListener('mousedown', function (e) {
        let selections = this.closest("section").querySelectorAll('.selection');

        if (!selections[0].checked && !selections[1].checked && !selections[2].checked && !selections[3].checked) {
            swal("別放棄！作答後再進入下一題", "", "info");
        }
        else {
            this.closest("section").classList.add('-hide');
            this.closest("section").nextElementSibling.classList.add('-show');

            // 判斷作答是否正確
            let chooseOption = this.closest("section").querySelector('.selection:checked').value;
            let correctAnswer = this.closest("section").querySelectorAll('div.question')[0].getAttribute("data-answer");

            if (chooseOption == correctAnswer) {
                answerCount = answerCount + 1;
                console.log("correct");
                correctCount.innerText = `答對題數：${answerCount}題`;
            }

            // 最後一個下一題按鈕
            if (j == nextQuestion.length - 1) {
                // 中斷計時器
                $('.countdown').css('display', 'none');
                $('.countdown svg circle').removeClass('animation');
                clearInterval(add);

                let userAccount = getCookie('user');
                let url = new URLSearchParams(window.location.search)
                let badgeField = url.get("name");

                console.log(userAccount);
                console.log(answerCount);
                console.log(badgeField);
                if (answerCount >= $('.nextQuestion').length) {
                    if (userAccount) {
                        console.log("123");
                        $.ajax({
                            type: 'POST',
                            url: 'quizR.php',
                            data: { userAccount, badgeField },
                            success: function (res) {
                                swal("挑戰成功", "趕快去會員中心看看你獲得的徽章吧!", "success");
                            },
                        });
                    }
                } else {
                    swal("差一點點，再接再厲！", "", "info");
                }
            }
        }
    });
}



// 前往會員中心判斷
$('a.complete').click(function () {
    if (checkCookie('user')) {
        window.location.href = "http://localhost/CruiseCoder/frontEnd/info.php";
    } else {
        swal("請先登入會員", "", "warning");
    }
});







