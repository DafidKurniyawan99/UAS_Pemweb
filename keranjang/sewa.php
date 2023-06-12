<?php 
session_start();

$id_produk = $_GET['id'];

	//menambah jumlah barang yang akan disewa jika ingin menyewa busana yang sama lebih dari 1

		if (isset($_SESSION['keranjang'][$id_produk]) ) {
			$_SESSION['keranjang'][$id_produk]+=1;	
		}
		else {
			$_SESSION['keranjang'][$id_produk] = 1;
		}
		
	// menuju ke keranjang penyewaan

	echo "<script>alert('Layanan Telah ditambahkan ke keranjang')</script>";
	echo "<script>location='../busanauser.php'</script>";
?>