<?php
	if (isset($_POST['simpan'])){
        $id_stok      	= mysqli_real_escape_string($koneksi,$_POST ['id_stok']);
        $stok_masuk     = mysqli_real_escape_string($koneksi,$_POST ['stok_masuk']);
        $stok_sekarang  = mysqli_real_escape_string($koneksi,$_POST ['stok_sekarang']);
        $satuan         = mysqli_real_escape_string($koneksi,$_POST ['satuan']);
        $harga_beli     = mysqli_real_escape_string($koneksi,$_POST ['harga_beli']);
        $harga_jual     = mysqli_real_escape_string($koneksi,$_POST ['harga_jual']);
        $profit         = mysqli_real_escape_string($koneksi,$_POST ['profit']);
        $tgl_masuk      = mysqli_real_escape_string($koneksi,$_POST ['tgl_masuk']);
        $tgl_kadaluarsa = mysqli_real_escape_string($koneksi,$_POST ['tgl_kadaluarsa']);
        $id_obat        = mysqli_real_escape_string($koneksi,$_POST ['id_obat']);
		$sql          	= "UPDATE stok SET stok_masuk='$stok_masuk', stok_sekarang='$stok_sekarang', satuan='$satuan', harga_beli='$harga_beli', harga_jual='$harga_jual', profit='$profit', tgl_masuk='$tgl_masuk', tgl_kadaluarsa='$tgl_kadaluarsa', id_obat='$id_obat' WHERE id_stok='$id_stok'";
        $query        = mysqli_query($koneksi, $sql);
		if( $query){
			echo "<script>swal('Data Stok Berhasil Diupdate', '', 'success');</script>";
			echo "<meta http-equiv='refresh' content='1;url=index.php?page=stok'>";
		} else {
			echo "<script>swal({
				type: 'error',
				title: 'Update Gagal',
				text: 'Data Stok Gagal Diupdate',
				footer: '<a href>Perlu Bantuan?</a>'
              })</script>";
              echo "<meta http-equiv='refresh' content='1;url=index.php?page=stok'>";
            }
    mysqli_close($koneksi);
	}

?>