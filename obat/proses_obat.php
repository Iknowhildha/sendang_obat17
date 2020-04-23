<?php
    if (isset($_POST['simpan'])) {
        $id_obat        = mysqli_real_escape_string($koneksi, $_POST ['id_obat']);
        $nama_obat      = mysqli_real_escape_string($koneksi, $_POST ['nama_obat']);
        $id_kategori    = mysqli_real_escape_string($koneksi, $_POST ['id_kategori']);
        $keterangan     = mysqli_real_escape_string($koneksi, $_POST ['keterangan']);
        $sql          = "INSERT INTO obat (id_obat, nama_obat, id_kategori, keterangan) values ('$id_obat', '$nama_obat', '$id_kategori', '$keterangan')";
        $query        = mysqli_query($koneksi, $sql);
        if ($query) {
          echo "<script>swal('Data Obat Berhasil Dibuat', '', 'success');</script>";
          echo "<meta http-equiv='refresh' content='1;url=index.php?page=obat'>";
        } else {
          echo "<script>alert('Data Obat Gagal Dibuat')</script>";
          echo "<script>window.location.href = 'index.php?page=obat'; </script>";
        }
        mysqli_close($koneksi);
    }

?>