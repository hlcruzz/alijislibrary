<div class="modal fade" id="viewNotifModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 m-0 p-0 d-flex align-items-center gap-2" id="exampleModalLabel"><span
                        class="material-symbols-outlined">
                        chat
                    </span> User Feedbacks</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex gap-3 align-items-center">
                    <img src="/assets/img/default.jpg" alt="" width="50px" height="50px" class="object-fit-cover"
                        style="border-radius: 50%;">
                    <div>
                        <h1 class="fs-5 m-0 p-0" id="displayFeedbackName"></h1>
                        <p class="p-0 m-0 fs-6" id="displayFeedbackEmail"></p>
                        <p class="m-0 p-0 fs-6" id="displayFeedbackDate"></p>
                    </div>
                </div>
                <div class="mt-3">

                    <h1 class="fs-6 p-0 m-0">Comment:</h1>

                    <div class="mt-3" style="overflow: auto; max-height: 400px;">
                        <p id="displayFeedbackMsg"></p>
                    </div>


                </div>
                <div id="adminReplyCont" class="mt-3" style="overflow: auto; max-height: 400px; display: none;">
                    <h1 class="fs-6 p-0 m-0">Admin reply:</h1>
                    <p id="displayAdminReply"></p>
                </div>
            </div>
            <div class="modal-footer">
                <div id="feedback-btn">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="replyFeedback">Reply</button>
                </div>

                <form id="feedbackForm" class="w-100" style="display: none;">
                    <input type="hidden" id="displayFeedbackId">
                    <textarea name="feedbackReply" id="feedbackReply" rows="5" class="w-100 p-2 form-control"
                        style="resize: none;" placeholder="Enter reply" maxlength="250"></textarea>
                    <div class="d-flex justify-content-end">
                        <p class="p-0 m-0 mt-1 text-muted" id="displayLength">0/250</p>
                    </div>
                    <div class="mt-3 d-flex justify-content-end gap-3">
                        <button type="reset" id="cancelReply" class="btn btn-secondary">Cancel</button>
                        <button type="button" id="sendReply" class="btn btn-success">Send <i
                                class="fa-solid fa-paper-plane"></i></button>
                        <div class="spinner-border" id="submitReplyLoading" style="display: none;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Library News</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="" id="addNewsForm" enctype="multipart/form-data">
                <div class="modal-body d-flex flex-column gap-2">
                    <div class="form-group d-flex flex-column gap-2">
                        <label for="">Images: (Optional)</label>
                        <input type="file" name="files[]" id="newsImg" class="form-control" accept="image/*" multiple>
                    </div>
                    <div class="form-group d-flex flex-column gap-2">
                        <label for="">Subject:</label>
                        <input type="text" name="newsSubject" id="newsSubject" class="form-control" maxlength="50"
                            placeholder="Enter News Subject">
                    </div>
                    <div class="form-group d-flex flex-column gap-2">
                        <label for="">Message:</label>
                        <textarea name="newsMsg" rows="5" class="form-control" id="newsMsg"
                            placeholder="Enter News Message" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editNewsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square"></i> Edit
                    Library News</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="editNewsCarousel" class="carousel slide" data-bs-interval="false">
                <div class="carousel-indicators" id="editNewsIndicator">

                </div>
                <div class="carousel-inner" id="editNewsImages">

                </div>
            </div>
            <form id="editNewsForm" enctype="multipart/form-data">
                <div class="modal-body d-flex flex-column gap-2">
                    <input type="hidden" name="editNewsId" id="editNewsId">
                    <div class="form-group d-flex flex-column gap-2">
                        <label for="">Upload New Images: (Optional)</label>
                        <input type="file" name="files[]" id="files" class="form-control" accept="image/*" multiple>
                    </div>
                    <div class="form-group d-flex flex-column gap-2">
                        <label for="">Subject:</label>
                        <input type="text" name="editNewsSubject" id="editNewsSubject" class="form-control"
                            maxlength="150" placeholder="Enter News Subject" required>
                    </div>
                    <div class="form-group d-flex flex-column gap-2">
                        <label for="">Message:</label>
                        <textarea name="editNewsMsg" rows="5" class="form-control" id="editNewsMsg"
                            placeholder="Enter News Message" style="resize: none;" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="addDownloadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-file-circle-plus"></i> Add
                    Downloadable</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="downloadbleForm" enctype="multipart/form-data">
                <div class="modal-body d-flex flex-column gap-2">
                    <div class="form-group d-flex flex-column gap-2">
                        <label for="">File Upload:</label>
                        <input type="file" name="file" id="file" class="form-control"
                            accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,
              application/msword,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add File</button>
                </div>
            </form>
        </div>
    </div>
</div>