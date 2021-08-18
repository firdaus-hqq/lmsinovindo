<?php
include "../config/config.php";
include "configurasi/koneksi.php";
include "configurasi/library.php";
include "configurasi/fungsi_indotgl.php";
include "configurasi/fungsi_combobox.php";
include "../adminku/configurasi/v_tabel.php";


if (isset($_SESSION['idsiswa'])) {
    $id_siswa = $_SESSION['idsiswa'];
    $sql = "SELECT * FROM tugas WHERE id_siswa = " . $id_siswa;
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $tugas = $result->fetch_array();
    } else {
        // echo ("ID Tidak ditemukan.");
    }
} else {
    // echo ("ID Tidak ditemukan");
}
$listTugas = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootsrap.min.css">
    </link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
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
        <div class="container">
            <form action="" method="POST">
                <hr>
                <label for="waktu_tenggat">Waktu Tenggat</label>
                <input type="datetime-local" class="form-control datetimepicker" id="waktu_tenggat" name="waktu_tenggat" placeholder="(DD/MM/YY)">
                <input type="submit" name="submit" value="submit">
            </form>
        </div>
        <div class="container">
            <p>
            <h2>Tugas</h2>
            </p>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><strong>Waktu Tenggat</strong></td>
                        <td> <?php echo $data['waktu_tenggat']?></td>
                    </tr>
                    </tr>
                    <tr>
                        <td><strong>Pengiriman berkas</strong></td>
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($tugas = $listTugas->fetch_array()) {
                    ?>
                        <tr>
                            </td>
                            <td class="mailbox-name">
                                <?= $tugas['tanggal'] ?>
                            </td>
                            <td class="mailbox-date"><?= $tugas['file'] ?></td>
                            <td class="mailbox-date"><?= $tugas['link'] ?></td>
                            <td>
                                <a href="../adminku/edit.php?id=<?= $tugas['id_file']; ?>"><button class="btn btn-info">Edit</button></a>

                                <button class="btn btn-danger" onclick="confirm('Yakin ingin menghapus tugas ini?') ? window.location.href='delete.php?id_file=<?= $tugas['id_file'] ?>':''">Hapus</button></a>
                            </td>
                        </tr>
                    <?php } ?>
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