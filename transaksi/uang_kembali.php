<?php
include 'function_dateindo.php';

    $ambil=$koneksi->query("SELECT transaksi.tgl_transaksi, transaksi.id_transaksi, transaksi.no_invoice, transaksi.total_bayar, transaksi.jumlah_bayar, transaksi.kembalian, user.nama
    FROM transaksi, user 
    WHERE transaksi.user_id = user.id_user 
    AND transaksi.id_transaksi='$_GET[id]'");
    $data=$ambil->fetch_array(MYSQLI_ASSOC);

 ?>
 <br>
 <section class="content">
 <div class="container-fluid">

 <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Detail belanja
                    <small class="float-right"><?php echo format_indo($data['tgl_transaksi']) ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <address>
                    <b>Kasir : </b> <?php echo $data['nama'] ?> <br>
                    <b>Tanggal : </b> <?php echo format_indo($data['tgl_transaksi']) ?> <br>
                    <b>Alamat : </b> JL. Ciliwung
                  </address>
                </div>

                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice <span class="badge badge-success"><?php echo $data['no_invoice'] ?></span></b><br>
                  <b>Order ID:</b> <?php echo $data['id_transaksi'] ?> <br>
                  <b>Customer:</b> <span class="badge badge-info">Umum</span>
                  <br>
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
                      <th>Harga</th>
                      <th>QTY</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $query = mysqli_query($koneksi, "SELECT detail_transaksi.*, obat.*, stok.*
                      FROM detail_transaksi, obat, stok
                      WHERE detail_transaksi.id_obat = obat.id_obat
                      AND detail_transaksi.id_stok = stok.id_stok AND id_transaksi='$_GET[id]'");
                      while ($data1 = mysqli_fetch_array($query)){
                      ?>
                    <tr>
                      <td><?php echo $data1['id_obat'] ?></td>
                      <td><?php echo $data1['nama_obat'] ?></td>
                      <td>Rp. <?php echo number_format($data1['harga'])?></td>
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
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px; font-size:50px; font-weight: bold;">
                   Rp. <?php echo number_format($data['kembalian']) ?>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Pembayaran :</p>

                  <div class="table-responsive">
                    <table class="table">
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
                <div class="col-12">
                  <button onclick="window.open('transaksi/nota.php?id=<?php echo $data['id_transaksi']; ?>','mywindow','width=240px, height=400px')" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                  <a type="button" href="index.php?page=transaksi" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Transaksi Baru
                  </a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->