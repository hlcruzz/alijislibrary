<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alijis Campus Library</title>
    <link rel="stylesheet" href="./assets/css/services.css">
    <?php include "./components/links.php" ?>
</head>
<?php $_GET['page'] = "404"; ?>

<body class="overflow-x-hidden">
    <?php include "./components/navbar.php" ?>
    <!-- CONTENT -->
    <div class="container-fluid p-0 p-5" style="background-color: #def4df">
        <div class="container-fluid d-flex justify-content-center justify-content-xl-between align-items-center"
            style="height: 40vh">
            <img src="assets/img/about-1.png" class="d-none d-xl-block" width="400px" alt="" />
            <div class="text-center">
                <h1 class="text-success">Error Page</h1>
            </div>
            <img src="assets/img/about-2.png" class="d-none d-xl-block" width="400px" alt="" />
        </div>
    </div>
    <div class="container-fuild">
        <div class="container-lg my-5 py-5 d-flex align-items-center flex-column">
            <img src="./assets/img/errorpage.png" class="object-fit-contain" style="width: 100%; height: 500px;" alt="">
            <div class="d-flex align-items-center flex-column text-center gap-3 mt-0 mt-lg-5">
                <h1><strong class="text-warning">Oops!</strong> Page Not Found</h1>
                <p>The page you are looking for does not exist</p>
                <a href="/" style="max-width: max-content" class="btn btn-success d-flex align-items-center gap-2">Back
                    to Home Page <span class="material-symbols-outlined">
                        trending_flat
                    </span></a>
            </div>
        </div>
    </div>

    <?php include "./components/footer.php" ?>
</body>

</html>