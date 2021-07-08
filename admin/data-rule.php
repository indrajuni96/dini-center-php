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
      <li class="active">Data Rule</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="margin-top:25px;">

    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Data Table Rule</h3>
      </div>
      <div class="box-body table-responsive">
        <table id="tableData" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="width:6%">No</th>
              <th>Penyakit</th>
              <th>Gejala</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;

            $checkPenyakit = array();
            $fixCheckPenyakit = array();

            $dataPengetahuan = $database->getReference("pengetahuan")->getValue();
            $dataGejala = $database->getReference("gejala")->getValue();
            $dataPenyakit = $database->getReference("penyakit")->getValue();

            foreach ($dataPengetahuan as $keyPengetahuan => $valuePengetahuan) {
              array_push($checkPenyakit, $valuePengetahuan['idPenyakit']);
            }

            foreach ($checkPenyakit as $valueCheckPenyakit) {
              if (!in_array($valueCheckPenyakit, $fixCheckPenyakit)) {
                array_push($fixCheckPenyakit, $valueCheckPenyakit);
              }
            }

            // print_r($fixCheckPenyakit);



            // foreach ($dataPengetahuan as  $valuePengetahuan1) {
            //   foreach ($fixCheckPenyakit as $valueFixCheckPenyakit) {
            //     if ($valuePengetahuan1['idPenyakit'] == $valueFixCheckPenyakit) {
            //       if (!in_array($valuePengetahuan1['idGejala1'], $fixGejala)) {
            //         array_push($fixGejala, $valuePengetahuan1['idGejala1']);
            //       }

            //       if (!in_array($valuePengetahuan1['idGejala2'], $fixGejala)) {
            //         array_push($fixGejala, $valuePengetahuan1['idGejala2']);
            //       }
            //     }
            //   }
            // }

            foreach ($fixCheckPenyakit as $valueFixCheckPenyakit) :
              // foreach ($dataPengetahuan as  $valuePengetahuan1) :
              //   if ($valuePengetahuan1['idPenyakit'] == $valueFixCheckPenyakit) {
              //     if (!in_array($valuePengetahuan1['idGejala1'], $fixGejala)) {
              //       array_push($fixGejala, $valuePengetahuan1['idGejala1']);
              //     }

              //     if (!in_array($valuePengetahuan1['idGejala2'], $fixGejala)) {
              //       array_push($fixGejala, $valuePengetahuan1['idGejala2']);
              //     }
              //   }
              // endforeach;


              // print_r($fixGejala);
            ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?= $dataPenyakit[$valueFixCheckPenyakit]['namaPenyakit']; ?></td>
                <td>
                  <ul>
                    <?php
                    $fixGejala = array();
                    foreach ($dataPengetahuan as  $valuePengetahuan1) :
                      if ($valuePengetahuan1['idPenyakit'] == $valueFixCheckPenyakit) :
                        if (!in_array($valuePengetahuan1['idGejala1'], $fixGejala)) :
                          array_push($fixGejala, $valuePengetahuan1['idGejala1']);
                        endif;

                        if (!in_array($valuePengetahuan1['idGejala2'], $fixGejala)) :
                          array_push($fixGejala, $valuePengetahuan1['idGejala2']);
                        endif;

                    ?>
                        <li><?= $dataGejala[$valuePengetahuan1['idGejala1']]['namaGejala'] ?></li>
                        <li><?= $dataGejala[$valuePengetahuan1['idGejala2']]['namaGejala'] ?></li>
                    <?php
                      endif;
                    endforeach;

                    print_r($fixGejala);
                    ?>
                  </ul>
                </td>
              </tr>
            <?php
              $no++;
            endforeach;
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