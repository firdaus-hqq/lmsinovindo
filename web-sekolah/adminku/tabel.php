<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "db_rpl";

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


<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "db_rpl";
    
    $conn = mysqli_connect($host, $username, $password, $db);
    
    if (!$conn){
    
    }

    $query = mysqli_query($conn, "SELECT * FROM admin_tanggal_tugas");

    $data = mysqli_fetch_assoc($query);

    ?>

<h1>
    Selamat Datang di
    <small>Halaman E-Learning Siswa</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-calendar"></i><?php include "jam/jam.php" ?></a></li>
    <li class="active"><?php include "jam/tanggal.php" ?></li>
</ol>
</section>

<!-- Main content -->
<section class="content">

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/bootsrap.min.css">
        </link .>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>

    <body>

        <div class="container">
            <p>
            <h2>Tugas</h2>
            </p>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><strong>Batas Pengumpulan</strong></td>
                        <td><?php echo $data['batas_pengumpulan']?></td>

                    </tr>
                    <tr>
                        <td><strong>Waktu Tenggat</strong< /td>
                        <td><?php echo $data['waktu_tenggat']?></td>
                    </tr>
                    <tr>
                        <td><strong>Waktu Pengumpulan</strong< /td>
                        <td><?php echo $data['waktu_pengumpulan']?></td>
                    </tr>
                    <tr>
                        <td><strong>Pengiriman berkas</strong< /td>
                        <td>Berbentuk file atau link </td>
                    </tr>
                </tbody>
            </table>
            <center>
                <a href="../adminku/tambahtugas.php">
                    <button name=“submit” type="submit" id="buttonSubmit" class="btn btn-success">Tambah Tugas</button>
                </a>
            </center>
        </div>
        <br>
        <div class="container">
            <p>
            <h2>Edit Tugas</h2>
            </p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Dokumen</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        </td>
                        <td class="mailbox-name">
                            <?= $tugas['tanggal'] ?>
                        </td>
                        <td class="mailbox-date"><?= $tugas['file'] ?></td>
                        <td class="mailbox-date"><?= $tugas['link'] ?></td>
                        <td>
                            <a href="../adminku/edit.php?id=<?= $tugas['id_file']; ?>"><button class="btn btn-info">Edit</button></a>
                            
                            <a href="accept.php?id=<?= $tugas['id_file'] ?>"><button class="btn btn-danger">Hapus</button></a>
                        </td>

                        <?php ?>
                </tbody>
            </table>
            <!-- /.table -->   
            </td>
            </tbody>
            </table>
        </div>
        </div>

    </body>

    </html>