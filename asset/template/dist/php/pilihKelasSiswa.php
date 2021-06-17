<?php 
require_once("../../../../db/koneksi.php");

// $semester = $_POST['semester']; 
$tahun    = $_POST['tahun'];
 
$sql = $conn->query("SELECT * FROM tbl_wali_kelas a INNER JOIN tbl_kelas b ON a.id_kelas = b.id_kelas WHERE a.id_tahun_ajaran = '$tahun' ORDER BY nama_kelas ASC ");
     
echo '<option>--pilih--</option>';
        while ($data = $sql->fetch_array(MYSQLI_ASSOC)) {
            echo '<option value="'.$data['id_wali_kelas'].'">'.$data['nama_kelas'].'</option>';
            }
?>