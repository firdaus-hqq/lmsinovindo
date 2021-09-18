<?php 
include '../../config/config.php';
session_start();

date_default_timezone_set("Asia/Jakarta");
$DATE_FORMAT = "Y-m-d";
$tgl_buat = date($DATE_FORMAT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fileTugas = @$_FILES['fileTugas'];
    $file   = $fileTugas['name'];
    $tanggal = $tgl_buat;
    $pembuat  = $_POST['pembuat'];
}
    if (!empty($fileTugas) and $fileTugas['error'] == 0) {
        $path = '../tentang/';
        $upload = move_uploaded_file($fileTugas['tmp_name'], $path . $fileTugas['name']);

        if (!$upload) {
            echo "<script>alert('Upload GAGAL!')</script>";
            header('location:tentang.php');
        }
        $file = $fileTugas['name'];
    }

    $sql = "INSERT INTO tentang (file, tanggal, pembuat) 
            VALUES ('$file', '$tanggal', '$pembuat')";

    $mysqli->query($sql) or die($mysqli->error);

    header("location:tentang.php");


$sql = "SELECT * FROM tentang order by id_tentang desc";
$tugas = $mysqli->query($sql) or die($mysqli->error);
?>