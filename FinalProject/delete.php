<?php
	include "koneksi.php";

	$id_buku = $_GET['id_buku'];
	$query = mysqli_query($conn, "DELETE FROM buku Where id_buku='$id_buku'");
	if($query)
	{
		echo '<script>alert("Buku Telah Dihapus");window.location="admin.php";</script>';
	}
	else
	{
		echo '<script>alert("Error!");window.location="admin.php";</script>';
	} 
?>