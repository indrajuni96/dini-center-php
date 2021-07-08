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
      <li class="active">Data User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-top:25px;">

    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Data Table User</h3>
      </div>
      <div class="box-body table-responsive">

        <table id="tableData" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="width:6%">No</th>
              <th>Nama</th>
              <th>Email</th>
              <!-- <th>Alamat</th> -->
              <th style="width:15%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $data = $database->getReference("users")->getValue();

            if (!empty($data)) :
              foreach ($data as $key => $value) :
                if ($value['email'] != 'admin@gmail.com') :
            ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $value['namaOrangTua']; ?></td>
                    <td><?= $value['email']; ?></td>
                    <!-- <td><?= $value['alamat']; ?></td> -->
                    <td>
                      <a href="index.php?act=edit-user&id=<?= $key; ?>&namaOrangTua=<?= $value['namaOrangTua']; ?>&namaAnak=<?= $value['namaAnak']; ?>&email=<?= $value['email']; ?>&alamat=<?= $value['alamat']; ?>&noTelepon=<?= $value['noTelepon']; ?>" class="btn btn-success">Edit</a>
                      <a href="index.php?act=delete-user&id=<?= $key; ?>" class="btn btn-danger tombol-hapus"> Delete</a>
                    </td>
                  </tr>
            <?php
                  $no++;
                endif;
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