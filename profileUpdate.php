<?php 
include 'database/connection.php';
$id = $_POST['id'];
$name = $_POST['name'];
$tgl_aktif = $_POST['tgl_aktif'];
$email = $_POST['email'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$kontak = $_POST['kontak'];

//Upload Foto
$foto = $_FILES['foto']['name'];
if(!empty($foto)){
    $lokasiFoto = $_FILES['foto']['tmp_name'];
    $tipeFile = pathinfo($foto, PATHINFO_EXTENSION);
    $fileFoto = $id.".".$tipeFile;

    $folder = "assets/img/users/".$fileFoto;
    move_uploaded_file($lokasiFoto, $folder);
	$_SESSION['users']['foto'] = $fileFoto;

}else{
    $fileFoto = "null";
}

mysqli_query($db, "UPDATE users SET name='$name', tgl_aktif='$tgl_aktif', email='$email', foto='$fileFoto', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', kontak='$kontak', updated_at=now() WHERE id='$id'");
header("location:profile.php");

?>