<?php
  ini_set('date.timezone', 'Asia/Jakarta');
  include 'asset/bulan_indo.php';
  $grafikbulan = date('Y-m-d');
  $date = date('Y-m-d');
  $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tgl_transaksi='$date'");
  $jumlah_transaksi = mysqli_num_rows($query);
  $query2 = mysqli_query($koneksi, "SELECT SUM(stok_sekarang) as obatsekarang FROM stok");
  while ($data = mysqli_fetch_array($query2)) {
    $jumlah_barang = $data['obatsekarang'];
  }

  //NOTE : SUM DIGUNAKAN UNTUK MENJUMLAH DATA PADA KOLOM

  //menjulam data yang ada di tabel stok
  $query3 = mysqli_query($koneksi, "SELECT * FROM stok WHERE tgl_masuk='$date'");
  $barang_masuk = mysqli_num_rows($query3);

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
              <option >-- Pilih Filter --</option>
              <option value="1">Per Tanggal</option>
              <option value="2">Per Bulan</option>
              <option value="3">Per Tahun</option>
              <option value="4">Per Periode</option>
            </select>
            <br>

            <div id="form-tanggal">
              <label>Tanggal</label><br>
              <input type="date" name="tanggal" class="form-control" />
              <br /><br />
            </div>

            <div id="form-bulan">
              <label>Bulan</label><br>
              <select name="bulan" class="form-control">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
              <br />
            </div>

            <div id="form-tahun">
              <label>Tahun</label><br>
              <select name="tahun" class="form-control">
                <option value="">Pilih</option>
                <?php
                $query = "SELECT YEAR(tgl_transaksi) AS tahun FROM transaksi GROUP BY YEAR(tgl_transaksi)"; // Tampilkan tahun sesuai di tabel transaksi
                $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                while($data1 = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    echo '<option value="'.$data1['tahun'].'">'.$data1['tahun'].'</option>';
                }
                ?>
              </select>
              <br />
            </div>

            <div id="form-periode">
              <label>Tanggal Awal</label>
              <input type="date" name="tawal" class="form-control">
              <label>Tanggal Akhir</label>
              <input type="date" name="takhir" class="form-control">
              </br>
            </div>

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
        <h3 class="card-title">Grafik Pendapatan Harian Bulan <?php echo strtolower($bulan[date('m')]) ?>
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

<?php include 'asset/grafikharian.php' ?>


<script>
      $(document).ready(function () { // Ketika halaman selesai di load
        $('#form-tanggal, #form-bulan, #form-tahun, #form-periode')
      .hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function () { // Ketika user memilih filter
          if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
            $('#form-bulan, #form-tahun, #form-periode').hide(); // Sembunyikan form bulan dan tahun
            $('#form-tanggal').show(); // Tampilkan form tanggal
          } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
            $('#form-tanggal, #form-periode').hide(); // Sembunyikan form tanggal
            $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
          } else if ($(this).val() == '3') { // Jika filternya 3 (per tahun)
            $('#form-tanggal, #form-bulan, #form-periode').hide(); // Sembunyikan form tanggal dan bulan
            $('#form-tahun').show(); // Tampilkan form tahun
          } else {
            $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sembunyikan form tanggal, bulan, tahun
            $('#form-periode').show();
          }

          $('#form-tanggal input, #form-bulan select, #form-tahun select').val(
          ''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
      })
    </script>