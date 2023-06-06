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

	if (isset($_POST['btnTambahKategori'])) {
		$kategori = $_POST['kategori'];
		
		$tambah_kategori = mysqli_query($koneksi, "INSERT INTO kategori VALUES ('', '$kategori')");
		if ($tambah_kategori) {
			echo "
				<script>
					alert('Kategori berhasil ditambahkan!')
					window.location.href='kategori.php'
				</script>
			";
			exit;
		} else {
			echo "
				<script>
					alert('Kategori gagal ditambahkan!')
					window.history.back()
				</script>
			";
			exit;
		}
	}
?>
<html>
<head>
	<title>Tambah Kategori</title>
	<?php include_once 'include_head.php'; ?>
</head>
<body>
	<?php include_once 'include_navbar.php'; ?>
	<div class="container padding-10px margin-top-bottom-50px">
		<button type="button" onclick="return window.history.back()" class="button margin-top-5px">Kembali</button>
		<h1 class="text-center">Tambah Kategori</h1>
		<form method="post" class="form" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="kategori">Kategori</label>
		    <input type="text" id="kategori" name="kategori" required>
		  </div>
		  <button type="submit" name="btnTambahKategori" class="button-submit">Tambah Kategori</button>
		</form>
	</div>
</body>
</html>