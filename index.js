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
} from "./router/index-route.js";
import { checkCookie, darkTheme, lightTheme, sideMenu, setCookie } from "./utils/cookies.js";
import { setSession } from "./utils/session.js";
import { seePassword, adminNotifCont, timeAgo, showLoading, checkAdminLogin, sliceText, dataTable } from "./assets/js/admin.js";
$(document).ready(function () {
  ClickEvents();
  FetchEvents();
  ModalEvents();
  setCookie();
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
}
function FetchEvents() {
  checkCookie();

  setInterval(async () => {
    try {
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
                <small class="p-0 m-0 fs-6 fw-lighter ${isReadText}">${textLength}</small>
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
    } catch (error) {
      console.error("Error fetching feedbacks:", error);
    }
  }, 2000);

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

  //FETCH LIBRARY NEWS
  fetchAllNews().then((response) => {
    const data = JSON.parse(response);
    //ADMIN TABLE
    data.forEach(function (element) {
      const img =
        element.library_news_img_path == "" || element.library_news_img_path == null
          ? ""
          : `
              <div>
                  <img src="${element.library_news_img_path}" width="40px" height="40px"
                      class="object-fit-cover" alt="">
              </div>`;
      const tbody = $("#tbody");
      const row = `
      <tr>
          <td class="text-start">${element.news_id}</td>
          <td>
              ${img}
          </td>
          <td>${element.library_news_subject}</td>
          <td>${sliceText(element.library_news_txt, 30)}</td>
          <td>${element.text_date}</td>
          <td>
              <div>
                  <button class="editNews btn btn-success" data-id="${element.news_id}" data-bs-toggle="modal" data-bs-target="#editNewsModal"><i class="fa-solid fa-pen"></i></button>
                  <button class="deleteNews btn btn-danger" data-id="${element.news_id}"><i class="fa-solid fa-trash"></i></button>
              </div>
          </td>
      </tr>
      `;

      tbody.append(row);
    });
    dataTable($("#table_news"));
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
          <h1 class="fs-2">${subject}</h1>
          <p class="text-dark-emphasis">${message}</p>
          <div class="news-date d-flex gap-2">
              <span class="material-symbols-outlined"> arrow_right_alt </span>
              <p>${date}</p>
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
      });
    });

    $("#addNewsModal").on("hide.bs.modal", function () {
      $("#addNewsForm").trigger("reset");
    });
  });
}
