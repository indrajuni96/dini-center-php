<?php
$id = $_GET['id'];
$getNamaGame = $_GET['namaGame'];

if (isset($_POST['submit'])) {
  $kode = strtoupper($_POST['kode']);
  $namaGame = $_POST['namaGame'];

  $game = array();
  $checkGame = $database->getReference("game")->getValue();

  if (!empty($checkGame)) {
    foreach ($checkGame as $key => $value) {
      $game[$key] = $value['namaGame'];
    }
  }

  if (array_search($namaGame, $game) && $getNamaGame != $namaGame) {
    echo "<script>Swal.fire('Kode sudah digunakan','','error'); </script>";
  } else {
    $postData = [
      'namaGame' => $namaGame
    ];

    $updates = [
      "game/{$id}" => $postData
    ];

    $result = $database->getReference()->update($updates);

    $_SESSION['message']  = "Data Berhasil Di Edit";
    $_SESSION['msg_type'] = "success";

    echo '<script>window.location="index.php?act=data-game";</script>';
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li>Data Game</li>
      <li class="active">Edit Data Game</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-top:25px;">

    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data Game</h3>
      </div>
      <div class="box-body" style="min-height:400px;margin-top:20px;">
        <form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
          <div class="form-group">
            <label for="namaGame" class="col-sm-2 control-label">Nama Game</label>
            <div class="col-sm-8">
              <input type="text" name="namaGame" class="form-control" id="namaGame" placeholder="Nama Game" required value="<?= $getNamaGame; ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="submit" class="btn btn-success">Simpan</button>
              <a href="index.php?act=data-game" class="btn btn-primary">Kembali</a>
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