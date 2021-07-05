<?php
$id = $_GET['id'];
$getKode = $_GET['kode'];
$idPenyakit = $_GET['idPenyakit'];
$idGejala1 = $_GET['idGejala1'];
$idGejala2 = $_GET['idGejala2'];

if (isset($_POST['submit'])) {
  $idPenyakit = $_POST['idPenyakit'];
  $idGejala1        = $_POST['idGejala1'];
  $idGejala2        = $_POST['idGejala2'];
  $kode = $idGejala1 . '-' . $idGejala2 . '-' . $idPenyakit;


  $pengetahuan = array();
  $checkPengetahuan = $database->getReference("pengetahuan")->getValue();

  if (!empty($checkPengetahuan)) {
    foreach ($checkPengetahuan as $key => $value) {
      $pengetahuan[$key] = $value['kode'];
    }
  }

  if (array_search($kode, $pengetahuan) && $getKode != $kode) {
    echo "<script>Swal.fire('Pengetahuan sudah digunakan','','error'); </script>";
  } elseif ($idGejala1 == $idGejala2) {
    echo "<script>Swal.fire('Gejala 1 dan Gejala 2 tidak boleh sama','','error'); </script>";
  } else {
    $postData = [
      'kode' => $kode,
      'idPenyakit' => $idPenyakit,
      'idGejala1' => $idGejala1,
      'idGejala2' => $idGejala2
    ];

    $updates = [
      "pengetahuan/{$id}" => $postData
    ];

    $result = $database->getReference()->update($updates);

    $_SESSION['message']  = "Data Berhasil Di Edit";
    $_SESSION['msg_type'] = "success";

    echo '<script>window.location="index.php?act=data-pengetahuan";</script>';
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li>Data Pengetahuan</li>
      <li class="active">Edit Data Pengetahuan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-top:25px;">

    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data Pengetahuan</h3>
      </div>
      <div class="box-body" style="min-height:400px;margin-top:20px;">
        <form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
          <div class="form-group">
            <label for="idGejala1" class="col-sm-2 control-label">Gejala1</label>
            <div class="col-sm-8">
              <select name="idGejala1" id="idGejala1" class="form-control" required>
                <option value="">--pilih--</option>
                <?php
                $data = $database->getReference('gejala')->getValue();
                if (!empty($data)) :
                  foreach ($data as $key => $value) :
                ?>
                    <option <?php if ($idGejala1 == $key) {
                              echo "selected";
                            } ?> value="<?= $key ?>"><?= $value['namaGejala']  ?></option>
                <?php
                  endforeach;
                endif;
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="idGejala2" class="col-sm-2 control-label">Gejala2</label>
            <div class="col-sm-8">
              <select name="idGejala2" id="idGejala2" class="form-control" required>
                <option value="">--pilih--</option>
                <?php
                $data = $database->getReference('gejala')->getValue();
                if (!empty($data)) :
                  foreach ($data as $key => $value) :
                ?>
                    <option <?php if ($idGejala2 == $key) {
                              echo "selected";
                            } ?> value="<?= $key ?>"><?= $value['namaGejala']  ?></option>
                <?php
                  endforeach;
                endif;
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="idPenyakit" class="col-sm-2 control-label">Penyakit</label>
            <div class="col-sm-8">
              <select name="idPenyakit" id="idPenyakit" class="form-control" required>
                <option>--pilih--</option>
                <?php
                $data = $database->getReference('penyakit')->getValue();

                if (!empty($data)) :
                  foreach ($data as $key => $value) :
                ?>
                    <option <?php if ($idPenyakit == $key) {
                              echo "selected";
                            } ?> value="<?= $key ?>"><?= $value['namaPenyakit'] ?></option>
                <?php
                  endforeach;
                endif;
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="submit" class="btn btn-success">Simpan</button>
              <a href="index.php?act=data-pengetahuan" class="btn btn-primary">Kembali</a>
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