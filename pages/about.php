<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alijis Campus Library</title>

    <link rel="stylesheet" href="assets/css/about.css" />
    <?php include "./components/links.php" ?>

</head>
<?php $_GET['page'] = "about"; ?>
<?php include "./components/modal.php" ?>

<body class="overflow-x-hidden">
    <!-- Navigation Bar -->
    <?php include "./components/navbar.php"; ?>


    <!-- CONTENT -->
    <div class="container-fluid p-0 p-5" style="background-color: #def4df">
        <div class="container-fluid d-flex justify-content-center justify-content-xl-between align-items-center"
            style="height: 40vh">
            <img src="assets/img/about-1.png" class="d-none d-xl-block" width="400px" alt="" />
            <div class="text-center">
                <h1 class="text-success">About Us</h1>
                <p class="fw-light">Home / About Us</p>
            </div>
            <img src="assets/img/about-2.png" class="d-none d-xl-block" width="400px" alt="" />
        </div>
    </div>
    <div class="container-fluid">
        <div class="container-lg py-5">
            <div class="row">
                <div class="col col-12 col-md-5 p-0">
                    <img src="./assets/img/alijis-campus.png" class="w-100 h-100 object-fit-cover rounded-4" alt=""
                        id="about-img" />
                </div>
                <div class="col col-12 col-md-7 p-0">
                    <div class="p-4 ms-md-4" id="about-txt">


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container-lg">
            <div class="row" id="foundationCont">

            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 py-5">
        <div class="container-lg">
            <h1 class="m-0 fs-2 text-center">GUIDELINES</h1>
            <div class="d-flex gap-3 mt-5 mb-5 flex-column flex-md-row">
                <div class="list-unstyled d-flex gap-3 flex-column" id="guidlineNameCont">


                </div>
                <div class="flex-grow-1 p-3">
                    <h1 class="fs-5">General Rules</h1>
                    <div class="mt-3" id="rules-cont">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0 my-5">
        <div class="container-lg">
            <h1 class="fs-2 text-success fw-bold text-center">Library Personnel</h1>
            <div class="container-lg mt-4">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4" id="personnelContainer">

                </div>
            </div>


        </div>
    </div>

    <!-- FOOTER -->
    <?php include "./components/footer.php" ?>

</body>

</html>