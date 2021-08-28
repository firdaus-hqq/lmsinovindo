<?php
session_start();
include ('cek.php');
include ('../../config/config.php');
include ('fungsi.php');
$mulaiujian     = $_POST['mulaiujian'];

    					date_default_timezone_set('Asia/Jakarta');
						$saiki=date('H:i:s');
						
						$lama=time();
						$buyar=$mulaiujian+$lama;
						$wes=date("H:i:s",$buyar);
mysqli_query($mysqli, "UPDATE jawaban SET mulaiujian='$saiki', waktuselesai='$wes' WHERE nis='$nis'");
		header("Location:ujianstart.php");
		exit();
?>