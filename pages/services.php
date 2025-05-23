<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alijis Campus Library</title>
    <link rel="stylesheet" href="./assets/css/services.css">
    <?php include "./components/links.php" ?>
</head>
<?php $_GET['page'] = "services"; ?>
<?php include "./components/modal.php" ?>

<body class="overflow-x-hidden">
    <?php include "./components/navbar.php" ?>
    <!-- CONTENT -->
    <div class="container-fluid p-0 p-5" style="background-color: #def4df">
        <div class="container-fluid d-flex justify-content-center justify-content-xl-between align-items-center"
            style="height: 40vh">
            <img src="assets/img/about-1.png" class="d-none d-xl-block" width="400px" alt="" />
            <div class="text-center">
                <h1 class="text-success">Services</h1>
                <p class="fw-light">Home / Services</p>
            </div>
            <img src="assets/img/about-2.png" class="d-none d-xl-block" width="400px" alt="" />
        </div>
    </div>
    <div class="container-fuild">
        <div class="container-lg pt-5 pb-5">
            <div class="row">
                <div class="col col-12 col-lg-4">
                    <div class="d-flex flex-column text-center gap-3 position-sticky" style="top: 150;">
                        <h1 class="menu-head fs-6">Automated Circulation</h1>
                        <h1 class="menu-head fs-6">Virutal Library Orientation</h1>
                        <h1 class="menu-head fs-6">Internet & Computer Aided Research</h1>
                        <h1 class="menu-head fs-6">Information Dissemination</h1>
                        <h1 class="menu-head fs-6">Online Subscription of Databases</h1>
                        <h1 class="menu-head fs-6">News & Current Events</h1>
                    </div>
                </div>
                <div class="col col-12 col-lg-8 pt-5 pt-lg-0">
                    <div class="cont" id="automated-circulation">

                    </div>
                    <div class="cont" id="virutal-library-orientation">

                    </div>
                    <div class="cont" id="internet-computer-aided-research">

                    </div>
                    <div class="cont" id="information-dissemination">

                    </div>
                    <div class="cont" id="online-subscription-of-databases">

                    </div>
                    <div class="cont" id="news-current-events">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./components/footer.php" ?>
    <script src="./assets/js/services.js"></script>
</body>

</html>