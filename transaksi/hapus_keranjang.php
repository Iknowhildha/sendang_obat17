<?php
session_start();

$id = $_GET['id_obat'];
$keranjang = $_SESSION['keranjang'];

//berfungsi mengambil data sacara spesfik
$filter = array_filter($keranjang, function ($var) use ($id){
return ($var['id_obat']==$id);
});

//menghapus data berdasarkan key
foreach ($filter as $key => $value){
    unset($_SESSION['keranjang'][$key]);
}
$id_obat = $value['id_obat'];
$harga = $value['harga_jual'];
$qty = $value['qty'];
$tot = $harga*$qty;
//mengembalikan urutan
$_SESSION['keranjang'] = array_values($_SESSION['keranjang']);

echo "<script>location='index.php?page=transaksi';</script>";
?>