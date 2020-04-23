<?php
	if (isset($_POST['simpan'])){
        $id_obat      = mysqli_real_escape_string($koneksi,$_POST ['id_obat']);
        $nama_obat    = mysqli_real_escape_string($koneksi,$_POST ['nama_obat']);
        $id_kategori  = mysqli_real_escape_string($koneksi,$_POST ['id_kategori']);
        $keterangan	  = mysqli_real_escape_string($koneksi,$_POST ['keterangan']);
        $sql          = "UPDATE obat SET nama_obat='$nama_obat', id_kategori='$id_kategori', keterangan='$keterangan' WHERE id_obat='$id_obat'";
        $query        = mysqli_query($koneksi, $sql);
		if( $query){
			echo "<script>swal('Data Obat Berhasil Diupdate', '', 'success');</script>";
			echo "<meta http-equiv='refresh' content='1;url=index.php?page=obat'>";
		} else {
			echo "<script>swal({
				type: 'error',
				title: 'Update Gagal',
				text: 'Data Obat Gagal Diupdate',
				footer: '<a href>Perlu Bantuan?</a>'
              })</script>";
              echo "<meta http-equiv='refresh' content='1;url=index.php?page=obat'>";
            }
    mysqli_close($koneksi);
	}

?>