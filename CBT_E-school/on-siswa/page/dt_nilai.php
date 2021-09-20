				<thead>
					<tr>
						<th width="3%">No</th>
						<th width="10%">Keahlian</th>
						<th width="5%">Jumlah Soal PG</th>
						<th width="5%">Jawaban Benar</th>
						<th width="5%">Jawaban Salah</th>
						<th width="5%">Nilai PG</th>
						<th width="5%">Total Nilai</th>
					</tr>
				</thead>
				<tbody>
				    <?php
					$querydosen = mysqli_query ($konek, "SELECT * FROM nilaihasil WHERE nama='$nama'");
						if($querydosen == false){
						die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($r = mysqli_fetch_array ($querydosen)){
						$cari=$r['kodesoal'];
						$querydosen2 = mysqli_query ($konek, "SELECT * FROM ujian where kodesoal='$cari'");
						if($querydosen2 == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($sr = mysqli_fetch_array ($querydosen2)){
							$result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cari' AND status='1'");
						$rows = mysqli_num_rows($result);
						$nilaipg=$sr['nilai'];
						$x=$r['jawabansiswa'];
						$xhasil=substr_count($x, "X");

						$kuncisoal=$r['kuncisoal'];
						$kuncis=strtoupper($kuncisoal);
						$key=$kuncis;
						$jumlah=$rows;
						$score=0;
                        $benar=0;
                        $salaht=0;
                        $kosong=0;
                    for ($no=0;$no<$jumlah;$no++){
                        
                    if($key[$no]==$x[$no]){
                        //jika jawaban cocok (benar)
                        $benar++;
                    }
					else
					{
                        //jika salah
                        $salaht++;
                    
                    }  
					$salah=$salaht-$xhasil;
}
$score = $nilaipg/$jumlah*$benar; 
$scoreasli=number_format($score,0);  
$nil= $scoreasli+$r['nilaiurai'];          
							echo "
								<tr>
									<td align=center><h6 style='font-size:12px;'>$i</h6></td>
									<td><h6 style='font-size:12px;'>$r[kodemapel] | $r[kodesoal]</h6></td>
									<td><h6 style='font-size:12px;'>$jumlah</h6></td>
									<td><h6 style='font-size:12px;'>$benar</h6></td>
									<td><h6 style='font-size:12px;'>$salah</h6></td>
									<td><h6 style='font-size:12px;'>$scoreasli</h6></td>	
									<td><button id='co' class='btn btn-success' style='font-size:11px;width:50px;'><b>$nil</b></button></td>
									";
						$i++;		
						}}
					?>
</tbody>