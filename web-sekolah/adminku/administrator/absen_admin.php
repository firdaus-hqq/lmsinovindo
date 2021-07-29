<?php 
include '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id            = @$_POST['id'];
    $absen_dibuka  = @$_POST['absen_dibuka'];
    $absen_ditutup = @$_POST['absen_ditutup'];
    $deskripsi     = @$_POST['deskripsi'];
}
?>