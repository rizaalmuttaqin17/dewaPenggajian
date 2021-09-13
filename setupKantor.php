<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'setup-kantor';
    $page = 'Setup Kantor';
    include 'layout/menu.php'
?>

<?php startblock('setup-kantor') ?>
<div class="container-fluid">
    <div class="row">
        <?php 
            $results = mysqli_query($db, "SELECT * FROM kantor_setting");
            while($d = mysqli_fetch_array($results)){
        ?>
        <div class="col-md-3">
            <h3>Setup Kantor</h3>
        </div>
        <div class="col-md-9">
            <a href="setupKantorEdit.php?id=<?php echo $d['id']?>" class='btn btn-success' data-toggle='tooltip' data-original-title='Edit Setup Kantor'>Edit</a>
        </div>
        <div class="col-md-12 py-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jam Masuk Kantor</p>
                                    <h5 class="font-weight-bolder text-info  mb-0">
                                        <?php 
                                            date_default_timezone_set('Asia/Jakarta');
                                            echo date('H.i', strtotime($d['jam_masuk']));
                                        ?>
                                        WITA
                                    </h5>
                                </div>
                                <div class="col-md-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <i class="fa fa-sign-in text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jam Pulang Kantor</p>
                                    <h5 class="font-weight-bolder text-success  mb-0">
                                        <?php 
                                            date_default_timezone_set('Asia/Jakarta');
                                            echo date('H.i', strtotime($d['jam_pulang']));
                                        ?>
                                        WITA
                                    </h5>
                                </div>
                                <div class="col-md-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                        <i class="fa fa-sign-out text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jam Mulai Absen</p>
                                    <h5 class="font-weight-bolder text-danger  mb-0">
                                        <?php 
                                            date_default_timezone_set('Asia/Jakarta');
                                            echo date('H.i', strtotime($d['dimulai_absen_menit']));
                                        ?>
                                        WITA
                                    </h5>
                                </div>
                                <div class="col-md-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                                        <i class="fas fa-user-clock text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-md-12 p-4">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-capitalize font-weight-bolder">Potongan Gaji</h3>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bolder">Potongan Jika Terlambat</p>
                                    <div style="display: flex;">
                                        <h5 class="font-weight-bolder text-danger mb-0">Rp. &nbsp;</h5>
                                        <h5 class="font-weight-bolder text-danger mb-0 uang">
                                            <?php 
                                                echo $d['potongan_gaji_terlambat'];
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-md-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                                        <i class="fas fa-clock text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bolder">Potongan Jika Absen</p>
                                    <div style="display: flex;">
                                        <h5 class="font-weight-bolder text-danger mb-0">Rp. &nbsp;</h5>
                                        <h5 class="font-weight-bolder text-danger mb-0 uang">
                                            <?php 
                                                echo $d['potongan_gaji_absen'];
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-md-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                                        <i class="fas fa-window-close text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bolder">Potongan PPH</p>
                                    <div style="display: flex;">
                                        <h5 class="font-weight-bolder text-danger mb-0 uang">
                                            <?php 
                                                echo $d['potongan_gaji_pph'];
                                            ?>
                                        </h5>
                                        <h5 class="font-weight-bolder text-danger mb-0">%</h5>
                                    </div>
                                </div>
                                <div class="col-md-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                                        <i class="fas fa-percent text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php endblock();?>