<?php require_once 'assets/phpti/ti.php' ?>
<?php include 'database/connection.php' ?>
<?php include 'layout/auth.php' ?>
<?php startblock('login') ?>
<div class="login-form text-center ">
    <div class="text-center mb-10 mb-lg-20">
        <h3 class="font-size-h1">Masuk</h3>
        <p class="text-muted font-weight-bold">Masukkan email dan password Kalian</p>
    </div>
    <?php
        if (array_key_exists("akun",$errors)){
            $akun = $errors['akun'];
            echo '<div class="alert alert-danger show mb-2 mt-2" role="alert"><strong>'.$akun.'</strong></div>';
        }
    ?>
    <form class="form" method="POST" action="login.php">
        <?php include('errors.php'); ?>
        <div class="form-group mb-5">
            <input class="form-control h-auto form-control-solid py-4 px-8" type="email" placeholder="Email" name="email" autocomplete="off"  required/>
            
        </div>
        <div class="form-group mb-5">
            <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" autocomplete="off" required/>
        </div>
        <button type="submit" name="login" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Masuk</button>
    </form>
</div>
<?php endblock() ?>