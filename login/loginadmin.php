<?php
session_start();

require '../functions.php';

if( isset($_POST["loginadmin"])){

	$email = $_POST["email"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email' and password='$password'");

	//cek username

	$hitung = mysqli_num_rows($result);

        if($hitung===1){
            $_SESSION['signin'] = 'true';            
            header('location:index.php');
            exit;
        } 

        $error = true;
}

?>
		


<!DOCTYPE html>
<html>
<head>
	<title>Masuk | Administrator</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../login.css?v=<?php echo time(); ?>">
</head>
<body>

	<!-- login bar -->
	<div class="sidebar">
			<div class="login">
				<h2>MASUK ADMIN</h2><br><br>
				<?php if(isset($error)) : ?>
<!-- 				<p style="color: red; font-style: italic;">Username / Password salah !</p> -->

			<div class="warning">Nama Pengguna dan Kata Sandi salah !</div><br>
				<?php endif; ?>

			<div class="sigin">
				<form action="" method="post">
					<ul>
						<li>
							<label for="email">Nama Pengguna</label>
							<input type="text" name="email" id="email" placeholder="Masukkan Nama Pengguna..">
						</li>
						<li>
							<label for="password">Kata Sandi</label>
							<input type="password" name="password" id="password" placeholder="Masukkan Kata Sandi..">
						</li>
						<li>
						<button type="submit" name="loginadmin">MASUK</button>
						</li>
					</ul>
					<br>
				<center><a class="link1" href="login.php"> < kembali </a></center>
				</form>
			</div>
		</div>
	</div>

	<!-- desc -->
	<div class="deskripsi">
			<ul>
				<li><h4><img src="../gambar/icon/logo.png" style="width: 120px; height: 120px"></h4></li>
				<li><h2>Selamat Datang Admin</h2></li>
				<li><h1>Nunung Salon</h1></li>
				<br><br>
				<li><p>Terima kasih sudah datang kembali untuk memantau aktifitas pada website ini. Harap login terlebih dahulu menggunakan akun anda dan selamat bekerja, semoga hari anda menyenangkan. Semangat !</p></li>
			</ul>
		
	</div>

</body>
</html>