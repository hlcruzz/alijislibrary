<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Services</title>
    <?php include "./components/admin/admin-links.php" ?>

</head>
<?php $page = "admin-services" ?>
<?php include "./components/admin/admin-modal.php" ?>

<body data-bs-theme="" id="admin-body">
    <div class="container-fluid p-0" style="max-height: 100vh;">
        <div class="d-flex">
            <?php include "./components/admin/dashboard-menu.php" ?>
            <div class="content flex-grow-1">
                <?php include "./components/admin/dashboard-upbar.php" ?>
                <!-- CONTENT -->
                <div class="p-4">
                    <div class="row">
                        <div class="col-12 position-relative">
                            <div class="card position-sticky z-1" style="top: 75px;">
                                <div class="d-flex justify-content-between align-items-center p-4">
                                    <h1 class="fs-4 p-0 m-0 ms-1">Library Services</h1>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#addServicesModal"
                                        class="btn btn-success d-flex align-items-center gap-2"><span
                                            class="material-symbols-outlined fs-5">
                                            add
                                        </span> Add </button>
                                </div>
                            </div>
                            <div class="row row-cols-1 ">
                                <div class="col p-0">
                                    <div class="card m-3">
                                        <div class="card-header d-flex justify-content-between align-items-center p-4">
                                            <h1 class="fs-5 m-0 p-0">Automated Circulation</h1>

                                        </div>
                                        <div class="card-body">
                                            <table id="table_automated_circulation"
                                                class="table table-hover table-bordered data-table">

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0">
                                    <div class="card m-3">
                                        <div class="card-header d-flex justify-content-between align-items-center p-4">
                                            <h1 class="fs-4 m-0 p-0">Virtual Library Orientation</h1>

                                        </div>
                                        <div class="card-body">
                                            <table id="table_virtual_library_orientation"
                                                class="table table-hover table-bordered data-table">

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0">
                                    <div class="card m-3">
                                        <div class="card-header d-flex justify-content-between align-items-center p-4">
                                            <h1 class="fs-4 m-0 p-0">Internet & Computer Aided Research</h1>

                                        </div>
                                        <div class="card-body">
                                            <table id="table_internet_computer_aided_research"
                                                class="table table-hover table-bordered data-table">

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0">
                                    <div class="card m-3">
                                        <div class="card-header d-flex justify-content-between align-items-center p-4">
                                            <h1 class="fs-4 m-0 p-0">Information Dissemination</h1>

                                        </div>
                                        <div class="card-body">
                                            <table id="table_information_dissemination"
                                                class="table table-hover table-bordered data-table">

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0">
                                    <div class="card m-3">
                                        <div class="card-header d-flex justify-content-between align-items-center p-4">
                                            <h1 class="fs-4 m-0 p-0">Online Subscription of Databases</h1>

                                        </div>
                                        <div class="card-body">
                                            <table id="table_online_subscription_databases"
                                                class="table table-hover table-bordered data-table">

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-0">
                                    <div class="card m-3">
                                        <div class="card-header d-flex justify-content-between align-items-center p-4">
                                            <h1 class="fs-4 m-0 p-0">News & Current Events</h1>

                                        </div>
                                        <div class="card-body">
                                            <table id="table_news_current_events"
                                                class="table table-hover table-bordered data-table">

                                            </table>
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