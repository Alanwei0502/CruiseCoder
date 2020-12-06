//測驗登入提醒
alert('請先登入會員，才可以收集到徽章喔！');

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

        for (var i = 0; i < nextQuestion.length; i++) {
            nextQuestion[i].addEventListener('click', function () {
                this.closest("section").style.cssText = 'display: none;';
                this.closest("section").nextElementSibling.style.cssText = 'display: block;';
            });
        }
    } else {
        alert('請先閱讀完並勾選所有測驗規則');
    }
});




// 是否前往會員中心的判斷




