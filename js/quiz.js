//測驗須知，checkbox勾選
var startQuiz = document.getElementsByClassName('startQuiz');
var checkOne = document.getElementsByTagName('checkOne');
var checkTwo = document.getElementsByTagName('checkTwo');
startQuiz[0].addEventListener('click', function () {
    if (!(checkOne.checked || checkTwo.checked)) {
        alert('請先閱讀完並勾選所有測驗規則');
    }
});

// 頁籤切換
var complete = document.getElementsByClassName('complete');
var section = document.getElementsByTagName('section');
var next = document.getElementsByClassName('next');

for (var i = 0; i < next.length; i++) {
    next[i].addEventListener('click', function () {
        this.closest("section").style.cssText = 'display: none;';
        this.closest("section").nextElementSibling.style.cssText = 'display: block;';
    });
}


// 是否前往會員中心的判斷
// var login = false;
complete[0].addEventListener('click', function () {
    // if (login == false){
    alert('請先登入會員');
    // }else{
    //     // 轉跳會員中心
    // }
});



