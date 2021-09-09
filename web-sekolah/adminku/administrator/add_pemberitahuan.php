<?php
if (!isset($_SESSION)) {
    session_start();
}
include '../../config/config.php';

date_default_timezone_set("Asia/Jakarta");
$DATE_FORMAT = "Y-m-d";
$tgl_buat = date($DATE_FORMAT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $tgl_buat;
    $isi = $_POST['isi'];
    $pembuat = $_POST['pembuat'];

    $sql = "INSERT INTO pemberitahuan (tanggal, isi, pembuat) VALUES
            ('$tanggal', '$isi', '$pembuat')";

    $mysqli->query($sql) or die($mysqli->error);

    header("location:v_pemberitahuan.php");
}

$sql = "SELECT * FROM pemberitahuan";
$toa = $mysqli->query($sql) or die($mysqli->error);

include 'v_pemberitahuan.php';
