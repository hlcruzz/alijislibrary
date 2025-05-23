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

    </div>
    <!-- FOOTER -->
    <?php include "./components/footer.php" ?>
</body>

</html>