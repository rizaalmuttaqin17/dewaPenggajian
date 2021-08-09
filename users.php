<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'users';
    $page = 'Pengguna';
    include 'layout/menu.php'
?>

<?php startblock('users') ?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Tabel Users</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class='table align-items-center mb-0'>
                    <thead>
                        <tr>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>
                                No. </th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>
                                Nama Pengguna</th>
                            <th
                                class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>
                                Jabatan</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>
                                TTL</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>
                                Kontak</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>
                                Tunjangan</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>
                                Role</th>
                            <th class='text-secondary opacity-7'></th>
                        </tr>
                    </thead>
                    <?php
                                    $i = 1;
                                    if($stmt = $db->query("SELECT users.id, name, tempat_lahir, kontak, tunjangan, role, jabatan FROM users JOIN jabatan ON users.id_jabatan=jabatan.id")){
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
                                            <p class='text-xs font-weight-bold mb-0'>".$row['jabatan']."</p>
                                        </td>
                                        <td class='align-middle text-center'>
                                            <p class='text-xs font-weight-bold mb-0'>".$row['tempat_lahir']."</p>
                                        </td>
                                        <td class='align-middle text-center'>
                                            <p class='text-xs font-weight-bold mb-0'>".$row['kontak']."</p>
                                        </td>
                                        <td class='align-middle text-center text-sm'>
                                            <p class='text-xs font-weight-bold mb-0'>".$row['tunjangan']."</p>
                                        </td>
                                        <td class='align-middle text-center text-sm'>
                                            <span class='badge badge-sm bg-gradient-success'>".$row['role']."</span>
                                        </td>
                                        <td class='align-middle'>
                                            <a href='usersEdit.php?id=".$row['id']."' class='text-secondary font-weight-bold text-xs' data-toggle='tooltip' data-original-title='Edit user'>
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
<?php endblock();?>