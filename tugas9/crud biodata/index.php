<?php
    include_once("koneksi.php");
    $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>
	<head>    
		<title>1708561004_I Dewa Gede Rama Satya</title>
	</head>

	<body style="background-color:powderblue;">
		<a href="tambah.php">Tambah User Baru</a><br/><br/>

			<table width='80%' border=1>

			<tr>
				<th>Nama</th> <th>No Hp</th> <th>Email</th> <th>Aksi</th>
			</tr>
			<?php  
			while($user_data = mysqli_fetch_array($result)) {         
				echo "<tr>";
				echo "<td>".$user_data['name']."</td>";
				echo "<td>".$user_data['mobile']."</td>";
				echo "<td>".$user_data['email']."</td>";    
				echo "<td><a href='edit.php?id=$user_data[id]'>Ubah</a> | <a href='hapus.php?id=$user_data[id]'>Hapus</a></td></tr>";        
			}
			?>
			</table>
	</body>
</html>