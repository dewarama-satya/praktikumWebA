<?php 
	if(isset($_POST['daftar'])){
		include 'koneksi.php';
		$form = mysqli_query($conn, "INSERT INTO user VALUES
		(NULL, 	'".$nama=$_POST['nama']."',
				'".$jk=$_POST['jk']."',
				'".$no_hp=$_POST['no_hp']."',
				'".$alamat=$_POST['alamat']."',
				'".$username=$_POST['user']."',
				'".$pass=$_POST['pass']."',
				'".$status="Admin"."')");
		if($form){
			echo '<script>alert("Admin Baru Berhasil Ditambah!");window.location="index_superadmin.php";</script>';
		}
		else{
			echo 'Error';
		}	
	}
?>