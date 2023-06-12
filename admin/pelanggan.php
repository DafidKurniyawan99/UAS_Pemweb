<?php 
 require '../functions.php';

session_start();

if ( !isset($_SESSION["login"])) {
	header("Location: ../login/loginadmin.php");
	exit;
}


 $pelanggan = query("SELECT * FROM users");

 if (isset($_POST['search'])) {
 	$pelanggan = search($_POST["kunci"]);
 }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator | Daftar Pengguna</title>
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
					<li class="active"><a href="pelanggan.php"><img class="log" src="../gambar/icon/pelanggan.png" style="width: 30px; height: 30px">Pelanggan</a></li>
					<li><a href="album.php"><img class="log" src="../gambar/icon/album.png" style="width: 30px; height: 30px">Album</a></li>
					<li><a href="penyewaan.php"><img class="log" src="../gambar/icon/sewa.png" style="width: 30px; height: 30px">Penyewaan</a></li>
					<li><a href="../logout.php"><img class="log" src="../gambar/icon/logout.png" style="width: 30px; height: 30px">Logout</a></li>
				</ul>
			</div>
			<div class="conten">
				<div class="header">
					<h2>Halaman daftar pelanggan</h2>
				</div>
					<div class="isi">
							<form action="" method="post">
									<input type="text" name="kunci" size="40" autofocus placeholder="Masukan kata kunci" autocomplete="off">	
									<button type="submit" name="search">Cari</button>
									<a href="busana.php"><img src="../gambar/icon/refresh.png" style="width: 25px; height: 25px"></a></a>
								</form>

								<div class="table">
									<table>
										<tr>
											<th>No</th>
											<th>Username</th>
											<th>Nama</th>
											<th>Telepon</th>
											<th>Alamat</th>
											<th>Aksi</th>
										</tr>

											<?php $x = 1; ?>
											<?php foreach ( $pelanggan as $row ) : ?>
												<tr>
													<td><?= $x;  ?></td>
													<td><?= $row["username"]; ?></td>
													<td><?= $row["nama"]; ?></td>
													<td><?= $row["telfon"]; ?></td>
													<td><?= $row["alamat"]; ?></td>
													<td>
														<a href="hapuspelanggan.php?idpel=<?= $row["id_user"]; ?>" onclick=" return confirm('Apakah Anda Yakin Untuk Menghapus Data?')";>Hapus</a>
													</td>
												</tr>

											<?php $x++; ?>
											<?php endforeach; ?>
									</table>
								</div>
			</div>
		</div>
</body>
</html>