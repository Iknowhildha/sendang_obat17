<?php
$id_user = $_GET['id_user'];
$ambil=$koneksi->query("SELECT * FROM user
WHERE id_user='$id_user'");
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
                    <li class="breadcrumb-item active">User</li>
                    <li class="breadcrumb-item active">Edit User</li>

                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-lg-12">
        <!-- Horizontal Form -->
        <div class="card card-success">
            <div class="card-header with-border">
                <h3 class="card-title"><i class="fa fa-user"></i> Edit Data User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="index.php?page=updateuser">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <input type="hidden" class="form-control" id="id_user" name="id_user"
                                    value="<?php echo $data['id_user'] ?>">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                    value="<?php echo $data['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="<?php echo $data['password'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-success pull-right">Update</button>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nohp">No HP</label>
                                <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo $data['nohp'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" rows="2" name="alamat"><?php echo $data['alamat'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="level">Pilih Level</label>
                                <select class="form-control select2" id="level" name="level" style="width: 100%;">
                                    <option value="Owner" <?php $data['level'] == 'Owner' ? print "selected" : ""; ?>>Owner</option>
                                    <option value="Pegawai"<?php $data['level'] == 'Pegawai' ? print "selected" : ""; ?>>Pegawai</option>
                                </select>
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