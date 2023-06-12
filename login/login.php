<?php 
session_start();

require '../functions.php';

if( isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

	//cek username

	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		$_SESSION["customer"] = $row;

		if (password_verify($password, $row["password"]) ) {

			$_SESSION["login"] = true;

			header("Location:../index.php");
			exit;
		}
	}
	$error = true;
}
?>
		


<!DOCTYPE html>
<html>
<head>
	<title>Masuk | Pengguna</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../login.css?v=<?php echo time(); ?>">
</head>
<body>

	<!-- login bar -->
	<div class="sidebar">
			<div class="login">
				<h2>MASUK</h2><br><br>
				<?php  if (isset($error)) :?>
				<!-- 	<p style="background: #fff""color: red;""border:1px;">Username dan Password salah !</p> -->
			<div class="warning">Nama Pengguna dan Kata Sandi salah !</div><br>
				<?php endif; ?>

			<div class="sigin">
				<form action=" " method="post">
					<label for="username">Nama Pengguna</label>
					<input type="text" name="username" id="username" placeholder="Masukkan Nama Pengguna..">
					<br>
					<label for="password">Kata Sandi</label>
					<input type="Password" name="password" id="password" placeholder="Masukkan Kata Sandi..">
				<button type="submit" name="login">MASUK</button>
				<br><br>
				<center><a class="link" href="register.php">BUAT AKUN</a></center>
				<br>
				<center><a class="link1" href="../login/loginadmin.php">Masuk sebagai <strong>Admin ?</strong></a></center>
				</form>
			</div>
		</div>
	</div>

	<!-- desc -->
	<div class="deskripsi">
			<ul>
				<li><h4><img src="../gambar/icon/logo.png" style="width: 120px; height: 120px"></h4></li>
				<li><h2>Selamat Datang di</h2></li>
				<li><h1>Nunung Salon</h1></li>
				<br><br>
				<li><p>Kami adalah salah satu Salon Kecantikan yang menyediakan jasa Rias Pengantin dari daerah Batur, Banjarnegara, Jawa Tengah.  Melayani Rias Pengantin, sewa alat pesta dan dekorasi untuk acara pernikahan serta menyediakan berbagai macam Oleh-oleh khas Dieng Wonosobo yang berada di Desa Pasurenan, Kecamatan Batur RT06/RW04. Kami siap melayani anda dengan segala kebutuhan yang anda inginkan, suatu kehormatan kami bisa membantu dan memberikan pengalaman yang lebih baik untuk anda.</p></li>
			</ul>
		
	</div>

</body>
</html>