import { fetchNewsByCondition, fetchGalleryImgByLimit, fetchGalleryImgTotalRows, fetchAllPeriodicalByCondition } from "../../router/index-route.js";
import { setSession } from "../../utils/session.js";
setSession("searchVal", "");
setSession("limitNews", 10);
$("#newsLoading").hide();
setTimeout(() => {
  $("#newsLoading").show();
}, 2000);
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

const galleryLoadingIcon = $("#galleryLoading");
setTimeout(() => {
  galleryLoadingIcon.show();
}, 3000);

setSession("galleryRow", 10);
setInterval(async () => {
  const response = await fetchGalleryImgByLimit(sessionStorage.getItem("galleryRow") ?? 10);
  const data = JSON.parse(response);
  const galleryContainer = $("#galleryContainer");
  galleryContainer.empty();

  if (data.length === 0) {
    galleryContainer.append(`<div class="w-100 text-center alert alert-danger" role="alert">No Gallery Images Found</div>`);
    $("#galleryLoading").hide();
  } else {
    data.forEach((element) => {
      const img = element.gallery_path;
      const row = `
      <div class="col p-0 p-2"><img src="${img}" alt=""
                        class="galleryImg w-100 h-100 object-fit-cover rounded-4" role="button" data-bs-toggle="modal" data-bs-target="#previewGalleryModal" style="min-height: 400px">
                </div>`;

      galleryContainer.append(row);
    });
    fetchGalleryImgTotalRows().then((response) => {
      const data = JSON.parse(response);
      if (parseInt(sessionStorage.getItem("galleryRow")) >= parseInt(data.total_rows)) {
        $("#galleryLoading").hide();
      }
    });
  }
}, 2000);

if (galleryLoadingIcon.length > 0) {
  const obs = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        let galleryRow = parseInt(sessionStorage.getItem("galleryRow"));
        galleryRow += 10;
        setTimeout(() => {
          setSession("galleryRow", galleryRow);
        }, 1000);
      }
    });
  });

  obs.observe(galleryLoadingIcon[0]);
}
