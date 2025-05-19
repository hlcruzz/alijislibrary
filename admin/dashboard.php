<?php
include "./components/admin/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <?php include "./components/admin/admin-links.php" ?>

</head>
<?php $_GET['page'] = "dashboard" ?>
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
                                <div class="card m-2 shadow-sm p-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <i class="fa-solid fa-users fs-1 bg-primary p-4 text-light rounded-3"></i>
                                        <div>
                                            <p class="p-0 m-0">Visitors</p>
                                            <h1 class="p-0 m-0" id="totalVisitor"></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-12 col-md-6 col-xl-3 p-0">
                                <div class="card m-2 shadow-sm p-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <i class="fa-solid fa-comments fs-1 bg-success p-4 text-light rounded-3"></i>
                                        <div>
                                            <p class="p-0 m-0">Feedbacks</p>
                                            <h1 class="p-0 m-0" id="totalFeedbackRows"></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 col-xl-3 p-0">
                                <div class="card m-2 shadow-sm p-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <i class="fa-solid fa-newspaper fs-1 bg-warning p-4 text-light rounded-3"></i>
                                        <div>
                                            <p class="p-0 m-0">News</p>
                                            <h1 class="p-0 m-0" id="totalNews"></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 col-xl-3 p-0">
                                <div class="card m-2 shadow-sm p-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <i class="fa-solid fa-images fs-1 bg-danger p-4 text-light rounded-3"></i>
                                        <div>
                                            <p class="p-0 m-0">Gallery</p>
                                            <h1 class="p-0 m-0" id="totalGallery"></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- CONTENT 2 -->
                    <div class="container-fluid">
                        <div class="row mt-3">
                            <div class="col col-12 col-lg-8">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center p-4">
                                        <h1 class="fs-4">Yearly Visitor Statistics</h1>
                                        <div class="input-group w-25">
                                            <label class="input-group-text" for="yearFilter">Year</label>
                                            <select id="yearFilter" class="form-select">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="yearlyVisitor" class="mt-3" style="width: 100vh;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-lg-4 mt-4 mt-lg-0">
                                <div class="card h-100">
                                    <div
                                        class="card-header w-100 d-flex justify-content-between align-items-center p-4">
                                        <h1 class="fs-4">Total Visitors</h1>

                                    </div>
                                    <div class="card-body w-100  d-flex justify-content-center align-items-center">
                                        <canvas id="allTimeRadarChart" style="width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row mt-3">
                            <div class="col col-12 col-lg-3">
                                <div class="card h-100">
                                    <div class=" h-100 d-flex flex-column justify-content-between">
                                        <div class="card-header d-flex justify-content-between align-items-center p-4 ">
                                            <h1 class="fs-4 ">Library Hours </h1>

                                        </div>
                                        <div class="d-flex flex-column gap-4 h-100 p-4" id="libraryHoursCont">

                                        </div>
                                        <button class="btn btn-success m-4" data-bs-toggle="modal"
                                            data-bs-target="#addLibraryHoursModal">Add
                                            Hours</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-lg-9 mt-4 mt-lg-0">
                                <div class="card h-100">
                                    <div
                                        class="card-header w-100 d-flex justify-content-between align-items-center p-4">
                                        <h1 class="fs-4">Activity Logs</h1>

                                    </div>
                                    <div class="card-body">
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
    </div>
</body>

<script>

</script>

</html>