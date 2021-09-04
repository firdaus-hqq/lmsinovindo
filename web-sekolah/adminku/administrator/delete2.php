<?php
  include '../../config/config.php';
  $id_file = $_GET['id_file'];

  if (!empty($id_file)) {
    $sql = "DELETE FROM tugas WHERE id_file = $id_file";
  
    if ($mysqli -> query($sql)) {
      echo "<script>alert('Tugas telah dihapus')</script>";
    }
    else {
      echo "<script>alert('Tugas gagal dihapus')</script>";
    }
  }

  header('location:tabel2.php');