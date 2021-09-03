<?php
include ('cek.php');
include ('../config/config.php');
include ('fungsi.php');

    
$nis			= $_POST['nis'];
$nama			= $_POST['nama'];
$kelas 			= $_POST['kelas'];
$kodesoal		= $_POST['kodesoal'];
$aktif			= $_POST['aktif'];
$waktu			= $_POST['waktu'];
$jumlahsoal		= $_POST['jumlahsoal'];
$lamaujian      = $_POST['lamaujian'];
$mulaiujian     = $_POST['mulaiujian'];
$waktuselesai   = $_POST['waktuselesai'];
$sisawaktu      = $_POST['sisawaktu']+(60);

$ok         = $_POST['ok'];


         if ($statuslogin =='1') {
        header('location:confirm.php?aktif=1');
        } elseif ($ok =='1') {
        header('location:confirm.php?sudah=1');
        } else {
        ($add = mysqli_query($mysqli, "INSERT INTO jawaban (nis, nama, kelas, kodesoal, aktif, waktu, jumlahsoal, lamaujian, mulaiujian, waktuselesai, sisawaktu) VALUES 
        	('$nis', '$nama', '$kelas', '$kodesoal', '$aktif', '$waktu', '$jumlahsoal', '$lamaujian', '$mulaiujian', '$waktuselesai', '$sisawaktu') ON DUPLICATE KEY UPDATE nis='$username', nama='$nama', kelas='$kelas' "));
        		header("Location:konfirm.php");
        		fclose($file);
        		exit();
        }   

?>