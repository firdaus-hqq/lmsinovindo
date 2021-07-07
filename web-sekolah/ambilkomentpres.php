<?php
include "config/config.php";
$id_prestasi = $_GET['id_prestasi'];
$query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from komentar where id_prestasi=$id_prestasi");
while($q = mysqli_fetch_array($query)){
    echo "<ul class='comments-list'>	
						<li>	
							<div class='comment'>
								<div class='comment-thumb'>
									<a href='#'>
										<img src='assets/images/avatar.png' class='img-circle' />
									</a>
								</div>
								<div class='comment-content'>
									<div class='comment-author'>
										<a href='#'>$q[oleh]</a>
										<div class='comment-info'>
											<span class='time'>$q[waktu]</span>
										</div>
									</div>
									<div class='comment-text'>
										$q[komentar]
									</div>
								</div>
							</div>
						</li>
					</ul> ";}
					?>