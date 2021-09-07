<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');
?>
<!DOCTYPE html>
<html>
<head>   
<script src="bundle/jquery-1.3.2.min.js"></script>
<script>
$(document).ready(function() {
$("#responsecontainer").load("response.php");
var refreshId = setInterval(function() {
$("#responsecontainer").load('response.php?randval='+ Math.random());
}, 1000);
});
</script>
    <meta charset="utf-8">
    <title>IDM | ACADEMY</title>
	<!-- Library CSS -->
	<link href="../js/sweetalert.css" rel="stylesheet" type="text/css"/>
	<script src="../aset/plugins/ckeditor/ckeditor.js"></script>
	<script>
	    CKEDITOR.env.isCompatible = true;
	</script>
	<?php
		include "bundle/index_css.php";
	?>
<style>
    .label {
	border-radius: 0px;
	border: 3px solid #ffaa00;
    border-bottom: none;
    border-right: none;
    border-left: none;
    background-color: #ffaa00;
	    }
	    #cog {
    border-radius:0; 
    background-color:#222d32;
    color:white;
    border:0;
    }
    #cog:hover {
    border-radius:0; 
    background-color:#ff8f0a;
    color:white;
    border:0;
    }
</style>
  </head>
<?php
include "tema/tema.php";
?>
    <div class="wrapper">
      <?php
        include "navbar/content_header.php";  
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
				<li><a href="index.php"><i class="fa fa-tachometer"></i><span> Dashboard</span></a></li>
				<li><a href="siswa.php"><i class="fa fa-graduation-cap"></i><span> Management Siswa</span></a></li>

				<li class="treeview">
                  <a href="#">
                    <i class="fa fa-book"></i>
                    <span> Management Ujian</span>
                      <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                  </a>
                  <ul class="treeview-menu">
                            <li><a href="soal.php"><i class="fa fa-book"></i> Bank Soal</a></li>
    						<li><a href="kartuujian.php"><i class="fa fa-print"></i><span> Kartu Peserta</span></a></li>
    						<li><a href="daftarhadir.php"><i class="fa fa-print"></i><span> Daftar Hadir</span></a></li>
    						<li><a href="beritaacara.php"><i class="fa fa-print"></i><span> Berita Acara</span></a></li>
    						<li><a href="up-gbrsoal.php"><i class="fa fa-upload"></i><span> Upload Gbr Soal</span></a></li>
                  </ul>
                </li>
                
			    <li><a href="hasiltest.php"><i class="fa fa-area-chart"></i><span> Hasil Test</span></a></li>

					<li><a href="monitor.php"><i class="fa fa-laptop"></i><span> Monitoring Ujian</span></a></li>						
					<li><a href="laporan.php"><i class="fa fa-upload"></i><span> Laporan</span></a></li>	
				</ul>
		</section>
        <!-- /.sidebar -->
		</aside>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
        <!-- Content Header (Page header) -->
					<section class="content-header">
					    <h1>Pengumuman <i class="fa fa-bullhorn"></i></h1>
								        <ol class="breadcrumb">
								        <li><a href="#"> Home</a></li>
									    <li><i class="fa fa-bullhorn"></i> Pengumuman </li>
                                    </ol>
							            
                                    <!-- card -->
                                    
                                    <div class="row">
                                    <div class="box-body">
                                       
                                    <!-- End of card -->
                						<div class="row">
                						    <div class="box-body">
                							<div class="col-xs-12">
                								<div class="box-header">
                									<button type="button" class="btn btn-default" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i></button>
                										<div class="table-responsive">
                											<table id="data" class="table">
                											<?php
                											include "page/dt_article.php";
                											?>
                											</table>
                										</div>
                								</div>
                						</div>
                					</div>
                			</div>
                			<h4><font color="#FF0000">&emsp; Keterangan: *</font></h4>
                                <ul>
								<li>Hanya menampilkan 4 pesan terbaru di menu siswa</li>
                                </ul>
					</section>
				</div><!-- ./wrapper -->	
		</section>
					<!-- Modal Popup untuk delete--> 
		<div class="modal" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">yakin menghapus pengumuman ini ?</h4>
					</div>    
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
						<button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
		<?php
		include	"navbar/content_footer.php";
		?>
		
		<!-- Modal Popup pengumuman Edit -->
		<div id="ModalEditDosen" class="modal" tabindex="-1" role="dialog"></div>		
		<!-- Modal Popup Tambah pengumuman -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Pengumuman</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<form action="page/article_add.php" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<div class="input-group">
								<input name="author" type="hidden" value="<?php echo $nama;?>" />
								</div>
							</div>
							<div class="form-group">
								<label>Pengumuman</label>
									<div class="input-group">
									<textarea id='editor4' name="content" rows="10" cols="90" class="form-control" placeholder="Isi Pengumuman" required ></textarea>
									<script>
										    CKEDITOR.replace( "editor4",{ } );
										</script>
									</div>
							</div>
							<div class="modal-footer">
							<button id="alert" class="btn btn-warning" type="submit">Proses</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		</div>
<!-- Library Scripts -->
<?php
include "bundle/index_script.php";
?>
  </body>
</html>