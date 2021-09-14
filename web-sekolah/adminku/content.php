<?php
// Bagian Home
$sql = "SELECT * FROM pemberitahuan ORDER BY tanggal DESC LIMIT 5";
$result = $mysqli->query($sql);

if ($_GET['module'] == 'home') {
  if ($_SESSION['leveluser'] == 'siswa') {
?>
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-bookmark"></i>Selamat Datang Peserta Prakerin Inovindo | A C A D E M Y</h4>
      <p>Klik disini untuk menuju <a href="media.php?module=siswa&act=detailprofilsiswa&id=<?= $_SESSION['idsiswa'] ?>"><b>My Profile</b></a> untuk mengatur profilmu</p>



    </div>
    <div class="row">
      <div class="col-lg-3 col-xs-6">


        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <?php
            $tam = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id_file) AS JUMLAH FROM file_materi");
            $r = mysqli_fetch_array($tam);
            $tot = $r['JUMLAH']; { ?>
              <h3><?php echo $tot; ?></h3>
              <p>Tentang Perusahaan</p>

            <?php
            } ?>
          </div>
          <div class="icon">
            <i class="ion ion-ios-book"></i>
          </div>
          <a href="media.php?module=materi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">


        <!-- small box -->
        <div class="small-box bg-orange">
          <div class="inner">

            <h3> Absensi </h3>
            <p>Absen harian siswa</p>


          </div>
          <div class="icon">
            <i class="ion ion-ios-checkmark"></i>
          </div>
          <a href="v_absen.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">


        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">

            <h3>Tugas</h3>
            <p>Page pengumpulan tugas</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-list"></i>
          </div>
          <a href="tugas.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">


        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <?php
            $tam = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id_peringkat) AS JUMLAH FROM peringkat");
            $r = mysqli_fetch_array($tam);
            $tot = $r['JUMLAH']; { ?>
              <h3><?php echo $tot; ?></h3>
              <p>Peringkat</p>

            <?php
            } ?>
          </div>
          <div class="icon">
            <i class="ion ion-trophy"></i>
          </div>
          <a href="v_peringkat_typing.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-md-6">

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">PEMBERITAHUAN</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div style="display: block;" class="box-body">
            <?php
            while ($toa = mysqli_fetch_array($result)) {
            ?>
              <ul>
                <p><?= $toa['isi'] ?></p>
              </ul>
            <?php } ?>
          </div><!-- /.box-body -->

        </div><!-- /.box -->
      </div>
      <!-- ./col -->
      <div class="col-md-6">

        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Tujuan E-Learning</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div style="display: block;" class="box-body">
            <ul>
              <p>E-Learning adalah suatu cara untuk mengatasi solusi
                Ketika para siswa sedang prakerin,dan di kondisi lain.</p>
            </ul>
            <ul>
              <p>Dapat memperoleh informasi secara tepat dan cepat..</p>
            </ul>
            <ul>
              <p>Meminalisir waktu dan efisiensi dalam pengajaran</b>
            </ul>

          </div><!-- /.box-body -->

        </div><!-- /.box -->
      </div>

    </div>

<?php
  }
}
// Bagian kelas
elseif ($_GET['module'] == 'kelas') {
  if ($_SESSION['leveluser'] == 'siswa') {
    include "administrator/modul/mod_kelas/kelas.php";
  }
}
// Bagian siswa
elseif ($_GET['module'] == 'siswa') {
  if ($_SESSION['leveluser'] == 'siswa') {
    include "administrator/modul/mod_siswa/siswa.php";
  }
}
// Bagian admin
elseif ($_GET['module'] == 'admin') {
  if ($_SESSION['leveluser'] == 'siswa') {
    include "administrator/modul/mod_admin/admin.php";
  }
}
// Bagian mapel
elseif ($_GET['module'] == 'matapelajaran') {
  if ($_SESSION['leveluser'] == 'siswa') {
    include "administrator/modul/mod_matapelajaran/matapelajaran.php";
  }
}
// Bagian materi
elseif ($_GET['module'] == 'materi') {
  if ($_SESSION['leveluser'] == 'siswa') {
    include "administrator/modul/mod_materi/materi.php";
  }
}
// Bagian materi
elseif ($_GET['module'] == 'quiz') {
  if ($_SESSION['leveluser'] == 'siswa') {
    include "administrator/modul/mod_quiz/quiz.php";
  }
}
// Bagian materi
elseif ($_GET['module'] == 'kerjakan_quiz') {
  if ($_SESSION['leveluser'] == 'siswa') {
    include "administrator/modul/mod_quiz/soal.php";
  }
}
// Bagian materi
elseif ($_GET['module'] == 'nilai') {
  if ($_SESSION['leveluser'] == 'siswa') {
    include "daftarnilai.php";
  }
}
?>