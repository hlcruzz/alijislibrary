export function submitFeedback(feedbackName, feedbackEmail, feedbackMsg) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-submitFeedback.php",
      method: "POST",
      data: {
        feedbackName: feedbackName,
        feedbackEmail: feedbackEmail,
        feedbackMsg: feedbackMsg,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}
export function adminLogin(username, password) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-adminLogin.php",
      method: "POST",
      data: {
        username: username,
        password: password,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}
export function fetchFeedbacks(limit) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchFeedbacks.php",
      method: "GET",
      data: {
        limit: limit,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchTotalRowsFeedbacks() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-totalRowsFeedbacks.php",
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchTotalReadFeedbacks() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchTotalReadFeedbacks.php",
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchFeedbackById(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchFeedbackById.php",
      method: "GET",
      data: {
        id: id,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function updateIsReadFeedback(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateIsReadFeedback.php",
      method: "POST",
      data: {
        id: id,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function submitReplyFeedback(id, name, email, reply) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-submitReplyFeedback.php",
      method: "POST",
      data: {
        id: id,
        name: name,
        email: email,
        reply: reply,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function isFeedbackReplied(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-isFeedbackReplied.php",
      method: "POST",
      data: {
        id: id,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function addNews(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addNews.php",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchAllNews() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllNews.php",
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchNewsById(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchNewsById.php",
      method: "GET",
      data: {
        id: id,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchNewsImgById(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchNewsImgById.php",
      method: "GET",
      data: {
        id: id,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}
export function fetchNewsByLimit(limit) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchNewsByLimit.php",
      method: "GET",
      data: {
        limit: limit,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchNewsByCondition(search, limit) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchNewsByCondition.php",
      method: "GET",
      data: {
        search: search,
        limit: limit,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function deleteNewsById(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-deleteNewsById.php",
      method: "POST",
      data: {
        id: id,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function deleteNewsImgById(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-deleteNewsImgById.php",
      method: "POST",
      data: {
        id: id,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function updateNews(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateNews.php",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function addDownloadble(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addDownloadble.php",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchAllDownloadable() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllDownloadable.php",
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function deleteDownloadable(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-deleteDownloadable.php",
      data: {
        id: id,
      },
      method: "POST",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchAllFeedbacks() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllFeedbacks.php",
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchAllFoundation() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllFoundation.php",
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}
export function fetchFoundationByName(foundationName) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchFoundationByName.php",
      data: {
        foundationName: foundationName,
      },
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function updateFoundation(foundationName, foundationTxt) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateFoundation.php",
      data: {
        foundationName: foundationName,
        foundationTxt: foundationTxt,
      },
      method: "POST",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function addGuidelines(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addGuidelines.php",
      data: formData,
      processData: false,
      contentType: false,
      method: "POST",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchAllGuidelines() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllGuidelines.php",
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchAllGuidelinesByName(guidelineName) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllGuidelinesById.php",
      data: {
        guidelineName: guidelineName,
      },
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}
export function deleteGuidelineRuleById(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-deleteGuidelineRuleById.php",
      data: {
        id: id,
      },
      method: "POST",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function updateGuidelines(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateGuidelinesByIds.php",
      data: formData,
      processData: false,
      contentType: false,
      method: "POST",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function addFAQ(question, answer) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addFAQ.php",
      data: {
        question: question,
        answer: answer,
      },
      method: "POST",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}
export function fetchAllFaq() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllFaq.php",
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}
export function fetchFaqById(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchFaqById.php",
      data: {
        id: id,
      },
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}
export function updateFaq(id, question, answer) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateFaq.php",
      data: {
        id: id,
        question: question,
        answer: answer,
      },
      method: "POST",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}
