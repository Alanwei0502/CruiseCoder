$(document).ready(function() {



    // 輪撥圖開始↓↓↓↓↓
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
    // 輪撥圖結束↑↑↑↑↑


    // 圓餅圖套件開始↓↓↓↓↓
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
            text: '',
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%',
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
        series: [
            {
                name: 'Brands',
                colorByPoint: true,
                data: [
                    {name: '優勢2：線上課程',y: 33.3,}, 
                    {name: '優勢1：課後輔導 ',y: 33.3,sliced: true,selected: true}, 
                    {name: '優勢3：線上測驗',y: 33.3,}
                ]
            },
            
        ]
    });

    //↓移除套件預設圖型↓↓↓↓↓
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

    //↑移除套件預設圖型↑↑↑↑↑
    
    $('.highcharts-color-0').click(function(){
        $('#text1,#text2,#text3').css('display','none');
        $('#text1').css('display','block'); 
    });

    $('.highcharts-root').css('overflow','visible');

    $('.highcharts-color-1').click(function(){
        $('#text1,#text2,#text3').css('display','none');
        $('#text2').css('display','block'); 
    });

    $('.highcharts-color-2').click(function(){
        $('#text1,#text2,#text3').css('display','none');
        $('#text3').css('display','block'); 
    });

    $('.highcharts-label text').css('font-size','15px')
    if(window.outerWidth <= 590){
        $('.highcharts-label text').css('font-size','12px')
    }

    $('g.highcharts-data-labels').css('display','none')
    // 圓餅圖套件結束↑↑↑↑↑





    // 課程輪撥開始↓↓↓↓↓

    let vm = new Vue({
        el: '#slide',     //el: document.getElementById('app'),
        data: {         //變數都放這裡
            allCourses: [],
        },
        methods: {

        },
        mounted(){
            $.getJSON("../frontEnd/indexR.php").then(res=>{
                for(let i = 0; i < 9 ;i++){
                    this.allCourses.push(res[i]);
                };
            });
        },
    });

    var itemWidth = $('div.wrapGeneral').outerWidth(true);

    window.onresize = function(){
        itemWidth = $('div.wrapGeneral').outerWidth(true);
    }
    setTimeout(function(){
        itemWidth = $('div.wrapGeneral').outerWidth(true);
        var starWarp = document.querySelectorAll('div.star');
        for(let i = 0; i < 9 ; i++){
            if(vm.allCourses[i].rRate >= 1){
                for(let j = 0; j < Math.floor(vm.allCourses[i].rRate); j++){
                    starWarp[i].innerHTML += `<i class="fas fa-star"></i>`;
                    zoroStar = 5 - Math.floor(vm.allCourses[i].rRate);
                    
                    
                }
                for(let k = 0; k < zoroStar; k++){
                    starWarp[i].innerHTML += `<i class="far fa-star"></i>`;
                }


            }else{
                for(let l = 0 ; l < 5; l++){
                    starWarp[i].innerHTML += `<i class="far fa-star"></i>`;
                }
            };
        };
    },150);

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
        // 課程輪撥開始↑↑↑↑↑




    let vm1 = new Vue({
        el: '#galaxyBlock',     //el: document.getElementById('app'),
        data: {         //變數都放這裡
            allPlanet: [],
            PlanetText: [
                'CSS（Cascading Style Sheets）串接樣式表：一種用來為結構化文件（如HTML文件或XML應用）添加樣式（字型、間距和顏色等）的電腦語言，由W3C定義和維護，意指在文件中CSS不會單獨存在，只是輔助結構化文件的樣式呈現。',
                'HTML是一種網頁使用的語言，是一種描述超文件的註記語言SGML Standard Generalized Markup Language所制訂出的一種網頁語言，基本上現行的瀏覽器都可以讀取HTML，使用HTML可以編輯設計出網頁，也可以在網頁中加入所有HTML語言可支援的.....',
                'JavaScript 是個優質的語言，當年開發它的工程師只花了十天就設計完了，過了二十幾年在前端仍有不可或缺的地位。這系列的文章會帶大家入門 JavaScript，望大家早日入坑，以一個語言就能寫完前端、後端、資料分析、機器學習、視覺化等各式各樣的作品。',
                'sass是一種基於css所產生的高階語言，他將一般程式語言所擁有邏輯概念和變數帶入css樣式表中，讓我們在撰寫網站的樣式時，可以用更快速、更方便的方式撰寫。',
                'PHP（中文名：超文本預處理器）是一種通用開源腳本語言。語法吸收了C語言、Java和Perl的特點，利於學習，使用廣泛，主要適用於Web開發領域。PHP 獨特的語法混合了C、Java、Perl以及PHP自創的語法。',
            ],
        },
        methods: {
            changePlanet(e){
                $.ajax({
                    type: 'POST',
                    url: "../frontEnd/indexG.php",
                    data: {
                        getPlanet: e.target.previousElementSibling.value,
                    },
                    dataType: "text",
                    success: function (res) {
                        let Planetdata = JSON.parse(res);
                        vm1.allPlanet = [];
                        for(let i = 0; i < Planetdata.length; i++){
                            vm1.allPlanet.push('../images/trial/planets/' + Planetdata[i].bIcon);
                        }
                        document.getElementsByClassName('titlePlanet')[0].innerText = e.target.previousElementSibling.value;
                    }
                });
            }
        },
        mounted(){
            $('.CSS').click(function(){
                $('.textContent').text(vm1.PlanetText[0]);
            });
            $('.HTML').click(function(){
                $('.textContent').text(vm1.PlanetText[1]);
            });
            $('.JS').click(function(){
                $('.textContent').text(vm1.PlanetText[2]);
            });
            $('.SQL').click(function(){
                $('.textContent').text(vm1.PlanetText[3]);
            });
            $('.PHP').click(function(){
                $('.textContent').text(vm1.PlanetText[4]);
            });

            $.ajax({
                type: 'POST',
                url: "../frontEnd/indexG.php",
                data: {
                    first: 'first',
                },
                dataType: "text",
                success: function (res) {
                    let Planetdata = JSON.parse(res);
                    for(let i = 0; i < Planetdata.length; i++){
                        vm1.allPlanet.push('../images/trial/planets/' + Planetdata[i].bIcon);
                    }
                }
            });

            
        },
        updated() {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 3,
                spaceBetween: 30,
                freeMode: true,
                pagination: {
                clickable: false,
                },
            });
        },
    });

});