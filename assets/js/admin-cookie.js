const admin_id = $.cookie("admin_id");

if (!admin_id) {
  window.location.href = "/admin-login";
}
