$(document).ready(function () {

  /****************  TOP-NAV **************************/
  $(window).scroll(function () {
    var scrollVal = window.pageYOffset;
    if (scrollVal > 0) {
      $(".top-nav").addClass("mini");
    } else $(".top-nav").removeClass("mini");
  });

  //refreshing the page...
  var scrollVal = document.documentElement.scrollTop;
  if (scrollVal > 0) {
    $(".top-nav").addClass("mini");
  }

  /****************** ALPHABET FILTER ***************************/
  $(".alpha span").click(function () {
    var authors = document.querySelectorAll(".grid-layout .author");
    var findDigit = $(this)[0].innerHTML;
    // console.log(authors);
    authors.forEach(function (author) {
      var firstDigit = Array.from(author.lastChild.innerText)[0];
      if (firstDigit.toUpperCase() === findDigit) {
        $(author).removeClass("blur");
      } else {
        $(author).addClass("blur");
      }
      if (findDigit === "All") $(author).removeClass("blur");
      // console.log(author.attributes["data"].value);
    })
  });

  /************************* Popup Product ******************************/
  $(".book img").click(function () {
    console.log($(this).attr('data'));
    $("#"+$(this).attr('data')).addClass("popup");
  });

  $(".product-detail").click(function () {
    $(this).removeClass("popup");
  });

  $(".product-detail .btn").hover(function () {
      $(this).toggleClass("reverse");
  });
  $(".product-detail .content .btn").click(function () {
    var bookid = $(this).attr('data').substring(3, $(this).attr('data').length);
    var quantity = prompt("How much do you want: ");
    if(isNaN(quantity)){
      alert("You input a wrong number")
    }
    else{
      url = "addCart.php?bookid=" + bookid + "&quantity=" + quantity;
      window.open(url, "_self");
    }
    $(this).removeClass("popup");
  });
});
