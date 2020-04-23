      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard Stok</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Stok</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>


      <div class="row">
        <div class="col-md-6">
          <a href="index.php?page=tambahstok" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Stok</a>
        </div>
      </div>

      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Stok</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id Stok</th>
                    <th>Nama Obat</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Tindakan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
              $query = mysqli_query($koneksi, "SELECT stok.id_stok, obat.nama_obat, stok.stok_sekarang, stok.satuan,
              stok.harga_jual, stok.tgl_masuk, stok.tgl_kadaluarsa
              FROM obat, stok
              WHERE obat.id_obat = stok.id_obat");
              $jumlah = mysqli_num_rows($query);
              while ($data = mysqli_fetch_array($query)){
              ?>
                  <tr>
                    <td><?php echo $data['id_stok'] ?></td>
                    <td><?php echo $data['nama_obat'] ?></td>
                    <td><?php echo $data['stok_sekarang'] ?></td>
                    <td><span class="badge badge-warning"><?php echo $data['satuan'] ?></span></td>
                    <td>Rp.<?php echo number_format($data['harga_jual']) ?>,-</td>
                    <td><?php echo $data['tgl_masuk'] ?></td>
                    <td><?php echo $data['tgl_kadaluarsa'] ?></td>
                    <td>
                      <a href="index.php?page=editstok&id_stok=<?php echo $data['id_stok']; ?>"
                          class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Id Stok</th>
                    <th>Nama Obat</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Tindakan</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>