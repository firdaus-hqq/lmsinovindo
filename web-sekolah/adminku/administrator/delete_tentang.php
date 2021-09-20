<?php
  include '../../config/config.php';
  $id_tentang = $_GET['id_tentang'];

  if (!empty($id_tentang)) {
    $sql = "DELETE FROM tentang WHERE id_tentang = $id_tentang";
  
    if ($mysqli -> query($sql)) {
      echo "<script>alert('Dokumen berhasil dihapus')</script>";
    }
    else {
      echo "<script>alert('Dokumen gagal dihapus')</script>";
    }
  }

  header('location:tentang.php');
?>