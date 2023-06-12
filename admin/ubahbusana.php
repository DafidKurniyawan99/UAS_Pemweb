<?php
error_reporting(0);

require '../functions.php';

session_start();

if ( !isset($_SESSION["login"])) {
	header("Location: ../login/loginadmin.php");
	exit;
}

//Pengambilan data
$id =$_GET["idbus"];

// tombol sudah dipencet atau belum
	if ( isset($_POST['edit']) ){ 


		// Konfirmasi Keberhasilan
		if (ubahbusan($_POST) > 0) {
				echo "<script>
						alert('Data Berhasil Diedit');
						document.location.href = 'busana.php';
					  </script>";

		}	
		else {	
				echo "<script>
						alert('Data Gagal Diedit');
						document.location.href = 'ubahbusana.php';
					</script>";
				
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator | Ubah Layanan</title>
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
					<li><a href="penyewaan.php"><img class="log" src="../gambar/icon/sewa.png" style="width: 30px; height: 30px">Penyewaan</a></li>
					<li><a href="logout.php"><img class="log" src="../gambar/icon/logout.png" style="width: 30px; height: 30px">Logout</a></li>
				</ul>
			</div>
			<div class="conten">
				<div class="header">
					<h2>Halaman perubahan layanan</h2>
				</div>
					<div class="isi">
							<form action="" method="post" enctype="multipart/form-data">
								<?php  $busan = query("SELECT * FROM busanaku WHERE id_busana = $id")[0];?>
								
								<input type="hidden" name="id" value="<?= $busan['id_busana'] ?>">
								<input type="hidden" name="oldbusana" value="<?= $busan['busana'] ?>">
								<ul>
									<li>
										<label for="busana">Gambar</label>
										<img src="../img/<?= $busan['busana']; ?>" width="50">
										<input type="file" name="busana" id="busana">
									</li>
									<li>
										<label for="harga_busana">Harga</label>
										<input type="text" name="harga_busana" id="harga_busana" required 
										value="<?= $busan["harga_busana"]?>">
									</li>
									<li>
										<label for="desk_busana">Keterangan</label>
										<input type="text" name="desk_busana" id="desk_busana" required 
										value="<?= $busan["desk_busana"]?>">
									</li>
									<li><br>
										<button type="submit" name="edit">Ubah!</button>
										<a href="busana.php">< Kembali</a>
									</li>
								</ul>
							</form>
					</div>
			</div>
		</div>
</body>
</html>