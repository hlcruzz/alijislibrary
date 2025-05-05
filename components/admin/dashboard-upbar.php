<div class="container-fluid border border-start-0 p-3 position-sticky top-0" style="z-index: 999;" id="upbar">
    <div class="d-flex justify-content-between align-items-center gap-4">
        <div class="d-flex">

            <i class="fa-solid fa-bars openCloseMenu material-symbols-outlined  rounded-2 text-center" id="open-menu"
                role="button"></i>

            <i class="fa-solid fa-bars openCloseMenu material-symbols-outlined  rounded-2 text-center" id="close-menu"
                role="button" style="display: none;"></i>
            <h1 class="fs-5 ms-4 p-0 m-0">Admin Dashboard</h1>
        </div>

        <div class="d-flex align-items-center gap-4 position-relative">
            <div class="position-relative px-2" style="height: max-content;">
                <span class="material-symbols-outlined fs-2" role="button" id="notif-icon">
                    notifications
                </span>
                <span
                    class="badge rounded-circle position-absolute text-light border border-danger text-center bg-danger"
                    style="right:-5px;bottom:-5px; font-size: smaller;" id="totalIsReadFeedbacks">
                </span>
            </div>
            <div class="position-fixed end-0 z-5" style="top: 70px;">
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
                                        <a href="/admin-feedbacks"
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
                <a href="/admin-profile" class="admin-cont text-decoration-none d-flex align-items-center gap-2 "
                    style=" width: max-content; white-space: nowrap;">
                    <div class="position-relative">
                        <img src="" class="object-fit-cover" style="border-radius: 50%;" width="40px" height="40px"
                            alt="" id="upbarImg">
                        <i class="fa-solid fa-circle position-absolute bottom-0 end-0"
                            style="font-size: 10px; color: #13bc27;"></i>
                    </div>
                    <div class="" id="upbarProfile">
                        <h1 class="p-0 m-0 fs-6" id="upbarUsername"></h1>
                        <small class="fw-light" id="upbarEmail"></small>
                    </div>

                </a>
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