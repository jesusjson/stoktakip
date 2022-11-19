<?php
    error_reporting(0);
    session_start();
    ob_start();
    define("sys","../../system/");
    include_once(sys."main.php");
    define('siteUrl',$siteUrl);
    if($_SESSION['personalAd']){header('Location: ../index.php');}
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title><?=$siteBaslik?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="<?=siteUrl?>assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?=siteUrl?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?=siteUrl?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?=siteUrl?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?=siteUrl?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
               
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Hoş Geldin</h5>
                                    <p class="text-muted"><?=System::login()?></p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form method="POST">

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Tc Kimlik</label>
                                            <input name="girisTc" type="text" class="form-control" id="username" placeholder="Lütfen Personel Tc Kimlik numaranızı giriniz">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Şifre</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input name="girisPassword" type="password" class="form-control pe-5" placeholder="Lütfen Şifrenizi giriniz" id="password-input">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button name="girisButton" class="btn btn-success w-100" type="submit">Giriş Yap</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

       
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?=siteUrl?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=siteUrl?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=siteUrl?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?=siteUrl?>assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?=siteUrl?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?=siteUrl?>assets/js/plugins.js"></script>

    <!-- particles js -->
    <script src="<?=siteUrl?>assets/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="<?=siteUrl?>assets/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="<?=siteUrl?>assets/js/pages/password-addon.init.js"></script>
</body>

</html>

