<?php
error_reporting(0); 
include ('../koneksi/koneksi.php');
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
  <link rel="stylesheet" href="../aset/fa/css/font-awesome.css">
  <title>E-School</title>
  <link rel="shortcut icon" href="../aset/foto/<?php echo $ar['logo'];?>">
    <link rel="stylesheet" href="css/reset.min.css">
	<link rel='stylesheet prefetch' href='css/font.css'>
    <link rel="stylesheet" href="css/style.css">
<style>
img {
  border-radius: 20%;
}
</style>
<style type="text/css">
.bg::before {
            content: '';
            background-image: url('./background2.png');
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
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle" style="background-color:white;color:grey;"><i class="fa fa-times fa-lock"></i>
  </div>
  <div class="form">
  <img src="../aset/foto/<?php echo $ar['logo'];?>" height="100" width="auto" onError="this.onerror=null;" ><br><br>
    <h2><i class="fa fa-user"></i> Welcome Admin</h2>
    <form action="vl_admin.php" class="inner-login" method="post">
      <input type="text" class="form-control" name="username" autocomplete="off" placeholder="Username" required>
      <input id="password-field" type="password" class="form-control" name="password" placeholder="Password" required>
      <span style="float:left" toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
      <button>Login</button>
    </form><br>
    
    <br>
	    <?php if (!empty($_GET['salah'])) { echo "<h5 id='blink' style='color: red';>Username atau Password salah</h3>"; }
        ?>
  </div>
  
  <div class="cta"><a href="<?php echo $ar['web'];?>"><h5><b>&copy;  <?php echo date ('Y') ?></b></h5> <?php echo $ar['n_sekolah'];?></a></div>
<?php }?>
</div>
<script src='js/jquery.min.js'></script>
<script  src="js/index.js"></script>
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