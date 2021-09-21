<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'potongan-gaji';
    $page = 'Potongan Gaji';
    include 'layout/menu.php'
?>

<?php startblock('potongan-gaji') ?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-10">
                    <h6>Potongan Gaji</h6>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class='table align-items-center mb-0'>
                    <thead>
                        <tr>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>No. </th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Jabatan</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>Potongan</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>Keterangan</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>Tanggal</th>
                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    if($stmt = $db->query("SELECT users.name, potongan_gaji.potongan, potongan_gaji.keterangan, potongan_gaji.tanggal_potongan FROM potongan_gaji, users, jabatan WHERE potongan_gaji.id_user=users.id AND users.id_jabatan=jabatan.id ORDER BY tanggal_potongan DESC")){
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
                                        <p class='text-xs font-weight-bold mb-0'>".rupiah($row['potongan'])."</p>
                                    </td>
                                    <td class='align-middle text-center'>
                                        <p class='text-xs font-weight-bold mb-0'>".$row['keterangan']."</p>
                                    </td>
                                    <td class='align-middle text-center'>
                                        <p class='text-xs font-weight-bold mb-0'>".date("d F Y",strtotime($row['tanggal_potongan']))."</p>
                                    </td>
                                </tr>
                            </tbody>";
                        }
                    }else{
                        // echo $connection->error;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endblock();?>