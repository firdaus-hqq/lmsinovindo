<?php
  include '../../config/config.php';
  $id_pemberitahuan = $_GET['id_pemberitahuan'];

  if (!empty($id_pemberitahuan)) {
    $sql = "DELETE FROM pemberitahuan WHERE id_pemberitahuan = $id_pemberitahuan";
  
    if ($mysqli -> query($sql)) {
      echo "<script>alert('Pemberitahuan berhasil dihapus')</script>";
    }
    else {
      echo "<script>alert('Pemberitahuan gagal dihapus')</script>";
    }
  }

  header('location:v_pemberitahuan.php');
?>