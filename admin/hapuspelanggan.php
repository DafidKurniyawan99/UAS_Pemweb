<?php

require '../functions.php';
session_start();

//hapus di bagian pelanggan
$id_pelanggan = $_GET["idpel"];

	if (hapuspl($id_pelanggan) > 0 ){

		echo "<script>
					alert('Data Berhasil DiHapus');
					document.location.href = 'pelanggan.php';
				 </script>";
	}	
	else {
			echo "<script>
					alert('Data Gagal DiHapus');
					document.location.href = 'pelanggan.php';
				</script>";
			
	}
?>