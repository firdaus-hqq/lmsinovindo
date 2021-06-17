<?php
include "../configurasi/koneksi.php";
include "../configurasi/library.php";
include "../configurasi/fungsi_indotgl.php";
include "../configurasi/fungsi_combobox.php";
$aksi_kelas = "modul/mod_kelas/aksi_kelas.php";
$aksi_mapel = "modul/mod_matapelajaran/aksi_matapelajaran.php";
// Bagian Home
if ($_GET['module'] == 'home') {
  if ($_SESSION['leveluser'] == 'admin') {
?>
    <section class="content">

      <div class="row">
        <div class="col-lg-3 col-xs-6">


          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
              $tam = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id_berita) AS JUMLAH FROM berita");
              $r = mysqli_fetch_array($tam);
              $tot = $r['JUMLAH']; { ?>
                <h3><?php echo $tot; ?></h3>
                <p>Peserta</p>

              <?php
              } ?>
            </div>
            <div class="icon">
              <i class="ion ion-edit"></i>
            </div>
            <a href="?module=berita" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">

              <?php
              $tam = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id_modul) AS JUMLAH FROM modul");
              $r = mysqli_fetch_array($tam);
              $tot = $r['JUMLAH']; { ?>
                <h3><?php echo $tot; ?></h3>
                <p>Jurusan</p>

              <?php
              } ?>

            </div>
            <div class="icon">
              <i class="ion ion-ios-browsers"></i>
            </div>
            <a href="?module=modul" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
              $tam = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id_galerifoto) AS JUMLAH FROM galeri_foto");
              $r = mysqli_fetch_array($tam);
              $tot = $r['JUMLAH']; { ?>
                <h3><?php echo $tot; ?></h3>
                <p>Asal Sekolah</p>

              <?php
              } ?>
            </div>
            <div class="icon">
              <i class="ion ion-images"></i>
            </div>
            <a href="?module=galeri" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
              $tam = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id_statistik) AS JUMLAH FROM statistik");
              $r = mysqli_fetch_array($tam);
              $tot = $r['JUMLAH']; { ?>
                <h3><?php echo $tot; ?></h3>
                <p>Kelas</p>

              <?php
              } ?>
            </div>
            <div class="icon">
              <i class="ion ion-android-contact"></i>
            </div>
            <a href="?module=statistik" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </section>
  <?php
  } elseif ($_SESSION['leveluser'] == 'pengajar') {
  ?>
    <section class="content">
      <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        Warning alert preview. This alert is dismissable.
      </div>

      <div class="row">
        <div class="col-lg-3 col-xs-6">


          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
              $tam = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id_kelas) AS JUMLAH FROM kelas WHERE id_pengajar = '$_SESSION[idpengajar]'");
              $r = mysqli_fetch_array($tam);
              $tot = $r['JUMLAH']; { ?>
                <h3><?php echo $tot; ?></h3>
                <p>Kelas Yang Anda Ampu</p>

              <?php
              } ?>
            </div>
            <div class="icon">
              <i class="ion ion-bookmark"></i>
            </div>
            <a href="?module=kelas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">


          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
              $tam = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id) AS JUMLAH FROM mata_pelajaran WHERE id_pengajar = '$_SESSION[idpengajar]'");
              $r = mysqli_fetch_array($tam);
              $tot = $r['JUMLAH']; { ?>
                <h3><?php echo $tot; ?></h3>
                <p>Mata Pelajaran</p>

              <?php
              } ?>
            </div>
            <div class="icon">
              <i class="ion ion-happy"></i>
            </div>
            <a href="?module=matapelajaran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
              $tam = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id_file) AS JUMLAH FROM file_materi WHERE pembuat = '$_SESSION[idpengajar]'");
              $r = mysqli_fetch_array($tam);
              $tot = $r['JUMLAH']; { ?>
                <h3><?php echo $tot; ?></h3>
                <p>Materi</p>

              <?php
              } ?>
            </div>
            <div class="icon">
              <i class="ion ion-camera"></i>
            </div>
            <a href="?module=materi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <?php
              $tam = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id_tq) AS JUMLAH FROM  topik_quiz WHERE pembuat = '$_SESSION[idpengajar]'");
              $r = mysqli_fetch_array($tam);
              $tot = $r['JUMLAH']; { ?>
                <h3><?php echo $tot; ?></h3>
                <p>Topik Quiz</p>

              <?php
              } ?>
            </div>
            <div class="icon">
              <i class="ion ion-coffee"></i>
            </div>
            <a href="?module=quiz" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <!-- ./col -->
      </div>
    </section>

    <?php
    $detail_pengajar = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pengajar WHERE id_pengajar='$_SESSION[idpengajar]'");
    $r = mysqli_fetch_array($detail_pengajar);
    $tgl_lahir   = tgl_indo($r['tgl_lahir']);
    echo
    " <div class='box-header with-border'>
         
           <div class='col-md-3'>
              <div class='box box-info'>
                <div class='box-body box-profile'>
                  <img class='profile-user-img img-responsive img-responsive' src='../foto_pengajar/medium_$r[foto]' alt='User profile picture'>
                  <h3 class='profile-username text-center'>$r[nama_lengkap]</h3>
                  <p class='text-muted text-center'>$r[jabatan]</p>

                  <ul class='list-group list-group-unbordered'>
                    <li class='list-group-item'>
                      <b>Tempat Lahir</b> <a class='pull-right'>$r[tempat_lahir]</a>
                    </li>
                    <li class='list-group-item'>
                      <b>Tgl. Lahir</b> <a class='pull-right'>$tgl_lahir</a>
                    </li>
                    <li class='list-group-item'>
                      <b>Agama</b> <a class='pull-right'>$r[agama]</a>
                    </li>
                     <li class='list-group-item'>
                      <b>Email</b> <a href='mailto:$r[email]' class='pull-right'>$r[email]</a>
                    </li>
                     <li class='list-group-item'>
                      <b>Website</b> <a href='http://$r[website]' target='_blank' class='pull-right'>$r[website]</a>
                    </li>
                  </ul>

                  <a href='#' class='btn btn-primary btn-block'><b>Follow</b></a>
                </div>
              </div>
            </div>"; ?>
    <div class="col-md-9">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Detail</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">NIP</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" value=<?php echo $r['nip'] ?> readonly=''>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" value=<?php echo $r['username_login'] ?> readonly=''>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">No Telp</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" value=<?php echo $r['no_telp'] ?> readonly=''>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Password" value=<?php if ($r['jenis_kelamin'] == 'P') {
                                                                                                            echo " Perempuan";
                                                                                                          } else {
                                                                                                            echo "Laki-laki";
                                                                                                          } ?> readonly=''>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Blokir</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" value=<?php if ($r['blokir'] == 'N') {
                                                                                                      echo "Tidak";
                                                                                                    } else {
                                                                                                      echo "Ya";
                                                                                                    } ?> readonly=''>
              </div>
            </div>

          </div><!-- /.box-body -->

        </form>
      </div>
      <div class='box box-info'>
        <div class='box-header with-border'>
          <h3 class='box-title'>Alamat</h3>
        </div>
        <div class='box-body'>
          <p> <strong><i class='fa fa-map-marker margin-r-5'></i></strong>&nbsp;<?php echo $r['alamat'] ?></p>
        </div>
      </div>
      <div class='box box-info'>
        <div class='box-header with-border'>
          <h3 class='box-title'>Edit Profil</h3>
        </div>
        <div class='box-body'>
          <?php echo "
                 <p><input class='btn btn-info' type=button value='Edit Profil' onclick=\"window.location.href='?module=admin&act=editpengajar';\"></p>"; ?>
        </div>
      </div>
    </div>


<?php echo "

          
      </div>




  ";
    //kelas yang diampu

  }
}
// Bagian Modul
elseif ($_GET['module'] == 'modul') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_modul/modul.php";
  }
} elseif ($_GET['module'] == 'setting') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_setting/setting.php";
  }
} elseif ($_GET['module'] == 'kategoriberita') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_kategoriberita/kategori.php";
  }
} elseif ($_GET['module'] == 'berita') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_berita/post.php";
  }
} elseif ($_GET['module'] == 'tentang') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_tentang/tentang.php";
  }
} elseif ($_GET['module'] == 'statistik') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_statistik/statistik.php";
  }
} elseif ($_GET['module'] == 'komentar') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_komentar/komentar.php";
  }
} elseif ($_GET['module'] == 'kategoriprestasi') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_kategoriprestasi/kategoriprestasi.php";
  }
} elseif ($_GET['module'] == 'prestasi') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_prestasi/prestasi.php";
  }
} elseif ($_GET['module'] == 'galeri') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_galeri/galeri.php";
  }
}
// Bagian user admin
elseif ($_GET['module'] == 'admin') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_admin/admin.php";
  } else {
    include "modul/mod_admin/admin.php";
  }
}
// Bagian user admin
elseif ($_GET['module'] == 'detailpengajar') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_admin/admin.php";
  } else {
    include "modul/mod_admin/admin.php";
  }
}
// Bagian kelas
elseif ($_GET['module'] == 'kelas') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_kelas/kelas.php";
  } elseif ($_SESSION['leveluser'] == 'pengajar') {
    include "modul/mod_kelas/kelas.php";
  } elseif ($_SESSION['leveluser'] == 'siswa') {
    include "modul/mod_kelas/kelas.php";
  }
}

// Bagian siswa
elseif ($_GET['module'] == 'siswa') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_siswa/siswa.php";
  } else {
    include "modul/mod_siswa/siswa.php";
  }
}
// Bagian siswa
elseif ($_GET['module'] == 'daftarsiswa') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_siswa/siswa.php";
  } else {
    include "modul/mod_siswa/siswa.php";
  }
}

// Bagian siswa
elseif ($_GET['module'] == 'detailsiswa') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_siswa/siswa.php";
  } else {
    include "modul/mod_siswa/siswa.php";
  }
}
// Bagian siswa
elseif ($_GET['module'] == 'detailsiswapengajar') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_siswa/siswa.php";
  } else {
    include "modul/mod_siswa/siswa.php";
  }
}
// Bagian mata pelajaran
elseif ($_GET['module'] == 'matapelajaran') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_matapelajaran/matapelajaran.php";
  } else {
    include "modul/mod_matapelajaran/matapelajaran.php";
  }
}
// Bagian materi
elseif ($_GET['module'] == 'materi') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_materi/materi.php";
  } else {
    include "modul/mod_materi/materi.php";
  }
}
// Bagian topik soal
elseif ($_GET['module'] == 'quiz') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_quiz/quiz.php";
  } else {
    include "modul/mod_quiz/quiz.php";
  }
}
// Bagian topik soal
elseif ($_GET['module'] == 'buatquiz') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_quiz/quiz.php";
  } else {
    include "modul/mod_quiz/quiz.php";
  }
}
// Bagian topik soal
elseif ($_GET['module'] == 'buatquizesay') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_quiz/quiz.php";
  } else {
    include "modul/mod_quiz/quiz.php";
  }
}

// Bagian topik soal
elseif ($_GET['module'] == 'buatquizpilganda') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_quiz/quiz.php";
  } else {
    include "modul/mod_quiz/quiz.php";
  }
}
// Bagian topik soal
elseif ($_GET['module'] == 'daftarquiz') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_quiz/quiz.php";
  } else {
    include "modul/mod_quiz/quiz.php";
  }
}
// Bagian topik soal
elseif ($_GET['module'] == 'daftarquizesay') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_quiz/quiz.php";
  } else {
    include "modul/mod_quiz/quiz.php";
  }
}
// Bagian topik soal
elseif ($_GET['module'] == 'daftarquizpilganda') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_quiz/quiz.php";
  } else {
    include "modul/mod_quiz/quiz.php";
  }
}
// Bagian Templates
elseif ($_GET['module'] == 'registrasi') {
  if ($_SESSION['leveluser'] == 'admin') {
    include "modul/mod_registrasi/registrasi.php";
  }
}
?>