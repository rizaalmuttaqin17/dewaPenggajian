<?php require_once '../../assets/phpti/ti.php' ?>
<?php include '../../database/connection.php' ?>
<?php include 'auth.php' ?>
<div class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
    <span class="font-weight-bold text-dark-50">Sudah Punya Akun?</span>
    <a href="login.php" class="font-weight-bold ml-2">Masuk di sini!</a>
</div>
<?php startblock('register') ?>
<div class="login-form">
    <div class="text-center mb-10 mb-lg-20">
        <h3 class="font-size-h1">Daftar</h3>
        <p class="text-muted font-weight-bold">Isi form dibawah ini untuk membuat akunmu</p>
    </div>
    <form class="form" method="POST" action="register.php">
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Nama Lengkap" name="name" autocomplete="off" required/>
            <?php
                if (array_key_exists("name",$errors)){
                    $valueErrorNama = $errors['name'];
                    echo '<div class="alert alert-danger show mb-2 mt-2" role="alert"><strong>'.$valueErrorNama.'</strong></div>';
                }
            ?>
        </div>
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email" name="email" autocomplete="off" required/>
            <?php
                if (array_key_exists("email",$errors)){
                    $valueErrorEmail = $errors['email'];
                    echo '<div class="alert alert-danger show mb-2 mt-2" role="alert"><strong>'.$valueErrorEmail.'</strong></div>';
                }
            ?>
        </div>
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password" name="password" autocomplete="off" required/>
            <?php
                if (array_key_exists("password",$errors)){
                    $valueErrorPassword = $errors['password'];
                    echo '<div class="alert alert-danger show mb-2 mt-2" role="alert"><strong>'.$valueErrorPassword.'</strong></div>';
                }
            ?>
        </div>
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Confirm password" name="password2" autocomplete="off" />
        </div>
        <div class="form-group d-flex flex-wrap flex-center">
            <button type="submit" name="register" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Daftar</button>
        </div>
    </form>
</div>
<?php endblock() ?>