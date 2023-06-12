<?php  
session_start();

//Hapus di bagian album
$id_busana = $_GET["idkeranjang"];

unset($_SESSION["keranjang"][$id_busana]);

		echo "<script>
				alert('Barang Berhasil DiHapus');
			  </script>";
		echo "<script>
				location='../keranjang.php';
			  </script>";
 
?>
