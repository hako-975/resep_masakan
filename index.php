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
				    <p class="card-description"><?= (strlen($data_resep['deskripsi_resep']) <= 200) ? $data_resep['deskripsi_resep'] : substr($data_resep['deskripsi_resep'], 0, 200) . "..."; ?></p>
				    <h4 class="margin-top-bottom-5px">Bahan-bahan:</h4>
				    <?php 
				    	$bahan = nl2br($data_resep['bahan']);
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
				    <h5 class="card-name"><?= $data_resep['nama_lengkap']; ?></h5>
				    <p class="card-date"><?= date("d-m-Y, H:i", strtotime($data_resep['tanggal_resep_dibuat'])); ?></p>
				  </div>
				</div>
			</a>
		<?php endforeach ?>
	</div>
</body>
</html>