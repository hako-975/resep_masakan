<?php 
	require_once 'koneksi.php';

	if (!isset($_SESSION['id_user'])) {
		header("Location: login.php");
		exit;
	}

	$id_user = $_SESSION['id_user'];
	$data_user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'"));

	if ($data_user['username'] != 'admin') {
		header("Location: index.php");
		exit;	
	}

	$id_kategori = $_GET['id_kategori'];
	$hapus_kategori = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$id_kategori'");

	if ($hapus_kategori) {
		echo "
			<script>
				alert('Kategori berhasil dihapus!')
				window.location.href='kategori.php'
			</script>
		";
		exit;
	} else {
		echo "
			<script>
				alert('Kategori gagal dihapus!')
				window.history.back()
			</script>
		";
		exit;
	}
?>