<?php
// error_reporting(0);
include ('../../config/config.php');
$kods=$_POST['ks1'];


	if ($edit = mysqli_query($mysqli, "UPDATE ujian SET aktif='1' WHERE kodesoal='$kods'")){
		header("Location:v_bank_soal.php");
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($mysqli));

?>