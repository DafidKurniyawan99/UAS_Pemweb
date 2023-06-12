<?php
error_reporting(0);

require '../functions.php';

session_start();

if ( !isset($_SESSION["login"])) {
	header("Location: ../login/loginadmin.php");
	exit;
}

//Pengambilan data
$id =$_GET["id"];

// tombol sudah dipencet atau belum
	if ( isset($_POST['edit']) ){ 


		// Konfirmasi Keberhasilan
		if (edit($_POST) > 0) {
				echo "<script>
						alert('Data Berhasil Diedit');
						document.location.href = 'album.php';
					  </script>";

		}	
		else {
				echo "<script>
						alert('Data Gagal Diedit');
						document.location.href = 'ubah.php';
					</script>";
				
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator | Ubah Album</title>
	<link rel="stylesheet" type="text/css" href="../admin.css?v=<?php echo time(); ?>">
</head>
<body>
		<div class="wrap">
			<div class="sidebar">
				<h2>Administrator</h2>
					<img class="administrator" src="../gambar/icon/ad.png" style="width: 100px; height: 100px">
						<ul>
							<li><a href="indexadmin.php"><img class="log" src="../gambar/icon/home.png" style="width: 30px; height: 30px">Beranda</a></li>
							<li><a href="barang.php"><img class="log" src="../gambar/icon/menu.png" style="width: 30px; height: 30px">Layanan</a></li>
							<li><a href="pelanggan.php"><img class="log" src="../gambar/icon/pelanggan.png" style="width: 30px; height: 30px">Pelanggan</a></li>
							<li class="active"><a href="album.php"><img class="log" src="../gambar/icon/album.png" style="width: 30px; height: 30px">Album</a></li>
							<li><a href="penyewaan.php"><img class="log" src="../gambar/icon/sewa.png" style="width: 30px; height: 30px">Penyewaan</a></li>
							<li><a href="logout.php"><img class="log" src="../gambar/icon/logout.png" style="width: 30px; height: 30px">Logout</a></li>
						</ul>
			</div>
			<div class="conten">
				<div class="header">
					<h2>Halaman perubahan album</h2>
				</div>
					<div class="isi">
							<form action="" method="post" enctype="multipart/form-data">
								<?php  $albm = query("SELECT * FROM album WHERE idalbum = $id")[0];?>
								
								<input type="hidden" name="id" value="<?= $albm['idalbum'] ?>">
								<input type="hidden" name="gambarold" value="<?= $albm['gambar_album'] ?>">
								<ul>
									<li>
										<label for="nama_album">Nama</label>
										<input type="text" name="nama_album" id="nama_album" required 
										value="<?= $albm["nama_album"]?>">
									</li>
									<li>
										<label for="gambar_album">Gambar</label>
										<img src="../img/<?= $albm['gambar_album']; ?>" width="50">
										<input type="file" name="gambar_album" id="gambar_album">
									</li>
									<li>
										<label for="deskripsi_album">Keterangan</label>
										<input type="text" name="deskripsi_album" id="deskripsi_album" required 
										value="<?= $albm["deskripsi_album"]?>">
									</li>
									<li><br>
										<button type="submit" name="edit">Ubah!</button>
										<a href="album.php">< Kembali</a>
									</li>
								</ul>
							</form>
					</div>
			</div>
		</div>
</body>
</html>