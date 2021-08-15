<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'gaji-bulanan';
    $page = 'Gaji Bulanan';
    include 'layout/menu.php'
?>

<?php startblock('gaji-bulanan') ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tabel Gaji Bulanan</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class='table align-items-center mb-0'>
                            <thead>
                                <tr>
                                    <th
                                        class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>
                                        No.</th>
                                    <th
                                        class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>
                                        Nama Pengguna</th>
                                    <th
                                        class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>
                                        Total Gaji</th>
                                    <th
                                        class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>
                                        Tanggal Gajian</th>
                                    <th class='text-secondary opacity-7'></th>
                                </tr>
                            </thead>
                            <?php
                            $i = 1;
                                if($stmt = $db->query("SELECT gaji_bulanan.id, total_gaji, tanggal_gajian, name FROM gaji_bulanan, users WHERE gaji_bulanan.id_user=users.id")){
                                    while ($row = $stmt->fetch_assoc()) {
                                        echo "
                                        <tbody>
                                            <tr>
                                                <td class='align-middle text-center'>
                                                    <p class='text-xs font-weight-bold mb-0'>".$i++."</p>
                                                </td>
                                                <td class='align-middle text-center'>
                                                    <p class='text-xs font-weight-bold mb-0'>".$row['name']."</p>
                                                </td>
                                                <td class='align-middle text-center'>
                                                    <p class='text-xs font-weight-bold mb-0'>".rupiah($row['total_gaji'])."</p>
                                                </td>
                                                <td class='align-middle text-center'>
                                                    <p class='text-xs font-weight-bold mb-0'>".$row['tanggal_gajian']."</p>
                                                </td>
                                                <td class='align-middle'>
                                                    <a href='gaji-bulananEdit.php?id=".$row['id']."' class='text-secondary font-weight-bold text-xs' data-toggle='tooltip' data-original-title='Edit user'>Edit</a>
                                                    <a href='gaji-bulananHapus.php?id=".$row['id']."' class='text-secondary font-weight-bold text-xs' data-toggle='tooltip' data-original-title='Hapus Gaji Bulanan'>Hapus</a>
                                                </td>
                                            </tr>
                                        </tbody>";
                                    }
                                }else{
                                    echo $connection->error;
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock();?>