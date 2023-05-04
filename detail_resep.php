<?php 
	require_once 'koneksi.php';

	$id_resep = $_GET['id_resep'];

	$resep = mysqli_query($koneksi, "SELECT * FROM resep INNER JOIN user ON resep.id_user = user.id_user WHERE id_resep = '$id_resep' ORDER BY nama_resep ASC");
	$data_resep = mysqli_fetch_assoc($resep);

	$resepKu = false;
	if (isset($_SESSION['id_user'])) {
		$id_user = $_SESSION['id_user'];

		// cek apakah data resep termasuk resep ku
		if ($data_resep['id_user'] == $id_user) {
			$resepKu = true;
		}
	}
?>

<html>
<head>
	<title><?= $data_resep['nama_resep']; ?> - Detail Resep</title>
	<?php include_once 'include_head.php'; ?>
</head>
<body>
	<?php include_once 'include_navbar.php'; ?>
	<div class="container padding-10px margin-top-bottom-50px">
		<button type="button" onclick="return window.history.back()" class="button margin-top-bottom-20px">Kembali</button>
		<div class="card-detail-resep">
			<?php if ($resepKu): ?>
				<div class="card-detail-resep-button">
					<a href="ubah_resep.php?id_resep=<?= $data_resep['id_resep']; ?>" class="button">Ubah</a>
				  	<a href="hapus_resep.php?id_resep=<?= $data_resep['id_resep']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Resep <?= $data_resep['nama_resep']; ?>?')" class="button">Hapus</a>
				</div>
			<?php endif ?>
		    <h2 class="text-center"><?= $data_resep['nama_resep']; ?></h2>
		    <img src="img/<?= $data_resep['foto_resep']; ?>" alt="Gambar">
		    <p class="card-description"><?= $data_resep['deskripsi_resep']; ?></p>
		    <h4 class="margin-top-bottom-5px">Bahan-bahan:</h4>
		    <p class="card-description"><?= $data_resep['bahan']; ?></p>
		    <h4 class="margin-top-bottom-5px">Langkah-langkah:</h4>
		    <p class="card-description"><?= $data_resep['langkah']; ?></p>
		    <hr>
		    <h4 class="margin-top-bottom-5px">Resep dibuat oleh: <?= $data_resep['username']; ?></h4>
		    <h4 class="margin-top-bottom-5px">Resep dibuat pada tanggal: <?= date("d-m-Y, H:i", strtotime($data_resep['tanggal_resep_dibuat'])); ?></h4>
		</div>	
	</div>
</body>
</html>