<?php 
include('connection.php');
$idUser= $_SESSION['users']['id'];

$query = "SELECT * FROM absensi WHERE tanggal_absen=DATE_SUB(CURDATE(),INTERVAL 0 DAY) AND jam_keluar IS NULL AND  id_user=".$_SESSION['users']['id'];
    $results = mysqli_query($db, $query);
    echo mysqli_num_rows($results);
    if (mysqli_num_rows($results)==0) {
        if($settingKantor['jam_masuk'] >  date("h:i:sa")){
            $query = "INSERT INTO absensi(id_user,tanggal_absen,jam_masuk,keterangan,created_at,updated_at) VALUES($idUser,NOW(),NOW(),'Masuk',NOW(),NOW()) ";
            mysqli_query($db,$query);
        }else{
            $query = "INSERT INTO absensi(id_user,tanggal_absen,jam_masuk,keterangan,created_at,updated_at,terlambat) VALUES($idUser,NOW(),NOW(),'Masuk',NOW(),NOW(),'Y') ";
            mysqli_query($db,$query);
        }
        

    } 

?>