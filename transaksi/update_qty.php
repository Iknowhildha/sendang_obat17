<?php
$qty = $_POST['qty'];

foreach($_SESSION['keranjang'] as $key => $value){
    
    $qty2 = $_SESSION['keranjang'][$key]['qty'] = $qty[$key];
    $id_stok2 = $_SESSION['keranjang'][$key]['idstok'];

    $ambil=$koneksi->query("SELECT * FROM stok WHERE id_stok='$id_stok2'");
    $data=$ambil->fetch_array(MYSQLI_ASSOC);

    if ($data['stok_sekarang'] < $qty2) {
        echo "<script>alert('Ada Stok Obat Tidak Mencukupi! Silahkan Update Qty lagi');</script>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?page=transaksi'>";
    }else{
        $_SESSION['keranjang'][$key]['qty'] = $qty[$key];
    }
}
krsort($_SESSION['keranjang']);
echo "<script>location='index.php?page=transaksi';</script>";
?>