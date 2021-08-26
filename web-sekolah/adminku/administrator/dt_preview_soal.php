<?php 
$jenis=$_GET['jenis'];
$kode=$_GET['kode'];
?>
            <div id="tuti" class="col-xs-12">
                <div class="col-xs-9">
                    <table class="cetakan full">
            			<tr>
            				<td width="30px" rowspan="3" valign="top"></td>
            				<td width="200px">JENIS UJIAN</td>
            				<td width="10px">:</td>
            				<td><span class="full"><?php echo $jenis;?></span></td>
            			</tr>
            			<tr>
            				<td>KODE SOAL</td>
            				<td>:</td>
            				<td>
            				<span style="width:250px"><?php echo $kode;?></span></td>
            			</tr>
                	</table>
                </div>
<div class="col-xs-12">
                <tbody>
					<?php
					$qu = mysqli_query ($mysqli, "SELECT * FROM ujian where kodesoal='$kode'");
						if($qu == false){
							die ("Terjadi Kesalahan : ". mysqli_error($mysqli));
						}
						while ($rr = mysqli_fetch_array ($qu)){
						$querydosen = mysqli_query ($mysqli, "SELECT * FROM soal where jenissoal='$jenis' and kodesoal='$kode' ORDER BY nomersoal ASC");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($mysqli));
						}
						while ($ar = mysqli_fetch_array ($querydosen)){
						    
						    if(!$ar['audio']=='')
				        {
					    $audio = "<audio src='../gbr/$ar[audio]' controls controlsList='nodownload'></audio>";
				        }
				        else
				        {
					    $audio = "";
				        }	
				        
						if(!$ar['soal']=='')
				        {
					    $soal = "<b>$ar[soal]</b><br>";
				        }
				        else
				        {
					    $soal = "<br>";
				        }
				        if(!$ar['gambarsoal']=='')
				        {
					    $gambarsoal = "<img class='max' src='../gbr/$ar[gambarsoal]' align=center style='max-width:300pk;height:auto' ><br>";
				        }
				        else
				        {
					    $gambarsoal = "";
				        }
					    if(!$ar['gambar_a']=='')
				        {
					    $gambar_a = "<img src='../gbr/$ar[gambar_a]' align=center style='max-width:300pk;height:auto' >";
				        }
				        else
				        {
					    $gambar_a = "";
				        }
				        if(!$ar['pilihan1']=='')
				        {
					    $pilihan_a = "$ar[pilihan1]";
				        }
				        else
				        {
					    $pilihan_a = "";
				        }
				        if(!$ar['gambar_b']=='')
				        {
					    $gambar_b = "<img src='../gbr/$ar[gambar_b]' align=center style='max-width:300pk;height:auto' >";
				        }
				        else
				        {
					    $gambar_b = "";
				        }
				        if(!$ar['pilihan2']=='')
				        {
					    $pilihan_b = "$ar[pilihan2]";
				        }
				        else
				        {
					    $pilihan_b = "";
				        }
				        if(!$ar['gambar_c']=='')
				        {
					    $gambar_c = "<img src='../gbr/$ar[gambar_c]' style='max-width:300pk;height:auto' >";
				        }
				        else
				        {
					    $gambar_c = "";
				        }
				        if(!$ar['pilihan3']=='')
				        {
					    $pilihan_c = "$ar[pilihan3]";
				        }
				        else
				        {
					    $pilihan_c = "";
				        }
				        if(!$ar['gambar_d']=='')
				        {
					    $gambar_d = "<img src='../gbr/$ar[gambar_d]' style='max-width:300pk;height:auto' >";
				        }
				        else
				        {
					    $gambar_d = "";
				        }
				        if(!$ar['pilihan4']=='')
				        {
					    $pilihan_d = "$ar[pilihan4]";
				        }
				        else
				        {
					    $pilihan_d = "";
				        }
				        
				        if(!$ar['gambar_e']=='')
				        {
					    $gambar_e = "<img src='../gbr/$ar[gambar_e]' style='max-width:300pk;height:auto' >";
				        }
				        else
				        {
					    $gambar_e = "";
				        }
				        if(!$ar['pilihan5']=='')
				        {
					    $pilihan_e = "$ar[pilihan5]";
				        }
				        else
				        {
					    $pilihan_e = "";
				        }
				        if($ar['status']>1)
				        {
					    $statussoal = "hidden";
				        }
				        else
				        {
					    $statussoal = "show";
				        }
						
                        if($ar['kunci']=="A")
				        {
					    $pilihan = "<br>
						<div class='$statussoal'>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>  
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p> 
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p> 
    								&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
				        }
				        else if($ar['kunci']=="B")
				        {
					    $pilihan = "<br>
						<div class='$statussoal'>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>  
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>  
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>  
    								&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div>  ";
				        }
				        else if($ar['kunci']=="C")
				        {
					    $pilihan = "<br>
						<div class='$statussoal'>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>  
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>  
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>  
    								&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
				        }
				        else if($ar['kunci']=="D")
				        {
					    $pilihan = "<br>
						<div class='$statussoal'>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>  
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>  
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p> 
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d   &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
    								&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
				        }
				        else
				        {
					    $pilihan = "<br>
						<div class='$statussoal'>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>  
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>  
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p> 
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>   
    								&emsp;<p>e. &emsp;$pilihan_e $gambar_e  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div>";
				        }
							echo "

								<tr>
								<hr style='height:1px;border:none;color:#d3d1d1;background-color:#d3d1d1;' />
								$ar[nomersoal].&emsp;$soal
								&emsp;$gambarsoal<br>$audio
								$pilihan
								<br>
                                
   									<td align=center>
									</td>
								</tr>";
						}
					?>
					<hr class="style2">
					<center><h5><b> --------- &copy; <?php echo date ('Y') ?> INOVINDO DIGITAL MEDIA --------- </b></h5></center>
				</tbody>
</div>
<?php } ?>