<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sendang | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link href="dist/sweet/sweetalert.css" rel="stylesheet" type="text/css" />

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><b>Sendang</b> Apotek</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Welcome In App Sendang Apotek</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Masukan Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Masukan Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="masuk" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="dist/sweet/sweetalert.min.js" type="text/javascript"></script>


</body>
</html>

<?php
session_start();
include 'koneksi.php';
if(isset($_SESSION["level"])){
  header("location:index.php");
  exit;
}

//if( !isset($_SESSION['token'])){
  //$_SESSION['token'] = base64_encode( openssl_random_pseudo_bytes(32));
//}
//&& $_SESSION['token'] == $_GET['token_form']
if(isset($_POST['masuk'])){
  
  $username	= mysqli_real_escape_string($koneksi, htmlentities($_POST['username']));
  $password	= mysqli_real_escape_string($koneksi, htmlentities($_POST['password']));

  $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password='$password'");
  if(mysqli_num_rows($query) == 0){
    echo "<script>swal({
      type: 'error',
      title: 'Login Gagal',
      text: 'Data Akun Tidak Ada Dalam Database, Pastikan Username & Password Benar!!!',
      timer: 2000,
      footer: '<a href>Perlu Bantuan?</a>'
      })</script>";
  }else{
    $data = mysqli_fetch_assoc($query);
      if($data['level'] == 'Owner'){
        echo "<script>swal('Login Berhasil', 'Selamat Datang $username', 'success');</script>";
                      $_SESSION['id'] = $data['id_user'];
                      $_SESSION['username'] = $data['username'];
                      $_SESSION['password'] = $data['password'];
                      $_SESSION['nama'] = $data['nama'];
                      $_SESSION['nohp'] = $data['nohp'];
                      $_SESSION['alamat'] = $data['alamat'];
                      $_SESSION['level'] = $data['level'];
        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
      }else if($data['level'] == 'Pegawai'){
        echo "<script>swal('Login Berhasil', 'Selamat Datang $username', 'success');</script>";
                     $_SESSION['id'] = $data['id_user'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['password'] = $data['password'];
                    $_SESSION['nama'] = $data['nama'];
                     $_SESSION['nohp'] = $data['nohp'];
                     $_SESSION['alamat'] = $data['alamat'];
                     $_SESSION['level'] = $data['level'];
                      echo "<meta http-equiv='refresh' content='1;url=index.php'>";
      }else{
        echo "<script>swal({
          type: 'error',
          title: 'Login Gagal',
          text: 'Pastikan Username & Password Benar!!!',
          footer: '<a href>Perlu Bantuan?</a>'
          })</script>";
          echo "<meta http-equiv='refresh' content='1;url=login.php'>";
      }
  }
 }

