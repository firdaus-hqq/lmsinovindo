<?php
include '../../config/config.php';
if(isset($_GET['id_file']))
{   
    $id_file = $_GET['id_file'];    
    $query3 = mysqli_query($mysqli, "UPDATE tugas SET status = 'konfirmasi' WHERE id_file=".$id_file);
    if($query3){
        echo"<script>alert('Tugas Terkonfirmasi');window.location.href='tabel2.php?id_kelas=".$_GET['id_kelas']."'</script>";
    }
}
?>