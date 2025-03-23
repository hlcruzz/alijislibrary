<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alijis Campus Library</title>
    <link rel="stylesheet" href="assets/css/index.css" />
    <?php include "./components/links.php" ?>
</head>
<?php $page = "index"; ?>

<body class="overflow-x-hidden">
    <?php include "./components/navbar.php" ?>

    <div class="container-fluid p-0">
        <div class="container-lg d-flex justify-content-between pb-5" style="min-height: 90vh" id="home">
            <div class="d-flex align-items-center align-items-lg-start d-lg-flex flex-column w-100 w-lg-auto">
                <div class="flex-grow-1 d-flex justify-content-center flex-column w-lg-auto w-100 text-center text-lg-start align-items-center align-items-lg-start"
                    id="text-cont1">
                    <h1 class="fs-1">
                        WELCOME TO OUR <br />
                        ALIJIS CAMPUS LIBRARY
                    </h1>
                    <p class="fw-light">
                        We are delighted to have you visit our library, a place where <br />
                        knowledge, creativity, and curiosity thrive.
                    </p>
                    <div class="d-flex">
                        <a href="#home2" class="browse">BROWSE</a>
                        <a href="#home2" class="browse"><span class="material-symbols-outlined"> arrow_forward
                            </span></a>
                    </div>
                </div>
                <img src="assets/img/books1.png" class="w-75" alt="" />
            </div>
            <div class="w-55 d-none d-lg-flex align-items-end">
                <div class="d-flex align-items-end h-100">
                    <img src="assets/img/books2.png" style="width: 200px; position: relative; left: 100" alt="" />
                    <img src="assets/img/avatar.png" style="height: 90%" alt="" />
                </div>
            </div>
        </div>
        <div class="container-fluid pt-4 pb-4" id="home2">
            <div class="container-lg d-flex justify-content-between align-items-end gap-5">
                <img src="assets/img/books3.png" class="d-none d-xl-block" width="150px" alt="" />
                <div class="w-100">
                    <h1 class="text-center" id="whatsnew">What's New</h1>
                    <p class="text-center">Discover new books, updated collections, and features in our library. Explore
                        what's new today!</p>

                    <div class="row">
                        <div class="col-12 col-xl-6 col-md-6 p-3">
                            <a href="#hello" class="card-cont text-decoration-none">
                                <div class="card bg-white rounded-4 p-4">
                                    <img src="assets/img/aquired-books.png" class="rounded-3"
                                        style="height: 250px; object-fit: cover; width: 100%" alt="" />
                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <div class="card-txt d-flex gap-2">
                                            <span class="material-symbols-outlined"> calendar_month </span>
                                            <p>Feburary 6, 2025</p>
                                        </div>
                                        <div class="card-txt d-flex gap-2">
                                            <span class="material-symbols-outlined"> person </span>
                                            <p>Admin</p>
                                        </div>
                                    </div>
                                    <h1 class="fs-5 text-start text-dark">Newly Aquired Books</h1>
                                    <p class="read-more d-flex mt-3" href="">Read More <span
                                            class="material-symbols-outlined"> arrow_forward </span></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-xl-6 col-md-6 p-3">
                            <a href="#hello" class="card-cont text-decoration-none">
                                <div class="card bg-white rounded-4 p-4">
                                    <img src="assets/img/periodicals.jpg" class="rounded-3"
                                        style="height: 250px; object-fit: cover; width: 100%" alt="" />
                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <div class="card-txt d-flex gap-2">
                                            <span class="material-symbols-outlined"> calendar_month </span>
                                            <p>Feburary 6, 2025</p>
                                        </div>
                                        <div class="card-txt d-flex gap-2">
                                            <span class="material-symbols-outlined"> person </span>
                                            <p>Admin</p>
                                        </div>
                                    </div>
                                    <h1 class="fs-5 text-start text-dark">Newly Arrival: Periodicals</h1>
                                    <p class="read-more d-flex mt-3" href="">Read More <span
                                            class="material-symbols-outlined"> arrow_forward </span></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-xl-6 col-md-6 p-3">
                            <a href="#hello" class="card-cont text-decoration-none">
                                <div class="card bg-white rounded-4 p-4">
                                    <img src="assets/img/printing.jpg" class="rounded-3"
                                        style="height: 250px; object-fit: cover; width: 100%" alt="" />
                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <div class="card-txt d-flex gap-2">
                                            <span class="material-symbols-outlined"> calendar_month </span>
                                            <p>Feburary 6, 2025</p>
                                        </div>
                                        <div class="card-txt d-flex gap-2">
                                            <span class="material-symbols-outlined"> person </span>
                                            <p>Admin</p>
                                        </div>
                                    </div>
                                    <h1 class="fs-5 text-start text-dark">Document Scanning Services</h1>
                                    <p class="read-more d-flex mt-3" href="">Read More <span
                                            class="material-symbols-outlined"> arrow_forward </span></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-xl-6 col-md-6 p-3">
                            <a href="#hello" class="card-cont text-decoration-none">
                                <div class="card bg-white rounded-4 p-4">
                                    <img src="assets/img/learning-space.jpg" class="rounded-3"
                                        style="height: 250px; object-fit: cover; width: 100%" alt="" />
                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <div class="card-txt d-flex gap-2">
                                            <span class="material-symbols-outlined"> calendar_month </span>
                                            <p>Feburary 6, 2025</p>
                                        </div>
                                        <div class="card-txt d-flex gap-2">
                                            <span class="material-symbols-outlined"> person </span>
                                            <p>Admin</p>
                                        </div>
                                    </div>
                                    <h1 class="fs-5 text-start text-dark">Gallery of New Learning Spaces</h1>
                                    <p class="read-more d-flex mt-3" href="">Read More <span
                                            class="material-symbols-outlined"> arrow_forward </span></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <img src="assets/img/books4.png" class="d-none d-xl-block" width="200px" alt="" />
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-lg mt-5 mb-5">
                <div class="row">
                    <div class="col col-12 col-lg-7 pe-0 pe-lg-5">
                        <h1 class="fs-2">GRATIS ACCESS TO</h1>
                        <div class="home3-line">
                            <div class="shade"></div>
                        </div>
                        <div class="d-flex flex-column gap-3 mt-4">
                            <div class="d-flex flex-column flex-lg-row">
                                <div class="d-none d-lg-block w-100">
                                    <img src="assets/img/automotive.jpg"
                                        style="object-fit: cover; width: 100%; height: 400px" alt="" />
                                </div>
                                <div class="gratis-txt p-4 w-100">
                                    <h1 class="p-0 ps-4 fs-3">International Journal of Automotive Technology</h1>
                                    <p class="mt-5">A journal that publishes original research in automotive technology,
                                        engineering, and science.</p>
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-lg-row-reverse">
                                <div class="d-none d-lg-block w-100">
                                    <img src="assets/img/journal.jpg"
                                        style="object-fit: cover; width: 100%; height: 400px" alt="" />
                                </div>
                                <div class="gratis-txt p-4 w-100">
                                    <h1 class="p-0 ps-4 fs-3">Journal of Information Technology Education: Research
                                        (JITE: Research)</h1>
                                    <p class="mt-5">
                                        Publishes scholarly articles on the use of information technology in
                                        education.This includes using technology to enhance learning and to support
                                        teaching and
                                        teaching administration.
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-lg-row">
                                <div class="d-none d-lg-block w-100">
                                    <img src="assets/img/it-journal.jpg"
                                        style="object-fit: cover; width: 100%; height: 400px" alt="" />
                                </div>
                                <div class="gratis-txt p-4 w-100">
                                    <h1 class="p-0 ps-4 fs-3">Journal of Information Technology & Software Engineering
                                    </h1>
                                    <p class="mt-5">
                                        This is an operating system based on the Linux kernel. It was designed primarily
                                        for touch screen mobile devices, such as smart phones and tablet computers,
                                        with variants for television, cars and wrist wear.
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-lg-row-reverse">
                                <div class="d-none d-lg-block w-100">
                                    <img src="assets/img/journal2.jpg"
                                        style="object-fit: cover; width: 100%; height: 400px" alt="" />
                                </div>
                                <div class="gratis-txt p-4 w-100">
                                    <h1 class="p-0 ps-4 fs-3">American Journal of Computer Science and Engineering
                                        Science and Engineering Survey</h1>
                                    <p class="mt-5">It is a peer review open access journal publishing the state of the
                                        art research in computer science and engineering survey.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-12 col-lg-5 mt-5 mt-lg-0">
                        <h1 class="fs-2">LIBRARY NEWS</h1>
                        <div class="home3-line">
                            <div class="shade"></div>
                        </div>
                        <div class="d-flex flex-column gap-3 mt-4" id="library-news-user">


                        </div>
                        <div class="d-flex align-items-center">
                            <div class="border border-dark-subtle flex-grow-1"></div>
                            <a href="/library-news" class="btn-readmore text-decoration-none" role="button">Read
                                More</a>
                            <div class="border border-dark-subtle flex-grow-1"></div>
                        </div>

                        <div class="container-fluid border bg-dark text-white mt-5 position-relative" id="sched-cont">
                            <i class="fa-solid fa-bookmark position-absolute" id="banner"></i>
                            <span class="material-symbols-outlined" id="clock-icon"> nest_clock_farsight_analog </span>
                            <h1 class="fs-1">Library Hours</h1>

                            <div class="d-flex flex-column gap-4">
                                <div class="mt-5 d-flex flex-column">
                                    <h2 class="fs-2">Regular Semester</h2>
                                    <p class="fs-5 ms-5">7:30 AM - 6:00 PM</p>
                                </div>
                                <div>
                                    <h2 class="fs-2">Summer Break</h2>
                                    <p class="fs-5 ms-5">8:00 AM - 5:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-lg">
                <div class="text-center">
                    <h1>Online Services</h1>
                    <p>Access downloadable forms and make reservations with ease!</p>
                </div>
                <div class="row">
                    <div class="col col-12 col-md-6 col-xxl-4 p-0 p-3">
                        <div class="card p-4">
                            <img src="assets/img/download1.jpg" class="w-100 rounded-3"
                                style="height: 300px; object-fit: cover" alt="" />
                            <h1 class="fs-5 mt-3 pb-2">Suggest a Purchase Book</h1>
                            <a href="assets/download/CHMSC-L-F08-books-recommended.doc" download
                                class="btn btn-success d-flex text-decoration-none gap-1"
                                style="width: max-content">Download <span class="material-symbols-outlined"> download
                                </span></a>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6 col-xxl-4 p-0 p-3">
                        <div class="card p-4">
                            <img src="assets/img/download2.jpg" class="w-100 rounded-3"
                                style="height: 300px; object-fit: cover" alt="" />
                            <h1 class="fs-5 mt-3 pb-2">Recommendation Form</h1>
                            <a href="" class="btn btn-success d-flex text-decoration-none gap-1"
                                style="width: max-content">Download <span class="material-symbols-outlined"> download
                                </span></a>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6 col-xxl-4 p-0 p-3">
                        <div class="card p-4">
                            <img src="assets/img/download3.jpg" class="w-100 rounded-3"
                                style="height: 300px; object-fit: cover" alt="" />
                            <h1 class="fs-5 mt-3 pb-2">AVRC Online Reservation Form</h1>
                            <a href="assets/download/CHMSC-L-F16-AVR-REQUEST-FORM2.xlsx" download
                                class="btn btn-success d-flex text-decoration-none gap-1"
                                style="width: max-content">Download <span class="material-symbols-outlined"> download
                                </span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-lg pb-5 mt-5">
                <div class="text-center">
                    <h1>Recommended Open Source Databases</h1>
                    <p>Explore powerful, open-source databases for seemless data management!</p>
                </div>
                <div class="row">
                    <div class="col col-12 col-md-6 col-xxl-4 p-0 p-3">
                        <div class="card p-4 text-center">
                            <img src="assets/img/doablogo.png" class="w-100 rounded-3"
                                style="height: 300px; object-fit: contain" alt="" />
                            <a href="https://www.doabooks.org/" target="_blank"
                                class="text-decoration-none text-success text-center">https://www.doabooks.org/</a>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6 col-xxl-4 p-0 p-3">
                        <div class="card p-4 text-center">
                            <img src="assets/img/doaj-logo.png" class="w-100 rounded-3"
                                style="height: 300px; object-fit: contain" alt="" />
                            <a href="https://doaj.org/" target="_blank"
                                class="text-decoration-none text-success text-center">https://doaj.org/</a>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6 col-xxl-4 p-0 p-3">
                        <div class="card p-4 text-center">
                            <img src="assets/img/google-scholar.png" class="w-100 rounded-3"
                                style="height: 300px; object-fit: contain" alt="" />
                            <a href="https://scholar.google.com/" target="_blank"
                                class="text-decoration-none text-success text-center">https://scholar.google.com/</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./components/footer.php" ?>
</body>

</html>