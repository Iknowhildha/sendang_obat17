<?php
	if (isset($_POST['simpan'])){
        $id_user      = mysqli_real_escape_string($koneksi,$_POST ['id_user']);
        $username     = mysqli_real_escape_string($koneksi,$_POST ['username']);
        $password     = mysqli_real_escape_string($koneksi,$_POST ['password']);
        $nama         = mysqli_real_escape_string($koneksi,$_POST ['nama']);
        $nohp         = mysqli_real_escape_string($koneksi,$_POST ['nohp']);
        $alamat       = mysqli_real_escape_string($koneksi,$_POST ['alamat']);
        $level        = mysqli_real_escape_string($koneksi,$_POST ['level']);
		$sql          = "UPDATE user SET username='$username', password='$password', nama='$nama', nohp='$nohp', alamat='$alamat', level='$level' WHERE id_user='$id_user'";
        $query        = mysqli_query($koneksi, $sql);
		if( $query){
			echo "<script>swal('Data Akun Berhasil Diupdate', '', 'success');</script>";
			echo "<meta http-equiv='refresh' content='1;url=index.php?page=user'>";
		} else {
			echo "<script>swal({
				type: 'error',
				title: 'Hapus Gagal',
				text: 'Data Akun Gagal Diupdate',
				footer: '<a href>Perlu Bantuan?</a>'
              })</script>";
              echo "<meta http-equiv='refresh' content='1;url=index.php?page=user'>";
            }
    mysqli_close($koneksi);
	}

?>