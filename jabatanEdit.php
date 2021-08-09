<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'jabatan';
    $page = 'Jabatan';
    include 'layout/menu.php'
?>

<?php startblock('jabatan') ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6 class="col-11">Edit Jabatan</h6>
            </div>
            <div class="card-body px-0 pt-4 pb-2">
                <div class="p-0">
                    <form method="post" action="jabatanUpdate.php">
                        <table class='table align-items-center mb-0 ms-3' style="border-bottom: transparent;">
                            <?php
                	            $id = $_GET['id'];
	                            $data = mysqli_query($db,"SELECT * from jabatan WHERE id='$id'");
	                            while($d = mysqli_fetch_array($data)){
                                    echo "
                                    <tbody>
                                        <tr>
                                            <td class='align-middle' style='width:4%'>Jabatan</td>
                                            <td class='align-middle'>
                                                <input class='input-group-text text-body' type='hidden' name='id' value='".$d['id']."'>
                                                <input class='input-group-text text-body' type='text' name='jabatan' value='".$d['jabatan']."'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='align-middle'>Gaji Pokok</td>
                                            <td class='align-middle'>
                                                <input class='input-group-text text-body' type='number' name='gaji_pokok' value='".$d['gaji_pokok']."'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='align-middle text-canter'><button class='btn btn-primary btn-sm mb-0' type='submit'>Simpan</button></td>
                                        </tr>
                                    </tbody>";
                                }
                            ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock();?>