<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../login.css?v=<?php echo time(); ?>">
</head>
<body>
<?php 
	require '../functions.php';
		
	if( isset($_POST["submit"])){
		
		if (registrasi($_POST) > 0) {
				echo "<script>
					alert('User Baru Ditambahkan!');
					</script>";
				echo "<script>
						location='login.php';
					</script>";
		}
			
		else{

				echo mysqli_error($conn);
		}		
	}	
?>
	<div class="loginbox">
	<img src="../gambar/icon/logo.png" style="width: 120px; height: 120px" class="logo">
		<h1>BUAT AKUN</h1>
		<form action="" method="post">
			<label for="username">Nama Pengguna</label>
				<input type="text" name="username" id="username" placeholder="Masukkan Nama Pengguna .." required>
			<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" placeholder="Masukkan Nama .." required>
			<label for="telfon">Nomor Telepon</label>
				<input type="text" name="telfon" id="telfon" placeholder="Masukkan Nomor Telepon .." required>
			<label for="alamat">Alamat</label>
				<input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat.." required>
			<label for="password">Kata Sandi</label>
				<input type="Password" name="password" id="password" placeholder="Masukkan Kata Sandi .." required>
			<label for="Password2">Konfirmasi Kata Sandi</label>
				<input type="Password" name="password2" id="password2" placeholder="Masukkan Kata Sandi..">
			<button type="submit" name="submit">DAFTAR</button>
				<br><br>
				<center><a class="link2" href="../login/login.php">Kembali</a></center>
				<br><br>
		</form>


</body>
</html>