<?php 
include 'database/connection.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$kontak = $_POST['kontak'];
$tunjangan = str_replace(".","",$_POST['tunjangan']);

//Upload Foto
$foto = $_FILES['foto']['name'];
if(!empty($foto)){
    $lokasiFoto = $_FILES['foto']['tmp_name'];
    $tipeFile = pathinfo($foto, PATHINFO_EXTENSION);
    $fileFoto = $name.time().".".$tipeFile;

    $folder = "assets/img/users/".$fileFoto;
    move_uploaded_file($lokasiFoto, $folder);
}else{
    $fileFoto = "nopoto.png";
}

mysqli_query($db, "INSERT INTO users (id_jabatan,tgl_aktif, name, email, foto, password, tempat_lahir, tanggal_lahir, kontak, tunjangan,role, created_at, updated_at) VALUES ('2',now(), '$name', '$email', '$fileFoto', '$password','$tempat_lahir', '$tanggal_lahir', '$kontak', '$tunjangan','User', now(), now())");
header("location:users.php");
?>