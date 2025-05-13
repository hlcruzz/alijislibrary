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
    const data = JSON.parse(response);

    if (!data.status && data.auth) {
      alert(data.message);
    } else if (!data.status && !data.auth) {
      alert(data.message);
      window.location.href = "./?page=admin-forgot-password";
    } else {
      alert(data.message);
      window.location.href = "./?page=admin-login";
    }
  });
});
$("#sendCode").on("click", function (e) {
  e.preventDefault();
  const emailInput = $("#email")[0];
  const email = emailInput.value;

  if (emailInput.checkValidity()) {
    $("#email").prop("readonly", true);
    const captchaResponse = grecaptcha.getResponse();

    if (!captchaResponse) {
      alert("Please verify you're not a robot.");
      return;
    }
    $(this).prop("disabled", true);
    $("#sendIcon").hide();
    $("#loadingIcon").show();
    sendAuthCode(email, captchaResponse).then((response) => {
      const data = JSON.parse(response);

      if (!data.status) {
        $("#email").prop("readonly", false);
        $(this).prop("disabled", false);
        $("#sendIcon").show();
        $("#loadingIcon").hide();
        $("#response").html(data.message);
        setTimeout(() => {
          $("#response").html("");
        }, 3000);
      } else {
        $("#forgotCaptcha").addClass("d-none");
        $(this).hide();
        $("#response").removeClass("text-danger").addClass("text-success").html(`Verification Code sent to: ${email}`);
        $("#codeCont").show();
        $("#code").prop("required", true);
        $("#pwordCont").show();
        $("#password").prop("required", true);
        $("#submitBtn").prop("disabled", false).removeClass("btn-secondary").addClass("btn-success");
      }
    });
  } else {
    emailInput.reportValidity(); // show browser validation
  }
});
