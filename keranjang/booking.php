<?php 

require '../functions.php';

session_start();

if ( !isset($_SESSION["login"])) {
	header("Location: ../login/loginadmin.php");
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nunung Salon</title>
	<link rel="stylesheet" type="text/css" href="../styles.css?v=<?php echo time(); ?>">
</head>
<body>

	<!-- header -->
	<div class="header">
		<div class="menu">
			<h2><a href="index.php"><img src="../gambar/icon/logo.png" style="width: 120px; height: 120px"></a></h2>
			<ul>
				<li><a href="../index.php">Beranda</a></li>
				<li><a href="../albumuser.php">Album</a></li>
				<li><a href="../busanauser.php">Layanan</a></li>
				<li class="active"><a href="../keranjang.php">Keranjang</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
		</div>

		<div class="medsos">
			<ul>
				<li><a href="https://www.instagram.com/nunungsalon/">
					<img src="../gambar/icon/ig.png" style="width: 15px; height: 15px"></a></li>
					<li><a href="../https://www.youtube.com/channel/UC1kJm1NUx0x1E0dDhBtwfJA">
						<img src="../gambar/icon/yt.png" style="width: 16px; height: 16px"></a></li>
						<li><a href="https://api.whatsapp.com/send?phone=+6285201385401">
							<img src="../gambar/icon/wa.png" style="width: 15px; height: 15px"></a></li>
							<li><a href="https://www.google.com/maps/dir//Nunung+Salon+dan+Busana,+Jl.+Raya+Dieng,+Dukuh+Karanganyar,+Pasurenan,+Batur,+Banjarnegara,+Jawa+Tengah+53456,+Indonesia/@-7.2166021,109.7845136,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2e700d0f488d7de5:0x2745db2094dca02b!2m2!1d109.8545542!2d-7.2166074?hl=id"><img src="../gambar/icon/gps.png" style="width: 15px; height: 15px"></a></li>
						</ul>
					</div>
				</div>

				<!-- Tampilan album -->
				<div class="table">
					<center><table>
						<tr>
							<th>No</th>
							<th>Barang</th>
							<th>Deskripsi</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Sub harga</th>
						</tr>
						<?php $x = 1; ?>
						<?php $total_pembayaran = 0; ?>
						<?php foreach ($_SESSION["keranjang"] as $id_busana => $jumlah) : ?>

							<?php 
							$ambil = $conn->query("SELECT * FROM busanaku WHERE id_busana ='$id_busana'");
							$bagi = $ambil->fetch_assoc(); 
							$subharga = $bagi["harga_busana"]*$jumlah;
							$total_pembayaran+=$subharga;
							?>
							<tr>
								<td><?php echo "$x.";  ?></td>
								<td><img src="../img/<?php echo $bagi["busana"]; ?>" width="60" height="60"></td>
								<td><?php echo $bagi["desk_busana"]; ?></td>
								<td>Rp. <?php echo number_format($bagi["harga_busana"]); ?></td>
								<td><?php echo $jumlah; ?></td>
								<td>Rp. <?php echo number_format($subharga); ?></td>
							</tr>

							<?php $x++; ?>
						<?php endforeach; ?>
							<tfoot>
								<tr>
									<th colspan="5">Total Pembayaran</th>
									<th>Rp. <?php echo number_format($total_pembayaran); ?></th>
								</tr>
							</tfoot>

					</table></center><br><br>
					<form action="" method="post">
						<a href="../keranjang.php"> < Kembali </a>
						<button name="booking">SEWA SEKARANG !</button>
					</form>
				</div>

		<?php  
			if (isset($_POST["booking"])) {

				$id_user = $_SESSION["customer"]["id_user"];
				$tanggal_penyewaan = date("Y-m-d");
				$tota_pembayaran;

				//penyimpanan data ke database penyewaan
			   $conn->query("INSERT INTO penyewaan  

			   				VALUES('','$id_user','$tanggal_penyewaan','$total_pembayaran', 'Belum Bayar')");

				//mendapatkan id penyewaan baru
				 $id_sewanya= $conn->insert_id;

				 foreach ($_SESSION["keranjang"] as $id_busana => $jumlah) {
				 	$conn->query("INSERT INTO sewa 
				 				(id_sewa,id_penyewaan,id_busana,jumlah)
				 				VALUES('','$id_sewanya','$id_busana','$jumlah')");
				 }

				 //barang yang disewa telah di booking maka keranjang kosong
				 unset($_SESSION["keranjang"]);

				 // redirect ke halaman nota 
				 echo "<script>alert('Penyewaan Berhasil Silahkan Lakukan Pembayaran');</script>";
				 echo "<script>location='../keranjang/nota.php?id=$id_sewanya'</script>";

			}

		?>

								<!-- footer -->
				<div class="footer">
					<center><h2>COPYRIGHT © 2020 NUNUNG SALON - ALL RIGHTS RESERVED</h2></center>		
				</div>
	</body>
</html>