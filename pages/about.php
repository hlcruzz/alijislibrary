<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alijis Campus Library</title>

  <link rel="stylesheet" href="assets/css/about.css" />
  <?php include "./components/links.php" ?>
  <?php include "./components/modal.php" ?>
</head>
<?php $page = "about"; ?>

<body class="overflow-x-hidden">
  <!-- Navigation Bar -->
  <?php include "./components/navbar.php"; ?>


  <!-- CONTENT -->
  <div class="container-fluid p-0 p-5" style="background-color: #def4df">
    <div class="container-fluid d-flex justify-content-center justify-content-xl-between align-items-center"
      style="height: 40vh">
      <img src="assets/img/about-1.png" class="d-none d-xl-block" width="400px" alt="" />
      <div class="text-center">
        <h1 class="text-success">About Us</h1>
        <p class="fw-light">Home / About Us</p>
      </div>
      <img src="assets/img/about-2.png" class="d-none d-xl-block" width="400px" alt="" />
    </div>
  </div>
  <div class="container-fluid">
    <div class="container-lg py-5">
      <div class="row">
        <div class="col col-12 col-md-5 p-0">
          <img src="./assets/img/alijis-campus.png" class="w-100 h-100 object-fit-cover rounded-4" alt="">
        </div>
        <div class="col col-12 col-md-7 p-0">
          <div class="p-4 ms-md-4">
            <h1 class="fs-3 fw-bolder text-success pb-3">About US</h1>
            <p>
              Welcome to <b>Alijis Campus Library</b>, a place where knowledge, learning, and community come together.
              Our
              library is dedicated to providing access to a vast collection of books, digital resources, and research
              materials to support education and lifelong learning.
              <br>
              <br>
              At <b>Alijis Campus Library</b>, we believe that libraries are more than just books—they are gateways to
              discovery,
              creativity, and innovation. Whether you are a student, researcher, or casual reader, our library offers a
              welcoming space for reading, studying, and exploring new ideas.
              <br>
              <br>
              We are committed to fostering a love for reading and learning by offering a variety of services, including
              book lending, research assistance, digital resources, and educational programs. Our team is always ready
              to help you find the information and resources you need.
              <br>
              <br>
              Join us in our mission to inspire knowledge and empower minds. Visit <b>Alijis Campus Library</b> today
              and
              discover a world of possibilities!
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="container-lg">
      <div class="row" id="foundationCont">

      </div>
    </div>
  </div>

  <div class="container-fluid mt-5">
    <div class="container-lg">
      <div class="d-flex align-items-center gap-3">
        <div class="border w-100"></div>
        <h1 class="m-0 fs-1">GUIDELINES</h1>
        <div class="border w-100"></div>
      </div>
      <div class="d-flex gap-3 mt-5 mb-5 flex-column flex-md-row">
        <div class="list-unstyled d-flex gap-3 flex-column" id="guidlineNameCont">
          <!-- <div class="d-flex align-items-center" role="button">
            <li class="guideBtn p-3 ps-4 pe-5 w-100" style="background-color: var(--primary-color);
  color: white;">Library Access & Identification</li>
            <i class="fa-solid fa-play position-relative guideArrow" style="right: 2; visibility: visible;"></i>
          </div>
          <div class=" d-flex align-items-center" role="button">
            <li class="guideBtn p-3 ps-4 pe-5 w-100 ">Personal Belongings & Responsibility</li>
            <i class="fa-solid fa-play position-relative guideArrow" style="right: 2; visibility: hidden;"></i>
          </div>
          <div class=" d-flex align-items-center" role="button">
            <li class="guideBtn p-3 ps-4 pe-5 w-100 ">Entrance & Exit Procedures</li>
            <i class="fa-solid fa-play position-relative guideArrow" style="right: 2; visibility: hidden;"></i>
          </div>
          <div class=" d-flex align-items-center" role="button">
            <li class="guideBtn p-3 ps-4 pe-5 w-100 ">Library Conduct & Behavior</li>
            <i class="fa-solid fa-play position-relative guideArrow" style="right: 2; visibility: hidden;"></i>
          </div>
          <div class=" d-flex align-items-center" role="button">
            <li class="guideBtn p-3 ps-4 pe-5 w-100 ">Library Materials Usage & Care</li>
            <i class="fa-solid fa-play position-relative guideArrow" style="right: 2; visibility: hidden;"></i>
          </div>
          <div class=" d-flex align-items-center" role="button">
            <li class="guideBtn p-3 ps-4 pe-5 w-100 ">Borrowing, Overdue, and Fines</li>
            <i class="fa-solid fa-play position-relative guideArrow" style="right: 2; visibility: hidden;"></i>
          </div>
          <div class=" d-flex align-items-center" role="button">
            <li class="guideBtn p-3 ps-4 pe-5 w-100 ">Special Conditions</li>
            <i class="fa-solid fa-play position-relative guideArrow" style="right: 2; visibility: hidden;"></i>
          </div> -->

        </div>
        <div class="flex-grow-1 p-3">
          <h1 class="fs-5">General Rules</h1>
          <div class="mt-3" id="rules-cont">
            <!-- <div class="rules">
              <ul class="d-flex flex-column gap-3">
                <li> Library customers with valid identification cards are allowed entrance to the library. For CHMSC
                  students, they must be in proper uniform, with school I.D. and library card.</li>
                <li>A visitor must present an Identification card and visitor’s I.D. issued by the College Security
                  Guard.
                </li>
              </ul>
            </div>
            <div class="rules">
              <ul class="d-flex flex-column gap-3">
                <li> Valuable things such as cell phones, money, laptops, jewelry, etc., should not be left in the
                  depository area. The person in charge is not accountable for the loss of these items.</li>
                <li>Personal book/s may be brought inside the library provided that permission is first sought from the
                  person assigned at the entrance.
                </li>
              </ul>
            </div>
            <div class="rules">
              <ul class="d-flex flex-column gap-3">
                <li> Customers must log in their library card number in the computer at the entrance upon entering the
                  library.</li>
                <li>Appropriate ways should be utilized for entrance to and exit from the library.
                </li>
                <li>
                  Customers going in and out of the library are required to have their things checked and inspected
                  before
                  leaving.
                </li>
              </ul>
            </div>
            <div class="rules">
              <ul class="d-flex flex-column gap-3">
                <li> Silence should be observed at all times.
                </li>
                <li>Eating, sleeping, smoking, and project making are strictly prohibited.
                </li>
                <li>
                  Orderly and proper use of library furniture and equipment must be observed.
                </li>
                <li>Cell phones should be set in silent mode.</li>
                <li>Taking pictures of unpublished materials is prohibited.</li>
              </ul>
            </div>
            <div class="rules">
              <ul class="d-flex flex-column gap-3">
                <li> Books and other reading materials should be handled with care.
                </li>
                <li>Books taken from the open shelves area should be placed on the designated shelves or area for easy
                  return by the library staff to appropriate shelves.
                </li>
                <li>
                  Library material reported lost or damaged must be replaced by the borrower with the latest edition of
                  the same title. If such material is not available in the market, replacement of any current library
                  material of the same subject is allowed, provided the value is not less than the actual amount of the
                  lost or damaged one.
                </li>
                <li>All library materials must be properly processed before taken out of the library. Anybody caught
                  stealing any library materials shall be subjected to disciplinary action.</li>
                <li>Customers (students, faculty, and staff) are not allowed to borrow any library materials for use by
                  other customers.</li>
                <li>Library card should be used to borrow books and other reading materials.</li>
              </ul>
            </div>
            <div class="rules">
              <ul class="d-flex flex-column gap-3">
                <li> Students are given a maximum of three (3) working days to return overdue books, or else they will
                  be
                  banned from library services for the rest of the current semester. The ban is not lifted even if the
                  book is returned or the fine is paid during the ban period.
                </li>
                <li>Students who borrowed books for home use and who cannot return on the due date can make use of the
                  borrower’s entry slip to avail of library services but for three (3) working days only, as far as
                  policy
                  in banning is concerned.
                </li>
                <li>
                  A fine slip is issued to students who have overdue fines and is valid for three (3) working days only.
                  It can be used to avail of library services provided a student is not yet banned.
                </li>
                <li>Payment of fines for overdue library materials and library card replacement should be made at the
                  cashier’s office.</li>
              </ul>
            </div>
            <div class="rules">
              <ul class="d-flex flex-column gap-3">
                <li> Charging of cell phones is strictly prohibited.
                </li>
                <li>Home use of books is not allowed three days before the mid-term and final examinations as well as
                  during the said examinations. It will resume on the last date of mid-term examination. Moreover,
                  during
                  and after signing of clearance, photocopying is allowed provided the clearance form is attached with
                  the
                  library card.
                </li>

              </ul>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid p-0">
    <div class="container-lg">
      <div class="text-center">
        <h1 class="fs-1 text-success">Library Personnel</h1>
        <p class="fs-6 text-dark-emphasis">Our dedicated staff ensures efficient access to resources and quality support
          for all users.</p>
      </div>

      <div class="container-lg">
        <div class="d-flex justify-content-center align-items-center">
          <div class="col col-12 col-sm-6 col-lg-3 col-lg-4 p-3 text-center">
            <img src="assets/img/librarian1.png" class="w-100" style="height: 300px; object-fit: contain" />
            <div class="mt-3">
              <h1 class="fs-5 text-dark m-0">Ms. Ma Loreta J. Santes RL, MSLS</h1>
              <p class="pt-2 m-0">Head Librarian</p>
            </div>
          </div>
        </div>
        <div class="row mt-5 text-center">
          <div class="col col-12 col-sm-6 mb-5">
            <div class="w-100 p-3">
              <img src="assets/img/librarian2.png" class="" style="height: 300px; object-fit: contain" />
              <div class="mt-3">
                <h1 class="fs-5 text-dark m-0">Ms. Maricel S. Sanoria RL, MSLS</h1>
                <p class="pt-2 m-0">Librarian for Library Services</p>
              </div>
            </div>
          </div>
          <div class="col col-12 col-sm-6 mb-5">
            <div class="w-100 p-3">
              <img src="assets/img/librarian3.png" class="" style="height: 300px; object-fit: contain" />
              <div class="mt-3">
                <h1 class="fs-5 text-dark m-0">Ms. Rhinalyn S. Gela</h1>
                <p class="pt-2 m-0">Library Clerk</p>
              </div>
            </div>
          </div>
          <div class="col col-12 col-sm-6 mb-5">
            <div class="w-100 p-3">
              <img src="assets/img/librarian4.png" class="" style="height: 300px; object-fit: contain" />
              <div class="mt-3">
                <h1 class="fs-5 text-dark m-0">Ms. Estarlyn M. Vendero</h1>
                <p class="pt-2 m-0">Library Clerk</p>
              </div>
            </div>
          </div>
          <div class="col col-12 col-sm-6 mb-5">
            <div class="w-100 p-3">
              <img src="assets/img/librarian5.png" class="" style="height: 300px; object-fit: contain" />
              <div class="mt-3">
                <h1 class="fs-5 text-dark m-0">Mr. Anthony J. Espinosa</h1>
                <p class="pt-2 m-0">Library Clerk</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <?php include "./components/footer.php" ?>

</body>

</html>