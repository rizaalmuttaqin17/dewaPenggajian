<?php
    include('../../database/connection.php');
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dewa Penggajian | Login Page</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link href="../../assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled sidebar-enabled page-loading">
    <div class="d-flex flex-column flex-root">
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('../../assets/media/bg/bg-3.jpg');">
            <div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
                <div class="d-flex flex-center mb-15">
					<a href="#">
						<img src="../../assets/media/logos/logo-letter-13.png" class="max-h-75px" alt="" />
					</a>
				</div>
                <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
                    <?php startblock('login') ?>
                    <?php endblock() ?>
                    <?php startblock('register') ?>
                    <?php endblock() ?>
                    <?php startblock('forgot-password') ?>
                    <?php endblock() ?>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <script src="../../assets/plugins/global/plugins.bundle.js"></script>
    <script src="../../assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="../../assets/js/scripts.bundle.js"></script>
    <script src="../../assets/js/pages/custom/login/login-general.js"></script>
</body>
</html>