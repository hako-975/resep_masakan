<?php 
	require_once 'koneksi.php';

	$kategori = mysqli_query($koneksi, "SELECT *, COUNT(resep.id_resep) AS jumlah_resep FROM kategori LEFT JOIN resep ON kategori.id_kategori = resep.id_kategori GROUP BY kategori.id_kategori ORDER BY kategori ASC");

	$total_resep = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT *, COUNT(resep.id_resep) AS total_resep FROM resep"))['total_resep'];
	
	if (isset($_SESSION['id_user'])) {
		$id_user = $_SESSION['id_user'];
		$data_user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'"));
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
		<h1 class="text-center">Daftar Kategori Resep</h1>
		<a class="button margin-bottom-20px" href="tambah_kategori.php">Tambah Kategori</a>
		<div class="table-responsive">
			<table>
				<tr>
					<th>No.</th>
					<th>Kategori</th>
					<th>Jumlah Resep</th>
					<?php if (isset($_SESSION['id_user'])): ?>
						<?php if ($data_user['username'] == 'admin'): ?>
							<th>Aksi</th>
						<?php endif ?>
					<?php endif ?>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($kategori as $data_kategori): ?>
					<tr>
						<td><?= $i++; ?></td>
						<td><a href="index.php?cari=<?= $data_kategori['kategori']; ?>"><?= $data_kategori['kategori']; ?></a></td>
						<td><?= $data_kategori['jumlah_resep']; ?></td>
						<?php if (isset($_SESSION['id_user'])): ?>
							<?php if ($data_user['username'] == 'admin'): ?>
								<td>
									<a href="ubah_kategori.php?id_kategori=<?= $data_kategori['id_kategori']; ?>" class="button">Ubah</a>
									<a onclick="return confirm('Apakah Anda yakin ingin menghapus Kategori <?= $data_kategori['kategori']; ?>?')" href="hapus_kategori.php?id_kategori=<?= $data_kategori['id_kategori']; ?>" class="button">Hapus</a>
								</td>
							<?php endif ?>
						<?php endif ?>
					</tr>
				<?php endforeach ?>
				<tr>
					<th colspan="2">Total Resep</th>
					<td><?= $total_resep; ?></td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>