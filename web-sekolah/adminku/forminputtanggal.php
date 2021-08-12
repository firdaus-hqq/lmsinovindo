<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "your_tasks";

$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn){
   
}

if(isset($_POST['submit'])){
    $batas_pengumpulan = $_POST['batas_pengumpulan'];
    $waktu_tenggat = $_POST['waktu_tenggat'];
    $waktu_pengumpulan = $_POST['waktu_pengumpulan'];

    $query = mysqli_query($conn, "UPDATE admin_tanggal_tugas SET batas_pengumpulan = '$batas_pengumpulan', waktu_tenggat = '$waktu_tenggat', waktu_pengumpulan = '$waktu_pengumpulan'");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="batas_pengumpulan">Batas pengumpulan</label>
        <input type="date" id="batas_pengumpulan" name="batas_pengumpulan"><hr>
        <label for="waktu_tenggat">Waktu Tenggat</label>
        <input type="datetime-local" id="waktu_tenggat" name="waktu_tenggat"><hr>
        <label for="waktu_pengumpulan">Waktu Pengumpulan</label>
        <input type="datetime-local" id="waktu_pengumpulan" name="waktu_pengumpulan"><hr>

        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>



