<?php
session_start();
require_once "_inc/config.php";
require_once "_inc/function.php";
include_once '_partials/header.php';
?>


<!--<div class="bg-contact2" style="background-image: url('/*images/bg-01.jpg*/');">-->

    <div class="container bg-light ">
        <div class="title-text">
            <div class="bg-light">
                <div class="container py-5">
                    <div class="row h-100 align-items-center py-5">
                        <div class="col-lg-6">
                            <h1 class="display-4">About us page</h1>
                            <p> </p>
                            <p style="text-align: justify;">We’re excited to welcome you to our Library and to share with you some highlights about our services, spaces and people all dedicated to supporting you in your studies and teaching, learning and research endeavours</p>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834136/illus_kftyh4.png" alt="" class="img-fluid"></div>
                    </div>
                </div>
            </div>

            <div class="bg-white py-5">
                <div class="container py-5">
                    <div class="row align-items-center mb-5">
                        <div class="col-lg-6 order-2 order-lg-1" style="text-align: justify;"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                            <h2 class="font-weight-light">Who we are</h2>
                            <span class=" mb-4">From our humble beginnings in 1999, our Library has grown to become one of Slovakia leading libraries. </span>
                            <span class="collapse " id="viewdetails3"> The services and resources that the Library provides are the bedrock on which our
                    community builds its high standard of learning, teaching and research.
                    The Library today combines traditional roles with an ongoing commitment to transformation of its facilities and
                    services in order to assist people meeting their objectives.
                    </span>

                            <p>
                                <a class="btn text-primary" data-toggle="collapse" data-target="#viewdetails3">Read more</a>
                            </p>
                        </div>
                        <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834139/img-1_e25nvh.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-5 px-5 mx-auto"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834136/img-2_vdgqgn.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                        <div class="col-lg-6" style="text-align: justify;"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
                            <h2 class="font-weight-light">What we do</h2>
                            <span class=" mb-4">The library is far more than just a place full of books—although we do have millions of print and digital resources for you to explore! </span>
                            <span class="collapse " id="viewdetails4"> Our diverse staff are skilled in the areas of digital literacy, research support, innovation and much more. No matter
                    which branch you’re on, you can find expert guidance and advice at our service desk or through our Library Chat service.
                    </span>

                            <p>
                                <a class="btn text-primary" data-toggle="collapse" data-target="#viewdetails4">Read more</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-light py-5">
                <div class="container py-5">
                    <div class="row mb-4">
                        <div class="col-lg-5">
                            <h2 class="display-4 font-weight-light">Our team</h2>
                        </div>
                    </div>

                    <div class="row text-center">
                        <!-- Team item-->
                        <div class="col-xl-3 col-sm-6 mb-5">
                            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-2_f8dowd.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                <h5 class="mb-0">Jakub Tomáš</h5><span class="small text-uppercase text-muted">CEO - Founder</span>

                            </div>
                        </div>
                        <!-- End-->

                        <!-- Team item-->
                        <div class="col-xl-3 col-sm-6 mb-5">
                            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834130/avatar-3_hzlize.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                <h5 class="mb-0">Patrik Strausz</h5><span class="small text-uppercase text-muted">CEO - Founder</span>

                            </div>
                        </div>
                        <!-- End-->

                        <!-- Team item-->
                        <div class="col-xl-3 col-sm-6 mb-5">
                            <div class="bg-white rounded shadow-sm py-5 px-4">
                                <img src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-2_f8dowd.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                <h5 class="mb-0">Jakub Vašinsky</h5><span class="small text-uppercase text-muted">CEO - Founder</span>

                            </div>
                        </div>
                        <!-- End-->

                        <!-- Team item-->
                        <div class="col-xl-3 col-sm-6 mb-5">
                            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                <h5 class="mb-0">Ladislav Rácz</h5><span class="small text-uppercase text-muted">CEO - Founder</span>

                            </div>
                        </div>
                        <!-- End-->

                    </div>
                </div>
            </div>





<?php include_once '_partials/footer.php' ?>
