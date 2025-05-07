import {
  addAccount,
  checkToken,
  adminLogout,
  fetchAllAccounts,
  submitFeedback,
  fetchTotalRowsFeedbacks,
  fetchFeedbackById,
  updateIsReadFeedback,
  submitReplyFeedback,
  isFeedbackReplied,
  fetchAllNews,
  addNews,
  fetchNewsById,
  deleteNewsById,
  deleteNewsImgById,
  updateNews,
  fetchNewsByLimit,
  fetchNewsImgById,
  addDownloadble,
  fetchAllDownloadable,
  deleteDownloadable,
  fetchAllFoundation,
  fetchFoundationByName,
  updateFoundation,
  addGuidelines,
  fetchAllGuidelines,
  fetchAllGuidelinesByName,
  deleteGuidelineRuleById,
  updateGuidelines,
  addFAQ,
  fetchAllFaq,
  fetchFaqById,
  updateFaq,
  fetchAllFeedbacks,
  deleteFaq,
  addReferenceTools,
  fetchAllReferenceTools,
  fetchReferenceToolsById,
  updateReferenceTools,
  deleteReferenceTools,
  fetchReferenceToolsByType,
  addGalleryImg,
  fetchGalleryImgByLimit,
  fetchGalleryImgTotalRows,
  deleteGalleryImg,
  fetchAllArchive,
  restoreArchive,
  addOpenSourceDatabase,
  fetchAllOpenSourceDatabase,
  fetchOpenSourceDatabaseById,
  updateOpenSourceDatabase,
  deleteOpenSourceDatabase,
  addServices,
  fetchServices,
  fetchServicesById,
  updateServices,
  deleteServices,
  addEjournal,
  fetchAllJournals,
  updateEjournal,
  deleteEjournal,
  fetchJournalsByLimit,
  addSocial,
  fetchAllSocial,
  fetchSocialIcons,
  updateSocial,
  fetchAdminContacts,
  updateAdminContact,
  addPersonnel,
  fetchAllPersonnel,
  updatePersonnel,
  fetchAbout,
  updateAbout,
  addPeriodical,
  fetchAllPeriodical,
  deletePeriodical,
  deletePeriodicalImg,
  fetchAllPeriodicalByCondition,
  updatePeriodical,
  addSection,
  fetchAllSections,
  fetchSectionById,
  updateSection,
  deleteSection,
  fetchTotalObjectives,
  addObjectives,
  updateObjectives,
  objectivesDelete,
  addVisitor,
  fetchTotalRowVisitor,
  fetchTotalRowNews,
  fetchTotalRowGallery,
  fetchYearlyVisitors,
  fetchTotalVisitorByType,
  fetchAllLoginHistory,
  addLibraryHours,
  fetchAllLibraryHours,
  updateLibraryHours,
  deleteLibraryHours,
  addActivityLog,
  fetchAllActivityLogs,
  updateAccount,
  deleteAccount,
} from "./router/index-route.js";
import { checkCookie, darkTheme, lightTheme, sideMenu, setCookie } from "./utils/cookies.js";
import { setSession, checkSessionSettings } from "./utils/session.js";
import { adminNotifCont, timeAgo, showLoading, sliceText, openNavigation, openFoundationWidget } from "./assets/js/admin.js";
$(document).ready(function () {
  ClickEvents();
  FetchEvents();
  ModalEvents();
  DataTable();
  ChartJs();
});
function ClickEvents() {
  $("#contactForm").submit(function (event) {
    event.preventDefault();
    const feedbackName = $("#feedbackName").val();
    const feedbackEmail = $("#feedbackEmail").val();
    const feedbackMsg = $("#feedbackMsg").val();

    submitFeedback(feedbackName, feedbackEmail, feedbackMsg).then((response) => {
      if (response == 1) {
        alert("Feedback Submitted");
        $("#contactForm").trigger("reset");
      } else {
        alert(response);
      }
    });
  });

  $("#logout").on("click", function () {
    const confirmLogout = confirm("Are you sure you want to logout?");

    if (confirmLogout) {
      adminLogout($.cookie("admin_id"));
      $.removeCookie("admin_id");
      window.location.href = "./?page=admin-login";
    }
  });

  $("#theme-input").on("click", function () {
    const switchBtn = $(this).is(":checked");

    if (switchBtn) {
      darkTheme();
    } else {
      lightTheme();
    }
  });

  $(".openCloseMenu").each(function (index) {
    $(this).on("click", function () {
      sideMenu(index);
    });
  });

  let num = 1;
  $("#notif-icon").on("click", function () {
    num += 1;
    let result = num % 2;
    adminNotifCont(result);
  });

  let notifLimit = 10;
  $("#loadNotif").on("click", function () {
    notifLimit += 10;
    sessionStorage.setItem("notifLimit", notifLimit);

    fetchTotalRowsFeedbacks().then((response) => {
      const data = JSON.parse(response);
      const totalRows = data.totalRows;
      const notifLimit = parseInt(sessionStorage.getItem("notifLimit"));
      showLoading(totalRows, notifLimit);
      $("#totalFeedbackRows").html(totalRows);
    });
  });

  $(document).on("click", ".editNews", function () {
    const id = $(this).attr("data-id");
    $("#editNewsId").val(id);
    fetchNewsById(id).then((response) => {
      const data = JSON.parse(response);
      const subject = data[0].library_news_subject;
      const text = data[0].library_news_txt;

      $("#editNewsSubject").val(subject);
      tinymce.get("editNewsMsg").setContent(text);

      const caroulesCont = $("#editNewsImages");
      const indicatorCont = $("#editNewsIndicator");
      const carouselBtn = `<button class="carousel-control-prev" type="button" data-bs-target="#editNewsCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#editNewsCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>`;

      caroulesCont.empty();
      indicatorCont.empty();
      if (data[0].id != null) {
        data.forEach(function (element, index) {
          const images = element.library_news_img_path;
          const isActiveClass = index == 0 ? "active" : "";

          const btnIndicator = `
          <button type="button" data-bs-target="#editNewsCarousel" data-bs-slide-to="${index}" class="${isActiveClass}" aria-current="true" aria-label="Slide ${index}"></button>
          `;
          const carouselImg = `
          <div class="carousel-item ${isActiveClass} position-relative">
            <i class="deleteNewsImg fa-solid fa-trash bg-danger fs-2 position-absolute top-0 start-0 p-4 z-3" role="button" data-id="${element.id}"></i>
            <img src="${images}" class="d-block w-100" alt="...">
          </div>
          `;

          if (element.library_news_img_path !== "") {
            caroulesCont.append(carouselImg);
            indicatorCont.append(btnIndicator);
            $("#editNewsCarousel").append(carouselBtn);
          }
        });
      }
    });
  });

  $(document).on("click", ".deleteNews", function () {
    const id = $(this).attr("data-id");
    const confirmDelete = confirm("Are you sure you want to delete this library news?");

    if (confirmDelete) {
      deleteNewsById(id).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Library News");
          alert("News Deleted!");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });

  $(document).on("click", ".deleteNewsImg", function () {
    const id = $(this).attr("data-id");
    const confirmDelete = confirm("Are you sure you want to delete this image?");

    if (confirmDelete) {
      deleteNewsImgById(id).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Library News Image");
          alert("Library News Image Deleted!");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });

  $("#editNewsForm").submit(function (event) {
    event.preventDefault();
    const formData = new FormData(this);
    if ($("#editNewsMsg").val() && $("#editNewsMsg").val().trim() !== "") {
      updateNews(formData).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "UPDATE", "Updated Library News");
          alert("Library News Updated!");
          location.reload();
        } else {
          alert(response);
        }
      });
    } else {
      alert("Please Input News Message");
    }
  });

  $(document).on("click", ".deleteDownload", function () {
    const id = $(this).attr("data-id");
    const confirmDel = confirm("Are you sure you want to delete this file?");
    if (confirmDel) {
      deleteDownloadable(id).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Downloadable File");
          alert("Downloadble Deleted");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });

  $(document).on("click", ".newsImages", function () {
    const id = $(this).attr("data-id");
    fetchNewsImgById(id).then((response) => {
      const data = JSON.parse(response);
      const carouselCont = $("#news-img-carousel");
      const carouselBtn = $("#carousel-btn");

      carouselCont.empty();
      carouselBtn.empty();
      data.forEach((element, index) => {
        const imgPath = element.library_news_img_path;

        const isFirst = index == 0 ? "active" : "";
        const btn = `<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="${index}"
                        class="${isFirst}" aria-current="true" aria-label="Slide ${index}"></button>`;

        const imgCont = `<div class="carousel-item ${isFirst}" d-flex justify-content-center align-items-center h-100">
                          <img src="${imgPath}" class="d-block" style="height: 100vh; max-width: 100%; object-fit: contain;">
                        </div>
                        `;
        carouselBtn.append(btn);
        carouselCont.append(imgCont);
      });
    });
  });

  $("#searchNews").submit(function (event) {
    event.preventDefault();
    const searchVal = $("#search").val();
    sessionStorage.setItem("searchVal", searchVal);
    const searchResult = sessionStorage.getItem("searchResult");

    if (searchVal == "" || searchVal == null) {
      $("#searchResultDisplay").html("");
    } else {
      $("#searchResultDisplay").html(`Search Results for : ${searchVal}`);
    }
  });

  $("#downloadbleForm").submit(function (event) {
    event.preventDefault();
    const formData = new FormData(this);
    addDownloadble(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "CREATE", "Added Downloadble File");
        alert("File Uploaded");
        location.reload();
      } else {
        alert(response);
      }
    });
  });

  checkSessionSettings();
  $("#settings").on("click", function () {
    const result = num++ % 2;
    if (result == 1) {
      setSession("settingsNav", "open");
      $("#settingsNav").css({
        "max-height": "500px",
      });
      $("#settingsArrow").css({
        transform: "rotate(90deg)",
        transition: "transform 0.3s ease",
      });
    } else {
      sessionStorage.setItem("settingsNav", "close");
      $("#settingsNav").css({
        "max-height": "0",
      });
      $("#settingsArrow").css({
        transform: "rotate(0)",
        transition: "transform 0.3s ease",
      });
    }
  });

  openFoundationWidget();

  $("#foundationForm").submit((event) => {
    event.preventDefault();

    const foundationName = $("#foundationName").val();
    const foundationTxt = $("#foundationTxt").val();

    updateFoundation(foundationName, foundationTxt).then((response) => {
      if (response == foundationName) {
        addActivityLog($.cookie("admin_id"), "UPDATE", `Updated Foundation (${response})`);
        alert(`${response} Updated`);
        location.reload();
      } else {
        alert(response);
      }
    });
  });

  $(document).on("click", ".editGuidlineBtn", function () {
    const name = $(this).attr("data-name");
    fetchAllGuidelinesByName(name).then((response) => {
      const data = JSON.parse(response);
      $("#editGuidelinesName").append(`<option value="${data.guidelineName}" selected hidden>${data.guidelineName}</option>`);

      const rules = data.rules_txt.split("\n");
      const rules_id = data.rules_id.split(",");
      $("#rules_id").val(rules_id);
      rules.forEach((element, index) => {
        let rule_id = rules_id[index];

        $("#editInputRules").append(`
    <div class="d-flex gap-3 align-items-center rulesCont">
      <textarea name="editGuidelineRules[]" value="${element}" class="form-control" placeholder="Enter Rules" required
                rows="5">${element}</textarea>
      <button type="button" id="deleteRule" data-id="${rule_id}" data-index="${index}" class="deleteRule btn btn-danger btn-sm">
        <span class="material-symbols-outlined">delete</span>
      </button>
    </div>
  `);
      });
    });
  });

  $(document).on("click", ".deleteRule", function () {
    const id = $(this).attr("data-id");
    const indexVal = $(this).attr("data-index");
    deleteGuidelineRuleById(id).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Guideline Rule");
        $(".rulesCont").eq(indexVal)[0].style.setProperty("display", "none", "important");
      } else {
        alert(response);
      }
    });
  });

  $(document).on("click", ".editFaqBtn", function () {
    const id = $(this).attr("data-id");

    fetchFaqById(id).then((response) => {
      const data = JSON.parse(response);
      $("#editFaqId").val(data.id);
      $("#editQuestion").val(data.faq_question);
      $("#editAnswer").val(data.faq_answer);
    });
  });

  $(document).on("click", ".deleteFaqBtn", function () {
    const id = $(this).attr("data-id");
    const confirmDel = confirm("Are you sure you want to delete this FAQ?");

    if (confirmDel) {
      deleteFaq(id).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "DELETE", "Deleted FAQ");
          alert("FAQ Deleted");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });
  $(document).on("click", ".deleteOnlineRef", function () {
    const id = $(this).attr("data-id");
    const confirmDel = confirm("Are you sure you want to delete this Reference?");

    if (confirmDel) {
      deleteReferenceTools(id).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Reference Tools");
          alert("Online Reference Deleted");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });

  //USER SIDE ONLINE REFERENCE TOOLS
  const onlineRefTypes = {
    Dictionaries: "Dictionaries",
    Encyclopedias: "Encyclopedias",
    Maps: "Maps",
    GeneralReference: "General References",
  };
  fetchReferenceToolsByType(onlineRefTypes.Dictionaries).then((response) => {
    const data = JSON.parse(response);

    const container = $("#dictionariesCont");
    data.forEach((element) => {
      const content = `
      <div class="d-flex align-items-start gap-3 mt-5" style="min-height: 180px">
        <img src="${element.online_reference_path}" class="" width="100px" style="object-fit: contain" alt="" />
        <div class="d-flex flex-column justify-content-between gap-2 pe-4" style="min-height: 180px">
          <h4>${element.online_reference_name}</h4>
          <p class="m-0">${element.online_reference_desc}</p>
          <a href="${element.online_reference_link}"
            class="view-more d-flex text-decoration-none" target="_blank">View More <span
              class="material-symbols-outlined"> trending_up </span></a>
        </div>
      </div>`;

      container.append(content);
    });
  });

  fetchReferenceToolsByType(onlineRefTypes.Encyclopedias).then((response) => {
    const data = JSON.parse(response);

    const container = $("#encyclopediasCont");
    data.forEach((element) => {
      const content = `
      <div class="d-flex align-items-start gap-3 mt-5" style="min-height: 180px">
        <img src="${element.online_reference_path}" class="" width="100px" style="object-fit: contain" alt="" />
        <div class="d-flex flex-column justify-content-between gap-2 pe-4" style="min-height: 180px">
          <h4>${element.online_reference_name}</h4>
          <p class="m-0">${element.online_reference_desc}</p>
          <a href="${element.online_reference_link}"
            class="view-more d-flex text-decoration-none" target="_blank">View More <span
              class="material-symbols-outlined"> trending_up </span></a>
        </div>
      </div>`;

      container.append(content);
    });
  });

  fetchReferenceToolsByType(onlineRefTypes.Maps).then((response) => {
    const data = JSON.parse(response);

    const container = $("#mapsCont");
    data.forEach((element) => {
      const content = `
      <div class="d-flex align-items-start gap-3 mt-5" style="min-height: 180px">
        <img src="${element.online_reference_path}" class="" width="100px" style="object-fit: contain" alt="" />
        <div class="d-flex flex-column justify-content-between gap-2 pe-4" style="min-height: 180px">
          <h4>${element.online_reference_name}</h4>
          <p class="m-0">${element.online_reference_desc}</p>
          <a href="${element.online_reference_link}"
            class="view-more d-flex text-decoration-none" target="_blank">View More <span
              class="material-symbols-outlined"> trending_up </span></a>
        </div>
      </div>`;

      container.append(content);
    });
  });
  fetchReferenceToolsByType(onlineRefTypes.GeneralReference).then((response) => {
    const data = JSON.parse(response);

    const container = $("#generalRefCont");
    data.forEach((element) => {
      const content = `
      <div class="d-flex align-items-start gap-3 mt-5" style="min-height: 180px">
        <img src="${element.online_reference_path}" class="" width="100px" style="object-fit: contain" alt="" />
        <div class="d-flex flex-column justify-content-between gap-2 pe-4" style="min-height: 180px">
          <h4>${element.online_reference_name}</h4>
          <p class="m-0">${element.online_reference_desc}</p>
          <a href="${element.online_reference_link}"
            class="view-more d-flex text-decoration-none" target="_blank">View More <span
              class="material-symbols-outlined"> trending_up </span></a>
        </div>
      </div>`;

      container.append(content);
    });
  });
  $(document).on("click", "#deleteGalleryBtn", function () {
    const checkedCheckboxes = $(".checkboxImage:checked");
    const ids = [];

    checkedCheckboxes.each(function () {
      const id = $(this).attr("data-id");
      ids.push(id);
    });
    if (ids == null || ids == "") {
      alert("Please Select Images First!");
    } else {
      const confirmDelete = confirm("Are you sure you want to delete this Images?");

      if (confirmDelete) {
        deleteGalleryImg(ids).then((response) => {
          if (response == 1) {
            addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Gallery Image");
            alert("Gallery Image Deleted!");
            location.reload();
          } else {
            alert(response);
          }
        });
      }
    }
  });

  //ADMIN PREVIEW GALLERY IMAGES
  $(document).on("click", ".galleryImg", function () {
    const imgPath = $(this).attr("src");
    $("#previewGalleryImg").attr("src", imgPath);
  });

  $(document).on("click", ".restoreBtn", function () {
    const id = $(this).attr("data-id");
    const tableId = $(this).attr("data-tableId");
    const tableName = $(this).attr("data-tableName");
    const index = $(".restoreBtn").index(this);
    const trArchive = $(".tr-archive");

    const confirmDel = confirm("Restore this data?");

    if (confirmDel) {
      trArchive.eq(index).hide();
      restoreArchive(id, tableId, tableName);
      addActivityLog($.cookie("admin_id"), "RESTORE", `Restored from Archive on table (${tableName})`);
    }
  });

  $(document).on("click", ".deleteDatabaseBtn", function () {
    const id = $(this).attr("data-id");

    deleteOpenSourceDatabase(id).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Open Source Database");
        alert("Open Source Database Deleted!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });

  $(document).on("click", ".deleteServicesBtn", function () {
    const id = $(this).attr("data-id");
    const tableName = $(this).attr("data-tableName");

    const confirmDel = confirm("Are you sure you want to delete this?");

    if (confirmDel) {
      deleteServices(id, tableName).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Library Service");
          alert("Services Deleted!");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });
  $(document).on("click", ".deleteEjournalBtn", function () {
    const id = $(this).attr("data-id");

    const confirmDel = confirm("Are you sure you want to delete this?");

    if (confirmDel) {
      deleteEjournal(id).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "DELETE", "Deleted E-Journal");
          alert("E-Journal Deleted!");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });
  $("#adminContactForm").submit(function (event) {
    event.preventDefault();
    const formData = new FormData(this);
    updateAdminContact(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "UPDATE", "Updated Admin Contacts");
        alert("Admin Contacts Updated!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });
  $("#addRoleBtn").on("click", function () {
    const newRole = $("#newRole");

    if (newRole.val() == "" || newRole.val() == null) {
      newRole.css("border", "2px solid red");
      $("#alertNewRole").show();
      setTimeout(() => {
        newRole.css("border", "");
        $("#alertNewRole").hide();
      }, 2000);
    } else {
    }
  });
  $("#aboutForm").submit(function (event) {
    event.preventDefault();
    const formData = new FormData(this);
    if ($("#aboutTextarea").val() && $("#aboutTextarea").val().trim() !== "") {
      updateAbout(formData).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "UPDATE", "Updated About Us Page");
          alert("About Page Updated!");
          location.reload();
        } else {
          alert(response);
        }
      });
    } else {
      alert("Please Input About Context");
    }
  });
  $(document).on("click", ".deletePeriodicalImg", function () {
    const id = $(this).attr("data-id");
    const confirmDel = confirm("Are you sure you want to delete this?");
    if (confirmDel) {
      deletePeriodicalImg(id).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Periodicals Magazine/Journal Image");
          alert("Periodicals Magazine/Journal Image Deleted!");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });
  $(document).on("click", ".deletePeriodicalBtn", function () {
    const id = $(this).attr("data-id");

    const confirmDel = confirm("Are you sure you want to delete this?");
    if (confirmDel) {
      deletePeriodical(id).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Periodicals Magazine/Journal");
          alert("Periodicals Magazine/Journal Deleted");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });

  $("#sortForm").submit(function (event) {
    event.preventDefault();
    const sortTitle = $("#sortTitle").val();
    const sortType = $("#sortType").val();
    const sortCategory = $("#sortCategory").val();
    const sortBy = $("#sortBy").val();
    $.cookie("sortTitle", sortTitle);
    $.cookie("sortType", sortType);
    $.cookie("sortCategory", sortCategory);
    $.cookie("sortBy", sortBy);
    location.reload();
  });
  $("#sortForm").on("reset", function () {
    $.removeCookie("sortTitle");
    $.removeCookie("sortType");
    $.removeCookie("sortCategory");
    $.removeCookie("sortBy");
    location.reload();
  });
  $(document).on("click", ".deleteSection", function () {
    const id = $(this).attr("data-id");

    const confirmDel = confirm("Are you sure you want to delete this?");
    if (confirmDel) {
      deleteSection(id).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Library Section");
          alert("Library Section Deleted");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });
  $(document).on("click", ".editObjective", function () {
    const objectiveId = $(this).attr("data-objective-id");
    const objectiveIcon = $(this).attr("data-objectives-icon");
    const objectiveText = $(this).attr("data-objectives-text");

    $("#editObjectiveId").val(objectiveId);
    $("#editObjectiveIcon").val(objectiveIcon).data("original-icon", objectiveIcon);
    $("#editObjectiveText").val(objectiveText);
    $("#editSelectedIcon").html(`<span class="material-symbols-outlined">${objectiveIcon}</span>`);
  });

  $("#editObjectiveIcon").on("change", function () {
    const inputVal = $(this).val();
    const selectedIcon = $("#editSelectedIcon");
    selectedIcon.empty();

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
      "laptop_mac",
      "groups",
      "school",
      "diversity_3",
      "search",
      "database",
    ];
    if (!icons.includes(inputVal)) {
      alert("Icon doesn't exist. Please select another icon!");
      const originalIcon = $(this).data("original-icon");
      $(this).val(originalIcon);
      selectedIcon.html(`<span class="material-symbols-outlined">${originalIcon}</span>`);
    } else {
      selectedIcon.html(`<span class="material-symbols-outlined">${inputVal}</span>`);
    }
  });

  $("#editObjectiveForm").on("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(this);
    updateObjectives(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "UPDATE", "Updated Library Objectives");
        alert("Objective Updated");
        location.reload();
      } else {
        alert(response);
      }
    });
  });
  $(document).on("click", ".deleteHoursBtn", function () {
    const id = $(this).attr("data-id");

    const confirmDel = confirm("Are you sure you want to delete this?");
    if (confirmDel) {
      deleteLibraryHours(id).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Library Hours");
          alert("Library Hours Deleted");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });
  $(document).on("click", ".deleteAccount", function () {
    const id = $(this).attr("data-id");

    const confirmDel = confirm("Are you sure you want to delete this?");
    if (confirmDel) {
      deleteAccount(id).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Admin Account");
          alert("Account Deleted");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });
}
function FetchEvents() {
  fetchTotalObjectives().then(function (response) {
    const data = JSON.parse(response);
    const groupedData = {};
    data.forEach(function (item) {
      if (!groupedData[item.objectives_icon]) {
        groupedData[item.objectives_icon] = [];
      }
      groupedData[item.objectives_icon].push(item.objectives_text);
    });
    Object.keys(groupedData).forEach(function (icon) {
      const texts = groupedData[icon];
      const combinedTexts = texts.map((text) => `<p class="mt-3">${text}</p> <br>`).join("");
      const $card = $(`
        <div class="col col-12 col-lg-6 pt-5 pb-5 col-xl-4 p-3">
          <div class="card p-5 h-100">
            <span class="material-symbols-outlined">${icon}</span>
            <div>
            ${combinedTexts}
              
            </div>
          </div>
        </div>
      `);
      $("#objectives-container").append($card);
    });
  });
  checkCookie();
  checkToken($.cookie("token")).then((response) => {
    console.log(response);
  });
  fetchTotalRowsFeedbacks().then((response) => {
    const data = JSON.parse(response);
    $("#totalFeedbackRows").html(data.totalRows);
  });

  fetchNewsByLimit(5).then((response) => {
    const data = JSON.parse(response);

    const libNewsCont = $("#library-news-user");
    data.forEach((element) => {
      const subject = element.library_news_subject;
      const message = sliceText(element.library_news_txt, 200);
      const date = element.text_date;

      const content = `
      <div>
          <h1 class="fs-5">${subject}</h1>
          <p class="text-dark-emphasis" style="font-size: small;">${message}</p>
          <div class="news-date d-flex align-items-center gap-2">
              <span class="material-symbols-outlined fs-4"> arrow_right_alt </span>
              <small class="p-0 m-0">${date}</small>
          </div>
      </div>
      `;

      libNewsCont.append(content);
    });
  });

  const newsLoadingIcon = $("#newsLoading");

  if (newsLoadingIcon.length > 0) {
    const obs = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          let limitNews = parseInt(sessionStorage.getItem("limitNews"));
          limitNews += 10;
          setTimeout(() => {
            setSession("limitNews", limitNews);
          }, 1000);
        }
      });
    });

    obs.observe(newsLoadingIcon[0]);
  }

  fetchAllDownloadable().then((response) => {
    const data = JSON.parse(response);

    if (data.length > 0) {
      const downloadsCont = $("#downloadsCont");
      const downloadHead = `
      <div class="text-center">
            <h1 class="fs-2">Online Services</h1>
            <p class="fs-6">Access downloadable forms and make reservations with ease!</p>
        </div>
      `;
      const row = `<div class="row" id="row-download">

                </div>`;
      downloadsCont.append(downloadHead);
      downloadsCont.append(row);
      data.forEach((element) => {
        const child = `
          <div class="col col-12 col-md-6 col-xxl-4 p-0 p-3">
              <div class="card p-4">
                  <img src="./assets/img/download1.jpg" class="w-100 rounded-3"
                      style="height: 300px; object-fit: cover" alt="" />
                  <small class="mt-3 pb-2">${element.downloads_name}</small>
                  <a href="${element.downloads_path}" download
                      class="btn btn-success d-flex text-decoration-none gap-1"
                      style="width: max-content">Download <span class="material-symbols-outlined"> download
                      </span></a>
              </div>
          </div>
        `;
        $("#row-download").append(child);
      });
    }
  });
  fetchAllFoundation().then((response) => {
    const data = JSON.parse(response);

    //Admin Side
    $("#missionTxt").html(data[0].foundationTxt);
    $("#visionTxt").html(data[1].foundationTxt);
    $("#goalTxt").html(data[2].foundationTxt);
    $("#objectivesTxt").html(data[3].foundationTxt);

    //User Side
    const foundationCont = $("#foundationCont");
    data.forEach((element, index) => {
      let isIndex;
      switch (index) {
        case 0:
          isIndex = "bg-primary";
          break;
        case 1:
          isIndex = "bg-danger";
          break;
        case 2:
          isIndex = "bg-success";
          break;
        case 3:
          isIndex = "bg-warning";
          break;
        default:
          break;
      }
      const content = `
      <div class="foundationCont col col-12 col-sm-6 col-lg-3 p-0">
        <div class="foundation card-about card m-3 p-3 border-2" data-name="${element.foundationName}" data-bs-toggle="modal" data-bs-target="#aboutModal">
          <div class="d-flex justify-content-center py-5">
            <span class="d-flex justify-content-center align-items-center ${isIndex} rounded-2 text-light"
              style="width: 100px; height: 100px; transform: rotate(45deg);">
              <i class="fa-solid fa-flag fs-3 m-5" style="transform: rotate(-45deg);"></i>
            </span>
          </div>
          <div class="d-flex align-items-center">
            <hr class="border border-dark w-100">
            <i class="fa-solid fa-diamond text-muted opacity-50"></i>
            <hr class="border border-dark w-100">
          </div>
          <p class="text-center fs-5 text-muted mt-3">${element.foundationName}</p>
        </div>
      </div>
      `;
      foundationCont.append(content);
    });
  });

  $("#foundationName").on("change", function () {
    const foundationName = $(this).val();

    fetchFoundationByName(foundationName).then((response) => {
      const data = JSON.parse(response);
      $("#foundationTxt").val(data.foundationTxt);
    });
  });

  //ABOUT USER SIDE
  fetchAllGuidelines().then((response) => {
    const data = JSON.parse(response);
    const rulesCont = $("#rules-cont");

    data.forEach((element, index) => {
      const txtLenth = element.txt;
      const txtContent = element.txt.split("\n");

      let rules = "";
      for (let i = 0; i < txtContent.length; i++) {
        rules += `<li>${txtContent[i]}</li>`;
      }

      const content = `
      <div class="rules">
        <ul class="d-flex flex-column gap-3">
          ${rules}
        </ul>
      </div>`;

      rulesCont.append(content);
    });

    const guidlineNameCont = $("#guidlineNameCont");
    data.forEach((element, index) => {
      const isIndexFirst = index == 0 ? `style="background-color: var(--primary-color); color: white;"` : "";

      const indexVisible = index == 0 ? `style="right: 2; visibility: visible;"` : `style="right: 2; visibility: hidden;"`;
      const content = `
      <div class="d-flex align-items-center" role="button">
          <li class="guideBtn p-3 ps-4 pe-5 w-100" ${isIndexFirst}>${element.guidelineName}</li>
          <i class="fa-solid fa-play position-relative guideArrow" ${indexVisible}></i>
        </div>`;

      guidlineNameCont.append(content);
    });
  });

  fetchAllFaq().then((response) => {
    const data = JSON.parse(response);

    const faqCont = $("#faqCont");
    data.forEach((element) => {
      const content = `
      <div class="col col-12">
          <div class="p-4 rounded-4 bg-light mb-4 position-relative">
              <div class="d-flex justify-content-between align-items-center">
                  <h2 class="fs-5">${element.faq_question}
                  </h2>
                  <div>
                      <span class="closeFaq faq-icon material-symbols-outlined fs-2" style="display: none;"
                          role="button" id="close1">
                          close </span>
                      <span class="showFaq faq-icon material-symbols-outlined fs-2" role="button"> add </span>
                  </div>
              </div>
              <div class="faq-p overflow-hidden" style="max-height: 0" id="p1">
                  <p class="fst-italic">
                      ${element.faq_answer}
                  </p>
              </div>
          </div>
      </div>
      `;
      faqCont.append(content);
    });
  });

  //ADMIN SIDE

  let num = 1;
  $(document).on("click", "#editGalleryBtn", function () {
    const result = num++ % 2;

    sessionStorage.setItem("galleryEditVal", parseInt(result));
    // Toggle visibility of checkbox container

    // Check if checkbox is checked
  });
  let galleryRow = 10;
  $("#loadImg").on("click", function () {
    $("#deleteGalleryBtn").hide();
    const loadBtn = $(this);
    const galleryContainer = $("#galleryContainer");
    setTimeout(() => {
      $(window).scrollTop($(document).height());
    }, 250);
    galleryContainer.empty();
    fetchGalleryImgTotalRows().then((response) => {
      const galleryTotalRow = JSON.parse(response);
      galleryRow += 10;

      if (galleryRow >= galleryTotalRow.total_rows) {
        loadBtn.hide();
      }
      fetchGalleryImgByLimit(galleryRow).then((response) => {
        const data = JSON.parse(response);

        const galleryContainer = $("#galleryContainer");
        data.forEach((element) => {
          const content = `
          <div class="col p-0 p-2">
              <div class="position-relative rounded-3 overflow-hidden">
                  <img src="${element.gallery_path}" class="galleryImg w-100 object-fit-cover" alt=""
                      role="button" style="height: 350px" data-bs-toggle="modal" data-bs-target="#previewGalleryModal">
                  <div class="checkboxCont w-100 h-100 position-absolute top-0 start-0"
                      style="background-color: rgb(0, 0, 0, 0.5); display: none;">
                      <input type="checkbox" class="checkboxImage m-2"
                          style="width: 1.5em; height: 1.5em; accent-color: red;"
                          data-id="${element.gallery_id}">

                  </div>
              </div>
          </div>
          `;
          galleryContainer.append(content);
        });
      });
    });
  });
  fetchGalleryImgByLimit(galleryRow).then((response) => {
    const data = JSON.parse(response);

    const galleryContainer = $("#galleryContainer");
    data.forEach((element) => {
      const content = `
      <div class="col p-0 p-2">
          <div class="position-relative rounded-3 overflow-hidden">
              <img src="${element.gallery_path}" class="galleryImg w-100 object-fit-cover" alt=""
                  role="button" style="height: 350px" data-bs-toggle="modal" data-bs-target="#previewGalleryModal">
              <div class="checkboxCont w-100 h-100 position-absolute top-0 start-0"
                  style="background-color: rgb(0, 0, 0, 0.5); display: none;">
                  <input type="checkbox" class="checkboxImage m-2"
                      style="width: 1.5em; height: 1.5em; accent-color: red;"
                      data-id="${element.gallery_id}">

              </div>
          </div>
      </div>
      `;
      galleryContainer.append(content);
    });
  });

  //USER SIDE
  fetchAllOpenSourceDatabase().then((response) => {
    const data = JSON.parse(response);
    data.forEach((element) => {
      const container = $("#openSourceDbContainer");
      const content = `
      <div class="col col-12 col-md-6 col-xxl-4 p-0 p-3">
          <div class="card p-4 text-center">
              <img src="${element.opensource_databases_img}" class="w-100 rounded-3"
                  style="height: 300px; object-fit: contain" alt="" />
              <a href="${element.opensource_databases_link}" target="_blank"
                  class="text-decoration-none text-success text-center">${element.opensource_databases_link}</a>
          </div>
      </div>
      `;

      container.append(content);
    });
  });

  //USER SIDE
  const servicesTables = [
    "automated_circulation",
    "virtual_library_orientation",
    "internet_computer_aided_research",
    "information_dissemination",
    "online_subscription_databases",
    "news_current_events",
  ];
  const servicesContainers = [
    "automated-circulation",
    "virutal-library-orientation",
    "internet-computer-aided-research",
    "information-dissemination",
    "online-subscription-of-databases",
    "news-current-events",
  ];
  for (let i = 0; i < servicesTables.length; i++) {
    fetchServices(servicesTables[i]).then((response) => {
      const data = JSON.parse(response);
      const container = $(`#${servicesContainers[i]}`);
      data.forEach((element) => {
        const content = `
      <div class=" shadow-sm rounded-3 pb-3">
          <div role="button"
              class="header pt-3 ps-3 pe-3 d-flex align-items-center justify-content-between">
              <h1 class="fs-6">${element.title}</h1>
              <span class="arrow material-symbols-outlined">
                  keyboard_double_arrow_right
              </span>
          </div>
          <div class="text p-0 m-0 ps-3 pe-3">
              ${element.txt}
          </div>
      </div>
      `;
        container.append(content);
      });
    });
  }
  fetchAllJournals().then((response) => {
    const data = JSON.parse(response);
    const container = $("#eJournalContainer");
    data.forEach((element, index) => {
      const isIndexActive = index == 1 ? "active" : "";
      const content = `
      <div class="carousel-item ${isIndexActive}">
          <div class="d-flex">
              <div class="card m-2 border-0">
                      <img src="${element.eJournalImg}" class="card-img-top w-100" alt="..."
                          style="height: 400px; object-fit: contain;">
                      <div class="card-body">
                          <h5 class="card-title">${element.eJournalTitle}</h5>
                          <p class="card-text">${sliceText(element.eJournalTxt, 600)}</p>
                          <a href="${element.eJournalLink}" class="btn btn-success" target="_blank">Read More</a>
                      </div>
                  </div>
          </div>
      </div>
      `;
      container.append(content);
    });
  });
  fetchAdminContacts().then((response) => {
    const data = JSON.parse(response);
    const id = data.id;
    const contactsAddress = data.contactsAddress;
    const contactsEmail = data.contactsEmail;
    const contactsTelNum = data.contactsTelNum;
    const contactsWebsite = data.contactsWebsite;

    $("#adminContactsId").val(id);
    $("#adminContactsAddress").val(contactsAddress);
    $("#adminContactsEmail").val(contactsEmail);
    $("#adminContactsTelNum").val(contactsTelNum);
    $("#adminContactsWebsite").val(contactsWebsite);

    //USER SIDE

    //FOOTER
    $("#footerTelNum").html(`${contactsTelNum.slice(0, 3)}-${contactsTelNum.slice(3, 6)}-${contactsTelNum.slice(6)}`);
    $("#footerEmail").html(contactsEmail);
    $("#footerAddress").html(contactsAddress);
    $("#footerWebsite").html(`${contactsWebsite.slice(0, -1).slice(8)}`);

    //CONTACTS PAGE
    $("#contactsEmail").html(contactsEmail);
    $("#contactsTelNum").html(`${contactsTelNum.slice(0, 3)}-${contactsTelNum.slice(3, 6)}-${contactsTelNum.slice(6)}`);
    $("#contactsAddress").html(contactsAddress);
    $("#contactsWebsite").html(`${contactsWebsite.slice(0, -1).slice(8)}`);
  });

  //USER SIDE
  fetchAllPersonnel().then((response) => {
    const data = JSON.parse(response);
    data.forEach((element) => {
      const container = $("#personnelContainer");
      const content = `
        <div class="col p-0 p-3">
          <div class="card" style="">
            <img src="${element.personnelImg}" class="w-100" style="height: 300px; object-fit: contain" />
            <div class="card-body">
              <h5 class="card-title fs-6">${element.personnelName}</h5>
              <small class="card-text fw-medium" style="color: #13bc27;">${element.personnelRole}</small>
            </div>
          </div>
        </div>
      `;
      container.append(content);
    });
  });
  fetchAbout().then((response) => {
    const data = JSON.parse(response);
    const aboutTxt = data.aboutTxt;
    const aboutImg = data.aboutImg;

    //ADMIN SIDE
    $("#aboutImgAdmin").attr("src", aboutImg);
    $("#aboutTextarea").val(aboutTxt);

    //USER SIDE
    $("#about-img").attr("src", aboutImg);
    $("#about-txt").append(aboutTxt);
  });

  //PERIODICALS PAGE
  $("#sortTitle").val($.cookie("sortTitle"));
  $("#sortType").val($.cookie("sortType"));
  $("#sortCategory").val($.cookie("sortCategory"));
  $("#sortBy").val($.cookie("sortBy") ?? "DESC");
  const sortTitle = $.cookie("sortTitle") ?? "";
  const sortType = $.cookie("sortType") ?? "";
  const sortCategory = $.cookie("sortCategory") ?? "";
  const sortBy = $.cookie("sortBy") ?? "";
  fetchAllPeriodicalByCondition(sortTitle, sortType, sortCategory, sortBy).then((response) => {
    const data = JSON.parse(response);
    if (data.length != 0) {
      data.forEach((element, index) => {
        const periodicals_id = element.periodicals_id;
        const author = element.periodicalsAuthor;
        const category = element.periodicalsCategory;
        const desc = element.periodicalsDesc;
        const title = element.periodicalsTitle;
        const type = element.periodicalsType;

        const img_ids = element.img_id.split(",");
        const images = element.images.split("\n");

        const container = $("#periodicalCont");
        let img = "";
        let img_id = "";
        for (let i = 0; i < images.length; i++) {
          const isFirstIndex = i == 0 ? "active" : "";
          img += `
                <div class="carousel-item ${isFirstIndex}">
                    <img src="${images[i]}" class="d-block w-100 object-fit-contain"
                        alt="..." style="height: 300px">
                </div>
                `;
        }

        const content = `
      <div class="col p-0">
        <div class="card m-3">
            <div id="periodicalCarousel${index}" class="carousel slide carousel-dark card-img-top">
                <div class="carousel-inner">
                    ${img}
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#periodicalCarousel${index}"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#periodicalCarousel${index}"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <h5 class="card-title fs-3">${title}</h5>
                <div class="d-flex flex-wrap gap-2">
                    <p class="card-text"><span class="badge bg-success fw-medium">${type}</span> </p>
                    <p class="card-text"><span class="badge bg-success fw-medium">${category}</span> </p>
                </div>
                <small class="card-text">${desc}</small>
            </div>
        </div>
      </div>
      `;
        container.append(content);
      });
    } else {
      const container = $("#periodicalCont");
      container.append(`<div class="w-100 text-center alert alert-danger" role="alert">No Magazine or Journal Found</div>`);
    }
  });

  // USER SIDE
  fetchAllSections().then((response) => {
    const data = JSON.parse(response);

    data.forEach((element) => {
      const image = element.sectionsImg;
      const title = element.sectionsTitle;
      const text = element.sectionsTxt;

      const container = $("#sectionsCont");
      const content = `
        <div class="row row-cols-1 row-cols-lg-2 mt-4">
            
            <div class="col px-3 pb-2 mt-3 mt-lg-0">
                <h1 class="fs-3 text-success">${title}</h1>
                <div>
                  ${text}
                </div>
            </div>
            <div class="col" style="max-height: 500px">
                <img src="${image}" class="h-100 w-100 object-fit-cover rounded-3" alt="">
            </div>
        </div>
      `;

      container.append(content);
    });
  });

  $(document).on("click", ".editSection", function () {
    const id = $(this).attr("data-id");

    fetchSectionById(id).then((response) => {
      const data = JSON.parse(response);

      $("#editSectionId").val(id);
      $("#editSectionImgPrev").attr("src", data.sectionsImg);
      $("#editSectionTitle").val(data.sectionsTitle);
      tinymce.get("editSectionTxt").setContent(data.sectionsTxt);
    });
  });

  $("#editSectionModal").on("hide.bs.modal", function () {
    $("#editSectionForm").trigger("reset");
  });

  fetchTotalRowVisitor().then((response) => {
    const data = JSON.parse(response);

    $("#totalVisitor").html(data.totalRows);
  });
  fetchTotalRowNews().then((response) => {
    const data = JSON.parse(response);

    $("#totalNews").html(data.totalRows);
  });
  fetchTotalRowGallery().then((response) => {
    const data = JSON.parse(response);

    $("#totalGallery").html(data.totalRows);
  });

  //ADMIN SIDE
  fetchAllLibraryHours().then((response) => {
    const data = JSON.parse(response);
    data.forEach((element) => {
      const id = element.id;
      const name = element.semesterName;
      const dbStart = element.semesterDateStart;
      const dbEnd = element.semesterDateEnd;
      const start = `${element.start.slice(1, -6)} ${element.start.slice(-2)}`;
      const end = `${element.end.slice(1, -6)} ${element.end.slice(-2)}`;

      const container = $("#libraryHoursCont");
      const content = `
      <div class="d-flex justify-content-between align-items-center pb-3 border-bottom">
          <p class="fs-6 p-0 m-0 fw-medium">${name}</p>
          <div class="d-flex align-items-center gap-3">
              <p class="fs-6 p-0 m-0">${start} - ${end}</p>
              <div class="d-flex align-items-center gap-2">
                  <i class="editHoursBtn fa-solid fa-pen-to-square text-primary" role="button"
                  data-id="${id}"
                  data-name="${name}"
                  data-dateStart="${dbStart}"
                  data-dateEnd="${dbEnd}"
                  data-bs-toggle="modal"
                  data-bs-target="#editLibraryHoursModal"
                  ></i>
                  <i class="deleteHoursBtn fa-solid fa-trash text-danger" data-id="${id}" role="button"></i>
              </div>
          </div>
      </div>
      `;

      container.append(content);
    });
  });

  //USER SIDE - FOOTER libraryHoursContFoot
  fetchAllLibraryHours().then((response) => {
    const data = JSON.parse(response);
    data.forEach((element) => {
      const id = element.id;
      const name = element.semesterName;
      const dbStart = element.semesterDateStart;
      const dbEnd = element.semesterDateEnd;
      const start = `${element.start.slice(1, -6)} ${element.start.slice(-2)}`;
      const end = `${element.end.slice(1, -6)} ${element.end.slice(-2)}`;

      const container = $("#libraryHoursContFoot");
      const content = `
      <div class="d-flex flex-column text-light">
          <h2 class="fs-6">${name}</h2>
          <small class=" ms-5">${start} - ${end}</small>
      </div>
      `;

      container.append(content);
    });
  });
}
function ModalEvents() {
  $("#addAccountForm").submit(function (event) {
    event.preventDefault();
    const formData = new FormData(this);
    addAccount(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "CREATE", "Created Admin Account");
        alert("Account Added!");
        location.reload();
      } else if (response == "exists") {
        alert("Email or Username already exist");
      } else {
        alert(response);
      }
    });
  });

  $("#addAccountModal").on("hide.bs.modal", function () {
    $("#addAccountForm").trigger("reset");
    $("#accountImgPrev").attr("src", "");
  });
  $(".notif-link").each(function () {
    $(this).on("click", function () {});
  });
  $(document).on("click", ".notif-link", function () {
    const id = $(this).attr("data-id");
    updateIsReadFeedback(id);
    fetchFeedbackById(id).then((response) => {
      const data = JSON.parse(response);

      const feedbackId = data.id;
      const feedbackName = data.feedbackName;
      const feedbackEmail = data.feedbackEmail;
      const feedbackMsg = data.feedbackMsg;
      const feedbackDate = data.feedbackDate;

      $("#displayFeedbackId").val(feedbackId);
      $("#displayFeedbackName").html(feedbackName);
      $("#displayFeedbackEmail").html(feedbackEmail);
      $("#displayFeedbackMsg").html(feedbackMsg);
      $("#displayFeedbackDate").html(feedbackDate);
    });

    isFeedbackReplied(id).then((response) => {
      const data = JSON.parse(response);
      if (response != 0) {
        $("#displayAdminReply").html(data.feedbacks_reply_msg);
        $("#replyFeedback").hide();
        $("#adminReplyCont").show();
      } else {
        $("#replyFeedback").show();
        $("#adminReplyCont").hide();
      }
    });
  });
  $("#replyFeedback").on("click", function () {
    $("#feedback-btn").hide();
    $("#feedbackForm").show();

    $("#feedbackReply").on("input", function () {
      const totalLength = $(this).val().length;
      const displayLength = $("#displayLength");

      displayLength.html(`${totalLength} / 250`);
    });

    $("#cancelReply").on("click", function () {
      $("#feedback-btn").show();
      $("#feedbackForm").hide();
    });
  });

  $("#viewNotifModal").on("show.bs.modal", function () {
    $("#feedback-btn").show();
    $("#feedbackForm").hide();
    $("#feedbackForm").trigger("reset");
    const displayLength = $("#displayLength");

    displayLength.html(`0 / 250`);
  });
  $("#sendReply").on("click", function () {
    const feedbackId = $("#displayFeedbackId").val();
    const feedbackName = $("#displayFeedbackName").html();
    const feedbackEmail = $("#displayFeedbackEmail").html();
    const feedbackReply = $("#feedbackReply").val();

    $("#feedbackReply").prop("disabled", "true");
    $("#cancelReply").hide();
    $("#sendReply").hide();
    $("#submitReplyLoading").show();
    submitReplyFeedback(feedbackId, feedbackName, feedbackEmail, feedbackReply).then((response) => {
      addActivityLog($.cookie("admin_id"), "CREATE", "Sends Feedback Reply");
      if (response == 1) {
        alert("Reply Sent!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });

  $("#addNewsForm").submit(function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    if ($("#newsMsg").val() && $("#newsMsg").val().trim() !== "") {
      addNews(formData).then((response) => {
        addActivityLog($.cookie("admin_id"), "CREATE", "Added Library News");
        event.preventDefault();
        alert(response);
        location.reload();
      });
    } else {
      alert("Please Input News Message");
    }
  });

  $("#addNewsModal").on("hide.bs.modal", function () {
    $("#addNewsForm").trigger("reset");
  });

  $(document).on("click", ".foundation", function () {
    const foundationName = $(this).attr("data-name");
    fetchFoundationByName(foundationName).then((response) => {
      const data = JSON.parse(response);
      $("#modalFoundationName").html(data.foundationName);
      $("#modalFoundationTxt").html(data.foundationTxt);
    });
  });

  $("#aboutModal").on("hide.bs.modal", () => {
    $("#modalFoundationName").empty();
    $("#modalFoundationTxt").empty();
  });

  $("#guidelinesForm").submit(function (event) {
    event.preventDefault();
    const formData = new FormData(this);
    addGuidelines(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "CREATE", "Added Guidelines");
        alert("Guidelines Added!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });

  $("#addGuidelinesModal").on("hide.bs.modal", function () {
    $("#inputRules").empty();
    $("#guidelinesForm").trigger("reset");
  });

  $("#editGuidelinesModal").on("hide.bs.modal", function () {
    $("#editInputRules").empty();
  });

  $("#editGuidelinesForm").submit(function (event) {
    event.preventDefault();
    const formData = new FormData(this);
    updateGuidelines(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "UPDATE", "Updated Guidelines");
        alert("Rules Updated!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });

  $("#addFaqForm").submit(function (event) {
    event.preventDefault();

    const question = $("#question").val();
    const answer = $("#answer").val();
    addFAQ(question, answer).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "CREATE", "Added FAQ");
        alert("FAQ Added!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });
  $("#addFaqModal").on("hide.bs.modal", function () {
    $("#addFaqForm").trigger("reset");
  });

  $("#editFaqForm").submit(function (event) {
    event.preventDefault();

    const editFaqId = $("#editFaqId").val();
    const editQuestion = $("#editQuestion").val();
    const editAnswer = $("#editAnswer").val();
    updateFaq(editFaqId, editQuestion, editAnswer).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "UPDATE", "Updated FAQ");
        alert("FAQ Updated!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });
  $("#editFaqModal").on("hide.bs.modal", function () {
    $("#editFaqForm").trigger("reset");
  });

  $("#addToolForm").submit(function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    addReferenceTools(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "CREATE", "Added Reference Tools");
        alert("Online Reference Tool Added");
        location.reload();
      } else {
        alert(response);
      }
    });
  });
  $("#addToolModal").on("hide.bs.modal", () => {
    $("#addToolForm").trigger("reset");
  });

  $(document).on("click", ".editOnlineRef", function () {
    const id = $(this).attr("data-id");

    fetchReferenceToolsById(id).then((response) => {
      const data = JSON.parse(response);
      const ref_id = data.id;
      const online_reference_type = data.online_reference_type;
      const online_reference_path = data.online_reference_path;
      const online_reference_name = data.online_reference_name;
      const online_reference_link = data.online_reference_link;
      const online_reference_desc = data.online_reference_desc;

      $("#edit_online_reference_id").val(ref_id);
      $("#edit_online_reference_type").val(online_reference_type);
      $("#edit_online_reference_name").val(online_reference_name);
      $("#edit_online_reference_desc").val(online_reference_desc);
      $("#edit_online_reference_link").val(online_reference_link);

      const imageContainer = $("#editOnlineToolImgCont");
      const imageContent = `
      <img src="${online_reference_path}" alt=""
          class="w-100 object-fit-contain" style="max-height: 300px;">
      `;
      imageContainer.empty();
      imageContainer.append(imageContent);
    });
  });

  $("#editToolForm").submit(function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    updateReferenceTools(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "UPDATE", "Updated Reference Tools");
        alert("Online Reference Tool Updated");
        location.reload();
      } else {
        alert(response);
      }
    });
  });

  $("#editToolModal").on("hide.bs.modal", function () {
    $("#editToolForm").trigger("reset");
  });

  $("#addGalleryBtn").on("click", function () {
    const form = $("#addGalleryForm");
    const formData = new FormData(form[0]);
    if (form[0].checkValidity()) {
      addGalleryImg(formData).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "CREATE", "Added Gallery Image");
          alert("Gallery Image Added!");
          location.reload();
        } else {
          alert(response);
        }
      });
    } else {
      form[0].reportValidity();
    }
  });

  $("#addGalleryModal").on("hide.bs.modal", function () {
    $("#addGalleryForm").trigger("reset");
  });

  $("#addDatabaseForm").submit(function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    addOpenSourceDatabase(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "CREATE", "Added Open Source Database");
        alert("Open Source Database Added!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });
  $("#addDatabaseModal").on("hide.bs.modal", function () {
    $("#addDatabaseForm").trigger("reset");
  });

  $(document).on("click", ".editDatabaseBtn", function () {
    const id = $(this).attr("data-id");
    fetchOpenSourceDatabaseById(id).then((response) => {
      const data = JSON.parse(response);

      $("#dbId").val(id);
      $("#dbImgPreview").attr("src", data[0].opensource_databases_img);
      $("#editDbLink").val(data[0].opensource_databases_link);
    });
  });

  $("#editDatabaseForm").submit(function (event) {
    event.preventDefault();
    const formData = new FormData(this);

    updateOpenSourceDatabase(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "UPDATE", "Updated Open Source Database");
        alert("Open Source Database Updated!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });

  $("#editDatabaseModal").on("hide.bs.modal", function () {
    $("#editDatabaseForm").trigger("reset");
  });

  $("#addServicesForm").submit(function (event) {
    event.preventDefault();

    const tableName = $("#servicesTable").val();
    const servicesTitle = $("#servicesTitle").val();
    const servicesTxt = tinymce.get("servicesTxt").getContent();
    if (servicesTxt == "" || servicesTxt == null) {
      alert("Please Input Services Text!");
    } else {
      addServices(tableName, servicesTitle, servicesTxt).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "CREATE", "Added New Library Services");
          alert("New Automated Circulation Added!");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });

  $("#addServicesModal").on("hide.bs.modal", function () {
    $("#addServicesForm").trigger("reset");
  });

  $(document).on("click", ".editServices", function () {
    const id = $(this).attr("data-id");
    const tableName = $(this).attr("data-tableName");

    fetchServicesById(id, tableName).then((response) => {
      const data = JSON.parse(response);

      const servicesTables = [
        "automated_circulation",
        "virtual_library_orientation",
        "internet_computer_aided_research",
        "information_dissemination",
        "online_subscription_databases",
        "news_current_events",
      ];
      let displayTableName = "";
      switch (tableName) {
        case "automated_circulation":
          displayTableName = "Automated Circulation";
          break;
        case "virtual_library_orientation":
          displayTableName = "Virtual Library Orientation";
          break;
        case "internet_computer_aided_research":
          displayTableName = "Internet & Computer Aided Research";
          break;
        case "information_dissemination":
          displayTableName = "Information Dissemination";
          break;
        case "online_subscription_databases":
          displayTableName = "Online Subscription of Databases";
          break;
        case "news_current_events":
          displayTableName = "News & Current Events";
          break;
      }
      $("#servicesId").val(id);
      $("#editServicesTable").append(`
        <option value="${tableName}" selected>${displayTableName}</option>
        `);
      $("#editServicesTitle").val(data.title);
      tinymce.get("editServicesTxt").setContent(data.txt);
    });
  });
  $("#editServicesModal").on("hide.bs.modal", function () {
    $("#editServicesForm").trigger("reset");
  });
  $("#editServicesForm").submit(function (event) {
    event.preventDefault();
    const id = $("#servicesId").val();
    const table = $("#editServicesTable").val();
    const title = $("#editServicesTitle").val();
    const txt = tinymce.get("editServicesTxt").getContent();
    if (txt && txt.trim() !== "") {
      updateServices(id, table, title, txt).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "UPDATE", "Updated Library Services");
          alert("Services Updated!");
          location.reload();
        } else {
          alert(response);
        }
      });
    } else {
      alert("Please Input Context!");
    }
  });

  $("#addEjournalForm").submit(function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    addEjournal(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "CREATE", "Added New E-Journal");
        alert("E-Journal Added!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });

  $(document).on("click", ".editEjournalBtn", function () {
    const id = $(this).attr("data-id");
    const image = $(this).attr("data-image");
    const title = $(this).attr("data-title");
    const link = $(this).attr("data-link");
    const txt = $(this).attr("data-txt");
    $("#editJournalId").val(id);
    $("#editJournalImgPreview").attr("src", image);
    $("#editJournalTitle").val(title);
    $("#editJournalLink").val(link);
    $("#editJournalTxt").val(txt);
  });

  $("#editEjournalModal").on("hide.bs.modal", function () {
    $("#editEjournalForm").trigger("reset");
  });

  $("#editEjournalForm").submit(function (event) {
    event.preventDefault();
    const formData = new FormData(this);
    updateEjournal(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "UPDATE", "Updated E-Journal");
        alert("E-Journal Updated!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });

  $("#addSocialsForm").submit(function (event) {
    event.preventDefault();
    const socialIcon = $("#socialIcon").val();
    const socialLink = $("#socialLink").val();
    addSocial(socialIcon, socialLink).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Social Media");
        alert("Social Media Added!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });
  $("#addSocialsModal").on("hide.bs.modal", function () {
    $("#addSocialsForm").trigger("reset");
  });
  fetchSocialIcons().then((response) => {
    const data = JSON.parse(response);
    const iconMap = {
      "fab fa-facebook": "Facebook",
      "fab fa-instagram": "Instagram",
      "fab fa-x-twitter": "Twitter",
      "fab fa-youtube": "Youtube",
      "fab fa-linkedin": "LinkedIn",
    };

    const allIcons = Object.keys(iconMap);
    const dbIcons = data?.[0]?.dbIcons?.split(",") || [];

    const availableIcons = dbIcons.length === 0 ? allIcons : allIcons.filter((icon) => !dbIcons.includes(icon));

    availableIcons.forEach((icon) => {
      const iconName = iconMap[icon];
      $("#socialIcon").append(`<option value="${icon}">${iconName}</option>`);
    });
  });
  $(document).on("click", ".editSocialBtn", function () {
    const id = $(this).attr("data-id");
    const editIcon = $(this).attr("data-icon");
    const link = $(this).attr("data-link");
    let iconName = "";
    switch (editIcon) {
      case "fab fa-facebook":
        iconName = "Facebook";
        break;
      case "fab fa-instagram":
        iconName = "Instagram";
        break;
      case "fab fa-x-twitter":
        iconName = "Twitter";
        break;
      case "fab fa-youtube":
        iconName = "Youtube";
        break;
      case "fab fa-linkedin":
        iconName = "LinkedIn";
        break;
    }

    const iconMap = {
      "fab fa-facebook": "Facebook",
      "fab fa-instagram": "Instagram",
      "fab fa-x-twitter": "Twitter",
      "fab fa-youtube": "Youtube",
      "fab fa-linkedin": "LinkedIn",
    };

    const allIcons = Object.keys(iconMap);
    const availableIcons = allIcons.filter((icon) => !editIcon.includes(icon));
    $("#editSocialIcon").empty();
    $("#editSocialIcon").append(`
      <option value="${editIcon}" selected>${iconName}</option>`);
    availableIcons.forEach((icon) => {
      const iconName = iconMap[icon];
      $("#editSocialIcon").append(`<option value="${icon}" >${iconName}</option>`);
    });

    $("#editSocialLink").val(link);
    $("#editSocialId").val(id);
    $("#editDisplayIcon").empty();
    $("#editDisplayIcon").append(`<i class='${editIcon}'></i>`);
  });
  $("#editSocialModal").on("hide.bs.modal", function () {
    $("#editSocialsForm").trigger("reset");
  });

  $("#editSocialsForm").submit(function (event) {
    event.preventDefault();
    const id = $("#editSocialId").val();
    const icon = $("#editSocialIcon").val();
    const link = $("#editSocialLink").val();
    updateSocial(id, icon, link).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "UPDATE", "Updated Social Media");
        alert("Social Media Updated!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });

  $("#addPersonnelForm").submit(function (event) {
    event.preventDefault();
    const formData = new FormData(this);
    addPersonnel(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "CREATE", "Added New Library Personnel");
        alert("Personnel Added!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });
  $("#addPersonnelModal").on("hide.bs.modal", function () {
    $("#addPersonnelForm").trigger("reset");
  });

  $(document).on("click", ".editPersonnelBtn", function () {
    const id = $(this).attr("data-id");
    const name = $(this).attr("data-name");
    const role = $(this).attr("data-role");
    const image = $(this).attr("data-img");

    $("#editPersonnelId").val(id);
    $("#editPersonnelName").val(name);
    $("#editPersonnelRole").val(role);
    $("#editPersonnelImgPreview").attr("src", image);

    $("#updatePersonnelForm").submit(function (event) {
      event.preventDefault();

      const formData = new FormData(this);
      updatePersonnel(formData).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "UPDATE", "Updated Personnel");
          alert("Personnel Updated!");
          location.reload();
        } else {
          alert(response);
        }
      });
    });
  });

  $("#addPeriodicalForm").submit(function (event) {
    event.preventDefault();
    const formData = new FormData(this);
    addPeriodical(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "CREATE", "Added New Arrival: Periodicals");
        alert("New Arrival Added!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });
  $("#addPeriodicalModal").on("hide.bs.modal", function () {
    $("#addPeriodicalForm").trigger("reset");
  });

  //FETCH TO EDIT FORM PERIODICAL
  $(document).on("click", ".editPeriodical", function () {
    const pk_id = $(this).attr("data-pk-id");
    const image_ids = $(this).attr("data-img-id");
    const images = $(this).attr("data-img");
    const author = $(this).attr("data-author");
    const category = $(this).attr("data-category");
    const desc = $(this).attr("data-desc");
    const title = $(this).attr("data-title");
    const type = $(this).attr("data-type");
    $("#periodical_pk_id").val(pk_id);
    $("#editTitle").val(title);
    if (type == "journal") {
      $("#editJournal").attr("checked", true);
    } else {
      $("#editMagazine").attr("checked", true);
    }
    $("#editCategory").val(category);
    $("#editAuthor").val(author);
    $("#editDesc").val(desc);

    const caroulesCont = $("#periodicalsImages");
    const indicatorCont = $("#periodicalsIndicator");
    const carouselBtn = `<button class="carousel-control-prev" type="button" data-bs-target="#periodicalCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#periodicalCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>`;

    caroulesCont.empty();
    indicatorCont.empty();
    images.split("\n").forEach((element, index) => {
      const isActiveClass = index == 0 ? "active" : "";

      const btnIndicator = `
            <button type="button" data-bs-target="#periodicalCarousel" data-bs-slide-to="${index}" class="${isActiveClass} periodicalImgIndicator" aria-current="true" aria-label="Slide ${index}"></button>
            `;
      const carouselImg = `
            <div class="carousel-item ${isActiveClass} position-relative periodicalImg">
              <i class="deletePeriodicalImg fa-solid fa-trash bg-danger text-light fs-2 position-absolute top-0 start-0 p-4 z-3" role="button" data-id="${image_ids.split(",")[index]}" ></i>
              <img src="${element}" class="d-block w-100 object-fit-contain" alt="..." style="max-height: 500px;">
            </div>
            `;

      caroulesCont.append(carouselImg);
      indicatorCont.append(btnIndicator);
      $("#periodicalCarousel").append(carouselBtn);
    });
  });
  //UPDATE PERIODICALS
  $("#editPeriodicalForm").submit(function (event) {
    event.preventDefault();
    const formData = new FormData(this);
    updatePeriodical(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "UPDATE", "Updated Periodicals Magazine/Journal");
        alert("Periodicals Magazine/Journal Updated!");
        location.reload();
      } else {
        alert(response);
      }
    });
  });
  $("#editPeriodicalModal").on("hide.bs.modal", function () {
    $("#editPeriodicalForm").trigger("reset");
    $("#periodicalsImages").empty();
    $("#periodicalsIndicator").empty();
  });

  $("#addSectionForm").submit(function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    if ($("#sectionTxt").val() == "") {
      alert("Please Input Section Text");
    } else {
      addSection(formData).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "CREATE", "Added New Library Section");
          alert("Section Added!");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });

  $("#addSectionModal").on("hide.bs.modal", function () {
    $("#addSectionForm").trigger("reset");
  });

  $("#editSectionForm").submit(function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    if ($("#editSectionTxt").val() && $("#editSectionTxt").val().trim() !== "") {
      updateSection(formData).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "UPDATE", "Updated Library Section");
          alert("Section Updated!");
          location.reload();
        } else {
          alert(response);
        }
      });
    } else {
      alert("Pleast Input Context");
    }
  });

  $(document).ready(function () {
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
      "laptop_mac",
      "groups",
      "school",
      "diversity_3",
      "search",
      "database",
    ];

    // Populate datalist once
    icons.forEach((icon) => {
      $("#iconList").append(`<option value="${icon}"></option>`);
    });

    // Icon input validation
    $("#objectiveIcon").on("input", function () {
      const iconInput = $(this).val().trim();
      const $feedback = $("#addIconFeedback");
      const $input = $(this);

      if (iconInput === "") {
        $input.removeClass("is-invalid");
        $feedback.hide();
        return;
      }

      const matches = icons.filter((icon) => icon.startsWith(iconInput));

      if (iconInput.length === 1 || matches.length === 0) {
        $input.addClass("is-invalid");
        $feedback.text("Please enter a valid icon name. It must be at least 2 characters and match the icon list.").show();
      } else {
        $input.removeClass("is-invalid");
        $feedback.hide();
      }
    });

    // Form submission
    $("#addObjectivesForm").on("submit", function (e) {
      e.preventDefault();

      const icon = $("#objectiveIcon").val().trim();
      const text = $("#objectiveText").val().trim();
      const $iconInput = $("#objectiveIcon");
      const $feedback = $("#addIconFeedback");

      if (icon === "" || icon.length < 2 || !icons.includes(icon)) {
        $iconInput.addClass("is-invalid");
        $feedback.text("Please select a valid icon from the list. It must be a full name, not a single letter.").show();
        return;
      }

      $iconInput.removeClass("is-invalid");
      $feedback.hide();

      addObjectives(icon, text).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "CREATE", "Added New Library Objectives");
          alert("Library Objectives Added");
          location.reload();
        } else {
          alert(response);
        }
      });
    });
  });

  $("#editToolModal").on("hide.bs.modal", function () {
    $("#editToolForm").trigger("reset");
  });

  $("#addObjectivesModal").on("hide.bs.modal", function () {
    $("#addObjectivesForm").trigger("reset");
    $("#iconPreview").hide();
  });

  $("#editObjectiveModal").on("hide.bs.modal", function () {
    $("#editSelectedIcon").empty();
  });

  $("#addVisitorForm").submit(function (event) {
    event.preventDefault();

    const visitorTypeValue = $("input[name='visitorType']:checked").val();
    addVisitor(visitorTypeValue).then((response) => {
      if (response == 1) {
        $("#addVisitorModal").modal("hide");
        $.cookie("visitor", true, { expires: 7 });
      }
    });
  });

  $("#addLibraryHoursForm").submit(function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    addLibraryHours(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "CREATE", "Added New Library Hours");
        alert("Library Hours Added");
        location.reload();
      } else {
        alert(response);
      }
    });
  });

  $("#addLibraryHoursModal").on("hide.bs.modal", function () {
    $("#addLibraryHoursForm").trigger("reset");
  });
  $(document).on("click", ".editHoursBtn", function () {
    const id = $(this).attr("data-id");
    const name = $(this).attr("data-name");
    const dateStart = $(this).attr("data-dateStart");
    const dateEnd = $(this).attr("data-dateEnd");

    $("#editSemesterId").val(id);
    $("#editSemesterName").val(name);
    $("#editSemesterDateStart").val(dateStart);
    $("#editSemesterDateEnd").val(dateEnd);
  });

  $("#editLibraryHoursForm").submit(function (event) {
    event.preventDefault();
    const formData = new FormData(this);

    updateLibraryHours(formData).then((response) => {
      if (response == 1) {
        addActivityLog($.cookie("admin_id"), "UPDATE", "Updated Library Hours");
        alert("Library Hours Updated");
        location.reload();
      } else {
        alert(response);
      }
    });
  });

  $("#editLibraryHoursModal").on("hide.bs.modal", function () {
    $("#editLibraryHoursForm").trigger("reset");
  });
  $(document).on("click", ".editAccount", function () {
    const id = $(this).attr("data-id");
    const img = $(this).attr("data-img") == "null" ? "./assets/img/default.jpg" : $(this).attr("data-img");
    const email = $(this).attr("data-email");
    const username = $(this).attr("data-username");

    $("#editAccountId").val(id);
    $("#editAccountImgPrev").attr("src", img);
    $("#editAccountEmail").val(email);
    $("#editAccountUsername").val(username);
  });
  $("#editAccountForm").submit(function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    const confirmUpdate = confirm("You can only update an account once every 7 days.\nAre you sure you want to proceed with the update?");
    if (confirmUpdate) {
      updateAccount(formData).then((response) => {
        if (response == 1) {
          addActivityLog($.cookie("admin_id"), "UPDATE", "Updated Admin Account");
          alert("Admin Account Updated");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });
  $("#editAccountModal").on("hide.bs.modal", function () {
    $("#editAccountForm").trigger("reset");
    $("#editAccountImgPrev").attr("src", "");
  });
}

function DataTable() {
  fetchAllAccounts().then((response) => {
    const data = JSON.parse(response);
    $("#table_accounts").DataTable({
      data: data,
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "accountImg",
          title: "Image",
          render: function (data, type, row) {
            return data === "" || data === null
              ? `<div>
                        <img src="./assets/img/default.jpg" width="40px" height="40px"
                            class="object-fit-cover" alt="">
                    </div>`
              : `
                    <div>
                        <img src="${data}" width="40px" height="40px"
                            class="object-fit-cover" alt="">
                    </div>
                  `;
          },
        },
        {
          data: "accountEmail",
          title: "Email",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "accountUsername",
          title: "Username",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "accountPassword",
          title: "Password",
          render: function (data, type, row) {
            return `************`;
          },
        },
        {
          data: "accountLogin",
          title: "Status",
          render: function (data, type, row) {
            return data == 0 ? `<span class="badge bg-danger">Offline</span>` : `<span class="badge bg-success">Online</span>`;
          },
        },
        {
          data: "accountDateAdded",
          title: "Date Added",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "accountDateUpdated",
          title: "Date Updated",
          render: function (data, type, row) {
            return data == null ? "" : `${timeAgo(data)} ago`;
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            const givenDate = new Date(row.accountDateUpdated);
            const currentDate = new Date();

            const diffInMs = currentDate - givenDate;
            const diffInDays = diffInMs / (1000 * 60 * 60 * 24);

            const isEditable = diffInDays > 7;
            const btnColor = isEditable ? "btn-success" : "btn-secondary";
            const titleText = isEditable ? "Click to edit account" : "Account can only be updated once every 7 days";

            return `
              <div title="${titleText}" style="display: inline-block;">
                <button class="editAccount btn ${btnColor}"
                  ${isEditable ? 'data-bs-toggle="modal" data-bs-target="#editAccountModal"' : "disabled"}
                  data-id="${row.id}"
                  data-img="${row.accountImg}"
                  data-email="${row.accountEmail}"
                  data-username="${row.accountUsername}">
                  <i class="fa-solid fa-pen"></i>
                </button>
              </div>
              <button class="deleteAccount btn btn-danger" data-id="${row.id}">
                <i class="fa-solid fa-trash"></i>
              </button>
            `;
          },
        },
      ],
      // rowCallback: function (row, data, index) {
      //   $.cookie("admin_id") == data.id ? $(row).addClass("table-success") : "";
      // },
    });
  });
  fetchAllNews().then((response) => {
    const data = JSON.parse(response);
    $("#table_news").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "news_id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "library_news_img_path",
          title: "Img",
          render: function (data, type, row) {
            const result =
              data == null || data == ""
                ? ""
                : `<div>
                  <img src="${data}" width="40px" height="40px"
                      class="object-fit-cover" alt="">
              </div>`;
            return result;
          },
        },
        {
          data: "library_news_subject",
          title: "Subject",
          render: function (data, type, row) {
            return sliceText(data, 30);
          },
        },
        {
          data: "library_news_txt",
          title: "Messsage",
          render: function (data, type, row) {
            return sliceText(data, 30);
          },
        },
        {
          data: "text_date",
          title: "Date",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <div>
                <button class="editNews btn btn-success" data-id="${row.news_id}" data-bs-toggle="modal" data-bs-target="#editNewsModal"><i class="fa-solid fa-pen"></i></button>
                <button class="deleteNews btn btn-danger" data-id="${row.news_id}"><i class="fa-solid fa-trash"></i></button>
            </div>`;
          },
        },
      ],
    });
  });

  fetchAllDownloadable().then((response) => {
    const data = JSON.parse(response);
    $("#table_dwonloads").DataTable({
      data: data,
      order: [[0, "desc"]],
      destroy: true,
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "downloads_name",
          title: "Filename",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "downloads_type",
          title: "Type",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "text_date",
          title: "Date",
          render: function (data, type, row) {
            return data;
          },
        },

        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="deleteDownload btn btn-danger" data-id="${row.id}"><i class="fa-solid fa-trash"></i></button>`;
          },
        },
      ],
    });
  });

  fetchAllFeedbacks().then((response) => {
    const data = JSON.parse(response);
    $("#feedbacksTable").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },

        {
          data: null,
          title: "Name",
          render: function (data, type, row) {
            const isReadText = row.feedbackIsRead == 0 ? "" : "text-muted";

            return `
              <span class='mb-2 p-0 m-0 ${isReadText}'>${row.feedbackName}</span><br>
              <small class='${isReadText} p-0 m-0'>${row.feedbackEmail}</small>
            `;
          },
        },

        {
          data: "feedbackMsg",
          title: "Message",
          render: function (data, type, row) {
            const isReadText = row.feedbackIsRead == 0 ? "" : "text-muted";
            return `<span class="${isReadText}">${sliceText(data, 30)}</span>`;
          },
        },

        {
          data: "feedbackDate",
          title: "Date",
          render: function (data, type, row) {
            const isReadText = row.feedbackIsRead == 0 ? "" : "text-muted";
            return `<span class="${isReadText}">${data}</span>`;
          },
        },

        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
                <span class="notif-link material-symbols-outlined bg-primary p-2 rounded-2 text-light" data-bs-toggle="modal" data-bs-target="#viewNotifModal" data-id="${row.id}" role="button">chat_bubble</span>
                `;
          },
        },
      ],
      rowCallback: function (row, data, index) {
        $(row).addClass("position-relative");
      },
    });
  });
  fetchAllGuidelines().then((response) => {
    const data = JSON.parse(response);
    $("#table_guidelines").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "guideline_id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "guidelineName",
          title: "Name",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "txt",
          title: "Rules",
          render: function (data, type, row) {
            return sliceText(data, 50);
          },
        },
        {
          data: "text_date",
          title: "Date",
          render: function (data, type, row) {
            return data;
          },
        },

        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="editGuidlineBtn btn btn-success" data-bs-toggle="modal" data-bs-target="#editGuidelinesModal" data-name="${row.guidelineName}" title="${row.guidelineName}"><i class="fa-solid fa-pen"></i></button>`;
          },
        },
      ],
    });
  });
  fetchAllFaq().then((response) => {
    const data = JSON.parse(response);
    $("#table_faq").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],

      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "faq_question",
          title: "Question",
          render: function (data, type, row) {
            return sliceText(data, 30);
          },
        },
        {
          data: "faq_answer",
          title: "Answer",
          render: function (data, type, row) {
            return sliceText(data, 50);
          },
        },
        {
          data: "text_date",
          title: "Date",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="editFaqBtn btn btn-success" data-bs-toggle="modal" data-bs-target="#editFaqModal" data-id="${row.id}"><i class="fa-solid fa-pen"></i></button>
              <button class="deleteFaqBtn btn btn-danger" data-id="${row.id}"><i class="fa-solid fa-trash"></i></button>
              `;
          },
        },
      ],
    });
  });
  fetchAllReferenceTools().then((response) => {
    const data = JSON.parse(response);
    $("#online_tools_table").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],

      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "online_reference_path",
          title: "Img",
          render: function (data, type, row) {
            return `
            <div>
                  <img src="${data}" width="40px" height="40px"
                      class="object-fit-cover" alt="">
              </div>
            `;
          },
        },
        {
          data: "online_reference_name",
          title: "Name",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "online_reference_desc",
          title: "Description",
          render: function (data, type, row) {
            return sliceText(data, 50);
          },
        },
        {
          data: "online_reference_type",
          title: "Type",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "text_date",
          title: "Date",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="editOnlineRef btn btn-success" data-bs-toggle="modal" data-bs-target="#editToolModal" data-id="${row.id}"><i class="fa-solid fa-pen"></i></button>
              <button class="deleteOnlineRef btn btn-danger" data-id="${row.id}"><i class="fa-solid fa-trash"></i></button>
              `;
          },
        },
      ],
    });
  });
  fetchAllArchive().then((response) => {
    const data = JSON.parse(response);
    $("#archive_table").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
        {
          targets: 1,
          width: "10px",
          className: "text-center",
        },
      ],

      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "fk_id",
          title: "ID",
          render: function (data, type, row) {
            return `
            <span class='badge bg-success'>${data}</span>
            `;
          },
        },
        {
          data: "pageName",
          title: "Page Name",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "text_date",
          title: "Date",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="restoreBtn btn btn-primary" data-id="${row.id}" data-tableId="${row.fk_id}" data-tableName="${row.tableName}"><i class="fa-solid fa-arrows-rotate"></i></button>
              `;
          },
        },
      ],
      rowCallback: function (row, data, index) {
        $(row).addClass("tr-archive");
      },
    });
  });
  fetchAllOpenSourceDatabase().then((response) => {
    const data = JSON.parse(response);
    $("#table_databases").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],

      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "opensource_databases_img",
          title: "ID",
          render: function (data, type, row) {
            return `
            <div>
                  <img src="${data}" width="40px" height="40px"
                      class="object-fit-cover" alt="">
              </div>
            `;
          },
        },
        {
          data: "opensource_databases_link",
          title: "Link",
          render: function (data, type, row) {
            return sliceText(data, 40);
          },
        },
        {
          data: "text_date",
          title: "Date",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="editDatabaseBtn btn btn-success" data-bs-toggle="modal" data-bs-target="#editDatabaseModal" data-id="${row.id}" ><i class="fa-solid fa-pen"></i></button>
              <button class="deleteDatabaseBtn btn btn-danger" data-id="${row.id}" ><i class="fa-solid fa-trash"></i></button>
              `;
          },
        },
      ],
    });
  });

  const servicesTables = [
    "automated_circulation",
    "virtual_library_orientation",
    "internet_computer_aided_research",
    "information_dissemination",
    "online_subscription_databases",
    "news_current_events",
  ];
  fetchServices(servicesTables[0]).then((response) => {
    const data = JSON.parse(response);
    $("#table_automated_circulation").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "title",
          title: "Title",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "txt",
          title: "Text",
          render: function (data, type, row) {
            var doc = new DOMParser().parseFromString(data, "text/html");
            return sliceText(doc.body.textContent || "", 50);
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="editServices btn btn-success" data-bs-toggle="modal" data-bs-target="#editServicesModal" data-id="${row.id}" data-tableName="${servicesTables[0]}"><i class="fa-solid fa-pen"></i></button>
              <button class="deleteServicesBtn btn btn-danger" data-id="${row.id}" data-tableName="${servicesTables[0]}"><i class="fa-solid fa-trash"></i></button>
              `;
          },
        },
      ],
    });
  });
  fetchServices(servicesTables[1]).then((response) => {
    const data = JSON.parse(response);

    $("#table_virtual_library_orientation").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "title",
          title: "Title",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "txt",
          title: "Text",
          render: function (data, type, row) {
            var doc = new DOMParser().parseFromString(data, "text/html");
            return sliceText(doc.body.textContent || "", 50);
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="editServices btn btn-success" data-bs-toggle="modal" data-bs-target="#editServicesModal" data-id="${row.id}" data-tableName="${servicesTables[1]}"><i class="fa-solid fa-pen"></i></button>
              <button class="deleteServicesBtn btn btn-danger" data-id="${row.id}" data-tableName="${servicesTables[1]}"><i class="fa-solid fa-trash"></i></button>
              `;
          },
        },
      ],
    });
  });
  fetchServices(servicesTables[2]).then((response) => {
    const data = JSON.parse(response);

    $("#table_internet_computer_aided_research").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "title",
          title: "Title",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "txt",
          title: "Text",
          render: function (data, type, row) {
            var doc = new DOMParser().parseFromString(data, "text/html");
            return sliceText(doc.body.textContent || "", 50);
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="editServices btn btn-success" data-bs-toggle="modal" data-bs-target="#editServicesModal" data-id="${row.id}" data-tableName="${servicesTables[2]}"><i class="fa-solid fa-pen"></i></button>
              <button class="deleteServicesBtn btn btn-danger" data-id="${row.id}" data-tableName="${servicesTables[2]}"><i class="fa-solid fa-trash"></i></button>
              `;
          },
        },
      ],
    });
  });
  fetchServices(servicesTables[3]).then((response) => {
    const data = JSON.parse(response);

    $("#table_information_dissemination").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "title",
          title: "Title",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "txt",
          title: "Text",
          render: function (data, type, row) {
            var doc = new DOMParser().parseFromString(data, "text/html");
            return sliceText(doc.body.textContent || "", 50);
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="editServices btn btn-success" data-bs-toggle="modal" data-bs-target="#editServicesModal" data-id="${row.id}" data-tableName="${servicesTables[3]}"><i class="fa-solid fa-pen"></i></button>
              <button class="deleteServicesBtn btn btn-danger" data-id="${row.id}" data-tableName="${servicesTables[3]}" ><i class="fa-solid fa-trash"></i></button>
              `;
          },
        },
      ],
    });
  });
  fetchServices(servicesTables[4]).then((response) => {
    const data = JSON.parse(response);

    $("#table_online_subscription_databases").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "title",
          title: "Title",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "txt",
          title: "Text",
          render: function (data, type, row) {
            var doc = new DOMParser().parseFromString(data, "text/html");
            return sliceText(doc.body.textContent || "", 50);
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="editServices btn btn-success" data-bs-toggle="modal" data-bs-target="#editServicesModal" data-id="${row.id}" data-tableName="${servicesTables[4]}"><i class="fa-solid fa-pen"></i></button>
              <button class="deleteServicesBtn btn btn-danger" data-id="${row.id}" data-tableName="${servicesTables[4]}"><i class="fa-solid fa-trash"></i></button>
              `;
          },
        },
      ],
    });
  });
  fetchServices(servicesTables[5]).then((response) => {
    const data = JSON.parse(response);

    $("#table_news_current_events").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "title",
          title: "Title",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "txt",
          title: "Text",
          render: function (data, type, row) {
            var doc = new DOMParser().parseFromString(data, "text/html");
            return sliceText(doc.body.textContent || "", 50);
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="editServices btn btn-success" data-bs-toggle="modal" data-bs-target="#editServicesModal" data-id="${row.id}" data-tableName="${servicesTables[5]}"><i class="fa-solid fa-pen"></i></button>
              <button class="deleteServicesBtn btn btn-danger" data-id="${row.id}" data-tableName="${servicesTables[5]}"><i class="fa-solid fa-trash"></i></button>
              `;
          },
        },
      ],
    });
  });
  fetchAllJournals().then((response) => {
    const data = JSON.parse(response);
    $("#table_e_journal").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "eJournalImg",
          title: "Img",
          render: function (data, type, row) {
            return `
            <div>
                  <img src="${data}" width="40px" height="40px"
                      class="object-fit-cover" alt="">
              </div>
            `;
          },
        },
        {
          data: "eJournalTitle",
          title: "Name",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "eJournalTxt",
          title: "Name",
          render: function (data, type, row) {
            return sliceText(data, 50);
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="editEjournalBtn btn btn-success" data-bs-toggle="modal" data-bs-target="#editEjournalModal" data-id="${row.id}" data-image="${row.eJournalImg}" data-title="${row.eJournalTitle}" data-txt="${row.eJournalTxt}" data-link="${row.eJournalLink}"><i class="fa-solid fa-pen"></i></button>
              <button class="deleteEjournalBtn btn btn-danger" data-id="${row.id}"><i class="fa-solid fa-trash"></i></button>
              `;
          },
        },
      ],
    });
  });

  fetchAllSocial().then((response) => {
    const data = JSON.parse(response);
    $("#table_socials").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "socialsIcon",
          title: "Icon",
          render: function (data, type, row) {
            return `
            <i class="${data}"></i>
            `;
          },
        },
        {
          data: "socialsLink",
          title: "Link",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="editSocialBtn btn btn-success" data-bs-toggle="modal" data-bs-target="#editSocialModal" data-id="${row.id}" data-icon="${row.socialsIcon}" data-link="${row.socialsLink}"><i class="fa-solid fa-pen"></i></button>
              <button class="deleteEjournalBtn btn btn-danger" data-id="${row.id}"><i class="fa-solid fa-trash"></i></button>
              `;
          },
        },
      ],
    });
  });
  fetchAllPersonnel().then((response) => {
    const data = JSON.parse(response);
    $("#personnel_table").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "personnelImg",
          title: "Picture",
          render: function (data, type, row) {
            return `
              <div>
                  <img src="${data}" width="40px" height="40px"
                      class="object-fit-cover" alt="">
              </div>
            `;
          },
        },
        {
          data: "personnelRole",
          title: "Role",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "personnelName",
          title: "Name",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "personnelDateAdded",
          title: "Date Added",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "personnelDateUpdated",
          title: "Date Updated",
          render: function (data, type, row) {
            return data ?? "";
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
              <button class="editPersonnelBtn btn btn-success" data-bs-toggle="modal" data-bs-target="#editPersonnelModal" data-id="${row.id}" data-img="${row.personnelImg}" data-role="${row.personnelRole}" data-name="${row.personnelName}" ><i class="fa-solid fa-pen"></i></button>
              <button class="deletePersonnelBtn btn btn-danger" data-id="${row.id}"><i class="fa-solid fa-trash"></i></button>
              `;
          },
        },
      ],
    });
  });

  fetchAllPeriodical().then((response) => {
    const data = JSON.parse(response);
    $("#table_periodicals").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "pk_id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "images",
          title: "Image",
          render: function (data, type, row) {
            return `
                <div>
                    <img src="${data.split("\n")[0]}" width="40px" height="40px"
                        class="object-fit-cover" alt="">
                </div>
              `;
          },
        },
        {
          data: "periodicalsAuthor",
          title: "Author",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "periodicalsTitle",
          title: "Title",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "periodicalsType",
          title: "Type",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "periodicalsCategory",
          title: "Category",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "periodicalsDesc",
          title: "Description",
          render: function (data, type, row) {
            return sliceText(data, 20);
          },
        },
        {
          data: "periodicalsDate",
          title: "Description",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
                <button class="editPeriodical btn btn-success" data-bs-toggle="modal" data-bs-target="#editPeriodicalModal" data-pk-id="${row.pk_id}"
                data-img-id="${row.images_id}"
                data-img="${row.images}" 
                data-author="${row.periodicalsAuthor}"
                data-category="${row.periodicalsCategory}"
                data-desc="${row.periodicalsDesc}" 
                data-title="${row.periodicalsTitle}" 
                data-type="${row.periodicalsType}" 
                ><i class="fa-solid fa-pen"></i></button>
                <button class="deletePeriodicalBtn btn btn-danger" data-id="${row.pk_id}"><i class="fa-solid fa-trash"></i></button>
                `;
          },
        },
      ],
    });
  });
  fetchAllSections().then((response) => {
    const data = JSON.parse(response);
    $("#table_sections").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "sectionsImg",
          title: "Image",
          render: function (data, type, row) {
            return `
                    <div>
                        <img src="${data}" width="40px" height="40px"
                            class="object-fit-cover" alt="">
                    </div>
                  `;
          },
        },
        {
          data: "sectionsTitle",
          title: "Title",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "sectionsTxt",
          title: "Text",
          render: function (data, type, row) {
            var doc = new DOMParser().parseFromString(data, "text/html");
            return sliceText(doc.body.textContent || "", 50);
          },
        },
        {
          data: "sectionsDate",
          title: "Date",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
                    <button class="editSection btn btn-success" data-bs-toggle="modal" data-bs-target="#editSectionModal"
                    data-id="${row.id}"
                    ><i class="fa-solid fa-pen"></i></button>
                    <button class="deleteSection btn btn-danger" data-id="${row.id}"><i class="fa-solid fa-trash"></i></button>
                    `;
          },
        },
      ],
    });
  });
  fetchTotalObjectives().then((response) => {
    const data = JSON.parse(response);

    const table = $("#table_Objectives").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "id",
          title: "#",
          render: function (data) {
            return `<span class='badge bg-success' >${data}</span>`;
          },
        },
        {
          data: "objectives_icon",
          title: "Icons",
          render: function (data) {
            return `<span class="material-symbols-outlined">${data}</span>`;
          },
        },
        {
          data: "objectives_text",
          title: "Descriptions",
          render: function (data, type, row) {
            return `<span>${sliceText(data, 30)}</span>`;
          },
        },
        {
          data: "objectives_date",
          title: "Date",
          render: function (data) {
            return `<span data="${data}">${data}</span>`;
          },
        },
        {
          data: null,
          title: "Action",
          render: function (data, type, row) {
            return `
             <button class="editObjective btn btn-success" data-bs-toggle="modal" data-bs-target="#editObjectiveModal" data-objective-id="${row.id}"  data-objectives-text="${row.objectives_text}" data-objectives-icon="${row.objectives_icon}"><i class="fa-solid fa-pen"></i></button>
              <button class="btn btn-danger delete-btn" data-id="${row.id}" >
                <i class="fa-solid fa-trash"></i>
              </button>
            `;
          },
        },
      ],
      rowCallback: function (row, data, index) {
        $(row).addClass("position-relative");
      },
    });

    $("#table_Objectives").on("click", ".delete-btn", function () {
      const id = $(this).data("id");

      if (confirm("Are you sure you want to delete this?")) {
        objectivesDelete(id).then(function (response) {
          if (response == 1) {
            addActivityLog($.cookie("admin_id"), "DELETE", "Deleted Library Objectives");
            alert("Library Objectives Deleted");
            location.reload();
          } else {
            alert(response);
          }
        });
      }
    });
  });
  fetchAllLoginHistory().then((response) => {
    const data = JSON.parse(response);
    $("#table_login_history").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
        {
          targets: 1,
          width: "200px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "history_id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "account_id",
          title: "Admin ID",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "image",
          title: "Image",
          render: function (data, type, row) {
            return `
                    <div>
                        <img src="${data ?? "./assets/img/default.jpg"}" width="40px" height="40px"
                            class="object-fit-cover" alt="">
                    </div>
                  `;
          },
        },
        {
          data: "email",
          title: "Email",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "username",
          title: "Username",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "history_date",
          title: "Date",
          render: function (data, type, row) {
            return `${timeAgo(data)} ago`;
          },
        },
      ],
    });
  });
  fetchAllActivityLogs().then((response) => {
    const data = JSON.parse(response);
    $("#table_logs").DataTable({
      data: data,
      order: [[0, "desc"]],
      columnDefs: [
        {
          targets: 0,
          width: "10px",
          className: "text-center",
        },
        {
          targets: 1,
          width: "150px",
          className: "text-center",
        },
      ],
      columns: [
        {
          data: "log_id",
          title: "#",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: "admin_id",
          title: "Admin ID",
          render: function (data, type, row) {
            return `<span class='badge bg-success'>${data}</span>`;
          },
        },
        {
          data: null,
          title: "Profile",
          render: function (data, type, row) {
            return `
                    <div class="d-flex align-items-center gap-3">
                        <img src="${row.image ?? "./assets/img/default.jpg"}" width="40px" height="40px"
                            class="object-fit-cover rounded-circle" alt="">
                        <div>
                            <p class="m-0 p-0">${row.username}</p>
                            <small>${row.email}</small>
                        </div>
                    </div>
                  `;
          },
        },
        {
          data: "action",
          title: "Action",
          render: function (data, type, row) {
            switch (data) {
              case "CREATE":
                return `<span class='badge bg-success fw-medium fs-6'>${data}</span>`;
                break;
              case "DELETE":
                return `<span class='badge bg-danger fw-medium fs-6'>${data}</span>`;
                break;
              case "UPDATE":
                return `<span class='badge bg-primary fw-medium fs-6'>${data}</span>`;
                break;
              case "RESTORE":
                return `<span class='badge bg-warning fw-medium fs-6'>${data}</span>`;
                break;
              default:
                break;
            }
          },
        },
        {
          data: "details",
          title: "Details",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "text_date",
          title: "Date",
          render: function (data, type, row) {
            return data;
          },
        },
        {
          data: "created_at",
          title: "Time Ago",
          render: function (data, type, row) {
            return `${timeAgo(data)} ago`;
          },
        },
        {
          data: "ip_address",
          title: "IP Address",
          render: function (data, type, row) {
            return data;
          },
        },
      ],
    });
  });
}

function ChartJs() {
  fetchYearlyVisitors().then((response) => {
    const yearlyData = JSON.parse(response);

    const currentYear = new Date().getFullYear();
    let start = 2025;

    for (let i = currentYear; i >= start; i--) {
      $("#yearFilter").append(`<option value="${i}">${i}</option>`);
    }
    const ctx = $("#yearlyVisitor");

    const chart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "Juyl", "August", "September", "October", "November", "December"],
        datasets: [
          {
            label: "Visitors",
            data: yearlyData[`${currentYear}`],
            backgroundColor: "#4e73df",
            borderColor: "#2e59d9",
            borderWidth: 1,
          },
        ],
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });

    $("#yearFilter").on("change", function () {
      const selectedYear = $(this).val();
      chart.data.datasets[0].data = yearlyData[selectedYear];
      chart.update();
    });
  });

  fetchTotalVisitorByType().then((response) => {
    const dataDb = JSON.parse(response);
    const ctx = document.getElementById("allTimeRadarChart");

    new Chart(ctx, {
      type: "pie",
      data: {
        labels: dataDb.labels,
        datasets: [
          {
            data: dataDb.data,
            backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)", "rgb(153, 102, 255)", "rgb(255, 159, 64)"],
            hoverOffset: 4,
          },
        ],
      },
      options: {
        responsive: true,
      },
    });
  });
}
