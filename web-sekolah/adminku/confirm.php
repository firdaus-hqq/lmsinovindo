<?php
include('cek.php');
include('../config/config.php');
include('fungsi.php');

$kode = $_GET['kode'];
$waktu = $_GET['waktu'];
$waktune = $waktu * 60;
$query2 = mysqli_query($mysqli, "SELECT * FROM ujian WHERE kodesoal='$kode'");
$ur = mysqli_fetch_array($query2);
if ($ur['aktif'] == 0) {
    header('location:ujian.php?gagal=1');
    exit;
}
$querydosen = mysqli_query($mysqli, "SELECT * FROM ujian where kodesoal='$kode' and aktif='1'");
if ($querydosen == false) {
    die("Terjadi Kesalahan : " . mysqli_error($mysqli));
}
while ($ar = mysqli_fetch_array($querydosen)) {
    date_default_timezone_set('Asia/Jakarta');
    $saiki = date('H:i:s');
    $lama = time();
    $buyar = $waktune + $lama;
    $result = mysqli_query($mysqli, "SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]'");
    $rows = mysqli_num_rows($result);
    if (!$ar['aktif'] == '1') {
        $aktif = "<span style=color:red>Tidak Aktif</span>";
    } else {
        $aktif = "Aktif";
    }
    if ($aktif == '1') {
        $tombol = "Tidak Aktif";
    } else {
        $tombol = '<br><button id="konfir" type="submit" class="btn btn-success"><b>MASUK</b></button>
                        </div>';
    }
}
?>

<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>IDM ACADEMY</title>
    <link href="aset/foto/logo.png" rel="icon" type="image/png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .no-close .ui-dialog-titlebar-close {
            display: none;
        }
    </style>
    <style>
        .left {
            float: left;
            width: 65%;
        }

        .right {
            float: right;
            width: 30%;
            background-color: #333333;
            height: 101px;
            color: #FFFFFF;
            font-size: 13px;
            font-style: normal;
            font-weight: normal;
        }

        .user {
            color: #FFFFFF;
            font-size: 15px;
            font-style: normal;
            font-weight: bold;
            top: -20px;
        }

        .log {
            color: #3799c2;
            font-size: 11px;
            font-style: normal;
            font-weight: bold;
            top: -20px;
        }

        .group:after {
            content: "";
            display: table;
            clear: both;
        }

        /*	img {max-width: 100%; height: auto;}	*/
        .visible {
            display: block !important;
        }

        .hidden {
            display: none !important;
        }

        .foto {
            height: 80px;
        }

        @media screen and (max-width: 780px) {

            /* jika screen maks. 780 right turun */
            /*    .left, */
            .left,
            .right {
                float: none;
                width: auto;
                margin-top: 0px;
                height: 91px;
                color: #FFFFFF;
                display: block;
            }

            .foto {
                height: 65px;
            }
        }

        @media screen and (max-width: 400px) {

            /* jika screen maks. 780 right turun */
            /*    .left, */
            .left {
                width: auto;
                height: 91px;
            }

            .right {
                float: none;
                width: auto;
                margin-top: 0px;
                height: 60px;
                color: #FFFFFF;
            }

            .foto {
                height: 40px;
            }
        }

        #konfir {
            border-radius: 0;
            z-index: 0;
            background-color: #48a845;
            border: 0;
            position: absolute;
            right: 10;
        }

        #garis {
            border: 0;
        }

        .col-md-6 {
            margin-top: 100px;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #242a30;
            color: #565656;
            text-align: center;
            font-family: sans-serif;
        }
    </style>
    <link href="klien.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body class="font-medium" style="background-color:#cacaca">
    <header style="background-color:#2e6499; ">
        <div class="group">
            <div class="left" style="background-color:#2e6499;"><img src="aset/foto/logo.png" style=" margin-left:0px; max-width:106px; max-height:106px;"></div>
            <div class="right">
                <table width="100%" border="0" cellspacing="5px;" style="margin-top:10px">
                    <tbody>
                        <tr>
                            <td rowspan="3" width="100px" align="center"><img src="avatar.gif" style=" margin-left:0px; margin-top:5px" class="foto"></td>
                            <?php $queryn = mysqli_query($mysqli, "SELECT * FROM siswa WHERE id_siswa=" . $_SESSION['idsiswa']);
                            if ($queryn == false) {
                                die("Terjadi Kesalahan : " . mysqli_error($mysqli));
                            }
                            while ($r = mysqli_fetch_array($queryn)) {
                                $id_kelas = $r['id_kelas'];
                                $query3 = mysqli_query($mysqli, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
                                $r2 = mysqli_fetch_array($query3);
                            ?>
                        </tr>
                        <tr>
                            <td><span class="user"><?php echo $nama; ?><br><?php echo $r2['nama']; ?></span></td>
                        </tr>
                        <tr>
                            <td><span class="log"><a href="logout.php">Logout</a><span></span></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </header>


    <div class="col-md-6 col-md-offset-3 login-wrapper" style="float:inherit">
        <div class="panel panel-default">

            <form action="mulai.php" method="post">

                <div id="garis" class="list-group-item top-heading">
                    <h3 class="list-group-item-heading page-label">Konfirmasi Data Ujian</h3>
                </div>
                <div id="garis" class="list-group-item">
                    <label class="list-group-item-heading">ID Siswa</label>
                    <p class="list-group-item-text"><?php echo "$_SESSION[idsiswa]"; ?></p>
                </div>
                <div id="garis" class="list-group-item">
                    <label class="list-group-item-heading">Nama</label>
                    <p class="list-group-item-text"><?php echo $nama; ?> | <?php echo "$r2[nama]"; ?></p>
                </div>
            <?php } ?>
            <div id="garis" class="list-group-item">
                <label class="list-group-item-heading">Kode Soal </label>
                <p class="list-group-item-text"><?php echo "$kode"; ?></p>
            </div>
            <div id="garis" class="list-group-item">
                <label class="list-group-item-heading">Jumlah Soal </label>
                <p class="list-group-item-text"><?php echo "$rows"; ?></p>
            </div>
            <div id="garis" class="list-group-item">
                <label class="list-group-item-heading">Waktu </label>
                <p class="list-group-item-text"><?php echo $ur['waktu']; ?> MENIT</p>
            </div>
            <input id="nis" name="nis" type="hidden" value="<?php echo "$_SESSION[idsiswa]"; ?>">
            <input id="nama" name="nama" type="hidden" value="<?php echo "$nama"; ?>">
            <input id="kelas" name="kelas" type="hidden" value="<?php echo "$kelas"; ?>">
            <input id="kode" name="kodesoal" type="hidden" value="<?php echo "$kode"; ?>">
            <input id="kode" name="jumlahsoal" type="hidden" value="<?php echo "$rows"; ?>">
            <input id="aktif" name="aktif" type="hidden" value="<?php echo $aktif; ?>">
            <input id="waktu" name="waktu" type="hidden" value="<?php echo $waktu; ?>">
            <input id="waktuselesai" name="waktuselesai" type="hidden" value="<?php echo date("H:i:s", $buyar); ?>">
            <input id="mulaiujian" name="mulaiujian" type="hidden" value="<?php echo $saiki; ?>">
            <input id="lamaujian" name="lamaujian" type="hidden" value="<?php echo "" . gmdate("H", $waktune) . ":" . gmdate("i", $waktune) . ":" . gmdate("s", $waktune) . ""; ?>">
            <input id="sisawaktu" name="sisawaktu" type="hidden" value="<?php echo "$waktune"; ?>">
            <?php $queryn = mysqli_query($mysqli, "SELECT * FROM nilaihasil WHERE nama='$nama' and kodesoal='$kode'");
            if ($queryn == false) {
                die("Terjadi Kesalahan : " . mysqli_error($mysqli));
            }
            while ($r = mysqli_fetch_array($queryn)) {
                $ok = $r["aktif"];
            }

            ?>
            <input id="ok" name="ok" type="hidden" value="<?php echo $ok; ?>">
            <div id="garis" class="list-group-item">
                <div class="row">
                    <?php echo "$tombol"; ?>
                </div>
            </div>


            </form>
            <?php if (!empty($_GET['aktif'])) {
                echo "&emsp;<a id='ok' href='ujian.php'><button id='ok' type='button' class='btn btn-primary btn-xs' data-toggle='modal'><i class='fa fa-arrow-left'></i> BACK</button></a> <h5 style='color:red;'>&emsp;Ujian siswa <b>AKTIF</b>, Silahkan <b>RESET LOGIN !!</b></h5>";
            }
            ?>
            <?php if (!empty($_GET['sudah'])) {
                echo "&emsp;<a id='ok' href='ujian.php'><button id='ok' type='button' class='btn btn-primary btn-xs' data-toggle='modal'><i class='fa fa-arrow-left'></i> BACK</button></a> <h5 style='color:red;'>&emsp;Siswa Sudah selesai mengerjakan SOAL ini !!</b></h5>";
            }
            ?>
        </div>
    </div>
    <div id="buntut">
</body>

</html>