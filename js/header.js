var shoppingCar = document.getElementsByClassName('shoppingCar')[0];
// console.log(shoppingCar);
var label = shoppingCar.querySelector('label');
// console.log(label);
var section = shoppingCar.querySelector('section');
console.log(section);
var input = label.querySelector('input');
// console.log(input);


var member = document.getElementsByClassName('member')[0];
// console.log(member);
var labelM = member.querySelector('label');
// console.log(labelM);
var ul = member.querySelector('ul');
console.log(ul);
var inputM = labelM.querySelector('input');
// console.log(inputM);

label.addEventListener('mouseup', function () {
    if (!input.checked) {
        section.style.cssText = 'opacity: 0.9; z-index: 100;';
    } else {
        section.style.cssText = 'opacity: 0; z-index: -100;';
    }
});

labelM.addEventListener('mouseup', function () {
    if (!inputM.checked) {
        ul.style.cssText = 'opacity: 0.9; z-index: 100;';
    } else {
        ul.style.cssText = 'opacity: 0; z-index: -100;';
    }
});

