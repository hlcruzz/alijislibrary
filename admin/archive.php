<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Archive</title>
    <?php include "./components/admin/admin-links.php" ?>

</head>
<?php $page = "settings-archive" ?>
<?php include "./components/admin/admin-modal.php" ?>

<body data-bs-theme="" id="admin-body">
    <div class="container-fluid p-0" style="max-height: 100vh;">
        <div class="d-flex">
            <?php include "./components/admin/dashboard-menu.php" ?>
            <div class="content flex-grow-1">
                <?php include "./components/admin/dashboard-upbar.php" ?>
                <!-- CONTENT -->
                <div class="p-4">

                    <div class="card mt-3">
                        <div class="card-header d-flex align-items-center gap-2 p-4">
                            <h1 class="fs-3 p-0 m-0">Archive</h1>
                            <span class="material-symbols-outlined mt-2 p-0 " data-bs-toggle="popover"
                                data-bs-title="Archive Page Info"
                                data-bs-content="This page displays all deleted rows from different tables. You can still restore them from here."
                                role="button">
                                info
                            </span>
                        </div>
                        <div class="card-body px-4">
                            <table id="archive_table" class="table table-hover table-bordered data-table">

                            </table>
                        </div>
                    </div>
                    <!-- CONTENT 2 -->

                </div>
            </div>
        </div>
</body>


</html>