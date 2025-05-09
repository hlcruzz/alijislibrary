export function adminLogout() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-adminLogout.php",
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

export function deleteFaq(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-deleteFaq.php",
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

export function addReferenceTools(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addReferenceTools.php",
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

export function fetchAllReferenceTools() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllReferenceTools.php",
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

export function fetchReferenceToolsById(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchReferenceToolsById.php",
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

export function updateReferenceTools(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateReferenceTools.php",
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

export function deleteReferenceTools(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-deleteReferenceTools.php",
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

export function fetchReferenceToolsByType(type) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchReferenceToolsByType.php",
      data: {
        type: type,
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

export function addGalleryImg(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addGalleryImg.php",
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

export function fetchGalleryImgByLimit(limit, page) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchGalleryImgByLimit.php",
      data: {
        limit: limit,
        page: page,
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

export function fetchGalleryImgTotalRows() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchGalleryImgTotalRows.php",
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

export function deleteGalleryImg(ids) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-deleteGalleryImg.php",
      data: {
        ids: ids,
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

export function fetchAllArchive() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllArchive.php",
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

export function restoreArchive(id, tableId, tableName) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-restoreArchive.php",
      data: {
        id: id,
        tableId: tableId,
        tableName: tableName,
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

export function addOpenSourceDatabase(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addOpenSourceDatabase.php",
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

export function fetchAllOpenSourceDatabase() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllOpenSourceDatabase.php",
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

export function fetchOpenSourceDatabaseById(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchOpenSourceDatabaseById.php",
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

export function updateOpenSourceDatabase(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateOpenSourceDatabase.php",
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

export function deleteOpenSourceDatabase(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-deleteOpenSourceDatabase.php",
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

export function addServices(table, title, txt) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addServices.php",
      data: {
        table: table,
        title: title,
        txt: txt,
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

export function fetchServices(table) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchServices.php",
      data: {
        table: table,
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

export function fetchServicesById(id, table) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchServicesById.php",
      data: {
        id: id,
        table: table,
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

export function updateServices(id, table, title, txt) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateServices.php",
      data: {
        id: id,
        table: table,
        title: title,
        txt: txt,
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

export function deleteServices(id, table) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-deleteServices.php",
      data: {
        id: id,
        table: table,
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

export function addEjournal(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addEjournal.php",
      data: formData,
      method: "POST",
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

export function fetchAllJournals() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllJournals.php",
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

export function fetchJournalsByLimit(limit) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchJournalsByLimit.php",
      data: {
        limit: limit,
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

export function updateEjournal(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateEjournal.php",
      data: formData,
      method: "POST",
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
export function deleteEjournal(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-deleteEjournal.php",
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

export function addSocial(icon, link) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addSocial.php",
      data: {
        icon: icon,
        link: link,
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

export function fetchAllSocial() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllSocial.php",
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

export function fetchSocialIcons() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchSocialIcons.php",
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

export function updateSocial(id, icon, link) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateSocial.php",
      data: {
        id: id,
        icon: icon,
        link: link,
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
export function fetchAdminContacts() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAdminContacts.php",
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

export function updateAdminContact(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateAdminContact.php",
      data: formData,
      contentType: false,
      processData: false,
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

export function addPersonnel(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addPersonnel.php",
      data: formData,
      contentType: false,
      processData: false,
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

export function fetchAllPersonnel() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllPersonnel.php",
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

export function updatePersonnel(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updatePersonnel.php",
      data: formData,
      contentType: false,
      processData: false,
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

export function fetchAbout() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAbout.php",
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

export function updateAbout(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateAbout.php",
      data: formData,
      contentType: false,
      processData: false,
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

export function addPeriodical(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addPeriodical.php",
      data: formData,
      contentType: false,
      processData: false,
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

export function fetchAllPeriodical() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllPeriodical.php",
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

export function deletePeriodical(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-deletePeriodical.php",
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

export function deletePeriodicalImg(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-deletePeriodicalImg.php",
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

export function updatePeriodical(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updatePeriodical.php",
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

export function fetchAllPeriodicalByCondition(title, type, category, sortBy) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllPeriodicalByCondition.php",
      data: {
        title: title,
        type: type,
        category: category,
        sortBy: sortBy,
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

export function addSection(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addSection.php",
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

export function fetchAllSections() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllSections.php",
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

export function fetchSectionById(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchSectionById.php",
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

export function updateSection(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateSection.php",
      data: formData,
      method: "POST",
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

export function deleteSection(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-deleteSection.php",
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

export function addObjectives(icon, text) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addObjectives.php",
      data: {
        icon: icon,
        text: text,
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

export function fetchTotalObjectives() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchTotalObjectives.php",
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

export function objectivesDelete(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-objectivesDelete.php",
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

export function updateObjectives(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateObjectives.php",
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

export function addVisitor(visitorType, captcha) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addVisitor.php",
      method: "POST",
      data: {
        visitorType: visitorType,
        captcha: captcha,
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
export function fetchTotalRowVisitor() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchTotalRowVisitor.php",
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

export function fetchTotalRowNews() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchTotalRowNews.php",
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

export function fetchTotalRowGallery() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchTotalRowGallery.php",
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
export function fetchYearlyVisitors() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchVisitorsChart.php",
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

export function fetchTotalVisitorByType() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchTotalVisitorByType.php",
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

export function addLoginHistory(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addLoginHistory.php",
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

export function fetchAllLoginHistory() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllLoginHistory.php",
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

export function addLibraryHours(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addLibraryHours.php",
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

export function fetchAllLibraryHours() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllLibraryHours.php",
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

export function updateLibraryHours(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-updateLibraryHours.php",
      data: formData,
      method: "POST",
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

export function deleteLibraryHours(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-deleteLibraryHours.php",
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

export function addActivityLog(action, details) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-addActivityLog.php",
      data: {
        action: action,
        details: details,
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

export function fetchAllActivityLogs() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-fetchAllActivityLogs.php",
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

export function sendAuthCode(email, captcha) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-sendAuthCode.php",
      data: {
        email: email,
        captcha: captcha,
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

export function changePassword(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-changePassword.php",
      data: formData,
      method: "POST",
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

export function checkRole() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/endpoint-checkRole.php",
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
