$(document).ready(function() {

    var curPage = 1;
    var numOfPages = $(".skw-page").length;
    var animTime = 1000;
    var scrolling = false;
    var pgPrefix = ".skw-page-";

    function pagination() {
        scrolling = true;
    
        $(pgPrefix + curPage).removeClass("inactive").addClass("active");
        $(pgPrefix + (curPage - 1)).addClass("inactive");
        $(pgPrefix + (curPage + 1)).removeClass("active");
    
        setTimeout(function() {
            scrolling = false;
        }, animTime);
    };

    function navigateUp() {
        if (curPage === 1) return;
        curPage--;
        pagination();
    };

    function navigateDown() {
        if (curPage === numOfPages) return;
        curPage++;
        pagination();
    };

    setInterval(function(){
        if($('.skw-page-5').is('.active')){
            var readyMove = $('.skw-page')
            for(let i = 0; i < readyMove.length; i++){
                readyMove[i].classList.remove('active');
                readyMove[i].classList.remove('inactive');
            }
            $('.skw-page-1').addClass('.active');
            curPage = 0;
        }
        navigateDown();
    }, 2500);
});