<?php 
include 'database/connection.php';
$id = $_GET['id'];
mysqli_query($db,"DELETE from gaji_bulanan WHERE id='$id'");
header("location:gaji-bulanan.php");
?>