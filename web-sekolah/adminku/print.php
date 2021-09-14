<?php
    session_start();
    include '../config/config.php';

    $query = "SELECT * from siswa WHERE id_siswa = ".$_SESSION['idsiswa'];
    $siswa = mysqli_query($mysqli, $query);

    $data_siswa = mysqli_fetch_assoc($siswa);

    $image = imagecreatefromjpeg("sertifikat.jpg");
    $white = imagecolorallocate($image, 0, 0, 0);
    $font = __DIR__ . "/baru.ttf";
    $angka = __DIR__ . "/inter.ttf";
    $bold = __DIR__ . "/bold.ttf";
    $nama = $data_siswa['nama_lengkap'];
    $awal = $data_siswa['tgl_masuk'];
    $akhir = $data_siswa['tgl_keluar'];
    $noserti = '299';
    $bulan = 'VIII';
    $tahun = 2029;
    $jurusan = $data_siswa['nama_lengkap'];
    
    // imagettftext($image, 150, 0, 1455, 1350, $white, $font, $text);

    $bbox = imagettfbbox(100, 0, $font, $nama);
    $center1 = (imagesx($image) / 2) - (($bbox[2] - $bbox[0]) / 2);

    imagettftext($image, 100, 0, $center1, 920, $white, $font, $nama);
    imagettftext($image, 29, 0, 823, 1188, $white, $angka, $awal);
    imagettftext($image, 29, 0, 1180, 1188, $white, $angka, $akhir);
    imagettftext($image, 29, 0, 850, 498, $white, $angka, $noserti);
    imagettftext($image, 29, 0, 1385, 498, $white, $angka, $bulan);
    imagettftext($image, 29, 0, 1470, 498, $white, $angka, $tahun);
    imagettftext($image, 30, 0, 1155, 1108, $white, $bold, $jurusan);

    header("Content-type: image/jpeg");
    imagejpeg($image);
