<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Feedbacks</title>
    <?php include "./components/admin/admin-links.php" ?>
</head>
<?php $page = "feedbacks" ?>
<?php include "./components/admin/admin-modal.php" ?>

<body data-bs-theme="" id="admin-body">
    <div class="container-fluid p-0" style="max-height: 100vh;">
        <div class="d-flex">
            <?php include "./components/admin/dashboard-menu.php" ?>
            <div class="flex-grow-1 ">
                <?php include "./components/admin/dashboard-upbar.php" ?>
                <!-- CONTENT -->
                <div class="p-4 content">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="d-flex justify-content-between align-items-center pb-4">
                                <h1 class="fs-3 p-0 m-0">Library Feedbacks</h1>
                                <div class="d-flex gap-3 align-items-center">

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body px-4">
                                    <table id="feedbacksTable" class="table table-hover table-bordered">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CONTENT 2 -->

                </div>
            </div>
        </div>
    </div>
</body>


</html>