<?php 
session_start();

if ( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

$bsn = query("SELECT * FROM busanaku"); 

//Tombol cari di tekan
 if (isset($_POST["tomb"]) ) {

 	$bsn = mencari($_POST["key"]);
 }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nunung Salon | Layanan</title>
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
					<li class="active"><a href="busanauser.php">Layanan</a></li>
					<li><a href="keranjang.php">Keranjang</a></li>
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
				<form class="search-box" action="" method="post">
					<input class="search-txt" type="text" name="key" size="40" autofocus placeholder="Cari disini !" autocomplete="off"></input>
					<button type="submit" name="tomb"><img src="gambar/icon/cari.png" style="width: 15px; height: 15px"></button>					
				</form>
				<div class="reload">
					<a href="busanauser.php"><img src="gambar/icon/refresh.png" style="width: 25px; height: 25px"></a>
				</div>
			</div>


			<!-- Tampilan album -->
			<div class="contenalbum">
				<center><h2>Layanan</h2></center>
					<div class="keterangan">
						<div class="row">
							<?php foreach ( $bsn as $row ) : ?>
									<div class="gambar2">
										<img src="img/<?php echo $row["busana"];?>" style="width: 150px; height: 150px">
										<div class="caption2">
											<h3>Rp. <?php echo number_format($row["harga_busana"]); ?></h3>
											<h4><?php echo $row["desk_busana"];  ?></h4>
											<a href="keranjang/sewa.php?id=<?php echo $row['id_busana'] ?>"><img src="gambar/icon/sewa.png" style="width: 20px; height: 20px"> Keranjang</a>
										</div>
									</div>
							<?php endforeach; ?>

						</div>
					</div>

			</div>

			<!-- footer -->
			<div class="footer">
				 <center><h2>COPYRIGHT © 2020 NUNUNG SALON - ALL RIGHTS RESERVED</h2></center>
			</div>

</body>
</html>