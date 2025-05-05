$("#menu").on("click", function () {
  $("#mobile-links").show();
  $("body").css("overflow-y", "hidden");
  setTimeout(() => {
    $("#mobile-links").css("height", "100%");
  }, 0);

  $("#m-x").on("click", function () {
    $("#mobile-links").css("height", "0%");
    setTimeout(() => {
      $("#mobile-links").hide();
      $("body").css("overflow-y", "auto");
    }, 200);
  });
});
