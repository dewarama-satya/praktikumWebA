<!DOCTYPE html>
<html>
	<head>
		<title>1708561004_I Dewa Gede Rama Satya</title>
		<link rel="stylesheet" type="text/css" href="CSS/login.css">
	</head>
	<body>
		<?php 
			include "koneksi.php";
			if (isset($_GET['pesan'])) {
				if ($_GET['pesan']=="gagal_login") {
					echo "<script type='text/javascript'>alert('Terjadi Kesalahan');</script>";
				}
			}
		?>
		
		<nav class="header">
			<ul>
				<li>Sudah mempunyai akun? Silahkan <a href="login_page.php">login</a> terlebih dahulu</li>
				<li>Belum mempunyai akun? Silahkan <a href="signup.php">signup</a> untuk melanjutkan</li>
			</ul>
		</nav>
		
		<h1>SELAMAT DATANG</h1>
		<div id="login_box">
			<h2>LOG IN</h2>
			<form method="POST" action="login.php">
				<label>Username</label><br>
				<input type="text" name="username" placeholder="Username"><br>
				<label>Password</label><br>
				<input type="password" name="pass" placeholder="Password"><br>
				<input type="submit" name="masuk" value="Login">
			</form>
		</div>
		<div id="footer">
			<p align="center"><font size="2"><b>©Copyright 2020. All Right Reserved <br> I Dewa Gede Rama Satya</b></font></p>
		</div>
	</body>
</html>