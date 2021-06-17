<?php
session_start();
require __DIR__ . '/../firebase/config.php';

if (isset($_SESSION['id_user']) && isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {

	$id_user = $_SESSION['id_user'];

	$user = $database->getReference("users/{$id_user}")->getValue();

	$username = $user['namaOrangTua'];
	$password = '';
	$level = 'admin';

	if (isset($_GET['act'])) {
		$page = $_GET['act'];
	} else {
		$page = "home";
	}

	if (file_exists($page . '.php')) {
		$title = ucwords(str_replace('-', ' ', $page));
		include('header.php');
		include($page . '.php');
		include('footer.php');
	} else {
		$title = "404 ERROR";
		include('header.php');
		include('404.php');
		include('footer.php');
	}
} else {
	echo '<script>window.location="../index.php";</script>';
}
