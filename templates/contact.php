<?php
session_start();
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $company = $_POST['company'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    
    // Validate input
    $errors = [];
    if (empty($name)) $errors[] = 'Name is required';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required';
    if (empty($message)) $errors[] = 'Message is required';
    
    if (empty($errors)) {
        // Process the form (send email, save to database, etc.)
        // For now, just store success message
        $_SESSION['success_message'] = 'Thank you for your message. We will get back to you soon.';
        header('Location: /contact');
        exit();
    } else {
        $_SESSION['error_message'] = implode('<br>', $errors);
        $_SESSION['form_data'] = $_POST;
    }
}

// Get flash messages
$success_message = $_SESSION['success_message'] ?? null;
$error_message = $_SESSION['error_message'] ?? null;
$form_data = $_SESSION['form_data'] ?? [];
unset($_SESSION['success_message'], $_SESSION['error_message'], $_SESSION['form_data']);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tranferto - Money Transfer and Online Payments</title>

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
                            <img src="/img/logojb.png" class="logo" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/about-us">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/our-team">Our Team</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/contact">Contact Us</a>
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
                                            <li><a class="nav-item" href="/contact">Contact</a></li>
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
    <section class="banner-section inner-pages contact">
        <div class="overlay">
            <div class="banner-content pb-120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-10">
                            <div class="main-content">
                                <h1>Contact</h1>
                                <div class="breadcrumb-area">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb d-flex gap-1 align-items-center">
                                            <li class="breadcrumb-item p-0 position-relative"><a href="/">Home</a></li>
                                            <li class="breadcrumb-item p-0 position-relative"><a href="javascript:void(0)">Pages</a></li>
                                            <li class="breadcrumb-item p-0 position-relative active" aria-current="page">Contact</li>
                                        </ol>
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
                    <div class="col-lg-12 cus-z">
                        <div class="row cus-mar">
                            <div class="col-lg-4 col-md-6">
                                <div class="single-item text-center">
                                    <div class="top-area">
                                        <div class="icon-area">
                                            <img src="/assets/img/contact-banner-icon-1.png" alt="image">
                                        </div>
                                        <h4 class="text-uppercase">Personal</h4>
                                        <p>Money Transfer</p>
                                    </div>
                                    <div class="bottom-area d-flex align-items-center">
                                        <div class="icon-bottom">
                                            <img src="/assets/img/sms-icon.png" alt="image">
                                        </div>
                                        <p>support@tranferto.com</p>
                                    </div>
                                    <div class="bottom-area d-flex align-items-center">
                                        <div class="icon-bottom">
                                            <img src="/assets/img/call-icon.png" alt="image">
                                        </div>
                                        <p>+1 (845) 530-0103</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-item text-center">
                                    <div class="top-area">
                                        <div class="icon-area">
                                            <img src="/assets/img/contact-banner-icon-2.png" alt="image">
                                        </div>
                                        <h4 class="text-uppercase">Business</h4>
                                        <p>International Payments</p>
                                    </div>
                                    <div class="bottom-area d-flex align-items-center">
                                        <div class="icon-bottom">
                                            <img src="/assets/img/sms-icon.png" alt="image">
                                        </div>
                                        <p>support@tranferto.com</p>
                                    </div>
                                    <div class="bottom-area d-flex align-items-center">
                                        <div class="icon-bottom">
                                            <img src="/assets/img/call-icon.png" alt="image">
                                        </div>
                                        <p>+1 (845) 530-0104</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-item text-center">
                                    <div class="top-area">
                                        <div class="icon-area">
                                            <img src="/assets/img/contact-banner-icon-3.png" alt="image">
                                        </div>
                                        <h4 class="text-uppercase">Chat with us</h4>
                                        <p>Money Transfer</p>
                                    </div>
                                    <div class="bottom-area offline">
                                        <h6>Monday – Saturday (9am to 5pm)</h6>
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

    <!-- Contact Form In start -->
    <section class="contact-form">
        <div class="overlay pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-header text-center">
                            <h2 class="title">Get in touch with us for more information</h2>
                            <p>If you need help or have a question, we're here for you</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <?php if ($success_message): ?>
                            <div class="alert alert-success"><?php echo $success_message; ?></div>
                        <?php endif; ?>
                        <?php if ($error_message): ?>
                            <div class="alert alert-danger"><?php echo $error_message; ?></div>
                        <?php endif; ?>
                        <div class="form-area">
                            <form action="/contact" method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="single-input d-flex align-items-center">
                                            <input type="text" name="name" required placeholder="Name" value="<?php echo htmlspecialchars($form_data['name'] ?? ''); ?>">
                                            <img src="/assets/img/contact-user-icon.png" alt="image">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="single-input d-flex align-items-center">
                                            <input type="email" name="email" required placeholder="Email" value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>">
                                            <img src="/assets/img/contact-email-icon.png" alt="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="single-input d-flex align-items-center">
                                            <input type="text" name="phone" placeholder="Phone (if available)" value="<?php echo htmlspecialchars($form_data['phone'] ?? ''); ?>">
                                            <img src="/assets/img/contact-phone-icon.png" alt="image">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="single-input d-flex align-items-center">
                                            <input type="text" name="company" placeholder="Company (if available)" value="<?php echo htmlspecialchars($form_data['company'] ?? ''); ?>">
                                            <img src="/assets/img/contact-com-icon.png" alt="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="single-input d-flex align-items-center">
                                            <input type="text" name="subject" placeholder="Subject" value="<?php echo htmlspecialchars($form_data['subject'] ?? ''); ?>">
                                            <img src="/assets/img/contact-sub-icon.png" alt="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="single-input">
                                            <textarea name="message" placeholder="Message" required><?php echo htmlspecialchars($form_data['message'] ?? ''); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-area text-center">
                                    <button type="submit" class="cmn-btn">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form In end -->

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/proper-min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/fontawesome.js"></script>
    <script src="/assets/js/plugin/slick.js"></script>
    <script src="/assets/js/plugin/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/plugin/apexcharts.min.js"></script>
    <script src="/assets/js/plugin/jquery.nice-select.min.js"></script>
    <script src="/assets/js/plugin/jquery.countdown.js"></script>
    <script src="/assets/js/plugin/wow.min.js"></script>
    <script src="/assets/js/plugin/plugin.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html> 