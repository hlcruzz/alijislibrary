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
        style="background-image: url(./assets/img/homepage1.jpg);  background-position: center; background-repeat: no-repeat; background-size: cover; height: 75vh;">
        <div class="d-flex w-100 h-100 justify-content-center align-items-center flex-column text-light"
            style="background-color: rgb(0, 0, 0, 0.4);">
            <h1 class="">New Arrival: Periodicals</h1>
            <p>Home / New Arrival: Periodicals</p>
        </div>
    </div>

    <div class="container-lg my-5 ">
        <form id="sortForm" class="border p-3">
            <div class="d-flex gap-3 flex-column flex-lg-row">
                <input type="text" class="form-control" id="sortTitle" name="sortTitle"
                    placeholder="Title or Description">
                <select name="sortType" id="sortType" class="form-select">
                    <option value="" selected>All Type</option>
                    <option value="Magazine">Magazine</option>
                    <option value="Journal">Journal</option>
                </select>
                <select name="sortCategory" id="sortCategory" class="form-select">
                    <option value="" selected>All Category</option>
                    <option value="Arts & Culture">Arts & Culture</option>
                    <option value="Science & Technology">Science & Technology</option>
                    <option value="Health & Wellness">Health & Wellness</option>
                    <option value="Business & Economics">Business & Economics</option>
                    <option value="History & Politics">History & Politics</option>
                    <option value="Lifestyle & Entertainment">Lifestyle & Entertainment</option>
                </select>
                <select name="sortBy" id="sortBy" class="form-select">
                    <option value="DESC" selected>Sort by latest</option>
                    <option value="ASC">Sort by oldest</option>
                </select>
                <div class="d-flex gap-3 justify-content-end">
                    <button type="submit" class="btn btn-success px-5 d-flex align-items-center"><span
                            class="material-symbols-outlined">
                            filter_alt
                        </span> Filter</button>
                    <button type="reset" class="btn btn-danger d-flex align-items-center"><span
                            class="material-symbols-outlined">
                            cached
                        </span></button>
                </div>
            </div>
        </form>

        <!-- CONTENT -->
        <div class="mt-5">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 m-0" id="periodicalCont">


            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <?php include "./components/footer.php" ?>

</body>

</html>