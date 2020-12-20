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
    swal("請先登入會員才可以獲得徽章喔!", "", "info");
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
    } else {
        swal("請先閱讀完並勾選所有測驗規則", "", "info");
    }
});


// 綁定下一題的按鈕
for (let j = 0; j < nextQuestion.length; j++) {
    nextQuestion[j].addEventListener('click', function () {
        let selections = this.closest("section").querySelectorAll('.selection');

        if (!selections[0].checked && !selections[1].checked && !selections[2].checked && !selections[3].checked) {
            swal("別放棄！作答後再進入下一題", "", "info");
        }
        else {
            this.closest("section").classList.add('-hide');
            this.closest("section").nextElementSibling.classList.add('-show');

            // 判斷作答是否正確
            let chooseOption = selections[i].value;
            let correctAnswer = this.closest("section").querySelectorAll('div.question')[0].getAttribute("data-answer");

            if (chooseOption === correctAnswer) {
                function answerCountPlus() {
                    answerCount = answerCount + 1;
                    correctCount.innerText = `答對題數：${answerCount}題`;
                }
                answerCountPlus();
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
