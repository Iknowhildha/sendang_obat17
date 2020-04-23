      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard Obat</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Obat</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>


      <div class="row">
        <div class="col-md-6">
          <a href="index.php?page=tambahobat" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Obat</a>
        </div>
      </div>

      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Obat</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id Obat</th>
                    <th>Nama Obat</th>
                    <th>Kategori</th>
                    <th>Katerangan</th>
                    <th>Tindakan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
              $query = mysqli_query($koneksi, "SELECT obat.id_obat, obat.nama_obat, kategori.nama_kategori, obat.keterangan
              FROM obat, kategori
              WHERE obat.id_kategori = kategori.id_kategori");
              $jumlah = mysqli_num_rows($query);
              while ($data = mysqli_fetch_array($query)){
              ?>
                  <tr>
                    <td><?php echo $data['id_obat'] ?></td>
                    <td><?php echo $data['nama_obat'] ?></td>
                    <td><?php echo $data['nama_kategori'] ?></td>
                    <td><?php echo $data['keterangan'] ?></td>
                    <td>
                      <a href="index.php?page=editobat&id_obat=<?php echo $data['id_obat']; ?>"
                          class="btn btn-success"><i class="fa fa-edit"></i> </a>
                      <a href="index.php?page=hapusobat&id_obat=<?php echo $data['id_obat']; ?>"
                       class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Id Obat</th>
                    <th>Nama Obat</th>
                    <th>Kategori</th>
                    <th>Katerangan</th>
                    <th>Tindakan</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>