<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alijis Campus Library</title>
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/logo.png" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #main-cont {
            background-image: url(./assets/img/alijis-campus.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .shadow {
            background-color: rgb(0, 0, 0, 0.4);
        }

        .content {
            width: 500px;
            animation: fade 1.5s ease-in-out;
        }

        @keyframes fade {
            from {
                opacity: 0;
                transform: translateY(-200px);
            }
        }

        input.inputForm {
            padding: 10px;
            border: none;
            outline: none;
            width: 100%;
        }

        input.inputForm+label {
            position: absolute;
            left: 10px;
            top: 10px;
            background-color: white;
            transition: 0.3s ease;
            padding: 0px;
            cursor: auto;
            font-weight: 400;
        }

        input.inputForm:focus+label,
        input.inputForm:not(:placeholder-shown)+label {
            top: -20px;
            color: var(--light-bg);
        }

        @media (max-width: 600px) {
            .content {
                width: 100%;
                padding: 0px;
            }

            .shadow {
                background-color: white;
            }
        }
    </style>
    <script type="module" src="./assets/js/admin-login.js"></script>
</head>

<body>
    <div class="container-fluid vh-100 p-0 m-0" id="main-cont">
        <div class="shadow container-fuild h-100 d-flex justify-content-center align-items-center">
            <div class="content p-5 bg-white">
                <div class="">
                    <div class="text-center position-relative ">
                        <img src="./assets/img/logo.png" class="" width="80px" alt="">
                        <h1 class="fs-4 fw-medium mt-2">Alijis Campus Library</h1>
                    </div>
                    <form id="adminForm" action="" method="post" class="d-flex flex-column gap-3">
                        <p class="m-0 p-3 text-center text-danger fw-semibold" id="response"></p>
                        <div class="d-flex align-items-center input-cont form-control">
                            <span class=" material-symbols-outlined fs-2 input-icon text-dark-emphasis ps-2 pe-2">
                                person
                            </span>
                            <div class="position-relative w-100">
                                <input type="text" id="username" name="username" class="inputForm" placeholder=" "
                                    required>
                                <label for="username" class="fs-6">Username</label>
                            </div>
                        </div>
                        <div class="d-flex align-items-center input-cont form-control">
                            <span class="material-symbols-outlined fs-2 input-icon text-dark-emphasis ps-2 pe-2">
                                lock
                            </span>
                            <div class="position-relative w-100 ">
                                <input type="password" name="password" class="inputForm" id="password" placeholder=" "
                                    required>
                                <label for="password" class="fs-6">Password</label>
                            </div>
                            <div class="me-2">
                                <span class="material-symbols-outlined pword-icon fs-3 text-dark-emphasis" role="button"
                                    id="seePass">
                                    visibility
                                </span>
                                <span class="material-symbols-outlined pword-icon fs-3 text-dark-emphasis" role="button"
                                    id="unseePass" style="display: none;">
                                    visibility_off
                                </span>
                            </div>
                        </div>
                        <div class=" d-flex justify-content-between align-items-center gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox" name="rememberCheck" id="rememberCheck"
                                    style="width: 18px; height: 18px; accent-color: #2a983e;">
                                <label class="m-0 p-0 fs-6 text-success" for="rememberCheck">Remember me</label>
                            </div>
                            <div>
                                <a href="/admin-forgot-password" class="text-success text-decoration-none">Forgot
                                    Password?</a>
                            </div>
                        </div>

                        <button class="btn btn-success w-100 p-3 mt-2">Login</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>