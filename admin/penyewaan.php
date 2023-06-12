<?php 
 require '../functions.php';

session_start();

if ( !isset($_SESSION["login"])) {
	header("Location: ../login/loginadmin.php");
	exit;
}

 
 $penyewaan = query("SELECT * FROM penyewaan JOIN users ON penyewaan.id_user = users.id_user");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator | Halaman Sewa</title>
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
					<h2>Halaman Penyewaan</h2>
				</div>
					<div class="isi">
							<div class="table">
								<table>
									<tr>
										<th>No</th>
										<th>Username</th>
										<th>Nama</th>
										<th>Telepon</th>
										<th>Alamat</th>
										<th>Tanggal</th>
										<th>Total</th>
										<th>Aksi</th>
									</tr>

										<?php $x = 1; ?>
										<?php foreach ( $penyewaan as $row ) : ?>
											<tr>
												<td><?= $x;  ?></td>
												<td><?= $row["nama"]; ?></td>
												<td><?= $row["telfon"]; ?></td>
												<td><?= $row["alamat"]; ?></td>
												<td><?= $row["tgl_penyewaan"]; ?></td>
												<td>Rp. <?= number_format($row["total"]); ?></td>
												<td><?php echo $row["status"]; ?></td>
												<td>
													<a href="detail.php?halaman=detail&id=<?php echo $row['id_penyewaan'] ?>">Detail</a>
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