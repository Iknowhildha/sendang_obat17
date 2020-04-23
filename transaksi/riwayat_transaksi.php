   <?php //print_r($_SESSION); ?>
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
                          <li class="breadcrumb-item active">Transaksi</li>
                          <li class="breadcrumb-item active">Riwayat Transaksi</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>




<?php if($_SESSION['level'] == 'Owner') {?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Riwayat Transkasi</h3>
  </div>
  <!-- /.box-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Invoice</th>
          <th>Tanggal</th>
          <th>Kasir</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php 
              $query = mysqli_query($koneksi, "SELECT transaksi.no_invoice, transaksi.tgl_transaksi, transaksi.id_transaksi, user.nama 
              FROM transaksi, user
              WHERE transaksi.user_id = user.id_user ORDER BY id_user DESC");
              $jumlah = mysqli_num_rows($query);
              while ($data = mysqli_fetch_array($query)){
              ?>
        <tr>
          <td><span class="label label-success"><?php echo $data['no_invoice'] ?></span></td>
          <td><?php echo $data['tgl_transaksi'] ?></td>
          <td><?php echo $data['nama'] ?></td>
          <td>
            <a href="index.php?page=detailtransaksi&id_transaksi=<?php echo $data['id_transaksi'];?>" class="btn btn-info"><i class="fa fa-eye"></i> Melihat</a>
          </td>
        </tr>

        <?php }?>
      </tbody>
      <tfoot>
        <tr>
          <th>Invoice</th>
          <th>Tanggal</th>
          <th>Kasir</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>

              <?php }else{?>

                <div class="card">
  <div class="card-header">
    <h3 class="card-title">Riwayat Transkasi</h3>
  </div>
  <!-- /.box-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Invoice</th>
          <th>Tanggal</th>
          <th>Kasir</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        include 'function_dateindo.php';
              $query = mysqli_query($koneksi, "SELECT transaksi.no_invoice, transaksi.tgl_transaksi, transaksi.id_transaksi, user.nama 
              FROM transaksi, user
              WHERE transaksi.user_id = user.id_user AND user.nama='$_SESSION[nama]' ORDER BY id_user DESC");
              $jumlah = mysqli_num_rows($query);
              while ($data = mysqli_fetch_array($query)){
              ?>
        <tr>
          <td><span class="label label-success"><?php echo $data['no_invoice'] ?></span></td>
          <td><?php echo format_indo($data['tgl_transaksi']) ?></td>
          <td><?php echo $data['nama'] ?></td>
          <td>
            <a href="index.php?page=detailtransaksi&id_transaksi=<?php echo $data['id_transaksi'];?>" class="btn btn-info"><i class="fa fa-eye"></i> Melihat</a>
          </td>
        </tr>

        <?php }?>
      </tbody>
      <tfoot>
        <tr>
          <th>Invoice</th>
          <th>Tanggal</th>
          <th>Kasir</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>

              <?php }?>