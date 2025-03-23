<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alijis Campus Library - Library News</title>
    <link rel="stylesheet" href="assets/css/index.css" />
    <?php include "./components/links.php" ?>
</head>
<?php $page = "library-news"; ?>
<?php include "./components/modal.php" ?>

<body class="overflow-x-hidden">
    <?php include "./components/navbar.php" ?>

    <div class="container-fluid p-0 p-5" style="background-color: #def4df">
        <div class="container-fluid d-flex justify-content-center justify-content-xl-between align-items-center"
            style="height: 40vh">
            <img src="assets/img/about-1.png" class="d-none d-xl-block" width="400px" alt="" />
            <div class="text-center">
                <h1 class="text-success">Library News</h1>
                <p class="fw-light">Home / Library News</p>
            </div>
            <img src="assets/img/about-2.png" class="d-none d-xl-block" width="400px" alt="" />
        </div>
    </div>
    <div class="container-lg pt-5 pb-5" id="home">
        <form id="searchNews" class="d-flex align-items-center gap-2">
            <input type="search" name="search" id="search" class="form-control"
                placeholder="Search Library News Keywords">
            <button type="submit" id="searchNewsBtn"
                class="form-control w-auto btn btn-success ps-4 pe-4">Search</button>
        </form>
        <div class="text-center" id="searchResultDisplay"></div>
        <div class="row row-cols-1" id="newsContainer">

        </div>
        <div class="text-center mt-5" id="newsLoading">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <?php include "./components/footer.php" ?>
</body>

</html>