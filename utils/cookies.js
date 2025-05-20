export function checkCookie() {
  $("#admin-body").attr("data-bs-theme", localStorage.getItem("theme"));
  switch (localStorage.getItem("theme")) {
    case "dark":
      $("#theme-input").prop("checked", true);
      break;
    case "light":
      $("#theme-input").prop("checked", false);
      break;
    default:
      $("#admin-body").attr("data-bs-theme", "light");
  }

  switch (localStorage.getItem("menu")) {
    case "open":
      $(".menu-links").css("min-width", "250px");
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
      $(".menu-links").css("min-width", "250px");
      $(".navText").each(function () {
        this.style.setProperty("max-width", "", "");
        this.style.setProperty("overflow", "", "");
        this.style.setProperty("display", "flex", "important");
      });
  }

  switch (sessionStorage.getItem("settingsNav")) {
    case "open":
      $("#settingsNav").css({
        "max-height": "500px",
      });
      break;
    case "close":
      $("#settingsNav").css({
        "max-height": "0",
      });
      break;
    default:
      $("#settingsNav").css({
        "max-height": "0",
      });
  }
}
export function darkTheme() {
  localStorage.setItem("theme", "dark");
  $("#admin-body").attr("data-bs-theme", "dark");
}
export function lightTheme() {
  $("#admin-body").attr("data-bs-theme", "light");
  $.removeCookie("theme");
  localStorage.setItem("theme", "light");
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
    localStorage.setItem("menu", "close");
  } else {
    $(".menu-links").css("min-width", "250px");
    $(".navText").each(function () {
      this.style.setProperty("max-width", "250px", "");

      setTimeout(() => {
        this.style.setProperty("display", "flex", "important");
      }, 500);
    });
    $(".openCloseMenu").eq(0).hide();
    $(".openCloseMenu").eq(1).show();
    $.removeCookie("menu");
    localStorage.setItem("menu", "open");
    $.removeCookie("settingsNav");
  }
}
export function setCookie(name, value) {
  localStorage.setItem(name, value);
}
