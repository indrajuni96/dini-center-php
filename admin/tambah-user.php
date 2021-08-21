<?php
if (isset($_POST['submit'])) {
  $uniqID = uniqid();

  $nama        = $_POST['nama'];
  $email        = $_POST['email'];
  $alamat        = $_POST['alamat'];
  $noTelepon        = $_POST['noTelepon'];
  $password        = $_POST['password'];

  $checkEmail = array();
  $users = $database->getReference("users")->getValue();

  if (!empty($users)) {
    foreach ($users as $key => $value) {
      $checkEmail[$key] = $value['email'];
    }
  }

  if (array_search($email, $checkEmail) && $getEmail != $email) {
    echo "<script>Swal.fire('Email sudah digunakan','','error'); </script>";
  } else {
    $result = $database->getReference("users/{$uniqID}")->set([
      'namaOrangTua' => $nama,
      'namaAnak' => '',
      'level' => 'admin',
      'email' =>  $email,
      'alamat' => $alamat,
      'noTelepon' => $noTelepon
    ]);

    $_SESSION['message']  = "Data Berhasil Di Tambah";
    $_SESSION['msg_type'] = "success";

    echo '<script>window.location="index.php?act=data-user";</script>';
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li>Data User</li>
      <li class="active">Edit Data User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-top:25px;">

    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data User</h3>
      </div>
      <div class="box-body" style="min-height:400px;margin-top:20px;">
        <form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
          <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-8">
              <input type="text" name="nama" class="form-control" id="nama" placeholder="nama" required>
            </div>
          </div>

          <div class="form-group">
            <label for="noTelepon" class="col-sm-2 control-label">Nomor Telepon</label>
            <div class="col-sm-8">
              <input type="text" name="noTelepon" class="form-control" id="noTelepon" placeholder="noTelepon" required>
            </div>
          </div>

          <div class="form-group">
            <label for="alamat" class="col-sm-2 control-label">Alamat</label>
            <div class="col-sm-8">
              <input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat" required>
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-8">
              <input type="text" name="email" class="form-control" id="email" placeholder="email" required>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-8">
              <input type="password" name="password" class="form-control" id="password" placeholder="password" required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="submit" class="btn btn-success">Simpan</button>
              <a href="index.php?act=data-user" class="btn btn-primary">Kembali</a>
            </div>
          </div>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->