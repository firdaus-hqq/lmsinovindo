<?php 
$query = mysqli_query ($mysqli, "SELECT * FROM siswa WHERE id_siswa=".$_SESSION['idsiswa']);

$ar = mysqli_fetch_array ($query);

$nama=$ar['nama_lengkap'];
$pass=$ar['password_login'];
$nis=$ar['nis']; 
$id_kelas=$ar['id_kelas'];
$query2 = mysqli_query($mysqli, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
$ar2 = mysqli_fetch_array ($query2);
$kelas=$ar2['nama'];
?>