<?php
include "./components/admin/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Activity Logs</title>
    <?php include "./components/admin/admin-links.php" ?>

</head>
<?php $_GET['page'] = "admin-activity-logs" ?>
<?php include "./components/admin/admin-modal.php" ?>

<body data-bs-theme="" id="admin-body">
    <div class="container-fluid p-0" style="max-height: 100vh;">
        <div class="d-flex">
            <?php include "./components/admin/dashboard-menu.php" ?>
            <div class="content flex-grow-1">
                <?php include "./components/admin/dashboard-upbar.php" ?>
                <!-- CONTENT -->
                <div class="p-4 d-flex flex-column gap-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-3">
                                <div class="card-header d-flex justify-content-between align-items-center p-4">
                                    <h1 class="fs-4 p-0 m-0">Activity Logs</h1>
                                </div>
                                <div class="card-body px-4">
                                    <table id="table_logs" class="table table-hover table-bordered data-table">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>



</html>