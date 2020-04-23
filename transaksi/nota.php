<?php 
ini_set('date.timezone', 'Asia/Jakarta');
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include '../koneksi.php';
$ambil=$koneksi->query("SELECT transaksi.tgl_transaksi, transaksi.id_transaksi, transaksi.no_invoice, transaksi.total_bayar, transaksi.jumlah_bayar, transaksi.kembalian, user.nama
FROM transaksi, user 
WHERE transaksi.user_id = user.id_user 
AND transaksi.id_transaksi='$_GET[id]'");
 $data=$ambil->fetch_array(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk Belanja</title>

    <style>
    .td{
        font-size: 10px;
        font-family: 'Consolas';
    }
    .th{
        font-size: 15px;
        font-family: 'Consolas';
    }
    .tk{
        font-size: 10px;
        font-family: 'Consolas';
        color:#c0c0c0 ;
    }
    </style>
    
</head>
<body>
    <div>
        <table width="250" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <th class="th">APOTEK SENDANG<br>
                Jl. KH. Agus Salim 9<br>
                Telp. (0354) 779722 <br>
                </th>
            </tr>
            <tr align="center"><td><hr></td></tr>
            <tr>
                <td class="td"><?php echo $data['tgl_transaksi'] ?> | <?php echo $data['nama'] ?></td>
            </tr>
            <tr align="center"><td><hr></td></tr>
        </table>
        <table width="250" border="0" cellpadding="1" cellspacing="0">
        <tr>
                  <th align="left" style="font-size:10px;">Nama</th>
                  <th align="left" style="font-size:10px;">Qty</th>
                  <th  style="font-size:10px;">Harga</th>
                  <th  style="font-size:10px;">Total</th>
              </tr>  
        <?php 
              $query = mysqli_query($koneksi, "SELECT detail_transaksi.*, obat.*, stok.*
              FROM detail_transaksi, obat, stok
              WHERE detail_transaksi.id_obat = obat.id_obat
              AND detail_transaksi.id_stok = stok.id_stok AND id_transaksi='$_GET[id]'");
              while ($data1 = mysqli_fetch_array($query)){
              ?>
                
        <tr>
            <td align="left" class="td"><?php echo substr($data1['nama_obat'],0,10) ?>..</td>
            <td class="td"><?php echo $data1['qty'] ?></td>
            <td class="td">Rp. <?php echo number_format($data1['harga']) ?></td>
            <td class="td" align="right">Rp. <?php echo number_format($data1['total'])?></td>
        </tr>
              <?php 
            $barang = $barang+$data1['qty'];
            }?>
        <tr>
            <td colspan="4"><hr></td>
        </tr>
        </table>
        <table width="250" border="0" cellpadding="1" cellspacing="0">
        <tr>
            <td align="right" colspan="right" class="td">Total :</td>
            <td align="right" class="td">Rp. <?php echo number_format($data['total_bayar']) ?></td>
        </tr>
        <tr>
            <td align="right" colspan="right" class="td">Jumlah Bayar :</td>
            <td align="right" class="td">Rp. <?php echo number_format($data['jumlah_bayar']) ?></td>
        </tr>
        <tr>
            <td align="right" colspan="right" class="td">Kembalian :</td>
            <td align="right" class="td">Rp. <?php echo number_format($data['kembalian']) ?></td>
        </tr>
        <tr>
            <td align="right" colspan="right" class="td">jumlah Barang :</td>
            <td align="right" class="td"><?php echo $barang ?> Barang</td>
        </tr>
        </table>
        <table width="250" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <br>
                <th class="tk"> -- Terima Kasih Sudah Belanja -- <br>
                </th>
            </tr>
        </table>
    </div>
</body>
<script type="text/javascript">
//window.print();
</script>
</html>