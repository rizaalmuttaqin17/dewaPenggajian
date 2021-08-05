<?php require_once '../../assets/phpti/ti.php' ?>
<?php include '../../database/connection.php' ?>
<?php include 'auth.php' ?>
<?php startblock('forgot-password') ?>
<div class="login-form">
    <div class="text-center mb-10 mb-lg-20">
        <h3 class="font-size-h1">Lupa Password ?</h3>
        <p class="text-muted font-weight-bold">Masukkan email anda untuk reset password anda</p>
    </div>
    <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email" name="email" autocomplete="off" />
        </div>
        <div class="form-group d-flex flex-wrap flex-center">
            <button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
            <button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Batal</button>
        </div>
    </form>
</div>
<?php endblock()?>