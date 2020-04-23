<?php
  ini_set('date.timezone', 'Asia/Jakarta');
  include 'data/bulan_indo.php';
  $grafikbulan = date('Y-m-d');
  $date = date('Y-m-d');
  $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tgl_transaksi='$date'");
  $jumlah_transaksi = mysqli_num_rows($query);
  $query2 = mysqli_query($koneksi, "SELECT SUM(stok_sekarang) as obatsekarang FROM stok");
  while ($data = mysqli_fetch_array($query2)) {
    $jumlah_barang = $data['obatsekarang'];
  }
  $query3 = mysqli_query($koneksi, "SELECT SUM(stok_masuk) as obatmasuk FROM stok WHERE tgl_masuk='$date'");
  while ($data = mysqli_fetch_array($query3)) {
    $barang_masuk = $data['obatmasuk'];
  }
  $query4 = mysqli_query($koneksi, "SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$date'");
  while ($data = mysqli_fetch_array($query4)) {
      $totaltransaksi = $data['totaltransaksi'];
  }

  ?>
 
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Dashboard</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">Laporan</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

<div class="row">

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>Rp. <?php echo number_format($totaltransaksi) ?></h3>
                <p>Pendapatan Hari Ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-cash"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3><?php echo $jumlah_transaksi ?></h3>
                <p>Jumlah Transaksi Hari Ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3><?php echo $jumlah_barang ?></h3>
        <p>Jumlah Obat Saat Ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3><?php echo $barang_masuk ?></h3>
        <p>Obat Masuk Hari Ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
<div class="row">
<div class="col-lg-5">
    <!-- Horizontal Form -->
    <div class="card card-info">
      <div class="card-header with-border">
        <h3 class="card-title">Laporan Penjualan</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" method="post" action="index.php?page=tampil">
        <input type="hidden" name="halaman" value="rekapcuti">
        <div class="card-body">
          <div class="col-md-12">
            <label>Filter Berdasarkan</label><br>
            <select name="filter" id="filter" class="form-control">
              <option value="">-- Pilih Filter --</option>
              <option value="1">Per Tanggal</option>
              <option value="2">Per Bulan</option>
              <option value="3">Per Tahun</option>
              <option value="4">Per Periode</option>
            </select>
            <br>

            <button type="submit" class="btn btn-primary"><i class="fa fa-eye"></i> Tampilkan</button>
            <a class="btn btn-warning" href="index.php?page=laporan"><i class="fa fa-refresh"></i> Reset Filter</a>
          </div>

        </div>
      </form>
    </div>
  </div>

    <!-- Grafik laporan harian -->
    <div class="col-md-7">
    <div class="card card-success">
      <div class="card-header with-border">
        <h3 class="card-title">Grafik Pendapatan Harian
        </h3><br>

      </div>
      <div class="card-body">
        <canvas id="myChart"></canvas>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>