<?php
$get_id = $_GET['id'];

$checkHasilDiagnosaPenyakit = 'false';
$checkPengetahuanPenyakit = 'false';

$dataPenyakit = $database->getReference("penyakit")->getValue();
$dataPengetahuan = $database->getReference("pengetahuan")->getValue();
$dataHasilDiagnosa = $database->getReference("hasilDiagnosa")->getValue();

foreach ($dataPengetahuan as $keyPengetahuan => $valuePengetahuan) {
  if ($valuePengetahuan['idPenyakit'] == $get_id) {
    $checkPengetahuanPenyakit = 'true';
  }
}

foreach ($dataHasilDiagnosa as $keyHasilDiagnosa => $valueHasilDiagnosa) {
  if ($valueHasilDiagnosa[0]['idPenyakit'] == $get_id) {
    $checkHasilDiagnosaPenyakit = 'true';
  }
}

if ($checkPengetahuanPenyakit == 'true' || $checkHasilDiagnosaPenyakit == 'true') {
  $_SESSION['message']  = "Penyakit Masih Di Gunakan";
  $_SESSION['msg_type'] = "error";
} else {
  $database->getReference("penyakit/{$get_id}")->remove();

  $_SESSION['message']  = "Data Berhasil Di Hapus";
  $_SESSION['msg_type'] = "success";
}

echo '<script>window.location="index.php?act=data-penyakit";</script>';
