<?php 
session_start();

if ( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

$conn = mysqli_connect("localhost", "root", "", "wo");

$ambil = $conn->query("SELECT * FROM penyewaan JOIN users 
 	ON penyewaan.id_user = users.id_user WHERE penyewaan.id_penyewaan='$_GET[id]' ");
 $detail = $ambil->fetch_assoc();

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Nota Pembayaran</title>
 	<link rel="stylesheet" type="text/css" href="../styles.css?v=<?php echo time(); ?>">
 </head>
 <body>
 
 <!-- header -->
	<div class="header">
		<div class="menu">
			<h2><a href="index.php"><img src="../gambar/icon/logo.png" style="width: 120px; height: 120px"></a></h2>
			<ul>
				<li><a href="../index.php">Beranda</a></li>
				<li><a href="../albumuser.php">Album</a></li>
				<li><a href="../keranjang.php">Layanan</a></li>
				<li><a href="../keranjang.php">Keranjang</a></li>
				<li><a href="../riwayat.php">Riwayat</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
		</div>

		<div class="medsos">
			<ul>
				<li><a href="https://www.instagram.com/nunungsalon/">
					<img src="../gambar/icon/ig.png" style="width: 15px; height: 15px"></a></li>
					<li><a href="../https://www.youtube.com/channel/UC1kJm1NUx0x1E0dDhBtwfJA">
						<img src="../gambar/icon/yt.png" style="width: 16px; height: 16px"></a></li>
						<li><a href="https://api.whatsapp.com/send?phone=+6285201385401">
							<img src="../gambar/icon/wa.png" style="width: 15px; height: 15px"></a></li>
							<li><a href="https://www.google.com/maps/dir//Nunung+Salon+dan+Busana,+Jl.+Raya+Dieng,+Dukuh+Karanganyar,+Pasurenan,+Batur,+Banjarnegara,+Jawa+Tengah+53456,+Indonesia/@-7.2166021,109.7845136,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2e700d0f488d7de5:0x2745db2094dca02b!2m2!1d109.8545542!2d-7.2166074?hl=id"><img src="../gambar/icon/gps.png" style="width: 15px; height: 15px"></a></li>
						</ul>
					</div>
				</div>

				<div class="isi">
						<a><strong>Detail penyewaan</strong></a><br><br>
						<a><strong>Nama : <?php echo $detail['nama']; ?></strong></a><br>

						<a>
							Telepon : <?php echo $detail['telfon']; ?><br>
							Alamat : <?php echo $detail['alamat']; ?>
						</a>
						<p>
							ID Sewa : <?php echo $detail['id_penyewaan']; ?><br>
							Tanggal : <?php echo $detail['tgl_penyewaan']; ?><br>
							Total : Rp. <?php echo number_format($detail['total']); ?>
						</p>
							</div>
							<div class="table">
						<center><table>
									<tr>
										<th>No</th>
										<th>Barang</th>
										<th>Harga</th>
										<th>jumlah</th>
										<th>Total</th>
									</tr>
										<?php
											$ambil = $conn->query("SELECT * FROM sewa JOIN busanaku ON 
												sewa.id_busana=busanaku.id_busana WHERE 
												sewa.id_penyewaan='$_GET[id]' ");
										?>
										<?php $x = 1; ?>

										
										<?php  while ($bagi = $ambil->fetch_assoc()) { ?>

										
											<tr>
												<td><?= $x;  ?></td>
												<td><img src="../img/<?php echo $bagi["busana"];?>" width="60" height="60"></td>
												<td>Rp. <?php echo number_format($bagi["harga_busana"]); ?></td>
												<td><?= $bagi["jumlah"]; ?></td>
												<td>Rp. <?php echo number_format($bagi["harga_busana"]*$bagi["jumlah"]); ?></td>
											</tr>

										<?php $x++ ?>	
										<?php } ?>								
								</table></center><br><br>
								<a href="../riwayat.php">Kembali ke Riwayat</a>
								<br>
								
					</div>

 </body>
 </html>