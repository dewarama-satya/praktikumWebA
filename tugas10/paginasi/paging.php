<?php
    include '../config.php';
?>

<html>
	<head>
		<title>1708561004_I Dewa Gede Rama Satya</title>
	</head>
	
	<body style="background-color:powderblue;">
		<table border="1">
			<tr>
				<th>ID</th>
				<th>Judul</th>                         
			</tr>
			
			<?php 
			$halaman = 10;
			$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
			$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
			$result = mysql_query("SELECT * FROM buku");
			$total = mysql_num_rows($result);
			$pages = ceil($total/$halaman);            
			$query = mysql_query("select * from buku LIMIT $mulai, $halaman")or die(mysql_error);
			$no =$mulai+1;


			while ($data = mysql_fetch_assoc($query)) {
			?>
			<tr>
				<td><?php echo $no++; ?></td>                  
				<td><?php echo $data['judul']; ?></td>              
							
			</tr>

			<?php               
			} 
			?>
		</table>          

		<div class="">
			<?php for ($i=1; $i<=$pages ; $i++){ ?>
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