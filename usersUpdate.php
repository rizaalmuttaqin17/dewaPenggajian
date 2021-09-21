<?php 
include 'database/connection.php';
$id = $_POST['id'];
$name = $_POST['name'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$kontak = $_POST['kontak'];
$tunjangan = str_replace(".","",$_POST['tunjangan']);

//Upload Foto
$foto = $_FILES['foto']['name'];
if(!empty($foto)){
    $lokasiFoto = $_FILES['foto']['tmp_name'];
    $tipeFile = pathinfo($foto, PATHINFO_EXTENSION);
    $fileFoto = $id.".".$tipeFile;

    $folder = "assets/img/users/".$fileFoto;
    move_uploaded_file($lokasiFoto, $folder);

    mysqli_query($db, "UPDATE users SET  name='$name',   foto='$fileFoto', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', kontak='$kontak', tunjangan='$tunjangan', updated_at=now() WHERE id='$id'");

}else{
    mysqli_query($db, "UPDATE users SET  name='$name',    tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', kontak='$kontak', tunjangan='$tunjangan', updated_at=now() WHERE id='$id'");

}

header("location:users.php");

?>