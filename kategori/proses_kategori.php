<?php
    if (isset($_POST['simpan'])) {
        $nama_kategori= mysqli_real_escape_string($koneksi, $_POST ['nama_kategori']);
        $sql          = "INSERT INTO kategori (nama_kategori) values ('$nama_kategori')";
        $query        = mysqli_query($koneksi, $sql);
        if ($query) {
          echo "<script>alert('Kategori Berhasil Dibuat')</script>";
          echo "<script>window.location.href = 'index.php?page=kategori'; </script>";
          } else {
          echo "<script>alert('Kategori Gagal Dibuat')</script>";
          echo "<script>window.location.href = 'index.php?page=kategori'; </script>";
        }
        mysqli_close($koneksi);
    }

?>