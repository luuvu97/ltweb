$(window).scroll(function () {
  var pageScroll = window.pageYOffset || document.documentElement.scrollTop;
  $(".products-layout").css("transform","translateY(-"+pageScroll/800+"%)");
});

$(".product .box").hover(function () {
  $(this).toggleClass("pulled");
});

$(".product img").click(function () {
  console.log($(this).attr('data'));
  $("#"+$(this).attr('data')).addClass("popup");
});

$(".product-detail").click(function () {
  $(this).removeClass("popup");
});

$(".product-detail .btn").hover(function () {
  $(this).toggleClass("reverse");
});
