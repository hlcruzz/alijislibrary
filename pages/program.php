<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alijis Campus Library</title>
  <link rel="stylesheet" href="assets/css/program.css" />
  <?php include "./components/links.php" ?>
</head>

<?php $_GET['page'] = "programs"; ?>

<?php include "./components/modal.php" ?>

<body class="overflow-x-hidden">

  <?php include "./components/navbar.php"; ?>
  <!-- CONTENT -->
  <div class="container-fluid p-0" id="program1" style="height: 75vh;">
    <div class="d-flex justify-content-center align-items-center flex-column text-light">
      <h1 class="">Library Programs</h1>
      <p>Home / Programs</p>
    </div>
  </div>

  <div class="container-fluid pb-5" id="program2">
    <div class="container-lg">
      <div class="text-center pt-5 mb-4">
        <h1 class="text-success fs-2">Objectives</h1>
        <p class="text-muted fs-6">
          The Alijis Campus Library (ACL) community extension program is created to support CHMSU
          vision-mission i.e
          <br />
          to provide extension and training services responsive to the need of the community.
        </p>
      </div>
      <div class="row" id="objectives-container">
        <!-- <div class="col col-12 col-lg-6 pt-5 pb-5 col-xl-4 p-3">
          <div class="card p-5 h-100">
            <span class="material-symbols-outlined"> groups </span>
            <small class="mt-3">Promote extension projects through outreach engagement activity in the
              identified areas
              and/or barangays.</small>
          </div>
        </div>
        <div class="col col-12 col-lg-6 pt-5 pb-5 col-xl-4 p-3">
          <div class="card p-5 h-100">
            <span class="material-symbols-outlined"> laptop_mac </span>
            <small class="mt-3">Provide free lectures, trainings, storytelling and other related beneficial
              activities that
              addresses their learning needs.</small>
          </div>
        </div>
        <div class="col col-12 col-lg-6 pt-5 pb-5 col-xl-4 p-3">
          <div class="card p-5 h-100">
            <span class="material-symbols-outlined"> school </span>
            <small class="mt-3">
              Coordinate with faculty members in conducting library outreach for free lectures and
              training that are
              related in their field of expertise and/or specialization.
            </small>
          </div>
        </div>
        <div class="col col-12 col-lg-6 pt-5 pb-5 col-xl-4 p-3">
          <div class="card p-5 h-100">
            <span class="material-symbols-outlined"> diversity_3 </span>
            <small class="mt-3">
              Coordinate with the college community and extension coordinator and local government units
              in conducting
              outreach projects and events to assist the delivery of
              library activities.
            </small>
          </div>
        </div>
        <div class="col col-12 col-lg-6 pt-5 pb-5 col-xl-4 p-3">
          <div class="card p-5 h-100">
            <span class="material-symbols-outlined"> search </span>
            <small class="mt-3">
              Research reference consultation that provide personalized research reference consultations
              to assist
              community members, students, and professionals in finding
              relevant and reliable resources for their academic, professional, or personal research
              needs.
            </small>
          </div>
        </div>
        <div class="col col-12 col-lg-6 pt-5 pb-5 col-xl-4 p-3">
          <div class="card p-5 h-100">
            <span class="material-symbols-outlined"> database </span>
            <small class="mt-3">Face-to-face tutorial on the use of subscribed databases, online library
              system
              and online
              public access catalog (OPAC).</small>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <div class="container-fluid pt-5 pb-5">
    <div class="text-center">
      <h1 class="fs-1 text-success">Online Reference Tools</h1>
      <p class="fs-6 text-muted">These free links provide web-based resources that will help instructors <br />and
        students find answers to quick and factual information.</p>
    </div>

    <div class="container-xl">
      <div class="row mt-5">

        <div class="col col-12 col-lg-6 pt-5 pb-5">
          <h3 class="fs-2 text-dark-emphasis mb-5">Dictionaries</h3>
          <div id="dictionariesCont">

          </div>
        </div>
        <div class="col col-12 col-lg-6 pt-5 pb-5">
          <h3 class="fs-2 text-dark-emphasis mb-5">Encyclopedias</h3>
          <div id="encyclopediasCont">

          </div>
        </div>
        <div class="col col-12 col-lg-6 pt-5 pb-5">
          <h3 class="fs-2 text-dark-emphasis mb-5">Maps</h3>
          <div id="mapsCont">

          </div>
        </div>
        <div class="col col-12 col-lg-6 pt-5 pb-5">
          <h3 class="fs-2 text-dark-emphasis mb-5">General References</h3>
          <div id="generalRefCont">

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- FOOTER -->
  <?php include "./components/footer.php" ?>
</body>

</html>