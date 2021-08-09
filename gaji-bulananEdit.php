<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'gaji-bulanan';
    $page = 'Gaji Bulanan';
    include 'layout/menu.php'
?>

<?php startblock('gaji-bulanan') ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6 class="col-11">Edit Gaji Bulanan</h6>
            </div>
            <div class="card-body px-0 pt-4 pb-2">
                <div class="p-0">
                    <form method="post" action="gaji-bulananUpdate.php">
                        <table class="table align-items-center mb-0 ms-3" style="border-bottom: transparent;">
                            <?php
                	            $id = $_GET['id'];
	                            $data = mysqli_query($db,"SELECT gaji_bulanan.id, total_gaji, tanggal_gajian, name FROM gaji_bulanan, users WHERE gaji_bulanan.id_user=users.id AND gaji_bulanan.id='$id'");
	                            $dataPengguna = mysqli_query($db,"SELECT * FROM users");
	                            while($d = mysqli_fetch_array($data)){
                                ?>
                                <tbody>
                                    <tr>
                                        <td class="align-middle" style="width:4%">Nama Pengguna</td>
                                        <td class="align-middle">
                                            <input class="input-group-text text-body" type="hidden" name="id" value="<?php echo $id;?>">
                                            <select class="input-group-text" name="name" style="width:20%">
                                                <?php
	                                                while($j = mysqli_fetch_array($dataPengguna)){
                                                        if($d['name']==$j['name']){
                                                            echo"<option value='".$j['id']."' selected>".$j['name']."</option>";
                                                        } else {
                                                            echo"<option value='".$j['id']."'>".$j['name']."</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Total Gaji</td>
                                        <td class="align-middle">
                                            <input class="input-group-text text-body uang" type="text" name="total_gaji" value="<?php echo $d['total_gaji'];?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Tanggal Gajian</td>
                                        <td class="align-middle">
                                            <input class="input-group-text text-body" type="date" name="tanggal_gajian" value="<?php echo $d['tanggal_gajian'];?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='align-middle text-canter'><button class='btn btn-primary btn-sm mb-0' type='submit'>Simpan</button></td>
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