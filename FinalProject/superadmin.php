<?php 
    include 'koneksi.php';
    session_start();
    if ($_SESSION['status']=="")
	{
        header("location:index.php?pesan=gagal_login");
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>1708561004_I Dewa Gede Rama Satya</title>
		<link rel="stylesheet" type="text/css" href="CSS/superadmin.css">
	</head>
	<body>
		<nav class="navigasi">
			<ul>
				<li><a href="#section1">HOME</a></li>
				<li><a href="#section2">REKRUT ADMIN</a></li>
				<li><a href="#section3">DAFTAR USER & ADMIN</a></li>
				<li><a href="#section4">STOCK BUKU</a></li>
				<li><a href="logout.php">LOGOUT</a></li>
				
			</ul>
		</nav>

		<div id="section1">
			<img src="image/perpus.jpg">
			<h1>SELAMAT DATANG</h1>
			<p style="text-align: justify;">Saya ucapkan terima kasih atas kunjungan Anda ke website ini. Pada website ini, akan memuat beberapa informasi mengenai perpustakaan milik Universitas Udayana.</p>
		</div>
		<hr>
		<div id="section2">
			<h1>REKRUT ADMIN</h1>
			<form method="POST" action="tambah_admin.php">
				<input type="text" name="nama" placeholder="Nama">
				<input type="radio" name="jk" value="Laki-Laki">Laki-Laki
				<input type="radio" name="jk" value="Perempuan">Perempuan
				<input type="text" name="no_hp" placeholder="Nomor Telp"></td>
				<textarea name="alamat" placeholder="Alamat"></textarea></td>
				<input type="text" name="user" placeholder="Username"></td>
				<input type="password" name="pass" placeholder="Password"></td>
				<input type="submit" name="daftar" value="Daftar"></td>
			</form>
		</div>
		<hr>
		<div id="section3">
			<h1>DAFTAR USER & ADMIN</h1>
			<table align="center">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>No. HP</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
							include "koneksi.php";

							$query = mysqli_query($conn, "SELECT nama, jenis_kelamin, no_hp, status FROM user WHERE status IN ('Admin','User')") or die(mysqli_error($conn));
							if (mysqli_num_rows($query) > 0) {
								while ($rows = mysqli_fetch_assoc($query)) {
									$nama = $rows['nama'];
									$jk = $rows['jenis_kelamin'];
									$no_hp = $rows['no_hp'];
									$status = $rows['status'];?>

								<tr>
									<td><?php echo $nama; ?></td>
									<td><?php echo $jk; ?></td>
									<td><?php echo $no_hp; ?></td>
									<td><?php echo $status; ?></td>
								</tr>
							<?php  } } else { ?>
							<tr>
								<td colspan="4" align="center">Error!</td>
							</tr>
							<?php } ?>
					</tr>
				</tbody>
			</table>
		</div>
		<hr>
		<div id="section4">
			<h1>STOCK BUKU</h1>
			<table align="center">
				<thead>
					<tr>
						<th>ID Buku</th>
						<th>Judul Buku</th>
						<th>Pengarang</th>
						<th>Penerbit</th>
						<th>Stock Buku</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
							include "koneksi.php";

							$query = mysqli_query($conn, "SELECT id_buku, judul_buku, pengarang_buku, penerbit, stock_buku FROM buku") or die(mysqli_error($conn));
							if (mysqli_num_rows($query) > 0) {
								while ($rows = mysqli_fetch_assoc($query)) {
									$id = $rows['id_buku'];
									$judul = $rows['judul_buku'];
									$pengarang = $rows['pengarang_buku'];
									$penerbit = $rows['penerbit'];
									$stock = $rows['stock_buku']?>

								<tr>
									<td align="center"><?php echo $id; ?></td>
									<td><?php echo $judul; ?></td>
									<td><?php echo $pengarang; ?></td>
									<td><?php echo $penerbit; ?></td>
									<td align="center"><?php echo $stock; ?></td>
								</tr>
							<?php  } } else { ?>
							<tr>
								<td colspan="4" align="center">Buku Tidak Ditemukan!</td>
							</tr>
							<?php } ?>
					</tr>
				</tbody>
			</table>
		</div>
		<div id="footer">
			<p align="center"><font size="2"><b>©Copyright 2020. All Right Reserved <br> I Dewa Gede Rama Satya</b></font></p>
		</div>
	</body>
</html>