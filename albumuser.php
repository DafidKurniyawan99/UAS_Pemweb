<?php 
session_start();

if ( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

$albumku = query("SELECT * FROM album"); 

//Tombol cari di tekan
 if (isset($_POST['pencari']) ) {

 	$albumku = cari($_POST["katakunci"]);
 }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nunung Salon | Album</title>
	<link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo time(); ?>">
</head>
<body>

<!-- header -->
	<div class="header">
		<div class="menu">
			<h2><a href="index.php"><img src="gambar/icon/logo.png" style="width: 120px; height: 120px"></a></h2>
				<ul>
					<li><a href="index.php">Beranda</a></li>
					<li class="active"><a href="albumuser.php">Album</a></li>
					<li><a href="busanauser.php">Layanan</a></li>
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
			<div class="contenalbum">
				<center><h2>Album Nunung Salon</h2></center>
					<div class="keterangan">
						<div class="row">
							<?php foreach ( $albumku as $row ) : ?>
								<div class="col-md-5"> 
									<div class="gambar">
										<img src="img/<?php echo $row["gambar_album"];?>" style="width: 250px; height: 250px">
										<div class="caption">
											<h3><?php echo $row["nama_album"]; ?></h3>
											<h5><?php echo $row["deskripsi_album"];  ?></h5>
										</div>	
									</div>
								</div>
							<?php endforeach; ?>

						</div>
					</div>
			</div>

</body>
</html>