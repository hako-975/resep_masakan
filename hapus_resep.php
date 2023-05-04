<?php 
	require_once 'koneksi.php';

	if (!isset($_SESSION['id_user'])) {
		header("Location: login.php");
		exit;
	}

	$id_user = $_SESSION['id_user'];
	$data_user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'"));

	$id_resep = $_GET['id_resep'];
	$resep = mysqli_query($koneksi, "SELECT * FROM resep INNER JOIN user ON resep.id_user = user.id_user WHERE id_resep = '$id_resep' ORDER BY nama_resep ASC");
	$data_resep = mysqli_fetch_assoc($resep);
	$foto_resep = $data_resep['foto_resep'];
	$resepKu = false;
	if (isset($_SESSION['id_user'])) {
		$id_user = $_SESSION['id_user'];

		// cek apakah data resep termasuk resep ku
		if ($data_resep['id_user'] == $id_user) {
			$resepKu = true;
		}
	}

	if ($resepKu) {
		$hapus_resep = mysqli_query($koneksi, "DELETE FROM resep WHERE id_resep = '$id_resep' && id_user = '$id_user'");

		if ($hapus_resep) {
			unlink('img/'.$foto_resep);
			echo "
				<script>
					alert('Resep berhasil dihapus!')
					window.location.href='resep.php'
				</script>
			";
			exit;
		} else {
			echo "
				<script>
					alert('Resep gagal dihapus!')
					window.history.back()
				</script>
			";
			exit;
		}
	} else {
		echo "
			<script>
				alert('Resep gagal dihapus!')
				window.history.back()
			</script>
		";
		exit;
	}
?>