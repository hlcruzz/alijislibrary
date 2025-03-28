<style>
    <?php switch ($page) {
        case 'dashboard':
            echo ".menu-links:nth-child(1) {background-color: #66c28e;color: white;}";
            break;
        case 'library-news':
            echo ".menu-links:nth-child(2) {background-color: #66c28e;color: white;}";
            break;
        case 'feedbacks':
            echo ".menu-links:nth-child(3) {background-color: #66c28e;color: white;}";
            break;
        case 'downloadble':
            echo ".menu-links:nth-child(4) {background-color: #66c28e;color: white;}";
            break;
        case 'settings-foundation':
            echo ".settings-links:nth-child(1) {background-color: #66c28e;color: white;}";
            break;
        case 'settings-guidelines':
            echo ".settings-links:nth-child(2) {background-color: #66c28e;color: white;}";
            break;
        case 'settings-faq':
            echo ".settings-links:nth-child(3) {background-color: #66c28e;color: white;}";
            break;
        default:
    }

    ?>
</style>
<div class="vh-100 position-sticky top-0 start-0 z-2 w-auto" id="admin-menu">
    <div class="p-0 p-4 d-flex flex-column h-100">
        <div class="d-flex align-items-center justify-content-center gap-3 mt-3">
            <img src="/assets/img/logo.png" class="object-fit-contain" width="50px" height="50px" alt="">
            <div
                class="navText w-100 d-flex justify-content-between align-items-center d-flex align-items-center justify-content-between w-100">
                <h1 class="p-0 m-0 fs-6">Alijis Campus Library</h1>
            </div>

        </div>
        <div class="d-flex flex-column flex-grow-1 justify-content-between mt-5 overflow-auto">
            <div class="d-flex flex-column gap-2">
                <a href="/admin-dashboard" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2">
                    <span class="material-symbols-outlined menu-icon">
                        dashboard
                    </span>
                    <div class="navText w-100 d-flex justify-content-between align-items-center">
                        <h1 class="p-0 m-0" style="font-size: small"">Dashboard </h1>
                        <div class=" d-flex align-items-center gap-3">
                            <h1 class="p-0 m-0 fs-5"></h1>
                    </div>
            </div>
            </a>
            <a href="/admin-library-news" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2">
                <span class="material-symbols-outlined">
                    newspaper
                </span>
                <div class="navText w-100 d-flex justify-content-between align-items-center">
                    <h1 class="p-0 m-0" style="font-size: small"">Library News</h1>
                        <div class=" d-flex align-items-center gap-3">
                        <h1 class="p-0 m-0 fs-5"></h1>
                </div>
        </div>
        </a>
        <a href="/admin-feedbacks" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2">
            <span class="material-symbols-outlined">
                chat
            </span>
            <div class="navText w-100 d-flex justify-content-between align-items-center">
                <h1 class="p-0 m-0" style="font-size: small"">Feedbacks</h1>
                <div class=" d-flex align-items-center gap-3">
                    <h1 class="p-0 m-0 fs-5"></h1>
            </div>
    </div>
    </a>
    <a href="/admin-downloadables" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2">
        <span class="material-symbols-outlined">
            download
        </span>
        <div class="navText w-100 d-flex justify-content-between align-items-center">
            <h1 class="p-0 m-0" style="font-size: small"">Downloadable Forms </h1>
                    <div class=" d-flex align-items-center gap-3">
                <h1 class="p-0 m-0 fs-5"></h1>
        </div>
</div>
</a>
<a href="" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2">
    <span class="material-symbols-outlined">
        gallery_thumbnail
    </span>
    <div class="navText w-100 d-flex justify-content-between align-items-center">
        <h1 class="p-0 m-0" style="font-size: small"">Library Gallery </h1>
                                    <div class=" d-flex align-items-center gap-3">
            <h1 class="p-0 m-0 fs-5"></h1>

    </div>
    </div>
</a>
<a href="" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2">
    <span class="material-symbols-outlined">
        groups
    </span>
    <div class="navText w-100 d-flex justify-content-between align-items-center">
        <h1 class="p-0 m-0" style="font-size: small"">Account Logs</h1>
                                    <div class=" d-flex align-items-center gap-3">
            <h1 class="p-0 m-0 fs-5"></h1>

    </div>
    </div>
</a>

<a class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2" id="settings">
    <span class="material-symbols-outlined">
        settings
    </span>
    <div class="navText w-100 d-flex justify-content-between align-items-center">
        <h1 class="p-0 m-0" style="font-size: small"">Settings</h1>
                                    <div class=" d-flex align-items-center gap-3">
            <h1 class="p-0 m-0 fs-5"></h1>
            <span class="material-symbols-outlined fs-5" id="settingsArrow">
                arrow_forward_ios
            </span>
    </div>
    </div>
</a>
<div class="overflow-hidden d-flex flex-column gap-2" style="max-height: 0; transition: max-height 1s ease;"
    id="settingsNav">
    <a href="/admin-settings-foundation"
        class="settings-links p-3 text-decoration-none d-flex align-items-center gap-2">
        <span class="material-symbols-outlined">
            handshake
        </span>
        <div class="navText w-100 d-flex justify-content-between align-items-center">
            <h1 class="p-0 m-0" style="font-size: small"">Foundation</h1>
                                    <div class=" d-flex align-items-center gap-3">
                <h1 class="p-0 m-0 fs-5"></h1>
        </div>
</div>
</a>
<a href="/admin-settings-guidelines" class="settings-links p-3 text-decoration-none d-flex align-items-center gap-2">
    <span class="material-symbols-outlined">
        warning
    </span>
    <div class="navText w-100 d-flex justify-content-between align-items-center">
        <h1 class="p-0 m-0" style="font-size: small"">Guidlines</h1>
                                    <div class=" d-flex align-items-center gap-3">
            <h1 class="p-0 m-0 fs-5"></h1>
    </div>
    </div>
</a>
<a href="/admin-settings-faq" class="settings-links p-3 text-decoration-none d-flex align-items-center gap-2">
    <span class="material-symbols-outlined">
        quiz
    </span>
    <div class="navText w-100 d-flex justify-content-between align-items-center">
        <h1 class="p-0 m-0" style="font-size: small"">FAQ</h1>
                                    <div class=" d-flex align-items-center gap-3">
            <h1 class="p-0 m-0 fs-5"></h1>
    </div>
    </div>
</a>
<a href="" class="settings-links p-3 text-decoration-none d-flex align-items-center gap-2">
    <span class="material-symbols-outlined">
        info
    </span>
    <div class="navText w-100 d-flex justify-content-between align-items-center">
        <h1 class="p-0 m-0" style="font-size: small"">General Information</h1>
                                    <div class=" d-flex align-items-center gap-3">
            <h1 class="p-0 m-0 fs-5"></h1>
    </div>
    </div>
</a>
</div>


</div>
<div class="d-flex flex-column gap-4">
    <a href="" class="menu-links p-3 text-decoration-none d-flex align-items-center gap-2" id="logout">
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