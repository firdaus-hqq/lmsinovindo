<?php
include '../../config/config.php';

$id_pemberitahuan = $_GET['id_pemberitahuan'];

date_default_timezone_set("Asia/Jakarta");
$DATE_FORMAT = "Y-m-d";
$tgl_buat = date($DATE_FORMAT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $tgl_buat;
    $isi = $_POST['isi'];
    $pembuat = $_POST['pembuat'];

    $sql = "UPDATE pemberitahuan SET
                tanggal = '$tanggal',
                isi = '$isi',
                pembuat = '$pembuat'
            WHERE id_pemberitahuan = $id_pemberitahuan;
            ";

    $mysqli->query($sql) or die($mysqli->error);

    header('location: v_pemberitahuan.php');
}

$sql = "SELECT * FROM pemberitahuan";
$toa = $mysqli->query($sql) or die($mysqli->error);

if (empty($id_pemberitahuan)) header('location: v_pemberitahuan.php');

$sql = "SELECT * FROM pemberitahuan WHERE id_pemberitahuan = '$id_pemberitahuan'";
$query = $mysqli->query($sql);
$toa = $query->fetch_array();

if (empty($toa)) header('location: v_pemberitahuan.php');

include 'v_edit_pemberitahuan.php';