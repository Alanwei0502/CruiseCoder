$(document).ready(function (){

    noOrder();

})

function noOrder() {
    let orderArea = document.querySelector('.orderArea');
    let order = document.querySelector('.orderArea .accordion');

    if (order == null) {
        $('.haveNoOrder').css('display', 'block');
        $('.orderArea').css('display', 'none');
    }
}