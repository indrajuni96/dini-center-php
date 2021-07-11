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
      <li class="active">Data Penilaian</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-top:25px;">

    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Data Table Penilaian</h3>
      </div>
      <div class="box-body table-responsive">
        <table id="tableData" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="width:6%">No</th>
              <th>Nama</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Nicolas</td>
              <td>45</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Julio</td>
              <td></td>
            </tr>
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