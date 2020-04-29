<?php
session_start();
if(isset($_POST['id_obat'])){

     $id_obat = $_POST['id_obat'];
     $qty = $_POST['qty'];
     $idstok = $_POST['idstok'];

     $ambil=$koneksi->query("SELECT * FROM stok WHERE id_stok='$idstok'");
     $data=$ambil->fetch_array(MYSQLI_ASSOC);


    if ($data['stok_sekarang'] < $qty) {
     echo "<script>swal('Gagal!','Stok Obat Tidak Mencukupi','error');</script>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?page=transaksi'>";
     }else{
         $data = mysqli_query($koneksi,"SELECT obat.id_obat, stok.id_stok, obat.nama_obat, kategori.nama_kategori, stok.stok_sekarang, stok.harga_jual, stok.satuan, stok.tgl_kadaluarsa
    FROM stok, obat, kategori
    WHERE stok.id_obat = obat.id_obat
    AND obat.id_kategori = kategori.id_kategori
    AND obat.id_obat = '$id_obat' AND stok.id_stok = '$idstok'");
    $pecah = mysqli_fetch_assoc($data);
    
    
    if(isset($_SESSION['keranjang'])){  
          $item_array_id = array_column($_SESSION['keranjang'], 'id_obat');  
          if(!in_array($id_obat, $item_array_id))  
          {  
               $count = count($_SESSION['keranjang']);  
               $obat = array(  
                'id_obat' => $pecah['id_obat'],
                'nama_obat' => $pecah['nama_obat'],
                'harga_jual' => $pecah['harga_jual'],
                'satuan' => $pecah['satuan'],
                'qty' => $qty,
                'idstok' => $pecah['id_stok']
               );
               $_SESSION['keranjang'][$count] = $obat;
            }else{  
               echo '<script>alert("Obat sudah ada dalam keranjang, Silahkan update QTY nya aja")</script>';  
               echo '<script>window.location="index.php?page=transaksi"</script>';  
          }  
     }else{  
        $obat = array(  
            'id_obat' => $pecah['id_obat'],
            'nama_obat' => $pecah['nama_obat'],
            'harga_jual' => $pecah['harga_jual'],
            'satuan' => $pecah['satuan'],
            'qty' => $qty,
            'idstok' => $pecah['id_stok']
          );  
          $_SESSION['keranjang'][] = $obat;
     }
     krsort($_SESSION['keranjang']);
          echo "<script>location='index.php?page=transaksi';</script>";
}



}
?>