import { fetchFeedbacks, fetchTotalReadFeedbacks } from "../../router/index-route.js";
import { setSession } from "../../utils/session.js";
import { timeAgo, sliceText } from "../../assets/js/admin.js";

$("#totalIsReadFeedbacks").html("");
setInterval(async () => {
  const response = await fetchFeedbacks(sessionStorage.getItem("notifLimit"));
  const data = JSON.parse(response);
  const tbody = $("#tbody-notification");
  tbody.empty();

  data.forEach(function (element) {
    const textLength = sliceText(element.feedbackMsg, 30);

    const textTime = timeAgo(element.feedbackTime);
    const isReadText = element.feedbackIsRead == 0 ? "" : "text-muted";
    const isReadIcon = element.feedbackIsRead == 0 ? `<i class="fa-solid fa-circle text-primary position-absolute" style="font-size: 10px; top:10px;"></i>` : "";
    const row = `
        <tr class="position-relative">
          <td class="ps-4" role="button">
            <div class="position-relatived d-flex align-items-center gap-2" style="min-width: 400px;">
              ${isReadIcon}
              <img src="./assets/img/default.jpg" width="50px" style="border-radius: 50%;">
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

  const responseReadFeedback = await fetchTotalReadFeedbacks();
  const dataReadFeedback = JSON.parse(responseReadFeedback);
  $("#totalIsReadFeedbacks").html(dataReadFeedback.totalReadFeedbacks == 0 ? "" : dataReadFeedback.totalReadFeedbacks);
}, 1000);

setSession("notifLimit", 10);
