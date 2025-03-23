export function checkCookie() {
  $("#admin-body").attr("data-bs-theme", $.cookie("theme"));
  switch ($.cookie("theme")) {
    case "dark":
      $("#theme-input").prop("checked", true);
      break;
    case "light":
      $("#theme-input").prop("checked", false);
      break;
    default:
      $("#admin-body").attr("data-bs-theme", "light");
  }

  switch ($.cookie("menu")) {
    case "open":
      $(".menu-links").css("min-width", "300px");
      $(".navText").each(function () {
        // this.style.setProperty("max-width", "", "");
        // this.style.setProperty("overflow", "", "");
        this.style.setProperty("display", "flex", "important");
      });
      $(".openCloseMenu").eq(0).hide();
      $(".openCloseMenu").eq(1).show();
      break;
    case "close":
      $(".navText").each(function () {
        this.style.setProperty("max-width", "0", "important");
        this.style.setProperty("overflow", "hidden", "important");
        this.style.setProperty("display", "none", "important");
      });
      $(".openCloseMenu").eq(0).show();
      $(".openCloseMenu").eq(1).hide();
      break;
    default:
      $(".menu-links").css("min-width", "300px");
      $(".navText").each(function () {
        this.style.setProperty("max-width", "", "");
        this.style.setProperty("overflow", "", "");
        this.style.setProperty("display", "flex", "important");
      });
  }
}
export function darkTheme() {
  $.cookie("theme", "dark");
  $("#admin-body").attr("data-bs-theme", "dark");
}
export function lightTheme() {
  $("#admin-body").attr("data-bs-theme", "light");
  $.removeCookie("theme");
  $.cookie("theme", "light");
}
export function sideMenu(menu) {
  if (menu == 1) {
    $(".navText").each(function () {
      $(".menu-links").css("min-width", "0");
      this.style.setProperty("max-width", "0", "important");
      this.style.setProperty("overflow", "hidden", "important");

      setTimeout(() => {
        this.style.setProperty("display", "none", "important");
      }, 200);
    });
    $(".openCloseMenu").eq(0).show();
    $(".openCloseMenu").eq(1).hide();
    $.removeCookie("menu");
    $.cookie("menu", "close");
  } else {
    $(".menu-links").css("min-width", "300px");
    $(".navText").each(function () {
      this.style.setProperty("max-width", "300px", "");

      setTimeout(() => {
        this.style.setProperty("display", "flex", "important");
      }, 500);
    });
    $(".openCloseMenu").eq(0).hide();
    $(".openCloseMenu").eq(1).show();
    $.removeCookie("menu");
    $.cookie("menu", "open");
  }
}
export function setCookie() {
  sessionStorage.setItem("notifLimit", 10);
}
