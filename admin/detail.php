<?php 

$conn = mysqli_connect("localhost", "root", "", "wo");

 $ambil = $conn->query("SELECT * FROM penyewaan JOIN users 
 	ON penyewaan.id_user = users.id_user WHERE penyewaan.id_penyewaan='$_GET[id]' ");
 $detail = $ambil->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator | Detail Pesanan</title>
	<link rel="stylesheet" type="text/css" href="../admin.css?v=<?php echo time(); ?>">
</head>
<body>
		<div class="wrap">
			<div class="sidebar">
				<h2>Administrator</h2>
				<img class="administrator" src="../gambar/icon/ad.png" style="width: 100px; height: 100px">
				<ul>
					<li><a href="indexadmin.php"><img class="log" src="../gambar/icon/home.png" style="width: 30px; height: 30px">Beranda</a></li>
					<li><a href="busana.php"><img class="log" src="../gambar/icon/menu.png" style="width: 30px; height: 30px">Layanan</a></li>
					<li><a href="pelanggan.php"><img class="log" src="../gambar/icon/pelanggan.png" style="width: 30px; height: 30px">Pelanggan</a></li>
					<li><a href="album.php"><img class="log" src="../gambar/icon/album.png" style="width: 30px; height: 30px">Album</a></li>
					<li class="active"><a href="penyewaan.php"><img class="log" src="../gambar/icon/sewa.png" style="width: 30px; height: 30px">Penyewaan</a></li>
					<li><a href="../logout.php"><img class="log" src="../gambar/icon/logout.png" style="width: 30px; height: 30px">Logout</a></li>
				</ul>
			</div>
			<div class="conten">
				<div class="header">
					<h2>Detail Data Penyewaan</h2>
				</div>
					<div class="isi">
						<strong>Nama : <?php echo $detail['nama']; ?></strong><br>

						<p>
							Telepon : <?php echo $detail['telfon']; ?>
								<br>
							Alamat : <?php echo $detail['alamat']; ?>
						</p>
						<p>
							Tanggal : <?php echo $detail['tgl_penyewaan']; ?>
								<br>
							Total : Rp. <?php echo number_format($detail['total']); ?>
						</p>
							</div>
							<div class="table">
								<table>
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
								</table><br><br>
								<a href="penyewaan.php">< Kembali</a>
					</div>
			</div>
		</div>
</body>
</html>