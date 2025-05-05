<style>
<?php switch ($page) {
    case 'dashboard': echo ".menu-links:nth-child(1) {background-color: #66c28e;color: white;}";
    break;
    case 'library-news': echo ".menu-links:nth-child(2) {background-color: #66c28e;color: white;}";
    break;
    case 'feedbacks': echo ".menu-links:nth-child(3) {background-color: #66c28e;color: white;}";
    break;
    case 'admin-tools-and-resources': echo ".menu-links:nth-child(4) {background-color: #66c28e;color: white;}";
    break;
    case 'admin-gallery': echo ".menu-links:nth-child(5) {background-color: #66c28e;color: white;}";
    break;
    case 'admin-services': echo ".menu-links:nth-child(6) {background-color: #66c28e;color: white;}";
    break;
    case 'admin-periodicals': echo ".menu-links:nth-child(7) {background-color: #66c28e;color: white;}";
    break;
    case 'admin-sections': echo ".menu-links:nth-child(8) {background-color: #66c28e;color: white;}";
    break;
    case 'admin-about-us': echo ".settings-links:nth-child(1) {background-color: #66c28e;color: white;}";
    break;
    case 'admin-contacts': echo ".settings-links:nth-child(2) {background-color: #66c28e;color: white;}";
    break;
    case 'admin-personnel': echo ".settings-links:nth-child(3) {background-color: #66c28e;color: white;}";
    break;
    case 'settings-archive': echo ".settings-links:nth-child(5) {background-color: #66c28e;color: white;}";
    break;
    default:
}

?>
</style>
<div class="vh-100 position-sticky top-0 start-0 w-auto" id="admin-menu" style="z-index: 1000;">
    <div class="p-0 px-4 py-4 d-flex flex-column h-100">
        <div class="d-flex align-items-center justify-content-center gap-3">
            <img src="/assets/img/logo.png" class="object-fit-contain" width="50px" height="50px" alt="">
            <div
                class="navText w-100 d-flex justify-content-between align-items-center d-flex align-items-center justify-content-between w-100">
                <h1 class="p-0 m-0 fs-6">Alijis Campus Library</h1>
            </div>

        </div>
        <div class="d-flex flex-column flex-grow-1 justify-content-between mt-4 overflow-auto ms-2"
            style="scrollbar-gutter: stable; scrollbar-width: thin;">
            <div class="d-flex flex-column gap-2">
                <a href="/admin-dashboard" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2"
                    title="Dashboard">
                    <span class="material-symbols-outlined menu-icon">
                        dashboard
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="p-0 m-0" style="font-size: small">Dashboard </h1>
                        <div class=" d-flex align-items-center gap-3">
                            <small class="p-0 m-0"></small>
                        </div>
                    </div>
                </a>
                <a href="/admin-library-news"
                    class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2" title="Library News">
                    <span class="material-symbols-outlined">
                        newspaper
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="p-0 m-0" style="font-size: small">Library News</h1>
                        <div class=" d-flex align-items-center gap-3">
                            <small class="p-0 m-0"></small>
                        </div>
                    </div>
                </a>
                <a href="/admin-feedbacks" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2"
                    title="Library Feedbacks">
                    <span class="material-symbols-outlined">
                        chat
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="p-0 m-0" style="font-size: small">User Feedbacks</h1>
                        <div class=" d-flex align-items-center gap-3">
                            <small class="p-0 m-0"></small>
                        </div>
                    </div>
                </a>

                <a href="/admin-tools-and-resources"
                    class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2"
                    title="Tools and Resources">
                    <span class="material-symbols-outlined">
                        home_repair_service
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="p-0 m-0" style="font-size: small">Tools & Resources </h1>
                        <div class=" d-flex align-items-center gap-3">
                            <small class="p-0 m-0"></small>
                        </div>
                    </div>
                </a>

                <a href="/admin-gallery" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2"
                    title="Library Gallery">
                    <span class="material-symbols-outlined">
                        gallery_thumbnail
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="p-0 m-0" style="font-size: small">Gallery </h1>
                        <div class=" d-flex align-items-center gap-3">
                            <small class="p-0 m-0"></small>

                        </div>
                    </div>
                </a>

                <a href="/admin-services" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2"
                    title="Services">
                    <span class="material-symbols-outlined">
                        local_library
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="p-0 m-0" style="font-size: small">Services</h1>
                        <div class=" d-flex align-items-center gap-3">
                            <small class="p-0 m-0"></small>

                        </div>
                    </div>
                </a>
                <a href="/admin-periodicals" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2"
                    title="Periodicals">
                    <span class="material-symbols-outlined">
                        newsstand
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="p-0 m-0" style="font-size: small">New Arrival: Periodicals</h1>
                        <div class=" d-flex align-items-center gap-3">
                            <small class="p-0 m-0"></small>
                        </div>
                    </div>
                </a>

                <a href="/admin-sections" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2"
                    title="Periodicals">
                    <span class="material-symbols-outlined">
                        tile_large
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="p-0 m-0" style="font-size: small">Library Sections</h1>
                        <div class=" d-flex align-items-center gap-3">
                            <small class="p-0 m-0"></small>
                        </div>
                    </div>
                </a>
                <a href="/admin-activity-logs"
                    class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2" title="Activity Logs">
                    <span class="material-symbols-outlined">
                        groups
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="p-0 m-0" style="font-size: small">Activity Logs</h1>
                        <div class=" d-flex align-items-center gap-3">
                            <small class="p-0 m-0"></small>

                        </div>
                    </div>
                </a>

                <a class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2" id="settings"
                    title="Settings">
                    <span class="material-symbols-outlined">
                        layers
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="p-0 m-0" style="font-size: small">Additional Pages</h1>
                        <div class=" d-flex align-items-center gap-3">
                            <small class="p-0 m-0"></small>
                            <span class="material-symbols-outlined fs-5" id="settingsArrow">
                                arrow_forward_ios
                            </span>
                        </div>
                    </div>
                </a>
                <div class="overflow-hidden d-flex flex-column gap-2"
                    style="max-height: 0; transition: max-height 1s ease;" id="settingsNav">
                    <a href="/admin-about-us"
                        class="settings-links p-3 text-decoration-none d-flex align-items-center gap-2"
                        title="About Us">
                        <span class="material-symbols-outlined">
                            info
                        </span>
                        <div class="navText w-100 d-flex justify-content-between align-items-center">
                            <h1 class="p-0 m-0" style="font-size: small">About Us</h1>
                            <div class=" d-flex align-items-center gap-3">
                                <small class="p-0 m-0"></small>
                            </div>
                        </div>
                    </a>
                    <a href="/admin-contacts"
                        class="settings-links p-3 text-decoration-none d-flex align-items-center gap-2"
                        title="Contacts">
                        <span class="material-symbols-outlined">
                            contact_page
                        </span>
                        <div class="navText w-100 d-flex justify-content-between align-items-center">
                            <h1 class="p-0 m-0" style="font-size: small">Contacts</h1>
                            <div class=" d-flex align-items-center gap-3">
                                <small class="p-0 m-0"></small>
                            </div>
                        </div>
                    </a>
                    <a href="/admin-personnel"
                        class="settings-links p-3 text-decoration-none d-flex align-items-center gap-2"
                        title="Personnel">
                        <span class="material-symbols-outlined">
                            engineering
                        </span>
                        <div class="navText w-100 d-flex justify-content-between align-items-center">
                            <h1 class="p-0 m-0" style="font-size: small">Personnel</h1>
                            <div class=" d-flex align-items-center gap-3">
                                <small class="p-0 m-0"></small>
                            </div>
                        </div>
                    </a>
                    <a href="/admin-settings-archive"
                        class="settings-links p-3 text-decoration-none d-flex align-items-center gap-2" title="Archive">
                        <span class="material-symbols-outlined">
                            archive
                        </span>
                        <div class="navText w-100 d-flex justify-content-between align-items-center">
                            <h1 class="p-0 m-0" style="font-size: small">Archive</h1>
                            <div class=" d-flex align-items-center gap-3">
                                <small class="p-0 m-0"></small>
                            </div>
                        </div>
                    </a>
                </div>


            </div>
            <div class="d-flex flex-column gap-4 mt-2">
                <a href="" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2" id="logout"
                    title="Logout">
                    <span class="material-symbols-outlined menu-icon">
                        logout
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="p-0 m-0" style="font-size: small">Logout</h1>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>