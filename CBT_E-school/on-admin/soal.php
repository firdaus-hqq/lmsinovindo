<?php
session_start();
include('../koneksi/koneksi.php');
include('conn/cek.php');
include('conn/fungsi.php');

$sqlkelas = "SELECT * FROM kelas";
$dataKelas = $konek->query($sqlkelas) or die($konek->error);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>IDM | ACADEMY</title>
  <!-- Library CSS -->
  <link href="../js/sweetalert.css" rel="stylesheet" type="text/css" />
  <?php
  include "bundle/bundle_css.php";
  ?>
  <style>
    .alert-danger {
      border-radius: 0;
      font-size: 12px;
      position: fixed;
      right: 5px;
      bottom: 0px;
      z-index: 9999;
    }

    #cog {
      border-radius: 0;
      background-color: #222d32;
      color: white;
      border: 0;
    }

    #cogi {
      border-radius: 0;
      background-color: #ff8f0a;
      color: white;
      border: 0;
    }

    #cog:hover {
      border-radius: 0;
      background-color: #ff8f0a;
      color: white;
      border: 0;
    }

    #clot {
      border-radius: 0;
      margin: 0;
    }

    #cloti {
      border-radius: 0;
      width: 40px;
      padding: 0;
      margin: 0;
      border-right: none;
      border-bottom: none;
      border-left: none;
      border-color: #333232;
      -moz-box-shadow: inset 0 0 10px #000000;
      -webkit-box-shadow: inset 0 0 10px #000000;
      box-shadow: inset 0 0 10px #000000;
    }

    #clot3d {
      border-radius: 0;
      width: 40px;
      padding: 0;
      margin: 0;
      border: solid 1px;
      border-bottom: none;
      border-right: none;
      border-top: none;
      border-left: none;
      border-color: #333232;
      box-shadow: 0px 5px 15px grey;
    }

    #clot3d:hover {
      border-radius: 0;
      width: 40px;
      padding: 0;
      margin: 0;
      border: solid 1px;
      border-bottom: none;
      border-right: none;
      border-top: none;
      border-color: grey;
      -moz-box-shadow: inset 0 0 10px #000000;
      -webkit-box-shadow: inset 0 0 10px #000000;
    }

    #clot3d2 {
      border-radius: 0;
      width: 40px;
      padding: 0;
      margin: 0;
      border: solid 1px;
      border-bottom: none;
      border-right: none;
      border-top: none;
      border-left: none;
      border-color: #333232;
      box-shadow: 0px 5px 15px grey;
    }

    #clot3d2:hover {
      border-radius: 0;
      width: 40px;
      padding: 0;
      margin: 0;
      border: solid 1px;
      border-bottom: none;
      border-right: none;
      border-top: none;
      border-left: none;
      border-color: grey;
      -moz-box-shadow: inset 0 0 10px #000000;
      -webkit-box-shadow: inset 0 0 10px #000000;
      box-shadow: inset 0 0 10px #000000;
    }
  </style>
</head>
<?php
include "tema/tema.php";
?>
<div class="wrapper">
  <?php
  include 'navbar/content_header.php';
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <?php
      include "navbar/userpanel.php";
      ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <li class=""><a href="index.php"><i class="fa fa-tachometer"></i><span> Dashboard</span></a></li>

        <li class="active"><a href="soal.php"><i class="fa fa-book"></i><span>Bank Soal</span></a></li>

        <li><a href="hasiltest.php"><i class="fa fa-area-chart"></i><span> Hasil Test</span></a></li>
        <li><a href="monitor.php"><i class="fa fa-laptop"></i><span> Monitoring Ujian</span></a></li>
        <li><a href="theme.php"><i class="fa fa-gear"></i><span>Pengaturan</span></a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out"></i><span> Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Bank Soal</h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li><i class="fa fa-book"></i> Bank Soal</li>
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div><!-- /.box-header -->
            <div class="box-body">
              <button id="clot" type="button" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Bank Soal</button>
              <div id="printableArea">
                <br></br>
                <table id="data5" class="table table-hover table-striped">
                  <?php
                  include "page/dt_soal.php";
                  ?>
                </table>
                <h4>
                  <font color="#FF0000">Keterangan: *</font>
                </h4>
                <ul>
                  <li>Pastikan Soal dalam status <b>"Non Aktif"</b> jika ingin mengedit dan input butir soal</li>
                  <li>klik <b>tombol</b> status soal untuk mengaktifkan dan menonaktifkan soal </li>
                  <li>Tidak Bisa <b>menghapus</b> soal yang sedang Aktif </li>
                  <li>Tidak Bisa <b>INPUT dan Edit</b> soal yang sedang Aktif </li>
                </ul>
              </div>
    </section><!-- /.content -->
    <!-- Modal Popup Tambah Soal -->
    <div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Bank Soal</h4>
          </div>
          <div class="modal-body">
            <form action="page/soal_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Jenis Ujian</label>
                <br>
                <form action="" method="post">
                  <select class="form-control" name="jenissoal" required>
                    <option value="">Pilih Jenis Ujian</option>
                    <option value="Pretest">Pre Test</option>
                    <option value="Posttest">Post Test</option>
                    <option value="Posttest">Simulasi</option>
                  </select>
              </div>

              <div class="form-group">
                <label>Keahlian</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-book"></i>
                  </div>
                  <input name="kodemapel" type="text" class="form-control" placeholder="Keahlian" required />
                </div>
              </div>
              <div class="form-group">
                <label>Kelas</label>
                <br>
                <form action="" method="post">
                  <select class="form-control" name="kelas" required>
                    <option value="">Pilih kelas</option>
                    <?php
                    while ($sekolah = @$dataKelas->fetch_array()) {
                    ?>
                      <option value="<?= $sekolah['id_kelas'] ?>"><?= $sekolah['nama'] ?></option>
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
    </div>



    <!-- Modal Popup siswa Edit -->
    <div id="ModalEditDosen2" class="modal" tabindex="-1" role="dialog"></div>
    <div id="ModalEditDosen" class="modal" tabindex="-1" role="dialog"></div>
    <!-- Modal Popup untuk delete-->
    <div class="modal" id="modal_delete">
      <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center;">yakin menghapus soal ini ?</h4>
          </div>
          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
            <a href="#" class="btn btn-danger" id="delete_link"><i class="fa fa-remove"></i> Hapus </a>
            <button type="button" class="btn btn-success" data-dismiss="modal">Batal <i class="fa fa-check"></i></button>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /.content-wrapper -->
  <?php
  include  "navbar/content_footer.php";
  ?>
  <!-- Library Scripts -->
  <?php
  include "bundle/soal_script.php";
  ?>
  </body>

</html>