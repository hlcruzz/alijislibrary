<?php
include "./components/admin/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - About Us</title>
    <?php include "./components/admin/admin-links.php" ?>

</head>
<?php $_GET['page'] = "admin-about-us" ?>
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
                        <div class="col col-12 col-xxl-5 p-0">
                            <div class="h-100">
                                <img src="" alt="" class="w-100 h-100 object-fit-cover p-2 rounded-4 overflow-hidden"
                                    id="aboutImgAdmin">
                            </div>
                        </div>
                        <div class="col p-0">
                            <div class="card p-4 m-2">
                                <h1 class="fs-4 p-0 m-0">About Page</h1>
                                <form id="aboutForm" class="mt-4">
                                    <input type="hidden" value="1" name="aboutId" id="aboutId" hidden>
                                    <div class="mb-3">
                                        <label for="aboutImg">Update Image: ( jpg, jpeg, png )</label>
                                        <input type="file" name="aboutImg" id="aboutImg" class="form-control mt-3"
                                            accept=".jpg, .jpeg, .png">
                                    </div>
                                    <textarea name="aboutTextarea" id="aboutTextarea"></textarea>
                                    <button type="submit" class="btn btn-success mt-3">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4 mt-3">
                        <div class="col p-0">
                            <div class="card m-2">
                                <div class="card-header foundation-head  d-flex align-items-center justify-content-between p-3 bg-primary text-light"
                                    role="button">
                                    <h1 class="fs-5 p-0 m-0 d-flex gap-3 align-items-center"><i
                                            class="fa-solid fa-flag"></i> Mission</h1>
                                    <span class=" material-symbols-outlined fs-5 foundationArrow">
                                        arrow_forward_ios
                                    </span>
                                </div>
                                <div class="overflow-hidden foundation-body "
                                    style="max-height:0 ; transition: 1s ease;">
                                    <p class="p-3" id="missionTxt"></p>
                                </div>
                            </div>
                        </div>


                        <div class="col p-0">
                            <div class="card m-2">
                                <div class="card-header foundation-head d-flex align-items-center justify-content-between p-3 bg-danger text-light"
                                    role="button">
                                    <h1 class="fs-5 p-0 m-0 d-flex gap-3 align-items-center"><i
                                            class="fa-solid fa-eye"></i> Vision</h1>
                                    <span class="material-symbols-outlined fs-5 foundationArrow">
                                        arrow_forward_ios
                                    </span>
                                </div>
                                <div class="overflow-hidden foundation-body "
                                    style="max-height:0 ; transition: 1s ease;">
                                    <p class="p-3" id="visionTxt"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col p-0">
                            <div class="card m-2">
                                <div class="card-header foundation-head d-flex align-items-center justify-content-between p-3 bg-success text-light"
                                    role="button">
                                    <h1 class="fs-5 p-0 m-0 d-flex gap-3 align-items-center"><i
                                            class="fa-solid fa-chart-line"></i> Goal</h1>
                                    <span class="material-symbols-outlined fs-5 foundationArrow">
                                        arrow_forward_ios
                                    </span>
                                </div>
                                <div class="overflow-hidden foundation-body "
                                    style="max-height:0 ; transition: 1s ease;">
                                    <p class="p-3" id="goalTxt"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col p-0">
                            <div class="card m-2">
                                <div class="card-header foundation-head d-flex align-items-center justify-content-between p-3 bg-warning text-light"
                                    role="button">
                                    <h1 class="fs-5 p-0 m-0 d-flex gap-3 align-items-center"><i
                                            class="fa-solid fa-clipboard-check"></i> Objectives</h1>
                                    <span class="material-symbols-outlined fs-5 foundationArrow">
                                        arrow_forward_ios
                                    </span>
                                </div>
                                <div class="overflow-hidden foundation-body "
                                    style="max-height:0 ; transition: 1s ease;">
                                    <p class="p-3" id="objectivesTxt"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form id="foundationForm" class="form-control p-4 mt-3">
                        <h1 class="fs-5 m-0">Update Foundation</h1>
                        <select name="foundationName" id="foundationName" class="form-select mt-3" required>
                            <option value="" selected hidden>Select Content</option>
                            <option value="Mission">Mission</option>
                            <option value="Vision">Vision</option>
                            <option value="Goal">Goal</option>
                            <option value="Objectives">Objectives</option>
                        </select>
                        <div class="mt-3">
                            <label for="">Text Content: </label>
                            <textarea name="foundationTxt" required id="foundationTxt" cols="30" rows="10"
                                class="form-control mt-3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Update</button>
                    </form>

                    <div class="mt-4">

                        <div class="card mt-3">
                            <div class="card-header d-flex justify-content-between align-items-center p-4">
                                <h1 class="fs-4 p-0 m-0">Guidelines</h1>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#addGuidelinesModal"
                                    class="btn btn-success d-flex align-items-center gap-2"><span
                                        class="material-symbols-outlined">
                                        add
                                    </span> Add Guidelines </button>
                            </div>
                            <div class="card-body px-4">
                                <table id="table_guidelines" class="table table-hover table-bordered data-table">

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">

                        <div class="card mt-3">
                            <div class="card-header d-flex justify-content-between align-items-center p-4">
                                <h1 class="fs-4 p-0 m-0">Frequently Ask Questions</h1>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#addFaqModal"
                                    class="btn btn-success d-flex align-items-center gap-2"><span
                                        class="material-symbols-outlined">
                                        add
                                    </span> Add Questions </button>
                            </div>
                            <div class="card-body px-4">
                                <table id="table_faq" class="table table-hover table-bordered data-table">

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">

                        <div class="card mt-3">
                            <div class="card-header d-flex justify-content-between align-items-center p-4">
                                <h1 class="fs-4 p-0 m-0">Library Objectives</h1>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#addObjectivesModal"
                                    class="btn btn-success d-flex align-items-center gap-2"><span
                                        class="material-symbols-outlined">
                                        add
                                    </span> Add Objectives </button>
                            </div>
                            <div class="card-body px-4">
                                <table id="table_Objectives" class="table table-hover table-bordered data-table">

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</body>


</html>