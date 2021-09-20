<?php
include "../config/config.php";
include "configurasi/koneksi.php";
include "configurasi/library.php";
include "configurasi/fungsi_indotgl.php";
include "configurasi/fungsi_combobox.php";
include "timeout.php";

if (isset($_SESSION['idsiswa'])) {
    $id_siswa = $_SESSION['idsiswa'];
    $sql = "SELECT * FROM data_absen WHERE id_siswa = " . $id_siswa;
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $data_absen = $result->fetch_array();
    }
}
$listDataAbsen = $mysqli->query($sql);

$query = "SELECT * from siswa WHERE id_siswa = " . $_SESSION['idsiswa'];
$siswa = mysqli_query($mysqli, $query);

$data_siswa = mysqli_fetch_assoc($siswa);

$awalKerja  = strtotime($data_siswa['tgl_masuk']);
$akhirKerja = strtotime($data_siswa['tgl_keluar']);
$jumlahHari = $akhirKerja - $awalKerja;

$jumlah_presensi = round($jumlahHari / (60 * 60 * 24));

$hadir = mysqli_query($mysqli, "SELECT * FROM data_absen WHERE kehadiran = 'H' AND id_siswa = " . $id_siswa);
$jumlah_hadir = mysqli_num_rows($hadir);

$izin = mysqli_query($mysqli, "SELECT * FROM data_absen WHERE kehadiran = 'I' AND id_siswa = " . $id_siswa);
$jumlah_izin = mysqli_num_rows($izin);

$sakit = mysqli_query($mysqli, "SELECT * FROM data_absen WHERE kehadiran = 'S' AND id_siswa = " . $id_siswa);
$jumlah_sakit = mysqli_num_rows($sakit);

// $jumlah_presensi = $jumlah_hadir + $jumlah_izin + $jumlah_sakit;

$start = new DateTime($data_siswa['tgl_masuk']);
$end = new DateTime($data_siswa['tgl_keluar']);
$oneday = new DateInterval("P1D");

$days = array();
$data = "7.5";

/* Iterate from $start up to $end+1 day, one day in each iteration.
   We add one day to the $end date, because the DatePeriod only iterates up to,
   not including, the end date. */
foreach (new DatePeriod($start, $oneday, $end->add($oneday)) as $day) {
    $day_num = $day->format("N"); /* 'N' number days 1 (mon) to 7 (sun) */
    if ($day_num < 7) { /* weekday */
        $days[$day->format("Y-m-d")] = $data;
    }
}

$jumlah_presensi = count($days) - 1;

$persentase = number_format($jumlah_hadir / $jumlah_presensi * 100);

if ($_SESSION['login'] == 1) {
    if (!cek_login()) {
        $_SESSION['login'] = 0;
    }
}
if ($_SESSION['login'] == 0) {
    echo "<link href='bs3/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
 <center><br><br><br><br><br><br>Maaf, untuk masuk <b>Halaman</b><br>
  <center>anda harus <b>Login</b> dahulu!<br><br>";
    echo "<div> <a href='#'><img src='images/kunci.png'  height=176 width=143></a>
             </div>";
    echo "<input type=button class='btn btn-primary' value='LOGIN DI SINI' onclick=location.href='../login_siswa.php'></a></center>";
} else {
    if (empty($_SESSION['username']) and empty($_SESSION['passuser']) and empty($_SESSION['leveluser']) and $_SESSION['login'] == 0) {
        echo "<link href='bs3/css/bootstrap.min.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>
 <center><br><br><br><br><br><br>Maaf, untuk masuk <b>Halaman</b><br>
  <center>anda harus <b>Login</b> dahulu!<br><br>";
        echo "<div> <a href='index.php'><img src='images/kunci.png'  height=176 width=143></a>
             </div>";
        echo "<input type=button class='btn btn-primary' value='LOGI DI SINI' onclick=location.href='../login_siswa.php'></a></center>";
    } else {
?>
        <!DOCTYPE html>
        <html>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="ThemeBucket">
        <title>Halaman Siswa</title>
        <!-- Bootstrap 3.3.4 -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="plugins/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />



        <!-- DATATABLES -->
        <link href="plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

        <link href="plugins/datatables/extensions/Responsive/css/responsive.dataTables.css" rel="stylesheet" type="text/css" />
        <!-- DATATABLES -->


        <link href="dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />

        <link href="dist/css/ando_admin.css" rel="stylesheet" type="text/css" />

        <link href='plugins/jquery-ui-1.11.4/jquery-ui.min.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="plugins/file-uploader/css/jquery.fileupload.css">
        <link rel="stylesheet" href="plugins/file-uploader/css/jquery.fileupload-ui.css">
        <noscript>
            <link rel="stylesheet" href="plugins/file-uploader/css/jquery.fileupload-noscript.css">
        </noscript>
        <noscript>
            <link rel="stylesheet" href="plugins/file-uploader/css/jquery.fileupload-ui-noscript.css">
        </noscript>
        <link href="plugins/datepicker/datepicker.css" rel="stylesheet">

        <script type="text/javascript">
            window.setTimeout("waktu()", 1000);

            function waktu() {
                var tanggal = new Date();
                setTimeout("waktu()", 1000);
                document.getElementById("output").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + " WIB";
            }
            window.setTimeout("waktu_m()", 1000);

            function waktu_m() {
                var tanggal = new Date();
                setTimeout("waktu_m()", 1000);
                document.getElementById("output_m").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + " WIB";
            }
        </script>
        </head>

        <body class="skin-blue sidebar-mini">
            <div class="wrapper">

                <!-- Main Header -->
                <header class="main-header">

                    <!-- Logo -->
                    <a href="index2.html" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"><b>I</b>DM</span>
                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg"><b>IDM | </b> A C A D E M Y</span>
                    </a>

                    <!-- Header Navbar -->
                    <nav class="navbar navbar-static-top" role="navigation">
                        <!-- Sidebar toggle button-->
                        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                        <!-- Navbar Right Menu -->
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <!-- Messages: style can be found in dropdown.less-->


                                <li class="dropdown user user-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <!-- The user image in the navbar-->
                                        <?php
                                        echo "<img src='foto_siswa/medium_$_SESSION[foto]' class='user-image' alt='User Image'>"; ?>
                                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                        <span class="hidden-xs"> <?php echo "$_SESSION[namalengkap]"; ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- The user image in the menu -->
                                        <li class="user-header">
                                            <?php
                                            echo "<img src='foto_siswa/medium_$_SESSION[foto]' class='img-circle' alt='User Image'>"; ?>
                                            <p>
                                                <?php echo "$_SESSION[namalengkap]"; ?>
                                            </p>
                                        </li>
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <?php echo "
                                                <a href='media.php?module=siswa&act=detailprofilsiswa&id=$_SESSION[idsiswa]' class='btn btn-default btn-flat'>Profile</a>
                                                </div>
                                                <div class='pull-right'>
                                                <a href='logout.php' class='btn btn-default btn-flat'>Sign out</a>
                                                </div>";
                                                ?>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Control Sidebar Toggle Button -->

                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- Left side column. contains the logo and sidebar -->
                <aside class="main-sidebar">

                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">

                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel">
                            <div class="pull-left image">
                                <?php
                                echo "<img src='foto_siswa/medium_$_SESSION[foto]' class='img-circle' alt='User Image'>"; ?>
                            </div>
                            <div class="pull-left info">
                                <p><?php echo "$_SESSION[namalengkap]"; ?></p>
                                <!-- Status -->
                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                        </div>

                        <!-- Sidebar Menu -->
                        <ul class="sidebar-menu">
                            <li class="header">Menu Learning</li>

                            <!-- Optionally, you can add icons to the links -->
                            <li><a href="home"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
                            <li><a href="media.php?module=kelas"><i class="fa fa-home"></i> <span>Sekolah Kamu</span></a></li>
                            <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-check"></i>
                                    <span>Absensi</span><i class='fa fa-angle-left pull-right'></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="v_absen.php">
                                            <i class='fa fa-circle-o'></i><span class="title">Mengisi Absensi</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="v_data_absen.php">
                                            <i class='fa fa-circle-o'></i><span class="title">Data Absensi</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="tugas.php"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
                            <li><a href="../../CBT_E-school/on-siswa/ujian.php"><i class="fa fa-laptop"></i> <span>Ujian</span></a></li>
                            <li><a href="v_peringkat_typing.php"><i class="fa fa-trophy"></i> <span>Peringkat</span></a></li>
                            <li><a href="sertifikat.php"><i class="fa fa-certificate"></i> <span>Sertifikat</span></a></li>
                            <li class="header">Account</li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-th"></i>
                                    <span>Account Kamu</span><i class='fa fa-angle-left pull-right'></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php echo "
                        <li>
                            <a href='media.php?module=siswa&act=detailprofilsiswa&id=$_SESSION[idsiswa]'>
                                 <i class='fa fa-circle-o'></i><span class='title'>Detail Profil</span>
                            </a>
                        </li>
                        <li>
                            <a href='media.php?module=siswa&act=detailaccount'>
                                 <i class='fa fa-circle-o'></i><span class='title'>Edit Password</span>
                            </a>
                        </li>";
                                    ?>
                                </ul>
                            </li>
                        </ul><!-- /.sidebar-menu -->
                    </section>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            Data Absensi
                            <small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-calendar"></i><?php include "jam/jam.php" ?></a></li>
                            <li class="active"><?php include "jam/tanggal.php" ?></li>
                        </ol>
                    </section>

                    <!-- Main content -->
                    <section class="content">
                        <div class="box box-warning">
                            <div class='box-header with-border'>
                                <div class="table-responsive">
                                    <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                                <th>Hari ke-</th>
                                                <th>Tanggal</th>
                                                <th>Kehadiran</th>
                                                <th>Kegiatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($data_absen = $listDataAbsen->fetch_array()) {
                                            ?>
                                                <tr>
                                                    <td scope="row"><?= $i++; ?></td>
                                                    <td><?= $data_absen['waktu']; ?></td>
                                                    <td><?= $data_absen['kehadiran']; ?></td>
                                                    <td><?= $data_absen['kegiatan']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <br>
                                    <table class="table table-bordered table-striped with-check">
                                        <thead>
                                            <tr>
                                                <th colspan="3">Jumlah</th>
                                                <th rowspan="2">Persentase</th>
                                            </tr>
                                            <tr>
                                                <th>H</th>
                                                <th>I</th>
                                                <th>S</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $jumlah_hadir ?></td>
                                                <td><?= $jumlah_izin ?></td>
                                                <td><?= $jumlah_sakit ?></td>
                                                <td><?= $persentase ?>%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section><!-- /.content -->
                </div><!-- /.content-wrapper -->

                <!-- Main Footer -->
                <footer class="main-footer">
                    <!-- To the right -->
                    <div class="pull-right hidden-xs">
                        Version 1.0
                    </div>
                    <!-- Default to the left -->
                    <strong>Copyright &copy; <?php echo (int)date('Y'); ?> <a href="https://inovindo.co.id/" target="_blank">INOVINDO DIGITAL MEDIA</a></strong>
                </footer>

                <!-- Control Sidebar -->

                <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
                <div class="control-sidebar-bg"></div>
            </div><!-- ./wrapper -->

            <script src="plugins/jQuery/jquery-1.12.0.min.js"></script>
            <script src="plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script>
            <script src="plugins/jquery.ui.touch-punch.min.js"></script>

            <!-- Bootstrap 3.3.2 JS -->
            <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <!-- AdminLTE App -->
            <script src="dist/js/app.min.js" type="text/javascript"></script>

            <!-- DATATABLES -->
            <script src="plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="plugins/datatables/media/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
            <script src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
            <script src="plugins/datatables/extensions/Responsive/js/responsive.bootstrap.js" type="text/javascript"></script>
            <!-- DATATABLES -->

            <!--isotope-->
            <script src="plugins/isotope.pkgd.min.js" type="text/javascript"></script>
            <script src="plugins/imagesloaded.pkgd.min.js" type="text/javascript"></script>
            <!--isotope-->
            <script src="plugins/isotope.pkgd.min.js" type="text/javascript"></script>
            <script src="plugins/chartJs/Chart.min.js" type="text/javascript"></script>
            <script src="plugins/chartJs/Chart.Bar.js" type="text/javascript"></script>
            <script src="dist/js/ando_admin.js" type="text/javascript"></script>
            <script src="dist/js/mosaicflow.min.js" type="text/javascript"></script>
            <script src="plugins/file-uploader/js/vendor/jquery.ui.widget.js"></script>
            <script src="plugins/file-uploader/js/jquery.fileupload.js"></script>
            <script src="plugins/datepicker/bootstrap-datepicker.min.js"></script>
            <script src="plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
            <script src="plugins/ckeditor/adapters/jquery.js" type="text/javascript"></script>
            <script>
                $(function() {
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#example3').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                });
            </script>
        </body>

        </html>


<?php
    }
}
?>