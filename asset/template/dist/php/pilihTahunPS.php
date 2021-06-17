<?php 
require_once("../../../../db/koneksi.php");

$tahun = $_POST['tahun'];

$sql = $conn->query("SELECT DISTINCT b.id_guru ,b.nama_guru FROM tbl_jadwal_mapel a INNER JOIN tbl_guru b ON a.id_guru = b.id_guru WHERE id_tahun_ajaran = '$tahun'");
    
echo '<option>--pilih--</option>';
        while ($data = $sql->fetch_array(MYSQLI_ASSOC)) {
            echo '<option value="'.$data['id_guru'].'">'.$data['nama_guru'].'</option>';
            }
?>