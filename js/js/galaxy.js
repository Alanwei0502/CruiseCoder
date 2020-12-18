// 星系icon====================================================
let inGalaxy = new Vue({
    el: "#inGalaxy",
    data: {
        galaxyNames: [{
            name: "HTML星系",
            pic: "../images/trial/galaxy/g1.png",
        },
        {
            name: "CSS星系",
            pic: "../images/trial/galaxy/g2.png",
        },
        {
            name: "Javascript星系",
            pic: "../images/trial/galaxy/g3.png",
        },
        {
            name: "jQuery星系",
            pic: "../images/trial/galaxy/g4.png",
        },
        {
            name: "SASS星系",
            pic: "../images/trial/galaxy/g5.png",
        },
        {
            name: "PHP星系",
            pic: "../images/trial/galaxy/g6.png",
        },
        {
            name: "MySQL星系",
            pic: "../images/trial/galaxy/g7.png",
        },
            // {
            //     name: "Vue星系",
            //     pic: "../images/trial/galaxy/g8.png",
            // }
        ],
    },
})

//星球icon====================================================
let carousel = new Vue({
    el: "#carousel",
    data: {
        planetsNames: [
            {
                className: "planet planetOne",
                imageSrc: "../images/trial/planets/html1.png",
                divName: "HTML初級星球",
            },
            {
                className: "planet planetTwo",
                imageSrc: "../images/trial/planets/html2.png",
                divName: "HTML中級星球",
            },
            {
                className: "planet planetThree",
                imageSrc: "../images/trial/planets/html3.png",
                divName: "HTML高級星球",
            },
        ],
    }
})

//徽章icon======================================================
let article = new Vue({
    el: "#article",
    data: {
        planetsInfos: [
            {
                planetName: "HTML初級星球",
                description: "如果你是剛開始學習HTML，可是試試看先挑戰這顆HTML初級星球關卡，達到標準後，可以獲得此顆星球認證喔！",
                badgeSrc: "../images/trial/badge/html1.png",
                href: "quiz.php?subject=HTML星系&level=1&name=HTML初級星球",
            },
            {
                planetName: "HTML中級星球",
                description: "若你已經學習HTML一段時間可以挑戰看看這顆星球，達到標準後，可以獲得此顆星球認證喔！",
                badgeSrc: "../images/trial/badge/html2.png",
                href: "quiz.php?subject=HTML星系&level=2&name=HTML中級星球",
            },
            {
                planetName: "HTML高級星球",
                description: "若你自詡為HTML大師，那就來挑戰這顆星球吧！達到標準後，可以獲得此顆星球認證喔！",
                badgeSrc: "../images/trial/badge/html3.png",
                href: "quiz.php?subject=HTML星系&level=3&name=HTML高級星球",
            },
        ],
    }
});

//星球輪播、星球介紹與徽章切換===============================================
let planet = document.getElementsByClassName('planet');
let planetOne = document.getElementsByClassName('planetOne')[0];
let planetTwo = document.getElementsByClassName('planetTwo')[0];
let planetThree = document.getElementsByClassName('planetThree')[0];
let insideArticle = document.getElementsByClassName('insideArticle');


for (let i = 0; i < planet.length; i++) {
    insideArticle[1].style.cssText = "display: block;";

    planet[i].addEventListener("click", function () {
        if (i === 0) {//點擊藍色那顆
            planetOne.classList.add('planetTwo');
            planetOne.classList.remove('planetThree', 'planetOne');

            planetTwo.classList.add('planetThree');
            planetTwo.classList.remove('planetTwo', 'planetOne');

            planetThree.classList.add('planetOne');
            planetThree.classList.remove('planetThree', 'planetTwo');


        }
        if (i === 1) {//點擊紅色那顆
            planetOne.classList.add('planetOne');
            planetOne.classList.remove('planetThree', 'planetTwo');

            planetTwo.classList.add('planetTwo');
            planetTwo.classList.remove('planetThree', 'planetOne');

            planetThree.classList.add('planetThree');
            planetThree.classList.remove('planetOne', 'planetTwo');
        }
        if (i === 2) {//點擊綠色那顆
            planetOne.classList.add('planetThree');
            planetOne.classList.remove('planetTwo', 'planetOne');

            planetTwo.classList.add('planetOne');
            planetTwo.classList.remove('planetTwo', 'planetThree');

            planetThree.classList.add('planetTwo');
            planetThree.classList.remove('planetThree', 'planetOne');
        }
        function changeArticle() {
            let planetName = planet[i].querySelector('div').innerText;
            for (let j = 0; j < insideArticle.length; j++) {
                insideArticle[j].style.cssText = "display: none;";
                if (planetName === insideArticle[j].querySelector('h3').innerText) {
                    insideArticle[j].style.cssText = "display: block;";
                }
            }
        }
        changeArticle();


    });
}

// 點擊星系切換星球 ajax==========================================
$(document).ready(function () {
    $('.galaxyIcon').click(function () {
        let name = $(this).children('div').text();
        // console.log(name);
        $.ajax({
            type: 'POST',
            url: 'galaxyR.php',
            data: { name },
            // dataType: 'json',
            success: function (res) {
                let array = JSON.parse(res);
                console.log(array);

                for (let i = 0; i < planet.length; i++) {
                    planet[i].querySelector('img').setAttribute('src', array[i].bIcon);
                    planet[i].querySelector('div').innerText = array[i].bName;
                }


                for (let j = 0; j < insideArticle.length; j++) {
                    $('.insideArticle h3').eq(j).text(array[j].bName);
                    $('.insideArticle p').eq(j).text(array[j].bInfo);
                    $('.insideArticle img').eq(j).attr("src", array[j].bBadge);
                    $('.goToQuiz').eq(j).attr("href", `quiz.php?subject=${array[j].bGalaxy}&level=${array[j].bLevel}&name=${array[j].bName}`);
                }

                $('.galaxyBadge img').attr("src", array[3].bBadge);

                $('.badge p span').text(array[3].bGalaxy);
            },
        });
    });
});