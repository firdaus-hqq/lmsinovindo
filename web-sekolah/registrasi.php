<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script type="text/javascript" src="adminku/plugins/jquery-1.4.4.min.js"></script>
<script>
$(document).ready(function(){
   $("#nis").change(function(){
    // tampilkan animasi loading saat pengecekan ke database
    $('#pesan').html(' <img src="adminku/images/loading.gif" width="20" height="20"> checking ...');
    var nis = $("#nis").val();
    $.ajax({
     type:"POST",
     url:"adminku/checking_nis.php",
     data: "nis=" + nis,
     success: function(data){
       if(data==0){
          $("#pesan").html('<img src="adminku/images/tick.png">');
          $('#nis').css('border', '1px #090 solid');
       }
       else{
          $("#pesan").html('<img src="adminku/images/cross.png"> Nis sudah digunakan!');
          $('#nis').css('border', '1px #C33 solid');
                $("#nis").val('');
       }
     }
    });
  })
});
</script>
<script>
$(document).ready(function(){
   $("#email").change(function(){
    // tampilkan animasi loading saat pengecekan ke database
    $('#pesan_email').html(' <img src="adminku/images/loading.gif" width="20" height="20"> checking ...');
    var email = $("#email").val();
    $.ajax({
     type:'POST',
     url:'adminku/checking_email.php',
     data: 'email=' + email,
     success: function(data){
       if(data==0){
          $("#pesan_email").html('<img src="adminku/images/tick.png">');
          $('#email').css('border', '1px #090 solid');
       }
       else{
          $("#pesan_email").html('<img src="adminku/images/cross.png"> Email sudah digunakan!');
          $('#email').css('border', '1px #C33 solid');
                $("#email").val('');
       }
     }
    });
  })
});
</script>
<script language="javascript">
function check_radio(radio)
    {
  for (i = 0; i < radio.length; i++)
  {
    if (radio[i].checked === true)
    {
      return radio[i].value;
    }
  }
  return false;
    }   
function validasi(form){
  if (form.nis.value == ""){
      alert('Nis Masih Kosong!');
      form.nis.focus();
      return (false);
  }
  if (form.nama.value == ""){
      alert('Nama Masih Kosong!');
      form.nama.focus();
      return (false);
  }
  if (form.email.value == ""){
      alert('Email Masih Kosong!');
      form.email.focus();
      return (false);
  }
  pola_email=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!pola_email.test(form.email.value)){
        alert ('Penulisan Email tidak valid');
        form.email.focus();
        return false;
        }  
  if (form.kelas.value == "pilih"){
      alert('Kelas Masih Kosong!');
      return (false);
  }
  if (form.alamat.value == ""){
      alert('Alamat Masih Kosong!');
      form.alamat.focus();
      return (false);
  }
  if (form.tempat_lahir.value == ""){
      alert('Tempat Lahir Masih Kosong!');
      form.tempat_lahir.focus();
      return (false);
  }
  var radio_val = check_radio(form.jk);
  if (radio_val === false)
  {
    alert("Anda belum memilih Jenis Kelamin!");
                return false;
  }
 
  if (form.agama.value == "pilih"){
      alert('Anda belum memilih Agama!');
      return (false);
  }
  if (form.nama_ayah.value == ""){
      alert('Nama Ayah/Wali Masih Kosong!');
      form.nama_ayah.focus();
      return (false);
  }
   return (true);
}
</script>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Sekolah,jurusan,IT" />
	<meta name="author" content="RPL SMK TI" />
	<title>
	Registrasi Siswa 
</title>
	<link rel="stylesheet" href="http://localhost/web-sekolah/assets/css/style.css">
	<link rel="stylesheet" href="http://localhost/web-sekolah/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/web-sekolah/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://localhost/web-sekolah/assets/css/neon.css">
	<link rel="stylesheet" href="http://localhost/web-sekolah/assets/js/nivo-lightbox/nivo-lightbox.css">
	<link rel="stylesheet" href="http://localhost/web-sekolah/assets/js/nivo-lightbox/themes/default/default.css">
	<link rel="stylesheet" href="http://localhost/web-sekolah/assets/js/datatables/responsive/css/datatables.responsive.css">
	<link rel="stylesheet" href="http://localhost/web-sekolah/assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="http://localhost/web-sekolah/assets/js/select2/select2.css">
	<link rel="stylesheet" href="http://localhost/web-sekolah/assets/css/devicons/css/devicons.min.css">
	<link rel="stylesheet" href="http://localhost/web-sekolah/assets/css/devicons/css/devicons.css">
	<link rel="stylesheet" href="http://localhost/web-sekolah/assets/animate.css">
	 <link href="http://localhost/web-sekolah/adminku/plugins/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	 
	<link rel="shortcut icon" href="http://localhost/web-sekolah/assets/images/index.png">
	<script src="http://localhost/web-sekolah/assets/js/jquery-1.11.0.min.js"></script>
	<script>$.noConflict();</script>
	<script src="http://localhost/web-sekolah/assets/js/jquery-transit.js"></script>
<script type="text/javascript">
              jQuery(function() {
                var pulsate = function() {
                  jQuery('#spinbox').transition({ perspective: '0px', rotateY: '0deg',duration: '2000ms' })
				  .transition({ perspective: '180px', rotateY: '360deg',duration: '2000ms',delay:1500}, pulsate);
                };
                pulsate();
              });
</script> 
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56f357ea5059d7b7"></script>
</head>
<body id="body" class="blue-one-page">


<header id="navigation" class="navbar-inverse navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
                    </button>
					<!-- /responsive nav button -->
					
				<!-- /main nav -->
				
            </div>
        </header><section class="breadcrumb"> 
  <div class="container">  
    <div class="row"> 
      <div class="col-sm-12">
        <h1>Registrasi Siswa</h1>
              <ol class="breadcrumb bc-3" >
            <li>
        <a href="http://localhost/web-sekolah/"><i class="fa fa-home"></i>Home</a>
      </li>  
        <li class="active">
              <strong>Registrasi Siswa</strong>
          </li>
          </ol>      
      </div>
    </div> 
  </div>
</section>
<section class="contact-container">  
  <div class="container">    
    <div class="row">     
     <div class='col-sm-12'>
      <h3 align="center">Registrasi Siswa </h3>
      <hr/>       
      <section class='panel panel-success'>
                        <header class='panel-heading'>
                          <b> Silahkan di Isi</b>
                    <span class='tools pull-right'>
                                <a href='javascript:;' class='fa fa-chevron-down'></a>
                                <a href='javascript:;' class='fa fa-cog'></a>
                                <a href='javascript:;' class='fa fa-times'></a>
                            </span>
                        </header>   
          <div class='panel-body'>    
   <form method="POST" action="adminku/input_registrasi.php" class="form-horizontal" onSubmit="return validasi(this)">
      <table class="table table-bordered responsive">
        <tr><td><b>NIS(Nomor Induk Siswa)</b></td>
        <td><div class="col-sm-6"><input type="text" class="form-control" id="nis" required="required" placeholder="nis" name="nis" size="20" id="nis"/></div><span id="pesan"></span></td></tr>
    <tr> <td><b>Nama Lengkap </b></td>
<td><div class="col-sm-5"><input type="text" class="form-control" id="nama" required="required" placeholder="nama lengkap" name="nama" size="40"/></div></td></tr>        
        <tr><td><b>Email </b></td>
          <td><div class="col-sm-5"><input type="text" name="email" class="form-control" data-validate="email"  required="required" placeholder="email" size="40" id="email"/></div><span id="pesan_email"></span></td></tr>                     
         <tr><td><b>Kelas </b></td>
                              <td><div class='col-sm-2'><select name='kelas' class='form-control'>
                                      <option value='pilih' selected>--Pilih--</option><option value='10rpl'>X-RPL</option><option value='11rpl'>XI-RPL</option><option value='12rpl'>XII-RPL</option></select></div>                              </td></tr>                       
         <tr><td><b>Alamat </b></td><td><div class="col-sm-7">
            <textarea name="alamat"class="form-control" id="field-1" required="required" cols="43" rows="3"></textarea>
          </div></td></tr>                      
        <tr><td><b>Tempat Lahir </b></td>
        <td><div class="col-sm-5"><input type="text" name="tempat_lahir"class="form-control" id="field-1" required="required" placeholder="tempat lahir" size="40"/>
          </td> </tr>                      
         <tr><td><b>Tanggal Lahir </b></td>
           <td><div class="col-sm-8">
          <div class='col-sm-4'><select name=tgl_lahir class='form-control'><option value=01>01</option><option value=02>02</option><option value=03>03</option><option value=04>04</option><option value=05>05</option><option value=06>06</option><option value=07>07</option><option value=08>08</option><option value=09>09</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25</option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29 selected>29</option><option value=30>30</option><option value=31>31</option></select></div> <div class='col-sm-4'><select name=bln_lahir class='form-control'><option value=1>Januari</option><option value=2>Februari</option><option value=3>Maret</option><option value=4>April</option><option value=5>Mei</option><option value=6 selected>Juni</option><option value=7>Juli</option><option value=8>Agustus</option><option value=9>September</option><option value=10>Oktober</option><option value=11>November</option><option value=12>Desember</option></select></div> <div class='col-sm-4'><select name=thn_lahir class='form-control'><option value=1950>1950</option><option value=1951>1951</option><option value=1952>1952</option><option value=1953>1953</option><option value=1954>1954</option><option value=1955>1955</option><option value=1956>1956</option><option value=1957>1957</option><option value=1958>1958</option><option value=1959>1959</option><option value=1960>1960</option><option value=1961>1961</option><option value=1962>1962</option><option value=1963>1963</option><option value=1964>1964</option><option value=1965>1965</option><option value=1966>1966</option><option value=1967>1967</option><option value=1968>1968</option><option value=1969>1969</option><option value=1970>1970</option><option value=1971>1971</option><option value=1972>1972</option><option value=1973>1973</option><option value=1974>1974</option><option value=1975>1975</option><option value=1976>1976</option><option value=1977>1977</option><option value=1978>1978</option><option value=1979>1979</option><option value=1980>1980</option><option value=1981>1981</option><option value=1982>1982</option><option value=1983>1983</option><option value=1984>1984</option><option value=1985>1985</option><option value=1986>1986</option><option value=1987>1987</option><option value=1988>1988</option><option value=1989>1989</option><option value=1990>1990</option><option value=1991>1991</option><option value=1992>1992</option><option value=1993>1993</option><option value=1994>1994</option><option value=1995>1995</option><option value=1996>1996</option><option value=1997>1997</option><option value=1998>1998</option><option value=1999>1999</option><option value=2000>2000</option><option value=2001>2001</option><option value=2002>2002</option><option value=2003>2003</option><option value=2004>2004</option><option value=2005>2005</option><option value=2006>2006</option><option value=2007>2007</option><option value=2008>2008</option><option value=2009>2009</option><option value=2010>2010</option><option value=2011>2011</option><option value=2012>2012</option><option value=2013>2013</option><option value=2014>2014</option><option value=2015>2015</option><option value=2016>2016</option><option value=2017>2017</option><option value=2018>2018</option><option value=2019>2019</option><option value=2020>2020</option><option value=2021 selected>2021</option></select></div> </td></tr>                    
         <tr><td><b>Jenis Kelamin </b></td>                             
                         <td> <div class="col-sm-4"><input type="radio" name="jk" value="L">Laki - Laki
                                    <input type="radio" name="jk" value="P">Perempuan</td></tr>
         <tr><td>
          <b>Agama </b></td><td><div class="col-sm-2"><select name="agama" class="form-control">
                                        <option value="pilih" selected>--Pilih--</option>
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="budha">Budha</option><select></td></tr>                      
         <tr><td><b>Nama Ayah </b></td>
        <td><div class="col-sm-5"><input type="text" class="form-control" id="nama_ayah" required="required" placeholder="nama ayah" name="nama_ayah" size="40"/></td></tr>
         <tr><td><b>Nama Ibu </b></td><td><div class="col-sm-5"><input type="text" name="nama_ibu" class="form-control" id="nama_ibu" required="required" placeholder="nama ibu" size="40"/></td></tr>                     
         <tr><td><b>Tahun Masuk </b></td><td><div class='col-sm-4'><select name=thn_masuk class='form-control'><option value=2000>2000</option><option value=2001>2001</option><option value=2002>2002</option><option value=2003>2003</option><option value=2004>2004</option><option value=2005>2005</option><option value=2006>2006</option><option value=2007>2007</option><option value=2008>2008</option><option value=2009>2009</option><option value=2010>2010</option><option value=2011>2011</option><option value=2012>2012</option><option value=2013>2013</option><option value=2014>2014</option><option value=2015>2015</option><option value=2016>2016</option><option value=2017>2017</option><option value=2018>2018</option><option value=2019>2019</option><option value=2020>2020</option><option value=2021 selected>2021</option></select></div> </td></tr>                     
                               </table> 
     <div class="form-group"><div class="col-sm-3"></div>
     <div class="col-sm-6"><input type="submit" class="btn btn-success" value="Daftar"></input>
                                <button type='button' class='btn btn-primary' onclick="window.location.href='login_siswa.php';" > Batal</button>      </div></div></form></div></section></div></div> </div></section>  
<section class="footer-widgets">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				   <div style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;" class="single_service wow fadeInUp animated" data-wow-delay="1s">

				<a href="#">
					<img src='http://localhost/web-sekolah/adminku/setting_web/' class='img-rounded' height='100' /> 				</a>
				<p></p>
				</div>	
			</div>
			<div class="col-sm-3">
				   <div style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;" class="single_service wow fadeInUp animated" data-wow-delay="1s">

				<h5></i>Address</h5>
							</div>
			</div>
			<div class="col-sm-3">
				   <div style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;" class="single_service wow fadeInUp animated" data-wow-delay="1s">
				<h5>Contact</h5>
				<p>
					<i class="entypo-mobile"></i><br />
						<i class="entypo-inbox"></i>Fax: +1 (22) 5138-219<br />
						<i class="entypo-mail"></i>				</p>
			</div>
			</div>
		</div>
	</div>
</section>
<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<a href="">Copyright &copy; RPL SMK TI Ponorogo - All Rights Reserved.</a> 
			</div>
			<div class="col-sm-6">
				<ul class="social-networks text-right">
					<li>
						<a href=" " target='a_blank'>
							<div class="sosial-button sosial-twitter"></div>
						</a>
					</li>
					<li>
						<a href="" target="a_blank">
							<div class="sosial-button sosial-facebook"></div>
						</a>
					</li>
					<li>
						<a href="" target="a_blank">
							<div class="sosial-button sosial-linkedin"></div>
						</a>
					</li>
					<li>
						<a href="" target="a_blank">
							<div class="sosial-button sosial-google"></div>							
						</a>
					</li>
					<li>
						<a href="" target="a_blank">
							<div class="sosial-button sosial-whatsapp"></div>							
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>	
</div>

	<script src="http://localhost/web-sekolah/assets/js/bootstrap.min.js"></script>
	<script src="http://localhost/web-sekolah/assets/js/joinable.js"></script>
	<script src="http://localhost/web-sekolah/assets/js/resizeable.js"></script>
	
	<script src="http://localhost/web-sekolah/assets/js/jquery.validate.min.js"></script>
	<script src="http://localhost/web-sekolah/assets/js/nivo-lightbox/nivo-lightbox.min.js"></script>
	<script src="http://localhost/web-sekolah/assets/js/jquery.dataTables.min.js"></script>
	<script src="http://localhost/web-sekolah/assets/js/datatables/TableTools.min.js"></script>
	<script src="http://localhost/web-sekolah/assets/js/dataTables.bootstrap.js"></script>
	<script src="http://localhost/web-sekolah/assets/js/datatables/jquery.dataTables.columnFilter.js"></script>
	<script src="http://localhost/web-sekolah/assets/js/datatables/lodash.min.js"></script>
	<script src="http://localhost/web-sekolah/assets/js/datatables/responsive/js/datatables.responsive.js"></script>
	<script src="http://localhost/web-sekolah/assets/js/select2/select2.min.js"></script>	
</body>
</html>