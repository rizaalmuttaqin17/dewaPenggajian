<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'pengguna';
    $page = 'Pengguna';
    include 'layout/menu.php'
?>

<?php startblock('users') ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6 class="col-11">Tambah Pengguan</h6>
            </div>
            <div class="card-body px-0 pt-4 pb-2">
                <div class="p-0">
                    <form method="post" action="usersSave.php" enctype="multipart/form-data">
                        <table class="table align-items-center mb-0 ms-3" style="border-bottom: transparent;">
                            <tbody>
                                <tr>
                                <td class="align-middle">Nama</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="text" name="name" id="name" required>
                                    </td>
                                    <td class="align-middle">Email</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="text" name="email" id="email" required>
                                    </td>
                                </tr>
                                <tr>
                                 <td class="align-middle">Tanggal Lahir</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="date" name="tanggal_lahir" id="tanggal_lahir" required>
                                    </td>
                                    <td class="align-middle">Password</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="password" name="password" id="password" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Tempat Lahir</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="text" name="tempat_lahir" id="tempat_lahir" required>
                                    </td>
                                    <td class="align-middle">Tunjangan</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body uang" type="text" name="tunjangan" id="tunjangan" required>
                                    </td>
                                   
                                </tr>
                                <tr>
                                    <td class="align-middle">No. Handphone</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="text" name="kontak" id="kontak" required>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td class="align-middle">Foto</td>
                                    <td class="align-middle">
                                        <input type="file" name="foto" id="foto" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-canter"><button class="btn btn-primary btn-sm mb-0" type="submit">Simpan</button></td>
                                    <td class='align-middle text-canter'><a class='btn btn-info btn-sm mb-0' onclick="goBack()">Kembali</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>