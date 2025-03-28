export function seePassword() {
  $(".passIcon").on("click", function () {
    let password = $("#password");
    $(".passIcon").not(this).show();
    if (password.attr("type") == "password") {
      password.attr("type", "text");
    } else {
      password.attr("type", "password");
    }
    $(this).hide();
  });
}

export function adminNotifCont(result) {
  const notifContainer = $("#notif-cont");

  if (result == 0) {
    notifContainer.css("max-height", "500px");
  } else {
    notifContainer.css("max-height", "0");
  }
}

export function timeAgo(timestampString) {
  let timestampDate = new Date(timestampString);
  let now = new Date();
  let diffInMs = now - timestampDate;

  let diffInSeconds = Math.floor(diffInMs / 1000);
  let diffInMinutes = Math.floor(diffInSeconds / 60);
  let diffInHours = Math.floor(diffInMinutes / 60);
  let diffInDays = Math.floor(diffInHours / 24);

  if (diffInMinutes < 1) {
    return `${diffInSeconds} sec`;
  } else if (diffInMinutes < 60) {
    return `${diffInMinutes}m`;
  } else if (diffInHours < 24) {
    return `${diffInHours}h`;
  } else {
    return `${diffInDays}d`;
  }
}
export function showLoading(totalRows, notifLimit) {
  if (totalRows < notifLimit) {
    $("#load-cont")[0].style.setProperty("display", "none", "important");
    $("#loading-icon")[0].style.setProperty("display", "none", "important");
  } else {
    $("#load-cont")[0].style.setProperty("display", "none", "important");
    $("#loading-icon")[0].style.setProperty("display", "block", "important");
    setTimeout(() => {
      $("#load-cont")[0].style.setProperty("display", "flex", "important");
      $("#loading-icon")[0].style.setProperty("display", "none", "important");
    }, 1500);
  }
}
export function setNotifLimit() {
  sessionStorage.setItem("notifLimit", 1);
}
export function checkAdminLogin(response) {
  if (response == 1) {
    alert("login success");
  } else if (response == "Invalid Password") {
    $("#response").html(response);
    $(".input-cont").eq(1).css("border-color", "red");
    $("label").eq(1).css("color", "red");
    setTimeout(function () {
      $("#response").html("");
      $(".input-cont").eq(1).css("border-color", "");
      $("label").eq(1).css("color", "");
    }, 3500);
  } else {
    $("#response").html(response);
    $("label").css("color", "red");
    $(".input-cont").css("border-color", "red");
    setTimeout(function () {
      $("#response").html("");
      $(".input-cont").css("border-color", "");
      $("label").css("color", "");
    }, 3500);
  }
}

export function sliceText(txt, limit) {
  return txt.length > limit ? txt.substr(0, limit) + "..." : txt;
}

export function openNavigation(container, maxHeight) {
  container.css({
    "max-height": maxHeight + "px",
  });
}

export function openFoundationWidget() {
  $(".foundation-head").each(function (index) {
    let num = 1;
    const foundationBody = $(".foundation-body").eq(index);
    const foundationArrow = $(".foundationArrow").eq(index);
    $(this).on("click", function () {
      let result = num++ % 2;

      if (result == 1) {
        foundationBody.css({
          "max-height": "500px",
        });
        foundationArrow.css({
          transform: "rotate(90deg)",
          transition: "0.5s ease",
        });
      } else {
        foundationBody.css({
          "max-height": "0",
        });
        foundationArrow.css({
          transform: "rotate(0)",
          transition: "0.5s ease",
        });
      }
    });
  });
}
$(document).on("click", ".guideBtn", function () {
  const index = $(".guideBtn").index(this);
  $(".guideBtn").css({
    "background-color": "",
    color: "",
  });
  $(this).css({
    "background-color": "#13bc27",
    color: "white",
  });

  $(".guideArrow").css("visibility", "hidden");
  $(".guideArrow").eq(index).css("visibility", "visible");

  $(".rules").hide();
  $(".rules").eq(index).show();
});

$("#addRules").on("click", () => {
  const inputCont = $("#inputRules");
  const input = `<textarea name="guidelineRules[]" class="form-control" placeholder="Enter Rules"
                                required rows="5"></textarea>`;
  inputCont.append(input);
});
