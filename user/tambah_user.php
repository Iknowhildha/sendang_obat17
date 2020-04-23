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
                          <li class="breadcrumb-item active">User</li>
                          <li class="breadcrumb-item active">Tambah User</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>
      <div class="row">
          <div class="col-lg-12">
              <!-- Horizontal Form -->
            <div class="card card-primary">
              <div class="card-header with-border">
                <h3 class="card-title"><i class="fa fa-user"></i> Tambah Data User</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="index.php?page=prosesuser">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="username">Username</label>
                              <input type="text" class="form-control" id="username" name="username"
                                  placeholder="Masukkan Username">
                          </div>
                          <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" id="password" name="password"
                                  placeholder="Masukkan Password">
                          </div>
                          <div class="form-group">
                              <label for="nama">Nama</label>
                              <input type="text" class="form-control" id="nama" name="nama" 
                                  placeholder="Masukkan Nama">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="nohp">No HP</label>
                              <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan No HP">
                          </div>
                          <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <textarea class="form-control" rows="1" name="alamat" placeholder="Masukkan Alamat"></textarea>
                          </div>
                          <div class="form-group">
                              <label for="level">Level</label>
                              <select class="form-control select2" id="level" name="level" style="width: 100%;">
                                <option value=" ">-- Pilih Level --</option>
                                <option>Owner</option>
                                <option>Pegawai</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <button type="submit" name="simpan" class="btn btn-primary float-sm-right"><i class="fa fa-save"></i> Submit</button>
                          </div>
                                  <!-- /.form-group -->
                        </div>
                      </div>
                    </div>
                      <!-- /.card-body -->
                  </form>
              </div>
              <!-- /.box -->
          </div>
      </div>