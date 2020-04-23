<?php
include 'function_dateindo.php';

    $ambil=$koneksi->query("SELECT transaksi.tgl_transaksi, transaksi.id_transaksi, 
    transaksi.no_invoice, transaksi.total_bayar, transaksi.jumlah_bayar, transaksi.kembalian, user.nama
    FROM transaksi, user 
    WHERE transaksi.user_id = user.id_user 
    AND transaksi.id_transaksi='$_GET[id_transaksi]'");
    $data=$ambil->fetch_array(MYSQLI_ASSOC);

 ?>
<div class="row">
    <div class="col-md-12">
    <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                <i class="fa fa-shopping-cart"></i> Detail Transaksi
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-1 invoice-col">
                <address>
                <b>Kasir</b><br>
                <b>Tanggal</b><br>
                <b>Alamat</b>
                </address>
            </div>
            <div class="col-sm-5 invoice-col">
                <address>
                <b> : </b><?php echo $data['nama'] ?><br>
                <b> : </b><?php echo format_indo($data['tgl_transaksi']) ?><br>
                <b> : </b>Jl. KH. Agus Salim 9 (0354) 779722
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-1 invoice-col">
            <b>Invoice</b><br>
            <b>Order ID</b><br>
            <b>Customer</b><br>
            </div>
            <div class="col-sm-5 invoice-col">
            <b> : <span class="badge badge-success"><?php echo $data['no_invoice'] ?></span></b><br>
            <b> : </b><?php echo $data['id_transaksi'] ?><br>
            <b> : </b>Umum
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
            <table class="table table-striped">
            <thead>
            <tr>
          <th>Kode</th>
          <th>Nama Produk</th>
          <th>Harga Satuan</th>
          <th>Qty</th>
          <th>Sub Total</th>
            </tr>
            </thead>
            <tbody>
            <?php 
              $query = mysqli_query($koneksi, "SELECT detail_transaksi.*, obat.*,stok.*
              FROM detail_transaksi, obat, stok
              WHERE detail_transaksi.id_obat = obat.id_obat AND obat.id_obat = stok.id_obat AND id_transaksi='$_GET[id_transaksi]'");
              while ($data1 = mysqli_fetch_array($query)){
              ?>
            <tr>
              <td><?php echo $data1['id_obat'] ?></td>
              <td><?php echo $data1['nama_obat'] ?></td>
              <td>Rp. <?php echo number_format($data1['harga_jual'])?></td>
              <td><?php echo $data1['qty'] ?></td>
              <td>Rp. <?php echo number_format($data1['total'])?></td>
            </tr>
              <?php 
            $jumlah1 = $jumlah1+$data1['qty'];  
            } ?>
            </tbody>
          </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
            <p class="lead">UANG KEMBALI :</p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px; font-size:50px; font-weight: bold; color:black;">
          Rp. <?php echo number_format($data['kembalian']) ?>
          </p>
            </div>
            <!-- /.col -->
            <div class="col-6">
            <p class="lead">Detail Pembayaran</p>

                <div class="table-responsive">
                <table class="table">
                <tr>
                <th style="width:50%">Jumlah Item:</th>
                <td><?php echo $jumlah1 ?> Item</td>
              </tr>
              <tr>
                <th style="width:50%">Total Bayar:</th>
                <td>Rp. <?php echo number_format($data['total_bayar']) ?></td>
              </tr>
              <tr>
                <th>Jumlah Bayar:</th>
                <td>Rp. <?php echo number_format($data['jumlah_bayar']) ?></td>
              </tr>
              <tr>
                <th>Kembalian:</th>
                <td>Rp. <?php echo number_format($data['kembalian']) ?></td>
              </tr>
            </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
            <button onclick="window.open('transaksi/nota.php?id=<?php echo $data['id_transaksi']; ?>','mywindow','width=240px, height=400px')" class="btn btn-success"><i class="fas fa-print"></i> Print</button>
        </div>
            </div>
    <!-- /.invoice -->