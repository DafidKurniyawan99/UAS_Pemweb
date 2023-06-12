<?php 
 require '../functions.php';

session_start();

// if ( !isset($_SESSION["login"])) {
// 	header("Location: ../login/loginadmin.php");
// 	exit;
// }


 $albumku = query("SELECT * FROM album");

 //Tombol cari di tekan
 if (isset($_POST['pencari']) ) {

 	$albumku = cari($_POST["katakunci"]);
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator | Album</title>
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
					<li class="active"><a href="album.php"><img class="log" src="../gambar/icon/album.png" style="width: 30px; height: 30px">Album</a></li>
					<li><a href="penyewaan.php"><img class="log" src="../gambar/icon/sewa.png" style="width: 30px; height: 30px">Penyewaan</a></li>
					<li><a href="../logout.php"><img class="log" src="../gambar/icon/logout.png" style="width: 30px; height: 30px">Logout</a></li>
				</ul>
			</div>
			<div class="conten">
				<div class="header">
					<h2>Halaman Album</h2>
					</div>
						<div class="isi">
								<div class="tmbh">
								<a href="insert.php">Tambahkan Data</a>
							</div>
							<br>
							<form action="" method="post" enctype="multipart/form-data">
								<input type="text" name="katakunci" size="40" autofocus placeholder="Masukan kata kunci" autocomplete="off">	
								<button type="submit" name="pencari"></a>Cari</button>
								<a href="album.php"><img src="../gambar/icon/refresh.png" style="width: 25px; height: 25px"></a>
							</form>
							<div class="table">
									<table>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Gambar</th>
											<th>Deskripsi</th>
											<th>Aksi</th>
										</tr>

											<?php $x = 1; ?>
											<?php foreach ( $albumku as $row ) : ?>
												<tr>
													<td><?= $x;  ?></td>
													<td><?= $row["nama_album"]; ?></td>
													<td><img src="../img/<?php echo $row["gambar_album"];?>" width="60" height="60"></td>
													<td><?= $row["deskripsi_album"]; ?></td>
													<td>
														<a href="hapus.php?id=<?= $row["idalbum"]; ?>" onclick=" return confirm('Apakah Anda Yakin Untuk Menghapus Data?')";>Hapus</a>
														<br><br>
														<a href="ubah.php?id=<?= $row["idalbum"]; ?>" onclick=" return confirm('Apakah Anda Yakin Untuk Mengubah Data?')";>Ubah</a>
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