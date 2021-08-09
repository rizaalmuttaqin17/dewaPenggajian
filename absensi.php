<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'absensi';
    $page = 'Absensi';
    include 'layout/menu.php'
?>

<?php startblock('absensi') ?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <div class="row">
                <h6 class="col-11">Tabel Absensi</h6>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class='table align-items-center mb-0'>
                    <thead>
                        <tr>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>No. </th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Nama Pengguna</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>Tanggal Absen</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Jam Masuk</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Jam Keluar</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Keterangan</th>
                            <th class='text-secondary opacity-7'></th>
                        </tr>
                    </thead>
                    <?php
                        $i = 1;
                        if($stmt = $db->query("SELECT absensi.id, tanggal_absen, jam_masuk, jam_keluar, keterangan, name FROM absensi, users WHERE absensi.id_user=users.id")){
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
                                            <p class='text-xs font-weight-bold mb-0'>".$row['tanggal_absen']."</p>
                                        </td>
                                        <td class='align-middle text-center'>
                                            <p class='text-xs font-weight-bold mb-0'>".$row['jam_masuk']."</p>
                                        </td>
                                        <td class='align-middle text-center'>
                                            <p class='text-xs font-weight-bold mb-0'>".$row['jam_keluar']."</p>
                                        </td>
                                        <td class='align-middle text-center text-sm'>
                                            <span class='badge badge-sm bg-gradient-success'>".$row['keterangan']."</span>
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
<?php endblock();?>