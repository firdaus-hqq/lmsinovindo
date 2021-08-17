<?php
  include '../config/config.php';
  $id_siswa = $_SESSION['idsiswa'];

  if (!empty($id_siswa)) {
    $sql = "DELETE FROM tugas WHERE id_siswa = $id_siswa";
  
    if ($mysqli -> query($sql)) {
      echo "<script>alert('Dokumentasi telah dihapus')</script>";
    }
    else {
      echo "<script>alert('Dokumentasi tidak terhapus')</script>";
    }
  }

  header('location: ../adminku/tabel.php');
?>