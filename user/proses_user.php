<?php
    if (isset($_POST['simpan'])) {
        $username     = mysqli_real_escape_string($koneksi, $_POST ['username']);
        $password     = mysqli_real_escape_string($koneksi, $_POST ['password']);
        $nama         = mysqli_real_escape_string($koneksi, $_POST ['nama']);
        $nohp         = mysqli_real_escape_string($koneksi, $_POST ['nohp']);
        $alamat       = mysqli_real_escape_string($koneksi, $_POST ['alamat']);
        $level        = mysqli_real_escape_string($koneksi, $_POST ['level']);
        $sql          = "INSERT INTO user (username, password, nama, nohp, alamat, level) values ('$username', '$password', '$nama', '$nohp', '$alamat', '$level')";
        $query        = mysqli_query($koneksi, $sql);
        if ($query) {
          echo "<script>swal('Data Akun Berhasil Dibuat', '', 'success');</script>";
          echo "<meta http-equiv='refresh' content='1;url=index.php?page=user'>";
        } else {
          echo "<script>alert('Akun Gagal Dibuat')</script>";
          echo "<script>window.location.href = 'index.php?page=user'; </script>";
        }
        mysqli_close($koneksi);
    }

?>