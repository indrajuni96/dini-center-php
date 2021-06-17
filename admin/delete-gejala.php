<?php
$get_id = $_GET['id'];

$database->getReference("gejala/{$get_id}")->remove();

$_SESSION['message']  = "Data Berhasil Di Hapus";
$_SESSION['msg_type'] = "success";

echo '<script>window.location="index.php?act=data-gejala";</script>';
