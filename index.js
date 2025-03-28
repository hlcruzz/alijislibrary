import {
  adminLogin,
  submitFeedback,
  fetchFeedbacks,
  fetchTotalRowsFeedbacks,
  fetchTotalReadFeedbacks,
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
  fetchNewsByCondition,
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
} from "./router/index-route.js";
import { checkCookie, darkTheme, lightTheme, sideMenu, setCookie } from "./utils/cookies.js";
import { setSession, checkSessionSettings } from "./utils/session.js";
import { seePassword, adminNotifCont, timeAgo, showLoading, checkAdminLogin, sliceText, openNavigation, openFoundationWidget } from "./assets/js/admin.js";
$(document).ready(function () {
  ClickEvents();
  FetchEvents();
  ModalEvents();
  DataTable();
});
function ClickEvents() {
  $("#adminForm").submit(function (event) {
    event.preventDefault();
    const username = $("#username").val();
    const password = $("#password").val();

    adminLogin(username, password).then((response) => {
      checkAdminLogin(response);
    });
  });
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

  $(".passIcon").each(seePassword());

  let num = 1;
  $("#notif-icon").on("click", function () {
    num += 1;
    let result = num % 2;
    adminNotifCont(result);
  });

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

  //EDIT NEWS MODAL
  $(document).on("click", ".editNews", function () {
    const id = $(this).attr("data-id");
    $("#editNewsId").val(id);
    fetchNewsById(id).then((response) => {
      const data = JSON.parse(response);
      const subject = data[0].library_news_subject;
      const text = data[0].library_news_txt;

      $("#editNewsSubject").val(subject);
      $("#editNewsMsg").val(text);

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

          caroulesCont.append(carouselImg);
          indicatorCont.append(btnIndicator);
          $("#editNewsCarousel").append(carouselBtn);
        });
      }
    });
  });

  //DELETE NEWS BY ID
  $(document).on("click", ".deleteNews", function () {
    const id = $(this).attr("data-id");
    const confirmDelete = confirm("Are you sure you want to delete this library news?");

    if (confirmDelete) {
      deleteNewsById(id).then((response) => {
        if (response == 1) {
          alert("News Deleted!");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });

  //DELETE NEWS IMG BY ID
  $(document).on("click", ".deleteNewsImg", function () {
    const id = $(this).attr("data-id");
    const confirmDelete = confirm("Are you sure you want to delete this image?");

    if (confirmDelete) {
      deleteNewsImgById(id).then((response) => {
        if (response == 1) {
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
    updateNews(formData).then((response) => {
      if (response == 1) {
        alert("Library News Updated!");
      } else {
        alert(response);
      }
    });
  });

  $(document).on("click", ".deleteDownload", function () {
    const id = $(this).attr("data-id");
    const confirmDel = confirm("Are you sure you want to delete this file?");
    if (confirmDel) {
      deleteDownloadable(id).then((response) => {
        if (response == 1) {
          alert("Downloadble Deleted");
          location.reload();
        } else {
          alert(response);
        }
      });
    }
  });

  //USER SIDE

  // View News Images
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

        const imgCont = `<div class="carousel-item ${isFirst}">
                            <img src="${imgPath}" class="d-block w-100 h-100 object-fit-contain"
                                alt="...">
                        </div>`;
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
        alert("File Uploaded");
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
}
function FetchEvents() {
  checkCookie();

  setInterval(async () => {
    const response = await fetchFeedbacks(sessionStorage.getItem("notifLimit"));
    const data = JSON.parse(response);
    const tbody = $("#tbody-notification");
    tbody.empty();

    data.forEach(function (element) {
      const textLength = sliceText(element.feedbackMsg, 30);

      const textTime = timeAgo(element.feedbackTime);
      const isReadText = element.feedbackIsRead == 0 ? "" : "text-muted";
      const isReadIcon = element.feedbackIsRead == 0 ? `<i class="fa-solid fa-circle text-primary position-absolute" style="font-size: 10px; top:10;"></i>` : "";
      const row = `
        <tr class="position-relative">
          <td class="ps-4" role="button">
            <div class="position-relatived d-flex align-items-center gap-2" style="min-width: 400px;">
              ${isReadIcon}
              <img src="../assets/img/default.jpg" width="50px" style="border-radius: 50%;">
              <div>
                <h1 class="p-0 m-0 fs-6 isReadText ${isReadText}">${element.feedbackName}</h1>
                <small class="p-0 m-0 ${isReadText}">${textLength}</small>
              </div>
            </div>
          </td>
          <td role="button">
            <p class="p-0 m-0 ${isReadText}">${textTime}</p>
          </td>
          <td>
            <a class="notif-link" data-id="${element.id}" role="button" data-bs-toggle="modal" data-bs-target="#viewNotifModal"></a>
          </td>
        </tr>
      `;
      tbody.append(row);
    });
  }, 2000);

  setSession("notifLimit", 10);
  fetchTotalReadFeedbacks().then((response) => {
    const data = JSON.parse(response);
    $("#totalIsReadFeedbacks").html(data.totalReadFeedbacks);
  });

  setInterval(async () => {
    const response = await fetchTotalReadFeedbacks();
    const data = JSON.parse(response);
    $("#totalIsReadFeedbacks").html(data.totalReadFeedbacks);
  }, 4000);

  fetchTotalRowsFeedbacks().then((response) => {
    const data = JSON.parse(response);
    $("#totalFeedbackRows").html(data.totalRows);
  });

  fetchNewsByLimit(5).then((response) => {
    const data = JSON.parse(response);

    const libNewsCont = $("#library-news-user");
    data.forEach((element) => {
      const subject = element.library_news_subject;
      const message = sliceText(element.library_news_txt, 60);
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
    // Check if the element exists
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

  setSession("searchVal", "");
  setSession("limitNews", 10);
  $("#newsLoading").hide();
  setTimeout(() => {
    $("#newsLoading").show();
  }, 2000);
  setInterval(async () => {
    const searchResult = sessionStorage.getItem("searchVal") == "" || sessionStorage.getItem("searchVal") == null ? "" : sessionStorage.getItem("searchVal");
    const limitNews = sessionStorage.getItem("limitNews") == "" || sessionStorage.getItem("limitNews") == null ? "" : sessionStorage.getItem("limitNews");
    const response = await fetchNewsByCondition(searchResult, limitNews);
    const data = JSON.parse(response);

    const newsContainer = $("#newsContainer");
    newsContainer.empty();

    if (data.length > 0) {
      setSession("searchResult", true);
      const newsRows = setSession("newsRows", data.length);
      data.forEach((element) => {
        const subject = element.library_news_subject;
        const text = element.library_news_txt;
        const images = element.images;
        const date = element.text_date;

        const imageArray = images ? images.split(",") : [];
        let imagesHtml = "";
        for (let index = 0; index < Math.min(4, imageArray.length); index++) {
          const element = imageArray[index];

          const hasReminder = imageArray.length - Math.min(4, imageArray.length) > 0 ? imageArray.length - Math.min(4, imageArray.length) : "";

          const reminder =
            index === Math.min(4, imageArray.length) - 1 && hasReminder
              ? `<div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-50 d-flex align-items-center justify-content-center">
                <h1 class="text-light opacity-100">${"+" + hasReminder}</h1>
            </div>`
              : "";

          imagesHtml += `<div class="col p-1 position-relative" role="button">
                    <img src="${element}" class="object-fit-cover" width="100%" height="100%" alt="">
                    ${reminder}
                </div>`;
        }

        const row = `
      <div class="col p-5">
          <div class="d-flex gap-3">
              <img src="./assets/img/logo.png" width="60px" height="60px" alt="">
              <div>
                  <h1 class="p-0 m-0 fs-4">${subject}</h1>
                  <p class="p-0 m-0" style="font-size: small">${date}</p>
              </div>
          </div>
          <p class="mt-4">
              ${text}
          </p>
          <div class="newsImages row row-cols-2 row-cols-md-4" data-id="${element.id}" data-bs-target="#viewImgNewsModal" data-bs-toggle="modal">
            ${imagesHtml}
          </div>
      </div>`;

        newsContainer.append(row);
      });

      if (parseInt(sessionStorage.getItem("limitNews")) > parseInt(sessionStorage.getItem("newsRows"))) {
        $("#newsLoading").hide();
      }
    } else {
      setSession("searchResult", false);
      $("#newsLoading").hide();
    }
  }, 1000);

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
                  <h1 class="fs-5 mt-3 pb-2">${element.downloads_name}</h1>
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
      <div class="col col-12 col-sm-6 col-lg-3 p-0">
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
      const isIndexFirst =
        index == 0
          ? `style="background-color: var(--primary-color);
color: white;"`
          : "";

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
}
function ModalEvents() {
  //VIEW NOTIFICATION MODAL
  $("#viewNotifModal").on("show.bs.modal", function () {
    // DISPLAY MODAL
    $(".notif-link").each(function () {
      $(this).on("click", function () {
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
    });
    // SHOW REPLY
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

    // REPLY SUBMISSION
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
        alert(response);
        location.reload();
      });
    });
    $("#viewNotifModal").on("show.bs.modal", function () {
      $("#feedback-btn").show();
      $("#feedbackForm").hide();
      $("#feedbackForm").trigger("reset");
      const displayLength = $("#displayLength");

      displayLength.html(`0 / 250`);
    });
  });

  //ADD LIBRARY NEWS MODAL
  $("#addNewsModal").on("show.bs.modal", function () {
    $("#addNewsForm").submit(function (event) {
      event.preventDefault();

      const formData = new FormData(this);
      addNews(formData).then((response) => {
        event.preventDefault();
        alert(response);
        location.reload();
      });
    });

    $("#addNewsModal").on("hide.bs.modal", function () {
      $("#addNewsForm").trigger("reset");
    });
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

  $("#addGuidelinesModal").on("show.bs.modal", function () {
    $("#guidelinesForm").submit(function (event) {
      event.preventDefault();
      const formData = new FormData(this);
      addGuidelines(formData).then((response) => {
        if (response == 1) {
          alert("Guidelines Added!");
          location.reload();
        } else {
          alert(response);
        }
      });
    });
  });

  $("#addGuidelinesModal").on("hide.bs.modal", function () {
    $("#inputRules").empty();
    $("#guidelinesForm").trigger("reset");
  });

  $("#editGuidelinesModal").on("hide.bs.modal", function () {
    $("#editInputRules").empty();
  });

  $("#editGuidelinesModal").on("show.bs.modal", function () {
    $("#editGuidelinesForm").submit(function (event) {
      event.preventDefault();
      const formData = new FormData(this);
      updateGuidelines(formData).then((response) => {
        if (response == 1) {
          alert("Rules Updated!");
          location.reload();
        } else {
          alert(response);
        }
      });
    });
  });

  $("#addFaqModal").on("show.bs.modal", function () {
    $("#addFaqForm").submit(function (event) {
      event.preventDefault();

      const question = $("#question").val();
      const answer = $("#answer").val();
      addFAQ(question, answer).then((response) => {
        if (response == 1) {
          alert("FAQ Added!");
          location.reload();
        } else {
          alert(response);
        }
      });
    });
  });
  $("#addFaqModal").on("hide.bs.modal", function () {
    $("#addFaqForm").trigger("reset");
  });

  $("#editFaqModal").on("show.bs.modal", function () {
    $("#editFaqForm").submit(function (event) {
      event.preventDefault();

      const editFaqId = $("#editFaqId").val();
      const editQuestion = $("#editQuestion").val();
      const editAnswer = $("#editAnswer").val();
      updateFaq(editFaqId, editQuestion, editAnswer).then((response) => {
        if (response == 1) {
          alert("FAQ Updated!");
          location.reload();
        } else {
          alert(response);
        }
      });
    });
  });
  $("#editFaqModal").on("hide.bs.modal", function () {
    $("#editFaqForm").trigger("reset");
  });
}
function DataTable() {
  //FETCH LIBRARY NEWS
  fetchAllNews().then((response) => {
    const data = JSON.parse(response);
    //ADMIN TABLE LIBRARY NEWS
    $("#table_news").DataTable({
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
    // ADMIN TABLE DOWNLOADABLES
    $("#table_dwonloads").DataTable({
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
  fetchAllGuidelines().then((response) => {
    const data = JSON.parse(response);
    $("#table_guidelines").DataTable({
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
            return data;
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
}
