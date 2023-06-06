<?php 
	require_once 'koneksi.php';
	$kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY kategori ASC");

	if (isset($_GET['cari'])) {
		$cari = $_GET['cari'];
		$kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori LIKE '%$cari%' ORDER BY kategori ASC");
	}
?>

<html>
<head>
	<title>Daftar Kategori Resep</title>
	<?php include_once 'include_head.php'; ?>
</head>
<body>
	<?php include_once 'include_navbar.php'; ?>

	<div class="container padding-10px margin-top-bottom-50px">
		<?php if (isset($_GET['cari'])): ?>
			<h2>Kategori yang dicari: <?= $_GET['cari']; ?></h2>
			<h3>Tersedia: <?= mysqli_num_rows($kategori); ?></h3>
		<?php endif ?>
		<h1 class="text-center">Daftar Kategori Resep</h1>
		<a class="button margin-bottom-20px" href="tambah_kategori.php">Tambah Kategori</a>
		<div class="table-responsive">
			<table>
				<tr>
					<th>No.</th>
					<th>Kategori</th>
					<th>Aksi</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($kategori as $data_kategori): ?>
					<tr>
						<td><?= $i++; ?></td>
						<td><?= $data_kategori['kategori']; ?></td>
						<td>
							<a href="ubah_kategori.php?id_kategori=<?= $data_kategori['id_kategori']; ?>" class="button">Ubah</a>
							<a onclick="return confirm('Apakah Anda yakin ingin menghapus Kategori <?= $data_kategori['kategori']; ?>?')" href="hapus_kategori.php?id_kategori=<?= $data_kategori['id_kategori']; ?>" class="button">Hapus</a>
						</td>
					</tr>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</body>
</html>