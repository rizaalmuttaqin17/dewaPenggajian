<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'jabatan';
    $page = 'Jabatan';
    include 'layout/menu.php'
?>

<?php startblock('jabatan') ?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Tabel Jabatan</h6>
            <h6>Tabel Jabatan</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class='table align-items-center mb-0'>
                    <thead>
                        <tr>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>
                                No. </th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>
                                Jabatan</th>
                            <th
                                class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>
                                Gaji Pokok</th>
                            <th class='text-secondary opacity-7'></th>
                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    if($stmt = $db->query("SELECT * FROM jabatan")){
                        while ($row = $stmt->fetch_assoc()) {
                    ?>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center">
                                <p class="text-xs font-weight-bold mb-0"><?php echo $i++ ?></p>
                            </td>
                            <td class="align-middle text-center">
                                <p class="text-xs font-weight-bold mb-0"><?php echo $row['jabatan']?></p>
                            </td>
                            <td class="align-middle text-center">
                                <span class="badge badge-sm bg-gradient-success"><?php echo rupiah($row['gaji_pokok'])?></span>
                            </td>
                            <td class="align-middle">
                                <a href="<?php echo 'jabatanEdit.php?id='.$row['id'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Jabatan">Edit</a>
                                <a href="jabatanHapus.php?id=<?php echo $row['id'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Hapus Jabatan">Hapus</a>
                            </td>
                        </tr>
                        </tbody>
                    <?php     }
                    }else{
                        echo $connection->error;
                    }?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endblock();?>