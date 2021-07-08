    <?php
    $totalGejala = $database->getReference('gejala')->getSnapshot()->numChildren();
    $totalPenyakit = $database->getReference('penyakit')->getSnapshot()->numChildren();
    $totalUser = $database->getReference('users')->getSnapshot()->numChildren();
    $totalHasilDiagnosa = $database->getReference('hasilDiagnosa')->getSnapshot()->numChildren();
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
          <li class="active">Home</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?= $totalGejala ?></h3>

                <p>Data Gejala</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-book"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?= $totalPenyakit ?></h3>

                <p>Data Penyakit</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-book"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?= $totalUser ?></h3>

                <p>Data User</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-person"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?= $totalHasilDiagnosa ?></h3>

                <p>Data Hasil Diagnosa</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-book"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-lg-12 text-center">
            <div style="height:470px; background-color:white;padding-top:20px;">
              <img src="../asset/Gambar/DiniCenter.png" class="img-responsive center-block" alt="Responsive image" width="200" height="72">
              <!-- <h1>Selamat Datang Di Sistem Akademik SD TIARA SCHOOL</h1>
              <h4>Pondok Kelapa, Kec. Duren Sawit, Kota Jakarta Timur Prov. D.K.I. Jakarta</h4> -->
            </div>
          </div>
        </div>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->