<?php 
session_start();

if ( !isset($_SESSION["login"])) {
	header("Location: login/login.php");
	exit;
}

require 'functions.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nunung Salon</title>
	<link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo time(); ?>">
</head>
<body>

<!-- header -->
	<div class="header">
		<div class="menu">
			<h2><a href="index.php"><img src="gambar/icon/logo.png" style="width: 120px; height: 120px"></a></h2>
				<ul>
					<li class="active"><a href="index.php">Beranda</a></li>
					<li><a href="albumuser.php">Album</a></li>
					<li><a href="busanauser.php">Layanan</a></li>
					<li><a href="keranjang.php">Keranjang</a></li>
					<li><a href="riwayat.php">Riwayat</a></li>
					<li><a href="logout.php">Keluar</a></li>
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
	<div class="intro"> 
		<h1><img src="gambar/background/bg1.png" style="width: 400px; height: 275px"></h1>
			<ul>
				<li><h2>Hallo !</h2><li>
				<li><h3><?php echo ($_SESSION["customer"]["nama"]) ?></h3></li>
			</ul>
	</div>

	<!-- album -->
	<div class="album">
		<div class="slides">
			<input type="radio" name="r" id="r1" checked>
			<input type="radio" name="r" id="r2">
			<input type="radio" name="r" id="r3">
			<div class="slide s1">
				<img src="gambar/album/1.jpg" alt="">
			</div>
			<div class="slide">
				<img src="gambar/album/2.jpg" alt="">
			</div>
			<div class="slide">
				<img src="gambar/album/3.jpg" alt="">
			</div>
		</div>
		<div class="navigasi">
			<label for="r1" class="bar"></label>
			<label for="r2" class="bar"></label>
			<label for="r3" class="bar"></label>
		</div>
	</div>

		<div class="desc">
			<ul>
				<li><h1><?php echo ($_SESSION["customer"]["nama"]) ?>,</h1><li>
				<li><p>Selamat Datang di <strong>Nunung Salon</strong> "Wedding Organizer".</p></li>
				<li><p>terimakasih sudah mengunjungi Official Website kami, disini anda bisa memilih dan menggunakan beberapa jasa dan layanan yang kami sediakan untuk memenuhi segala kebutuhan asmara anda. Kami menyediakan beberapa layanan seperti Sewa <i>Busana Pengantin, Dekorasi dan Alat Pesta,</i> dan <i>jasa Fotografer</i>. Kami juga memberikan kemudahan dalam pemesanan sehingga kebutuhan yang anda butuhkan dapat terpenuhi disini.</p></li><br>
				<li><p>Salam Cinta dari kami, dan selamat bergabung bersama kami :)</p></li>
			</ul>
		</div>

	<!-- youtube -->
	<div class="youtube">
	    	<center><iframe width="560" height="315" src="https://www.youtube.com/embed/pOVv_JKrI8c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
	    </div>
	    
	</div>
	
	<!-- footer -->
	<div class="footer">
		 <center><h2>COPYRIGHT © 2020 NUNUNG SALON - ALL RIGHTS RESERVED</h2></center>
	</div>

</body>
</html>