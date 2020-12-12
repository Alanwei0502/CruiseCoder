

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


for (let j = 0; j < nextQuestion.length; j++) {

    nextQuestion[j].addEventListener('click', function abc() {
        let selections = this.closest("section").querySelectorAll('.selection');

        // console.log(selections);
        // let choosedAnswer = selections.some(selection => selection.checked === true);
        // if (choosedAnswer) {
        //     console.log("true");
        // } else {
        //     console.log("false");
        // }

        for (let i = 0; i < selections.length; i++) {


            if (selections[i].checked) {
                this.closest("section").classList.add('-hide');
                this.closest("section").nextElementSibling.classList.add('-show');

                // 判斷作答是否正確
                let chooseOption = selections[i].value;
                // console.log(chooseOption);
                let correctAnswer = this.closest("section").querySelectorAll('div.question')[0].getAttribute("data-answer");
                // console.log(correctAnswer);

                if (chooseOption === correctAnswer) {
                    function answerCountPlus() {
                        answerCount = answerCount + 1;
                    }
                    answerCountPlus();
                    // console.log(answerCount);
                }
            }
            else {
                // swal("別放棄！請先作答再進入下一題", "", "info");
            }
        }
        if (j = 1) {
            correctCount.innerText = `答對題數：${answerCount}題`;
            // console.log(correctCount);
        }
    });


}








// 是否前往會員中心的判斷