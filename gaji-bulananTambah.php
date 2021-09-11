<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'gaji-bulanan';
    $page = 'Gaji Bulanan';
    include 'layout/menu.php';
?>

<?php startblock('gaji-bulanan') ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6 class="col-11">Tambah Gaji Bulanan</h6>
            </div>
            <div class="card-body px-0 pt-4 pb-2">
                <div class="p-0">
                    <form method="post" action="gaji-bulananSave.php">
                        <table class="table align-items-center mb-0 ms-3" style="border-bottom: transparent;">
                            <tbody>
                                <tr>
                                    <td class="align-middle" style="width:4%">Nama Pengguna</td>
                                    <td class="align-middle">
                                        <select class="input-group-text" name="name" style="width:20%">
                                            <?php
                                            $jabatan = mysqli_query($db,"SELECT * FROM users");
	                                        while($d = mysqli_fetch_array($jabatan)){
                                                echo"<option value='".$d['id']."'>".$d['name']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Total Gaji</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body uang" type="text" name="total_gaji" id="total_gaji">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Tanggal Gajian</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="date" name="tanggal_gajian" id="tanggal_gajian">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-canter"><button class="btn btn-primary btn-sm mb-0" type="submit">Simpan</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>