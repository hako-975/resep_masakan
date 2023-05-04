<?php 
	require_once 'koneksi.php';
	$resep = mysqli_query($koneksi, "SELECT * FROM resep INNER JOIN user ON resep.id_user = user.id_user ORDER BY nama_resep ASC");
?>

<html>
<head>
	<title>Daftar Resep Masakan</title>
	<?php include_once 'include_head.php'; ?>
</head>
<body>
	<?php include_once 'include_navbar.php'; ?>

	<div class="container padding-5px margin-top-50px">
		<h1 class="text-center">Daftar Resep Masakan</h1>
		<?php foreach ($resep as $data_resep): ?>
			<a href="" class="card-link">
				<div class="card">
				  <div class="card-image-container">
				    <img src="img/<?= $data_resep['foto_resep']; ?>" alt="Gambar">
				  </div>
				  <div class="card-content">
				    <h2 class="card-title"><?= $data_resep['nama_resep']; ?></h2>
				    <p class="card-description"><?= $data_resep['deskripsi_resep']; ?></p>
				    <h4 class="margin-top-bottom-5px">Bahan-bahan:</h4>
				    <p class="card-description"><?= nl2br($data_resep['bahan']); ?></p>
				    <h4 class="margin-top-bottom-5px">Selengkapnya...</h4>
				    <p class="card-name"><?= $data_resep['nama_lengkap']; ?></p>
				    <p class="card-date"><?= date("d-m-Y, H:i", strtotime($data_resep['tanggal_resep_dibuat'])); ?></p>
				  </div>
				</div>
			</a>
		<?php endforeach ?>
	</div>
</body>
</html>