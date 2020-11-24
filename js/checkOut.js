var close = document.getElementsByClassName("close");
for (let i = 0; i < close.length; i++) {
    close[i].addEventListener("click", function (e) {
        e.preventDefault();
        this.closest('div.course').remove();
    });
}