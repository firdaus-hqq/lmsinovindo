<?php
$_SESSION['KCFINDER'] = array();
$_SESSION['KCFINDER']['disabled'] = false;
$_SESSION['KCFINDER']['uploadURL'] = "images";
$_SESSION['KCFINDER']['uploadDir'] = "";
// error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}

include "timeout.php";
include "../configurasi/pagination.php";
include "../../config/config.php";

$id_pemberitahuan = $_GET['id_pemberitahuan'];
$sql = "SELECT * FROM pemberitahuan";
$result = $mysqli->query($sql);
$nama = $_SESSION['namalengkap'];

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
                    <a href="https://inovindoacademy.com" class="logo">
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
                            <?php include "menu_baru.php" ?>
                        </ul><!-- /.sidebar-menu -->
                    </section>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            Pemberitahuan
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-calendar"></i><?php include "../jam/jam.php" ?></a></li>
                            <li class="active"><?php include "../jam/tanggal.php" ?></li>
                        </ol>
                    </section>

                    <!-- Main content -->
                    <section class="content">
                        <div class="box box-warning">
                            <div class='box-header with-border'>
                                <h3>Edit Pengumuman</h3>
                                <form action="edit_pemberitahuan.php?id_pemberitahuan=<?= $toa['id_pemberitahuan']?>" method="post">
                                    <input type="hidden" value="<?= $nama ?>" name="pembuat">
                                    <div class="form-group">
                                        <input type="text" name="isi" class="form-control" value="<?= @$toa['isi'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" value="Simpan" class="btn btn-success">Umumkan!</button>
                                    </div>
                                </form>
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

            </body>

            </html>
<?php
        }
    }
}
?>