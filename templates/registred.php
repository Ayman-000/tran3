<?php
session_start();

// Check if registration data exists in session
if (!isset($_SESSION['registration_data'])) {
    // Redirect to registration page if no registration data
    header('Location: /register-2');
    exit;
}

// Get registration data from session
$registrationData = $_SESSION['registration_data'];
$registrationType = $_SESSION['registration_type'] ?? 'personal';

// Clear registration data from session
unset($_SESSION['registration_data']);
unset($_SESSION['registration_type']);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tranferto - Registration Confirmation</title>

    <link rel="shortcut icon" href="/assets/img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/css/plugin/nice-select.css">
    <link rel="stylesheet" href="/assets/css/plugin/slick.css">
    <link rel="stylesheet" href="/assets/css/custom-family.css">
    <link rel="stylesheet" href="/assets/css/plugin/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/plugin/animate.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/style-rtl.min.css" id="rtl-stylesheet" disabled>
</head>

<body>
    <!-- start LTR to RTL -->
    <div class="position-fixed d-flex flex-column text-center" id="draggableDiv">
        <button id="btn-ltr" class="rounded-2 py-2 px-3">LTR</button>
        <span class="draggable py-2"><i class="fas fa-arrows-alt xxlr m-0"></i></span>
        <button id="btn-rtl" class="rounded-2 py-2 px-3">RTL</button>
    </div>
    <!-- end LTR to RTL -->

    <!-- start preloader -->
    <div class="preloader" id="preloader"></div>
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>
    <!-- Scroll To Top End -->

    <!-- banner-section start -->
    <section class="banner-section inner-pages open-positions">
        <div class="overlay">
            <div class="banner-content pb-120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-10">
                            <div class="main-content">
                                <div class="breadcrumb-area">
                                    <nav aria-label="breadcrumb">
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-bottom-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="top-area">
                            <h1 class="text-uppercase">Thank You for Registering!</h1>
                            <p class="xlr">We have successfully received your registration request. Our support team will review your details and respond to your email within 24 hours. If you have any questions in the meantime, feel free to contact us</p>
                            <a href="/" class="cmn-btn">BACK TO TRANFERTO</a>
                            <div class="time-area d-flex align-items-center justify-content-center">
                                <span></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 text-start">
                                <div class="bottom-area">
                                    <div class="single">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/proper-min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/fontawesome.js"></script>
    <script src="/assets/js/plugin/slick.js"></script>
    <script src="/assets/js/plugin/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/plugin/apexcharts.min.js"></script>
    <script src="/assets/js/plugin/jquery.nice-select.min.js"></script>
    <script src="/assets/js/plugin/wow.min.js"></script>
    <script src="/assets/js/plugin/plugin.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html> 