<?php
    include 'koneksi.php';
?>

<html>
	<head>
		<title>1708561004_I Dewa Gede Rama Satya</title>
	</head>
	
	<body style="background-color:powderblue;">
		<h1><center><b>PERPUSTAKAAN</b></center></h1>
		<table border="1">
			<tr bgcolor="yellow">
				<th>ID</th>
				<th>Judul</th>
				<th>Penerbit</th>   
				<th>Tahun</th>                            
			</tr>
			<?php 
				$halaman = 3;
				$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
				$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
				$result = mysqli_query($mysqli, "SELECT * FROM buku");
				$total = mysqli_num_rows($result);
				$pages = ceil($total/$halaman);            
				$query = mysqli_query($mysqli, "SELECT * FROM buku LIMIT $mulai, $halaman")or die(mysql_error);
				$no =$mulai+1;
				while ($data = mysqli_fetch_assoc($query)) {
			?>
			<tr>
				<td><?php echo $no++; ?></td>                  
				<td><?php echo $data['judul']; ?></td>      
				<td><?php echo $data['penerbit']; ?></td>
				<td><?php echo $data['tahun']; ?></td>                   
			</tr>
			<?php               
			} 
			?>
		</table>          
		<div class="">
			<?php echo "halaman ke : "; for ($i=1; $i<=$pages ; $i++){ ?>
				<a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php } ?>
		</div>
		<br>
		<br>
		<div>
			<p align="center"><font size="2"><b>©Copyright 2020<br>I Dewa Gede Rama Satya</b></font></p>
		</div>	
	</body>
</html> 