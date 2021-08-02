<?php
include "../config/config.php";
include "configurasi/koneksi.php";
include "configurasi/library.php";
include "configurasi/fungsi_indotgl.php";
include "configurasi/fungsi_combobox.php";
include "timeout.php";

date_default_timezone_set("Asia/Jakarta");
$DATE_FORMAT = "Y-m-d H:i:s";
$waktu = date($DATE_FORMAT);

$id_siswa      = $_SESSION['idsiswa'];
$sql         = "SELECT kehadiran 
                FROM data_absen 
                WHERE id_siswa = '" . $id_siswa . "'
                    AND DATE_FORMAT(waktu, '%Y-%m-%d') = '" . date('Y-m-d') . "'
                ";
$result = $mysqli->query($sql) or die($mysqli->error);
$total_absen_hari_ini = $result->num_rows;

function canSubmit($waktu) {
  $batas_waktu_menit = 10 * 60; # menunjukkan jam 10:00
  
  $waktu_time = strtotime($waktu);
  $waktu_menit = date('H', $waktu_time) * 60 + date('i', $waktu_time);
  
  return $waktu_menit > $batas_waktu_menit;
  
}

if (canSubmit($waktu)) {
  $button = "<button type='submit' name='simpan' class='btn btn-success' disabled>Simpan</button>";
} else {
  $button = "<button type='submit' name='simpan' class='btn btn-success'>Simpan</button>";
}

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

            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
              <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </form>
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
              <li class="header">Menu Lerning</li>

              <!-- Optionally, you can add icons to the links -->
              <li><a href="home"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-bars"></i>
                  <span>Menu Utama</span><i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="media.php?module=kelas">
                      <i class='fa fa-circle-o'></i><span class="title">Kelas Kamu</span>
                    </a>
                  </li>
                  <li>
                    <a href="media.php?module=matapelajaran">
                      <i class='fa fa-circle-o'></i> <span class="title">Mata Pelajaran</span>
                    </a>
                  </li>
                  <li>
                    <a href="media.php?module=materi">
                      <i class='fa fa-circle-o'></i> <span class="title">Materi</span>
                    </a>
                  </li>
                  <li>
                    <a href="media.php?module=quiz">
                      <i class='fa fa-circle-o'></i><span class="title">Ujian</span>
                    </a>

                  </li>
                  <li>
                    <a href="media.php?module=nilai">
                      <i class='fa fa-circle-o'></i><span class="title">Nilai</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="treeview active">
                <a href="#">
                  <i class="fa fa-check"></i>
                  <span>Absensi</span><i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class="treeview-menu">
                  <li class="active">
                    <a href="v_absen.php">
                      <i class='fa fa-circle-o'></i><span class="title">Mengisi Absensi</span>
                    </a>
                  </li>
                  <li>
                    <a href="v_data_absen.php">
                      <i class='fa fa-circle-o'></i><span class="title">Data Absensi</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li><a href="tugas.php"><i class="fa fa-book"></i> <span>Tugas</span></a></li>
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
              Absensi
              <small>Silakan isi absensi harian</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-calendar"></i><?php include "jam/jam.php" ?></a></li>
              <li class="active"><?php include "jam/tanggal.php" ?></li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <?php
            // JIKA BELUM ABSEN, MAKA TAMPILKAN FORM
            if (!$total_absen_hari_ini) {
            ?>

              <form method="POST" action="absen.php">
                <input type="radio" name="kehadiran" id="hadir" value="H" <?= @$data_absen['kehadiran'] == 'H' ? 'checked' : '' ?>>
                <label for="hadir">Hadir</label>
                <input type="radio" name="kehadiran" id="izin" value="I" <?= @$data_absen['kehadiran'] == 'I' ? 'checked' : '' ?>>
                <label for="izin">Izin</label>
                <input type="radio" name="kehadiran" id="sakit" value="S" <?= @$data_absen['kehadiran'] == 'S' ? 'checked' : '' ?>>
                <label for="sakit">Sakit</label>
                <br>
                <h3>Kegiatan hari ini:</h3>
                <textarea class="form-control" placeholder="Isi kegiatan anda disini" rows="10" name="kegiatan" value="<?= @$data_absen['kegiatan'] ?>"></textarea>
                <br>
                <?= $button; ?>
              </form>

            <?php } else { ?>

              <h3 align="center">ANDA SUDAH MENGISI ABSEN HARI INI</h3>

            <?php } ?>
          </section>
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