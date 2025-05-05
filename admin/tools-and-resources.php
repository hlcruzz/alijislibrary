<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tools & Resources</title>
    <?php include "./components/admin/admin-links.php" ?>

</head>
<?php $page = "admin-tools-and-resources" ?>
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

                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center p-4">
                                    <h1 class="fs-4 p-0 m-0">Downloadables</h1>
                                    <div class="d-flex gap-3 align-items-center">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#addDownloadModal"
                                            class="btn btn-success d-flex align-items-center gap-2"><span
                                                class="material-symbols-outlined">
                                                add
                                            </span> Add </button>
                                    </div>
                                </div>
                                <div class="card-body px-4">
                                    <table id="table_dwonloads" class="table table-hover table-bordered data-table">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CONTENT 2 -->
                    <div class="row">
                        <div class="col-12">

                            <div class="card mt-3">
                                <div class="card-header d-flex justify-content-between align-items-center p-4">
                                    <h1 class="fs-4 p-0 m-0">Online Reference Tools</h1>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#addToolModal"
                                        class="btn btn-success d-flex align-items-center gap-2"><span
                                            class="material-symbols-outlined">
                                            add
                                        </span> Add</button>
                                </div>
                                <div class="card-body px-4">
                                    <table id="online_tools_table" class="table table-hover table-bordered data-table">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center p-4">
                                    <h1 class="fs-4 p-0 m-0">Open Source Databases</h1>
                                    <div class="d-flex gap-3 align-items-center">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#addDatabaseModal"
                                            class="btn btn-success d-flex align-items-center gap-2"><span
                                                class="material-symbols-outlined">
                                                add
                                            </span> Add </button>
                                    </div>
                                </div>
                                <div class="card-body px-4">
                                    <table id="table_databases" class="table table-hover table-bordered data-table">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-3">
                                <div class="card-header d-flex justify-content-between align-items-center p-4">
                                    <h1 class="fs-4 p-0 m-0">E - Journals</h1>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#addEjournalModal"
                                        class="btn btn-success d-flex align-items-center gap-2"><span
                                            class="material-symbols-outlined">
                                            add
                                        </span> Add </button>
                                </div>
                                <div class="card-body px-4">
                                    <table id="table_e_journal" class="table table-hover table-bordered data-table">

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