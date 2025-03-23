<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Library News</title>
    <?php include "./components/admin/admin-links.php" ?>

</head>
<?php $page = "library-news" ?>
<?php include "./components/admin/admin-modal.php" ?>

<body data-bs-theme="" id="admin-body">
    <div class="container-fluid p-0" style="max-height: 100vh;">
        <div class="d-flex">
            <?php include "./components/admin/dashboard-menu.php" ?>
            <div class="content flex-grow-1">
                <?php include "./components/admin/dashboard-upbar.php" ?>
                <!-- CONTENT -->
                <div class="d-flex justify-content-center overflow-auto pt-4 pb-4">
                    <div style="width: 95%;">
                        <div class="container-fluid card mt-2 p-4 pb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <h1 class="header fs-2 d-flex align-items-center gap-2 m-0 p-0"><span
                                        class="material-symbols-outlined fs-1">
                                        newsmode
                                    </span> Library News</h1>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#addNewsModal"
                                    class="btn btn-success d-flex align-items-center">Add News <span
                                        class="material-symbols-outlined">
                                        add
                                    </span></button>
                            </div>
                            <div style="width: 100%;">
                                <table id="table_news" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Img</th>
                                            <th>Subject</th>
                                            <th>Messsage</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">

                                    </tbody>
                                </table>
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