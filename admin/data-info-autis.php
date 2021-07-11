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
      <li class="active">Data Info Autis</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-top:25px;">

    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Data Table Info Autis</h3>
      </div>
      <div class="box-body table-responsive">
        <table id="tableData" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="width:6%">No</th>
              <th>Kode</th>
              <th>Terapi</th>
              <th>Tips</th>
              <th>Catatan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>S01</td>
              <td>Merayap</td>
              <td>merayap ini dapat melatih gerakan koordinasi antara
                kedua tangan dan kaki.
              </td>
              <td>anak biasanya mulai mempersiapkan
                diri untuk merayap pada usia 3 bulan.
              </td>
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