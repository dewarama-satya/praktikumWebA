<?php 
	if(isset($_POST['daftar'])){
		include 'koneksi.php';
		$form = mysqli_query($conn, "INSERT INTO user VALUES
		(NULL, 	'".$nama=$_POST['nama']."',
				'".$jenis_kelamin=$_POST['jk']."',
				'".$no_hp=$_POST['no_hp']."',
				'".$alamat=$_POST['alamat']."',
				'".$username=$_POST['user']."',
				'".$pass=$_POST['pass']."',
				'".$status="User"."')");
		if($form)
		{
			echo '<script>alert("Pendaftaraan Berhasil");window.location="login.php";</script>';
		}
		else
		{
			echo 'Gagal!';
		}	
	}
?>