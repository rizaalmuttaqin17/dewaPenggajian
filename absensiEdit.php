<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'absensi';
    $page = 'Absensi';
    include 'layout/menu.php'
?>

<?php startblock('absensi') ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6 class="col-11">Edit Absensi</h6>
            </div>
            <div class="card-body px-0 pt-4 pb-2">
                <div class="p-0">
                    <form method="post" action="controller/updateAbsensi.php">
                        <table class='table align-items-center mb-0 ms-3' style="border-bottom: transparent;">
                            <?php
                	            $id = $_GET['id'];
	                            $data = mysqli_query($db,"SELECT absensi.id, tanggal_absen, jam_masuk, jam_keluar, keterangan, name FROM absensi, users WHERE absensi.id_user=users.id AND absensi.id='$id'");
	                            while($d = mysqli_fetch_array($data)){
                                    echo "
                                    <tbody>
                                        <tr>
                                            <td class='align-middle' style='width:4%'>Nama</td>
                                            <td class='align-middle'>
                                                <input class='input-group-text text-body' type='hidden' name='name' value='".$d['id']."'>
                                                <input class='input-group-text text-body' type='text' name='name' value='".$d['name']."'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='align-middle'>Tanggal Absen</td>
                                            <td class='align-middle'>
                                                <input class='input-group-text text-body' type='date' name='tanggal_absen' value='".$d['tanggal_absen']."'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='align-middle'>Jam Masuk</td>
                                            <td class='align-middle'>
                                                <input class='input-group-text text-body px-4' type='time' name='jam_masuk' value='".$d['jam_masuk']."'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='align-middle'>Jam Keluar</td>
                                            <td class='align-middle'>
                                                <input class='input-group-text text-body px-4' type='time' name='jam_keluar' value='".$d['jam_keluar']."'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='align-middle'>Keterangan</td>
                                            <td class='align-middle'>
                                                <input class='input-group-text text-body' type='text' name='keterangan' value='".$d['keterangan']."'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='align-middle text-canter'><button class='btn btn-primary btn-sm mb-0'>Simpan</button></td>
                                        </tr>
                                    </tbody>";
                                }
                            ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock();?>