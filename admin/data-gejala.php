<?php
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  $type    = $_SESSION['msg_type'];

  echo "<script>swal.fire('$message','','$type') </script>";
  unset($_SESSION['message']);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li class="active">Data Gejala</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-top:25px;">

    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Data Table Gejala</h3>
      </div>
      <div class="box-body table-responsive">
        <a href="index.php?act=tambah-gejala" class="btn btn-lg btn-success fa fa-plus" style="margin-bottom:30px; margin-top:10px;"> Tambah</a>

        <table id="tableData" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="width:6%">No</th>
              <th>Kode</th>
              <th>Nama Gejala</th>
              <th>Batas Bawah</th>
              <th>Batas Atas</th>
              <th style="width:15%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $data = $database->getReference("gejala")->getValue();

            if (!empty($data)) :
              foreach ($data as $key => $value) :
            ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $value['kode']; ?></td>
                  <td><?= $value['namaGejala']; ?></td>
                  <td><?= $value['batasBawah']; ?></td>
                  <td><?= $value['batasAtas']; ?></td>
                  <td>
                    <a href="index.php?act=edit-gejala&id=<?= $key; ?>&kode=<?= $value['kode']; ?>&namaGejala=<?= $value['namaGejala']; ?>&batasBawah=<?= $value['batasBawah']; ?>&batasAtas=<?= $value['batasAtas']; ?>" class="btn btn-success">Edit</a>
                    <a href="index.php?act=delete-gejala&id=<?= $key; ?>" class="btn btn-danger tombol-hapus"> Delete</a>
                  </td>
                </tr>
            <?php
                $no++;
              endforeach;
            endif;
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->