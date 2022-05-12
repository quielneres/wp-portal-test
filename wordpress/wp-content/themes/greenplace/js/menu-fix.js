const $ = jQuery

$(document).ready(function () {
    window.addEventListener('scroll', positionScroll)
})

function positionScroll() {
     window.scrollY > 32 ? $('.layout__head').addClass('header--pill') :
         $('.layout__head').removeClass('header--pill')
}