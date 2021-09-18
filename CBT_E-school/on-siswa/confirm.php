

	<html class="no-js" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>sekolah</title>
	<link href="../aset/foto/icon.png" rel="icon" type="image/png">
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
			width: 20%;
			background-color: #333333;
			height: 101px;
			color: #FFFFFF;
			font-size: 13px;
			font-style: normal;
			font-weight: normal;
			border-radius: 20px 0px 0px 20px;
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
	<link href="mesin/klien.css" rel="stylesheet">
	<link rel="stylesheet" href="mesin/bootstrap.min.css">
</head>

<body class="font-medium" style="background-color:#cacaca">
				<header style="background-color:#3d9eee ; ">
			<div class="group">
				<div class="left" style="height:"40%; background-color:#3d9eee"><img src="../aset/foto/logoheader.png" style="height: 10%; margin-left:0px;"></div>
							<div class="right">
				<table width="100%" border="0" cellspacing="5px;" style="margin-top:10px">
					<tbody>
						<tr>
							<td rowspan="3" width="100px" align="center"><img src="mesin/avatar.gif" style=" margin-left:0px; margin-top:5px" class="foto"></td>
														</tr>
						<tr>
							<td><span class="user">ali<br></span></td>
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
						<label class="list-group-item-heading">Nomer Peserta</label>
						<p class="list-group-item-text">ali</p>
					</div>
					<div id="garis" class="list-group-item">
						<label class="list-group-item-heading">Nama</label>
						<p class="list-group-item-text">ali | </p>
					</div>
									<div id="garis" class="list-group-item">
					<label class="list-group-item-heading">Mapel </label>
					<p class="list-group-item-text">PPWB | 7854</p>
				</div>
				<div id="garis" class="list-group-item">
					<label class="list-group-item-heading">Jumlah Soal </label>
					<p class="list-group-item-text">2</p>
				</div>
				<div id="garis" class="list-group-item">
					<label class="list-group-item-heading">Waktu </label>
					<p class="list-group-item-text">999 MENIT</p>
				</div>
				<input id="nis" name="nis" type="hidden" value="9090909">
				<input id="nama" name="nama" type="hidden" value="ali">
				<input id="kelas" name="kelas" type="hidden" value="smkn4">
				<input id="mapel" name="kodemapel" type="hidden" value="PPWB">
				<input id="kode" name="kodesoal" type="hidden" value="7854">
				<input id="kode" name="jumlahsoal" type="hidden" value="2">
				<input id="aktif" name="aktif" type="hidden" value="Aktif">
				<input id="waktu" name="waktu" type="hidden" value="999">
				<input id="waktuselesai" name="waktuselesai" type="hidden" value="02:36:05">
				<input id="mulaiujian" name="mulaiujian" type="hidden" value="09:57:05">
				<input id="lamaujian" name="lamaujian" type="hidden" value="16:39:00">
				<input id="sisawaktu" name="sisawaktu" type="hidden" value="59940">
									<input id="ok" name="ok" type="hidden" value="">
				<div id="garis" class="list-group-item">
					<div class="row">
						<br><button style="border-radius: 10px;" id="konfir" type="submit" class="btn btn-success"><b>MASUK</b></button>
					</div>						</div>
				</div>


				</form>
													</div>
			<style>
.footer {
pointer-events: none;
cursor: default;
text-decoration: none;    
}
</style>
<div class="footer">
<p>Ver. 6.0  Copyright &copy; 2021 gludug </p>
</div>			</div>
		<div id="buntut">
</body>

</html>
