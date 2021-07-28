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
                        <td>tanggal</td>

                    </tr>
                    <tr>
                        <td><strong>Waktu Tenggat</strong< /td>
                        <td>tanggal dan waktu</td>
                    </tr>
                    <tr>
                        <td><strong>Waktu Pengumpulan</strong< /td>
                        <td>tanggal dan waktu</td>
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
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Dokumen</th>
                        <th>Link</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>01-01-1970</td>
                        <td>Anggap Gambar</td>
                        <td>Anggap link</td>
                        <td>
                            <button class="btn btn-info">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>

    </body>

    </html>