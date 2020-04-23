<?php
	include("koneksi.php");
	if( isset($_GET['id_kategori']) ){
		$kode = $_GET['id_kategori'];
		$sql = "DELETE FROM kategori WHERE id_kategori='$kode'";
		$query = mysqli_query($koneksi, $sql);
		if($query) {
			echo "<script>alert('Kategori Berhasil Dihapus')</script>";
          echo "<script>window.location.href = 'index.php?page=kategori'; </script>";
		} else {
			echo "<script>alert('Kategori Gagal Dihapus')</script>";
          echo "<script>window.location.href = 'index.php?page=kategori'; </script>";
        }
        mysqli_close($koneksi);
    }
?>