<?php 
 require '../functions.php';

session_start();

if ( !isset($_SESSION["login"])) {
	header("Location: ../login/loginadmin.php");
	exit;
}

 
 $bsn = query("SELECT * FROM busanaku");

 //Tombol cari di tekan
 if (isset($_POST["tomb"]) ) {

 	$bsn = mencari($_POST["key"]);
 }

//hapus di bagian barang busana
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator | Layanan</title>
	<link rel="stylesheet" type="text/css" href="../admin.css?v=<?php echo time(); ?>">
</head>
<body>

		<div class="wrap">
			<div class="sidebar">
				<h2>Administrator</h2>
				<img class="administrator" src="../gambar/icon/ad.png" style="width: 100px; height: 100px">
				<ul>
					<li><a href="indexadmin.php"><img class="log" src="../gambar/icon/home.png" style="width: 30px; height: 30px">Beranda</a></li>
					<li class="active"><a href="busana.php"><img class="log" src="../gambar/icon/menu.png" style="width: 30px; height: 30px">Layanan</a></li>
					<li><a href="pelanggan.php"><img class="log" src="../gambar/icon/pelanggan.png" style="width: 30px; height: 30px">Pelanggan</a></li>
					<li><a href="album.php"><img class="log" src="../gambar/icon/album.png" style="width: 30px; height: 30px">Album</a></li>
					<li><a href="penyewaan.php"><img class="log" src="../gambar/icon/sewa.png" style="width: 30px; height: 30px">Penyewaan</a></li>
					<li><a href="../logout.php"><img class="log" src="../gambar/icon/logout.png" style="width: 30px; height: 30px">Logout</a></li>
				</ul>
			</div>
			<div class="conten">
				<div class="header">
					<h2>Halaman daftar layanan</h2>
				</div>
					<div class="isi">			
								<div class="tmbh">
										<a href="tambahbusana.php">Tambahkan Data</a>
								</div>
								<br>
								<div class="buttoncari">
									<form action="" method="post">
										<input type="text" name="key" size="40" autofocus placeholder="Masukan kata kunci" autocomplete="off">	
										<button type="submit" name="tomb">Cari</button>
										<a href="busana.php"><img src="../gambar/icon/refresh.png" style="width: 25px; height: 25px"></a></a>
									</form>
								</div>
										<div class="table">
											<table>
												<tr>
													<th>No</th>
													<th>Gambar</th>
													<th>Harga</th>
													<th>Deskripsi</th>
													<th>Aksi</th>
												</tr>

													<?php $x = 1; ?>
													<?php foreach ( $bsn as $row ) : ?>
														<tr>
															<td><?= $x;  ?></td>
															<td><img src="../img/<?php echo $row["busana"];?>" width="60" height="60"></td>
															<td><?= $row["desk_busana"]; ?></td>
															<td>Rp. <?= number_format($row["harga_busana"]); ?></td>
															
															<td>
																<a href="hapusbusana.php?idbus=<?= $row["id_busana"]; ?>" onclick=" return confirm('Apakah Anda Yakin Untuk Menghapus Data?')";>Hapus</a>
																<br><br>
																<a href="ubahbusana.php?idbus=<?= $row["id_busana"]; ?>" onclick=" return confirm('Apakah Anda Yakin Untuk Mengubah Data?')";>Ubah</a>
															</td>
														</tr>

													<?php $x++; ?>
													<?php endforeach; ?>
											</table>
									</div>
					</div>
			</div>
		</div>
</body>
</html>