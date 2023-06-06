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
	$data_kategori = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'"));

	if (isset($_POST['btnUbahKategori'])) {
		$kategori = $_POST['kategori'];
		
		$ubah_kategori = mysqli_query($koneksi, "UPDATE kategori SET kategori = '$kategori' WHERE id_kategori = '$id_kategori'");
		if ($ubah_kategori) {
			echo "
				<script>
					alert('Kategori berhasil diubah!')
					window.location.href='kategori.php'
				</script>
			";
			exit;
		} else {
			echo "
				<script>
					alert('Kategori gagal diubah!')
					window.history.back()
				</script>
			";
			exit;
		}
	}
?>
<html>
<head>
	<title>Ubah Kategori - <?= $data_kategori['kategori']; ?></title>
	<?php include_once 'include_head.php'; ?>
</head>
<body>
	<?php include_once 'include_navbar.php'; ?>
	<div class="container padding-10px margin-top-bottom-50px">
		<button type="button" onclick="return window.history.back()" class="button margin-top-5px">Kembali</button>
		<h1 class="text-center">Ubah Kategori - <?= $data_kategori['kategori']; ?></h1>
		<form method="post" class="form" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="kategori">Kategori</label>
		    <input type="text" id="kategori" name="kategori" required value="<?= $data_kategori['kategori']; ?>">
		  </div>
		  <button type="submit" name="btnUbahKategori" class="button-submit">Ubah Kategori</button>
		</form>
	</div>
</body>
</html>