<?php
$get_id = $_GET['id'];

echo "<script>
console.log('{$get_id}')
</script>";

$database->getReference("users/{$get_id}")->remove();
$database->getReference("hasilDiagnosa/{$get_id}")->remove();

$_SESSION['message']  = "Data Berhasil Di Hapus";
$_SESSION['msg_type'] = "success";

echo '<script>window.location="index.php?act=data-user";</script>';
