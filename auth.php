<?php
session_start();

if (isset($_SESSION['id_user']) && isset($_SESSION['level'])) {
	if ($_SESSION['level'] == 'admin') {
		echo '<script>window.location="admin";</script>';
	}
	// elseif($_SESSION['level'] == 'walikelas'){
	// 	echo '<script>window.location="walikelas";</script>';
	// }
} else {
	echo "Maaf Tidak Bisa Masuk, anda harus login terlebih dahulu...";
}
