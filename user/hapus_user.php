<?php
	include("koneksi.php");
	if( isset($_GET['id_user']) ){
		$kode = $_GET['id_user'];
		$sql = "DELETE FROM user WHERE id_user='$kode'";
		$query = mysqli_query($koneksi, $sql);
		if($query) {
			echo "<script>alert('Akun Berhasil Dihapus')</script>";
          echo "<script>window.location.href = 'index.php?page=user'; </script>";
		} else {
			echo "<script>alert('Akun Gagal Dihapus')</script>";
          echo "<script>window.location.href = 'index.php?page=user'; </script>";
        }
        mysqli_close($koneksi);
    }
?>