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
                        <img src="/assets/img/logo.png" class="" width="80px" alt="">
                        <h1 class="fs-4 fw-medium mt-2">Alijis Campus Library</h1>
                    </div>
                    <form id="adminForgotForm" class="d-flex flex-column gap-3">
                        <p class="m-0 p-3 text-center text-danger fw-semibold" id="response"></p>
                        <div class="input-group">
                            <div class="d-flex align-items-center input-cont form-control" id="emailCont">
                                <span class="material-symbols-outlined fs-2 input-icon text-dark-emphasis ps-2 pe-2">
                                    person
                                </span>
                                <div class="position-relative w-100">
                                    <input type="email" id="email" name="email" class="inputForm" placeholder=" "
                                        required>
                                    <label for="email" class="fs-6">Email</label>
                                </div>
                            </div>
                            <button type="button" id="sendCode" class="px-3 border-0 bg-success rounded-end-2"><span
                                    class="input-group-text p-0 border-0 bg-transparent" id="basic-addon1">
                                    <i class="fa-solid fa-paper-plane" style="color: white;" id="sendIcon"></i>
                                    <div class="spinner-border text-light spinner-border-sm" role="status"
                                        style="display: none;" id="loadingIcon">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>

                                </span></button>
                        </div>
                        <div class="input-group" id="codeCont" style="display: none;">
                            <div class="d-flex align-items-center input-cont form-control">
                                <span class="material-symbols-outlined fs-2 input-icon text-dark-emphasis ps-2 pe-2">
                                    key
                                </span>
                                <div class="position-relative w-100">
                                    <input type="number" id="code" name="code" class="inputForm" placeholder=" "
                                        onKeyPress="if(this.value.length==6) return false;" min="0">
                                    <label for="code" class="fs-6">Verification Code</label>
                                </div>
                            </div>
                        </div>
                        <div id="pwordCont" style="display: none;">
                            <div class="d-flex align-items-center input-cont form-control">
                                <span class="material-symbols-outlined fs-2 input-icon text-dark-emphasis ps-2 pe-2">
                                    lock
                                </span>
                                <div class="position-relative w-100 ">
                                    <input type="password" name="password" class="inputForm" id="password"
                                        placeholder=" ">
                                    <label for="password" class="fs-6">New Password</label>
                                </div>
                                <div class="me-2">
                                    <span class="material-symbols-outlined pword-icon fs-3 text-dark-emphasis"
                                        role="button" id="seePass">
                                        visibility
                                    </span>
                                    <span class="material-symbols-outlined pword-icon fs-3 text-dark-emphasis"
                                        role="button" id="unseePass" style="display: none;">
                                        visibility_off
                                    </span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submitBtn" class="btn btn-secondary w-100 p-3 mt-2 "
                            disabled>Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>