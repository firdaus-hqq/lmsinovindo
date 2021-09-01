<?php
$jenis=$_GET['jenis'];
$kode=$_GET['kode'];
include ('../../config/config.php');

if ($edit = mysqli_query($mysqli, "UPDATE ujian SET aktif='0' WHERE jenis='$jenis' and kodesoal='$kode'")){
		header("Location:v_bank_soal.php");
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($mysqli));
?>