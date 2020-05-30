<?php
if(isset($_POST['tambah'])){
    include 'koneksi.php';
    $form = mysqli_query($conn, "INSERT INTO buku VALUES
    (NULL,  
        '".$judul=$_POST['judul_buku']."',
        '".$pengarang=$_POST['pengarang_buku']."',
        '".$edisi=$_POST['edisi_buku']."',
        '".$penerbit=$_POST['penerbit']."',
        '".$tahun=$_POST['tahun_terbit']."',
        '".$no_rak=$_POST['no_rak']."',
        '".$stock=$_POST['stock_buku']."')");
    if($form){
      echo '<script>alert("Data Buku Berhasil Ditambah");window.location="superadmin.php";</script>';
    }
    else{
     echo '<script>alert("Error");window.location="superadmin.php";</script>';
    } 
  }
?>