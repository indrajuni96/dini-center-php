<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li class="active">Data Hasil Diagnosa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-top:25px;">

    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Data Table Hasil Diagnosa</h3>
      </div>
      <div class="box-body table-responsive">
        <table id="tableData" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="width:6%">No</th>
              <th>Nama</th>
              <th>Hasil Fuzzy Tsukamoto</th>
              <th>Hasil Forward Chaining</th>
              <th style="width:15%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;

            $dataUsers = $database->getReference("users")->getValue();
            $dataPenyakit = $database->getReference("penyakit")->getValue();
            $dataHasilDiagnosa = $database->getReference("hasilDiagnosa")->getValue();

            if (!empty($dataUsers)) :
              foreach ($dataUsers as $key => $value) :
                if ($value['email'] != 'admin@gmail.com') :
            ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $value['namaAnak']; ?></td>
                    <td><?= $dataHasilDiagnosa[$key][1]['nilaiTsukamoto']; ?></td>
                    <?php
                    foreach ($dataPenyakit as $keyPenyakit => $valuePenyakit) :
                      if ($keyPenyakit == $dataHasilDiagnosa[$key][0]['idPenyakit']) :
                    ?>
                        <td><?= $valuePenyakit['namaPenyakit'] ?></td>
                    <?php
                      endif;
                    endforeach;
                    ?>
                    <td>
                      <a href="index.php?act=detail-hasil-diagnosa&id=<?= $key; ?>" class="btn btn-warning"> Detail</a>
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