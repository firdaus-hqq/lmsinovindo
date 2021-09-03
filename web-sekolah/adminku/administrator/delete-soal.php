<?php
session_start();
include '../../config/config.php';
if($admin_su == 1)
{
$username=$_SESSION['admin'];
}
else if ($admin_su == 0)
{
$username=$_SESSION['admin'];
}
else
{
header('location:v_bank_soal.php?gagal=1');
exit;
}
$jenis=$_GET['jenis'];
$kode=$_GET['kode'];
mysqli_query ($mysqli, "DELETE FROM soal where jenissoal='$jenis' and kodesoal='$kode'");
mysqli_query ($mysqli, "DELETE FROM ujian where kodesoal='$kode'");
header('location:v_bank_soal.php');
?>
