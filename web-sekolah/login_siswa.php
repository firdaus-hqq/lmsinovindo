<script>
	function validasi(form) {
		if (form.username.value == "") {
			alert("Anda belum mengisikan Username.");
			form.username.focus();
			return (false);
		}
		if (form.password.value == "") {
			alert("Anda belum mengisikan Password.");
			form.password.focus();
			return (false);
		}
		return (true);
	}
</script>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | INOVINDO ACADEMY</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/logstyle.css">
</head>

<body>
	<div class="container">
		<div class="form">
			<div class="heading">
				<h1>INOVINDO | A C A D E M Y</h1>
				<br>
				<h2>Login</h2>
			</div>

			<!--Form-->
			<form class="wrap2" action="adminku/cek_login.php" method="POST">
				<?php
				if (isset($_GET['log']) == 2) {
					echo "<div class='alert alert-danger'><strong>Login gagal, Silahkan coba kembali.</strong></div>";
				}
				?>
				<div class="wrap2">
					<label>Masukan id</label>
					<input type="text" class="form-control" name="username" id="username" required="required" placeholder="   Username" autocomplete="off" />
					<span class="focus-input2"></span>
				</div>

				<div class="wrap2">
					<label>Password</label>
					<input type="password" class="form-control" name="password" id="password" required="required" placeholder="  Password" autocomplete="off" />
					<span class="focus-input2"></span>
				</div>
				<br>
				<button type="submit" class="btn">Login</button>
		</div>
		</form>

		<!--Gambar-->
		<div class="image">
			<img src="assets/images/siswa.jpg" class="img" alt="" />
		</div>
	</div>
</body>

</html>
