<?php

    $host = "localhost";
    $username = "root";
    $pass = "";
    $db_name = "rekap_kehadiran2";

    $conn = mysqli_connect($host, $username, $pass, $db_name);

    
    $tgl_absen = date('Y-m-d');
    $statusAbsensi = $_POST['absensi'];
    $id_siswa = $_POST['siswa'];

    //Cek Apakah Murid Tersebut Sudah Absen Atau Belum
    $selectDataSiswa = "SELECT * FROM absen_siswa WHERE tgl_absen = '$tgl_absen' && id_siswa='$id_siswa'";
    $querySiswa = mysqli_query($conn, $selectDataSiswa);

    if (mysqli_num_rows($querySiswa) == 0){
        $sql = "INSERT INTO absen_siswa VALUES('', '$tgl_absen', '$statusAbsensi', '$id_siswa')";
        
        $query = mysqli_query($conn, $sql);
        
        if ($query){
            echo "Absen Berhasil";
        } else {
            echo "Absen Gagal / Anda Sudah Absen";
        }
    } else {
        echo "Anda Sudah Absen";
    }

?>