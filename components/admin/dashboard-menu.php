<style>
    <?php
    switch ($page) {
        case 'dashboard':
            echo ".menu-links:nth-child(1) {background-color: #66c28e;color: white;}";
            break;
        case 'library-news':
            echo ".menu-links:nth-child(2) {background-color: #66c28e;color: white;}";
            break;
        case 'feedbacks':
            echo ".menu-links:nth-child(3) {background-color: #66c28e;color: white;}";
            break;
        default:
            # code...
            break;
    }
    ?>
</style>
<div class=" vh-100 position-sticky top-0 z-2">
    <div class="p-0 p-4 d-flex flex-column border h-100">

        <div class="d-flex align-items-center justify-content-center gap-3 mt-3 position-relative">
            <img src="/assets/img/logo.png" class="object-fit-contain" width="50px" height="50px" alt="">
            <div
                class="navText w-100 d-flex justify-content-between align-items-center d-flex align-items-center justify-content-between w-100">
                <h1 class="p-0 m-0 fs-5">Alijis Campus Library</h1>
            </div>
            <span id="open-menu"
                class="openCloseMenu material-symbols-outlined position-absolute z-5 bg-success text-light rounded-2 text-center"
                style="right: -40;" role="button">
                chevron_right
            </span>
            <span id="close-menu"
                class="openCloseMenu material-symbols-outlined position-absolute z-5 bg-success text-light rounded-2 text-center"
                style="right: -40;" role="button">
                chevron_left
            </span>
        </div>
        <div class="d-flex flex-column flex-grow-1 justify-content-between mt-5">
            <div class="d-flex flex-column gap-2">
                <a href="/dashboard" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2">
                    <span class="material-symbols-outlined menu-icon">
                        dashboard
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="fs-6 p-0 m-0">Dashboard </h1>
                        <div class=" d-flex align-items-center gap-3">
                            <h1 class="p-0 m-0 fs-5"></h1>
                            <span class=" material-symbols-outlined">
                                arrow_forward_ios
                            </span>
                        </div>
                    </div>
                </a>
                <a href="library-news" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2">
                    <span class="material-symbols-outlined">
                        newspaper
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="fs-6 p-0 m-0">Library News</h1>
                        <div class=" d-flex align-items-center gap-3">
                            <h1 class="p-0 m-0 fs-5"></h1>
                            <span class=" material-symbols-outlined">
                                arrow_forward_ios
                            </span>
                        </div>
                    </div>
                </a>
                <a href="/feedbacks" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2">
                    <span class="material-symbols-outlined">
                        chat
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="fs-6 p-0 m-0">Feedbacks</h1>
                        <div class=" d-flex align-items-center gap-3">
                            <h1 class="p-0 m-0 fs-5"></h1>
                            <span class=" material-symbols-outlined">
                                arrow_forward_ios
                            </span>
                        </div>
                    </div>
                </a>
                <a href="" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2">
                    <span class="material-symbols-outlined">
                        download
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="fs-6 p-0 m-0">Downloadable Forms </h1>
                        <div class=" d-flex align-items-center gap-3">
                            <h1 class="p-0 m-0 fs-5"></h1>
                            <span class=" material-symbols-outlined">
                                arrow_forward_ios
                            </span>
                        </div>
                    </div>
                </a>
                <a href="" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2">
                    <span class="material-symbols-outlined">
                        gallery_thumbnail
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="fs-6 p-0 m-0">Library Gallery </h1>
                        <div class=" d-flex align-items-center gap-3">
                            <h1 class="p-0 m-0 fs-5"></h1>
                            <span class=" material-symbols-outlined">
                                arrow_forward_ios
                            </span>
                        </div>
                    </div>
                </a>
                <a href="" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2">
                    <span class="material-symbols-outlined">
                        groups
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="fs-6 p-0 m-0">Account Logs</h1>
                        <div class=" d-flex align-items-center gap-3">
                            <h1 class="p-0 m-0 fs-5"></h1>
                            <span class=" material-symbols-outlined">
                                arrow_forward_ios
                            </span>
                        </div>
                    </div>
                </a>

                <a href="" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2">
                    <span class="material-symbols-outlined">
                        settings
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="fs-6 p-0 m-0">Settings</h1>
                        <div class=" d-flex align-items-center gap-3">
                            <h1 class="p-0 m-0 fs-5"></h1>
                            <span class=" material-symbols-outlined">
                                arrow_forward_ios
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="d-flex flex-column gap-4">
                <a href="" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2" id="logout">
                    <span class="material-symbols-outlined menu-icon">
                        logout
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="fs-6 p-0 m-0">Logout</h1>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>