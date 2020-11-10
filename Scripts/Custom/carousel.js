$('.carousel').carousel({
    interval: 2000
})

$(document).ready(function () {
    screen_img();
});
/*window.onpaint = function() {screen_img()};*/

function screen_img() {
    var screen = (this).window.screen.availHeight;
    var determinedSize = $(window).height();
    if ($(window).width() < 768) {
        $(".carousel-inner img").css({ "height": determinedSize / 2 });
    }
    else {
        $(".carousel-inner img").css({ "height": determinedSize - 0 });
    }
}