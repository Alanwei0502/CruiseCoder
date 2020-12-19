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
        rotatePlanet(e) {
            // console.log($('.planet').eq(0));
            // console.log($(e.target).closest('.planet'));
            // if ($(e.target).closest('div').is(":nth-child(1)")) {
            //     console.log("1");
            //     $('.planet').eq(0).removeClass('planetThree planetOne planetTwo').addClass('planetTwo');
            //     $('.planet').eq(1).removeClass('planetThree planetOne planetTwo').addClass('planetThree');
            //     $('.planet').eq(2).removeClass('planetThree planetOne planetTwo').addClass('planetOne');
            // }
            // else if ($(e.target).closest('div').is(":nth-child(2)")) {
            //     console.log("2");
            //     $('.planet').eq(0).removeClass('planetThree planetOne planetTwo').addClass('planetTwo');
            //     $('.planet').eq(1).removeClass('planetThree planetOne planetTwo').addClass('planetThree');
            //     $('.planet').eq(2).removeClass('planetThree planetOne planetTwo').addClass('planetOne');
            // } else {
            //     console.log("3");
            //     $('.planet').eq(0).removeClass('planetThree planetOne planetTwo').addClass('planetTwo');
            //     $('.planet').eq(1).removeClass('planetThree planetOne planetTwo').addClass('planetThree');
            //     $('.planet').eq(2).removeClass('planetThree planetOne planetTwo').addClass('planetOne');
            // }


            let planet = document.getElementsByClassName('planet');
            let planetOne = document.getElementsByClassName('planetOne')[0];
            let planetTwo = document.getElementsByClassName('planetTwo')[0];
            let planetThree = document.getElementsByClassName('planetThree')[0];
            let insideArticle = document.getElementsByClassName('insideArticle');

            console.log(planet);

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
        }
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
                console.log(array);
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
})

// let planet = document.getElementsByClassName('planet');
// let planetOne = document.getElementsByClassName('planetOne')[0];
// let planetTwo = document.getElementsByClassName('planetTwo')[0];
// let planetThree = document.getElementsByClassName('planetThree')[0];
// let insideArticle = document.getElementsByClassName('insideArticle');


// for (let i = 0; i < planet.length; i++) {
//     insideArticle[1].style.cssText = "display: block;";

//     planet[i].addEventListener("click", function () {
//         if (i === 0) {//點擊藍色那顆
//             planetOne.classList.add('planetTwo');
//             planetOne.classList.remove('planetThree', 'planetOne');

//             planetTwo.classList.add('planetThree');
//             planetTwo.classList.remove('planetTwo', 'planetOne');

//             planetThree.classList.add('planetOne');
//             planetThree.classList.remove('planetThree', 'planetTwo');

//         }
//         if (i === 1) {//點擊紅色那顆
//             planetOne.classList.add('planetOne');
//             planetOne.classList.remove('planetThree', 'planetTwo');

//             planetTwo.classList.add('planetTwo');
//             planetTwo.classList.remove('planetThree', 'planetOne');

//             planetThree.classList.add('planetThree');
//             planetThree.classList.remove('planetOne', 'planetTwo');
//         }
//         if (i === 2) {//點擊綠色那顆
//             planetOne.classList.add('planetThree');
//             planetOne.classList.remove('planetTwo', 'planetOne');

//             planetTwo.classList.add('planetOne');
//             planetTwo.classList.remove('planetTwo', 'planetThree');

//             planetThree.classList.add('planetTwo');
//             planetThree.classList.remove('planetThree', 'planetOne');
//         }
//         function changeArticle() {
//             let planetName = planet[i].querySelector('div').innerText;
//             for (let j = 0; j < insideArticle.length; j++) {
//                 insideArticle[j].style.cssText = "display: none;";
//                 if (planetName === insideArticle[j].querySelector('h3').innerText) {
//                     insideArticle[j].style.cssText = "display: block;";
//                 }
//             }
//         }
//         changeArticle();


//     });
// }