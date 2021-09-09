<?php
                include "../configurasi/koneksi.php";
                if ($_SESSION['leveluser'] == 'admin') {
                    echo "   <li class='header'>Menu Utama</li>
  <li class='active'><a href='media_admin.php?module=home'><i class='fa fa-dashboard'></i> <span>Dashboard</span></a> </li>
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
                    echo "<li><a href='v_daftar_absen.php'><i class='fa fa-check'></i><span>Absensi</span></a></li>
                    <li><a href='v_pemberitahuan.php'><i class='fa fa-bullhorn'></i><span>Pemberitahuan</span></a></li>
   <li><a href='tabel_admin.php'><i class='fa fa-book'></i><span>Tugas</span></a></li>
   <li><a href='../../../CBT_E-school/on-admin/siswa.php'><i class='fa fa-laptop'></i><span>Ujian</span></a></li>
            <li class='treeview'>
                <a href='#'>
                    <i class='fa fa-trophy'></i>
                    <span>Prestasi</span><i class='fa fa-angle-left pull-right'></i>
                </a>
                <ul class='treeview-menu'>          
  <li><a href='v_typing_test.php'><i class='fa fa-circle-o'></i>Typing Test</a></li>   
  <li><a href='v_test.php'><i class='fa fa-circle-o'></i>Pre Test & Post Test</a></li>                  
                </ul>
            </li>";
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


