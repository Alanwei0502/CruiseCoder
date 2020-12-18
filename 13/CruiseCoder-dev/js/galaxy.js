//=========星球輪播 
var planet = document.getElementsByClassName('planet');
var carousel = document.getElementsByClassName('carousel');
var planetOne = document.getElementsByClassName('planetOne')[0];
var planetTwo = document.getElementsByClassName('planetTwo')[0];
var planetThree = document.getElementsByClassName('planetThree')[0];


for (let i = 0; i < planet.length; i++) {
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
    });
}

