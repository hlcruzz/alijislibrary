<?php if (!empty($page)) { ?>
<style>
<?php switch ($page) {
    case "index": echo ".links:nth-child(1)::before {width: 100%;}";
    break;
    case "about": echo ".links:nth-child(2)::before {width: 100%;}";
    break;
    case "programs": echo ".links:nth-child(3)::before {width: 100%;}";
    break;
    case "services": echo ".links:nth-child(4)::before {width: 100%;}";
    break;
    case "contacts": echo ".links:nth-child(5)::before {width: 100%;}";
    break;
    default:
        echo null;
}

?>
</style>
<?php } ?>
<!-- Navigation Bar -->
<div class="container-fluid nav-container position-sticky top-0 bg-white" style="z-index: 10">
    <!-- Desktop Nav -->
    <div class="container-lg d-none d-lg-block p-3">
        <div class="d-flex align-items-center row-cols-2">
            <div class="d-flex align-items-center gap-3 col-6">
                <img src="assets/img/logo.png" style="width: 50px" alt="" />
                <div class="dflex flex-column">
                    <h1 class="m-0 fs-5">Alijis Campus Library</h1>
                    <p class="m-0 text-success" style="font-size: smaller;">Learning Resource Center</p>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center col-6" style="white-space: nowrap;">
                <a class="links text-decoration-none text-dark fw-medium fs-6" href="/">Home</a>
                <a class="links text-decoration-none text-dark fw-medium fs-6" href="/about">About Us</a>
                <a class="links text-decoration-none text-dark fw-medium fs-6" href="/program">Programs</a>
                <a class="links text-decoration-none text-dark fw-medium fs-6" href="/services">Services</a>
                <a class="links text-decoration-none text-dark fw-medium fs-6" href="/contacts">Contacts</a>
            </div>
        </div>
    </div>
    <!-- Mobile Nav -->
    <div class="d-lg-none d-flex justify-content-between align-items-center p-3">
        <div class="">
            <img src="assets/img/logo.png" style="width: 50px" alt="" />
        </div>
        <span class="material-symbols-outlined p-0 rounded-1" id="menu" style="font-size: 30px" role="button"> menu
        </span>
        <div class="container-fluid bg-dark position-fixed z-2 p-3 pt-5 overflow-hidden"
            style="top: 0; left: 0; display: none; height: 0; transition: 0.5s ease" id="mobile-links">
            <span class="material-symbols-outlined position-absolute end-0 me-4 fw-lighter" role="button"
                style="font-size: 50px" id="m-x"> close </span>
            <div class="container-lg text-white mt-5 pt-3">
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <img src="assets/img/logo.png" width="50px" alt="" srcset="" />
                    <h1 class="m-0 p-0 fs-2">Alijis Campus Library</h1>
                </div>
                <div class="container-lg">
                    <div class="d-flex flex-column gap-3 mt-5 ms-3">
                        <a class="m-link text-decoration-none fs-5 d-flex align-items-center" href="/">Home
                            <span class="material-symbols-outlined" style="font-size: 35px"> chevron_right </span></a>
                        <a class="m-link text-decoration-none fs-5 d-flex align-items-center" href="/about">About Us
                            <span class="material-symbols-outlined" style="font-size: 35px"> chevron_right </span></a>
                        <a class="m-link text-decoration-none fs-5 d-flex align-items-center" href="/program">Programs
                            <span class="material-symbols-outlined" style="font-size: 35px">
                                chevron_right </span></a>
                        <a class="m-link text-decoration-none fs-5 d-flex align-items-center" href="/services">Services
                            <span class="material-symbols-outlined" style="font-size: 35px"> chevron_right </span></a>
                        <a class="m-link text-decoration-none fs-5 d-flex align-items-center" href="/contacts">Contacts
                            <span class="material-symbols-outlined" style="font-size: 35px"> chevron_right </span></a>
                    </div>
                </div>
                <div class="contaier-lg">
                    <div class="mt-5 ms-3">
                        <div class="d-flex justify-content-center align-items-center gap-4 mt-5">
                            <a href="https://www.facebook.com/LIBRARYALIJIS/" target="_blank" class="text-white"><i
                                    class="m-icons fa-brands fa-facebook-f fs-3"></i></a>
                            <a href="https://www.youtube.com/@chmsualijislibrary4548" target="_blank"
                                class="text-white"><i class=" m-icons fa-brands fa-youtube fs-3"></i></a>
                            <a href="https://x.com/chmsu_library" target="_blank" class="text-white"><i
                                    class="m-icons fa-brands fa-x-twitter fs-3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>