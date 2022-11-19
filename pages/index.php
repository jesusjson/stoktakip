<?php
session_start();
ob_start();
define("sys","../system/");
define("inc","include/");
include_once(sys."main.php");
define('siteUrl',$siteUrl);
define("mpage","menupages/");
define('siteLogo',$siteLogo);

?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title><?=$siteBaslik?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="<?=$siteAciklama?>" name="description" />
    <meta content="jesu" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=siteUrl?>assets/images/favicon.ico">
    <link rel="stylesheet" href="<?=siteUrl?>assets/libs/@simonwep/pickr/themes/classic.min.css" /> <!-- 'classic' theme -->
    <link rel="stylesheet" href="<?=siteUrl?>assets/libs/@simonwep/pickr/themes/monolith.min.css" /> <!-- 'monolith' theme -->
    <link rel="stylesheet" href="<?=siteUrl?>assets/libs/@simonwep/pickr/themes/nano.min.css" /> <!-- 'nano' theme -->
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
    <link href="<?=siteUrl?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <?php if($_SESSION['personalTc'] and $_SESSION['personalAd']){?>
        <div class="layout-wrapper">
            <?=include_once(inc."header.php")?>
            <?=include_once(inc."leftbar.php")?>
            <div class="page-content">

                <?php 
                    if($_GET && !empty($_GET['kategori'])){
                        $sayfa = $_GET['kategori'].".php";
                        if(file_exists(mpage.$sayfa)){
                            include_once(mpage.$sayfa);
                        }else{
                            include_once("menupages/body.php");
                        }
                    }else {
                        include_once("menupages/body.php");
                    }
                ?>
            </div>
            <?=include_once(inc."footer.php")?>
        </div>
    <?php }else{header('Location: login/login.php');}?>
    <!-- JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- JAVASCRIPT -->
    <script src="<?=siteUrl?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=siteUrl?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=siteUrl?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?=siteUrl?>assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?=siteUrl?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?=siteUrl?>assets/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="<?=siteUrl?>assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="<?=siteUrl?>assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="<?=siteUrl?>assets/libs/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="<?=siteUrl?>assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="<?=siteUrl?>assets/js/pages/dashboard-ecommerce.init.js"></script>

    <!-- App js -->
    <script src="<?=siteUrl?>assets/js/app.js"></script>
    <!-- prismjs plugin -->
    <script src="<?=siteUrl?>assets/libs/prismjs/prism.js"></script>
    <script src="<?=siteUrl?>assets/libs/list.js/list.min.js"></script>
    <script src="<?=siteUrl?>assets/libs/list.pagination.js/list.pagination.min.js"></script>

    <!-- listjs init -->
    <script src="<?=siteUrl?>assets/js/pages/listjs.init.js"></script>

    <!-- Sweet Alerts js -->
    <script src="<?=siteUrl?>assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- init js -->
    <script src="<?=siteUrl?>assets/js/pages/form-pickers.init.js"></script>
    <script type="text/javascript">
        function kullaniciSil(id){
            $.ajax({
                url:"../system/ajax/delete.php",
                method:"POST",
                data:{"id":id},
                success:function (response) {
                    alert(response);
                    window.location.reload(true);
                },
                error:function (response) {
                    alert(response);
                }
            })
        }

        function personalDelete(id){
            $.ajax({
                url:'../system/main.php',
                method:"POST",
                data:{'personelDeleteId':id},
                success:function (response) {
                    (response);
                    window.location.reload(true);
                },
                error:function (response) {
                    alert(response);
                }
            })
        }

        function personalEdit(id,tc,name,email,sifre,telefon,auth,maas){
            $.ajax({
                url:"../system/main.php",
                method:"POST",
                data:{'id':id,'personelDuzenleTc':tc,'name':name,'email':email,'sifre':sifre,'telefon':telefon,'auth':auth,'maas':maas},
                success:function (response) {
                    alert(response);
                    window.location.reload(true);
                },
                error:function (response) {
                    alert(response);
                }
            })
        }
        

    </script>
</body>

</html>