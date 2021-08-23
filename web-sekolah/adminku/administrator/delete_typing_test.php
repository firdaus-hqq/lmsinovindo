<?php
  include '../../config/config.php';
  $id_peringkat = $_GET['id_peringkat'];

  if (!empty($id_peringkat)) {
    $sql = "DELETE FROM peringkat WHERE id_peringkat = $id_peringkat";
  
    if ($mysqli -> query($sql)) {
      echo "<script>alert('Rank berhasil dihapus')</script>";
    }
    else {
      echo "<script>alert('Rank gagal dihapus')</script>";
    }
  }

  header('location:v_typing_test.php');
?>