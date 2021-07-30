<?php
$get_id = $_GET['id'];

$checkHasilDiagnosa = 'false';

$dataHasilDiagnosa = $database->getReference("hasilDiagnosa")->getValue();

foreach ($dataHasilDiagnosa as $keyHasilDiagnosa => $valueHasilDiagnosa) {
  if ($keyHasilDiagnosa == $get_id) {
    $checkHasilDiagnosa = 'true';
  }
}

if ($checkHasilDiagnosa == 'true') {
  $_SESSION['message']  = "User Masih Di Gunakan";
  $_SESSION['msg_type'] = "error";
} else {
  $database->getReference("users/{$get_id}")->remove();
  $database->getReference("hasilDiagnosa/{$get_id}")->remove();

  $_SESSION['message']  = "Data Berhasil Di Hapus";
  $_SESSION['msg_type'] = "success";
}


echo '<script>window.location="index.php?act=data-user";</script>';
