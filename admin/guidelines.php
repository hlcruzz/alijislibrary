<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Library News</title>
    <?php include "./components/admin/admin-links.php" ?>

</head>
<?php $page = "settings-guidelines" ?>
<?php include "./components/admin/admin-modal.php" ?>

<body data-bs-theme="" id="admin-body">
    <div class="container-fluid p-0" style="max-height: 100vh;">
        <div class="d-flex">
            <?php include "./components/admin/dashboard-menu.php" ?>
            <div class="content flex-grow-1">
                <?php include "./components/admin/dashboard-upbar.php" ?>
                <!-- CONTENT -->
                <div class="p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="fs-3 p-0 m-0">Guidelines</h1>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#addGuidelinesModal"
                            class="btn btn-success d-flex align-items-center gap-2"><span
                                class="material-symbols-outlined">
                                add
                            </span> Add Guidelines </button>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body px-4">
                            <table id="table_guidelines" class="table table-hover table-bordered">

                            </table>
                        </div>
                    </div>
                    <!-- CONTENT 2 -->

                </div>
            </div>
        </div>
</body>


</html>