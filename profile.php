<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'profile';
    $page = 'Profile';
    include 'layout/menu.php'
?>

<?php startblock('profile') ?>
<div class="col-12">
    <div class="card mb-4">
        <?php
        $i = 1;
        if($stmt = $db->query("SELECT * FROM users JOIN jabatan ON users.id_jabatan=jabatan.id WHERE users.id=".$_SESSION['users']['id'].""))
            while ($row = $stmt->fetch_assoc()) {
        ?>
        <div class="card-header pb-2">
            <div class="row">
                <div class="col-md-10 my-auto" style="display: flex;">
                    <div class="avatar avatar-xl me-4">
                        <img src="assets/img/users/<?php echo $_SESSION['users']['foto']; ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                    <div class="h-100">
                        <h5 class="mb-1"><?php echo $row['name']?></h5>
                        <p class="mb-0 font-weight-bold text-sm"><?php echo $row['jabatan']?></p>
                    </div>
                </div>
                <div class="col-md-2 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <a class="btn btn-info" href="profileEdit.php?id=<?php echo $_SESSION['users']['id'];?>">
                        <i class="fas fa-tools"></i>
                        <span class="ms-1">Settings</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body pb-2">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-2">Data Diri 
                    </h3>
                </div>
                <div class="col-md-12 ps-2">
                    <div class="table-responsive p-0">
                        <table class='table align-items-center mb-0'>
                            <tr>
                                <td><p class="mb-0">Email</p></td>
                                <td><p class="mb-0"><?php echo $row['email'] ?></p></td>
                            </tr>
                            <tr>
                                <td><p class="mb-0">Tempat, Tanggal Lahir</p></td>
                                <td>
                                    <?php 
                                        if ($row['tanggal_lahir'] == null) {
                                            ?>
                                                <p class="mb-0">Belum Diedit</p>
                                            <?php
                                        }else{
                                            ?>
                                                <p class="mb-0"><?php echo $row['tempat_lahir'].', '.date('d F Y', strtotime($row['tanggal_lahir'])) ?></p>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="mb-0">Tanggal Aktif Kerja</p></td>
                                <td><p class="mb-0"><?php echo date('d F Y', strtotime($row['tgl_aktif'])) ?></p></td>
                            </tr>
                            <tr>
                                <td><p class="mb-0">No. Handphone</p></td>
                                <td>
                                    <?php 
                                        if ($row['kontak'] == null) {
                                            ?>
                                                <p class="mb-0">Belum Diedit</p>
                                            <?php
                                        }else{
                                            ?>
                                                <p class="mb-0"><?php echo $row['kontak'] ?></p>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="mb-0">Tunjangan</p></td>
                                <td>
                                    <?php 
                                        if ($row['tunjangan'] == null || $row['tunjangan'] == 0) {
                                            ?>
                                                <p class="mb-0">Belum Ditambahkan</p>
                                            <?php
                                        }else{
                                            ?>
                                                <p class="mb-0"><?php echo $row['tunjangan'] ?></p>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="mb-0">Jabatan</p></td>
                                <td>
                                    <p class="mb-0"><?php echo $row['jabatan'] ?></p>
                                 
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php endblock();?>