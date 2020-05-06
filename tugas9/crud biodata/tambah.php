<html>
	<head>
		<title>1708561004_I Dewa Gede Rama Satya</title>
	</head>

	<body style="background-color:powderblue;">
		<a href="index.php">Beranda</a>
		<br/><br/>

		<form action="tambah.php" method="post" name="form1">
			<table width="25%" border="0">
				<tr> 
					<td>Nama</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr> 
					<td>Email</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr> 
					<td>No. HP</td>
					<td><input type="text" name="mobile"></td>
				</tr>
				<tr> 
					<td></td>
					<td><input type="submit" name="Submit" value="Tambah"></td>
				</tr>
			</table>
		</form>

		<?php
			if(isset($_POST['Submit'])) {
				$name = $_POST['name'];
				$email = $_POST['email'];
				$mobile = $_POST['mobile'];

				include_once("koneksi.php");

				$result = mysqli_query($mysqli, "INSERT INTO users(name,email,mobile) VALUES('$name','$email','$mobile')");

				echo "User baru sudah berhasil ditambahkan. <a href='index.php'>Lihat Daftar User</a>";
			}
		?>
	</body>
</html>