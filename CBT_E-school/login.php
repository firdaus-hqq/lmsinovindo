<?php
error_reporting(0); 
include ('koneksi/koneksi.php');
	                    $querydosen = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($ar = mysqli_fetch_array ($querydosen)){
                        ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="aset/fa/css/font-awesome.css">
  <title>IDM | ACADEMY</title>
  <link rel="shortcut icon" href="aset/foto/<?php echo $ar['logo'];?>">
    <link rel="stylesheet" href="admin/css/reset.min.css">
    <link rel="stylesheet" href="admin/css/style2.css">
<style>
img {
  border-radius: 20%;
}
</style>
<style type="text/css">
#blink {
 animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
  transform: translate3d(0, 0, 0);
  backface-visibility: hidden;
  perspective: 1000px;
}

@keyframes shake {
  10%, 90% {
    transform: translate3d(-1px, 0, 0);
  }
  
  20%, 80% {
    transform: translate3d(2px, 0, 0);
  }

  30%, 50%, 70% {
    transform: translate3d(-4px, 0, 0);
  }

  40%, 60% {
    transform: translate3d(4px, 0, 0);
  }
}
#but {
  cursor: pointer;
  background: #3262e6;
  width: 100%;
  border: 0;
  padding: 10px 15px;
  color: #ffffff;
  -webkit-transition: 0.3s ease;
  transition: 0.3s ease;
}
#but:hover {
  background: #ff0000;
}
.bg::before {
            content: '';
            background-image: url('admin/background2.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            position: absolute;
            z-index: -1;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height:100%;
            width:100%;
        }
a:link    {
  /* Applies to all unvisited links */
     text-decoration:  none;
  } 
a:visited {
  /* Applies to all visited links */
     text-decoration:  none;

  } 
a:hover   {
  /* Applies to links under the pointer */
    text-decoration:  none;
  } 
a:active  {
  /* Applies to activated links */
    text-decoration:  none;
  }
.field-icon {
    color: #afafaf;
    float: right;
    margin-left: 220px;
    margin-top: -45px;
    position: relative;
    z-index: 2;
}
#blink {
 animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
  transform: translate3d(0, 0, 0);
  backface-visibility: hidden;
  perspective: 1000px;
}

@keyframes shake {
  10%, 90% {
    transform: translate3d(-1px, 0, 0);
  }
  
  20%, 80% {
    transform: translate3d(2px, 0, 0);
  }

  30%, 50%, 70% {
    transform: translate3d(-4px, 0, 0);
  }

  40%, 60% {
    transform: translate3d(4px, 0, 0);
  }
}
</style>  
</head>
<body class="bg">
<div class="pen-title" style="padding: 20px 0;">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Form Module-->
	<img  href="<?php echo $ar['web'];?>" src="aset/foto/<?php echo $ar['logo_ujian'];?>" width=310 >
	<br><br>
<div class="module form-module">
  <div class="togg1le" style="background-color:white;color:grey;">
  </div>
  <div class="form">
    <h2><b>Selamat Datang<b></h2><br>
	  <h3>Silahkan login dengan username dan password yang anda miliki</h3>
    <form action="vl_siswa.php" class="inner-login" method="post">
		<div class="input-container">
			<i class="fa fa-user-circle icon"></i>
			<input type="text" class="form-control" name="username" autocomplete="off" placeholder="Username" required>
		  </div>
		<div class="input-container">
			<i style=""class="fa fa-key icon"></i>
			<input  id="password-field" type="password" class="form-control" name="password" placeholder="Password" required>
		  </div>
		<span style="top: -12px;" toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		<div class="input-container">
			<i style=""class="fa fa-lock icon"></i>
			<input  id="password-field" type="text" class="form-control" name="token" placeholder="token">
		  </div>
	<button id="but" style="border-radius:20px;"><b>Login</b></button>
    </form><br>
    <br>
<?php if (!empty($_GET['salah'])) { echo "<h5 id='blink' style='color: red;font-size:10px'>
					Nomer peserta atau Password tidak ditemukan di database</h5>"; }?>
<?php if (!empty($_GET['token'])) { echo "<h5 id='blink' style='color: red;font-size:10px'>
					Token salah</h5>"; }?>
		<br>
		<font id='blink' style='color: grey;font-size:10px'>PT. INOVINDO DIGITAL MEDIA X SMKN 4 BANDUNG <?php echo date("Y");?></font>
  </div>
<?php }?>
		
</div>
<script src='admin/js/jquery.min.js'></script>
<script  src="admin/js/index.js"></script>
<script>
    $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
    $(".toggle-password2").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
</body>
</html>