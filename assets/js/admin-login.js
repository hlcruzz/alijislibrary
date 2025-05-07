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
    const data = JSON.parse(response);
    console.log(data);

    if (data.status == "success") {
      window.location.href = "./?page=admin-dashboard";
    } else {
      $("#response").html(data.message);
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
