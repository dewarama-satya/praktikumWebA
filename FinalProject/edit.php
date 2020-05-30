<?php
	include "koneksi.php";
	$no = $_POST['id_buku'];
    $judul = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang_buku'];
    $edisi = $_POST['edisi_buku'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    $no_rak = $_POST['no_rak'];
    $stock = $_POST['stock_buku'];

    $sql = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id_buku'");
	$data = mysqli_fetch_array($sql);
	$id = $data['id_buku'];

    $query = mysqli_query($conn, "UPDATE buku SET id_buku='$no', judul_buku='$judul', pengarang_buku='$pengarang', edisi_buku='$edisi', penerbit='$penerbit', tahun_terbit='$tahun', no_rak='$no_rak', stock_buku='$stock' WHERE id_buku='$no'");

    if($query)
	{
		echo '<script>alert("Informasi Buku Telah Diperbarui");window.location="admin.php";</script>';
	}
	else{
		echo '<script>alert("Error");window.location="admin.php";</script>';
	}
?>