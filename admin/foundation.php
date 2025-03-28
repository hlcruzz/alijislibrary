<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Library News</title>
    <?php include "./components/admin/admin-links.php" ?>

</head>
<?php $page = "settings-foundation" ?>
<?php include "./components/admin/admin-modal.php" ?>

<body data-bs-theme="" id="admin-body">
    <div class="container-fluid p-0" style="max-height: 100vh;">
        <div class="d-flex">
            <?php include "./components/admin/dashboard-menu.php" ?>
            <div class="content flex-grow-1">
                <?php include "./components/admin/dashboard-upbar.php" ?>
                <!-- CONTENT -->
                <div class="p-4">
                    <h1 class="fs-3 p-0 m-0">Foundation</h1>
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

                    <!-- ABOUT US for GENERAL INFO -->
                    <!-- <form id="updateAboutUsForm" class="form-control p-4 pb-0 mt-3">
                        <div class="row row-cols-1 row-cols-xl-2">
                            <div class="col">
                                <div class="d-flex flex-column gap-3 mb-4">
                                    <h1 class="fs-5">Update About Us Content</h1>
                                    <div class="">
                                        <label for="aboutTxt">Update Image: </label>
                                        <input type="file" class="form-control mt-2" accept="image/*">
                                    </div>
                                    <div class="">
                                        <label for="aboutTxt">Content Text: </label>
                                        <textarea name="aboutTxt" id="aboutTxt" rows="15" class="form-control mt-2"
                                            style="resize: none;"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success form-control px-4"
                                        style="max-width: max-content;">Update</button>
                                </div>
                            </div>
                            <div class="col pb-4">
                                <div class="position-relative">
                                    <img src="./assets/img/alijis-campus.png"
                                        class="w-100 h-100 object-fit-cover rounded-4" alt="">
                                    <div class="position-absolute start-0 top-0 w-100 h-100 text-light rounded-4"
                                        style="background-color: rgba(0, 0, 0, 0.5);">
                                        <div class="overflow-auto" style="max-height: 100%;">
                                            <h1 class="fs-3 fw-bolder m-4 mb-0">About Us</h1>
                                            <p class="m-4">
                                                Welcome to <b>Alijis Campus Library</b>, a place where knowledge,
                                                learning,
                                                and community come together.
                                                Our
                                                library is dedicated to providing access to a vast collection of
                                                books,
                                                digital resources, and research
                                                materials to support education and lifelong learning.
                                                <br>
                                                <br>
                                                At <b>Alijis Campus Library</b>, we believe that libraries are more
                                                than
                                                just books—they are gateways to
                                                discovery,
                                                creativity, and innovation. Whether you are a student, researcher,
                                                or
                                                casual
                                                reader, our library offers a
                                                welcoming space for reading, studying, and exploring new ideas.
                                                <br>
                                                <br>
                                                We are committed to fostering a love for reading and learning by
                                                offering a
                                                variety of services, including
                                                book lending, research assistance, digital resources, and
                                                educational
                                                programs. Our team is always ready
                                                to help you find the information and resources you need.
                                                <br>
                                                <br>
                                                Join us in our mission to inspire knowledge and empower minds. Visit
                                                <b>Alijis Campus Library</b> today
                                                and
                                                discover a world of possibilities!

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> -->
                </div>
            </div>
        </div>
</body>


</html>