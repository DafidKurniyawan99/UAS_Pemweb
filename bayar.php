<?php 
session_start();

if ( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

$idbayaran = $_GET['id'];
	$catch = $conn->query("SELECT * FROM penyewaan WHERE id_penyewaan ='$idbayaran' ");
	$row = $catch->fetch_assoc();

	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nunung Salon | Pembayaran</title>
	<link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo time(); ?>">
</head>
<body>

	<!-- header -->
	<div class="header">
		<div class="menu">
			<h2><a href="index.php"><img src="gambar/icon/logo.png" style="width: 120px; height: 120px"></a></h2>
			<ul>
				<li><a href="index.php">Beranda</a></li>
				<li><a href="albumuser.php">Album</a></li>
				<li><a href="busanauser.php">Layanan</a></li>
				<li><a href="keranjang.php">Keranjang Sewa</a></li>
				<li><a href="riwayat.php">Riwayat</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>

		<div class="medsos">
			<ul>
				<li><a href="https://www.instagram.com/nunungsalon/">
					<img src="gambar/icon/ig.png" style="width: 15px; height: 15px"></a></li>
					<li><a href="https://www.youtube.com/channel/UC1kJm1NUx0x1E0dDhBtwfJA">
						<img src="gambar/icon/yt.png" style="width: 16px; height: 16px"></a></li>
						<li><a href="https://api.whatsapp.com/send?phone=+6285201385401">
							<img src="gambar/icon/wa.png" style="width: 15px; height: 15px"></a></li>
							<li><a href="https://www.google.com/maps/dir//Nunung+Salon+dan+Busana,+Jl.+Raya+Dieng,+Dukuh+Karanganyar,+Pasurenan,+Batur,+Banjarnegara,+Jawa+Tengah+53456,+Indonesia/@-7.2166021,109.7845136,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2e700d0f488d7de5:0x2745db2094dca02b!2m2!1d109.8545542!2d-7.2166074?hl=id"><img src="gambar/icon/gps.png" style="width: 15px; height: 15px"></a></li>
						</ul>
					</div>
				</div>
				<div class="cari">
					<form class="search-box" action="" method="post" enctype="multipart/form-data">
						<input class="search-txt" type="text" name="katakunci" size="40" autofocus placeholder="Cari disini !" autocomplete="off"></input>
						<button type="submit" name="pencari"><img src="gambar/icon/cari.png" style="width: 15px; height: 15px"></button>					
					</form>
					<div class="reload">
						<a href="albumuser.php"><img src="gambar/icon/refresh.png" style="width: 25px; height: 25px"></a>
					</div>
				</div>
				<!-- body -->
				<!-- Tampilan album -->

				<div class="contenalbum2">
					<h2>Transaksi pembayaran</h2>
						<div class="total"><h3>Total Tagihan : Rp. <?php echo number_format($row["total"]) ?> </h3></div>
						<div class="bayar">
							<form method="post" enctype="multipart/form-data">
								<label for="nama">Nama Penyetor</label>
									<input type="text" name="nama" id="nama" placeholder="Enter nama.." required>
								<label for="bank">Bank</label><br>
									<input type="text" name="bank" id="bank" placeholder="Enter name.." required>
								<label for="jumlah">Jumlah</label>
									<input type="text" name="jumlah" id="jumlah" placeholder="Enter Jumlah.." required>
								<label for="alamat">Alamat</label>
									<input type="text" name="alamat" id="alamat" placeholder="Enter alamat.." required>
								<label for="foto">Bukti Slip</label>
									<input type="file" name="foto" id="foto" placeholder="Enter foto.." required>

								<button type="submit" name="kirim">Kirim</button>
								<center><a class="link1" href="riwayat.php"> kembali </a></center>
									<br><br>	
							</form>
						</div>
				</div>
		<?php 
			 if(isset($_POST['kirim'])) {

					$namaFile = $_FILES['foto']['name'];
					$ukuranFile = $_FILES['foto']['size'];
					$error  = $_FILES['foto']['error'];
					$tmpName = $_FILES['foto']['tmp_name'];

					//cek memilih gambar atau tidak
					if ($error === 4) {
						echo "<script>
								alert('Silahkan Pilih Gambar Terlebih dahulu');
							 </script>";
						return false;
					}

					//pemastian gambar yang di upload bukan yang lain
					$ekstensiGambarValid = ['jpg','jpeg','png'];
					$ekstensiGambar = explode('.', $namaFile);
					$ekstensiGambar = strtolower(end($ekstensiGambar) );

					if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
						echo "<script>
								alert('Pastikan Anda Mengupload File Berupa Gambar');
							 </script>";
						return false;	
					}
					// penyortiran ukuran
					if ($ukuranFile > 2000000) {
					 	echo "<script>
								alert('Gambar Yang Anda Upload Melebihi 2MB Coba Ganti Ke Ukuran Yang Lebih Kecil');
							 </script>";
						return false;
					 } 

					 // agar nama tidak terduplikat
					 $newname = uniqid(); 
					 $newname .= '.';
					 $newname .= $ekstensiGambar;
					 //siap untuk mengupload gambar
					 move_uploaded_file($tmpName, 'bukti slip/' . $newname);


					$nama = $_POST["nama"];
					$metode = $_POST["bank"];
					$jumlah = $_POST["jumlah"];
					$tanggal = date("Y-m-d");

					$conn->query("INSERT INTO bayar VALUES('','$idbayaran','$nama','$metode','$jumlah','$tanggal','$newname')");

					$conn->query("UPDATE penyewaan SET status='Terbayar' 
								WHERE id_penyewaan ='$idbayaran'");
					echo "<script>
								alert('Terimakasih telah menyelesaikan transaksi');
						  </script>";
			 		echo "<script>
							location='riwayat.php';
						  </script>";
			 }
		?>


</body>
</html>