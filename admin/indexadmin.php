<?php 
session_start();

// if ( !isset($_SESSION["login"])) {
// 	header("Location: ../login/loginadmin.php");
// 	exit;
// }

require '../functions.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../admin.css?v=<?php echo time(); ?>">
</head>
<body>
		<div class="wrap">
			<div class="sidebar">
				<h2>Administrator</h2>
				<img class="administrator" src="../gambar/icon/ad.png" style="width: 100px; height: 100px">
				<ul>
					<li class="active"><a href="indexadmin.php"><img class="log" src="../gambar/icon/home.png" style="width: 30px; height: 30px">Beranda</a></li>
					<li><a href="busana.php"><img class="log" src="../gambar/icon/menu.png" style="width: 30px; height: 30px">Layanan</a></li>
					<li><a href="pelanggan.php"><img class="log" src="../gambar/icon/pelanggan.png" style="width: 30px; height: 30px">Pelanggan</a></li>
					<li><a href="album.php"><img class="log" src="../gambar/icon/album.png" style="width: 30px; height: 30px">Album</a></li>
					<li><a href="penyewaan.php"><img class="log" src="../gambar/icon/sewa.png" style="width: 30px; height: 30px">Penyewaan</a></li>
					<li><a href="../logout.php"><img class="log" src="../gambar/icon/logout.png" style="width: 30px; height: 30px">Logout</a></li>
				</ul>
			</div>
			<div class="conten">
				<div class="header">
					<h2>Selamat Datang Admin</h2>
				</div>
					<div class="adminkata">
						<center><h5>Selamat Datang di Sistem Layanan Jasa Wedding Organizer <strong>Nunung Salon</strong>. Pada halaman admin ini anda dapat mengatur semua aktifitas keluar masuknya data dari website Nunung Salon. Terimakasih telah menjadi bagian dari kami :)  </h5></center>
					</div>
			</div>
		</div>
</body>
</html>