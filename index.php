<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Login</title>
  <link rel="shortcut icon" type="image/x-icon" href="asset/Gambar/DiniCenter.png" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="asset/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/template/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="asset/template/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/template/dist/css/AdminLTE.min.css">
  <!-- Sweet Alert -->
  <script src="asset/template/bower_components/sweetalert/sweetalert2.all.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .swal2-popup {
      font-size: 1.6rem !important;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>Login</b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg"></p>
      <?php
      session_start();
      require __DIR__ . '/firebase/config.php';

      // // cek apakah session id_user dan level sudah ada, apabila ada ke auth.php.
      if (isset($_SESSION['id_user']) && isset($_SESSION['level'])) {
        echo '<script>window.location="auth.php";</script>';
      }

      // cek apakah username dan password sudah ke isi
      if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        try {
          $signInResult = $auth->signInWithEmailAndPassword($username, $password);

          $_SESSION['id_user'] = $signInResult->firebaseUserId();
          $_SESSION['level'] = 'admin';

          echo '<script>window.location="auth.php";</script>';
        } catch (Kreait\Firebase\Auth\SignIn\FailedToSignIn $error) {
          echo "<script>Swal.fire('Username dan Password tidak cocok','','error'); </script>";
        }
      }
      ?>

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div class="row">
          <div class="col-xs-8">
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="asset/template/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="asset/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>