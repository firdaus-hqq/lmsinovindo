<?php
// error_reporting(0);
$_SESSION['KCFINDER'] = array();
$_SESSION['KCFINDER']['disabled'] = false;
$_SESSION['KCFINDER']['uploadURL'] = "images";
$_SESSION['KCFINDER']['uploadDir'] = "";
include "../../config/config.php";
include "timeout.php";
include "../configurasi/pagination.php";

$sql = "SELECT * FROM kelas";
$dataSekolah = $mysqli->query($sql) or die($mysqli->error);

if ($_SESSION['login'] == 1) {
    if (!cek_login()) {
        $_SESSION['login'] = 0;
    }
}
if ($_SESSION['login'] == 0) {
    header('location:logout.php');
} else {
    if (empty($_SESSION['username']) and empty($_SESSION['passuser']) and empty($_SESSION['leveluser']) and $_SESSION['login'] == 0) {

        echo "<div class='error msg'>Untuk mengakses Modul anda harus login.</div>";
    } else {
        if ($_SESSION['leveluser'] == 'siswa') {
            echo "<div class='error msg'>Anda tidak diperkenankan mengakses halaman ini.</div>";
        } else {
?>
            <!DOCTYPE html>
            <html>
            <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="ThemeBucket">
            <title><?php if ($_SESSION['leveluser'] == 'admin') {
                        echo "Halaman Admin ";
                    } else {
                        echo "Halaman Guru ";
                    } ?></title>
            <!-- Bootstrap 3.3.4 -->
            <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <!-- Font Awesome Icons -->
            <link href="../plugins/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
            <link href="../plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
            <!-- Theme style -->
            <link href="../dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
            <!-- DATATABLES -->
            <link href="../plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

            <link href="../plugins/datatables/extensions/Responsive/css/responsive.dataTables.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="../plugins/datatables/extensions/buttons/css/buttons.dataTables.css">
            <link rel="stylesheet" href="../plugins/datatables/extensions/buttons/css/buttons.bootstrap.css">
            <!-- DATATABLES -->
            <?php
            if ($_SESSION['leveluser'] == 'admin') {
                echo "<link href='../dist/css/skins/skin-yellow.min.css' rel='stylesheet' type='text/css' />";
            } else {
                echo "<link href='../dist/css/skins/skin-blue.min.css' rel='stylesheet' type='text/css' />";
            }
            ?>
            <link href="../dist/css/ando_admin.css" rel="stylesheet" type="text/css" />
            <link href='../plugins/jquery-ui-1.11.4/jquery-ui.min.css' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="../plugins/file-uploader/css/jquery.fileupload.css">
            <link rel="stylesheet" href="../plugins/file-uploader/css/jquery.fileupload-ui.css">
            <noscript>
                <link rel="stylesheet" href="../plugins/file-uploader/css/jquery.fileupload-noscript.css">
            </noscript>
            <noscript>
                <link rel="stylesheet" href="../plugins/file-uploader/css/jquery.fileupload-ui-noscript.css">
            </noscript>
            <link href="../plugins/datepicker/datepicker.css" rel="stylesheet">
            <script type="text/javascript">
                //<![CDATA[
                CKEDITOR.replace('post', {
                    fullPage: true,
                    extraPlugins: 'docprops',

                    filebrowserBrowseUrl: '../plugins/ckeditor/kcfinder/browse.php',
                    height: "500",
                    width: "900",
                });

                //]]>
            </script>
            </head>
            <?php
            if ($_SESSION['leveluser'] == 'admin') {
                echo " <body class='skin-yellow fixed sidebar-mini'>";
            } else {
                echo " <body class='skin-blue fixed sidebar-mini'>";
            }

            ?>
            <div class="wrapper">
                <!-- Main Header -->
                <header class="main-header">
                    <!-- Logo -->
                    <a href="index2.html" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"><b>I</b>DM</span>
                        <!-- logo for regular state and mobile devices -->
                        <span style="font-size: medium;" class="logo-lg"><b><?php if ($_SESSION['leveluser'] == 'admin') {
                                                                                echo "IDM | ";
                                                                            } else {
                                                                                echo "Guru";
                                                                            } ?></b><span style="letter-spacing: 1px;"><b>A C A D E M Y</b></span></span>
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
                                <li class="dropdown user user-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <!-- The user image in the navbar-->
                                        <?php if ($_SESSION['leveluser'] == 'admin') {
                                            echo " <img src='images/default.jpg' class='user-image' alt='User Image'>";
                                        } else {
                                            echo "<img src='../foto_pengajar/medium_$_SESSION[foto]' class='user-image' alt='User Image'>";
                                        }
                                        ?>
                                        <span class="hidden-xs"><?php echo "$_SESSION[namalengkap]"; ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- The user image in the menu -->
                                        <li class="user-header">
                                            <?php if ($_SESSION['leveluser'] == 'admin') {
                                                echo "  <img src='images/default.jpg' class='img-circle' alt='User Image'> ";
                                            } else {
                                                echo "<img src='../foto_pengajar/medium_$_SESSION[foto]' class='img-circle' alt='User Image'>";
                                            }
                                            ?>

                                            <p>
                                                <?php echo "$_SESSION[namalengkap]"; ?>
                                                <small><?php echo "$_SESSION[leveluser]"; ?></small>
                                            </p>
                                        </li>
                                        <li class="user-footer">
                                            <div class="pull-right">
                                                <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
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
                                <?php if ($_SESSION['leveluser'] == 'admin') {
                                    echo "  <img src='images/default.png' class='img-circle' alt='User Image'> ";
                                } else {
                                    echo "<img src='../foto_pengajar/$_SESSION[foto]' class='img-circle' alt='User Image'>";
                                }
                                ?>
                            </div>
                            <div class="pull-left info">
                                <p><?php echo "$_SESSION[namalengkap]"; ?></p>
                                <!-- Status -->
                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                        </div>

                        <!-- search form (Optional) -->

                        <!-- /.search form -->

                        <!-- Sidebar Menu -->
                        <ul class="sidebar-menu">
                            <?php
                            if ($_SESSION['leveluser'] == 'admin') {
                                echo "   <li class='header'>Menu Utama</li>
  <li><a href='media_admin.php?module=home'><i class='fa fa-dashboard'></i> <span>Dashboard</span></a> </li>
  <li class='treeview'>
                <a href='#'>
                    <i class='fa fa-folder'></i>
                    <span>Data</span><i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class='treeview-menu'>";
                                $sql = mysqli_query($GLOBALS["___mysqli_ston"], "select * from modul where aktif='Y' order by urutan");
                                while ($m = mysqli_fetch_array($sql)) {
                                    echo " 
                <li><a href='media_admin.php$m[link]'><i class='fa fa-circle-o'></i><span class='title'>$m[nama_modul]</span></a></li> 
               ";
                                }
                                echo "<li><a href='media_admin.php?module=admin&act=pengajar'><i class='fa fa-circle-o'></i><span class='title'>Manajemen Pengajar</span></a></li> 
  <li><a href='media_admin.php?module=admin'><i class='fa fa-circle-o'></i><span class='title'>Manajeman Administrator</span></a></li> 
   <li><a href='media_admin.php?module=modul'><i class='fa fa-circle-o'></i><span class='title'>Manajemen Modul</span></a></li> 


   </ul>
  </li>";
                                echo "<li class='header'>Content Web</li>
   <li><a href='media_admin.php?module=setting'><i class='fa fa-toggle-on'></i><span>Setting Web</span></a></li>
   <li class='treeview active'>
                <a href='#'>
                    <i class='fa fa-book'></i>
                    <span>Ujian</span><i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class='treeview-menu'>          
  <li class='active'><a href='v_bank_soal.php'><i class='fa fa-circle-o'></i>Bank Soal</a></li>   
  <li><a href='v_test.php'><i class='fa fa-circle-o'></i>Hasil Ujian</a></li>                  
                </ul>
            <li class='treeview'>
                <a href='#'>
                    <i class='fa fa-trophy'></i>
                    <span>Prestasi</span><i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class='treeview-menu'>          
  <li><a href='v_typing_test.php'><i class='fa fa-circle-o'></i>Typing Test</a></li>   
  <li><a href='v_test.php'><i class='fa fa-circle-o'></i>Pre Test & Post Test</a></li>                  
                </ul>
            </li>
            <li><a href='v_daftar_absen.php'><i class='fa fa-check'></i><span>Absensi</span></a></li>";
                            } elseif ($_SESSION['leveluser'] == 'pengajar') {
                                echo " <li class='header'>Menu Utama</li>
  <li class='active'><a href='media_admin.php?module=home'><i class='fa fa-dashboard'></i> <span>Dashboard</span></a> </li>
  <li class='treeview'>
                <a href='#' class='active'>
                    <i class='fa fa-bullhorn'></i>
                    <span>Menu Utama</span><i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class='treeview-menu'>";
                                $sql = mysqli_query($GLOBALS["___mysqli_ston"], "select * from modul where status='pengajar' and aktif='Y' order by urutan");
                                while ($m = mysqli_fetch_array($sql)) {
                                    echo "<li><a href='$m[link]'><i class='fa fa-circle-o'></i><span class='title'>$m[nama_modul]</span></a></li>";
                                }
                                echo " </ul>
            </li>";
                            }
                            ?>
                        </ul><!-- /.sidebar-menu -->
                    </section>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            Bank Soal
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-calendar"></i><?php include "../jam/jam.php" ?></a></li>
                            <li class="active"><?php include "../jam/tanggal.php" ?></li>
                        </ol>
                    </section>
                    <?php
                    if (!empty($_GET['gagal'])) {
                        echo "
                        <div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='icon fa fa-close'></i> Gagal !!! silahkan login sebagai admin / editor.
                        </div>
                        ";
                    }
                    ?>
                    <?php
                    if (!empty($_GET['kosong'])) {
                        echo "
                        <div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='icon fa fa-close'></i> Gagal !!! bobot nilai belum terisi.
                        </div>
                        ";
                    }
                    ?>
                    <!-- Main content -->
                    <section class="content">
                        <div class='box box-warning'>
                            <div class='box-header with-border'>
                                <div class="modal-body">
                                    <form action="soal_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label>Jenis Ujian</label>
                                            <br>
                                            <form action="" method="post">
                                                <select class="form-control" name="jenissoal" required>
                                                    <option value="">Pilih Jenis Ujian</option>
                                                    <option value="Pre-Test">Pre Test</option>
                                                    <option value="Post-Test">Post Test</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas/Asal Sekolah</label>
                                            <br>
                                            <form action="" method="post">
                                                <select class="form-control" name="kelas" required>
                                                    <option value="">Pilih Kelas/Asal Sekolah</option>
                                                    <?php while ($sekolah = @$dataSekolah->fetch_array()) { ?>
                                                        <option value="<?php echo $sekolah['nama'] ?>">
                                                            <?php echo $sekolah['nama'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Soal</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-book"></i>
                                                </div>
                                                <input name="kodesoal" type="text" class="form-control" placeholder="kode soal" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Opsi jawaban</label>
                                            <br>
                                            <form action="" method="post">
                                                <select class="form-control" name="opsi" required>
                                                    <option value="">Pilih</option>
                                                    <option value="hidden">4 Opsi jawaban</option>
                                                    <option value="show">5 Opsi jawaban</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tampilan Soal</label>
                                            <br>
                                            <form action="" method="post">
                                                <select class="form-control" name="acak" required>
                                                    <option value="">Pilih</option>
                                                    <option value="1">Acak</option>
                                                    <option value="2">Urut</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Waktu Ujian</label>
                                            <div class="input-group col-xs-2">
                                                <input name="waktu" type="number" class="form-control" required> Menit</input>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success" type="submit">
                                                Add
                                            </button>
                                            <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
                                                Cancel
                                            </button>
                                        </div>
                                        <h4>
                                            <font color="#FF0000">Keterangan: *</font>
                                        </h4>
                                        <ul>
                                            <li>JANGAN ada SPASI, BISA gunakan tanda sambung (-)</li>
                                            <li>Hindari Kode Soal yang Terlalu Panjang </li>
                                            <li>Contoh nama yang baik: BING-11IPA-UAS1</li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section><!-- /.content -->
                </div><!-- /.content-wrapper -->

                <!-- Main Footer -->
                <footer class="main-footer">
                    <!-- To the right -->
                    <div class="pull-right hidden-xs">
                        Versi 0.0.1
                    </div>
                    <!-- Default to the left -->
                    <strong>Copyright &copy; <?php echo (int)date('Y'); ?> <a href="#">INOVINDO DIGITAL MEDIA</a></strong>
                </footer>

                <div class="control-sidebar-bg"></div>
            </div><!-- ./wrapper -->
            <script src="../plugins/jQuery/jquery-1.12.0.min.js"></script>

            <script src="../plugins/jQuery/pdfmake.min.js"></script>
            <script src="../plugins/jQuery/vfs_fonts.js"></script>
            <script src="../plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script>
            <script src="../plugins/jquery.ui.touch-punch.min.js"></script>
            <!-- Bootstrap 3.3.2 JS -->


            <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>

            <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <!-- AdminLTE App -->
            <script src="../dist/js/app.min.js" type="text/javascript"></script>

            <!-- DATATABLES -->
            <script src="../plugins/input-mask/jquery.inputmask.js"></script>
            <script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
            <script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
            <script src="../plugins/select2/select2.full.min.js"></script>
            <script src="../plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="../plugins/datatables/media/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
            <script src="../plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
            <script src="../plugins/datatables/extensions/Responsive/js/responsive.bootstrap.js" type="text/javascript"></script>
            <script src='../plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js'></script>
            <script src='../plugins/datatables/extensions/buttons/js/dataTables.buttons.min.js'></script>
            <script src='../plugins/datatables/extensions/buttons/js/buttons.html5.min.js'></script>
            <script src='../plugins/datatables/extensions/buttons/js/buttons.print.min.js'></script>
            <script src='../plugins/datatables/extensions/buttons/js/buttons.flash.min.js'></script>
            <!-- DATATABLES -->
            <!--isotope-->
            <script src="../plugins/isotope.pkgd.min.js" type="text/javascript"></script>
            <script src="../plugins/imagesloaded.pkgd.min.js" type="text/javascript"></script>
            <!--isotope-->
            <script src="../plugins/isotope.pkgd.min.js" type="text/javascript"></script>
            <script src="../dist/js/ando_admin.js" type="text/javascript"></script>
            <script src="../dist/js/mosaicflow.min.js" type="text/javascript"></script>
            <script src="../plugins/file-uploader/js/vendor/jquery.ui.widget.js"></script>
            <script src="../plugins/file-uploader/js/jquery.fileupload.js"></script>
            <script src="../plugins/datepicker/bootstrap-datepicker.min.js"></script>
            <script src="../plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
            <script src="../plugins/ckeditor/adapters/jquery.js" type="text/javascript"></script>
            <script>
                $('.date-picker').datepicker({
                    autoclose: true,
                    todayHighlight: true
                })
                $('.input-daterange').datepicker({
                    autoclose: true
                });
            </script>
            <script>
                $(function() {
                    $("#example1").DataTable({

                    });
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        "tableTools": {
                            "sExtends": "pdf",
                            "SPdfOrientation": "landscape",
                        }
                    });
                });
            </script>
            <script>
                $(function() {
                    //Initialize Select2 Elements
                    $(".select2").select2();
                    //Money Euro
                    $("[data-mask]").inputmask();


                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#example3').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'pdf', 'print'
                        ]
                    });
                });
            </script>
            <?php
            include "soal_script.php";
            ?>
            </body>

            </html>
<?php
        }
    }
}
?>