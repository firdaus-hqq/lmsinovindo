<?php
// error_reporting(0);
include '../../config/config.php';
$jenissoal            = $_POST['jenissoal'];
$kelas            = $_POST['kelas'];
$kodesoal            = $_POST['kodesoal'];
$waktu                = $_POST['waktu'];
$acak                = $_POST['acak'];
$opsi                = $_POST['opsi'];
$waktune = $waktu * 60;
$suwe = '' . gmdate('H', $waktune) . ':' . gmdate('i', $waktune) . ':' . gmdate('s', $waktune) . '';
if ($add = mysqli_query($mysqli, "INSERT INTO soal (jenissoal, kodesoal) VALUES 
	('$jenissoal', '$kodesoal')")) {
}
if ($add = mysqli_query($mysqli, "INSERT INTO ujian (jenis, kodesoal, kelas, waktu, lamaujian, acak, opsi) VALUES 
	('$jenissoal', '$kodesoal', '$kelas', '$waktu', '$suwe', '$acak', '$opsi')")) {
    header("Location:v_bank_soal.php");
    exit();
}
die("Terdapat kesalahan : " . mysqli_error($mysqli));
