$(document).ready(function() {
    // 輪撥圖開始
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
    // 輪撥圖結束


    // 圓餅圖套件開始
    Highcharts.setOptions({
		colors: ['#F9433E', '#FCC93D', '#5BC4E3']
	});  
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: 'transparent',
            backgroundColor: 'rgba(207, 94, 118, 0)',
            plotBorderWidth: null,
            type: 'pie',
            plotShadow: false,
        },
        title: {
            text: ''
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: '優勢二',
                    y: 33.3,
                }, {
                    name: '優勢一',
                    y: 33.3,
                    sliced: true,
                    selected: true
                }, {
                    name: '優勢三',
                    y: 33.3,
                }]
        }]
    });

    //↓移除套件預設圖型
    $('.highcharts-button-symbol').css('display','none'); 
    $('.highcharts-credits').css('display','none'); 
    $('.highcharts-button-box').css('display','none'); 
    $('.container').css('width','10% !important'); 
    $('#container,.highcharts-container').css("overflow","visible");
    $('.highcharts-root').css({
        "margin-top":"0 auto",
        "position":"absolute",
        "top":"50%",
        "transform":"translateY(-25%)"
    });
    //↑移除套件預設圖型
    $('.highcharts-color-0').click(function(){
        $('#text1,#text2,#text3').css('display','none'); 
        // $('#text2').css('display','none'); 
        // $('#text3').css('display','none'); 
        $('#text1').css('display','block'); 
    });

    $('.highcharts-color-1').click(function(){
        $('#text1,#text2,#text3').css('display','none'); 
        // $('#text1').css('display','none'); 
        // $('#text2').css('display','none'); 
        // $('#text3').css('display','none'); 
        $('#text2').css('display','block'); 
    });

    $('.highcharts-color-2').click(function(){
        $('#text1,#text2,#text3').css('display','none'); 
        // $('#text1').css('display','none'); 
        // $('#text2').css('display','none'); 
        // $('#text3').css('display','none'); 
        $('#text3').css('display','block'); 
    });
    // 圓餅圖套件結束
});