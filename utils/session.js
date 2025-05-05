export function setSession(name, value) {
  sessionStorage.setItem(name, value);
}

export function checkSessionSettings() {
  switch (sessionStorage.getItem("settingsNav")) {
    case "open":
      $("#settingsNav").css({
        "max-height": "500px",
      });
      $("#settingsArrow").css({
        transform: "rotate(90deg)",
      });
      break;
    case "close":
      $("#settingsNav").css({
        "max-height": "0",
      });
      $("#settingsArrow").css({
        transform: "rotate(0)",
      });
      break;
    default:
      $("#settingsNav").css({
        "max-height": "0",
      });
      $("#settingsArrow").css({
        transform: "rotate(0)",
      });
      break;
  }
}
