<?php 
	require_once 'koneksi.php';

	$id_user = $_SESSION['id_user'];
	$data_user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'"));

	$resep = mysqli_query($koneksi, "SELECT * FROM resep INNER JOIN user ON resep.id_user = user.id_user WHERE resep.id_user = '$id_user' ORDER BY tanggal_resep_dibuat DESC");
?>

<html>
<head>
	<title>Daftar Resep Masakan</title>
	<?php include_once 'include_head.php'; ?>
</head>
<body>
	<?php include_once 'include_navbar.php'; ?>

	<div class="container padding-10px margin-top-bottom-50px">
		<h1 class="text-center">Resep Ku</h1>
		<a href="tambah_resep.php" class="button margin-bottom-20px">Buat Resep Baru</a>
		<?php foreach ($resep as $data_resep): ?>
			<a href="detail_resep.php?id_resep=<?= $data_resep['id_resep']; ?>" class="card-link">
				<div class="card">
				  <div class="card-image-container">
				    <img src="img/<?= $data_resep['foto_resep']; ?>" alt="Gambar">
				  </div>
				  <div class="card-content">
				    <h2 class="card-title"><?= $data_resep['nama_resep']; ?></h2>
				    <p class="card-description"><?= (strlen($data_resep['deskripsi_resep']) <= 200) ? $data_resep['deskripsi_resep'] : substr($data_resep['deskripsi_resep'], 0, 200) . "..."; ?></p>
				    <h4 class="margin-top-bottom-5px">Bahan-bahan:</h4>
				    <?php 
				    	$bahan = $data_resep['bahan'];
				    	$lines = explode("<br />", $bahan);
				    ?>
				    <p class="card-description">
				    	<?php 
					    	for ($i = 0; $i < min(count($lines), 3); $i++) {
							  echo $lines[$i] . "<br />";
							}
						?>
				    </p>
				    <h4 class="margin-top-5px margin-bottom-20px">Selengkapnya...</h4>
				    <h5 class="card-name"><?= $data_resep['username']; ?></h5>
				    <p class="card-date"><?= date("d-m-Y, H:i", strtotime($data_resep['tanggal_resep_dibuat'])); ?></p>
				  	<a href="ubah_resep.php?id_resep=<?= $data_resep['id_resep']; ?>" class="button btn-card-ubah">Ubah</a>
				  	<a href="hapus_resep.php?id_resep=<?= $data_resep['id_resep']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Resep <?= $data_resep['nama_resep']; ?>?')" class="button btn-card-hapus">Hapus</a>
				  </div>
				</div>
			</a>
		<?php endforeach ?>
	</div>
</body>
</html>