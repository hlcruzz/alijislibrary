<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alijis Campus Library</title>
    <link rel="stylesheet" href="assets/css/index.css" />
    <?php include "./components/links.php" ?>
</head>
<?php $page = "index"; ?>
<?php include "./components/modal.php" ?>

<body class="overflow-x-hidden">
    <?php include "./components/navbar.php" ?>

    <div class="container-fluid p-0">
        <div class="container-fluid">
            <div class="container-lg d-flex justify-content-between pb-5" style="min-height: 90vh" id="home">
                <div class="d-flex align-items-center align-items-lg-start d-lg-flex flex-column w-100 w-lg-auto">
                    <div class="flex-grow-1 d-flex justify-content-center flex-column w-lg-auto w-100 text-center text-lg-start align-items-center align-items-lg-start"
                        id="text-cont1">
                        <h1 class="fs-2">
                            WELCOME TO OUR <br />
                            ALIJIS CAMPUS LIBRARY
                        </h1>
                        <p class="fw-light fs-6">
                            We are delighted to have you visit our library, a place where <br />
                            knowledge, creativity, and curiosity thrive.
                        </p>
                        <div class="d-flex">
                            <a href="#home2" class="browse">BROWSE</a>
                            <a href="#home2" class="browse"><span class="material-symbols-outlined"> arrow_forward
                                </span></a>
                        </div>
                    </div>
                    <img src="assets/img/books1.png" class="w-50" alt="" />
                </div>
                <div class="w-55 d-none d-lg-flex align-items-end">
                    <div class="d-flex align-items-end h-100">
                        <img src="assets/img/books2.png" style="width: 200px; position: relative; left: 100" alt="" />
                        <img src="assets/img/avatar.png" style="height: 90%" alt="" />
                    </div>
                </div>
            </div>
        </div>

        <div class="content-bg container-fluid pt-4 pb-4">
            <div class="container-lg d-flex justify-content-between align-items-end gap-5">
                <img src="assets/img/books3.png" class="d-none d-xl-block" width="150px" alt="" />
                <div class="w-100">
                    <h1 class="text-center" id="home2" style="color: #106d21;">What's New</h1>
                    <p class="text-center">Discover updated collections and features in our library. Explore
                        what's new today!</p>

                    <div class="row">
                        <div class="col-12 col-xl-6 col-md-6 p-3">
                            <a href="/sections" class="card-cont text-decoration-none">
                                <div class="card rounded-4 p-4">
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
                                    <h1 class="fs-5 text-start ">Library Sections</h1>
                                    <p class="read-more d-flex mt-3" href="">Read More <span
                                            class="material-symbols-outlined"> arrow_forward </span></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-xl-6 col-md-6 p-3">
                            <a href="/periodicals" class="card-cont text-decoration-none">
                                <div class="card rounded-4 p-4">
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
                                    <h1 class="fs-5 text-start ">Newly Arrival: Periodicals</h1>
                                    <p class="read-more d-flex mt-3" href="">Read More <span
                                            class="material-symbols-outlined"> arrow_forward </span></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-xl-6 col-md-6 p-3">
                            <a href="/library-news" class="card-cont text-decoration-none">
                                <div class="card rounded-4 p-4">
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
                                    <h1 class="fs-5 text-start ">Library News</h1>
                                    <p class="read-more d-flex mt-3">Read More <span class="material-symbols-outlined">
                                            arrow_forward </span></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-xl-6 col-md-6 p-3">
                            <a href="/gallery" class="card-cont text-decoration-none">
                                <div class="card rounded-4 p-4">
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
                                    <h1 class="fs-5 text-start ">Gallery of New Learning Spaces</h1>
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
        <div class=" container-fluid">
            <div class="container-lg mt-5 mb-5">
                <div class="row">
                    <div class="col col-12 col-lg-7 pe-0 pe-lg-5">
                        <h1 class="fs-4">GRATIS ACCESS TO</h1>
                        <div class="home3-line">
                            <div class="shade"></div>
                        </div>

                        <div id="carouselExample" class="carousel slide carousel-dark mt-4">
                            <div class="carousel-inner px-4" id="eJournalContainer">


                            </div>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide="prev"
                                class="btn btn-success d-flex align-items-center justify-content-center position-absolute top-50 translate-middle-y start-0">
                                <i class="fa-solid fa-chevron-left"></i>
                            </button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide="next"
                                class="btn btn-success d-flex align-items-center justify-content-center position-absolute top-50 translate-middle-y end-0">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        </div>

                    </div>
                    <div class="col col-12 col-lg-5 mt-5 mt-lg-0">
                        <h1 class="fs-4">Latest News</h1>
                        <div class="home3-line">
                            <div class="shade"></div>
                        </div>
                        <div class="d-flex flex-column gap-3 mt-4" id="library-news-user">


                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <div class="border border-dark-subtle flex-grow-1"></div>
                            <a href="/library-news" class="btn-readmore text-decoration-none" role="button">Read
                                More</a>
                            <div class="border border-dark-subtle flex-grow-1"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid content-bg">
            <div class="container-lg pt-5" id="downloadsCont">


            </div>
            <div class="container-lg pb-5 mt-5">
                <div class="text-center">
                    <h1 class="fs-2">Recommended Open Source Databases</h1>
                    <p>Explore powerful, open-source databases for seemless data management!</p>
                </div>
                <div class="row" id="openSourceDbContainer">

                </div>
            </div>
        </div>
    </div>
    <?php include "./components/footer.php" ?>
</body>

</html>