<?php
include "./components/admin/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gallery</title>
    <?php include "./components/admin/admin-links.php" ?>

</head>
<?php $_GET['page'] = "admin-gallery" ?>
<?php include "./components/admin/admin-modal.php" ?>

<body data-bs-theme="" id="admin-body">
    <div class="container-fluid p-0" style="max-height: 100vh;">
        <div class="d-flex">
            <?php include "./components/admin/dashboard-menu.php" ?>
            <div class="content flex-grow-1">
                <?php include "./components/admin/dashboard-upbar.php" ?>
                <!-- CONTENT -->
                <div class="position-relative">
                    <div class="card border-0 shadow-none position-sticky m-4" style="top: 70px; z-index: 1; left: 0;">
                        <div class="d-flex justify-content-between align-items-center p-4 ">
                            <h1 class="fs-4 p-0 m-0">Library Gallery</h1>
                            <div class="d-flex gap-3 align-items-center position-sticky">
                                <button type="button" class="btn btn-danger" id="deleteGalleryBtn"
                                    style="display: none;"><span class="material-symbols-outlined">
                                        delete
                                    </span></button>
                                <button type="button" class="btn btn-primary " id="editGalleryBtn"><span
                                        class="material-symbols-outlined">
                                        edit_square
                                    </span></button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#addGalleryModal"
                                    class="btn btn-success d-flex align-items-center gap-2"><span
                                        class="material-symbols-outlined">
                                        add
                                    </span> Add Gallery </button>
                            </div>
                        </div>

                    </div>
                    <div class="card border-0 shadow-none m-4">
                        <div class="card-body px-4">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5" id="galleryContainer">

                            </div>

                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <button class="btn btn-success" id="loadImg">Load More</button>
                        </div>
                    </div>
                    <!-- CONTENT 2 -->

                </div>
            </div>
        </div>
    </div>
</body>


</html>