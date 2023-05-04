<?php 
	session_start();
	date_default_timezone_set("Asia/Jakarta");

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "resep_masakan";

	$koneksi = mysqli_connect($host, $user, $pass, $db);

	if ($koneksi) {
		// echo "koneksi";
	}
 ?>