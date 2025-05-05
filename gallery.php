<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alijis Campus Library</title>
    <link rel="stylesheet" href="assets/css/contacts.css" />

    <?php include "./components/links.php" ?>
</head>
<?php $page = "gallery"; ?>
<?php include "./components/modal.php" ?>

<body class="overflow-x-hidden">
    <!-- Navigation Bar -->
    <?php include "./components/navbar.php"; ?>

    <!-- CONTENT -->
    <div class="container-fluid p-0" style="background-image: url(./assets/img/gallery-bg.jpg);  background-position: center;
  background-repeat: no-repeat;
  background-size: cover; height: 75vh;">
        <div class="d-flex w-100 h-100 justify-content-center align-items-center flex-column text-light"
            style="background-color: rgb(0, 0, 0, 0.4);">
            <h1 class="">Library Gallery</h1>
            <p>Home / Library Gallery</p>
        </div>
    </div>
    <div class="container-fluid pt-5 pb-5">
        <div class="container-lg">
            <div class="d-flex justify-content-center gap-3">
                <span class="material-symbols-outlined fs-1">
                    gallery_thumbnail
                </span>
                <h1 class="text-center fs-2 text-success-emphasis"> Gallery of New Learning Spaces </h1>
                <span class="material-symbols-outlined fs-1">
                    gallery_thumbnail
                </span>
            </div>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-xl-5 mt-5" id="galleryContainer">

            </div>
            <div class="text-center mt-3" id="galleryLoading" style="display: none;">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <?php include "./components/footer.php" ?>
    <script src="./assets/js/contacts.js"></script>
</body>

</html>