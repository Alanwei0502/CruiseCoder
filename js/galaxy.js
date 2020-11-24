//=========星球輪播 
var planet = document.getElementsByClassName('planet');
var carousel = document.getElementsByClassName('carousel');
var planet0 = document.getElementsByClassName('planet0')[0];
var planet1 = document.getElementsByClassName('planet1')[0];
var planet2 = document.getElementsByClassName('planet2')[0];


for (let i = 0; i < planet.length; i++) {
    planet[i].addEventListener("click", function () {
        if (i === 0) {
            planet0.classList.add('planet1');
            planet0.classList.remove('planet2');
            planet0.classList.remove('planet0');

            planet1.classList.add('planet2');
            planet1.classList.remove('planet1');
            planet1.classList.remove('planet0');

            planet2.classList.add('planet0');
            planet2.classList.remove('planet2');
            planet2.classList.remove('planet1');
        }
        if (i === 1) {

        }
        if (i === 2) {
            planet0.classList.add('planet2');
            planet0.classList.remove('planet1');
            planet0.classList.remove('planet0');

            planet1.classList.add('planet0');
            planet1.classList.remove('planet1');
            planet1.classList.remove('planet2');

            planet2.classList.add('planet1');
            planet2.classList.remove('planet2');
            planet2.classList.remove('planet0');
        }
    });
}

