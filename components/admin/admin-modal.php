<!-- Modal -->
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

<div class="modal fade" id="addGuidelinesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add
                    Guidelines</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="guidelinesForm">
                <div class="modal-body d-flex flex-column gap-2">

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Guideline Name</span>
                        <select name="guidelinesName" id="guidelinesName" class="form-select"
                            placeholder="Enter Guideline Name" required>
                            <option value="" selected hidden>Select Guideline Name</option>
                            <option value="Library Access & Identification">Library Access & Identification</option>
                            <option value="Personal Belongings & Responsibility">Personal Belongings & Responsibility
                            </option>
                            <option value="Entrance & Exit Procedures">Entrance & Exit Procedures</option>
                            <option value="Library Conduct & Behavior">Library Conduct & Behavior</option>
                            <option value="Library Materials Usage & Care">Library Materials Usage & Care</option>
                            <option value="Borrowing, Overdue, and Fines">Borrowing, Overdue, and Fines</option>
                            <option value="Special Conditions">Special Conditions</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="">Rules: </label>
                            <button type="button" id="addRules" class="btn btn-primary btn-sm"><span
                                    class="material-symbols-outlined">
                                    add
                                </span></button>
                        </div>
                        <textarea name="guidelineRules[]" class="form-control" placeholder="Enter Rules" required
                            rows="5"></textarea>
                        <div class="d-flex flex-column gap-3" id="inputRules">

                        </div>
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

<div class="modal fade" id="editGuidelinesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit
                    Guidelines</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editGuidelinesForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <input type="hidden" id="rules_id" name="rules_id">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Guideline Name</span>
                        <select name="editGuidelinesName" id="editGuidelinesName" class="form-select"
                            placeholder="Enter Guideline Name" required disabled>
                            <option value="Library Access & Identification">Library Access & Identification</option>
                            <option value="Personal Belongings & Responsibility">Personal Belongings & Responsibility
                            </option>
                            <option value="Entrance & Exit Procedures">Entrance & Exit Procedures</option>
                            <option value="Library Conduct & Behavior">Library Conduct & Behavior</option>
                            <option value="Library Materials Usage & Care">Library Materials Usage & Care</option>
                            <option value="Borrowing, Overdue, and Fines">Borrowing, Overdue, and Fines</option>
                            <option value="Special Conditions">Special Conditions</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="">Rules: </label>
                        </div>
                        <div class="d-flex flex-column gap-3" id="editInputRules">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addFaqModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add FAQ</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addFaqForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <div class="input-group">
                        <span class=" input-group-text" id="basic-addon1">Question</span>
                        <input type="text" name="question" id="question" class="form-control" required
                            placeholder="Enter Question">
                    </div>
                    <div class="mt-3">
                        <label for="answer">Answer: </label>
                        <textarea type="text" name="answer" id="answer" required class="form-control mt-2" rows="5"
                            placeholder="Enter Answer"></textarea>
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


<div class="modal fade" id="editFaqModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit FAQ</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editFaqForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <input type="hidden" id="editFaqId">
                    <div class="mt-2">
                        <label for="editQuestion">Question: </label>
                        <textarea type="text" name="editQuestion" id="editQuestion" class="form-control mt-2" required
                            placeholder="Enter Question" rows="5"></textarea>
                    </div>
                    <div class="mt-2">
                        <label for="answer">Answer: </label>
                        <textarea type="text" name="editAnswer" id="editAnswer" required class="form-control mt-2"
                            rows="15" placeholder="Enter Answer"></textarea>
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