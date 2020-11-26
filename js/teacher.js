$(document).ready(function(){
    var tr = $('tbody tr');
    for (let i = 0; i < tr.length; i++) {
        if (i % 2 === 0) {
            tr[i].style.cssText = 'background-color: #FBF7EB';
        }
    }


    $('button.add').click(function(){
        $('div.addBlock').removeClass('addBlockhidden');
        
    })

    $('div.grayBlock').click(function(){
        $('div.addBlock').addClass('addBlockhidden');
    })
    $('img.closeModal').click(function(){
        $('div.addBlock').addClass('addBlockhidden');
    })

})

