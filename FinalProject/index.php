<?php
	include 'koneksi.php';
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>1708561004_I Dewa Gede Rama Satya</title>
		<link rel="stylesheet" type="text/css" href="CSS/index.css">
	</head>

	<body>
		<nav class="navigasi">
			<ul>
				<li><a href="#section1">HOME</a></li>
				<li><a href="#section2">GALERI</a></li>
				<li><a href="#section3">TENTANG</a></li>
				<li><a href="#section4">PINJAM BUKU</a></li>
				<li><a href="#section5">PROFILE</a></li>
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
			<h1>GALERI</h1>	
			<?php 
				$s_penerbit="";
				$s_keyword="";
				$sort = 'ASC';
				$newsort = 'ASC';
				if (isset($_GET['search']))
				{
					$s_penerbit = $_GET['s_penerbit'];
					$s_keyword = $_GET['s_keyword'];
				}
				if (isset($_GET['order']))
				{
					$order = $_GET['order'];
					$sort = $_GET['sort'];
					
					if ($sort == 'DESC')
					{
						$newsort = 'ASC';
					}
					else
					{
						$newsort = 'DESC';
					}
				}
				else
				{
					$order = 'id_buku';
				}
			?>
			<form method="GET" action="" align="center">
			<h3>Search</h3>
			<select name="s_penerbit" id="s_penerbit">
				<option value="">Filter Penerbit</option>
				<option value="Jenggala Pustaka Utama"
				<?php 
					if ($s_penerbit=="Jenggala Pustaka Utama")
					{
						echo "selected";
					}
				?>>Jenggala Pustaka Utama</option>
				<option value="Pilar Intermedia" 
				<?php 
					if ($s_penerbit=="Pilar Intermedia")
					{
						echo "selected";
					}
				?>>Pilar Intermedia</option>
			</select>

			<input type="text" name="s_keyword" placeholder="Ketik Disini" id="s_keyword" value="<?php echo $s_keyword; ?>">

			<button id="search" name="search">Search</button>
			</form>
		
			<table align="center" cellpadding="20">
				<thead>
					<tr>
						<th>Id Buku</th>
						<th><a href="?order=judul_buku&&sort=<?php echo $newsort; ?>">Judul Buku</a></th>
						<th><a href="?order=pengarang_buku&&sort=<?php echo $newsort; ?>">Pengarang</a></th>
						<th><a href="?order=edisi_buku&&sort=<?php echo $newsort; ?>">Edisi</a></th>
						<th><a href="?order=penerbit&&sort=<?php echo $newsort; ?>">Penerbit</a></th>
						<th><a href="?order=tahun_terbit&&sort=<?php echo $newsort; ?>">Tahun</a></th>
						<th><a href="?order=no_rak&&sort=<?php echo $newsort; ?>">No. Rak</a></th>
						<th><a href="?order=stock_buku&&sort=<?php echo $newsort; ?>">Stock</a></th>
					</tr>       
				</thead>
				
				<tbody>
					<?php
						include "koneksi.php";
						$search_penerbit = '%'.$s_penerbit.'%';
						$search_keyword = '%'.$s_keyword.'%';

						$query = "SELECT * FROM buku WHERE penerbit LIKE ? AND (judul_buku LIKE ? OR pengarang_buku LIKE ? OR edisi_buku LIKE ? OR tahun_terbit LIKE ? OR no_rak LIKE ? OR stock_buku LIKE ?) ORDER BY $order $sort";

						$buku1 = mysqli_prepare($conn, $query) or die(mysqli_error($conn));
						mysqli_stmt_bind_param($buku1, "sssssss", $search_penerbit, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
						mysqli_stmt_execute($buku1);
						$hasil = mysqli_stmt_get_result($buku1);

						$kolom = 3;    
						$i=1;
						if (mysqli_num_rows($hasil) > 0) 
						{
							while ($rows = mysqli_fetch_assoc($hasil)) 
							{
								$id_buku = $rows['id_buku'];
								$judul_buku = $rows['judul_buku'];
								$pengarang_buku = $rows['pengarang_buku'];
								$edisi_buku = $rows['edisi_buku'];
								$penerbit = $rows['penerbit'];
								$tahun_terbit = $rows['tahun_terbit'];
								$no_rak = $rows['no_rak'];
								$stock_buku = $rows['stock_buku']; 
					?>
						<tr>
							<td><?php echo $id_buku; ?></td>
							<td><?php echo $judul_buku; ?></td>
							<td><?php echo $pengarang_buku; ?></td>
							<td><?php echo $edisi_buku; ?></td>
							<td><?php echo $penerbit; ?></td>
							<td><?php echo $tahun_terbit; ?></td>
							<td><?php echo $no_rak; ?></td>
							<td><?php echo $stock_buku; ?></td>
						</tr>
						
						<?php
							} 
						} else 
						{ ?>
						<tr>
							<td colspan="9" align="center">Buku Tidak Ditemukan!</td>
						</tr>
						<?php }
						?>
				</tbody>
			</table>
		</div>		
		<hr>
		<div id="section3">
			<h1>TENTANG</h1>
			<p align="justify"><font size="4"><b>VISI</b></font></p>
			<p><font size="2">Universitas Udayana Menjadi Universitas yang Unggul, Mandiri, dan Berbudaya.</font></p>
		</div>
		<hr>
		<div id="section4">
		   <h1>PINJAM BUKU</h1>
		   <form method="POST" action="pinjam.php">
				<label>Nama Peminjam</label><br>
				<input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['id_user'];?>">
				<input type="text" id="nama_pinjam" name="nama_pinjam" placeholder="Nama Peminjam" value="<?php echo $_SESSION['username'];?>"><br>
				<label>ID Buku</label><br>
				<input type="text" id="id_buku" name="id_buku" placeholder="ID Buku"></td><br>
				<label>Tanggal Pinjam</label><br>
				<input type="date" id="tgl_pinjam" name="tgl_pinjam"></td><br>
				<label>Tanggal Kembali</label><br>
				<input type="date" id="tgl_kembali" name="tgl_kembali"></td><br>
				<input type="submit" id="pinjam" name="pinjam" value="Submit"></td><br>
		   </form>
		</div>
		<hr>
		<div id="section5">
			<h1>PROFILE</h1>
			<form method="POST" action="edit_profil.php">
				<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'];?>">
				<input type="text" name="nama" placeholder="Nama Anda">
				<input type="radio" name="jk" value="Laki-Laki">Laki-Laki
				<input type="radio" name="jk" value="Perempuan">Perempuan
				<input type="text" name="no_hp" placeholder="Nomor Telp"></td>
				<textarea name="alamat" placeholder="Alamat"></textarea></td>
				<input type="text" name="user" placeholder="Username"></td>
				<input type="password" name="pass" placeholder="Password"></td>
				<input type="submit" name="simpan" value="Simpan"></td>
			</form>
		</div>
		<div id="footer">
			<p align="center"><font size="2"><b>©Copyright 2020. All Right Reserved <br> I Dewa Gede Rama Satya</b></font></p>
		</div>
	</body>
</html>