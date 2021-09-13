<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'setup-kantor';
    $page = 'Setup Kantor';
    include 'layout/menu.php'
?>

<?php startblock('setup-kantor') ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6 class="col-11">Edit Setup Kantor</h6>
            </div>
            <div class="card-body px-0 pt-4 pb-2">
                <div class="p-0">
                    <form method="post" action="setupKantorUpdate.php">
                        <table class='table align-items-center mb-0 ms-3' style="border-bottom: transparent;">
                            <?php
                	            $id = $_GET['id'];
	                            $data = mysqli_query($db,"SELECT * from kantor_setting WHERE id='$id'");
	                            while($d = mysqli_fetch_array($data)){
                            ?>  
                            <tbody>
                                <tr>
                                    <td class="align-middle">Jam Masuk</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="hidden" name="id" value='<?php echo $d['id']?>'>
                                        <input class="input-group-text text-body" type="time" name="jam_masuk" value='<?php echo $d['jam_masuk']?>'>
                                    </td>
                                    <td class="align-middle">Jam Pulang</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="time" name="jam_pulang" value='<?php echo $d['jam_pulang']?>'>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Jam Absen Dimulai</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="time" name="dimulai_absen_menit" value='<?php echo $d['dimulai_absen_menit']?>'>
                                    </td>
                                    <td class="align-middle">Potongan Terlambat</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body uang" type="text" name="potongan_gaji_terlambat" value='<?php echo $d['potongan_gaji_terlambat']?>'>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Potongan Absen</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body uang" type="text" name="potongan_gaji_absen" value='<?php echo $d['potongan_gaji_absen']?>'>
                                    </td>
                                    <td class="align-middle">Potongan PPH</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body uang" type="text" name="potongan_gaji_pph" value='<?php echo $d['potongan_gaji_pph']?>'>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-canter"><button class="btn btn-primary btn-sm mb-0" type="submit">Simpan</button></td>
                                </tr>
                            </tbody>
                            <?php }?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock();?>