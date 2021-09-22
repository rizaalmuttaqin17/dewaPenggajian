<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" ></script>

<!------ Include the above in your HEAD tag ---------->
<?php 
include('../database/connection.php');
if ($_GET['print'] == "now") {
    $idKaryawan = $_GET['id'];
    $query = "SELECT * FROM gaji_bulanan WHERE id_user='".$idKaryawan."' AND MONTH(NOW())=MONTH(tanggal_gajian) GROUP BY tanggal_gajian DESC";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result)==0) {
        $query = "SELECT * FROM users,jabatan WHERE users.id=$idKaryawan AND jabatan.id = users.id_jabatan";
        $result = mysqli_query($db, $query);
        while($row = mysqli_fetch_array($result)){
            $gajiBelumDibayar = 0;
            $queryJabatan = "SELECT * FROM jabatan WHERE id='".$row['id_jabatan']."'";
            $resultJabatan = mysqli_fetch_array(mysqli_query($db, $queryJabatan));

            $potongan = 0;
            $to = date('Y-m-1');
            $from = date('Y-m-t');
            $queryPotongan = "SELECT * FROM potongan_gaji WHERE id_user='".$idKaryawan."'  AND tanggal_potongan  BETWEEN '".$to."' AND '".$from."'";
            $resultPotongan = mysqli_query($db, $queryPotongan);
            if (mysqli_num_rows($resultPotongan)> 0) {
                while ($rows = mysqli_fetch_array($resultPotongan)) {
                    $potongan += $rows['potongan'];
                }
            }
            $gajiPokok = $resultJabatan['gaji_pokok'];
            $namaKaryawan = $row['name'];
            $subtotal = ($resultJabatan['gaji_pokok']+$row['tunjangan'])-$potongan;
            $tunjangan = $row['tunjangan'];
            $pph = $settingKantor['potongan_gaji_pph']*($resultJabatan['gaji_pokok']+$row['tunjangan']-$potongan)/100;
            $totalGaji = $resultJabatan['gaji_pokok']+$row['tunjangan']-$potongan-$pph;
            $tgl = date('d F Y');
        }
    }
}else{
    $idGaji = $_GET['print'];
    $idKaryawan = $_GET['id'];
    $query = "SELECT * FROM gaji_bulanan, users, jabatan WHERE gaji_bulanan.id = $idGaji AND gaji_bulanan.id_user = users.id AND users.id_jabatan = jabatan.id AND gaji_bulanan.tanggal_gajian";
    $result = mysqli_query($db, $query);
    while($row = mysqli_fetch_array($result)){
        $gajiPokok = $row['gaji_pokok'];
        $namaKaryawan = $row['name'];
        $subtotal = ($row['gaji_pokok']+$row['tunjangan'])-$row['potongan'];
        $tunjangan = $row['tunjangan'];
        $pph = $row['pph'];
        $potongan = $row['potongan'];
        $totalGaji = $row['total_gaji'];
        $tgl = date('d F Y',strtotime($row['tanggal_gajian']));

    }
}
?>
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>PT. Yogu Putra Sejahtera</strong>
                        <br>
                        Jalan Ir. Sutami
                        <br>
                        Karang Asam Ulu, Kec. Sungai Kunjang, Kota Samarinda, Kalimantan Timur
                        <br>
                        <!-- <abbr title="Phone">P:</abbr> (213) 484-6829 -->
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Tanggal <?php echo $tgl; ?></em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Slip Gaji <?php echo $namaKaryawan; ?> </h1>
                </div>
                </span>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td class="col-md-7"><em>Gaji Pokok</em></h4></td>
                            <td class="col-md-3 text-center"> <?php echo "Rp. " .  number_format($gajiPokok, 0, ",", ".") ?></td>
                        </tr>
                        <tr>
                            <td class="col-md-7"><em>Tunjangan</em></h4></td>
                            <td class="col-md-3 text-center"> <?php echo "Rp. " .  number_format($tunjangan, 0, ",", ".") ?></td>
                        </tr>
                        <tr>
                            <td class="col-md-7"><em>Potongan Gaji</em></h4></td>
                            <td class="col-md-3 text-center"> <?php echo "Rp. " .  number_format($potongan, 0, ",", ".") ?></td>
                        </tr>
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>PPh: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong> <?php echo "Rp. " .  number_format($subtotal, 0, ",", ".") ?></strong>
                            </p>
                            <p>
                                <strong> <?php echo "Rp. " .  number_format($pph, 0, ",", ".") ?></strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong><?php echo "Rp. " .  number_format($totalGaji, 0, ",", ".") ?></strong></h4></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</html>
<script>
    $(document).ready(function(){
        window.print();
    });
</script>