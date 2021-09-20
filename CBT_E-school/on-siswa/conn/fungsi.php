<?php 
$query = mysqli_query ($konek, "SELECT * FROM siswa WHERE nis='".$_SESSION['nis']."'");
$ar = mysqli_fetch_array ($query);
$nama=$ar['nama_lengkap'];
$pass=$ar['password_login'];
$nis=$ar['nis']; 
$kelas=$ar['id_kelas'];  
$ruang=$ar['ruang']; 
$sesi=$ar['sesi']; 
$statuslogin=$ar['statuslogin']; 
?>
