<?php
    if (isset($_POST['simpan'])) {
        $stok_masuk       = mysqli_real_escape_string($koneksi, $_POST ['stok_masuk']);
        $stok_sekarang    = mysqli_real_escape_string($koneksi, $_POST ['stok_sekarang']);
        $satuan           = mysqli_real_escape_string($koneksi, $_POST ['satuan']);
        $harga_beli       = mysqli_real_escape_string($koneksi, $_POST ['harga_beli']);
        $harga_jual       = mysqli_real_escape_string($koneksi, $_POST ['harga_jual']);
        $profit           = mysqli_real_escape_string($koneksi, $_POST ['profit']);
        $tgl_masuk        = mysqli_real_escape_string($koneksi, $_POST ['tgl_masuk']);
        $tgl_kadaluarsa   = mysqli_real_escape_string($koneksi, $_POST ['tgl_kadaluarsa']);
        $id_obat          = mysqli_real_escape_string($koneksi, $_POST ['id_obat']);
        $sql              = "INSERT INTO stok (stok_masuk, stok_sekarang, satuan, harga_beli, harga_jual, profit, tgl_masuk, tgl_kadaluarsa, id_obat) values ('$stok_masuk', '$stok_sekarang', '$satuan', '$harga_beli', '$harga_jual', '$profit', '$tgl_masuk', '$tgl_kadaluarsa', '$id_obat')";
        $query            = mysqli_query($koneksi, $sql);
        if ($query) {
          echo "<script>swal('Data Stok Berhasil Dibuat', '', 'success');</script>";
          echo "<meta http-equiv='refresh' content='1;url=index.php?page=stok'>";
        } else {
          echo "<script>alert('Data Stok Gagal Dibuat')</script>";
          echo "<script>window.location.href = 'index.php?page=stok'; </script>";
        }
        mysqli_close($koneksi);
    }

?>