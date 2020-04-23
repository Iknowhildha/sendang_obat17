<?php
$id_kategori = $_GET['id_kategori'];
$ambil=$koneksi->query("SELECT * FROM kategori
WHERE id_kategori='$id_kategori'");
$data=$ambil->fetch_array(MYSQLI_ASSOC);
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
                          <li class="breadcrumb-item active">Kategori</li>
                          <li class="breadcrumb-item active">Edit Kategori</li>

                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>
<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Edit Kategori</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="index.php?page=updatekategori">
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_kategori" name="id_kategori" value="<?php echo $data['id_kategori'] ?>">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo $data['nama_kategori'] ?>">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="simpan" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

</div>