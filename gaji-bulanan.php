<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'gaji-bulanan';
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
                                        <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'> No. </th>
                                        <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'> Nama Pengguna</th>
                                        <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'> Total Gaji</th>
                                        <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'> Tanggal Gajian</th>
                                        <th class='text-secondary opacity-7'></th>
                                    </tr>
                                </thead>
                                <?php
                                    $i = 1;
                                    if($stmt = $db->query("SELECT * FROM gaji_bulamam JOIN users ON gaji_bulanan.id_user=users.id")){
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
                                            <p class='text-xs font-weight-bold mb-0'>".$row['total_gaji']."</p>
                                        </td>
                                        <td class='align-middle text-center'>
                                            <p class='text-xs font-weight-bold mb-0'>".$row['tanggal_gajian']."</p>
                                        </td>
                                        <td class='align-middle'>
                                            <a href='javascript:;' class='text-secondary font-weight-bold text-xs' data-toggle='tooltip' data-original-title='Edit user'>
                                                Edit
                                            </a>
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
    <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        © <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a class="font-weight-bold" target="_blank">Dewa</a>
                        for a better web.
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php endblock();?>