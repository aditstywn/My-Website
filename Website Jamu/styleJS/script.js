$(window).on("load", function () {
  //jumbotron
  $(".logo").addClass("muncul");
  $(".nama").addClass("muncul");
  $(".kata").addClass("muncul");
});

$(window).scroll(function () {
  var wScroll = $(this).scrollTop();
  // navbar
  if (wScroll > $(".about").offset().top - 70) {
    $(".navbar").addClass("muncul");
  }
  //about
  if (wScroll > $(".about").offset().top - 400) {
    $(".kiri").addClass("muncul");
    $(".kanan").addClass("muncul");
  }
  // tabpane
  if (wScroll > $(".tabpane").offset().top - 400) {
    $(".sejarah").addClass("muncul");
  }
  // produk
  if (wScroll > $(".produk").offset().top - 400) {
    $(".produk .card").each(function (i) {
      setTimeout(function () {
        $(".produk .card").eq(i).addClass("muncul");
      }, 600 * (i + 1));
    });
  }
  // komposisi
  if (wScroll > $(".komposisi").offset().top - 400) {
    $(".komposisi .card").each(function (i) {
      setTimeout(function () {
        $(".komposisi .card").eq(i).addClass("muncul");
      }, 700 * (i + 1));
    });
  }
  // galery
  if (wScroll > $(".galery").offset().top - 400) {
    $(".galery .rounded-circle").each(function (i) {
      setTimeout(function () {
        $(".galery .rounded-circle").eq(i).addClass("muncul");
      }, 700 * (i + 1));
    });
  }
});
