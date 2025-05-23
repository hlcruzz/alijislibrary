<div class="modal fade p-0 m-0" style="max-height: 100%;" id="viewImgNewsModal" aria-hidden="true"
    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog m-0 mx-auto d-flex justify-content-center align-items-center modal-dialog h-100 w-100">
        <div class="modal-content border-0 rounded-0 bg-transparent">
            <div class="modal-body p-0 ">
                <div id="carouselExampleIndicators" class="carousel slide h-100 w-100 position-relative"
                    data-bs-ride="carousel">

                    <div class="carousel-indicators" id="carousel-btn"></div>

                    <div class="carousel-inner" id="news-img-carousel" style="height: 100vh;">

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev" style="width: 5%; z-index: 1055;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next" style="width: 5%; z-index: 1055;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="aboutModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex justify-content-center align-items-center gap-3 w-100">
                    <i class="fa-solid fa-bookmark text-success fs-2"></i>
                    <h1 class="fs-2 m-0" id="modalFoundationName"></h1>
                    <i class="fa-solid fa-bookmark text-success fs-2"></i>
                </div>
            </div>
            <div class="modal-body" id="modalFoundationTxt">

            </div>
        </div>
    </div>
</div>

<div class="modal fade p-0 m-0" style="max-height: 100%;" id="previewGalleryModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="m-0 mx-auto d-flex justify-content-center align-items-center modal-dialog h-100 w-100">
        <img src="" alt="" id="previewGalleryImg" class="w-auto h-100 object-fit-contain" srcset=""
            style="max-width: 100%;">
    </div>
</div>

<?php
$visitor = $_COOKIE['visitor'] ?? null;
if (!$visitor): ?>
    <div class="modal fade modal-xl" id="addVisitorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="addVisitorForm">
                    <div class="modal-body">
                        <div class="row row-cols-1 row-cols-lg-2">
                            <div class="col">
                                <div class="m-4">
                                    <div class="">
                                        <h1 class="fs-1">Welcome to the Library!</h1>
                                        <p class="fs-5">Please indicate your affiliation with our institution.</p>
                                    </div>
                                    <div class="d-flex flex-column gap-3">
                                        <label class="me-3" style="font-size: large">
                                            <input type="radio" name="visitorType" class="form-check-input me-2"
                                                value="Student" required>
                                            Student
                                        </label>

                                        <label class="me-3" style="font-size: large">
                                            <input type="radio" name="visitorType" class="form-check-input me-2"
                                                value="Faculty">
                                            Faculty (teaching/research)
                                        </label>

                                        <label class="me-3" style="font-size: large">
                                            <input type="radio" name="visitorType" class="form-check-input me-2"
                                                value="Staff">
                                            Staff (non-teaching)
                                        </label>

                                        <label class="me-3" style="font-size: large">
                                            <input type="radio" name="visitorType" class="form-check-input me-2"
                                                value="Alumni">
                                            Alumni
                                        </label>

                                        <label class="me-3" style="font-size: large">
                                            <input type="radio" name="visitorType" class="form-check-input me-2"
                                                value="Guest">
                                            Guest
                                        </label>
                                        <div class="g-recaptcha" data-sitekey="6LeuRjIrAAAAAPJGDMymd5BOp1Aih4QVfE220aOZ">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success px-5 mt-4">Proceed</button>
                                </div>
                            </div>
                            <div class="col d-none d-lg-block">
                                <img src="./assets/img/alijis-campus.png" class="w-100 h-100 object-fit-cover rounded-2"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif ?>