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
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

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
  $query6 = mysqli_query($koneksi, "SELECT * FROM user");
  $user = mysqli_num_rows($query6);

  $query7 = mysqli_query($koneksi, "SELECT * FROM kategori ");
  $jumlahkategori = mysqli_num_rows($query7);
  
  $query5 = mysqli_query($koneksi, "SELECT * FROM stok");
  $jumlahkeseluruhan = mysqli_num_rows($query5);

  //NOTE : SUM DIGUNAKAN UNTUK MENJUMLAH DATA PADA KOLOM

  //menjulam data yang ada di tabel stok
  $query3 = mysqli_query($koneksi, "SELECT * FROM stok WHERE tgl_masuk='$date'");
  $barang_masuk = mysqli_num_rows($query3);

  $query4 = mysqli_query($koneksi, "SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$date'");
  while ($data = mysqli_fetch_array($query4)) {
      $totaltransaksi = $data['totaltransaksi'];
  }

  ?>
 
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
            
        </div>
    </div>



    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3><?php echo $jumlahkeseluruhan ?></h3>
        <p>Jumlah Obat Keseluruhan</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            
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
            
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3><?php echo number_format($user) ?></h3>
                <p>User</p>
            </div>
            <div class="icon">
                <i class="ion ion-cash"></i>
            </div>
            
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3><?php echo $jumlahkategori ?></h3>
                <p>Jumlah Kategori</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            
        </div>
    </div>

</div>