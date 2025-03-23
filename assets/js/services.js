let num = 1;
$(".header").each(function (index) {
  $(this).on("click", function () {
    const result = num++ % 2;

    if (result == 1) {
      $(".text").eq(index).css("max-height", "100em");
      $(".arrow").eq(index).css({
        transform: "rotate(90deg)",
        color: "#13bc27",
      });
    } else {
      $(".text").eq(index).css("max-height", "0");
      $(".arrow").eq(index).css({
        transform: "rotate(0)",
        color: "black",
      });
    }
  });
});

$(".menu-head").each(function (index) {
  $(".menu-head").eq(0).css({
    "background-color": "#13bc27",
    color: "white",
  });
  $(this).on("click", function () {
    $(".cont").css("display", "none");
    $(".cont").eq(index).css("display", "flex");
    $(".menu-head").css({
      "background-color": "",
      color: "",
    });
    $(".menu-head").eq(index).css({
      "background-color": "#13bc27",
      color: "white",
    });
  });
});
