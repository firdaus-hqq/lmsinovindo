<style>
    .sidebar-form {
        border:0px !important;
    }
    #on {
	        animation: blink 1s ease-in infinite;
	    }

@keyframes blink {
  from, to { opacity: 1 }
  50% { opacity: 0 }
}
</style>
<?php
$qq = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
						if($qq == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($xx = mysqli_fetch_array ($qq)){
                        ?>	
        
		<div class="user-panel">
            <div class="pull-left image">
              <img src="../aset/foto/<?php echo $xx['logo'];?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
			  <a href="#"><i id='on' class='fa fa-circle' style='color:#90ff00;font-size:10px;'></i> Online</a>
			  <h5 style="color:white"><?php echo $jabatan;?></h5>
			</div>
		  </div>
		    <form action="#" method="get" class="sidebar-form">
                 <h5 style="color:white"><?php echo $nama;?></h5>
            </form>
         
<?php }?>