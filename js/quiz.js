//測驗登入提醒
// alert('貼心提醒：請先登入會員，才可以獲得到成就徽章喔！');

//測驗須知，checkbox勾選，頁籤切換
var startQuiz = document.getElementsByClassName('startQuiz');
var checkOne = document.getElementById('checkOne');
var checkTwo = document.getElementById('checkTwo');
var complete = document.getElementsByClassName('complete');
var section = document.getElementsByTagName('section');
var nextQuestion = document.getElementsByClassName('nextQuestion');

startQuiz[0].addEventListener('click', function () {
    if (checkOne.checked && checkTwo.checked) {
        this.closest("section").style.cssText = 'display: none;';
        this.closest("section").nextElementSibling.style.cssText = 'display: block;';
    } else {
        alert('請先閱讀完並勾選所有測驗規則');
    }
});


// 判斷是否有作答
for (let j = 0; j < nextQuestion.length; j++) {
    nextQuestion[j].addEventListener('click', function () {
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
                this.closest("section").style.cssText = 'display: none;';
                this.closest("section").nextElementSibling.style.cssText = 'display: block;';
            }
        }


        // 判斷作答是否正確
        
    });
}





// 是否前往會員中心的判斷




