<?php
include('database/connection.php');
    $idKaryawan = $_GET['id'];
    $query = "SELECT * FROM users WHERE id =$idKaryawan";
    $resultKaryawan = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($resultKaryawan)) {
        $queryCekGaji = "SELECT * FROM gaji_bulanan WHERE id_user='".$row['id']."' AND MONTH(NOW())=MONTH(tanggal_gajian) GROUP BY tanggal_gajian DESC";
        if (mysqli_num_rows(mysqli_query($db, $queryCekGaji))==0) {
            $queryJabatan = "SELECT * FROM jabatan WHERE id='".$row['id_jabatan']."'";
            $resultJabatan = mysqli_fetch_array(mysqli_query($db, $queryJabatan));

            $potongan = 0;
            $to = date('Y-m-1');
            $from = date('Y-m-t');
            $queryPotongan = "SELECT * FROM potongan_gaji WHERE id_user='".$row['id']."'  AND tanggal_potongan  BETWEEN '".$to."' AND '".$from."'";
            $resultPotongan = mysqli_query($db, $queryPotongan);
            if (mysqli_num_rows($resultPotongan)> 0) {
                while ($rows = mysqli_fetch_array($resultPotongan)) {
                    $potongan += $rows['potongan'];
                }
            }
            $pph = $settingKantor['potongan_gaji_pph']*($resultJabatan['gaji_pokok']+$row['tunjangan']-$potongan)/100;

            $totalGaji = $resultJabatan['gaji_pokok']+$row['tunjangan']-$potongan-$pph;

            $query = "INSERT INTO gaji_bulanan(id_user,total_gaji,gaji_pokok,tunjangan,potongan,pph,tanggal_gajian,created_at,updated_at) 
                    VALUES($idKaryawan,$totalGaji,".$resultJabatan['gaji_pokok'].",  '". $row['tunjangan'] ."',  '". $potongan ."',  '". $pph ."',  now(),now(),now())";
            mysqli_query($db,$query);
            header("location:gaji-bulanan.php");
        }
    }
?>
