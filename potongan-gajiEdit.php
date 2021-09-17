<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'potongan-gaji';
    $page = 'Potongan Gaji';
    include 'layout/menu.php'
?>

<?php startblock('potongan-gaji') ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6 class="col-11">Edit Potongan Gaji</h6>
            </div>
            <div class="card-body px-0 pt-4 pb-2">
                <div class="p-0">
                    <form method="post" action="potongan-gajiUpdate.php">
                        <table class="table align-items-center mb-0 ms-3" style="border-bottom: transparent;">
                            <?php
                	            $id = $_GET['id'];
	                            $data = mysqli_query($db,"SELECT potongan_gaji.id p, potongan, keterangan, jabatan, jabatan.id j from potongan_gaji,jabatan WHERE potongan_gaji.id_jabatan=jabatan.id AND potongan_gaji.id='$id'");
	                            $dataJabatan = mysqli_query($db,"SELECT * FROM jabatan");
	                            while($d = mysqli_fetch_array($data)){
                                ?>
                                <tbody>
                                    <tr>
                                        <td class="align-middle" style="width:4%">Jabatan</td>
                                        <td class="align-middle">
                                            <input class="input-group-text text-body" type="hidden" name="id" value="<?php echo $id;?>">
                                            <select class="input-group-text" name="jabatan" style="width:20%">
                                                <?php
	                                                while($j = mysqli_fetch_array($dataJabatan)){
                                                        if($d['jabatan']==$j['jabatan']){
                                                            echo"<option value='".$j['id']."' selected>".$j['jabatan']."</option>";
                                                        } else {
                                                            echo"<option value='".$j['id']."'>".$j['jabatan']."</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Potongan</td>
                                        <td class="align-middle">
                                            <input class="input-group-text text-body uang" type="number" name="potongan" value="<?php echo $d['potongan'];?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Keterangan</td>
                                        <td class="align-middle">
                                            <input class="input-group-text text-body" type="text" name="keterangan" value="<?php echo $d['keterangan'];?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='align-middle text-canter'><button class='btn btn-primary btn-sm mb-0' type='submit'>Simpan</button></td>
                                        <td class='align-middle text-canter'><button class='btn btn-info btn-sm mb-0'>Kembali</button></td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock();?>