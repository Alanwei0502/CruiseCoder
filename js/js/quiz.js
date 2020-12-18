// 沒登入的提醒
// if (!checkCookie('user')) {
//     swal("登入後才可以獲得徽章喔", "", "info");
// };

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


// 判斷是否有作答&作答是否正確====================================
// var answerCount = 0;
// function answerCountPlus() {
//     answerCount = answerCount + 1;
//     return answerCount;
// }


// 綁定下一題的按鈕
for (let j = 0; j < nextQuestion.length; j++) {
    nextQuestion[j].addEventListener('click', function () {
        let selections = this.closest("section").querySelectorAll('.selection');

        for (let i = 0; i < selections.length; i++) {

            if (selections[i].checked) {
                this.closest("section").classList.add('-hide');
                this.closest("section").nextElementSibling.classList.add('-show');

                // 判斷作答是否正確
                let chooseOption = selections[i].value;
                let correctAnswer = this.closest("section").querySelectorAll('div.question')[0].getAttribute("data-answer");

                if (chooseOption === correctAnswer) {
                    function answerCountPlus() {
                        answerCount = answerCount + 1;
                    }
                    answerCountPlus();
                }
            }
            else {
                swal("別放棄！請先作答再進入下一題", "", "info");
            }

        }
        if (j = 1) {
            correctCount.innerText = `答對題數：${answerCount}題`;
        }
    });


}








// 是否前往會員中心的判斷