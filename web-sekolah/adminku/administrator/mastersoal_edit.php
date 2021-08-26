<?php
include '../../config/config.php';

$kodesoal		= $_POST['kodesoal'];
$acak			= $_POST['acak'];
$opsi		 	= $_POST['opsi'];
$kelas		 	= $_POST['kelas'];
$waktu		 	= $_POST['waktu'];
$nilai		 	= $_POST['nilai'];


	if ($edit = mysqli_query($mysqli, "UPDATE ujian SET acak='$acak', kelas='$kelas', opsi='$opsi', nilai='$nilai', waktu='$waktu' WHERE kodesoal='$kodesoal'")){
			header("Location:v_bank_soal.php");
			exit();
		}
	die ("Terdapat kesalahan : ". mysqli_error($mysqli));
?>