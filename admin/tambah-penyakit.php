<?php
if (isset($_POST['submit'])) {

  $uniqID = uniqid();
  $kode        = strtoupper($_POST['kode']);
  $namaPenyakit        = $_POST['namaPenyakit'];
  $penanganan        = $_POST['penanganan'];

  $gejala = array();
  $checkGejala = $database->getReference("penyakit")->getValue();

  if (!empty($checkGejala)) {
    foreach ($checkGejala as $key => $value) {
      $gejala[$key] = $value['kode'];
    }
  }

  if (array_search($kode, $gejala)) {
    echo "<script>Swal.fire('Kode sudah digunakan','','error'); </script>";
  } else {
    $result = $database->getReference("penyakit/{$uniqID}")->set([
      'kode' => $kode,
      'namaPenyakit' => $namaPenyakit,
      'penanganan' => $penanganan
    ]);

    $_SESSION['message']  = "Data Berhasil Di Tambah";
    $_SESSION['msg_type'] = "success";

    echo '<script>window.location="index.php?act=data-penyakit";</script>';
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li>Data Penyakit</li>
      <li class="active">Tambah Data Penyakit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-top:25px;">

    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Data Penyakit</h3>
      </div>
      <div class="box-body" style="min-height:400px;margin-top:20px;">

        <form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
          <div class="form-group">
            <label for="tingkat" class="col-sm-2 control-label">Kode</label>
            <div class="col-sm-8">
              <input type="text" name="kode" class="form-control" id="kode" placeholder="Kode" required>
            </div>
          </div>

          <div class="form-group">
            <label for="namaPenyakit" class="col-sm-2 control-label">Nama Penyakit</label>
            <div class="col-sm-8">
              <input type="text" name="namaPenyakit" class="form-control" id="namaPenyakit" placeholder="Nama Penyakit" required>
            </div>
          </div>

          <div class="form-group">
            <label for="penanganan" class="col-sm-2 control-label">Penanganan</label>
            <div class="col-sm-8">
              <input type="text" name="penanganan" class="form-control" id="penanganan" placeholder="Penanganan">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="submit" class="btn btn-success">Simpan</button>
              <button type="reset" class="btn btn-danger">Batal</button>
              <a href="index.php?act=data-penyakit" class="btn btn-primary">Kembali</a>
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