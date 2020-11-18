//=========星球輪播 
var planet = document.getElementsByClassName('planet');
var carousel = document.getElementsByClassName('carousel');
var planet0 = document.getElementById('planet0');
var planet1 = document.getElementById('planet1');
var planet2 = document.getElementById('planet2');


planet0.style.cssText = "left: -350px; transform: scale(0.5); z-index: -10;";
planet1.style.cssText = "left: 0; z-index: 1;";
planet2.style.cssText = "left: 350px; transform: scale(0.5); z-index: -10;";

for (let i = 0; i < planet.length; i++) {
    planet[i].addEventListener("click", function () {
        if (i === 0) {
            planet0.style.cssText = "left: 0;  z-index: 1;";
            planet1.style.cssText = "left: 350px; transform: scale(0.5); z-index: -10;";
            planet2.style.cssText = "left: -350px; transform: scale(0.5); z-index: -10;";
        }
        if (i === 1) {
            planet0.style.cssText = "left: -350px; transform: scale(0.5); z-index: -10;";
            planet1.style.cssText = "left: 0; z-index: 1;";
            planet2.style.cssText = "left: 350px; transform: scale(0.5); z-index: -10;";
        }
        if (i === 2) {
            planet0.style.cssText = "left: 350px; transform: scale(0.5); z-index: -10;";
            planet1.style.cssText = "left: -350px; transform: scale(0.5); z-index: -10;";
            planet2.style.cssText = "left: 0; z-index: 1;";
        }
    });
}



// $(".planet").click(function () {
//     $('.carousel').attr("planet-center", this.id);
//     if (this.id == "planet1") centerPlanet1();
//     if (this.id == "planet2") centerPlanet2();
//     if (this.id == "planet3") centerPlanet3();

// });


// function centerPlanet1() {
//     var tl = new TimelineMax()
//         .to('#planet1', 1, { xPercent: 0, z: 1 }, 0)
//         .to('#planet2', 1, { xPercent: 140, z: -800 }, 0)
//         .to('#planet3', 1, { xPercent: -140, z: -800 }, 0)

// }

// function centerPlanet2() {
//     var tl = new TimelineMax()
//         .to('#planet1', 1, { xPercent: -140, z: -800 }, 0)
//         .to('#planet2', 1, { xPercent: 0, z: 1 }, 0)
//         .to('#planet3', 1, { xPercent: 140, z: -800 }, 0);
// }

// function centerPlanet3() {
//     var tl = new TimelineMax()
//         .to('#planet1', 1, { xPercent: 140, z: -800 }, 0)
//         .to('#planet2', 1, { xPercent: -140, z: -800 }, 0)
//         .to('#planet3', 1, { xPercent: 0, z: 1 }, 0);
// }


// $(function () {
//     centerPlanet2();
// })
