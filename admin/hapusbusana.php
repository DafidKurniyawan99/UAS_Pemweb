<?php
require '../functions.php';
session_start();

//hapus di bagian barang busana

$busana = $_GET["idbus"];

	if (hapusbusana($busana) > 0 ){

		echo "<script>
					alert('Data Berhasil DiHapus');
					document.location.href = 'busana.php';
				 </script>";
	}	
	else {
			echo "<script>
					alert('Data Gagal DiHapus');
					document.location.href = 'busana.php';
				</script>";
	}

?>