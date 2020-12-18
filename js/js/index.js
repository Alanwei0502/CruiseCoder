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
        if($('.skw-page-3').is('.active')){
            var readyMove = $('.skw-page')
            for(let i = 0; i < readyMove.length; i++){
                readyMove[i].classList.remove('active');
                readyMove[i].classList.remove('inactive');
            }
            $('.skw-page-1').addClass('.active');
            curPage = 0;
        }
        navigateDown();
    }, 6500);
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

    $('.highcharts-root').css('overflow','visible');

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

    $('.highcharts-label text').css('font-size','15px')
    if(window.outerWidth <= 590){
        $('.highcharts-label text').css('font-size','12px')
    }
    // 圓餅圖套件結束





    // 課程輪撥開始

    var itemWidth = $('div.wrapGeneral').outerWidth(true);
    // var CourseWidth = $('.Course').outerWidth();
    // var controlCircle= $('div.controlCircle')[0];

    window.onresize = function(){
        itemWidth = $('div.wrapGeneral').outerWidth(true);
    }

    $('span.Circle').click(function(){
        var span = $('span');

        // 使用迴圈來清除所有的bgcBlack
        for(let i = 0; i < span.length; i++){
            span[i].classList.remove('bgcBlack');
        }

        // 點擊的span加上bgcBlack
        $(this).addClass('bgcBlack');
        var index = $(this).index();

        // 輪撥執行   
        $('#slide').animate({
        left: index * itemWidth * -1
        },1200);

        // 清除setInterval 避免click span標籤後 setInterval又接著執行一次
        clearInterval(add);

        // 重新再給一次setInterval
        setTimeout(function(){
            add = setInterval(startMove, 4200);
        })

    });


    function startMove(){
        // 清除bgcBlack  並在下一個span加上bgcBlack
        $('span.bgcBlack').removeClass('bgcBlack').next().addClass('bgcBlack');

        // 如果沒有任何一個span有bgcBlack  並在第一個加上bgcBlack
        if($('span.bgcBlack').index() == -1){
            $('div.controlCircle span').first().addClass('bgcBlack');

            // 回到0的位置
            $('#slide').animate({
                left: 0
            },1200);

        }else{
            // 取得span.bgcBlack目前索引值
            var bgcBlack_index = $('span.bgcBlack').index();

            $('#slide').animate({
                left: bgcBlack_index * itemWidth * -1
            },1200);
        }
    }
    add = setInterval(startMove, 4200)

    // window.onresize = function(){
    //     itemWidth = $('div.wrapGeneral').outerWidth(true);
    //     console.log(CourseWidth);
    // }


    // if(CourseWidth <= 768){
    //     var Circle = `<span class="Circle"></span>`;
    //     for(let i = 0; i < 6 ;i++){
    //         controlCircle.insertAdjacentHTML("beforeend", Circle);
    //     }
    //     $('span.Circle').click(function(){
    //         var span = $('span');
    
    //         // 使用迴圈來清除所有的bgcBlack
    //         for(let i = 0; i < span.length; i++){
    //             span[i].classList.remove('bgcBlack');
    //         }
    
    //         // 點擊的span加上bgcBlack
    //         $(this).addClass('bgcBlack');
    //         var index = $(this).index();
    
    //         // 輪撥執行   
    //         $('#slide').animate({
    //         left: index * itemWidth * -1
    //         },1200);
    
    //         // 清除setInterval 避免click span標籤後 setInterval又接著執行一次
    //         clearInterval(add);
    
    //         // 重新再給一次setInterval
    //         setTimeout(function(){
    //             add = setInterval(startMove, 4200);
    //         })
    
    //     });
    
    
    //     function startMove(){
    //         // 清除bgcBlack  並在下一個span加上bgcBlack
    //         $('span.bgcBlack').removeClass('bgcBlack').next().addClass('bgcBlack');
    
    //         // 如果沒有任何一個span有bgcBlack  並在第一個加上bgcBlack
    //         if($('span.bgcBlack').index() == -1){
    //             $('div.controlCircle span').first().addClass('bgcBlack');
    
    //             // 回到0的位置
    //             $('#slide').animate({
    //                 left: 0
    //             },1200);
    
    //         }else{
    //             // 取得span.bgcBlack目前索引值
    //             var bgcBlack_index = $('span.bgcBlack').index();
    
    //             $('#slide').animate({
    //                 left: bgcBlack_index * itemWidth * -1
    //             },1200);
    //         }
    //     }
    //     add = setInterval(startMove, 4200);
    // }
    // else{
    //     $('span.Circle').click(function(){
    //         var span = $('span');
    
    //         // 使用迴圈來清除所有的bgcBlack
    //         for(let i = 0; i < span.length; i++){
    //             span[i].classList.remove('bgcBlack');
    //         }
    
    //         // 點擊的span加上bgcBlack
    //         $(this).addClass('bgcBlack');
    //         var index = $(this).index();
    
    //         // 輪撥執行   
    //         $('#slide').animate({
    //         left: index * (itemWidth * 3) * -1
    //         },1200);
    
    //         // 清除setInterval 避免click span標籤後 setInterval又接著執行一次
    //         clearInterval(add);
    
    //         // 重新再給一次setInterval
    //         setTimeout(function(){
    //             add = setInterval(startMove, 4200);
    //         })
    
    //     });
    
    
    //     function startMove(){
    //         // 清除bgcBlack  並在下一個span加上bgcBlack
    //         $('span.bgcBlack').removeClass('bgcBlack').next().addClass('bgcBlack');
    
    //         // 如果沒有任何一個span有bgcBlack  並在第一個加上bgcBlack
    //         if($('span.bgcBlack').index() == -1){
    //             $('div.controlCircle span').first().addClass('bgcBlack');
    
    //             // 回到0的位置
    //             $('#slide').animate({
    //                 left: 0
    //             },1200);
    
    //         }else{
    //             // 取得span.bgcBlack目前索引值
    //             var bgcBlack_index = $('span.bgcBlack').index();
    
    //             $('#slide').animate({
    //                 left: bgcBlack_index * (itemWidth * 3) * -1
    //             },1200);
    //         }
    //     }
    //     add = setInterval(startMove, 4200)
    // }

    // 課程輪撥結束
});