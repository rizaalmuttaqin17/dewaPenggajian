<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'profile';
    $page = 'Profile';
    include 'layout/menu.php'
?>

<?php startblock('profile') ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6 class="col-11">Edit Profile</h6>
            </div>
            <div class="card-body px-0 pt-4 pb-2">
                <div class="p-0">
                    <form method="post" action="profileUpdate.php" enctype="multipart/form-data">
                        <table class="table align-items-center mb-0 ms-3" style="border-bottom: transparent;">
                            <?php
                	            $id = $_GET['id'];
	                            $data = mysqli_query($db,"SELECT * FROM users JOIN jabatan ON users.id_jabatan=jabatan.id WHERE users.id='$id'");
	                            $dataJabatan = mysqli_query($db,"SELECT * FROM jabatan");
	                            while($d = mysqli_fetch_array($data)){
                                ?>
                                <input class="input-group-text text-body" type="hidden" name="id" value="<?php echo $id;?>">
                                <tbody>
                                    <tr>
                                        <td class="align-middle">Name</td>
                                        <td class="align-middle">
                                            <input class="input-group-text text-body" type="text" name="name" value="<?php echo $d['name'];?>">
                                        </td>
                                        
                                        <td class="align-middle">Foto</td>
                                        <td class="align-middle">
                                            <input class="input-group-text text-body" type="file" name="foto" value="<?php echo $d['foto'];?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Tanggal Aktif</td>
                                        <td class="align-middle">
                                            <input class="input-group-text text-body" type="date" name="tgl_aktif" value="<?php echo $d['tgl_aktif'];?>">
                                        </td>
                                        <td class="align-middle">Email</td>
                                        <td class="align-middle">
                                            <input class="input-group-text text-body" type="text" name="email" value="<?php echo $d['email'];?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Tempat Lahir</td>
                                        <td class="align-middle">
                                            <input class="input-group-text text-body" type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo $d['tempat_lahir'];?>">
                                        </td>
                                        <td class="align-middle">Tanggal Lahir</td>
                                        <td class="align-middle">
                                            <input class="input-group-text text-body" type="date" name="tanggal_lahir" value="<?php echo $d['tanggal_lahir'];?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">No. Handphone</td>
                                        <td class="align-middle">
                                            <input class="input-group-text text-body" type="text" name="kontak" value="<?php echo $d['kontak'];?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='align-middle text-canter'><button class='btn btn-primary btn-sm mb-0' type='submit'>Simpan</button></td>
                                        <!-- <td class='align-middle text-canter'><a class='btn btn-info btn-sm mb-0' onclick="goBack()">Kembali</a></td> -->
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