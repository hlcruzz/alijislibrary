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
                    <img src="./assets/img/default.jpg" alt="" width="50px" height="50px" class="object-fit-cover"
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

<div class="modal fade modal-lg" id="addNewsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Library News</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="addNewsForm" enctype="multipart/form-data">
                <div class="modal-body d-flex flex-column gap-2">
                    <div class="form-group d-flex flex-column gap-2">
                        <label for="">Images: (Optional)</label>
                        <input type="file" name="files[]" id="newsImg" class="form-control" accept=".jpg, .jpeg, .png"
                            multiple>
                    </div>
                    <div class="form-group d-flex flex-column gap-2">
                        <label for="">Subject:</label>
                        <input type="text" name="newsSubject" id="newsSubject" class="form-control" maxlength="50"
                            placeholder="Enter News Subject" required>
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

<div class="modal fade modal-lg" id="editNewsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                        <input type="file" name="files[]" class="form-control" accept=".jpg, .jpeg, .png" multiple>
                    </div>
                    <div class="form-group d-flex flex-column gap-2">
                        <label for="">Subject:</label>
                        <input type="text" name="editNewsSubject" id="editNewsSubject" class="form-control"
                            maxlength="150" placeholder="Enter News Subject" required>
                    </div>
                    <div class="form-group d-flex flex-column gap-2">
                        <label for="">Message:</label>
                        <textarea name="editNewsMsg" rows="5" class="form-control" id="editNewsMsg"
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
                        <input type="file" name="file" class="form-control"
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
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addToolModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add Online Reference Tool</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addToolForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <div>
                        <label for="file">Image: ( jpeg, jpg, png ) </label>
                        <input type="file" name="file" class="form-control mt-2" accept=".jpg, .jpeg, .png" required>
                    </div>
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="online_reference_type">Type</label>
                        <select name="online_reference_type" id="online_reference_type" class="form-select" required>
                            <option value="" selected hidden>Select Type</option>
                            <option value="Dictionaries">Dictionaries</option>
                            <option value="Encyclopedias">Encyclopedias</option>
                            <option value="Maps">Maps</option>
                            <option value="General References">General References</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="online_reference_name">Online Reference Tool Name: </label>
                        <input type="text" name="online_reference_name" id="online_reference_name"
                            class="form-control mt-2" placeholder="Enter Online Reference Tool Name" required>
                    </div>
                    <div class="mt-3">
                        <label for="online_reference_desc">Online Reference Tool Description: </label>
                        <textarea name="online_reference_desc" id="online_reference_desc" class="form-control mt-2"
                            placeholder="Enter Description" rows="5" required></textarea>
                    </div>
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="online_reference_link">Link</label>
                        <input type="url" name="online_reference_link" id="online_reference_link" class="form-control"
                            placeholder="https://example.com/" required>
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

<div class="modal fade" id="editToolModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Online Reference Tool</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editToolForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <div class="position-relative" id="editOnlineToolImgCont">

                    </div>
                    <input type="hidden" id="edit_online_reference_id" name="edit_online_reference_id">
                    <div>
                        <label for="file">Update Image: ( jpeg, jpg, png ) </label>
                        <input type="file" name="edit_file_tool" id="edit_file_tool" class="form-control mt-2"
                            accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="edit_online_reference_type">Type</label>
                        <select name="edit_online_reference_type" id="edit_online_reference_type" class="form-select"
                            required>
                            <option value="" selected hidden>Select Type</option>
                            <option value="Dictionaries">Dictionaries</option>
                            <option value="Encyclopedias">Encyclopedias</option>
                            <option value="Maps">Maps</option>
                            <option value="General References">General References</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="edit_online_reference_name">Online Reference Tool Name: </label>
                        <input type="text" name="edit_online_reference_name" id="edit_online_reference_name"
                            class="form-control mt-2" placeholder="Enter Online Reference Tool Name" required>
                    </div>
                    <div class="mt-3">
                        <label for="edit_online_reference_desc">Online Reference Tool Description: </label>
                        <textarea name="edit_online_reference_desc" id="edit_online_reference_desc"
                            class="form-control mt-2" placeholder="Enter Description" rows="5" required></textarea>
                    </div>
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="edit_online_reference_link">Link</label>
                        <input type="url" name="edit_online_reference_link" id="edit_online_reference_link"
                            class="form-control" placeholder="https://example.com/" required>
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

<div class="modal fade" id="addGalleryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add Gallery Images</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addGalleryForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <div>
                        <label for="file">Select Images: ( jpeg, jpg, png )</label>
                        <input type="file" name="file[]" class="form-control mt-2" accept=".jpg, .jpeg, .png" multiple
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="addGalleryBtn" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade p-0 m-0" style="max-height: 100%;" id="previewGalleryModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="m-0 mx-auto d-flex justify-content-center align-items-center modal-dialog h-100 w-100">
        <img src="" alt="" id="previewGalleryImg" class="w-auto h-100 object-fit-fill" srcset="">
    </div>
</div>

<div class="modal fade" id="addDatabaseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add Open Source Database</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addDatabaseForm" enctype="multipart/form-data">
                <div class="modal-body d-flex flex-column gap-2">
                    <div>
                        <label for="file">Select Image: ( jpeg, jpg, png )</label>
                        <input type="file" name="dbImg" id="dbImg" class="form-control mt-2" accept=".jpg, .jpeg, .png"
                            required>
                    </div>
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="link">Link</label>
                        <input type="url" name="dbLink" id="dbLink" class="form-control"
                            placeholder="https://example.com/" required>
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

<div class="modal fade" id="editDatabaseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Open Source Database</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editDatabaseForm" enctype="multipart/form-data">
                <div class="modal-body d-flex flex-column gap-2">
                    <input type="hidden" id="dbId" name="dbId">
                    <div>
                        <img src="" id="dbImgPreview" alt="" class="w-100 object-fit-cover" style="max-height: 300px;">
                    </div>
                    <div>
                        <label for="editDbImg">Update Image: ( jpeg, jpg, png )</label>
                        <input type="file" name="editDbImg" id="editDbImg" class="form-control mt-2"
                            accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="editDbLink">Link</label>
                        <input type="url" name="editDbLink" id="editDbLink" class="form-control"
                            placeholder="https://example.com/" required>
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


<div class="modal fade modal-xl" id="addServicesModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add Services</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addServicesForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Table</span>
                            <select name="servicesTable" id="servicesTable" class="form-select" required>
                                <option value="" selected hidden>Select Table</option>
                                <option value="automated_circulation">Automated Circulation</option>
                                <option value="virtual_library_orientation">Virtual Library Orientation
                                </option>
                                <option value="internet_computer_aided_research">Internet & Computer Aided Research
                                </option>
                                <option value="information_dissemination">Information Dissemination</option>
                                <option value="online_subscription_databases">Online Subscription of Databases
                                </option>
                                <option value="news_current_events">News & Current Events</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-group-text" for="servicesTitle">Title</label>
                            <input type="text" name="servicesTitle" id="servicesTitle" class="form-control"
                                placeholder="Services Title" required>
                        </div>
                    </div>
                    <div>
                        <label class="ms-1 mt-2 mb-3" for="servicesTxt">Context:</label>
                        <textarea name="servicesTxt" id="servicesTxt" placeholder="Services Text"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade modal-xl" id="editServicesModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Update Services</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editServicesForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-3">
                        <input type="hidden" id="servicesId">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Table</span>
                            <select name="editServicesTable" id="editServicesTable" class="form-select" required
                                disabled>

                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-group-text" for="editServicesTitle">Title</label>
                            <input type="text" name="editServicesTitle" id="editServicesTitle" class="form-control"
                                placeholder="Services Title" required>
                        </div>
                    </div>
                    <div>
                        <label class="ms-1 mt-2 mb-3" for="editServicesTxt">Context:</label>
                        <textarea name="editServicesTxt" id="editServicesTxt" placeholder="Services Text"></textarea>
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

<div class="modal fade" id="addEjournalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add E - Journal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addEjournalForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <div>
                        <label for="journalImg">Upload Image: ( jpeg, jpg, png ) </label>
                        <input type="file" name="journalImg" id="journalImg" class="form-control mt-2"
                            accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="journalTitle">Title</label>
                        <input type="text" name="journalTitle" id="journalTitle" class="form-control"
                            placeholder="E - Journal Title" required>
                    </div>
                    <div>
                        <label class="ms-1 mt-2 mb-3" for="journalTxt">Context:</label>
                        <textarea name="journalTxt" id="journalTxt" placeholder="Services Text" class="form-control"
                            rows="5"></textarea>
                    </div>
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="journalLink">Link</label>
                        <input type="url" name="journalLink" id="journalLink" class="form-control"
                            placeholder="https://example.com/" required>
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

<div class="modal fade" id="editEjournalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Update E - Journal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editEjournalForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <input type="hidden" id="editJournalId" name="editJournalId">
                    <div>
                        <img src="" id="editJournalImgPreview" alt="" class="w-100 object-fit-contain"
                            style="max-height: 300px;">
                    </div>
                    <div>
                        <label for="editJournalImg">Upload Image: ( jpeg, jpg, png ) </label>
                        <input type="file" name="editJournalImg" id="editJournalImg" class="form-control mt-2"
                            accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="editJournalTitle">Title</label>
                        <input type="text" name="editJournalTitle" id="editJournalTitle" class="form-control"
                            placeholder="E - Journal Title" required>
                    </div>
                    <div>
                        <label class="ms-1 mt-2 mb-3" for="editJournalTxt">Context:</label>
                        <textarea name="editJournalTxt" id="editJournalTxt" placeholder="Services Text"
                            class="form-control" rows="10"></textarea>
                    </div>
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="editJournalLink">Link</label>
                        <input type="url" name="editJournalLink" id="editJournalLink" class="form-control"
                            placeholder="https://example.com/" required>
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

<div class="modal fade" id="addSocialsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add Social</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addSocialsForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <div class="input-group ">
                        <span class="input-group-text" id="basic-addon1">Select Icon</span>
                        <select name="socialIcon" id="socialIcon" class="form-select" placeholder="Enter Guideline Name"
                            required>
                            <option value="" selected hidden>Select Icon</option>

                        </select>
                        <span class="input-group-text" id="displayIcon"></span>
                    </div>
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="socialLink">Link</label>
                        <input type="url" name="socialLink" id="socialLink" class="form-control"
                            placeholder="https://example.com/" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="addSocialsBtn" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editSocialModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Social</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editSocialsForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <input type="hidden" id="editSocialId" name="editSocialId" hidden>
                    <div class="input-group ">
                        <span class="input-group-text" id="basic-addon1">Select Icon</span>
                        <select name="editSocialIcon" id="editSocialIcon" class="form-select"
                            placeholder="Enter Guideline Name" required>
                            <option value="" selected hidden>Select Icon</option>

                        </select>
                        <span class="input-group-text" id="editDisplayIcon"></span>
                    </div>
                    <div class="input-group mt-3">
                        <label class="input-group-text" for="editSocialLink">Link</label>
                        <input type="url" name="editSocialLink" id="editSocialLink" class="form-control"
                            placeholder="https://example.com/" required>
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

<div class="modal fade" id="addPersonnelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add Personnel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addPersonnelForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <div>
                        <label for="personnel_image">Select Picture: ( jpg, jpeg, png )</label>
                        <input type="file" name="personnel_image" id="personnel_image" class="form-control mt-2"
                            accept=".jpg, .jpeg, .png" required>
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">Roles</span>
                        <input type="text" list="roleList" name="personnelRole" id="personnelRole" class="form-control"
                            required placeholder="Enter Personnel Role">
                        <datalist id="roleList">
                            <option value="Head Librarian"></option>
                            <option value="Library Clerk"></option>
                            <option value="Director"></option>
                            <option value="Librarians"></option>
                            <option value="Job Orders"></option>
                        </datalist>
                    </div>


                    <div class="input-group mt-3">
                        <label class="input-group-text" for="editSocialLink">Name</label>
                        <input type="text" name="personnelName" id="personnelName" class="form-control"
                            placeholder="Enter Personnel Name" maxlength="50" required>
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

<div class="modal fade" id="editPersonnelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Personnel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updatePersonnelForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <input type="hidden" id="editPersonnelId" name="editPersonnelId">
                    <div>
                        <img src="" alt="" id="editPersonnelImgPreview" class="w-100 object-fit-contain"
                            style="max-height: 300px;">
                    </div>
                    <div>
                        <label for="edit_personnel_image">Update Picture: ( jpg, jpeg, png )</label>
                        <input type="file" name="edit_personnel_image" id="edit_personnel_image"
                            class="form-control mt-2" accept=".jpg, .jpeg, .png">
                    </div>

                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">Roles</span>
                        <input type="text" list="roleList" name="editPersonnelRole" id="editPersonnelRole"
                            class="form-control" required placeholder="Enter Personnel Role">
                        <datalist id="roleList">
                            <option value="Head Librarian"></option>
                            <option value="Library Clerk"></option>
                            <option value="Director"></option>
                            <option value="Librarians"></option>
                            <option value="Job Orders"></option>
                        </datalist>
                    </div>


                    <div class="input-group mt-3">
                        <label class="input-group-text" for="editSocialLink">Name</label>
                        <input type="text" name="editPersonnelName" id="editPersonnelName" class="form-control"
                            placeholder="Enter Personnel Name" maxlength="50" required>
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

<div class="modal fade modal-lg" id="addPeriodicalModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Magazine or Journal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="addPeriodicalForm" enctype="multipart/form-data">
                <div class="modal-body d-flex flex-column gap-2">
                    <div class="form-group d-flex flex-column gap-2">
                        <label for="files">Upload Images: ( jpeg, jpg, png)</label>
                        <input type="file" name="files[]" class="form-control" accept=".jpg, .jpeg, .png" multiple
                            required>
                    </div>
                    <div class="d-flex flex-column flex-lg-row gap-3 align-items-center mt-3">
                        <div class="input-group">
                            <label class="input-group-text" for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title"
                                maxlength="50" required>
                        </div>
                        <div class="input-group">
                            <label for="" class="input-group-text">Select Type: </label>
                            <div class="d-flex gap-3 align-items-center ms-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="magazine"
                                        id="magazine" required>
                                    <label class="form-check-label" for="magazine">
                                        Magazine
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="journal"
                                        value="journal" required>
                                    <label class="form-check-label" for="journal">
                                        Journal
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-lg-row gap-3 align-items-center">
                        <div class="input-group mt-3">
                            <label class="input-group-text" for="category">Category</label>
                            <select name="category" id="category" class="form-select" required>
                                <option value="" selected hidden>Select Category</option>
                                <option value="Arts & Culture">Arts & Culture</option>
                                <option value="Science & Technology">Science & Technology</option>
                                <option value="Health & Wellness">Health & Wellness</option>
                                <option value="Business & Economics">Business & Economics</option>
                                <option value="History & Politics">History & Politics</option>
                                <option value="Lifestyle & Entertainment">Lifestyle & Entertainment</option>
                            </select>
                        </div>
                        <div class="input-group mt-3">
                            <label class="input-group-text" for="author">Author</label>
                            <input type="text" name="author" id="author" class="form-control" placeholder="Enter Author"
                                maxlength="50" required>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="desc">Description:</label>
                        <textarea name="desc" id="desc" rows="5" class="form-control mt-3"
                            placeholder="Enter Description"></textarea>
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
<div class="modal fade modal-lg" id="editPeriodicalModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Magazine or Journal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="editPeriodicalForm" enctype="multipart/form-data">
                <div class="modal-body d-flex flex-column gap-2">
                    <div id="periodicalCarousel" class="carousel slide carousel-dark" data-bs-interval="false">

                        <div class="carousel-indicators" id="periodicalsIndicator">
                        </div>
                        <div class="carousel-inner" id="periodicalsImages">

                        </div>

                    </div>
                    <input type="hidden" id="periodical_pk_id" name="periodical_pk_id">
                    <div class="form-group d-flex flex-column gap-2">
                        <label for="files">Upload New Images: ( jpeg, jpg, png)</label>
                        <input type="file" name="files[]" class="form-control" accept=".jpg, .jpeg, .png" multiple>
                    </div>
                    <div class="d-flex flex-column flex-lg-row gap-3 align-items-center mt-3">
                        <div class="input-group">
                            <label class="input-group-text" for="editTitle">Title</label>
                            <input type="text" name="editTitle" id="editTitle" class="form-control"
                                placeholder="Enter Title" maxlength="50" required>
                        </div>
                        <div class="input-group">
                            <label for="" class="input-group-text">Select Type: </label>
                            <div class="d-flex gap-3 align-items-center ms-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="Magazine"
                                        id="editMagazine" required>
                                    <label class="form-check-label" for="magazine">
                                        Magazine
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="editJournal"
                                        value="Journal" required>
                                    <label class="form-check-label" for="journal">
                                        Journal
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-lg-row gap-3 align-items-center">
                        <div class="input-group mt-3">
                            <label class="input-group-text" for="editCategory">Category</label>
                            <select name="editCategory" id="editCategory" class="form-select" required>
                                <option value="" selected hidden>Select Category</option>
                                <option value="Arts & Culture">Arts & Culture</option>
                                <option value="Science & Technology">Science & Technology</option>
                                <option value="Health & Wellness">Health & Wellness</option>
                                <option value="Business & Economics">Business & Economics</option>
                                <option value="History & Politics">History & Politics</option>
                                <option value="Lifestyle & Entertainment">Lifestyle & Entertainment</option>
                            </select>
                        </div>
                        <div class="input-group mt-3">
                            <label class="input-group-text" for="editAuthor">Author</label>
                            <input type="text" name="editAuthor" id="editAuthor" class="form-control"
                                placeholder="Enter Author" maxlength="50" required>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="editDesc">Description:</label>
                        <textarea name="editDesc" id="editDesc" rows="5" class="form-control mt-3"
                            placeholder="Enter Description"></textarea>
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

<div class="modal fade modal-lg" id="addSectionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add Library Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addSectionForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <div>
                        <label for="file">Section Image: ( jpg, jpeg, png )</label>
                        <input type="file" name="file" class="form-control mt-2" accept=".jpg, .jpeg, .png" required>
                    </div>
                    <div class="mt-2">
                        <label for="sectionTitle">Section Title: </label>
                        <input type="text" class="form-control mt-2" name="sectionTitle" id="sectionTitle"
                            placeholder="Enter Section Title" required>
                    </div>
                    <div>
                        <label class="ms-1 mt-2 mb-3" for="sectionTxt">Context:</label>
                        <textarea name="sectionTxt" id="sectionTxt" placeholder="Enter Section Text"></textarea>
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

<div class="modal fade modal-lg" id="editSectionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add Library Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editSectionForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <input type="hidden" id="editSectionId" name="editSectionId">
                    <div>
                        <img src="" alt="" id="editSectionImgPrev" class="w-100 object-fit-contain"
                            style="max-height: 300px;">
                    </div>
                    <div class="d-flex align-items-center gap-3 mt-3">
                        <div class="w-100">
                            <label for="editSectionImg">Update Image: ( jpg, jpeg, png )</label>
                            <input type="file" name="editSectionImg" id="editSectionImg" class="form-control mt-2"
                                accept=".jpg, .jpeg, .png">
                        </div>
                        <div class="w-100">
                            <label for="editSectionTitle">Section Title: </label>
                            <input type="text" class="form-control mt-2" name="editSectionTitle" id="editSectionTitle"
                                placeholder="Enter Section Title" required>
                        </div>
                    </div>
                    <div>
                        <label class="ms-1 mt-2 mb-3" for="editSectionTxt">Context:</label>
                        <textarea name="editSectionTxt" id="editSectionTxt" placeholder="Enter Section Text"></textarea>
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

<div class="modal fade modal-lg" id="addAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addAccountForm">
                <div class="modal-body d-flex flex-column gap-3">
                    <div>
                        <img src="" alt="Image Preview" id="accountImgPrev" class="w-100 object-fit-contain"
                            style="max-height: 300px;">
                    </div>

                    <div class="d-flex flex-column flex-lg-row align-items-center gap-3">
                        <div class="w-100">
                            <label for="accountImg">Profile Picture: ( jpg, jpeg, png )</label>
                            <input type="file" name="accountImg" id="accountImg" class="form-control mt-2"
                                accept=".jpg, .jpeg, .png">
                        </div>

                    </div>
                    <div class="input-group">
                        <label class="input-group-text" for="accountEmail">Email</label>
                        <input type="email" name="accountEmail" id="accountEmail" class="form-control"
                            placeholder="Enter Email" maxlength="50" required>
                    </div>
                    <div class="d-flex flex-column flex-lg-row align-items-center gap-3">
                        <div class="input-group">
                            <label class="input-group-text" for="accountUsername">Username</label>
                            <input type="text" name="accountUsername" id="accountUsername" class="form-control"
                                placeholder="Enter Username" maxlength="50" required>
                        </div>
                        <div class="input-group position-relative">
                            <label class="input-group-text" for="accountPword">Password</label>
                            <input type="password" name="accountPword" id="accountPword" class="form-control"
                                placeholder="Enter Password" maxlength="50" required>
                            <div class="border d-flex justify-content-between align-items-center p-2 rounded-end-3">
                                <span class="material-symbols-outlined" role="button" id="seePass">
                                    visibility
                                </span>
                                <span class="material-symbols-outlined" style="display: none;" id="unseePass"
                                    role="button">
                                    visibility_off
                                </span>
                            </div>
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

<div class="modal fade modal-lg" id="editAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Add Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editAccountForm">
                <div class="modal-body d-flex flex-column gap-3">
                    <input type="hidden" name="editAccountId" id="editAccountId">
                    <div>
                        <img src="" alt="Image Preview" id="editAccountImgPrev" class="w-100 object-fit-contain"
                            style="max-height: 300px;">
                    </div>

                    <div class="d-flex flex-column flex-lg-row align-items-center gap-3">
                        <div class="w-100">
                            <label for="editAccountImg">Update Profile Picture: ( jpg, jpeg, png )</label>
                            <input type="file" name="editAccountImg" id="editAccountImg" class="form-control mt-2"
                                accept=".jpg, .jpeg, .png">
                        </div>

                    </div>

                    <div class="d-flex flex-column flex-lg-row align-items-center gap-3">
                        <div class="input-group">
                            <label class="input-group-text" for="editAccountEmail">Email</label>
                            <input type="email" name="editAccountEmail" id="editAccountEmail" class="form-control"
                                placeholder="Enter Email" maxlength="50" required>
                        </div>
                        <div class="input-group">
                            <label class="input-group-text" for="editAccountUsername">Username</label>
                            <input type="text" name="editAccountUsername" id="editAccountUsername" class="form-control"
                                placeholder="Enter Username" maxlength="50" required>
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
<div class="modal fade" id="addObjectivesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Objectives</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addObjectivesForm">
                <div class="modal-body d-flex flex-column gap-2">

                    <div class="mb-3">
                        <label for="objectiveIcon">Select Icon:</label>
                        <div class="input-group mt-2">
                            <input type="text" id="objectiveIcon" name="objectiveIcon" list="iconList"
                                class="form-control" placeholder="Choose an icon..." required />
                            <datalist id="iconList"></datalist>
                            <label class="input-group-text" for="objectiveIcon">
                                <div class="mt-2 text-center" id="iconPreview" style="display: none;">
                                    <span id="selectedIcon" class="material-symbols-outlined"></span>
                                </div>
                            </label>
                        </div>
                    </div>
                    <small id="addIconFeedback" class="text-danger d-block mt-1" style="display:none;"></small>
                    <div>
                        <label for="objectiveText">Objective Text</label>
                        <textarea class="form-control mt-2" id="objectiveText" name="objectiveText" rows="3"
                            placeholder="Enter objective details..." required></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editObjectiveModal" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Objectives</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editObjectiveForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <label for="editObjectiveId"></label>
                    <input type="hidden" id="editObjectiveId" name="editObjectiveId">
                    <div class="mb-3">
                        <label for="editObjectiveIcon">Select Icon:</label>
                        <div class="input-group mt-2">
                            <input type="text" id="editObjectiveIcon" name="editObjectiveIcon" list="iconList"
                                class="form-control" placeholder="Choose an icon..." required />
                            <datalist id="iconList"></datalist>
                            <label class="input-group-text" for="editObjectiveIcon">
                                <div class="mt-2 text-center" id="editSelectedIcon">

                                </div>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label for="editObjectiveText">Objective Text</label>
                        <textarea class="form-control mt-2" id="editObjectiveText" name="editObjectiveText"
                            required></textarea>
                    </div>

                </div>
                <div class="Modal-footer d-flex justify-content-end gap-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addLibraryHoursModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Library Hours</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addLibraryHoursForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <div>
                        <label for="semesterName">Semester Name: </label>
                        <input type="text" name="semesterName" id="semesterName" placeholder="Enter Semester Name"
                            class="form-control mt-2" required maxlength="50">
                    </div>
                    <label for="" class="mt-3">Semester Date: </label>
                    <div class="d-flex gap-3 align-items-center mt-1">
                        <div class="input-group">
                            <label class="input-group-text" for="semesterDateStart">Start</label>
                            <input type="time" name="semesterDateStart" id="semesterDateStart" class="form-control"
                                required>
                        </div>
                        <div class="input-group">
                            <label class="input-group-text" for="semesterDateEnd">End</label>
                            <input type="time" name="semesterDateEnd" id="semesterDateEnd" class="form-control"
                                required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editLibraryHoursModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Library Hours</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editLibraryHoursForm">
                <div class="modal-body d-flex flex-column gap-2">
                    <input type="hidden" name="editSemesterId" id="editSemesterId">
                    <div>
                        <label for="editSemesterName">Semester Name: </label>
                        <input type="text" name="editSemesterName" id="editSemesterName"
                            placeholder="Enter Semester Name" class="form-control mt-2" required maxlength="50">
                    </div>
                    <label for="" class="mt-3">Semester Date: </label>
                    <div class="d-flex gap-3 align-items-center mt-1">
                        <div class="input-group">
                            <label class="input-group-text" for="editSemesterDateStart">Start</label>
                            <input type="time" name="editSemesterDateStart" id="editSemesterDateStart"
                                class="form-control" required>
                        </div>
                        <div class="input-group">
                            <label class="input-group-text" for="editSemesterDateEnd">End</label>
                            <input type="time" name="editSemesterDateEnd" id="editSemesterDateEnd" class="form-control"
                                required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"> Update </button>
                </div>
            </form>
        </div>
    </div>
</div>