<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alijis Campus Library</title>
    <link rel="stylesheet" href="./assets/css/admin.css" />
    <?php include "./components/admin/admin-links.php" ?>

</head>

<body>
    <div class="container-fluid vh-100 p-0 m-0" id="main-cont">
        <div class="shadow container-fuild h-100 d-flex justify-content-center align-items-center">
            <div class="content p-5 bg-white">
                <div class="">
                    <div class="text-center position-relative ">
                        <img src="/assets/img/logo.png" class="" width="80px" alt="">
                        <h1 class="fs-4 fw-medium mt-2">Alijis Campus Library</h1>
                    </div>
                    <form id="adminForm" action="" method="post" class="d-flex flex-column gap-3">
                        <p class="m-0 p-3 text-center text-danger fw-semibold" id="response"></p>
                        <div class="d-flex align-items-center input-cont form-control">
                            <span class=" material-symbols-outlined fs-2 input-icon text-dark-emphasis ps-2 pe-2">
                                person
                            </span>
                            <div class="position-relative w-100">
                                <input type="text" id="username" name="username" placeholder=" " required>
                                <label for="username" class="fs-6">Username</label>
                            </div>
                        </div>
                        <div class="d-flex align-items-center input-cont form-control">
                            <span class="material-symbols-outlined fs-2 input-icon text-dark-emphasis ps-2 pe-2">
                                lock
                            </span>
                            <div class="position-relative w-100 ">
                                <input type="password" name="password" id="password" placeholder=" " required>
                                <label for="password" class="fs-6">Password</label>
                            </div>
                            <div class="me-2">
                                <span class="passIcon material-symbols-outlined pword-icon fs-3 text-dark-emphasis"
                                    role="button">
                                    visibility
                                </span>
                                <span class="passIcon material-symbols-outlined pword-icon fs-3 text-dark-emphasis"
                                    role="button" style="display: none;">
                                    visibility_off
                                </span>
                            </div>
                        </div>

                        <button class="btn btn-success w-100 p-3 mt-2">Login</button>
                    </form>
                    <div class="d-flex justify-content-center ">
                        <a href="" class="text-success text-decoration-none">Forgot Password?</a>
                    </div>
                    <!-- <div class="d-flex gap-3">
                        <hr class="w-100">
                        <p class="m-0 text-muted fw-medium">or</p>
                        <hr class="w-100">
                    </div>
                    <div class="mt-3 d-flex gap-3">
                        <button
                            class="d-flex shadow justify-content-center btn align-items-center gap-3 p-3 border-0 w-100"
                            style="background-color: #3B5998;">
                            <img src="/assets/icon/facebook.png" width="30px" alt="">
                            <p class="m-0 p-0 fw-medium text-light">Facebook</p>
                        </button>
                        <button
                            class="border shadow d-flex justify-content-center btn align-items-center gap-3 p-3  w-100" ">
                            <img src=" /assets/icon/google.png" width="30px" alt="">
                            <p class="m-0 p-0 fw-medium text-dark-emphasis">Google</p>
                        </button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>