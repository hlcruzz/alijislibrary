<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Contacts</title>
    <?php include "./components/admin/admin-links.php" ?>

</head>
<?php $_GET['page'] = "admin-contacts" ?>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center p-4">
                                    <h1 class="fs-4 p-0 m-0">Socials</h1>
                                    <div class="d-flex gap-3 align-items-center">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#addSocialsModal"
                                            class="btn btn-success d-flex align-items-center gap-2"><span
                                                class="material-symbols-outlined">
                                                add
                                            </span> Add Social </button>
                                    </div>
                                </div>
                                <div class="card-body px-4">
                                    <table id="table_socials" class="table table-hover table-bordered data-table">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header d-flex justify-content-between align-items-center p-4 ">
                            <h1 class="fs-4 p-0 m-0">Contacts</h1>
                        </div>
                        <div class="card-body px-4">
                            <form id="adminContactForm">
                                <input type="hidden" name="adminContactsId" id="adminContactsId">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Website</span>
                                    <input type="url" name="adminContactsWebsite" id="adminContactsWebsite"
                                        class="form-control" placeholder="https://example.com/" required>
                                </div>
                                <div class="d-flex gap-3 mt-4">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Tel. Number</span>
                                        <input type="number" class="form-control" name="adminContactsTelNum"
                                            placeholder="Enter Telephone Number" id="adminContactsTelNum" required
                                            onKeyPress="if(this.value.length==10) return false;" min="0">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Email</span>
                                        <input type="email" class="form-control" name="adminContactsEmail"
                                            placeholder="Enter Email" id="adminContactsEmail">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="adminContactsAddress">Address: </label>
                                    <textarea class="form-control mt-2" name="adminContactsAddress"
                                        id="adminContactsAddress" rows="5" placeholder="Enter Address"></textarea>
                                </div>
                                <button class="btn btn-success mt-3" type="submit">Update</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</body>


</html>