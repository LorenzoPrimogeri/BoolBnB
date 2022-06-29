$(document).ready(function () {
    $("#arrowUsr").on('click', function () {
        ShowMenu();
        $("#arrowUsr").toggleClass('active');
    });
    $('#btn-hamburger').click(function () {
        ShowMenuSlide();
        $(this).toggleClass('open');
    });
});
function ShowMenu() {

    let tag = document.getElementById('subMenuUsr');
    if (tag.style.maxHeight !== '100%') {
        tag.style.maxHeight = '100%';
    } else {
        tag.style.maxHeight = '0';
    }
    console.log('ciao');
}
function ShowMenuSlide() {
    let tag = document.getElementById('subMenuSlide');
    if (tag.style.maxHeight !== '100%') {
        tag.style.maxHeight = '100%';
    } else {
        tag.style.maxHeight = '0';
    }
}
