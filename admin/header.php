<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dini Center</title>
  <link rel="shortcut icon" type="image/x-icon" href="../asset/Gambar/DiniCenter.png" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../asset/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/template/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/template/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/template/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../asset/template/dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../asset/template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Sweet Alert -->
  <script src="../asset/template/bower_components/sweetalert/sweetalert2.all.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../asset/template/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../asset/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <style>
    .swal2-popup {
      font-size: 1.6rem !important;
    }
  </style>
</head>
<?php
if (isset($_GET['act'])) {

  $home = array(
    '0' => 'home'
  );

  $data_game = array(
    '0' => 'data-game',
    '1' => 'tambah-game',
    '2' => 'edit-game'
  );

  $data_gejala = array(
    '0' => 'data-gejala',
    '1' => 'tambah-gejala',
    '2' => 'edit-gejala'
  );

  $data_penyakit = array(
    '0' => 'data-penyakit',
    '1' => 'tambah-penyakit',
    '2' => 'edit-penyakit'
  );

  $data_pengetahuan = array(
    '0' => 'data-pengetahuan',
    '1' => 'tambah-pengetahuan',
    '2' => 'edit-pengetahuan'
  );

  $data_rule = array(
    '0' => 'data-rule'
  );

  $data_user = array(
    '0' => 'data-user',
    '1' => 'tambah-user',
    '2' => 'edit-user'
  );

  $data_hasil_diagnosa = array(
    '0' => 'data-hasil-diagnosa',
    '1' => 'detail-hasil-diagnosa'
  );

  $data_info_autis = array(
    '0' => 'data-info-autis',
  );

  foreach ($home as $get_home) {
    if ($get_home == $_GET['act']) {
      $status_home = "active";
      break;
    } else {
      $status_home = '';
    }
  }

  foreach ($data_game as $get_data_game) {
    if ($get_data_game == $_GET['act']) {
      $status_data_game = "active";
      break;
    } else {
      $status_data_game = '';
    }
  }


  foreach ($data_gejala as $get_data_gejala) {
    if ($get_data_gejala == $_GET['act']) {
      $status_data_gejala = "active";
      break;
    } else {
      $status_data_gejala = '';
    }
  }

  foreach ($data_penyakit as $get_data_penyakit) {
    if ($get_data_penyakit == $_GET['act']) {
      $status_data_penyakit = "active";
      break;
    } else {
      $status_data_penyakit = '';
    }
  }

  foreach ($data_pengetahuan as $get_data_pengetahuan) {
    if ($get_data_pengetahuan == $_GET['act']) {
      $status_data_pengetahuan = "active";
      break;
    } else {
      $status_data_pengetahuan = '';
    }
  }

  foreach ($data_rule as $get_data_rule) {
    if ($get_data_rule == $_GET['act']) {
      $status_data_rule = "active";
      break;
    } else {
      $status_data_rule = '';
    }
  }

  foreach ($data_user as $get_data_user) {
    if ($get_data_user == $_GET['act']) {
      $status_data_user = "active";
      break;
    } else {
      $status_data_user = '';
    }
  }

  foreach ($data_hasil_diagnosa as $get_data_hasil_diagnosa) {
    if ($get_data_hasil_diagnosa == $_GET['act']) {
      $status_data_hasil_diagnosa = "active";
      break;
    } else {
      $status_data_hasil_diagnosa = '';
    }
  }

  foreach ($data_info_autis as $get_data_info_autis) {
    if ($get_data_info_autis == $_GET['act']) {
      $status_data_info_autis = "active";
      break;
    } else {
      $status_data_info_autis = '';
    }
  }
}
?>

<body class="hold-transition skin-blue fixed sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <!-- <span class="logo-mini"><b>A</b>LT</span> -->
        <!-- logo for regular state and mobile devices -->
        <!-- <span class="logo-lg"><b>Admin</b>LTE</span> -->
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="height:90px;">
          <div class="pull-left image">
            <img src="../asset/gambar/iconadmin.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $username; ?></p>
            <p>Level : <?php echo $level; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU</li>
          <li class="<?php if ((!isset($_GET['act'])) || (isset($_GET['act']) && $_GET['act'] == 'home')) {
                        echo "active";
                      } ?>
                       <?= $status_home; ?>"><a href="index.php?act=home"><i class="fa fa-home"></i>
              <span>Home</span></a></li>

          <li class="<?= $status_data_user; ?>"><a href="index.php?act=data-user"><i class="fa fa-pencil-square-o"></i> <span>Data User</span></a></li>
          <li class="<?= $status_data_game; ?>"><a href="index.php?act=data-game"><i class="fa fa-pencil-square-o"></i> <span>Data Game</span></a></li>
          <li class="<?= $status_data_gejala; ?>"><a href="index.php?act=data-gejala"><i class="fa fa-pencil-square-o"></i> <span>Data Gejala</span></a></li>
          <li class="<?= $status_data_penyakit; ?>"><a href="index.php?act=data-penyakit"><i class="fa fa-pencil-square-o"></i> <span>Data Penyakit</span></a></li>
          <li class="<?= $status_data_pengetahuan; ?>"><a href="index.php?act=data-pengetahuan"><i class="fa fa-pencil-square-o"></i> <span>Data Pengetahuan</span></a></li>
          <li class="<?= $status_data_rule; ?>"><a href="index.php?act=data-rule"><i class="fa fa-pencil-square-o"></i> <span>Data Rule</span></a></li>
          <li class="<?= $status_data_hasil_diagnosa; ?>"><a href="index.php?act=data-hasil-diagnosa"><i class="fa fa-pencil-square-o"></i> <span>Data Hasil Diagnosa</span></a></li>
          <li><a href="index.php?act=data-penilaian"><i class="fa fa-pencil-square-o"></i> <span>Data Penilaian</span></a></li>
          <li class="<?= $status_data_info_autis; ?>"><a href="index.php?act=data-info-autis"><i class="fa fa-pencil-square-o"></i> <span>Data Informasi</span></a></li>
          <li class="<?= $status_keluar; ?>"><a href="../logout.php"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>