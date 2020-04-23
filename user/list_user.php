      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Dashboard User</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">User</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <div class="row">
          <div class="col-md-6">
              <a href="index.php?page=tambahuser" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah User</a>
          </div>
      </div>

      <br>
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Data User</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Username</th>
                                  <th>Password</th>
                                  <th>Nama</th>
                                  <th>No HP</th>
                                  <th>Alamat</th>
                                  <th>Level</th>
                                  <th>Tindakan</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
              $query = mysqli_query($koneksi, "SELECT * FROM user");
              $jumlah = mysqli_num_rows($query);
              $no = 1;
              while ($data = mysqli_fetch_array($query)) {
                  ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data['username'] ?></td>
                      <td><input type ="password" value="<?php echo $data['password'] ?>"readonly></td>
                      <td><?php echo $data['nama'] ?></td>
                      <td><?php echo $data['nohp'] ?></td>
                      <td><?php echo substr($data['alamat'],0,10) ?>..</td>
                      <td><span
                          class="label <?php if ($data['level']=='owner') { echo"label-primary"; } else { echo"label-success"; } ?>"><?php echo $data['level']; ?></span>
                      </td>
                      <td>
                        <a href="index.php?page=edituser&id_user=<?php echo $data['id_user']; ?>"
                          class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                        <a href="index.php?page=hapususer&id_user=<?php echo $data['id_user']; ?>"
                          class="btn btn-danger delete-link btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                      </td>
                    </tr>

                  <?php
              }?>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <th>No</th>
                                  <th>Username</th>
                                  <th>Password</th>
                                  <th>Nama</th>
                                  <th>No HP</th>
                                  <th>Alamat</th>
                                  <th>Level</th>
                                  <th>Tindakan</th>
                              </tr>
                          </tfoot>
                      </table>
                  </div>
                  <!-- /.card-body -->
              </div>
          </div>
      </div>