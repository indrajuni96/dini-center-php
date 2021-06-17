<?php
$id = $_GET['id'];
$getKode = strtoupper($_GET['kode']);
$namaGejala = $_GET['namaGejala'];

if (isset($_POST['submit'])) {
  $kode = strtoupper($_POST['kode']);
  $namaGejala = $_POST['namaGejala'];

  $gejala = array();
  $checkGejala = $database->getReference("gejala")->getValue();

  if (!empty($checkGejala)) {
    foreach ($checkGejala as $key => $value) {
      $gejala[$key] = $value['kode'];
    }
  }

  if (array_search($kode, $gejala) && $getKode != $kode) {
    echo "<script>Swal.fire('Kode sudah digunakan','','error'); </script>";
  } else {
    $postData = [
      'kode' => $kode,
      'namaGejala' => $namaGejala
    ];

    $updates = [
      "gejala/{$id}" => $postData
    ];

    $result = $database->getReference()->update($updates);

    $_SESSION['message']  = "Data Berhasil Di Edit";
    $_SESSION['msg_type'] = "success";

    echo '<script>window.location="index.php?act=data-gejala";</script>';
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li>Data Gejala</li>
      <li class="active">Edit Data Gejala</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-top:25px;">

    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data Gejala</h3>
      </div>
      <div class="box-body" style="min-height:400px;margin-top:20px;">
        <form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
          <div class="form-group">
            <label for="kode" class="col-sm-2 control-label">Kode</label>
            <div class="col-sm-8">
              <input type="text" name="kode" class="form-control" id="kode" placeholder="Kode" required value="<?= $getKode; ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="namaGejala" class="col-sm-2 control-label">Nama Gejala</label>
            <div class="col-sm-8">
              <input type="text" name="namaGejala" class="form-control" id="namaGejala" placeholder="Nama Gejala" required value="<?= $namaGejala; ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="submit" class="btn btn-success">Simpan</button>
              <a href="index.php?act=data-gejala" class="btn btn-primary">Kembali</a>
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