<?php
	include("koneksi.php");
	if( isset($_GET['id_obat']) ){
		$kode = $_GET['id_obat'];
		$sql = "DELETE FROM obat WHERE id_obat='$kode'";
		$query = mysqli_query($koneksi, $sql);
		if($query) {
			echo "<script>alert('Data Obat Berhasil Dihapus')</script>";
          echo "<script>window.location.href = 'index.php?page=obat'; </script>";
		} else {
			echo "<script>alert('Data Obat Gagal Dihapus')</script>";
          echo "<script>window.location.href = 'index.php?page=obat'; </script>";
        }
        mysqli_close($koneksi);
    }
?>