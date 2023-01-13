$(function () {
  $(window).on("scroll", function () {
    if ($(window).scrollTop() > 70) {
      $(".navbar").addClass("active-1");
      $(".nav-img").css("filter", "invert(0%)");
      $("ul.sub-menu").css("background-color", "white");
    } else {
      $(".navbar").removeClass("active-1");
      $(".nav-img").css("filter", "invert(100%)");
      $("ul.sub-menu").css("background-color", "black");
    }
  });
});

Window.onload = function () {
  if (localStorage.getItem("windows") === 1) {
    window.close();
  } else {
    localStorage.setItem("windows", 1);
  }
};
Window.onbeforeunload = function () {
  localStorage.setItem("windows", 0);
};

$(document).ready(function () {
  $(".counter").counterUp({
    delay: 1,
    time: 120,
  });
});

// $("#registration-form").click(function (event) {
//   event.preventDefault();
// });

// $("#LoginModal").click(function (event) {
//   event.preventDefault();
// });

// $(window).load(function() {
//   $("#myCarousel .item").each(function() {
//       var i = $(this).next();
//       i.length || (i = $(this).siblings(":first")),
//         i.children(":first-child").clone().appendTo($(this));

//       for (var n = 0; n < 1; n++)(i = i.next()).length ||
//         (i = $(this).siblings(":first")),
//         i.children(":first-child").clone().appendTo($(this))
//   })
// });
