<div class="container-fluid border border-start-0 p-3 position-sticky top-0 z-1" id="upbar">
    <div class="d-flex justify-content-between align-items-center gap-4">
        <h1 class="fs-5 ms-4 p-0 m-0">Admin Dashboard</h1>
        <div class="d-flex align-items-center gap-4 position-relative">
            <div class="position-relative" style="height: max-content;">
                <span class="material-symbols-outlined fs-2" role="button" id="notif-icon">
                    notifications
                </span>
                <small class="position-absolute text-light border border-danger text-center bg-danger"
                    style="right:-5;bottom:-10; min-width: 20px; border-radius: 50%; font-size: smaller;"
                    id="totalIsReadFeedbacks">
                </small>
            </div>
            <div class="position-absolute end-0 bg-light" style="top: 52;">
                <div class="overflow-auto" style="max-height: 0;" id="notif-cont">
                    <table class="table table-borderless table-hover m-0">
                        <thead class="position-sticky top-0 z-3">
                            <tr>
                                <th colspan="3">
                                    <div class="ps-3 pe-2 d-flex align-items-center justify-content-between">
                                        <h1 class="p-0 m-0 fs-5">Notifications</h1>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3">
                                    <div class="ps-3 pe-2 d-flex align-items-center justify-content-between">
                                        <h1 class="p-0 m-0 fs-6 fw-light">Uploaded by</h1>
                                        <a href="./feedbacks.php"
                                            class="text-decoration-none fw-semibold text-success p-0 m-0 fs-6">View
                                            all</a>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tbody-notification">



                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center m-3">
                        <div class="d-flex align-items-center gap-3 w-100" id="load-cont">
                            <hr class="border w-50">
                            <button type="button" id="loadNotif" class="btn btn-success"
                                style="white-space: nowrap;">Load
                                more</button>
                            <hr class="border w-50">
                        </div>
                        <div class="spinner-border d-none" role="status" id="loading-icon">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="" style=" height: max-content; width: max-content;">
                <div class="admin-cont text-decoration-none d-flex align-items-center gap-2"
                    style=" width: max-content; white-space: nowrap;">
                    <img src="/assets/img/librarian1.png" class="object-fit-cover" style="border-radius: 50%;"
                        width="40px" height="40px" alt="">
                    <div class="">
                        <h1 class="p-0 m-0 fs-6">Harold Cruz</h1>
                        <small class="fw-light">Administrator</small>
                    </div>
                </div>
            </div>
            <div class="switch-cont position-relative ">
                <input type="checkbox" name="" id="theme-input">
                <label for="theme-input" class="theme-switch">
                    <span class="material-symbols-outlined" style="font-size: 20px;">
                        contrast
                    </span>
                </label>
            </div>
        </div>
    </div>
</div>