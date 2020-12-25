$('.backLoginArea input').blur(function () {
    if ($(this).val() != '') {
        $('.error').text('')
        $(this).css("border-color", "white")
    } else {
        $(this).css("border-color", "red")
    }
});