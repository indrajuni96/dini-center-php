<?php
$id = $_GET['id'];
$namaOrangTua = $_GET['namaOrangTua'];
$namaAnak = $_GET['namaAnak'];
$getEmail = $_GET['email'];
$alamat = $_GET['alamat'];
$noTelepon = $_GET['noTelepon'];

if (isset($_POST['submit'])) {
  $namaOrangTua = $_POST['namaOrangTua'];
  $namaAnak        = $_POST['namaAnak'];
  $email        = $_POST['email'];
  $alamat        = $_POST['alamat'];
  $noTelepon        = $_POST['noTelepon'];

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
    $postData = [
      'namaOrangTua' => $namaOrangTua,
      'namaAnak' => $namaAnak,
      'email' =>  $email,
      'alamat' => $alamat,
      'noTelepon' => $noTelepon
    ];

    $updates = [
      "users/{$id}" => $postData
    ];

    $result = $database->getReference()->update($updates);

    $_SESSION['message']  = "Data Berhasil Di Edit";
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
            <label for="namaOrangTua" class="col-sm-2 control-label">Nama Orang Tua</label>
            <div class="col-sm-8">
              <input type="text" name="namaOrangTua" class="form-control" id="namaOrangTua" placeholder="namaOrangTua" required value="<?= $namaOrangTua; ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="namaAnak" class="col-sm-2 control-label">Nama Anak</label>
            <div class="col-sm-8">
              <input type="text" name="namaAnak" class="form-control" id="namaAnak" placeholder="namaAnak" required value="<?= $namaAnak; ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-8">
              <input type="text" name="email" class="form-control" id="email" placeholder="email" required value="<?= $getEmail; ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="noTelepon" class="col-sm-2 control-label">Nomot Telepon</label>
            <div class="col-sm-8">
              <input type="text" name="noTelepon" class="form-control" id="noTelepon" placeholder="noTelepon" required value="<?= $noTelepon; ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="alamat" class="col-sm-2 control-label">Alamat</label>
            <div class="col-sm-8">
              <input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat" required value="<?= $alamat; ?>">
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