<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <?php include "./components/admin/admin-links.php" ?>

</head>
<?php $page = "dashboard" ?>
<?php include "./components/admin/admin-modal.php" ?>

<body data-bs-theme="" id="admin-body">
    <div class="container-fluid p-0" style="max-height: 100vh;">
        <div class="d-flex">
            <?php include "./components/admin/dashboard-menu.php" ?>
            <div class="flex-grow-1 ">
                <?php include "./components/admin/dashboard-upbar.php" ?>
                <!-- CONTENT -->
                <div class="content p-3" style="min-height: 100vh;">
                    <div class="container-fluid">
                        <div class="row" style="white-space: nowrap;">
                            <div class="col col-12 col-md-6 col-xl-3 p-0">
                                <div class="total-cont card m-2 p-4 shadow-sm">
                                    <div class="total-head d-flex align-items-center gap-2">
                                        <span class="material-symbols-outlined fs-4">
                                            tour
                                        </span>
                                        <h1 class="fs-4 m-0 p-0">Total Visits</h1>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-end gap-2 mt-2">
                                        <h1 class="p-0 m-0 fs-1">2,800</h1>
                                        <div class="d-flex align-items-center gap-2 rate">
                                            <span class="material-symbols-outlined fs-2">
                                                trending_up
                                            </span>
                                            <p class="p-0 m-0 fs-5">0.5 %</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 col-xl-3 p-0">
                                <div class="total-cont card m-2 p-4 shadow-sm">
                                    <div class="total-head d-flex align-items-center gap-2">
                                        <span class="material-symbols-outlined fs-4">
                                            chat
                                        </span>
                                        <h1 class="fs-4 m-0 p-0">Total Feedbacks</h1>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-end gap-2 mt-2">
                                        <h1 class="p-0 m-0 fs-1" id="totalFeedbackRows"></h1>
                                        <div class="d-flex align-items-center gap-2 rate">
                                            <span class="material-symbols-outlined fs-2">
                                                trending_up
                                            </span>
                                            <p class="p-0 m-0 fs-5">0.5 %</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 col-xl-3 p-0">
                                <div class="total-cont card m-2 p-4 shadow-sm">
                                    <div class="total-head d-flex align-items-center gap-2">
                                        <span class="material-symbols-outlined fs-4">
                                            tour
                                        </span>
                                        <h1 class="fs-4 m-0 p-0">Total Visits</h1>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-end gap-2 mt-2">
                                        <h1 class="p-0 m-0 fs-1">2,800</h1>
                                        <div class="d-flex align-items-center gap-2 rate">
                                            <span class="material-symbols-outlined fs-2">
                                                trending_up
                                            </span>
                                            <p class="p-0 m-0 fs-5">0.5 %</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 col-xl-3 p-0">
                                <div class="total-cont card m-2 p-4 shadow-sm">
                                    <div class="total-head d-flex align-items-center gap-2">
                                        <span class="material-symbols-outlined fs-4">
                                            tour
                                        </span>
                                        <h1 class="fs-4 m-0 p-0">Total Visits</h1>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-end gap-2 mt-2">
                                        <h1 class="p-0 m-0 fs-1">2,800</h1>
                                        <div class="d-flex align-items-center gap-2 rate">
                                            <span class="material-symbols-outlined fs-2">
                                                trending_up
                                            </span>
                                            <p class="p-0 m-0 fs-5">0.5 %</p>
                                        </div>
                                    </div>
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