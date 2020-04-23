      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard Kategori</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Kategori</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>


      <div class="row">
        <div class="col-md-6">
          <a href="index.php?page=tambahkategori" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kategori</a>
        </div>
      </div>

      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-list"></i> Data Kategori Obat</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Tindakan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
              $query = mysqli_query($koneksi, "SELECT kategori.id_kategori, kategori.nama_kategori
              FROM kategori");
              $jumlah = mysqli_num_rows($query);
              while ($data = mysqli_fetch_array($query)){
              ?>
                  <tr>
                    <td>
                      <?php echo $data['id_kategori'] ?>
                    </td>
                    <td><?php echo $data['nama_kategori'] ?></td>
                    <td>
                      <a href="index.php?page=editkategori&id_kategori=<?php echo $data['id_kategori']; ?>"
                        class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                      <a href="index.php?page=hapuskategori&id_kategori=<?php echo $data['id_kategori']; ?>"
                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Id Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Tindakan</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>