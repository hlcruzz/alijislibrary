import { adminLogin, addLoginHistory, sendAuthCode, changePassword } from "../../router/index-route.js";
$(document).ready(function () {
  if ($.cookie("rememberMe")) {
    $("#username").val($.cookie("username"));
    $("#password").val($.cookie("password"));
    $("#rememberCheck").prop("checked", true);
  }
});
$("#adminForm").submit(function (event) {
  event.preventDefault();
  const username = $("#username").val();
  const password = $("#password").val();
  const remember = $("#rememberCheck").is(":checked");

  adminLogin(username, password).then((response) => {
    switch (response) {
      case "Invalid Password":
        $("#response").html(response);
        $(".input-cont").eq(1).css("border-color", "red");
        $("label").eq(1).css("color", "red");
        setTimeout(function () {
          $("#response").html("");
          $(".input-cont").eq(1).css("border-color", "");
          $("label").eq(1).css("color", "");
        }, 3500);
        break;
      case "Account not found":
        $("#response").html(response);
        $("label").css("color", "red");
        $(".input-cont").css("border-color", "red");
        setTimeout(function () {
          $("#response").html("");
          $(".input-cont").css("border-color", "");
          $("label").css("color", "");
        }, 3500);
        break;
      default:
        const admin_id = response;
        $.cookie("admin_id", admin_id, { expires: 1 });
        if (remember) {
          $.cookie("username", username, { expires: 1 });
          $.cookie("password", password, { expires: 1 });
          $.cookie("rememberMe", true, { expires: 1 });
        } else {
          $.removeCookie("username");
          $.removeCookie("password");
          $.removeCookie("rememberMe");
        }
        addLoginHistory(admin_id);
        window.location.href = "./?page=admin-dashboard";
        break;
    }
  });
});
$("#seePass").on("click", function () {
  const passwordInput = $("#password");
  $(this).hide();
  $("#unseePass").show();

  passwordInput.attr("type", "text");

  $("#unseePass").on("click", function () {
    $(this).hide();
    $("#seePass").show();
    passwordInput.attr("type", "password");
  });
});
$("#adminForgotForm").submit(function (e) {
  e.preventDefault();
  const formData = new FormData(this);
  changePassword(formData).then((response) => {
    if (response == "incorrect") {
      alert("Invalid Verification Code");
    } else if (response == 1) {
      alert("Account Password Changed");
      window.location.href = "./?page=admin-login";
    } else {
      alert(response);
    }
  });
});
$("#sendCode").on("click", function (e) {
  const form = $("#adminForgotForm")[0];
  const email = $("#email").val();
  $("#email").prop("readonly", true);
  $(this).prop("disabled", true);
  $("#sendIcon").hide();
  $("#loadingIcon").show();
  if (form.checkValidity()) {
    sendAuthCode(email).then((response) => {
      if (response == 0) {
        $("#email").prop("readonly", false);
        $(this).prop("disabled", false);
        $("#sendIcon").show();
        $("#loadingIcon").hide();
        $("#response").html("Email not found");
        setTimeout(() => {
          $("#response").html("");
        }, 3000);
      } else if (response == 1) {
        $(this).hide();
        $("#response").removeClass("text-danger").addClass("text-success").html(`Verification Code sent to: ${email}`);
        $("#codeCont").show();
        $("#code").prop("required", true);
        $("#pwordCont").show();
        $("#password").prop("required", true);
        $("#submitBtn").prop("disabled", false).removeClass("btn-secondary").addClass("btn-success");
      } else {
        alert("Something went wrong, please try again");
      }
    });
  } else {
    form.reportValidity();
  }
});
