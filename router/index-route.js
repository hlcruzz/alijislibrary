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
