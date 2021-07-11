<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li class="active">Data Detail Diagnosa</li>
    </ol>
  </section>

  <div style="margin-top: 20px; margin-left: 10px">
    <a href="index.php?act=data-hasil-diagnosa" class="btn btn-primary">Kembali</a>
  </div>

  <?php
  $id = $_GET['id'];

  $dataUser = $database->getReference("users")->getValue();
  $dataPenyakit = $database->getReference("penyakit")->getValue();
  $dataHasilDiagnosa = $database->getReference("hasilDiagnosa")->getValue();

  foreach ($dataUser as $key => $value) :
    if ($key == $id) :
  ?>
      <!-- Main content -->
      <section class="content" style="margin-top:25px;">
        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Data User</h3>
          </div>

          <div class="box-body table-responsive">
            <div class="form-group">
              <label for="namaGame" class="col-sm-2 control-label">Nama Orang Tua</label>

              <div class="col-sm-10">
                <p class="form-control-static">
                  <?= $value['namaOrangTua'] ?>
                </p>
              </div>
            </div>

            <div class="form-group">
              <label for="namaGame" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-10">
                <p class="form-control-static">
                  <?= $value['email'] ?>
                </p>
              </div>
            </div>

            <div class="form-group">
              <label for="namaGame" class="col-sm-2 control-label">Nomor Telepon</label>

              <div class="col-sm-10">
                <p class="form-control-static">
                  <?= $value['noTelepon'] ?>
                </p>
              </div>
            </div>

            <div class="form-group">
              <label for="namaGame" class="col-sm-2 control-label">Alamat</label>

              <div class="col-sm-10">
                <p class="form-control-static">
                  <?= $value['alamat'] ?>
                </p>
              </div>
            </div>

            <div class="form-group">
              <label for="namaGame" class="col-sm-2 control-label">Nama Anak</label>

              <div class="col-sm-10">
                <p class="form-control-static">
                  <?= $value['namaAnak'] ?>
                </p>
              </div>
            </div>

            <div class="form-group">
              <label for="namaGame" class="col-sm-2 control-label">Hasil Fuzzy Tsukamoto</label>

              <div class="col-sm-10">
                <p class="form-control-static">
                  <?= $dataHasilDiagnosa[$key][1]['nilaiTsukamoto']; ?>
                </p>
              </div>
            </div>

            <div class="form-group">
              <label for="namaGame" class="col-sm-2 control-label">Hasil Forward Chaining</label>

              <div class="col-sm-10">
                <?php
                foreach ($dataPenyakit as $keyPenyakit => $valuePenyakit) :
                  if ($keyPenyakit == $dataHasilDiagnosa[$key][0]['idPenyakit']) :
                ?>
                    <p><?= $valuePenyakit['namaPenyakit'] ?></p>
                <?php
                  endif;
                endforeach;
                ?>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->

      <!-- Main content -->
      <section class="content" style="margin-top:25px;">

        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Data Table Kuesioner</h3>
          </div>

          <div class="box-body table-responsive">
            <table id="tableData" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width:6%">No</th>
                  <th>Nama Gejala</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;

                if (!empty($dataHasilDiagnosa[$key][1]['diagnosa'])) :
                  foreach ($dataHasilDiagnosa[$key][1]['diagnosa'] as $keyDiagnosa => $valueDiagnosa) :
                ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $valueDiagnosa['namaGejala']; ?></td>
                      <td><?= $valueDiagnosa['nilaiInput']; ?></td>
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
  <?php
    endif;
  endforeach;
  ?>
</div>
<!-- /.content-wrapper -->