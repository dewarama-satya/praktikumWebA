<?php  
	include "koneksi.php";

	$id_user = $_POST['id_user'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$username = $_POST['user'];
	$pass = $_POST['pass'];
	 
	$sql = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'");
	$data = mysqli_fetch_array($sql);
	$id = $data['id_user'];

	$query = mysqli_query($conn, "UPDATE user SET nama='$nama', jenis_kelamin='$jk', no_hp='$no_hp', alamat='$alamat', username='$username', password='$pass' WHERE id_user='$id'") or die(mysqli_error($conn));

	if($query)
	{
		echo '<script>alert("Profile Berhasil Ditambahkan");window.location="index.php";</script>';
	}
	else{
		echo '<script>alert("Error");window.location="index.php";</script>';
	}
	header("location:index.php?pesan=update")
?>