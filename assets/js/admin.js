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


export function arrayIcons() {
  const icons = [
    "home",
    "menu",
    "backspace",
    "arrow_back",
    "arrow_forward",
    "arrow_upward",
    "arrow_downward",
    "star",
    "favorite",
    "check",
    "close",
    "search",
    "settings",
    "alarm",
    "account_circle",
    "shopping_cart",
    "delete",
    "edit",
    "visibility",
    "mail",
    "message",
    "phone",
    "volume_up",
    "volume_down",
    "save",
    "download",
    "upload",
    "folder",
    "file_download",
    "warning",
    "error",
    "info",
    "notification_important",
    "camera",
    "image",
    "photo",
    "picture_in_picture",
    "map",
    "location_on",
    "directions",
    "compass_calibration",
    "share",
    "person_add",
    "group",
    "people",
    "toggle_on",
    "toggle_off",
    "fullscreen",
    "fullscreen_exit",
    "help",
    "lock",
    "lock_open",
    "vpn_key",
    "event",
    "event_note",
    "lightbulb",
    "thumb_up",
    "thumb_down",
    "star_border",
    "star_half",
    "assignment",
    "assignment_turned_in",
    "calendar_today",
    "access_time",
    "schedule",
    "history",
    "language",
    "public",
    "translate",
    "cloud",
    "cloud_upload",
    "cloud_download",
    "battery_full",
    "battery_charging_full",
    "wifi",
    "bluetooth",
    "security",
    "build",
    "bug_report",
    "code",
    "dashboard",
    "assessment",
    "trending_up",
    "trending_down",
    "bar_chart",
    "pie_chart",
    "insert_chart",
    "check_circle",
    "radio_button_checked",
    "radio_button_unchecked",
    "star_rate",
    "school",
    "emoji_events",
    "mediation",
    "diversity_3",
    "volunteer_activism",
    "add",
    "remove",
    "more_vert",
    "more_horiz",
    "menu_open",
    "expand_more",
    "expand_less",
    "play_arrow",
    "pause",
    "stop",
    "refresh",
    "redo",
    "undo",
    "print",
    "visibility_off",
    "notifications",
    "notifications_active",
    "notifications_none",
    "notifications_off",
    "bookmark",
    "bookmark_border",
    "flag",
    "label",
    "label_important",
    "add_circle",
    "remove_circle",
    "check_circle_outline",
    "error_outline",
    "warning_amber",
    "info_outline",
    "help_outline",
    "question_mark",
    "cancel",
    "clear",
    "done",
    "done_all",
    "done_outline",
    "drag_handle",
    "drag_indicator",
    "drag_handle",
    "format_paint",
    "format_textdirection_r_to_l",
    "format_textdirection_l_to_r",
    "format_bold",
    "format_italic",
    "format_underline",
    "format_list_bulleted",
    "format_list_numbered",
    "format_quote",
    "format_align_left",
    "format_align_center",
    "format_align_right",
    "format_align_justify",
    "format_indent_decrease",
    "format_indent_increase",
  ];

  $.each(icons, function (index, icon) {
    $("#iconList").append(`<option value="${icon}"></option>`);
  });

  $("#objectiveIcon").on("input", function () {
    const iconName = $(this).val();
    if (icons.includes(iconName)) {
      $("#selectedIcon").text(iconName);
      $("#iconPreview").fadeIn();
    } else {
      $("#iconPreview").fadeOut();
    }
  });
}

export function deleteDisplayObjectives(id) {
  return new Promise((resolve, reject) => {
    if (confirm("Are you sure you want to delete this objective?")) {
      objectivesDelete(id).then(function (response) {
        if (response) {
          resolve("Deleted successfully!");
        } else {
          reject("Failed to delete objective.");
        }
      });
    }
  });
}

