<?php  
	include "koneksi.php";

	session_start();

	$username = $_POST['username'];
	$password = $_POST['pass'];
	
	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";

	$konek = mysqli_query($conn, $query);
	$login = mysqli_num_rows($konek);

	if ($login > 0) {
		$data = mysqli_fetch_assoc($konek);
		if ($data['status']=="User") {
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['username'] = $data['nama'];
			$_SESSION['status'] = $data['status'];
			header("location:index.php");
		}else if($data['status']=="Admin"){
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['username'] = $data['nama'];
			$_SESSION['status'] = $data['status'];
			header("location:admin.php");
		}else if ($data['status']=="Super Admin") {
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['username'] = $data['nama'];
			$_SESSION['status'] = $data['status'];
			header("location:superadmin.php");
		}else{
			header("location:login_page.php");
		}
	}else{
		header("Location: login_page.php");
	}
?>