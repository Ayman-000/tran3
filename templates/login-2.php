<?php
session_start();
// If user is already logged in, redirect to dashboard
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header('Location: /dashboard');
    exit();
}

// Handle flash messages
$error_message = $_SESSION['error_message'] ?? null;
unset($_SESSION['error_message']);
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

    <!-- Custom CSS for Modal and Validation -->
    <style>
        /* Error styling for invalid inputs */
        .single-input.invalid input {
            border: 1px solid red;
        }
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        /* Custom Modal Styling to Match the Image */
        .custom-modal .modal-content {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .custom-modal .modal-header {
            border-bottom: none;
            padding: 20px 20px 0;
            position: relative;
        }
        .custom-modal .modal-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .custom-modal .modal-body {
            padding: 0 20px 20px;
            font-size: 14px;
            color: #666;
        }
        .custom-modal .modal-footer {
            border-top: none;
            padding: 0 20px 20px;
            justify-content: flex-end;
        }
        .custom-modal .btn-secondary {
            background-color: #6c757d;
            border: none;
            border-radius: 5px;
            padding: 8px 20px;
            font-size: 14px;
        }
        .custom-modal .btn-secondary:hover {
            background-color: #5a6268;
        }
        .custom-modal .close {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 20px;
            color: #aaa;
            opacity: 1;
        }
        .custom-modal .close:hover {
            color: #000;
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

    <!-- Login Reg In start -->
    <section class="log-reg login-2">
        <div class="overlay">
            <div class="container">
                <div class="top-head-area">
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-5 col">
                            <a class="back-home" href="/">
                                <img src="/assets/img/left-icon.png" alt="image">
                                Back To Tranferto
                            </a>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="/">
                                <img src="/img/logojb.png" alt="image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-5">
                        <div class="img-area">
                            <img src="/assets/img/login-bg-2.png" alt="image">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7 z-1 text-center d-flex justify-content-center pb-120">
                        <div class="form-box">
                            <h4>Log in to Tranferto</h4>
                            <p class="dont-acc">Don't have an account? <a href="/register">Register</a></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="personal-tab" data-bs-toggle="tab"
                                        data-bs-target="#personal" type="button" role="tab" aria-controls="personal"
                                        aria-selected="true">Personal</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="business-tab" data-bs-toggle="tab" data-bs-target="#business"
                                        type="button" role="tab" aria-controls="business"
                                        aria-selected="false">Business</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                                    <form id="personalLoginForm" action="/login" method="POST">
                                        <input type="hidden" name="type" value="personal">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="single-input d-flex align-items-center">
                                                    <input type="email" name="email" placeholder="Email" required>
                                                </div>
                                                <div class="error-message">Valid email is required</div>
                                            </div>
                                            <div class="col-12">
                                                <div class="single-input d-flex align-items-center">
                                                    <input type="password" name="password" class="passInput" placeholder="Password" required>
                                                    <img class="showPass" src="/assets/img/show-hide.png" alt="image">
                                                </div>
                                                <div class="error-message">Password is required</div>
                                            </div>
                                        </div>
                                        <div class="remember-forgot d-flex justify-content-between">
                                            <div class="form-group d-flex">
                                                <div class="checkbox_wrapper">
                                                    <input class="check-box" id="check1" type="checkbox" name="remember">
                                                    <label></label>
                                                </div>
                                                <label for="check1"><span class="check_span">Remember Me</span></label>
                                            </div>
                                            <div class="forget-pw">
                                                <a href="/contact">Forgot password? We're here to assist!</a>
                                            </div>
                                        </div>
                                        <div class="btn-area">
                                            <button type="submit" class="cmn-btn">Log in</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="business" role="tabpanel" aria-labelledby="business-tab">
                                    <div class="login-with d-flex align-items-center"></div>
                                    <div class="continue"><p>Or continue with</p></div>
                                    <form id="businessLoginForm" action="/login" method="POST">
                                        <input type="hidden" name="type" value="business">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="single-input d-flex align-items-center">
                                                    <input type="email" name="email" placeholder="Business email" required>
                                                </div>
                                                <div class="error-message">Valid email is required</div>
                                            </div>
                                            <div class="col-12">
                                                <div class="single-input d-flex align-items-center">
                                                    <input type="password" name="password" class="passInput" placeholder="Password" required>
                                                    <img class="showPass" src="/assets/img/show-hide.png" alt="image">
                                                </div>
                                                <div class="error-message">Password is required</div>
                                            </div>
                                        </div>
                                        <div class="remember-forgot d-flex justify-content-between">
                                            <div class="form-group d-flex">
                                                <div class="checkbox_wrapper">
                                                    <input class="check-box" id="check2" type="checkbox" name="remember">
                                                    <label></label>
                                                </div>
                                                <label for="check2"><span class="check_span">Remember Me</span></label>
                                            </div>
                                            <div class="forget-pw">
                                                <a href="/contact">Forgot password? We're here to assist!</a>
                                            </div>
                                        </div>
                                        <div class="btn-area">
                                            <button type="submit" class="cmn-btn">Log in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Error Modal Popup -->
                <div id="loginErrorModal" class="modal fade custom-modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ooops!</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>We couldn't find an account matching the details you provided. Please double-check your information and try again. 
                                    If you continue to have trouble, feel free to contact our support team for assistance.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Error Modal Popup -->
            </div>
        </div>
    </section>
    <!-- Login Reg In end -->

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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const personalForm = document.getElementById('personalLoginForm');
            const businessForm = document.getElementById('businessLoginForm');
            
            // Show error modal if there's an error message
            <?php if ($error_message): ?>
                $('#loginErrorModal').modal('show');
            <?php endif; ?>

            // Password visibility toggle
            document.querySelectorAll('.showPass').forEach(function(icon) {
                icon.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    if (input.type === 'password') {
                        input.type = 'text';
                        this.src = '/assets/img/show-hide.png';
                    } else {
                        input.type = 'password';
                        this.src = '/assets/img/show-hide.png';
                    }
                });
            });

            // Form validation
            function validateForm(form) {
                let isValid = true;
                const emailInput = form.querySelector('input[type="email"]');
                const passwordInput = form.querySelector('input[type="password"]');
                
                if (!emailInput.value || !emailInput.checkValidity()) {
                    emailInput.parentElement.classList.add('invalid');
                    emailInput.nextElementSibling.style.display = 'block';
                    isValid = false;
                }
                
                if (!passwordInput.value) {
                    passwordInput.parentElement.classList.add('invalid');
                    passwordInput.nextElementSibling.style.display = 'block';
                    isValid = false;
                }
                
                return isValid;
            }

            personalForm.addEventListener('submit', function(e) {
                if (!validateForm(this)) {
                    e.preventDefault();
                }
            });

            businessForm.addEventListener('submit', function(e) {
                if (!validateForm(this)) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html> 