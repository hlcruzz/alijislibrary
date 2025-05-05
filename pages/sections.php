<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alijis Campus Library</title>
    <link rel="stylesheet" href="assets/css/contacts.css" />

    <?php include "./components/links.php" ?>
</head>
<?php $_GET['page'] = "gallery"; ?>
<?php include "./components/modal.php" ?>

<body class="overflow-x-hidden">
    <!-- Navigation Bar -->
    <?php include "./components/navbar.php"; ?>

    <!-- CONTENT -->
    <div class="container-fluid p-0"
        style="background-image: url(./assets/img/sections.jpg);  background-position: center; background-repeat: no-repeat; background-size: cover; height: 75vh;">
        <div class="d-flex w-100 h-100 justify-content-center align-items-center flex-column text-light"
            style="background-color: rgb(0, 0, 0, 0.4);">
            <h1 class="">Library Sections</h1>
            <p>Home / Library Sections</p>
        </div>
    </div>

    <div class="container-lg my-5 d-flex flex-column gap-4" id="sectionsCont">
        <!-- <div class="row row-cols-1 row-cols-lg-2 mt-4">
            <div class="col" style="max-height: 500px">
                <img src="./assets/img/filipiniana.jpg" class="h-100 w-100 object-fit-cover rounded-3" alt="">
            </div>
            <div class="col px-3 pb-2 mt-3 mt-lg-0">
                <h1 class="fs-3 text-success">Filipiniana Section</h1>
                <p>Welcome to the Filipiniana Library — a dedicated section for materials that celebrate the rich
                    culture, history, and heritage of the Philippines. Here, you’ll find a wide collection of books,
                    periodicals, and documents written by Filipino authors or about the Philippines. Our collection
                    includes literature, historical records, local studies, and government publications that aim to
                    promote national pride and cultural awareness. Whether you're a student, researcher, or casual
                    reader, the Filipiniana Library offers resources that highlight the beauty and identity of the
                    Filipino people. Welcome to the Filipiniana Library — a dedicated section for materials that
                    celebrate the rich
                    culture, history, and heritage of the Philippines. Here, you’ll find a wide collection of books,
                    periodicals, and documents written by Filipino authors or about the Philippines. Our collection
                    includes literature, historical records, local studies, and government publications that aim to
                    promote national pride and cultural awareness. Whether you're a student, researcher, or casual
                    reader, the Filipiniana Library offers resources that highlight the beauty and identity of the
                    Filipino people. </p>
            </div>
        </div> -->

    </div>
    <!-- FOOTER -->
    <?php include "./components/footer.php" ?>
</body>

</html>