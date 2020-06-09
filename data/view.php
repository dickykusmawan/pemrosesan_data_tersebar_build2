<?php
include "config.php";
//session_start();
$sessionusername=$_SESSION['username'];
$query2 = "SELECT * FROM data_karyawan LEFT JOIN user USING (nik) WHERE username ='$sessionusername'";
$result = mysqli_query($koneksi, $query2);
$row = mysqli_fetch_array($result);
?>