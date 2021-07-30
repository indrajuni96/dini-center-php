<?php
$get_id = $_GET['id'];

$checkPengetahuanGejala = 'false';

$dataGejala = $database->getReference("gejala")->getValue();
$dataPengetahuan = $database->getReference("pengetahuan")->getValue();
// $dataHasilDiagnosa = $database->getReference("hasilDiagnosa")->getValue();

foreach ($dataPengetahuan as $keyPengetahuan => $valuePengetahuan) {
  if ($valuePengetahuan['idGejala1'] == $get_id || $valuePengetahuan['idGejala2'] == $get_id) {
    $checkPengetahuanGejala = 'true';
  }
}

if ($checkPengetahuanGejala == 'true') {
  $_SESSION['message']  = "Gejala Masih Di Gunakan";
  $_SESSION['msg_type'] = "error";
} else {
  $database->getReference("gejala/{$get_id}")->remove();

  $_SESSION['message']  = "Data Berhasil Di Hapus";
  $_SESSION['msg_type'] = "success";
}

echo '<script>window.location="index.php?act=data-gejala";</script>';
