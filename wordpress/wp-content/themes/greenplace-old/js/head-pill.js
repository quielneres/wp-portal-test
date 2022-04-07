$(window).on('scroll touchmove', function() {
  $('.header.has-pill').toggleClass('header--pill', $(document).scrollTop() > 32);
  $('.brand.has-pill').toggleClass('brand--pill', $(document).scrollTop() > 32);
});
