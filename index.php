<?php require_once 'assets/phpti/ti.php' ?>
<?php
    $current_page = 'home';
    $page = 'Beranda';
    include 'layout/menu.php' 
?>

<?php startblock('home') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3>Tanggal Hari Ini : <?php echo date('d F Y '); ?> </h3>
        </div>
        <div class="col-md-12">
            <?php 
                $totalHariSaatIni = date('d');
                $hadir = 0;
                $tanpaKeterangan = 0; //sisa hari
                $terlambat = 0;
                $tidakAbsenPulang = 0;
                $query = "SELECT * FROM absensi WHERE MONTH(tanggal_absen) = MONTH(NOW()) AND id_user=".$_SESSION['users']['id']." AND DAY(tanggal_absen) <= DAY(NOW())";
                $results = mysqli_query($db, $query);
                while($row = mysqli_fetch_array($results)){
                    $hadir++;
                    if($row['terlambat'] == "Y"){
                        $terlambat++;
                    }

                    if($row['jam_keluar'] == null){
                        $tidakAbsenPulang++;
                    }
                }
                $tanpaKeterangan = $totalHariSaatIni-$hadir;
                
            ?>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Persentase Kehadiran Bulan Ini
                                        </p>
                                        <h5 class="font-weight-bolder text-success  mb-0">
                                            <?php echo round($hadir/$totalHariSaatIni*100,3); ?>%
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="fas fa-award text-lg opacity-10"></i>
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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Hadir</p>
                                        <h5 class="font-weight-bolder text-success  mb-0">
                                            <?php echo $hadir; ?> Hari
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="fa fa-sign-in  text-lg opacity-10" aria-hidden="true"></i>
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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Tidak Hadir</p>
                                        <h5 class="font-weight-bolder text-danger  mb-0">
                                        <?php echo $tanpaKeterangan; ?> Hari

                                        </h5>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="fa fa-sign-out text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                            <div class="card">
                            <?php
                                $statAbsenHariIni = "";
                                $query = "SELECT *FROM absensi WHERE tanggal_absen=DATE_SUB(CURDATE(),INTERVAL 0 DAY)  AND id_user=".$_SESSION['users']['id'] ;
                                $results = mysqli_query($db, $query);
                                if (mysqli_num_rows($results)>0) {
                                    while($row = mysqli_fetch_array($results)){
                                        $statAbsenHariIni = $row;
                                        if ($row['jam_keluar'] == null) {
                                            if($settingKantor['jam_pulang'] <= date("h:i:sa")){
                                                ?>
                                                <div class="card-header mx-4 p-3 text-center">
                                                    <button onclick="absenPulang()" class="btn  p-3 bg-gradient-primary shadow text-center border-radius-lg">
                                                        <i class="fa fa-sign-out fa-3x" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                
                                                <div class="card-body pt-0 p-3 text-center">
                                                    <h6 class="text-center mb-0">Anda Belum Absen Pulang</h6>
                                                    <span class="text-xs">Klik tombol diatas</span>
                                                    <hr class="horizontal dark my-3">
                                                    <h5 class="mb-0" id="txtJam"></h5>
                                                </div>
        
                                                <?php
                                            }else{
                                                ?>
                                                    <div class="card-header mx-4 p-3 text-center">
                                                        <button class="btn  p-3 bg-gradient-primary shadow text-center border-radius-lg">
                                                            <i class="fa fa-spinner fa-3x fa-spin" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                    
                                                    <div class="card-body pt-0 p-3 text-center">
                                                        <h6 class="text-center mb-0">Menunggu Jam Pulang!</h6>
                                                        <hr class="horizontal dark my-3">
                                                        <h5 class="mb-0" id="txtJam"></h5>
                                                    </div>
        
                                                <?php
                                            }
                                        } else {
                                            ?>
                                                <div class="card-header mx-4 p-3 text-center">
                                                    <button class="btn  p-3 bg-gradient-primary shadow text-center border-radius-lg">
                                                        <i class="fa fa-spinner fa-3x fa-spin" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                
                                                <div class="card-body pt-0 p-3 text-center">
                                                    <h6 class="text-center mb-0">Terima Kasih Sudah Absen! <br> Sampai Berjumpa Besok!</h6>
                                                    <hr class="horizontal dark my-3">
                                                    <h5 class="mb-0" id="txtJam"></h5>
                                                </div>
    
                                            <?php
                                        }
                                        
                                    }
                                }else{
                                    if ($settingKantor['dimulai_absen_menit'] <= date("h:i:s") ) {
                                        if($settingKantor['jam_masuk'] >= date("h:i:s")){
                                            ?>
                                            <div class="card-header mx-4 p-3 text-center">
                                                <button onclick="absenHadir()" class="btn  p-3 bg-gradient-primary shadow text-center border-radius-lg">
                                                    <i class="fa fa-sign-in fa-3x" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            
                                            <div class="card-body pt-0 p-3 text-center">
                                                <h6 class="text-center mb-0">Anda Belum Hadir!</h6>
                                                <span class="text-xs">Klik tombol diatas</span>
                                                <hr class="horizontal dark my-3">
                                                <h5 class="mb-0" id="txtJam"></h5>
                                            </div>

                                        <?php
                                        }else{
                                            ?>
                                            <div class="card-header mx-4 p-3 text-center">
                                                <button onclick="absenHadir()" class="btn  p-3 bg-gradient-primary shadow text-center border-radius-lg">
                                                    <i class="fa fa-sign-in fa-3x" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            
                                            <div class="card-body pt-0 p-3 text-center">
                                                <h6 class="text-center mb-0">Anda Terlambat!</h6>
                                                <span class="text-xs">Klik tombol diatas</span>
                                                <hr class="horizontal dark my-3">
                                                <h5 class="mb-0" id="txtJam"></h5>
                                            </div>

                                        <?php
                                        }
                                        
                                    }else{
                                        ?>
                                            <div class="card-header mx-4 p-3 text-center">
                                                <button class="btn  p-3 bg-gradient-primary shadow text-center border-radius-lg">
                                                    <i class="fa fa-stop fa-3x" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            
                                            <div class="card-body pt-0 p-3 text-center">
                                                <h6 class="text-center mb-0">Belum Saatnya Absen!</h6>
                                                <hr class="horizontal dark my-3">
                                                <h5 class="mb-0" id="txtJam"></h5>
                                            </div>

                                        <?php
                                    }
                                }



                                ?>
                                
                            </div>

                        </div>
            </div>


        </div>

    </div>


</div>
<?php endblock();?>
<?php startblock('js') ?>
<script>
    function startTime() {
        const today = new Date();
        let h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txtJam').innerHTML = "Jam : "+h + ":" + m + ":" + s;
        setTimeout(startTime, 1000);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }; // add zero in front of numbers < 10
        return i;
    }
    function absenHadir(){
        $.get( "database/absenHadir.php", function( data ) {
            location.reload();
        });
    }
    function absenPulang(){
        $.get( "database/absenPulang.php", function( data ) {
            location.reload();
        });
    }

    $(document).ready(function () {
        startTime();
    });
</script>
<?php endblock();?>