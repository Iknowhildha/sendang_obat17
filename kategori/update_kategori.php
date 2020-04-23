<?php
	if (isset($_POST['simpan'])){
        $id_kategori      = mysqli_real_escape_string($koneksi,$_POST ['id_kategori']);
        $nama_kategori    = mysqli_real_escape_string($koneksi,$_POST ['nama_kategori']);
		$sql          = "UPDATE kategori SET nama_kategori='$nama_kategori'WHERE id_kategori='$id_kategori'";
        $query        = mysqli_query($koneksi, $sql);
		if( $query){
            echo "<script>alert('Kategori Berhasil Diupdate')</script>";
            echo "<script>window.location.href = 'index.php?page=kategori'; </script>";

		} else {
			echo "<script>alert('Kategori Gagal Diupdate')</script>";
          echo "<script>window.location.href = 'index.php?page=kategori'; </script>";
    }
    mysqli_close($koneksi);
	}

?>