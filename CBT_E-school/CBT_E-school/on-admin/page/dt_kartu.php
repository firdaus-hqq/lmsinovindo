					<?php
						$querydosen = mysqli_query ($konek, "SELECT * FROM siswa ORDER by nis ASC");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
						$qq = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
						if($qq == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($xx = mysqli_fetch_array ($qq)){	

						?>
<div id='border' class="col-xs-6" style='max-width:450px;'>
	            <table>
		                <td colspan="3" style="border-bottom:1px solid #666; padding: 0;">
                			<table width="100%" class="kartu">
                				<tr>
                				    <td align='center' style='padding: 4px'><img src='../aset/foto/<?php echo $xx['logo'];?>' height='40'></td>
                                    <td id="cilik" align='center' style='font-weight:bold; padding: 4px;'>KARTU PESERTA <BR> UJIAN SEKOLAH BERBASIS KOMPUTER<BR>SMP NEGERI 38 SURABAYA<BR>TAHUN AJARAN 2019/2020 </td>
                                    <td align='center' style='padding: 4px'><img src='../aset/foto/<?php echo $xx['logo_kota'];?>' height='45'></td>
                				</tr>
                			</table>
                		</td>
<tr><td id="cilik"><b>Nama</b></td><td id="cilik" width="1"> :</td><td id="cilik" width="290"> <b>&emsp;<?php echo $ar['nama_lengkap']; ?></b></td></tr>
<tr><td id="cilik"><b>Kelas</b></td><td id="cilik"> :</td><td id="cilik">&emsp;<b><?php echo $ar['kelas']; ?></b></td></tr>
<tr><td id="cilik"><b>Sesi / Ruang</b></td><td id="cilik"> :</td><td id="cilik"><b>&emsp;<?php echo $ar['sesi']; ?> / <?php echo $ar['ruang']; ?></b></td></tr>
<tr><td></td><td></td><td id="cilik">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surabaya,16 Maret 2020</td></tr>
<tr><td></td><td></td><td id="cilik" width="290">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala Sekolah</td></tr>
<tr><td></td><td></td><td id="cilik" height="40" width="115">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='../aset/foto/ttd.png' width=70px height=auto/></td></tr>
<tr><td></td><td></td><td id="cilik" width="290">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Dangun, S.Pd</u></td></tr>
<tr><td></td><td></td><td id="cilik" width="290">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIP.197004061997031005</td></tr>
	            </table>
	            <img id='plotro' src='../aset/foto_siswa/<?php echo $ar['foto']; ?>' width=70px height=auto/>
</div>
<?php }} ?>