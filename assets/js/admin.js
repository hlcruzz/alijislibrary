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
  // Convert the string to a Date object
  let timestampDate = new Date(timestampString);
  let now = new Date(); // Current date and time

  // Calculate the difference in milliseconds
  let diffInMs = now - timestampDate;

  // Calculate the time in minutes, hours, and days
  let diffInSeconds = Math.floor(diffInMs / 1000); // Convert to seconds
  let diffInMinutes = Math.floor(diffInSeconds / 60); // Convert to minutes
  let diffInHours = Math.floor(diffInMinutes / 60); // Convert to hours
  let diffInDays = Math.floor(diffInHours / 24); // Convert to days

  // Return the result in human-readable format
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
export function dataTable(tableName) {
  var table = tableName.DataTable({
    scrollY: "600px",
    scrollCollapse: true,
    responsive: true,
    columnDefs: [
      {
        targets: 0,
        width: "10px",
      },
    ],
  });

  // Reverse the rows on initialization
  var rows = table.rows().nodes().toArray(); // Get all rows
  rows.reverse(); // Reverse the row order

  // Append reversed rows to the table
  table.clear().rows.add(rows).draw();
}
