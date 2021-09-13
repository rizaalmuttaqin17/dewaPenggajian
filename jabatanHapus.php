<?php 
    include 'database/connection.php';
    $id = $_GET['id'];
    mysqli_query($db,"DELETE from jabatan WHERE id='$id'");
    header("location:jabatan.php");
?>