<?php require_once 'assets/phpti/ti.php' ?>
<?php
    $current_page = 'home';
    $page = 'Beranda';
    include 'layout/menu.php' 
?>

<?php startblock('home') ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Persentase Kehadiran</p>
                                        <h5 class="font-weight-bolder text-success  mb-0">
                                            100%
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Kehadiran</p>
                                        <h5 class="font-weight-bolder text-success  mb-0">
                                            100%
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Absen</p>
                                        <h5 class="font-weight-bolder text-danger  mb-0">
                                            100%
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    
    
</div>
<?php endblock();?>