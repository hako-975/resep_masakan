<?php 
	require_once 'koneksi.php';

	$kategori = mysqli_query($koneksi, "SELECT *, COUNT(resep.id_resep) AS jumlah_resep FROM kategori LEFT JOIN resep ON kategori.id_kategori = resep.id_kategori GROUP BY kategori.id_kategori ORDER BY kategori ASC");
?>

<html>
<head>
	<title>Daftar Kategori Resep</title>
	<?php include_once 'include_head.php'; ?>
</head>
<body>
	<?php include_once 'include_navbar.php'; ?>

	<div class="container padding-10px margin-top-bottom-50px">
		<h1 class="text-center">Daftar Kategori Resep</h1>
		<a class="button margin-bottom-20px" href="tambah_kategori.php">Tambah Kategori</a>
		<div class="table-responsive">
			<table>
				<tr>
					<th>No.</th>
					<th>Kategori</th>
					<th>Jumlah Resep</th>
					<th>Aksi</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($kategori as $data_kategori): ?>
					<tr>
						<td><?= $i++; ?></td>
						<td><?= $data_kategori['kategori']; ?></td>
						<td><?= $data_kategori['jumlah_resep']; ?></td>
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