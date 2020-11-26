$(document).ready(function(){
    var tr = $('tbody tr');
    console.log(tr);

    for (let i = 0; i < tr.length; i++) {
        if (i % 2 === 0) {
            tr[i].style.cssText = 'background-color: #FBF7EB';
        }
    }


    

})

