<?php
require '../functions.php';
session_start();

//hapus di bagian barang busana

$id_album = $_GET["id"];

	if (hapus($id_album) > 0 ){

		echo "<script>
					alert('Data Berhasil DiHapus');
					document.location.href = 'album.php';
				 </script>";
	}	
	else {
			// echo "<script>
			// 		alert('Data Gagal DiHapus');
			// 		document.location.href = 'rias.php';
			// 	</script>";
		echo "wwwww";
	}

?>