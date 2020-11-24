//=========星球輪播 
var planet = document.getElementsByClassName('planet');
var carousel = document.getElementsByClassName('carousel');
var planetOne = document.getElementsByClassName('planetOne')[0];
var planetTwo = document.getElementsByClassName('planetTwo')[0];
var planetThree = document.getElementsByClassName('planetThree')[0];


for (let i = 0; i < planet.length; i++) {
    planet[i].addEventListener("click", function () {
        if (i === 0) {
            planetOne.classList.add('planetTwo');
            planetOne.classList.remove('planetThree');
            planetOne.classList.remove('planetOne');

            planetTwo.classList.add('planetThree');
            planetTwo.classList.remove('planetTwo');
            planetTwo.classList.remove('planetOne');

            planetThree.classList.add('planetOne');
            planetThree.classList.remove('planetThree');
            planetThree.classList.remove('planetTwo');
        }
        if (i === 1) {
            planetOne.classList.add('planetOne');
            planetOne.classList.remove('planetThree');
            planetOne.classList.remove('planetTwo');

            planetTwo.classList.add('planetTwo');
            planetTwo.classList.remove('planetThree');
            planetTwo.classList.remove('planetOne');

            planetThree.classList.add('planetThree');
            planetThree.classList.remove('planetOne');
            planetThree.classList.remove('planetTwo');
        }
        if (i === 2) {
            planetOne.classList.add('planetThree');
            planetOne.classList.remove('planetTwo');
            planetOne.classList.remove('planetOne');

            planetTwo.classList.add('planetOne');
            planetTwo.classList.remove('planetTwo');
            planetTwo.classList.remove('planetThree');

            planetThree.classList.add('planetTwo');
            planetThree.classList.remove('planetThree');
            planetThree.classList.remove('planetOne');
        }
    });
}

