<?php 
include 'database/connection.php';
include 'database/cekAbsenKemarin.php';
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: views/auth/login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: views/auth/login.php");
}

function rupiah($angka){
	$hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}

$dataUser = "";
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
$results = mysqli_query($db, $query);


if (mysqli_num_rows($results)> 0) {
    $dataUser = mysqli_fetch_assoc($results);
}else {
    array_push($errors, "Wrong email/password combination");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>PT. Yugo Putra Sejahtera</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
    <?php startblock('css') ?><?php endblock(); ?>

</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php startblock('menu') ?><?php endblock(); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="javascript:;">Halaman</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="current_page"><?php if ($current_page!="null") {echo $current_page; }?></li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0"><?php if ($page!="null") {echo $page; }?></h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="index.php?logout='1'" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Logout</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid py-4">
            <div class="row">
                <?php if ($_SESSION['role']=='User'){?>
                    <?php startblock('home') ?><?php endblock(); ?>
                    <?php startblock('absensi') ?><?php endblock()?>
                <?php }else if ($_SESSION['role']=='Admin'){ ?>
                    <?php startblock('home') ?><?php endblock(); ?>
                    <?php startblock('absensi') ?><?php endblock(); ?>
                    <?php startblock('gaji-bulanan') ?><?php endblock(); ?>
                    <?php startblock('jabatan') ?><?php endblock(); ?>
                    <?php startblock('potongan-gaji') ?><?php endblock(); ?>
                    <?php startblock('users') ?><?php endblock(); ?>
                <?php } ?>
            </div>
            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script> document.write(new Date().getFullYear())</script>
                                ,made with <i class="fa fa-heart"></i> by <a class="font-weight-bold" target="_blank">Dewa </a>for a better web.
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>$('.uang').mask('000.000.000.000', {reverse: true});</script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
    <?php startblock('js') ?><?php endblock(); ?>

</body>
</html>