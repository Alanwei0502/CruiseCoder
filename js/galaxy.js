// 星系icon====================================================
let galaxyVue = new Vue({
    el: "#galaxyVue",
    data: {
        galaxyNames: [],
        planetsNames: [],
        planetsAndBadges: [],
        name: 'HTML星系',
        galaxyBadge: 'html.png',
    },

    methods: {
        ajax() {
            let allGalaxy = "allGalaxy";
            let that = this;
            $.ajax({
                type: 'POST',
                url: 'galaxyR.php',
                data: { allGalaxy },
                // dataType: 'json',
                success: function (res) {
                    let array = JSON.parse(res);
                    // console.log(array);
                    for (let i = 0; i < array.length; i++) {
                        if (array[i]["gStatus"] == "1") {
                            that.galaxyNames.push(array[i]);
                        }
                    }
                },
            });
        },
        // 點星系換星球和徽章圖片
        changePlanet(e) {
            this.planetsAndBadges = [];
            let name = $(e.target).prev('div').text();
            this.name = name;
            let that = this;
            console.log(name);
            $.ajax({
                type: 'POST',
                url: 'galaxyR.php',
                data: { name },
                // dataType: 'json',
                success: function (res) {
                    let array = JSON.parse(res);
                    // console.log(array);
                    for (let i = 0; i < array.length; i++) {
                        if (array[i]["bLevel"] == "1") {
                            array[i].className = "planet planetOne";
                            array[i].href = `quiz.php?subject=${array[i].bGalaxy}&level=${array[i].bLevel}&name=${array[i].bName}`;
                            that.planetsAndBadges.push(array[i]);
                        } else if (array[i]["bLevel"] == "2") {
                            array[i].className = "planet planetTwo";
                            array[i].href = `quiz.php?subject=${array[i].bGalaxy}&level=${array[i].bLevel}&name=${array[i].bName}`;
                            that.planetsAndBadges.push(array[i]);
                        } else if (array[i]["bLevel"] == "3") {
                            array[i].className = "planet planetThree";
                            array[i].href = `quiz.php?subject=${array[i].bGalaxy}&level=${array[i].bLevel}&name=${array[i].bName}`;
                            that.planetsAndBadges.push(array[i]);
                        } else {
                            that.galaxyBadge = array[i].bBadge;
                        }
                    }
                },
            });
        },
        // 點星球旋轉
        rotatePlanet() {

            let planet = document.getElementsByClassName('planet');
            let insideArticle = document.getElementsByClassName('insideArticle');
            insideArticle[1].style.cssText = "display: block;";

            for (let i = 0; i < planet.length; i++) {

                planet[i].addEventListener("click", function () {

                    if (i === 0) {//點擊藍色那顆
                        planet[0].classList.add('planetTwo');
                        planet[0].classList.remove('planetThree', 'planetOne');

                        planet[1].classList.add('planetThree');
                        planet[1].classList.remove('planetTwo', 'planetOne');

                        planet[2].classList.add('planetOne');
                        planet[2].classList.remove('planetThree', 'planetTwo');

                    }
                    if (i === 1) {//點擊紅色那顆
                        planet[0].classList.add('planetOne');
                        planet[0].classList.remove('planetThree', 'planetTwo');

                        planet[1].classList.add('planetTwo');
                        planet[1].classList.remove('planetThree', 'planetOne');

                        planet[2].classList.add('planetThree');
                        planet[2].classList.remove('planetOne', 'planetTwo');

                    }
                    if (i === 2) {//點擊綠色那顆
                        planet[0].classList.add('planetThree');
                        planet[0].classList.remove('planetTwo', 'planetOne');

                        planet[1].classList.add('planetOne');
                        planet[1].classList.remove('planetTwo', 'planetThree');

                        planet[2].classList.add('planetTwo');
                        planet[2].classList.remove('planetThree', 'planetOne');

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
        },
        // 中級星球介紹預設開啟
        mediumPlanetShow() {
            $('.insideArticle').eq(1).css("display", "block");
        },

    },
    created() {

        this.ajax();

        let name = "HTML星系";
        let that = this;
        $.ajax({
            type: 'POST',
            url: 'galaxyR.php',
            data: { name },
            // dataType: 'json',
            success: function (res) {
                let array = JSON.parse(res);
                // console.log(array);
                for (let i = 0; i < array.length; i++) {
                    if (array[i]["bLevel"] == "1") {
                        array[i].className = "planet planetOne";
                        array[i].href = `quiz.php?subject=${array[i].bGalaxy}&level=${array[i].bLevel}&name=${array[i].bName}`;
                        that.planetsAndBadges.push(array[i]);
                    } else if (array[i]["bLevel"] == "2") {
                        array[i].className = "planet planetTwo";
                        array[i].href = `quiz.php?subject=${array[i].bGalaxy}&level=${array[i].bLevel}&name=${array[i].bName}`;
                        that.planetsAndBadges.push(array[i]);
                    } else if (array[i]["bLevel"] == "3") {
                        array[i].className = "planet planetThree";
                        array[i].href = `quiz.php?subject=${array[i].bGalaxy}&level=${array[i].bLevel}&name=${array[i].bName}`;
                        that.planetsAndBadges.push(array[i]);
                    } else {
                        //do nothing
                    }
                }
            },
        });
    },
    updated() {
        this.mediumPlanetShow();
    },
})

