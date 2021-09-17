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
                                        <input class="input-group-text text-body" type="text" name="name" id="name">
                                    </td>
                                    <td class="align-middle">Jabatan</td>
                                    <td class="align-middle">
                                        <select class="input-group-text text-body" name="jabatan" style="width:40%">
                                            <?php
                                            $jabatan = mysqli_query($db,"SELECT * FROM jabatan");
	                                        while($d = mysqli_fetch_array($jabatan)){
                                                echo"<option value='".$d['id']."'>".$d['jabatan']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Tanggal Aktif</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="date" name="tgl_aktif" id="tgl_aktif">
                                    </td>
                                    <td class="align-middle">Email</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="text" name="email" id="email">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Tempat Lahir</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="text" name="tempat_lahir" id="tempat_lahir">
                                    </td>
                                    <td class="align-middle">Tanggal Lahir</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="date" name="tanggal_lahir" id="tanggal_lahir">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">No. Handphone</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="text" name="kontak" id="kontak">
                                    </td>
                                    <td class="align-middle">Tunjangan</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body uang" type="text" name="tunjangan" id="tunjangan">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Role</td>
                                    <td class="align-middle">
                                        <select class="input-group-text text-body" type="text" name="role" id="role" style="width:60%">
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>
                                        </select>
                                    </td>
                                    <td class="align-middle">Foto</td>
                                    <td class="align-middle">
                                        <input type="file" name="foto" id="foto">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Password</td>
                                    <td class="align-middle">
                                        <input class="input-group-text text-body" type="password" name="password" id="password">
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