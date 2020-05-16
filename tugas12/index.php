<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    $user=$_SESSION["user"];
    $conn = mysqli_connect("localhost","root","","tugas12_prakpbo");
    $result = mysqli_query($conn, "SELECT * FROM buku ");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>1708561004_I Dewa Gede Rama Satya</title>
		<style>
			#batas
			{
				margin: 0 auto;
				width: 1000px;
				height: auto;
			}
			#atas
			{
				width: 700px;
				height: 250px;
				float: right;
				position: relative;
				box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
			}
			#atas p
			{
				position: absolute;
				color: white;
				
				font-size: 20px;
				top: 8px;
				right: 16px;
			}
			#sidebar
			{
				float: left;
				width: 300px;
				height:auto;
			}
			#sidebar img
			{
				width: 300px;
			}
			#menu
			{
				margin-top: 7px;
				width: 700px;
				height:43px;
				float: right;
				box-shadow: 1px 2px 10px rgba(0, 0, 0, .5);
			}
			#menu ul
			{
				border-radius: 3px;
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color: #5AC8FF;
			}
			#menu li
			{
				float: left;
			}
			#menu li a:hover
			{
				background-color: #5AC8FF;
			}
			#menu li a
			{
				display: block;
				color: white;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
			}
			#isi
			{
				margin-top: 8px;
				margin-bottom: 8px;
				width: 700px;
				height: 550px;
				float: right;
				box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
				background: white;
				border-radius: 8px;
			}
			#isi h1
			{
				margin-left: 10px;
			}
			#isi p
			{
				margin-left: 25px;
				margin-right: 10px;
			}
			.populer p
			{
				color: white;
				padding: 10px;
				text-align: center;
			}
			#sidebar ul
			{
				border-radius: 8px;
				box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
				list-style-type: none;
				margin: 0;
				padding: 0;
				width: 250px;
				background-color: #ffffff;
				margin-left: 30px;
			}
			#sidebar li a
			{
				display: block;
				color: #000;
				padding: 8px 16px;
				border-bottom-style: dotted;
				text-decoration: none;
				border-bottom-color: #5AC8FF;
				border-bottom-width: thin;				
			}
			#sidebar li a:hover
			{
				background-color: #5AC8FF;
				color: white;
			}
			.galeri
			{
				position: relative;
				margin-left: 25px;
				display: inline-block;
			}
			.galeri p a
			{
				color: black;
				text-decoration: none;
			 
			}
			.galeri img
			{
				margin-right: 7px;
				margin-left: 10px;
				height: 220px;
				width: 170px;
			}
			.button
			{
				background-color: #5AC8FF;
				border: none;
				color: white;
				padding: 15px 20px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 12px;
				border-radius: 10px;
				margin-left: 17px;
			}
			#footer{
				width: auto;
				height: 70px;
				background-color: #5AC8FF;
				border-radius: 8px;
				box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
			}
			#footer p {
				color:white;
				padding: 30px ;
				text-align: center;
			}
			#clear{
				clear: both;
			}
			.populer{
				background-color: #5AC8FF;
				width: 250px;
				margin-left: 30px;
				border-radius: 8px;
				box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
			}  
		</style>
	</head>
	
	<body id="<?= $user?>">
		<div id="batas">
			<div id="atas">
				<img src="gambar/perpus.jpg" style="height: 250px; width: 700px;">
			</div>
			<div id="sidebar">
				<img src="gambar/logo.png" alt="" style="height: auto; width: 240px;">
				<div class="populer">
					<p>Buku Pilihan</p>
				</div>
					<a href="gambar/bisnis.jpg">Ekonomi Bisnis Internasional</a>
					<hr>
					<a href="gambar/mikro.jpg">Ekonomi Mikro</a>
					<hr>
					<a href="gambar/pemasaran.jpg">Manajemen Pemasaran</a>
					<hr>
					<a href="gambar/perekonomian.jpg">Perekonomian Indonesia</a>
					<hr>				
			</div>
			<div id="menu">
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="tentang.php">TENTANG</a></li>
					<li><a href="galeri.php">GALERI</a></li>
					<li><a href="kontak.php">KONTAK</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
			</div>
			<div id="isi">
				<h1>SELAMAT DATANG</h1>
				<p style="text-align: justify;">Saya ucapkan terima kasih atas kunjungan Anda ke website ini. Pada website ini, akan memuat beberapa informasi mengenai perpustakaan milik Universitas Udayana.</p>
				<h1><center>GALERI</center></h1>				
				<?php 
                    $filter="";
                    $sort="";
                    // if(isset($_POST['search'])){
                    //     $filter=$_POST['filter'];
                    //     $sort=$_POST['sort'];
                    // }
                ?>
				<table>
					<form action="" method="POST">
						<tr>
							<td>Filter: 
								<select name="filter" id="filter">
									<option value=""></option>
									<optgroup label="Tahun">
										<option value="2013">2013</option>
									</optgroup>
								</select>
							</td>
							<td>Urutkan: 
								<select name="sort" id="sort">
									<option value=""></option>
									<option value="judulASC">A - Z</option>
									<option value="judulDESC">Z - A</option>      
								</select>
							</td>
							<td><button id="search" name="search">search</button></td>
						</tr>
					</form>
				</table>
				<?php 
					if(isset($_POST['search']))
					{
						$filter=$_POST['filter'];
						$sort=$_POST['sort'];
						if($sort=="judulASC")
						{
							$result = mysqli_query($conn, "SELECT * FROM buku WHERE judul LIKE '%$filter%' ORDER BY judul ASC");
						}
						elseif($sort=="tahunterbit")
						{
							$result = mysqli_query($conn, "SELECT * FROM buku WHERE judul LIKE '%$filter%' ORDER BY judul DESC");
						}
						else if($sort=="")
						{
							$result = mysqli_query($conn, "SELECT * FROM buku WHERE judul LIKE '%$filter%' ");
						}
					}
				?>
				
				<?php while($row=mysqli_fetch_assoc($result)): ?>
					<div class="img">
						<img src="Buku/<?= $row["gambar"]; ?>" alt="">
						<p>Judul : <?= $row["judul"]; ?> <br>
						Tahun Terbit : <?= $row["tahun_terbit"]; ?> <br>
						Nama Penerbit : <?= $row["nama_penerbit"]; ?><br>
						ISBN : <?= $row["isbn"]; ?> </P>
					</div>
				<?php endwhile; ?>
				
				<div class = "galeri">
					<a href="gambar/bisnis.jpg"><img src="gambar/bisnis.jpg" width="150px" height="200px"></a>
					<a href="gambar/mikro.jpg"><img src="gambar/mikro.jpg" width="150px" height="200px"></a>
					<a href="gambar/pemasaran.jpg"><img src="gambar/pemasaran.jpg" width="150px" height="200px"></a>
				</div>
			</div>
			<div id="clear"></div>
			<div id="footer">
				<p align="center"><font size="2"><b>©Copyright 2020. All Right Reserved <br> I Dewa Gede Rama Satya</b></font></p>
			</div>			
		</div>
	</body>
</html>