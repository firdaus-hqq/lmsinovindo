<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');
	if ($edit = mysqli_query($konek, "UPDATE siswa SET statuslogin='0'")){
		header("Location:../monitor.php");
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
?>