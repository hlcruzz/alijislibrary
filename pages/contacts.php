<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alijis Campus Library</title>
    <link rel="stylesheet" href="assets/css/contacts.css" />

    <?php include "./components/links.php" ?>

</head>
<?php $_GET['page'] = "contacts"; ?>
<?php include "./components/modal.php" ?>

<body class="overflow-x-hidden">
    <!-- Navigation Bar -->
    <?php include "./components/navbar.php"; ?>

    <!-- CONTENT -->
    <div class="container-fluid p-0 p-5" style="background-color: #def4df">
        <div class="container-fluid d-flex justify-content-center justify-content-xl-between align-items-center"
            style="height: 40vh">
            <img src="assets/img/about-1.png" class="d-none d-xl-block" width="400px" alt="" />
            <div class="text-center">
                <h1 class="text-success">Contacts</h1>
                <p class="fw-light">Home / Contacts</p>
            </div>
            <img src="assets/img/about-2.png" class="d-none d-xl-block" width="400px" alt="" />
        </div>
    </div>
    <div class="container-fluid pt-5 pb-5">
        <div class="container-lg">
            <div class="row">
                <div class="col col-12 col-xl-5 p-0 ps-4 pe-4">
                    <div class="d-flex flex-column gap-3 p-4 p-sm-5 rounded-4" id="contact2">
                        <div class="d-flex flex-column gap-3 align-items-start flex-sm-row align-items-sm-center">
                            <span class="icons material-symbols-outlined fs-1"> phone_in_talk </span>
                            <div class="d-flex flex-column">
                                <p class="p-0 m-0">Call Us</p>
                                <h3 class="p-0 m-0 fs-5" id="contactsTelNum"></h3>
                            </div>
                        </div>
                        <div class="opacity-50" style="border-top: 1px solid white"></div>
                        <div class="d-flex flex-column gap-3 align-items-start flex-sm-row align-items-sm-center">
                            <span class="icons material-symbols-outlined fs-1"> email </span>
                            <div class="d-flex flex-column">
                                <p class="p-0 m-0">Send Email</p>
                                <h3 class="p-0 m-0 fs-5" id="contactsEmail"></h3>
                            </div>
                        </div>
                        <div class="opacity-50" style="border-top: 1px solid white"></div>
                        <div class="d-flex flex-column gap-3 align-items-start flex-sm-row align-items-sm-center">
                            <span class="icons material-symbols-outlined fs-1"> distance </span>
                            <div class="d-flex flex-column">
                                <p class="p-0 m-0">Location</p>
                                <h3 class="p-0 m-0 fs-5" id="contactsAddress"></h3>
                            </div>
                        </div>
                        <div class="opacity-50" style="border-top: 1px solid white"></div>
                        <div class="d-flex flex-column gap-3 align-items-start flex-sm-row align-items-sm-center">
                            <span class="icons material-symbols-outlined fs-1"> language </span>
                            <div class="d-flex flex-column">
                                <p class="p-0 m-0">Website</p>
                                <h3 class="p-0 m-0 fs-5" id="contactsWebsite"></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-xl-7 p-0 ps-4 pe-4 d-flex pt-5">
                    <div class="mt-5 m-xl-0 d-flex flex-column">
                        <h1 class="m-0 text-dark-emphasis">Get in Touch with Us!</h1>
                        <p class="fs-6 text-muted">
                            We'd love to hear from you! Whether you have questions, feedback, or need assistance, our
                            team is here to
                            help. Please feel free to reach out using any of the
                            contact methods below, and we'll get back to you as soon as possible.
                        </p>
                        <form id="contactForm" class="d-flex flex-column gap-3 flex-grow-1 m-0">
                            <div class="d-flex flex-column flex-md-row gap-4">
                                <div class="form-group d-flex flex-column gap-2 w-100">
                                    <label for="name" class="fw-medium">Name:</label>
                                    <input type="text" class="form-control" id="feedbackName" name="feedbackName"
                                        placeholder="Enter your name" required />
                                </div>
                                <div class="form-group d-flex flex-column gap-2 w-100">
                                    <label for="email" class="fw-medium">Email: </label>
                                    <input type="email" class="form-control" id="feedbackEmail" name="feedbackEmail"
                                        placeholder="Enter your email" required />
                                </div>
                            </div>
                            <div class="form-group d-flex flex-column gap-2 w-100 h-100">
                                <label for="message" class="fw-medium">Message: </label>
                                <textarea name="feedbackMsg" class="form-control h-100" id="feedbackMsg"
                                    placeholder="Enter your message" style="resize: none; min-height: 200px"
                                    required></textarea>
                            </div>
                            <button type="submit" id="contactBtn" class="btn btn-success ps-5 pe-5"
                                style="width: max-content">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5 pt-5 pb-5" id="contact3">
        <div class="container-lg">
            <h1 class="fs-2 text-center">Frequently Asked Questions</h1>
            <div class="row mt-5" id="faqCont">

            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3921.174899984059!2d122.94030799999999!3d10.643517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTDCsDM4JzM2LjciTiAxMjLCsDU2JzI1LjEiRQ!5e0!3m2!1sen!2sph!4v1740560374603!5m2!1sen!2sph"
            width="100%" height="900" style="border: 0" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- FOOTER -->
    <?php include "./components/footer.php" ?>
    <script src="./assets/js/contacts.js"></script>
</body>

</html>